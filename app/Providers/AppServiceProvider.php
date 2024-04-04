<?php

namespace App\Providers;

use App\View\Components\card_product_top;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components;
use App\View\Components\button;
use App\View\Components\card_product;
use App\Models\Shopping_cart;
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

        View::composer(['Layout.subNavBar'], function ($view) {
            $user = User::find(Auth::user()->id);
            $products = [];
            $favoriteCount = 0;

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

            $view->with(['products' => $products, 'favoriteCount' => $favoriteCount, 'favorites' => $favorites]);
        });
    }

}
