
@extends('profile.Profile')
@section('content-profile')
@section('profile-css')
       <style>
            .notification{
                background-color: rgb(23, 225, 60);
                position: absolute;
                right: 10px;
                padding: 30px;
                display: block;
                position: fixed;
                border-radius: 5px;
            }
       </style>
       <script>
           setTimeout(function(){
               document.getElementById('notification').style.display = 'none';
           },3000)
       </script>
@endsection

@if (isset($message))
    <h1 class="notification" id="notification" >{{$message}}</h1>
@endif

<div class="col-12 content-profile ">

    <h2 class="cart-info__heading">My Wallet</h2>
    <p class="cart-info__desc profile__desc">Payment methods</p>

    <div class="row gy-md-2 row-cols-3 row-cols-xl-2 row-cols-lg-1">


        <!-- Payment card 2 -->
        <div class="col">
            <article class="payment-card" style="--bg-color: #354151">
                <img
                    src="./assets/img/card/leaf-bg.svg"
                    alt=""
                    class="payment-card__img"
                />
                <div class="payment-card__top">
                    <img src="./assets/img/card/leaf.svg" alt="" />
                    <span class="payment-card__type">FeatherCard</span>
                </div>
                <div class="payment-card__number">1234 4567 2221 8901</div>
                <div class="payment-card__bottom">
                    <div>
                        <p class="payment-card__label">Card Holder</p>
                        <p class="payment-card__value">Imran Khan</p>
                    </div>
                    <div class="payment-card__expired">
                        <p class="payment-card__label">Expired</p>
                        <p class="payment-card__value">11/22</p>
                    </div>
                    <div class="payment-card__circle"></div>
                </div>
            </article>
        </div>

        <!-- Add new payment card -->
        <div class="col">
            <a class="new-card" href="create_card">
                <img
                    src="./assets/icons/plus.svg"
                    alt=""
                    class="new-card__icon icon"
                />
                <p class="new-card__text">Add New Card</p>
            </a>
        </div>

    </div>
</div>

<!-- Account info -->
<div class="col-12">
    <h2 class="cart-info__heading">Account info</h2>
    <p class="cart-info__desc profile__desc">
        Addresses, contact information and password
    </p>
    <div class="row gy-md-2 row-cols-2 row-cols-lg-1">
        <!-- Account info 1 -->
        <div class="col">
            <a href="./edit-personal-info.html">
                <article class="account-info">
                    <div class="account-info__icon">
                        <img src="./assets/icons/message.svg" alt="" class="icon" />
                    </div>
                    <div>
                        <h3 class="account-info__title">Email Address</h3>
                        <p class="account-info__desc">{{Auth::user()->email}}</p>
                    </div>
                </article>
            </a>
        </div>

        <!-- Account info 2 -->
        <div class="col">
            <a href="./edit-personal-info.html">
                <article class="account-info">
                    <div class="account-info__icon">
                        <img src="./assets/icons/calling.svg" alt="" class="icon" />
                    </div>
                    <div>
                        <h3 class="account-info__title">Phone number</h3>
                        <p class="account-info__desc">{{Auth::user()->phone_number}}</p>
                    </div>
                </article>
            </a>
        </div>

        <!-- Account info 3 -->
        <div class="col">
            <a href="./edit-personal-info.html">
                <article class="account-info">
                    <div class="account-info__icon">
                        <img
                            src="./assets/icons/location.svg"
                            alt=""
                            class="icon"
                        />
                    </div>
                    <div>
                        <h3 class="account-info__title">Add an address</h3>
                        <p class="account-info__desc">
                            {{Auth::user()->address}}
                        </p>
                    </div>
                </article>
            </a>
        </div>
    </div>
</div>

<div class="col-12">
    <h2 class="cart-info__heading">Lists</h2>
    <p class="cart-info__desc profile__desc">2 items - Primary</p>

    <!-- Favourite item 1 -->
    <article class="favourite-item">
        <img
            src="./assets/img/product/item-1.png"
            alt=""
            class="favourite-item__thumb"
        />
        <div>
            <h3 class="favourite-item__title">
                Coffee Beans - Espresso Arabica and Robusta Beans
            </h3>
            <div class="favourite-item__content">
                <span class="favourite-item__price">$47.00</span>
                <button class="btn btn--primary btn--rounded">Add to cart</button>
            </div>
        </div>
    </article>

    <div class="separate" style="--margin: 20px"></div>

    <!-- Favourite item 2 -->
    <article class="favourite-item">
        <img
            src="./assets/img/product/item-2.png"
            alt=""
            class="favourite-item__thumb"
        />
        <div>
            <h3 class="favourite-item__title">
                Lavazza Coffee Blends - Try the Italian Espresso
            </h3>
            <div class="favourite-item__content">
                <span class="favourite-item__price">$53.00</span>
                <button class="btn btn--primary btn--rounded">Add to cart</button>
            </div>
        </div>
    </article>
</div>

@endsection
