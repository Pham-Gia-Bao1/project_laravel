<div class="col bg-primary ">
    <a  href="{{route('ProductDetail',['id' => $id])}}">
        <article class="cate-item ">
            <img src="{{$img}}" alt="" class="cate-item__thumb" />
            <div class="cate-item__info">
                <h3 class="cate-item__title">{{$price}}</h3>
                <p class="cate-item__desc">{{$title}}</p>
            </div>
        </article>
    </a>
</div>
