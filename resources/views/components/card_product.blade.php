

<div class="col ">
    {{-- <a  href="{{route('ProductDetail',['name' => $title])}}"> --}}
        <article class="product-card card-body " >
            <div class="product-card__img-wrap">
                <a  href="{{route('ProductDetail',['id' => $id])}}">
                    <img src="{{$img}}" alt="" class="product-card__thumb" />
                </a>

                <button class="like-btn like-btn--liked product-card__like-btn">
                    <img  src="./assets/icons/heart.svg" alt="" class="like-btn__icon icon" />
                    <img src="./assets/icons/heart-red.svg" alt="" class="like-btn__icon--liked" />
                </button>
                
            </div>
            <h3 class="product-card__title">
                <a href="{{route('ProductDetail',['name' => $title])}}">{{$title}}</a>
            </h3>
        {{-- <p>{{$id_product}}</p> --}}
        {{-- name product --}}
            <p class="product-card__brand">Lay coffe</p>
            <div class="product-card__row">
                <span class="product-card__price">{{$price}}</span>
                <img src="./assets/icons/star.svg" alt="" class="product-card__star" />
                <span class="product-card__score">{{$rating}}</span>
            </div>
        </article>
    {{-- </a> --}}
</div>
