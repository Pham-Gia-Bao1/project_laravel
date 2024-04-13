
@extends('Layout.layout')
    @section('content')
    <style>
        .alert-success, .alert-error{
            width: 20%;
            position: absolute;
            right: 0;
            padding: 20px;
            border-radius: 5px;
            color: white;
            opacity: 0.7;
            transition: opacity 0.3s ease; /* Thêm transition cho hiệu ứng mờ */
        }
        .alert-success{
            background-color: green;
        }
        .alert-error{
            background-color: red;
        }

    </style>
<main class="checkout-page">
   @include('components.notification')
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
                            <?php   $total = 0;
                                    $allIdProduct = [];
                                    $allQuantity = [];
                             ?>
                            @foreach ($products as $item)
                            @php

                                array_push($allIdProduct, $item->id);


                            @endphp
                            <form>
                                <article class="cart-item">
                                    <label class="cart-info__checkbox">
                                        <input
                                            type="checkbox"
                                            name="favorite_product"
                                            class="cart-info__checkbox-input checkbox"
                                            value="{{ $item->id }}"
                                            required
                                            checked
                                        />
                                    </label>
                                    <a >
                                        <img
                                            src="./assets/img/product/{{ json_decode($item->images)[0] }}"
                                            alt="image"
                                            class="cart-item__thumb"
                                        />
                                    </a>
                                    <div class="cart-item__content">
                                        <div class="cart-item__content-left">
                                            <h3 class="cart-item__title">
                                                <a >
                                                    {{$item->name}}
                                                </a>
                                            </h3>
                                            <p class="cart-item__price-wrap">
                                               $ {{$item->price}} | <span class="cart-item__status">In Stock</span>
                                            </p>
                                            <div class="cart-item__ctrl-wrap">
                                                <div class="cart-item__ctrl cart-item__ctrl--md-block">
                                                    <div class="cart-item__input">

                                                            <p class="cart-item__input-btn minus_btn">
                                                                <img class="icon" src="./assets/icons/minus.svg" alt="" />
                                                            </p>
                                                            <input name="quantity" type="text" style="width:2rem" class="quantity_coffee" value="{{ $item->quantity_categories }}" id="quantity">
                                                            <p class="cart-item__input-btn plus_btn">
                                                                <img class="icon" src="./assets/icons/plus.svg" alt="" />
                                                            </p>


                                                    </div>
                                                </div>
                                                <div class="cart-item__ctrl">
                                                    <a class="delete_product" href="{{route('deleteItem', $item->id)}}">

                                                        <span class="material-symbols-outlined">
                                                            delete
                                                            </span>


                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item__content-right">
                                            <input type="hidden" value="{{ $item->price }}" id="price" class="price_input">
                                            <input name="total" id="total_price" class="cart-item__total-price total_price" value="{{$item->price}}"></input>

                                            <div class="cart-item__checkout-btn btn btn--primary btn--rounded" style="background-color: #ffff">

                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </form>
                        @endforeach
                        {{-- @php(dd($allIdProduct)) --}}
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
                    <form action="{{ route('checkoutRefesh') }}"  class="cart-info">
                      {{-- Hiển thị input chứa các ID sản phẩm --}}
                        <input type="text" value="{{ implode(',', $allIdProduct) }}" name="all_id_products">

                        {{-- quantity  --}}
                        <input type="text" value="" name="all_quantity_products" id="all_quantity_products">
                        <div class="cart-info__row">
                            <span>Subtotal <span class="cart-info__sub-label">(items)</span></span>
                            <span>{{ count($products) }}</span>
                        </div>
                        <div class="cart-info__row">
                            <span>Price <span class="cart-info__sub-label">(Total)</span></span>
                            <span id="total-all-price">12</span>
                        </div>
                        <div class="cart-info__row">
                            <span>Shipping</span>
                            <span class="cart-items__shipping">10.00</span>
                        </div>
                        <div class="cart-info__separate"></div>
                        <div class="cart-info__row">
                            <span>Estimated Total</span>
                            <span class="estimated_total"></span>
                        </div>

                        <button type="submit" style="margin: 10px ; border-radius: 30px; background-color:#ffb700"
                        class="cart-info__checkout-all btn ">Continue to checkout</button>
                    </form>
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
<script>
   var total_price = parseInt(document.getElementById('total-all-price').innerHTML).toFixed(2);


    document.addEventListener("DOMContentLoaded", function() {

        var cartItems = document.querySelectorAll('.cart-item');
        var totalPrice = 0;
        var allQuantitiesArr = []; // Mảng chứa tất cả số lượng sản phẩm
        var allQuantitiesInputs = document.querySelectorAll('.quantity_coffee');

        // Lặp qua các input số lượng và lấy giá trị ban đầu của từng sản phẩm




        cartItems.forEach(function(cartItem) {

            var quantityInput = cartItem.querySelector('.quantity_coffee');

            var minusButton = cartItem.querySelector('.minus_btn');
            var plusButton = cartItem.querySelector('.plus_btn');
            var priceInput = cartItem.querySelector('.price_input');
            var totalPriceElement = cartItem.querySelector('.total_price');
            getPrice()

            // Định nghĩa hàm để cập nhật giá cả khi số lượng thay đổi
            function updatePrice() {
                let quantity = parseFloat(quantityInput.value);
                let price = parseFloat(priceInput.value);
                let totalPrice = quantity * price;
                totalPriceElement.value = totalPrice.toFixed(2);


            }

            // Gắn sự kiện 'click' cho các nút tăng/giảm số lượng
            minusButton.addEventListener('click', function() {
                decreaseQuantity(quantityInput);
                updatePrice();
                getPrice();


            });


            plusButton.addEventListener('click', function() {
                increaseQuantity(quantityInput);
                updatePrice();
                getPrice()

            });


            // Cập nhật giá cả khi trang web được tải
            updatePrice();


        });

        function getPrice(){
            const priceAllItems = document.querySelectorAll('.total_price');
            var allTotalPrice = 0.0;
            priceAllItems.forEach(function(item) {
                allTotalPrice += parseFloat(item.value);
            })

            document.getElementById('total-all-price').textContent = allTotalPrice.toFixed(2);
            document.querySelector('.estimated_total').textContent = allTotalPrice+10.000;

            // Xóa tất cả các phần tử khỏi mảng
            allQuantitiesArr = [];

            // Lặp qua các input số lượng và thêm giá trị vào mảng
            allQuantitiesInputs.forEach(function(quantityInput) {
                var initialValue = parseInt(quantityInput.value);
                allQuantitiesArr.push(initialValue);
            });
           var all_quantity_products =  document.getElementById('all_quantity_products');
           all_quantity_products.value = allQuantitiesArr;

        }

        function decreaseQuantity(input) {
            var currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }

        }

        function increaseQuantity(input) {
            var currentValue = parseInt(input.value);
            input.value = currentValue + 1;
        }
    });
</script>
@endsection
