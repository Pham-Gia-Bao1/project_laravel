
<?php 
use App\Models\Shopping_cart;
use App\Models\User;
use App\Models\CoffeModel;
use App\Models\FavoriteList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
$user = User::find(Auth::user()->id);

if (isset($user)) {
    $cartItems = Shopping_cart::where('user_id', $user->id)->get();

    // Lấy ra các sản phẩm tương ứng từ bảng Coffee dựa trên product_id trong giỏ hàng
    $productIds = $cartItems->pluck('product_id')->toArray();
    $products = CoffeModel::whereIn('id', $productIds)->get();
}

 $user_id = Auth::user()->id;
            $favorites = DB::table('favorites')
            ->join('coffe', 'favorites.product_id', '=', 'coffe.id')
            ->select('coffe.*')
                ->where('favorites.user_id', $user_id)
                ->get();

            // Lấy số lượng sản phẩm yêu thích dựa trên user_id
            $favoriteCount = FavoriteList::where('user_id', $user_id)->count();
?>
<div class="top-act">
    <div class="top-act__group d-md-none top-act__group--single">

        <form class="top-act__btn" action="{{route('home')}}">
            <input type="text" class="bg-dark" id="searchInput" name="search">
            <button type="submit"><img src="./assets/icons/search.svg" alt="" id="icon-serch" class="icon top-act__icon rounded-circle" /></button>

        </form>

    </div>

    <div class="top-act__group d-md-none">
        <div class="top-act__btn-wrap">
            <button class="top-act__btn">
                <img src="./assets/icons/heart.svg" alt="" class="icon top-act__icon" />
                <span class="top-act__title">
                    @if(isset($favoriteCount) && $favoriteCount > 0)
                        0{{$favoriteCount}}
                    @else
                        0
                    @endif
                </span>
            </button>
            <!-- Dropdown -->
            <div class="act-dropdown">
                <div class="act-dropdown__inner">
                    <img src="./assets/icons/arrow-up.png" alt="" class="act-dropdown__arrow" />
                    <div class="act-dropdown__top">
                        <h2 class="act-dropdown__title">You have @isset($favoriteCount)
                            {{$favoriteCount}}
                        @endisset item(s)</h2>
                        <a href="{{route('FavoriteList')}}" class="act-dropdown__view-all">See All</a>
                    </div>
                    <div class="row row-cols-3 gx-2 act-dropdown__list">
                        @if(isset($favorites))
                            @foreach ($favorites as $item)
                                <div class="col">
                                    <article class="cart-preview-item">
                                        <div class="cart-preview-item__img-wrap">
                                            <img
                                                src="./assets/img/product/{{ json_decode($item->images)[0] }}"
                                                alt=""
                                                class="cart-preview-item__thumb"
                                            />
                                        </div>
                                        <h3 class="cart-preview-item__title">{{$item->name}}</h3>
                                        <p class="cart-preview-item__price">{{$item->price}}</p>
                                    </article>
                                </div>
                            @endforeach
                        @else{
                            <h4>Chưa có sản phẩm yêu thích nào</h4>
                        }
                        @endif

                    </div>
                    <div class="act-dropdown__separate"></div>
                    <div class="act-dropdown__checkout">
                        <a
                            href="checkout"
                            class="btn btn--primary btn--rounded act-dropdown__checkout-btn"
                        >
                            Check Out All
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-act__separate"></div>

        <div class="top-act__btn-wrap">
            <button class="top-act__btn">
                <img src="./assets/icons/buy.svg" alt="" class="icon top-act__icon" />
                <span class="top-act__title">$65.42</span>
            </button>

            <!-- Dropdown -->
            <div class="act-dropdown">
                <div class="act-dropdown__inner">
                    <img src="./assets/icons/arrow-up.png" alt="" class="act-dropdown__arrow" />
                    <div class="act-dropdown__top">
                        <h2 class="act-dropdown__title">You have {{ count($products) }} item(s)</h2>
                        <a href="checkout" class="act-dropdown__view-all">See All</a>
                    </div>
                    <div class="row row-cols-3 gx-2 act-dropdown__list">
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($products as $product)
                            <!-- Cart preview item 3 -->
                            <div class="col">
                                <article class="cart-preview-item">
                                    <div class="cart-preview-item__img-wrap">
                                        <img
                                            src="./assets/img/product/{{ json_decode($product->images)[0] }}"
                                            alt="{{ $product->name }}"
                                            class="cart-preview-item__thumb"
                                        />
                                    </div>
                                    <h3 class="cart-preview-item__title">{{ $product->name }}</h3>
                                    <p class="cart-preview-item__price">${{ $product->price }}</p>
                                </article>
                            </div>
                            @php
                                $total += $product->price ;
                            @endphp
                        @endforeach
                    </div>
                    <div class="act-dropdown__bottom">
                        <div class="act-dropdown__row">
                            <span class="act-dropdown__label">Quantity of products</span>
                            <span class="act-dropdown__value">{{ count($products) }}</span>
                        </div>
                        {{-- <div class="act-dropdown__row">
                            <span class="act-dropdown__label">Texes</span>
                            <span class="act-dropdown__value">Free</span>
                        </div>
                        <div class="act-dropdown__row">
                            <span class="act-dropdown__label">Shipping</span>
                            <span class="act-dropdown__value">$10.00</span>
                        </div> --}}
                        <div class="act-dropdown__row act-dropdown__row--bold">
                            <span class="act-dropdown__label">Total Price</span>
                            <span class="act-dropdown__value">${{ $total }}</span>
                        </div>
                    </div>
                    <div class="act-dropdown__checkout">
                        <a
                            href="checkout"
                            class="btn btn--primary btn--rounded act-dropdown__checkout-btn"
                        >
                            Go to Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="top-act__user">
        <img src="./assets/img/avatar/{{Auth::user()->img}}" alt="" class="top-act__avatar" />

        <!-- Dropdown -->
        <div class="act-dropdown top-act__dropdown">
            <div class="act-dropdown__inner user-menu">
                <img
                    src="./assets/icons/arrow-up.png"
                    alt=""
                    class="act-dropdown__arrow top-act__dropdown-arrow"
                />

                <div class="user-menu__top">
                    <img src="./assets/img/avatar/{{Auth::user()->img}}" alt="" class="user-menu__avatar" />
                    <div>
                        <p class="user-menu__name">{{Auth::user()->name}}</p>
                        <p>{{Auth::user()->email}}</p>
                    </div>
                </div>

                <ul class="user-menu__list">
                    <li>
                        <a href="profile" class="user-menu__link">Profile</a>
                    </li>
                    <li>
                        {{-- <a href="{{route('Favourite')}}" class="user-menu__link">Favourite list</a> --}}
                    </li>
                    <li class="user-menu__separate">
                        <a href="#!" class="user-menu__link" id="switch-theme-btn">
                            <span>Dark mode</span>
                            <img src="./assets/icons/sun.svg" alt="" class="icon user-menu__icon" />
                        </a>
                    </li>
                    <li>
                        <a href="#!" class="user-menu__link">Settings</a>
                    </li>
                    <li class="user-menu__separate">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
