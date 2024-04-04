@extends('Layout.layout')
    @section('content')
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

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
                    <a href="#!" class="breadcrumbs__link breadcrumbs__link--current">Favorite</a>
                </li>
            </ul>
        </div>
         @if (Session::has('success'))
            <div class="alert alert-info text-center" style="width: 50%; margin: 0 auto; padding-top: 20px">
                {{ Session::get('success') }}
            </div>
        @endif
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
                                                checked
                                                value="{{ $item->id }}"
                                                required
                                            />
                                        </label>
                                        <a href="./product-detail.html">
                                            <img
                                                src="./assets/img/product/{{ json_decode($item->images)[0] }}"
                                                alt="image"
                                                class="cart-item__thumb"
                                            />
                                        </a>
                                        <div class="cart-item__content">
                                            <div class="cart-item__content-left">
                                                <h3 class="cart-item__title">
                                                    <a href="./product-detail.html">
                                                        {{$item->name}}
                                                    </a>
                                                </h3>
                                                <p class="cart-item__price-wrap">
                                                   $ {{$item->price}} | <span class="cart-item__status">In Stock</span>
                                                </p>
                                                <div class="cart-item__ctrl-wrap">
                                                    <div class="cart-item__ctrl cart-item__ctrl--md-block">
                                                        <div class="cart-item__input">
                                                            <button class="cart-item__input-btn">
                                                                <img
                                                                    class="icon"
                                                                    src="./assets/icons/minus.svg"
                                                                    alt=""
                                                                />
                                                            </button>
                                                            <span>1</span>
                                                            <button class="cart-item__input-btn">
                                                                <img
                                                                    class="icon"
                                                                    src="./assets/icons/plus.svg"
                                                                    alt=""
                                                                />
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="cart-item__ctrl">
                                                        <a href="{{route('deleteFavoriteList',$item->id)}}">
                                                            <button
                                                                class="cart-item__ctrl-btn js-toggle"
                                                                toggle-target="#delete-confirm"
                                                            >
                                                                <img src="./assets/icons/trash.svg" alt="" />
                                                                Delete
                                                            </button>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="cart-item__content-right">
                                                <p class="cart-item__total-price">$ {{$item->price}}</p>
                                                <div class="cart-item__checkout-btn btn btn--primary btn--rounded">
                                                    <button class="CartBtn cart-item__checkout-btn btn btn--primary btn--rounded">
                                                        <span class="IconContainer">
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

                        <form class="cart-info__bottom" action="{{route('FavoriteList')}}">
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
                                <button type="submit"
                                    href=""
                                    class="cart-info__checkout-all btn btn--primary btn--rounded"
                                >
                                    Add all to cart
                                </button>
                            </div>
                        </form>
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
</style>
