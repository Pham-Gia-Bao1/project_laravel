<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CoffeModel;
use App\Models\Shopping_cart;
// use App\Models\CoffeModel;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
use Database\Factories\ShoppingCartFactory;

// use App\Models\ShoppingCard;
use Illuminate\Http\Request;
use App\Models\FavoriteList;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $coffe; // Remove the instantiation here
    public function __construct()
    {
        $this->coffe = new CoffeModel(); // Move the instantiation to the constructor
    }
    public function index(Request $request)
    {
        $data = $this->coffe->inRandomOrder()->get(); // Access the property using $this->coffe
        $discountProducts = $this->coffe->where('discount', '>=', 13)->get();
        if (Auth::user()) {

            if (isset($request->vnp_Amount) && !empty($request->vnp_Amount)) {
                $notification = 'Payment success';
                // total_amount
                $total_amount = $request->vnp_Amount;
                //status
                $status = 'pending';
                // Lấy user_id
                $user_id = Auth::id();
                // Lấy danh sách product_id
                $list_product_ids = DB::table('shopping_cart')
                    ->where('user_id', $user_id)
                    ->pluck('product_id')
                    ->toArray();
                //order_date
                $order_date = $request->input('vnp_PayDate'); // Lấy giá trị của trường vnp_PayDate từ request
                $order_date = \DateTime::createFromFormat('YmdHis', $order_date)->format('Y-m-d H:i:s'); // Định dạng lại giá trị
                //created_at
                $created_at = $updated_at = now()->format('Y-m-d H:i:s');
                // Tạo đơn hàng mới
                $order = new Orders();
                $order->user_id = $user_id;
                $order->product_ids = json_encode($list_product_ids);
                $order->total_amount = $total_amount;
                $order->status = $status;
                $order->order_date = $order_date;
                $order->save();
                // Xóa các sản phẩm trong giỏ hàng của người dùng
                DB::table('shopping_cart')->where('user_id', $user_id)->delete();
                return redirect()->route('home')->with('success',$notification);
            }

        }
        if (isset($request->search)) {
            $search = "%{$request->search}%";
            $data = $this->coffe->query()
                ->where('name', 'like', $search)
                ->orWhere('weight', 'like', $search)
                ->orWhere('rating', 'like', $search)
                ->orWhere('size', 'like', $search)
                ->orWhere('reviews', 'like', $search)
                ->orWhere('price', 'like', $search)
                ->get();
        }

        return view('Home', compact('data', 'discountProducts'));
    }
}