<?php

namespace App\Http\Controllers;

use App\Models\CoffeModel;
use App\Models\Shopping_cart;
// use App\Models\CoffeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Database\Factories\ShoppingCartFactory;

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
         $data = $this->coffe->inRandomOrder()->get(); // Lấy dữ liệu từ bảng Coffee ngẫu nhiên
     
         if(isset($request->vnp_Amount) && !empty($request->vnp_Amount)){
             $notification = 'success';
             return view('Home', compact('data'))->with('message', $notification);
         }
     
         $infor = $request->input('search');
         $allItem = $this->coffe->all();
     
         if(isset($infor)){
             return $this->search($infor);
         }
     
         $user = User::find(Auth::user()->id);
     
         if(isset($user)){
             $cartItems = Shopping_cart::where('user_id', $user->id)->get();
     
             // Lấy ra các sản phẩm tương ứng từ bảng Coffee dựa trên product_id trong giỏ hàng
             $productIds = $cartItems->pluck('product_id')->toArray();
             $products = CoffeModel::whereIn('id', $productIds)->get();
             return view('Home', compact('data', 'products'));
         }
     
         return view('Home', compact('data'));
     }
     

     public function all_coffe(){
        $data = $this->coffe->all();
        return  response()->json($data);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search($infor)
{
    $query = $this->coffe->query();
    $keywords = explode(' ', $infor);

    foreach ($keywords as $keyword) {
        if (is_numeric($keyword)) {
            $query->orWhereRaw("CAST(price AS UNSIGNED) = ?", [explode('.', $keyword)[0]]);
        } else {
            $query->orWhere('name', 'like', '%' . $keyword . '%')
                  ->orWhere('weight', 'like', '%' . $keyword . '%')
                  ->orWhere('rating', 'like', '%' . $keyword . '%')
                  ->orWhere('size', 'like', '%' . $keyword . '%')
                  ->orWhere('reviews', 'like', '%' . $keyword . '%');
        }
    }
    $data = $query->get();

    // Kiểm tra xem có dữ liệu được trả về hay không
    if ($data->isEmpty()) {
        // Nếu không có dữ liệu, trả về view Home với thông báo "Can not found that product"
        return view('Home',compact('data'))->with('message', 'Can not found that product');
    }

    // Nếu có dữ liệu, trả về view Home với dữ liệu đã tìm được
    return view('Home', compact('data'));
}



}
