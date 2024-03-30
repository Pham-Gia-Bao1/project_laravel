<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CoffeModel;
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

     public function index(Request $request)
     {
        $data = $this->coffe->inRandomOrder()->get(); // Access the property using $this->coffe
        if(Auth::user()) {
         $data = $this->coffe->inRandomOrder()->get(); // Access the property using $this->coffe
        if(isset($request->vnp_Amount) && !empty($request->vnp_Amount)){
            $notifiction = 'success';
            return view('Home', compact('data'))->with('message', $notifiction);
        }

            $user_id = Auth::user()->id;
            $favorites = DB::table('favorites')
            ->join('coffe', 'favorites.product_id', '=', 'coffe.id')
            ->select('coffe.*')
                ->where('favorites.user_id', $user_id)
                ->limit(3)
                ->get();
            
            // Lấy số lượng sản phẩm yêu thích dựa trên user_id
            $favoriteCount = FavoriteList::where('user_id', $user_id)->count();
            return view('Home', compact('data', 'favoriteCount', 'favorites'));

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

    public function removeFromFavorites($product_id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;

            $favorite = FavoriteList::where('user_id', $user_id)->where('product_id', $product_id)->first();

            if ($favorite) {
                $favorite->delete();
                return redirect()->back()->with('success', 'The product has been removed from the favorites list!');
            } else {
                return redirect()->back()->with('error', 'Sản phẩm không tồn tại trong danh sách yêu thích!');
            }
        }
    }

    public function viewAllFavoriteList()
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $favorites = DB::table('favorites')
            ->join('coffe', 'favorites.product_id', '=', 'coffe.id')
            ->select('coffe.*')
            ->where('favorites.user_id', $user_id)
            ->get();

            // Lấy số lượng sản phẩm yêu thích dựa trên user_id
            $favoriteCount = FavoriteList::where('user_id', $user_id)->count();
            return view('Favourite', compact('favoriteCount', 'favorites'));
        }
        return view('Home', compact('data'));
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
