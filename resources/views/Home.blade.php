@extends('Layout.layout')
@section('content')
    <script>
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
            // Sau khi ẩn thông báo, tải lại trang
            window.location.href = '/'; // Điều hướng về trang chính (home)

        }, 3000);
    </script>
    @if (isset($message))
        <h1 class="notification" id="notification"
            style="background-color: green;float:right; width: 20%;padding:30px;position:fixed;right:0;z-index:99999;color:white">
            {{ $message }}</h1>
    @endif
    <!-- MAIN -->
    <main class="container home">
        <!-- Slideshow -->
        @include('Layout.hero')
        <!-- Browse Categories -->
        <section class="home__container">
            <div class="home__row">
                <h2 class="home__heading">Browse Categories</h2>
            </div>
            @if (isset($message))
                <div id="alert" class="custom-alert" role="alert">
                    {{ $message }}
                </div>
            @endif
            <div class="d-flex gap-3 row-top row-cols-3 row-cols-md-1 no-gutters flex-nowrap overflow-scroll">
                <!-- Category items -->
                {{-- component --}}
                @php
                    $count = 0;
                @endphp
                @foreach ($data as $item)
                    @php
                        $count += 1;
                    @endphp
                    <!-- Product card -->
                    <x-card_product_top title="{{ $item->name }}"
                        img="./assets/img/product/{{ json_decode($item->images)[0] }}" price="{{ $item->price }}"
                        id="{{ $item->id }}" />

                    @if ($count >= 5)
                        @break
                    @endif
                @endforeach
            </div>
        </section>
        <!-- Browse Products -->
        <section class="home__container">
            <div class="home__row">
                <h2 class="home__heading">Total products </h2>
                <div class="filter-wrap">
                    <button class="filter-btn js-toggle" toggle-target="#home-filter">
                        Filter
                        <img src="./assets/icons/filter.svg" alt="" class="filter-btn__icon icon" />
                    </button>

                    <div id="home-filter" class="filter hide">
                        <img src="./assets/icons/arrow-up.png" alt="" class="filter__arrow" />
                        <h3 class="filter__heading">Filter</h3>
                        <form action="" class="filter__form form">
                            <div class="filter__row filter__content">
                                <!-- Filter column 1 -->
                                <div class="filter__col">
                                    <label for="" class="form__label">Price</label>
                                    <div class="filter__form-group">
                                        <div class="filter__form-slider" style="--min-value: 10%; --max-value: 60%"></div>
                                    </div>
                                    <div class="filter__form-group filter__form-group--inline">
                                        <div>
                                            <label for="" class="form__label form__label--small"> Minimum </label>
                                            <div class="filter__form-text-input filter__form-text-input--small">
                                                <input type="text" name="" id=""
                                                    class="filter__form-input" value="$30.00" />
                                            </div>
                                        </div>
                                        <div>
                                            <label for="" class="form__label form__label--small"> Maximum </label>
                                            <div class="filter__form-text-input filter__form-text-input--small">
                                                <input type="text" name="" id=""
                                                    class="filter__form-input" value="$100.00" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="filter__separate"></div>

                                <!-- Filter column 2 -->
                                <div class="filter__col">
                                    <label for="" class="form__label">Size/Weight</label>
                                    <div class="filter__form-group">
                                        <div class="form__select-wrap">
                                            <div class="form__select" style="--width: 158px">
                                                500g
                                                <img src="./assets/icons/select-arrow.svg" alt=""
                                                    class="form__select-arrow icon" />
                                            </div>
                                            <div class="form__select">
                                                Gram
                                                <img src="./assets/icons/select-arrow.svg" alt=""
                                                    class="form__select-arrow icon" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter__form-group">
                                        <div class="form__tags">
                                            <button class="form__tag">Small</button>
                                            <button class="form__tag">Medium</button>
                                            <button class="form__tag">Large</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="filter__separate"></div>

                                <!-- Filter column 3 -->
                                <div class="filter__col">
                                    <label for="" class="form__label">Brand</label>
                                    <div class="filter__form-group">
                                        <div class="filter__form-text-input">
                                            <input type="text" name="" id=""
                                                placeholder="Search brand name" class="filter__form-input" />
                                            <img src="./assets/icons/search.svg" alt=""
                                                class="filter__form-input-icon icon" />
                                        </div>
                                    </div>
                                    <div class="filter__form-group">
                                        <div class="form__tags">
                                            <button class="form__tag">Lavazza</button>
                                            <button class="form__tag">Nescafe</button>
                                            <button class="form__tag">Starbucks</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter__row filter__footer">
                                <button class="btn btn--text filter__cancel js-toggle" toggle-target="#home-filter">
                                    Cancel
                                </button>
                                <button class="btn btn--primary filter__submit js-toggle" toggle-target="#home-filter">
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
                <style>
                    .notfound{
                        width: 100%;
                        /* background-color: green !important; */
                        text-align: center;
                        padding: 30px;
                        font-size: 20px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                    .notfound img{
                        width: 30%;
                    }
                </style>
                <div class="notfound">
                    <h1 >Products not found!</h1>
                    <img class="not_found" src="https://cdni.iconscout.com/illustration/premium/thumb/not-found-7621869-6167023.png" alt="">
                </div>
                @endif
                @foreach ($data as $item)
                    <!-- Product card 2 -->
                    <x-card_product title="{{ $item->name }}"
                        img="./assets/img/product/{{ json_decode($item->images)[0] }}" price="{{ $item->price }}"
                        rating="{{ $item->rating }}" id="{{ $item->id }}" />
                @endforeach

            </div>
        </section>
        <div class="team">
            <div class="">

                <div class="row mb-5">
                    <div class="col-lg-5 mx-auto text-center">
                        <h1 class="section-title">Our Team</h1>
                    </div>
                </div>

                <div class="row1">

                    <!-- Start Column 1 -->
                    <div class="row1-item">
                        <img src="assets/img/another-img/person_1.jpg" class="img-fluid mb-5">
                        <h3><a href="#"><span class="">Lawson</span> Arnold</a></h3>
                        <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                        <p>Separated they live in.
                            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
                            ocean.</p>
                        <p class="mb-0"><a href="#" class="more dark">Learn More <span
                                    class="icon-arrow_forward"></span></a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="row1-item">
                        <img src="assets/img/another-img/person_2.jpg" class="img-fluid mb-5">

                        <h3><a href="#"><span class="">Jeremy</span> Walker</a></h3>
                        <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                        <p>Separated they live in.
                            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
                            ocean.</p>
                        <p class="mb-0"><a href="#" class="more dark">Learn More <span
                                    class="icon-arrow_forward"></span></a></p>

                    </div>
                    <!-- End Column 2 -->

                    <!-- Start Column 3 -->
                    <div class="row1-item">
                        <img src="assets/img/another-img/person_3.jpg" class="img-fluid mb-5">
                        <h3><a href="#"><span class="">Patrik</span> White</a></h3>
                        <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                        <p>Separated they live in.
                            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
                            ocean.</p>
                        <p class="mb-0"><a href="#" class="more dark">Learn More <span
                                    class="icon-arrow_forward"></span></a></p>
                    </div>
                    <!-- End Column 3 -->

                    <!-- Start Column 4 -->
                    <div class="row1-item">
                        <img src="assets/img/another-img/person_4.jpg" class="img-fluid mb-5">

                        <h3><a href="#"><span class="">Kathryn</span> Ryan</a></h3>
                        <span class="d-block position mb-4">CEO, Founder, Atty.</span>
                        <p>Separated they live in.
                            Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
                            ocean.</p>
                        <p class="mb-0"><a href="#" class="more dark">Learn More <span
                                    class="icon-arrow_forward"></span></a></p>


                    </div>
                    <!-- End Column 4 -->


                </div>
            </div>
        </div>
    </main>



@endsection
