@extends('Layout.layout')
    @section('content')
    @include('components.notification')

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
                    <a href="#!" class="breadcrumbs__link breadcrumbs__link--current">Favorite</a>
                </li>
            </ul>
        </div>

        <!-- Checkout content -->
        <div class="checkout-container">
            <div class="row gy-xl-3">
                <div class="col-12">
                    <div class="cart-info">
                        <h1 class="cart-info__heading">Favourite List</h1>
                        <p class="cart-info__desc">@isset($favoriteCount)
                                {{$favoriteCount}}
                            @endisset item(s)</p>

                        <div class="cart-info__list" style="padding-right: 20px; padding-top: 10px">
                            @foreach ($favorites as $item)
                                <form action="{{route('FavoriteList')}}">
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
                                                                <input name="quantity" type="text" style="width:2rem" class="quantity_coffee" value="1" id="quantity">
                                                                <p class="cart-item__input-btn plus_btn">
                                                                    <img class="icon" src="./assets/icons/plus.svg" alt="" />
                                                                </p>
                                                        </div>
                                                    </div>
                                                    <div class="cart-item__ctrl">
                                                        <a class="delete_product" href="{{route('deleteFavoriteList', $item->id)}}">

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
                                                    <button style="z-index: 0;" class="CartBtn cart-item__checkout-btn btn btn--primary btn--rounded">
                                                        <span class="IconContainer" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="rgb(17, 17, 17)" class="cart"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
                                                        </span>
                                                        <p class="text">Add to Cart</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </form>
                            @endforeach

                        </div>

                        <div class="cart-info__bottom" >
                            <div class="cart-info__row cart-info__row-md--block">
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

                                <input type="hidden" value="[]" class="all_value_checked" name="favorite_product">
                                <script>
                                    // JavaScript
                                    const checkboxes = document.querySelectorAll('.checkbox');
                                    const inputText = document.querySelector('.all_value_checked');

                                   checkboxes.forEach(checkbox => {
                                        checkbox.addEventListener('change', function() {
                                            const checkedValues = Array.from(checkboxes)
                                                .filter(checkbox => checkbox.checked)
                                                .map(checkbox => checkbox.value);

                                            inputText.value = JSON.stringify(checkedValues);
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
<style>
    .CartBtn {
  width: 140px;
  height: 40px;
  border-radius: 12px;
  border: none;
  background-color: rgb(255, 208, 0);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition-duration: .5s;
  overflow: hidden;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.103);
  position: relative;
}

.IconContainer {
  position: absolute;
  left: -50px;
  width: 30px;
  height: 30px;
  background-color: transparent;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  z-index: 2;
  transition-duration: .5s;
}

.icon {
  border-radius: 1px;
}

.text {
  height: 100%;
  width: fit-content;
  display: flex;
  align-items: center;
  justify-content: center;
  color: rgb(17, 17, 17);
  z-index: 1;
  transition-duration: .5s;
  font-size: 1.04em;
  font-weight: 600;
}

.CartBtn:hover .IconContainer {
  transform: translateX(58px);
  border-radius: 40px;
  transition-duration: .5s;
}

.CartBtn:hover .text {
  transform: translate(10px,0px);
  transition-duration: .5s;
}

.CartBtn:active {
  transform: scale(0.95);
  transition-duration: .5s;
}
.delete_product{
display: flex;
justify-content: center;
align-items: center;
gap: 10px
}

    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 400,
      'GRAD' 2,
      'opsz' 24;
      color: red;
    }
    .minus_btn,
    .plus_btn{
        cursor: pointer;
    }
    </style>
 <script>
    document.addEventListener("DOMContentLoaded", function() {
        var cartItems = document.querySelectorAll('.cart-item');

        cartItems.forEach(function(cartItem) {
            var minusButton = cartItem.querySelector('.minus_btn');
            var plusButton = cartItem.querySelector('.plus_btn');
            var quantityInput = cartItem.querySelector('.quantity_coffee');
            var priceInput = cartItem.querySelector('.price_input');
            var totalPriceElement = cartItem.querySelector('.total_price');

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
            });

            plusButton.addEventListener('click', function() {
                increaseQuantity(quantityInput);
                updatePrice();
            });

            // Gắn sự kiện 'input' cho input số lượng để cập nhật giá cả ngay khi số lượng thay đổi
            quantityInput.addEventListener('input', updatePrice);

            // Cập nhật giá cả khi trang web được tải
            updatePrice();
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
    });
</script>


