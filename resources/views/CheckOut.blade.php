
@extends('Layout.layout')
    @section('content')

<main class="checkout-page">
    <div class="container">
        <!-- Search bar -->
        <div class="checkout-container">
            <div class="search-bar d-none d-md-flex">
                <input type="text" name="" id="" placeholder="Search for item" class="search-bar__input" />
                <button class="search-bar__submit">
                    <img src="./assets/icons/search.svg" alt="" class="search-bar__icon icon" />
                </button>
            </div>
        </div>

        <!-- Breadcrumbs -->
        <div class="checkout-container">
            <ul class="breadcrumbs checkout-page__breadcrumbs">
                <li>
                    <a href="./" class="breadcrumbs__link">
                        Home
                        <img src="./assets/icons/arrow-right.svg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#!" class="breadcrumbs__link breadcrumbs__link--current">Checkout</a>
                </li>
            </ul>
        </div>

        <!-- Checkout content -->
        <div class="checkout-container">
            <div class="row gy-xl-3">
                <div class="col-8 col-xl-12">
                    <div class="cart-info">
                        <div class="cart-info__list">
                            <!-- Cart item 1 -->
                            <article class="cart-item">
                                <a href="ProductDetail">
                                    <img
                                        src="./assets/img/product/item-1.png"
                                        alt=""
                                        class="cart-item__thumb"
                                    />
                                </a>
                                <div class="cart-item__content">
                                    <div class="cart-item__content-left">
                                        <h3 class="cart-item__title">
                                            <a href="ProductDetail">
                                                Coffee Beans - Espresso Arabica and Robusta Beans
                                            </a>
                                        </h3>
                                        <p class="cart-item__price-wrap">
                                            $47.00 | <span class="cart-item__status">In Stock</span>
                                        </p>
                                        <div class="cart-item__ctrl cart-item__ctrl--md-block">
                                            <div class="cart-item__input">
                                                LavAzza
                                                <img
                                                    class="icon"
                                                    src="./assets/icons/arrow-down-2.svg"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="cart-item__input">
                                                <button class="cart-item__input-btn">
                                                    <img class="icon" src="./assets/icons/minus.svg" alt="" />
                                                </button>
                                                <span>1</span>
                                                <button class="cart-item__input-btn">
                                                    <img class="icon" src="./assets/icons/plus.svg" alt="" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item__content-right">
                                        <p class="cart-item__total-price">$47.00</p>
                                        <div class="cart-item__ctrl">
                                            <button class="cart-item__ctrl-btn">
                                                <img src="./assets/icons/heart-2.svg" alt="" />
                                                Save
                                            </button>
                                            <button
                                                class="cart-item__ctrl-btn js-toggle"
                                                toggle-target="#delete-confirm"
                                            >
                                                <img src="./assets/icons/trash.svg" alt="" />
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- Cart item 2 -->
                            <article class="cart-item">
                                <a href="ProductDetail">
                                    <img
                                        src="./assets/img/product/item-2.png"
                                        alt=""
                                        class="cart-item__thumb"
                                    />
                                </a>
                                <div class="cart-item__content">
                                    <div class="cart-item__content-left">
                                        <h3 class="cart-item__title">
                                            <a href="ProductDetail">
                                                Lavazza Coffee Blends - Try the Italian Espresso
                                            </a>
                                        </h3>
                                        <p class="cart-item__price-wrap">
                                            $53.00 | <span class="cart-item__status">In Stock</span>
                                        </p>
                                        <div class="cart-item__ctrl cart-item__ctrl--md-block">
                                            <div class="cart-item__input">
                                                LavAzza
                                                <img
                                                    class="icon"
                                                    src="./assets/icons/arrow-down-2.svg"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="cart-item__input">
                                                <button class="cart-item__input-btn">
                                                    <img class="icon" src="./assets/icons/minus.svg" alt="" />
                                                </button>
                                                <span>1</span>
                                                <button class="cart-item__input-btn">
                                                    <img class="icon" src="./assets/icons/plus.svg" alt="" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item__content-right">
                                        <p class="cart-item__total-price">$106.00</p>
                                        <div class="cart-item__ctrl">
                                            <button class="cart-item__ctrl-btn">
                                                <img src="./assets/icons/heart-2.svg" alt="" />
                                                Save
                                            </button>
                                            <button
                                                class="cart-item__ctrl-btn js-toggle"
                                                toggle-target="#delete-confirm"
                                            >
                                                <img src="./assets/icons/trash.svg" alt="" />
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- Cart item 3 -->
                            <article class="cart-item">
                                <a href="ProductDetail">
                                    <img
                                        src="./assets/img/product/item-3.png"
                                        alt=""
                                        class="cart-item__thumb"
                                    />
                                </a>
                                <div class="cart-item__content">
                                    <div class="cart-item__content-left">
                                        <h3 class="cart-item__title">
                                            <a href="ProductDetail">
                                                Qualità Oro Mountain Grown - Espresso Coffee Beans
                                            </a>
                                        </h3>
                                        <p class="cart-item__price-wrap">
                                            $38.65 | <span class="cart-item__status">In Stock</span>
                                        </p>
                                        <div class="cart-item__ctrl cart-item__ctrl--md-block">
                                            <div class="cart-item__input">
                                                LavAzza
                                                <img
                                                    class="icon"
                                                    src="./assets/icons/arrow-down-2.svg"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="cart-item__input">
                                                <button class="cart-item__input-btn">
                                                    <img class="icon" src="./assets/icons/minus.svg" alt="" />
                                                </button>
                                                <span>1</span>
                                                <button class="cart-item__input-btn">
                                                    <img class="icon" src="./assets/icons/plus.svg" alt="" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item__content-right">
                                        <p class="cart-item__total-price">$38.65</p>
                                        <div class="cart-item__ctrl">
                                            <button class="cart-item__ctrl-btn">
                                                <img src="./assets/icons/heart-2.svg" alt="" />
                                                Save
                                            </button>
                                            <button
                                                class="cart-item__ctrl-btn js-toggle"
                                                toggle-target="#delete-confirm"
                                            >
                                                <img src="./assets/icons/trash.svg" alt="" />
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="cart-info__bottom d-md-none">
                            <div class="row">
                                <div class="col-8 col-xxl-7">
                                    <div class="cart-info__continue">
                                        <a href="./" class="cart-info__continue-link">
                                            <img
                                                class="cart-info__continue-icon icon"
                                                src="./assets/icons/arrow-down-2.svg"
                                                alt=""
                                            />
                                            Continue Shopping
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 col-xxl-5">
                                    <div class="cart-info__row">
                                        <span>Subtotal:</span>
                                        <span>$191.65</span>
                                    </div>
                                    <div class="cart-info__row">
                                        <span>Shipping:</span>
                                        <span>$10.00</span>
                                    </div>
                                    <div class="cart-info__separate"></div>
                                    <div class="cart-info__row cart-info__row--bold">
                                        <span>Total:</span>
                                        <span>$201.65</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-xl-12">
                    <div class="cart-info">
                        <div class="cart-info__row">
                            <span>Subtotal <span class="cart-info__sub-label">(items)</span></span>
                            <span>3</span>
                        </div>
                        <div class="cart-info__row">
                            <span>Price <span class="cart-info__sub-label">(Total)</span></span>
                            <span>$191.65</span>
                        </div>
                        <div class="cart-info__row">
                            <span>Shipping</span>
                            <span>$10.00</span>
                        </div>
                        <div class="cart-info__separate"></div>
                        <div class="cart-info__row">
                            <span>Estimated Total</span>
                            <span>$201.65</span>
                        </div>
                        <x-button content="Continue to checkout" border_radius="" link="shipping" ></x-button>
                    </div>
                    <div class="cart-info">
                        <a href="#!">
                            <article class="gift-item">
                                <div class="gift-item__icon-wrap">
                                    <img src="./assets/icons/gift.svg" alt="" class="gift-item__icon" />
                                </div>
                                <div class="gift-item__content">
                                    <h3 class="gift-item__title">Send this order as a gift.</h3>
                                    <p class="gift-item__desc">
                                        Available items will be shipped to your gift recipient.
                                    </p>
                                </div>
                            </article>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
