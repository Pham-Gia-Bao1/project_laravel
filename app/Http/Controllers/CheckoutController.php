<?php

namespace App\Http\Controllers;

use App\Models\Shopping_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CoffeModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    //
    public function index(){
        $user = User::find(Auth::user()->id);
        $coffees = CoffeModel::join('coffee_shops', 'coffe.coffe_shop_id', '=', 'coffee_shops.id')
        ->join('shopping_cart' , 'shopping_cart.product_id', '=', 'coffe.id')
        ->select('coffe.*',
                'shopping_cart.quantity as quantity_categories'
                ,'shopping_cart.total as total_price',
                'coffee_shops.name as coffee_shops_name'
        )
        ->where('user_id',$user->id)
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

    public function refreshProducts(Request $request){
        // Lấy danh sách ID sản phẩm từ request
        $listIdProduct = explode(",", $request->all_id_products);
        // Lấy danh sách số lượng sản phẩm từ request
        $listQuantityProduct = explode(",", $request->all_quantity_products);

        // Lấy người dùng hiện tại
        $user = User::find(Auth::user()->id);
        // dd($user);

        if ($user) {
            // Lấy các sản phẩm trong giỏ hàng của người dùng
            $shopping_cart_products = DB::table('shopping_cart')->where('user_id', $user->id)->get();
            // dd($shopping_cart_products);
            foreach ($shopping_cart_products as $key => $product) {
                // Tìm sản phẩm trong giỏ hàng bằng id
                $shoppingCartItem = shopping_cart::find($product->id);
                // Kiểm tra xem sản phẩm tồn tại không
                if ($shoppingCartItem) {
                    // Cập nhật số lượng của sản phẩm
                    $shoppingCartItem->quantity = $listQuantityProduct[intval($key)];
                    // lưu sản phẩm
                    $shoppingCartItem->save();
                }
            }
            // Trả về kết quả thành công
            return redirect()->route('Shipping');
        } else {
            // Trả về kết quả thất bại nếu không tìm thấy người dùng
            return redirect()->back();
        }
    }
}


