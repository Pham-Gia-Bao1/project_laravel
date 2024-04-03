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
    public function deleteItemFromCart(Request $request){
        $user = User::find(Auth::user()->id);
        $coffees = CoffeModel::find($request->id);
        if(isset($user)){
            // $item = Shopping_cart::find($id);
            $cartItem = Shopping_cart::where('user_id', $user->id)
                                  ->where('product_id', $coffees->id)
                                  ->first();
            if ($cartItem) {
                // Nếu có mục trong giỏ hàng, xóa nó
                $cartItem->delete();
                return redirect()->back()->with('success', 'Item deleted successfully');
            } else {
                // Nếu không tìm thấy mục trong giỏ hàng
                return redirect()->back()->with('error', 'Item not found in cart');
            }
        } else {
            // Nếu không tìm thấy người dùng
            return redirect()->back()->with('error', 'User not found');
        }
    }
}
