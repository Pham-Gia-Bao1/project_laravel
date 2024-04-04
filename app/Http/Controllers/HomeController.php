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

    // public function index(Request $request)
    // {
    //     $data = $this->coffe->inRandomOrder()->get(); // Lấy dữ liệu từ bảng Coffee ngẫu nhiên

    //     if (isset($request->vnp_Amount) && !empty($request->vnp_Amount)) {
    //         $notification = 'success';
    //         return view('Home', compact('data'))->with('message', $notification);
    //     }

    //     // $infor = $request->input('search');
    //     // $allItem = $this->coffe->all();

    //     // if (isset($infor)) {
    //     //     return $this->search($infor);
    //     // }
    //     // $user = User::find(Auth::user()->id);

    //     // if (isset($user)) {
    //     //     $cartItems = Shopping_cart::where('user_id', $user->id)->get();

    //     //     // Lấy ra các sản phẩm tương ứng từ bảng Coffee dựa trên product_id trong giỏ hàng
    //     //     $productIds = $cartItems->pluck('product_id')->toArray();
    //     //     $products = CoffeModel::whereIn('id', $productIds)->get();
    //     //     view()->share('products',$products);
    //     // }
    //     return view('Home', compact('data'));
    // }


    public function index(Request $request)
    {

        $data = $this->coffe->inRandomOrder()->get(); // Access the property using $this->coffe
        if (Auth::user()) {

            if (isset($request->vnp_Amount) && !empty($request->vnp_Amount)) {
                $notifiction = 'success';
                return view('Home', compact('data'))->with('message', $notifiction);
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

        return view('Home', compact('data'));
    }

}
