
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
                        <div class="cart-info__row">
                            <span>Subtotal <span class="cart-info__sub-label">(items)</span></span>
                            <span>{{ count($products) }}</span>
                        </div>
                        <div class="cart-info__row">
                            <span>Price <span class="cart-info__sub-label">(Total)</span></span>
                            <span id="total-price">${{ $total }}</span>
                        </div>
                        <div class="cart-info__row">
                            <span>Shipping</span>
                            <span class="cart-items__shipping">$10.00</span>
                        </div>
                        <div class="cart-info__separate"></div>
                        <div class="cart-info__row">
                            <span>Estimated Total</span>
                            <span class="estimated_total">{{ $total + 10.00}}</span>
                        </div>
                        <x-button content="Continue to checkout" border_radius="" link="shipping" ></x-button>
                    </div>

                    {{--  --}}


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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var cartItems = document.querySelectorAll('.cart-item');

            // Duyệt qua mỗi sản phẩm trong giỏ hàng và tính toán giá trị totalPrice
            cartItems.forEach(function(cartItem) {
                var quantityInput = cartItem.querySelector('.quantity_coffee');
                calculateTotalPrice(quantityInput);
            });

            var minusButtons = document.querySelectorAll('.minus_btn');
            var plusButtons = document.querySelectorAll('.plus_btn');

            minusButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var input = button.parentElement.querySelector('.quantity_coffee');
                    decreaseQuantity(input);
                    calculateTotalPrice(input); // Gọi lại hàm tính toán giá tiền tổng cộng sau khi giảm số lượng
                    calculateTotal();
                });
            });

            plusButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var input = button.parentElement.querySelector('.quantity_coffee');
                    increaseQuantity(input);
                    calculateTotalPrice(input); // Gọi lại hàm tính toán giá tiền tổng cộng sau khi tăng số lượng
                    calculateTotal();
                });
            });

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

            function calculateTotalPrice(input) {
                var cartItem = input.closest('.cart-item');
                var priceElement = cartItem.querySelector('.cart-item__product-price');
                var taxElement = cartItem.querySelector('.prod-info__tax');

                var taxPercentage = parseFloat(taxElement.textContent.replace('%', ''));
                var price = parseFloat(priceElement.textContent.replace('$', ''));
                var quantity = parseInt(input.value);

                if (quantity > 1) {
                    var totalPrice = quantity * price;
                } else {
                    var totalPrice = price - (price * (taxPercentage / 100));
                }

                totalPriceElement.textContent = '$' + totalPrice.toFixed(2);
            }

            function calculateTotal() {
                var total = 0;

                totalPriceElements.forEach(function(element) {
                    var price = parseFloat(element.textContent.replace('$', ''));
                    total += price;
                });

                // Cập nhật giá trị tổng vào phần tử <span id="total-price">
                var totalPriceSpan = document.getElementById('total-price');
                totalPriceSpan.textContent = '$' + total.toFixed(2);

                // Lấy giá trị của cart-items__shipping
                var shippingPrice = parseFloat(document.querySelector('.cart-items__shipping').textContent.replace('$', ''));

                // Tính toán estimated total và cập nhật vào phần tử <span class="estimated_total">
                var estimatedTotalSpan = document.querySelector('.estimated_total');
                var estimatedTotal = total + shippingPrice;
                estimatedTotalSpan.textContent = '$' + estimatedTotal.toFixed(2);
            }
            calculateTotal();
        });

        //lam chữ sau 10 chữ cái thành ...
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.querySelectorAll('.shop_namem');
            var maxLength = 10;

            elements.forEach(function(element) {
                var text = element.textContent.trim();
                if (text.length > maxLength) {
                    var truncatedText = text.substring(0, maxLength) + '...';
                    element.textContent = truncatedText;
                }
            });
        });
    </script>
</main>
@endsection
