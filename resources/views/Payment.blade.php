@extends('Layout.layout')
@section('content')

    <!-- MAIN -->
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
                        <a href="/" class="breadcrumbs__link">
                            Home
                            <img src="./assets/icons/arrow-right.svg" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="checkout" class="breadcrumbs__link">
                            Checkout
                            <img src="./assets/icons/arrow-right.svg" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="shipping" class="breadcrumbs__link">
                            Shipping
                            <img src="./assets/icons/arrow-right.svg" alt="" />
                        </a>
                    </li>
                    <li>
                        <a href="#!" class="breadcrumbs__link breadcrumbs__link--current">Payment method</a>
                    </li>
                </ul>
            </div>

            <!-- Checkout content -->
            <div class="checkout-container">
                <form method="post" action="{{url('/payment')}}" class="row gy-xl-3">
                    @csrf
                    <div class="col-8 col-xl-8 col-lg-12">
                        <div class="cart-info">
                            <h2 class="cart-info__heading cart-info__heading--lv2">2. Shipping method</h2>
                            <div class="cart-info__separate"></div>
                            <h3 class="cart-info__sub-heading">Available Shipping method</h3>

                            <!-- Payment items -->
                            <label class="payment-item payment-item--pointer" style="width: 100%">
                                Momo
                                <input name="payment-method" id="momo" type="radio" value="momo">
                            </label>

                            <label class="payment-item payment-item--pointer" style="width: 100%">
                                    Card
                                    <input name="payment-method" type="radio" value="card">
                            </label>
                        </div>
                    </div>
                    <div class="col-4 col-xl-4 col-lg-12">
                        <div class="cart-info">
                            <h2 class="cart-info__heading cart-info__heading--lv2">Payment Details</h2>

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
                                <input name="total" value="201.65">
                            </div>
                            <button type="submit" name="payUrl" value="payUrl" class="cart-info__next-btn btn btn--primary btn--rounded">Pay $201.65</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

@endsection
