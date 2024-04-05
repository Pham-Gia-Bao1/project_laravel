@extends('Layout.layout')
    @section('content')
    @include('components.notification')
        <!-- MAIN -->
        <main class="checkout-page">
            <div class="container">
                <!-- Search bar -->
                @include('components.search_small_screen')


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
                            <a href="checkout" class="breadcrumbs__link">
                                Checkout
                                <img src="./assets/icons/arrow-right.svg" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="breadcrumbs__link breadcrumbs__link--current">Shipping</a>
                        </li>
                    </ul>
                </div>

                <!-- Checkout content -->
                <div class="checkout-container">
                    <div class="row gy-xl-3">
                        <div class="col-8 col-xl-12">
                            <div class="cart-info">
                                <h1 class="cart-info__heading">Shipping</h1>
                                <div class="cart-info__separate"></div>

                                <!-- Checkout address -->
                                <div class="user-address">
                                    <div class="user-address__top">
                                        <div>
                                            <h2 class="user-address__title">Shipping address</h2>
                                            <p class="user-address__desc">Where should we deliver your order?</p>
                                        </div>
                                        <button
                                            class="user-address__btn btn btn--primary btn--rounded btn--small js-toggle"
                                            toggle-target="#add-new-address"
                                            id="btn_show_form"
                                        >
                                            <img src="./assets/icons/plus.svg" alt="" />
                                            Add a new address
                                        </button>
                                        <script>
                                            document.getElementById('btn_show_form').addEventListener('click', function(e) {
                                            e.preventDefault();
                                            var addNewAddress = document.getElementById('add-new-address');
                                            addNewAddress.style.display = 'block';
                                            addNewAddress.classList.add('show');
                                            addNewAddress.classList.remove('hide');
                                        });

                                        </script>
                                    </div>
                                    <div class="user-address__list">
                                        <!-- Empty message -->
                                        <!-- <p class="user-address__message">
                                            Not address yet.
                                            <a class="user-address__link js-toggle" href="#!" toggle-target="#add-new-address">Add a new address</a>
                                        </p> -->

                                        <!-- Address card 1 -->

                                        {{-- {{ dd($user->name)}} --}}
                                        <!-- Address card 2 -->
                                        <article class="address-card">
                                            <div class="address-card__left">
                                                <div class="address-card__choose">
                                                    <label class="cart-info__checkbox">
                                                        <input
                                                            type="radio"
                                                            checked
                                                            name="shipping-adress"
                                                            class="cart-info__checkbox-input"
                                                        />
                                                    </label>
                                                </div>
                                                <div class="address-card__info">
                                                    <h3 class="address-card__title">{{$user->first_name}}</h3>
                                                    <p class="address-card__desc">
                                                        {{ $user->address }}
                                                    </p>
                                                    <ul class="address-card__list">
                                                        <li class="address-card__list-item">Shipping</li>
                                                        <li class="address-card__list-item">Delivery from store</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </article>
                                    </div>
                                </div>

                                <div class="cart-info__separate"></div>

                                <h2 class="cart-info__sub-heading">Items details</h2>
                                <div class="cart-info__list">
                                    <?php $total = 0 ?>
                                   @foreach ($products as $product)
                                        <?php $total += $product->total_price ?>

                                        <!-- Cart item 1 -->
                                        <article class="cart-item">
                                            <a href="ProductDetail">
                                                <img
                                                    src="./assets/img/product/{{ json_decode($product->images)[0] }}"
                                                    alt=""
                                                    class="cart-item__thumb"
                                                />
                                            </a>
                                            <div class="cart-item__content">
                                                <div class="cart-item__content-left">
                                                    <h3 class="cart-item__title">
                                                        <a href="ProductDetail">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h3>
                                                    <p class="cart-item__price-wrap">
                                                        <span class="cart-item__product-price"> ${{ $product->total_price }}</span> | <span class="cart-item__status quantity_in_stock">In Stock: {{ $product->quantity }}</span>
                                                    </p>
                                                    <div class="cart-item__ctrl cart-item__ctrl--md-block">
                                                        <div class="cart-item__input shop_namem">
                                                            {{ $product->coffee_shops_name }}
                                                        </div>
                                                        <div class="cart-item__input">

                                                            <input type="text" style="width:2rem" class="quantity_coffee" value="{{ $product->quantity_categories }}">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-item__content-right">
                                                    <div class="sub_price">
                                                        <p class="cart-item__total-price"></p>
                                                        <p class="prod-info__tax" style="float:right;width: 25%; display:none"></p>
                                                    </div>
                                                    <div class="cart-item__ctrl">
                                                        <button class="cart-item__ctrl-btn">
                                                            <img src="./assets/icons/heart-2.svg" alt="" />
                                                            Save
                                                        </button>
                                                        <form action="{{ route('deleteItem', ['id' => $product->id]) }}" method="GET">
                                                            <button type="submit" class="cart-item__ctrl-btn">
                                                                <img src="./assets/icons/trash.svg" alt="" />
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                   @endforeach
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

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-xl-12">
                            <div class="cart-info">
                                <form method="post" action="{{url('/payment')}}" class="row gy-xl-3">
                                    @csrf
                                <div class="cart-info__row">
                                    <span>Subtotal <span class="cart-info__sub-label">(items)</span></span>
                                    <span>{{ count($products) }}</span>
                                </div>
                                <div class="cart-info__row">
                                    <span>Price <span class="cart-info__sub-label">(Total)</span></span>
                                    <span>${{ $total }}</span>
                                </div>
                                <div class="cart-info__row">
                                    <span>Shipping</span>
                                    <span>$10.00</span>
                                </div>
                                <div class="cart-info__separate"></div>
                                <div class="cart-info__row">
                                    <span>Estimated Total</span>
                                    <input name="total" value="{{ $total + 10.00}}">
                                </div>

                                <button type="submit" name="payUrl" value="payUrl" class="cart-info__next-btn btn btn--primary btn--rounded">Pay ${{ $total + 10.00}}</button>

                                </form>
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


        <!-- Modal: confirm remove shopping cart item -->
        <div id="delete-confirm" class="modal modal--small hide">
            <div class="modal__content">
                <p class="modal__text">Do you want to remove this item from shopping cart?</p>
                <div class="modal__bottom">
                    <button class="btn btn--small btn--outline modal__btn js-toggle" toggle-target="#delete-confirm">
                        Cancel
                    </button>
                    <button
                        class="btn btn--small btn--danger btn--primary modal__btn btn--no-margin js-toggle"
                        toggle-target="#delete-confirm"
                    >
                        Delete
                    </button>
                </div>
            </div>
            <div class="modal__overlay js-toggle" toggle-target="#delete-confirm"></div>
        </div>

        <!-- Modal: address new shipping address -->
        <div id="add-new-address" class="modal hide" style="--content-width: 650px">
            <div class="modal__content">
                <form action="" class="form">
                    <h2 class="modal__heading">Add new shipping address</h2>
                    <div class="modal__body">
                        <div class="form__row">
                            <div class="form__group">
                                <label for="name" class="form__label form__label--small">Name</label>
                                <div class="form__text-input form__text-input--small">
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        placeholder="Name"
                                        class="form__input"
                                        required
                                        minlength="2"
                                    />
                                    <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                                </div>
                                <p class="form__error">Name must be at least 2 characters</p>
                            </div>
                            <div class="form__group">
                                <label for="phone" class="form__label form__label--small">Phone</label>
                                <div class="form__text-input form__text-input--small">
                                    <input
                                        type="tel"
                                        name="phone"
                                        id="phone"
                                        placeholder="Phone"
                                        class="form__input"
                                        required
                                        minlength="10"
                                    />
                                    <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                                </div>
                                <p class="form__error">Phone must be at least 10 characters</p>
                            </div>
                        </div>
                        <div class="form__group">
                            <label for="address" class="form__label form__label--small">Address</label>
                            <div class="form__text-area">
                                <textarea
                                    name="address"
                                    id="address"
                                    placeholder="Address (Area and street)"
                                    class="form__text-area-input"
                                    required
                                ></textarea>
                                <img src="./assets/icons/form-error.svg" alt="" class="form__input-icon-error" />
                            </div>
                            <p class="form__error">Address not empty</p>
                        </div>
                        <div class="form__group">
                            <label for="city" class="form__label form__label--small">City/District/Town</label>
                            <div class="form__text-input form__text-input--small">

                                <select name="city" class="form__options-list">
                                    <option value="hanoi">Ha Noi</option>
                                    <option value="hochiminh">Ho Chi Minh</option>
                                    <option value="danang">Da Nang</option>
                                    <!-- Thêm các tùy chọn khác nếu cần -->
                                </select>
                                <style>
                                    .form__options-list option{
                                         padding: 20px !important;
                                    }
                                </style>
                            </div>
                            <p class="form__error">Phone must be at least 11 characters</p>
                        </div>
                        <div class="form__group form__group--inline">
                            <label class="form__checkbox">
                                <input type="checkbox" name="" checked id="" class="form__checkbox-input d-none" />
                                <span class="form__checkbox-label">Set as default address</span>
                            </label>
                        </div>
                    </div>
                    <div class="modal__bottom">
                        <button class="btn btn--small btn--text modal__btn js-toggle" id="cancel_form">
                            Cancel
                        </button>
                        <script>
                            document.getElementById('cancel_form').addEventListener('click', function(e) {
                            e.preventDefault();
                            var addNewAddress = document.getElementById('add-new-address');
                            addNewAddress.style.display = 'none';
                            addNewAddress.classList.add('hide');
                            addNewAddress.classList.remove('show');
                        });

                        </script>
                        <button type="submit"
                            class="btn btn--small btn--primary modal__btn btn--no-margin js-toggle">
                            Create
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal__overlay"></div>
        </div>
    </body>



    @endsection
