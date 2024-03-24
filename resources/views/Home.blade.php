@extends('Layout.layout')
    @section('content')

        <!-- MAIN -->
        <main class="container home">
            <!-- Slideshow -->
            <div class="home__container">
                <div class="slideshow">
                    <div class="slideshow__inner">
                        <div class="slideshow__item">
                            <a href="#!" class="slideshow__link">
                                <picture>
                                    <source
                                        media="(max-width: 767.98px)"
                                        srcset="./assets/img/slideshow/item-1-md.png"
                                    />
                                    <img src="./assets/img/slideshow/item-1.png" alt="" class="slideshow__img" />
                                </picture>
                            </a>
                        </div>
                    </div>

                    <div class="slideshow__page">
                        <span class="slideshow__num">1</span>
                        <span class="slideshow__slider"></span>
                        <span class="slideshow__num">5</span>
                    </div>
                </div>
            </div>

            <!-- Browse Categories -->
            <section class="home__container">
                <div class="home__row">
                    <h2 class="home__heading">Browse Categories</h2>
                </div>
                @if (isset($message))
                <div id="alert" class="custom-alert" role="alert">
                    {{$message}}
                </div>               
                @endif
                <div class="d-flex gap-3 row-top  row-cols-3 row-cols-md-1 no-gutters flex-nowrap overflow-scroll ">
                    <!-- Category item  -->
                    {{-- component --}}
                    @foreach ($data as $item)

                    <!-- Product card 2 -->
                    <x-card_product_top
                        title="{{ $item->name }}"
                        img="./assets/img/product/{{ json_decode($item->images)[0] }}"
                        price="{{$item->price}}"

                        id="{{ $item->id }}"
                        />
                    @endforeach

                </div>
            </section>

            <!-- Browse Products -->
            <section class="home__container">
                <div class="home__row">
                    <h2 class="home__heading">Total LavAzza 1320</h2>
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
                                            <div
                                                class="filter__form-slider"
                                                style="--min-value: 10%; --max-value: 60%"
                                            ></div>
                                        </div>
                                        <div class="filter__form-group filter__form-group--inline">
                                            <div>
                                                <label for="" class="form__label form__label--small"> Minimum </label>
                                                <div class="filter__form-text-input filter__form-text-input--small">
                                                    <input
                                                        type="text"
                                                        name=""
                                                        id=""
                                                        class="filter__form-input"
                                                        value="$30.00"
                                                    />
                                                </div>
                                            </div>
                                            <div>
                                                <label for="" class="form__label form__label--small"> Maximum </label>
                                                <div class="filter__form-text-input filter__form-text-input--small">
                                                    <input
                                                        type="text"
                                                        name=""
                                                        id=""
                                                        class="filter__form-input"
                                                        value="$100.00"
                                                    />
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
                                                    <img
                                                        src="./assets/icons/select-arrow.svg"
                                                        alt=""
                                                        class="form__select-arrow icon"
                                                    />
                                                </div>
                                                <div class="form__select">
                                                    Gram
                                                    <img
                                                        src="./assets/icons/select-arrow.svg"
                                                        alt=""
                                                        class="form__select-arrow icon"
                                                    />
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
        </main>



    @endsection
