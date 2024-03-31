<?php

namespace App\Http\Controllers;

use App\Models\Shopping_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CoffeModel;
use App\Models\User;
class CheckoutController extends Controller
{
    //
    public function index(){
        $user = User::find(Auth::user()->id);
        $coffees = CoffeModel::join('coffee_shops', 'coffe.coffe_shop_id', '=', 'coffee_shops.id')
                  ->select('coffe.*', 'coffee_shops.name as shop_name')
                  ->get();
        if (isset($user)) {
            $cartItems = Shopping_cart::where('user_id', $user->id)->get();
            
            // Lấy ra các sản phẩm tương ứng từ bảng Coffee dựa trên product_id trong giỏ hàng
            $productIds = $cartItems->pluck('product_id')->toArray();
            $products =  $coffees->whereIn('id', $productIds);
            return view('checkout',compact('products'));
            // Không có sản phẩm nào được thêm vào giỏ hàng.//tbao

        }
        return back()->with('message', 'Please sign in');
    }
}
