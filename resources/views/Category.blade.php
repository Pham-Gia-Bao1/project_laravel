
    @extends('Layout.category-layout.master-category-layout')
@section('main-category')
<style>

/* CSS để thay đổi màu sắc hoặc kiểu của label khi radio button tương ứng được chọn */
input[type="radio"]:checked + label {
    /* Áp dụng các thuộc tính CSS bạn muốn khi radio button được chọn */
    font-weight: bold; /* Ví dụ: làm đậm chữ khi radio button được chọn */
    background-color: #ffb700;
    color: #ffff;/* Ví dụ: đổi màu chữ khi radio button được chọn */
    cursor: pointer;
}
.not_found{
    width: 50%;
}
</style>
<section class="home__container pb-20">
    <div class="home__row">
        <h2 class="home__heading">Total LavAzza 1320</h2>
        <div class="filter-wrap">
            <button id="filter_btn" class="filter-btn js-toggle" style="background-color: #77DAE6" toggle-target="#home-filter">
                Filter
                <img src="./assets/icons/filter.svg" alt="" class="filter-btn__icon icon" />
            </button>
            <script>
                document.getElementById("filter_btn").addEventListener("click", function() {
                    var targetId = this.getAttribute("toggle-target");
                    var targetElement = document.querySelector(targetId);
                    if (targetElement.classList.contains("hide")) {
                        targetElement.classList.remove("hide");
                    } else {
                        targetElement.classList.add("hide");
                    }
                });
                </script>

            <div id="home-filter" class="filter hide">
                <img src="./assets/icons/arrow-up.png" alt="" class="filter__arrow" />
                <h3 class="filter__heading">Filter</h3>
                <form action="" class="filter__form form">
                    <div class="filter__row filter__content">
                        <!-- Filter column 1 -->
                        <div class="filter__col">
                            <label for="" class="form__label">Price</label>
                            <div class="filter__form-group">
                                <input type="range" id="priceRange" min="0" max="100" value="30">
                                <input type="range" id="priceRangeMax" min="0" max="1000" value="100">
                            </div>
                            <div class="filter__form-group filter__form-group--inline">
                                <div>
                                    <label for="" class="form__label form__label--small"> Minimum </label>
                                    <div class="filter__form-text-input filter__form-text-input--small">
                                        <input
                                            type="text"
                                            name="min-price"
                                            id="minPriceInput"
                                            class="filter__form-input"
                                            value="30.00"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <label for="" class="form__label form__label--small"> Maximum </label>
                                    <div class="filter__form-text-input filter__form-text-input--small">
                                        <input
                                            type="text"
                                            name="max-price"
                                            id="maxPriceInput"
                                            class="filter__form-input"
                                            value="800.00"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            // Lấy các phần tử cần thiết
                            const priceRange = document.getElementById("priceRange");
                            const priceRangeMax = document.getElementById("priceRangeMax");
                            const minPriceInput = document.getElementById("minPriceInput");
                            const maxPriceInput = document.getElementById("maxPriceInput");

                            // Cập nhật giá trị của input text khi input range thay đổi
                            priceRange.addEventListener("input", function() {
                                minPriceInput.value = `${this.value}.00`;
                            });

                            priceRangeMax.addEventListener("input", function() {
                                maxPriceInput.value = `${this.value}.00`;
                            });

                            // Cập nhật giá trị của input range khi input text thay đổi
                            minPriceInput.addEventListener("input", function() {
                                // Chuyển đổi giá trị từ dạng $xx.00 thành số nguyên
                                const minPrice = parseInt(this.value.replace("$", "").replace(".00", ""));
                                // Đảm bảo giá trị không vượt quá giá trị tối đa của input range
                                priceRange.value = Math.min(minPrice, priceRangeMax.value);
                            });

                            maxPriceInput.addEventListener("input", function() {
                                // Chuyển đổi giá trị từ dạng $xx.00 thành số nguyên
                                const maxPrice = parseInt(this.value.replace("$", "").replace(".00", ""));
                                // Đảm bảo giá trị không vượt quá giá trị tối đa của input range
                                priceRangeMax.value = Math.max(maxPrice, priceRange.value);
                            });

                            // Lắng nghe sự kiện khi dropdown thay đổi
                            document.getElementById('sizeDropdown').addEventListener('change', function() {
                                // Lấy giá trị được chọn trong dropdown
                                var selectedValue = this.value;
                                // Hiển thị giá trị đã chọn trong dropdown
                                console.log(selectedValue);
                            });
                        </script>



                    </div>
                    <div class="filter__row filter__footer">
                        <button class="btn btn--text filter__cancel js-toggle" toggle-target="#home-filter">
                            Cancel
                        </button>
                        <button
                            class="btn btn--primary filter__submit js-toggle"
                            toggle-target="#home-filter"
                        >
                            Show Result
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row row-cols-5 row-cols-lg-2 row-cols-sm-1 g-3">
       {{-- component --}}
       @if ($data->isEmpty())
           <img class="not_found" src="https://cdni.iconscout.com/illustration/premium/thumb/not-found-7621869-6167023.png" alt="">
       @endif
        @foreach ($data as $item)
             <!-- Product card 2 -->
        <x-card_product
        title="{{ $item->name }}"
        img="./assets/img/product/{{ json_decode($item->images)[0] }}"
        price="{{$item->price}}"
        rating="{{$item->rating}}"
        id="{{ $item->id }}"
    />
        @endforeach

    </div>
</section>

@endsection




