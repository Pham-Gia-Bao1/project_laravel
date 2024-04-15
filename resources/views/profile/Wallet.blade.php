
@extends('profile.Profile')
@section('content-profile')
@section('profile-css')
<style>
    .date_ordered{
        float:right;
        width:30rem;
        margin-left:10rem;
        margin-top:5rem;
    }
    .btn-detaill{
        margin-left:5rem;
    }
    /* CSS for custom scrollbars */
.custom-scrollbar::-webkit-scrollbar {
    width: 10px; /* Width of vertical scrollbar */
}

.custom-scrollbar::-webkit-scrollbar-track {
    background-color: #f1f1f1; /* Background color of scrollbar track */
    border-radius: 10px; /* Border radius of scrollbar track */
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background-color: #77DAE6; /* Color of scrollbar thumb */
    border-radius: 10px; /* Border radius of scrollbar thumb */
}

</style>

@endsection

@include('components.notification')

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
    <h2 class="cart-info__heading">Purchase-history</h2>
    <p class="cart-info__desc profile__desc">{{ count($selectedCoffees) }} items - Primary</p>
    <div class="custom-scrollbar" style="overflow-y: scroll; max-height: 400px;">
        @foreach ($selectedCoffees as $selectedCoffee)
            <!-- Favourite item 1 -->
            <div class="item_order" style="display: flex">
                <article class="favourite-item">
                    <a href="{{ route('ProductDetail', ['id' => $selectedCoffee['coffee']->id]) }}">
                        <img
                            src="./assets/img/product/{{ json_decode($selectedCoffee['coffee']->images)[0] }}"
                            alt=""
                            class="favourite-item__thumb"
                        />
                    </a>
                    <div>
                        <h3 class="favourite-item__title">
                            {{ $selectedCoffee['coffee']->name }}
                        </h3>
                        <div class="favourite-item__content">
                            <span class="favourite-item__price">{{ $selectedCoffee['coffee']->price }}</span>
                            <a class="btn-detaill" href="{{ route('ProductDetail', ['id' => $selectedCoffee['coffee']->id]) }}">
                                <button class="btn btn--primary btn--rounded m-5">View detail</button>
                            </a>
                        </div>
                    </div>
                </article>
                <div class="date_ordered">
                    <p>Order date: {{ $selectedCoffee['order_date'] }}</p>
                </div>
            </div>
            <div class="separate" style="--margin: 20px"></div>
        @endforeach
    </div>
    


</div>

@endsection
