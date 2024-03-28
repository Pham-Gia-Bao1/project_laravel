<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CoffeModel;
use Illuminate\Http\Request;
use App\Models\FavoriteList;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $coffe; // Remove the instantiation here

     public function __construct()
     {
        $this->coffe = new CoffeModel(); // Move the instantiation to the constructor
     }

     public function index()
     {
         $data = $this->coffe->inRandomOrder()->get(); // Access the property using $this->coffe
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

    public function favorite($product_id)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in before adding to favorite list!');
        }

        $user_id = Auth::user()->id;

        // Kiểm tra xem sản phẩm đã được yêu thích trước đó hay chưa
        $existingFavorite = FavoriteList::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($existingFavorite) {
            // Nếu sản phẩm đã được yêu thích trước đó, thông báo cho người dùng và không tạo mới
            return redirect()->back()->with('info', 'The product is already in your favorites list!');
        }

        // Nếu sản phẩm chưa được yêu thích, thêm vào danh sách yêu thích của người dùng
        $data = [
            'product_id' => $product_id,
            'user_id' => $user_id
        ];
        FavoriteList::create($data);

        return redirect()->back()->with('success', 'Added to favorites list successfully!');
    }


}
