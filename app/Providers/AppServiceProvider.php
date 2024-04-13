<?php

namespace App\Providers;

use App\View\Components\card_product_top;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components;
use App\View\Components\button;
use App\View\Components\card_product;
use App\Models\Shopping_cart;
use App\Models\Banners;
use App\Models\User;
use App\Models\CoffeModel;
use App\Models\FavoriteList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('card_product', card_product::class);
        Blade::component('card_product_top', card_product_top::class);
        Blade::component('button', button::class);
        View::composer(['Layout.subNavBar','Shipping','Layout.header'], function ($view) {
            $user = Auth::user();
            if(is_null($user)){
                return; // Trả về ngay nếu người dùng không đăng nhập
            }

            $products = [];
            $favoriteCount = 0;

            // Lấy các sản phẩm trong giỏ hàng của người dùng đăng nhập
            $cartItems = Shopping_cart::where('user_id', $user->id)->get();
            $productIds = $cartItems->pluck('product_id')->toArray();

            // Lấy ra thông tin chi tiết của các sản phẩm trong giỏ hàng
            $products = CoffeModel::join('coffee_shops', 'coffe.coffe_shop_id', '=', 'coffee_shops.id')
                ->join('shopping_cart', 'shopping_cart.product_id', '=', 'coffe.id')
                ->select(
                    'coffe.*',
                    'shopping_cart.quantity as quantity_categories',
                    'shopping_cart.total as total_price',
                    'coffee_shops.name as coffee_shops_name'
                )
                ->whereIn('shopping_cart.product_id', $productIds)
                ->where('shopping_cart.user_id', $user->id)
                ->get();

            // Lấy danh sách sản phẩm yêu thích của người dùng
            $favorites = DB::table('favorites')
                ->join('coffe', 'favorites.product_id', '=', 'coffe.id')
                ->select('coffe.*')
                ->where('favorites.user_id', $user->id)
                ->get();

            // Đếm số lượng sản phẩm yêu thích
            $favoriteCount = FavoriteList::where('user_id', $user->id)->count();

            // Chia sẻ dữ liệu với view
            $view->with([
                'products' => $products,
                'favoriteCount' => $favoriteCount,
                'favorites' => $favorites,
                'all_products_in_checkout' => $cartItems
            ]);
        });
        View::composer('Layout.hero', function ($view) {
            $banner = Banners::first();
            $view->with('banner', $banner);
        });
    }
}
