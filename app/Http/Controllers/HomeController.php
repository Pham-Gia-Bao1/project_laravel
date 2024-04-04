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

    public function index(Request $request)
    {
        $data = $this->coffe->inRandomOrder()->get(); // Lấy dữ liệu từ bảng Coffee ngẫu nhiên

        if (isset($request->vnp_Amount) && !empty($request->vnp_Amount)) {
            $notification = 'success';
            return view('Home', compact('data'))->with('message', $notification);
        }

        $infor = $request->input('search');
        $allItem = $this->coffe->all();

        if (isset($infor)) {
            return $this->search($infor);
        }
        // $user = User::find(Auth::user()->id);

        // if (isset($user)) {
        //     $cartItems = Shopping_cart::where('user_id', $user->id)->get();

        //     // Lấy ra các sản phẩm tương ứng từ bảng Coffee dựa trên product_id trong giỏ hàng
        //     $productIds = $cartItems->pluck('product_id')->toArray();
        //     $products = CoffeModel::whereIn('id', $productIds)->get();
        //     view()->share('products',$products);
        // }
        return view('Home', compact('data'));
    }


    public function all_coffe(Request $request)
    {
        $data = $this->coffe->all();
        return response()->json($data);
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

    public function viewAllFavoriteList(Request $request)
    {
        if (Auth::user()) {

            $user_id = Auth::user()->id;
            $favorites = DB::table('favorites')
                ->join('coffe', 'favorites.product_id', '=', 'coffe.id')
                ->select('coffe.*')
                ->where('favorites.user_id', $user_id)
                ->get();
            if (isset($request->favorite_product)) {

                $item = json_decode($request->favorite_product);
                if (is_array($item)) {
                    // Xử lý khi $request->favorite_product là một mảng

                        // Khởi tạo một mảng để lưu trữ các ID đã tồn tại
                        $existingIds = [];

                        foreach ($item as $value) {
                            // Kiểm tra xem product_id đã tồn tại trong bảng shopping_cart chưa
                            $exists = DB::table('shopping_cart')
                            ->where('user_id', $user_id)
                                        ->where('product_id', $value)
                                        ->exists();

                            if ($exists) {
                                // Nếu product_id đã tồn tại, thêm nó vào danh sách các ID đã tồn tại
                                $existingIds[] = $value;
                            } else {
                                // Nếu product_id không tồn tại, thêm mới
                                $result = DB::table('shopping_cart')->insert([
                                    'user_id' => $user_id,
                                    'product_id' => $value
                                ]);
                                return redirect()->back()->with('success','add to cart successfully');

                            }
                        }

                        // Nếu có ít nhất một ID đã tồn tại, thực hiện redirect và hiển thị thông báo lỗi
                        if (!empty($existingIds)) {
                            // Chuyển mảng các ID thành một chuỗi
                            $existingIdsString = implode(', ', $existingIds);
                            // Thực hiện redirect và truyền thông báo lỗi
                            return redirect()->back()->with('error', "Các sản phẩm với ID $existingIdsString đã tồn tại trong giỏ hàng.");
                        }


                } else {
                    // Xử lý khi $request->favorite_product không phải là một mảng
                    // Kiểm tra xem product_id đã tồn tại trong bảng shopping_cart chưa
                    $exists = DB::table('shopping_cart')
                    ->where('user_id', $user_id)
                        ->where('product_id', $item)
                        ->exists();

                    if (!$exists) {
                        // Nếu product_id chưa tồn tại, thêm mới
                        $result = DB::table('shopping_cart')->insert([
                            'user_id' => $user_id,
                            'product_id' => $item
                        ]);
                        return redirect()->back()->with('success','add to cart successfully');

                    } else {
                        $exit_id = DB::table('shopping_cart')->find($request->favorite_product);
                        // Nếu product_id đã tồn tại, không làm gì
                        return redirect()->back()->with('error',"$exit_id->id".'da ton tai');
                    }
                }
            }


            // Lấy số lượng sản phẩm yêu thích dựa trên user_id
            $favoriteCount = FavoriteList::where('user_id', $user_id)->count();
            return view('Favourite', compact('favoriteCount', 'favorites'));
        }

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
            return view('Home', compact('data'))->with('message', 'Can not found that product');
        }

        // Nếu có dữ liệu, trả về view Home với dữ liệu đã tìm được
        return view('Home', compact('data'));
    }
}
