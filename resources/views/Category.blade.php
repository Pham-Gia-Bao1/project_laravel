
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
<<<<<<< HEAD

=======
.not_found{
    width: 50%;
}
>>>>>>> e5f8557848bde9a163d193e8a4de66a7bc039951
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
<<<<<<< HEAD
                                <input type="range" id="priceRangeMax" min="0" max="100" value="100">
=======
                                <input type="range" id="priceRangeMax" min="0" max="1000" value="100">
>>>>>>> e5f8557848bde9a163d193e8a4de66a7bc039951
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
<<<<<<< HEAD
                                            value="100.00"
=======
                                            value="800.00"
>>>>>>> e5f8557848bde9a163d193e8a4de66a7bc039951
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
<<<<<<< HEAD
                        </script>

                        <div class="filter__separate"></div>

                        <!-- Filter column 2 -->
                        <div class="filter__col">
                            <label for="" class="form__label">Size/Weight</label>
                            <div class="filter__form-group">
                                <!-- Thêm dropdown cho các giá trị từ 100 đến 500 -->
                                <div class="form__select-wrap">
                                    <select id="sizeDropdown" class="form__select" name="gam" style="--width: 158px">
                                        <!-- Thêm các tùy chọn từ 100 đến 500 -->
                                        <!-- Sử dụng vòng lặp để tạo các tùy chọn -->
                                        <?php for ($i = 100; $i <= 500; $i += 100): ?>
                                            <option value="<?php echo $i; ?>g"><?php echo $i; ?>g</option>
                                        <?php endfor; ?>
                                    </select>
                                    <!-- Loại bỏ icon form__select-arrow -->
                                </div>
                            </div>
                            <div class="filter__form-group">
                                <div class="form__tags">
                                    <input hidden  type="radio" name="size" id="small" value="Small" class="form__tag">
                                    <label for="small" class="form__tag">Small</label>

                                    <input hidden  type="radio" name="size" id="medium" value="Medium" class="form__tag">
                                    <label for="medium" class="form__tag">Medium</label>

                                    <input hidden  type="radio" name="size" id="large" value="Large" class="form__tag">
                                    <label for="large" class="form__tag">Large</label>
                                </div>
                            </div>
                        </div>

                        <script>
=======

>>>>>>> e5f8557848bde9a163d193e8a4de66a7bc039951
                            // Lắng nghe sự kiện khi dropdown thay đổi
                            document.getElementById('sizeDropdown').addEventListener('change', function() {
                                // Lấy giá trị được chọn trong dropdown
                                var selectedValue = this.value;
                                // Hiển thị giá trị đã chọn trong dropdown
                                console.log(selectedValue);
                            });
                        </script>


<<<<<<< HEAD
                        <div class="filter__separate"></div>

                        <!-- Filter column 3 -->
                        <div class="filter__col">
                            <label for="" class="form__label">Brand</label>
                            <div class="filter__form-group">
                                <div class="filter__form-text-input">
                                    <input
                                        type="text"
                                        name=""
                                        id=""
                                        placeholder="Search brand name"
                                        class="filter__form-input"
                                    />
                                    <img
                                        src="./assets/icons/search.svg"
                                        alt=""
                                        class="filter__form-input-icon icon"
                                    />
                                </div>
                            </div>
                            <div class="filter__form-group">

                                <div class="form__tags">
                                    <input hidden  type="radio" name="box" id="LavAzza" value="LavAzza" class="form__tag">
                                    <label for="LavAzza" class="form__tag">LavAzza</label>

                                    <input hidden  type="radio" name="box" id="Nescafe" value="Nescafe" class="form__tag">
                                    <label for="Nescafe" class="form__tag">Nescafe</label>

                                    <input hidden  type="radio" name="box" id="Dunkin" value="Dunkin" class="form__tag">
                                    <label for="Dunkin" class="form__tag">Dunkin</label>
                                </div>
                            </div>
                        </div>
=======

>>>>>>> e5f8557848bde9a163d193e8a4de66a7bc039951
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
<<<<<<< HEAD
=======
       @if ($data->isEmpty())
           <img class="not_found" src="https://cdni.iconscout.com/illustration/premium/thumb/not-found-7621869-6167023.png" alt="">
       @endif
>>>>>>> e5f8557848bde9a163d193e8a4de66a7bc039951
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




