@extends('Layout.layout')
@section('content')
@include('components.notification')
<style>
    .cart-item__input_quantity{
         margin: 20px 0 0 0 ;
    }
</style>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var quantityInput = document.querySelector('.quantity_coffee');
    var priceInput = document.getElementById('check_price');
    var totalPriceElement = document.getElementById('price');
    var discount = document.getElementById('discount').value;
    var total = document.getElementById('total');

    console.log(discount)

    // Function to calculate total price
    function calculateTotalPrice() {
        var quantity = parseInt(quantityInput.value);
        var price = parseFloat(priceInput.value);
        var totalPrice = quantity * price;
        totalPriceElement.textContent = totalPrice.toFixed(2);
         // Update the total price in the DOM
         let endDisCount = totalPrice - (totalPrice * (discount / 100));
         console.log(endDisCount)
         total.textContent = endDisCount.toFixed(2);
         document.getElementById('total_input').value = endDisCount.toFixed(2);
    }

    // Initial calculation
    calculateTotalPrice();

    // Event listeners for quantity change
    quantityInput.addEventListener('change', function() {
        calculateTotalPrice();
    });

    // Event listeners for decrease and increase buttons
    var minusButton = document.querySelector('.minus_btn');
    var plusButton = document.querySelector('.plus_btn');

    minusButton.addEventListener('click', function() {
        decreaseQuantity();
        calculateTotalPrice();
    });

    plusButton.addEventListener('click', function() {
        increaseQuantity();
        calculateTotalPrice();
    });

    function decreaseQuantity() {
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }

    function increaseQuantity() {
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    }
});

</script>
<main class="product-page">
    <div class="container">
        <!-- Search bar -->
        @include('components.search_small_screen')
        <!-- Breadcrumbs -->
        <div class="product-container">
            <ul class="breadcrumbs">
                @foreach ($data as $item)
                <li>
                    <a href="#!" class="breadcrumbs__link">
                        Departments
                        <img src="./assets/icons/arrow-right.svg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="/" class="breadcrumbs__link">
                        Coffee
                        <img src="./assets/icons/arrow-right.svg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="ProductDetail?id={{$item->id}}" class="breadcrumbs__link">
                        Coffee Beans
                        <img src="./assets/icons/arrow-right.svg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="ProductDetail?id={{$item->id}}" class="breadcrumbs__link breadcrumbs__link--current">{{$item->name}}</a>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Product info -->
        @foreach ($data as $item)


        <div class="product-container prod-info-content">
            <div class="row">
                <div class="col-5 col-xl-6 col-lg-12">
                    <div class="prod-preview">
                        <div class="prod-preview__list">
                            <div class="prod-preview__item">
                                <img src="./assets/img/product/{{ json_decode($item->images)[0] }}" alt="" class="prod-preview__img" />
                            </div>
                            <div class="prod-preview__item">
                                <img src="./assets/img/product/{{ json_decode($item->images)[0] }}" alt="" class="prod-preview__img" />
                            </div>

                        </div>
                        <div class="prod-preview__thumbs">
                            <img
                                src="./assets/img/product/{{ json_decode($item->images)[0] }}"
                                alt=""
                                class="prod-preview__thumb-img prod-preview__thumb-img--current"
                            />
                            <img src="./assets/img/product/{{ json_decode($item->images)[1] }}" alt="" class="prod-preview__thumb-img" />
                            <img src="./assets/img/product/{{ json_decode($item->images)[2] }}" alt="" class="prod-preview__thumb-img" />
                            <img src="./assets/img/product/{{ json_decode($item->images)[3] }}" alt="" class="prod-preview__thumb-img" />
                        </div>
                    </div>
                </div>
                <div class="col-7 col-xl-6 col-lg-12">
                    <form action="{{ route('AddToCart') }}" class="form">
                        <section class="prod-info">
                            <h1 class="prod-info__heading">
                                {{$item->name}}
                            </h1>
                            <div class="row">
                                <div class="col-5 col-xxl-6 col-xl-12">
                                    <div class="prod-prop">
                                        <img src="./assets/icons/star.svg" alt="" class="prod-prop__icon" />
                                        <h4 class="prod-prop__title">({{$item->rating}}) 1100 reviews</h4>
                                    </div>
                                    <label for="" class="form__label prod-info__label">Size/Weight</label>
                                    <div class="filter__form-group">
                                        <div class="form__select-wrap pr-5 p-3">
                                            <input type="text" disabled class="" name="weight" class="" value="{{ $item->weight }}| Gram">
                                            <input class="mr-5 font-bold" value="{{ $item->size }}"/>
                                        </div>
                                    </div>

                                    <div class="cart-item__input cart-item__input_quantity">

                                        <p class="cart-item__input-btn minus_btn">
                                            <img class="icon" src="./assets/icons/minus.svg" alt="" />
                                        </p>
                                        <input name="quantity" type="text" style="width:2rem" class="quantity_coffee" value="1" id="quantity">
                                        <p class="cart-item__input-btn plus_btn">
                                            <img class="icon" src="./assets/icons/plus.svg" alt="" />
                                        </p>
                                        
                                    </div>
                            
                                                                        </div>
                                <div class="col-7 col-xxl-6 col-xl-12">
                                    <div class="prod-props">
                                        <div class="prod-prop">
                                            <img
                                                src="./assets/icons/document.svg"
                                                alt=""
                                                class="prod-prop__icon icon"
                                            />
                                            <h4 class="prod-prop__title">Compare</h4>
                                        </div>
                                        <div class="prod-prop">
                                            <img
                                                src="./assets/icons/buy.svg"
                                                alt=""
                                                class="prod-prop__icon icon"
                                            />
                                            <div>
                                                <h4 class="prod-prop__title">Delivery</h4>
                                                <p class="prod-prop__desc">From $6 for 1-3 days</p>
                                            </div>
                                        </div>
                                        <div class="prod-prop">
                                            <img
                                                src="./assets/icons/bag.svg"
                                                alt=""
                                                class="prod-prop__icon icon"
                                            />
                                            <div>
                                                <h4 class="prod-prop__title">Pickup</h4>
                                                <p class="prod-prop__desc">Out of 2 store, today</p>
                                            </div>

                                        </div>
                                        <div class="prod-info__card">
                                            <div class="prod-info__row">
                                                <input type="hidden" id="check_price" value="{{ $item->price }}">
                                                <span id="price" class="prod-info__price">${{$item->price}}</span>
                                                <span  class="prod-info__tax">{{$item->discount}}%</span>
                                                <input type="hidden" id="discount" value="{{$item->discount}}" name="">
                                            </div>

                                            <p class="prod-info__total-price" id="total"></p>
                                            <input type="hidden" name="total" value="" id="total_input">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <script>
                                                // Lấy các phần tử cần thiết
                                                var priceElement = document.querySelector('.prod-info__price');
                                                console.log(priceElement.innerHTML);
                                                var taxElement = document.querySelector('.prod-info__tax');
                                                var totalPriceElement = document.querySelector('.prod-info__total-price');

                                                // Lấy giá và thuế từ các phần tử và chuyển đổi thành số
                                                var price = parseFloat(priceElement.textContent.replace('$', ''));
                                                var taxPercentage = parseFloat(taxElement.textContent.replace('%', ''));

                                              // Tính toán giá cuối cùng
                                                var totalPrice = price - (price * (taxPercentage / 100));

                                                // Hiển thị giá cuối cùng trong phần tử
                                                totalPriceElement.textContent = '$' + totalPrice.toFixed(2);
                                            </script>
                                            <div class="prod-info__row">
                                                {{-- button coomponent --}}
                                                   <button type="submit" class="btn" style="background-color: #ffb700">Add to cart</button>
                                                    <a type="button" href="{{ route('Favorite', $item->id) }}" class="like-btn prod-info__like-btn">
                                                        <div class="heart-container" onclick="toggleHeartColor()">
                                                        <svg class="heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path class="heart-fill" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Product content -->
        <div class="product-container-review" style="padding-left: 200px">
            <div class="prod-tab js-tabs">
                <ul class="prod-tab__list">
                    <li class="prod-tab__item prod-tab__item--current">Description</li>
                    <li class="prod-tab__item">Review (1100)</li>
                    <li class="prod-tab__item">Similar</li>
                </ul>
                <div class="prod-tab__contents">
                    <div class="prod-tab__content prod-tab__content--current">
                        <div class="row">
                            <div class="col-8 col-xl-10 col-lg-12">
                                <div class="text-content prod-tab__text-content">
                                    <h2>Lorem ipsum dolor sit amet.</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid,
                                        cupiditate. Modi, quidem, ullam sint dolorum recusandae voluptates
                                        dignissimos similique animi assumenda praesentium et! Illum dolorem est
                                        rem voluptas nam! Voluptatem.
                                    </p>
                                    <p>
                                        <img src="./assets/img/product/{{ json_decode($item->images)[0] }}" alt="" />
                                        <em>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</em>
                                    </p>
                                    <blockquote>
                                        <p>
                                            Lorem ipsum dolor sit amet <em>consectetur</em>
                                            <u>adipisicing</u> elit. Aliquid, cupiditate. Modi, quidem, ullam
                                            sint dolorum recusandae voluptates dignissimos similique animi
                                            assumenda praesentium et! Illum dolorem est rem voluptas nam!
                                            Voluptatem.
                                        </p>
                                    </blockquote>
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prod-tab__content">
                        <div class="prod-content">
                            <h2 class="prod-content__heading">What our customers are saying</h2>
                            <div class="row row-cols-3 gx-lg-2 row-cols-md-1 gy-md-3">
                                <!-- Review card 1 -->
                                <div class="col">
                                    <div class="review-card">
                                        <div class="review-card__content">
                                            <img
                                                src="./assets/img/avatar/avatar-1.png"
                                                alt=""
                                                class="review-card__avatar"
                                            />
                                            <div class="review-card__info">
                                                <h4 class="review-card__title">Jakir Hussen</h4>
                                                <p class="review-card__desc">
                                                    Great product, I love this Coffee Beans
                                                </p>
                                            </div>
                                        </div>
                                        <div class="review-card__rating">
                                            <div class="review-card__star-list">
                                                <img
                                                    src="./assets/icons/star.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star-half.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star-blank.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                            </div>
                                            <span class="review-card__rating-title">(3.5) Review</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Review card 2 -->
                                <div class="col">
                                    <div class="review-card">
                                        <div class="review-card__content">
                                            <img
                                                src="./assets/img/avatar/avatar-2.png"
                                                alt=""
                                                class="review-card__avatar"
                                            />
                                            <div class="review-card__info">
                                                <h4 class="review-card__title">Jubed AhGram</h4>
                                                <p class="review-card__desc">
                                                    Awesome Coffee, I love this Coffee Beans
                                                </p>
                                            </div>
                                        </div>
                                        <div class="review-card__rating">
                                            <div class="review-card__star-list">
                                                <img
                                                    src="./assets/icons/star.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star-half.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star-blank.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                            </div>
                                            <span class="review-card__rating-title">(3.5) Review</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Review card 3 -->
                                <div class="col">
                                    <div class="review-card">
                                        <div class="review-card__content">
                                            <img
                                                src="./assets/img/avatar/avatar-3.png"
                                                alt=""
                                                class="review-card__avatar"
                                            />
                                            <div class="review-card__info">
                                                <h4 class="review-card__title">Delwar Hussain</h4>
                                                <p class="review-card__desc">
                                                    Great product, I like this Coffee Beans
                                                </p>
                                            </div>
                                        </div>
                                        <div class="review-card__rating">
                                            <div class="review-card__star-list">
                                                <img
                                                    src="./assets/icons/star.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star-half.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                                <img
                                                    src="./assets/icons/star-blank.svg"
                                                    alt=""
                                                    class="review-card__star"
                                                />
                                            </div>
                                            <span class="review-card__rating-title">(3.5) Review</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prod-tab__content">
                        <div class="prod-content">
                            <h2 class="prod-content__heading">Similar items you might like</h2>
                            <div
                                class="row row-cols-6 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-1 g-2"
                            >
                                <!-- Product card 1 -->
                                <div class="col">
                                    <article class="product-card">
                                        <div class="product-card__img-wrap">
                                            <a href="./product-detail.html">
                                                <img
                                                    src="./assets/img/product/item-1.png"
                                                    alt=""
                                                    class="product-card__thumb"
                                                />
                                            </a>
                                            <button class="like-btn product-card__like-btn">
                                                <img
                                                    src="./assets/icons/heart.svg"
                                                    alt=""
                                                    class="like-btn__icon icon"
                                                />
                                                <img
                                                    src="./assets/icons/heart-red.svg"
                                                    alt=""
                                                    class="like-btn__icon--liked"
                                                />
                                            </button>
                                        </div>
                                        <h3 class="product-card__title">
                                            <a href="./product-detail.html"
                                                >Coffee Beans - Espresso Arabica and Robusta Beans</a
                                            >
                                        </h3>
                                        <p class="product-card__brand">Lavazza</p>
                                        <div class="product-card__row">
                                            <span class="product-card__price">$47.00</span>
                                            <img
                                                src="./assets/icons/star.svg"
                                                alt=""
                                                class="product-card__star"
                                            />
                                            <span class="product-card__score">4.3</span>
                                        </div>
                                    </article>
                                </div>

                                <!-- Product card 2 -->
                                <div class="col">
                                    <article class="product-card">
                                        <div class="product-card__img-wrap">
                                            <a href="./product-detail.html">
                                                <img
                                                    src="./assets/img/product/item-2.png"
                                                    alt=""
                                                    class="product-card__thumb"
                                                />
                                            </a>
                                            <button class="like-btn product-card__like-btn">
                                                <img
                                                    src="./assets/icons/heart.svg"
                                                    alt=""
                                                    class="like-btn__icon icon"
                                                />
                                                <img
                                                    src="./assets/icons/heart-red.svg"
                                                    alt=""
                                                    class="like-btn__icon--liked"
                                                />
                                            </button>
                                        </div>
                                        <h3 class="product-card__title">
                                            <a href="./product-detail.html"
                                                >Lavazza Coffee Blends - Try the Italian Espresso</a
                                            >
                                        </h3>
                                        <p class="product-card__brand">Lavazza</p>
                                        <div class="product-card__row">
                                            <span class="product-card__price">$53.00</span>
                                            <img
                                                src="./assets/icons/star.svg"
                                                alt=""
                                                class="product-card__star"
                                            />
                                            <span class="product-card__score">3.4</span>
                                        </div>
                                    </article>
                                </div>

                                <!-- Product card 3 -->
                                <div class="col">
                                    <article class="product-card">
                                        <div class="product-card__img-wrap">
                                            <a href="./product-detail.html">
                                                <img
                                                    src="./assets/img/product/item-3.png"
                                                    alt=""
                                                    class="product-card__thumb"
                                                />
                                            </a>
                                            <button class="like-btn like-btn--liked product-card__like-btn">
                                                <img
                                                    src="./assets/icons/heart.svg"
                                                    alt=""
                                                    class="like-btn__icon icon"
                                                />
                                                <img
                                                    src="./assets/icons/heart-red.svg"
                                                    alt=""
                                                    class="like-btn__icon--liked"
                                                />
                                            </button>
                                        </div>
                                        <h3 class="product-card__title">
                                            <a href="./product-detail.html"
                                                >Lavazza - Caffè Espresso Black Tin - Ground coffee</a
                                            >
                                        </h3>
                                        <p class="product-card__brand">Welikecoffee</p>
                                        <div class="product-card__row">
                                            <span class="product-card__price">$99.99</span>
                                            <img
                                                src="./assets/icons/star.svg"
                                                alt=""
                                                class="product-card__star"
                                            />
                                            <span class="product-card__score">5.0</span>
                                        </div>
                                    </article>
                                </div>

                                <!-- Product card 4 -->
                                <div class="col">
                                    <article class="product-card">
                                        <div class="product-card__img-wrap">
                                            <a href="./product-detail.html">
                                                <img
                                                    src="./assets/img/product/item-4.png"
                                                    alt=""
                                                    class="product-card__thumb"
                                                />
                                            </a>
                                            <button class="like-btn product-card__like-btn">
                                                <img
                                                    src="./assets/icons/heart.svg"
                                                    alt=""
                                                    class="like-btn__icon icon"
                                                />
                                                <img
                                                    src="./assets/icons/heart-red.svg"
                                                    alt=""
                                                    class="like-btn__icon--liked"
                                                />
                                            </button>
                                        </div>
                                        <h3 class="product-card__title">
                                            <a href="./product-detail.html"
                                                >Qualità Oro Mountain Grown - Espresso Coffee Beans</a
                                            >
                                        </h3>
                                        <p class="product-card__brand">Lavazza</p>
                                        <div class="product-card__row">
                                            <span class="product-card__price">$38.65</span>
                                            <img
                                                src="./assets/icons/star.svg"
                                                alt=""
                                                class="product-card__star"
                                            />
                                            <span class="product-card__score">4.4</span>
                                        </div>
                                    </article>
                                </div>

                                <!-- Product card 5 -->
                                <div class="col">
                                    <article class="product-card">
                                        <div class="product-card__img-wrap">
                                            <a href="./product-detail.html">
                                                <img
                                                    src="./assets/img/product/item-1.png"
                                                    alt=""
                                                    class="product-card__thumb"
                                                />
                                            </a>
                                            <button class="like-btn product-card__like-btn">
                                                <img
                                                    src="./assets/icons/heart.svg"
                                                    alt=""
                                                    class="like-btn__icon icon"
                                                />
                                                <img
                                                    src="./assets/icons/heart-red.svg"
                                                    alt=""
                                                    class="like-btn__icon--liked"
                                                />
                                            </button>
                                        </div>
                                        <h3 class="product-card__title">
                                            <a href="./product-detail.html"
                                                >Coffee Beans - Espresso Arabica and Robusta Beans</a
                                            >
                                        </h3>
                                        <p class="product-card__brand">Lavazza</p>
                                        <div class="product-card__row">
                                            <span class="product-card__price">$47.00</span>
                                            <img
                                                src="./assets/icons/star.svg"
                                                alt=""
                                                class="product-card__star"
                                            />
                                            <span class="product-card__score">4.3</span>
                                        </div>
                                    </article>
                                </div>

                                <!-- Product card 6 -->
                                <div class="col">
                                    <article class="product-card">
                                        <div class="product-card__img-wrap">
                                            <a href="./product-detail.html">
                                                <img
                                                    src="./assets/img/product/item-2.png"
                                                    alt=""
                                                    class="product-card__thumb"
                                                />
                                            </a>
                                            <button class="like-btn product-card__like-btn">
                                                <img
                                                    src="./assets/icons/heart.svg"
                                                    alt=""
                                                    class="like-btn__icon icon"
                                                />
                                                <img
                                                    src="./assets/icons/heart-red.svg"
                                                    alt=""
                                                    class="like-btn__icon--liked"
                                                />
                                            </button>
                                        </div>
                                        <h3 class="product-card__title">
                                            <a href="./product-detail.html"
                                                >Lavazza Coffee Blends - Try the Italian Espresso</a
                                            >
                                        </h3>
                                        <p class="product-card__brand">Lavazza</p>
                                        <div class="product-card__row">
                                            <span class="product-card__price">$53.00</span>
                                            <img
                                                src="./assets/icons/star.svg"
                                                alt=""
                                                class="product-card__star"
                                            />
                                            <span class="product-card__score">3.4</span>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
  /* CSS cho hình trái tim */
.heart-container {
  cursor: pointer;
  display: inline-block;
}

.heart {
  width: 30px;
  height: 30px;
  stroke: black;
}

.heart-fill {
  fill: white; /* Màu nền trắng */
  transition: fill 0.3s ease-in-out;
}

.heart-container.clicked .heart-fill {
  fill: red; /* Màu đỏ khi trái tim được click */
  stroke: red;
}

</style>
<script>
function toggleHeartColor() {
    const heartContainer = document.querySelector('.heart-container');
    heartContainer.classList.toggle('clicked');
}
</script>
@endsection
