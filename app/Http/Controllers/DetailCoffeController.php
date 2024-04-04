<?php

namespace App\Http\Controllers;


use App\Models\Shopping_cart;
use Illuminate\Http\Request;
use App\Models\CoffeModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DetailCoffeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $coffe;
    public function __construct()
    {
        $this->coffe = new CoffeModel(); // Move the instantiation to the constructor
    }
    public function index()
    {
        //
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
    public function show(Request $request)
    {
        $id = $request->get('id');
        $data = $this->coffe->all()->where('id', '=', $id); // Access the property using $this->coffe
        // dd($user);
        return view('ProductDetail',compact('data'));
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
    public function AddToCart(Request $request){
        // dd($request->total);
        $user = User::find(Auth::user()->id);
        $id = $request->product_id;
        $coffee = CoffeModel::find($id);

        if($coffee){
            $existingCartItem = Shopping_cart::where('user_id', $user->id)
                ->where('product_id', $coffee->id)
                ->first();
            if($existingCartItem!=null) {
                return redirect()->route('ProductDetail', ['id' => $id])->with('error', 'The product already exists in the shopping cart');
            } else {
                $shopping_cart = new Shopping_cart();
                $shopping_cart->user_id=$user->id;
                $shopping_cart->product_id=$coffee->id;
                $shopping_cart->total = $request->total;
                $shopping_cart->quantity = $request->quantity;
                $shopping_cart->added_at = now()->format('Y-m-d H:i:s');
                $shopping_cart->save();
            }

            // Sau khi thêm sản phẩm vào giỏ hàng, bạn có thể chuyển người dùng đến trang detail
            return redirect()->route('ProductDetail', ['id' => $id])->with('success', 'Product added to cart successfully');
        } else {
            // Xử lý nếu không tìm thấy sản phẩm trong bảng Coffee
            return redirect()->route('ProductDetail', ['id' => $id])->with('error', 'Product does not exist');
        }
    }
}
