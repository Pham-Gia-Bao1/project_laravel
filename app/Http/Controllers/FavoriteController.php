<?php

namespace App\Http\Controllers;

use App\Models\Coffe;
use Illuminate\Http\Request;
use App\Models\FavoriteList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        // Kết hợp hai truy vấn lại
        $favorites = DB::table('favorites')
            ->join('coffe', 'favorites.product_id', '=', 'coffe.id')
            ->select('coffe.*')
            ->where('favorites.user_id', $user_id)
            ->limit(3)
            ->get();

        // Lấy số lượng sản phẩm yêu thích dựa trên user_id
        $favoriteCount = FavoriteList::where('user_id', $user_id)->count();

        return view('/header', compact('favorites', 'favoriteCount'));
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
                $quantity = $request->get('quantity');
                $total = $request->get('total');
                $added_at = $currentTime = now()->format('Y-m-d H:i:s');

                $item = json_decode($request->favorite_product);// id of favorite product
                // dd($item);

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
                            'product_id' => $item,
                            'total' => $total,
                            'quantity' => $quantity,
                            'added_at' => $added_at
                        ]);
                        return redirect()->back()->with('success','add to cart successfully');

                    } else {
                        $exit_id = DB::table('shopping_cart')->find($request->favorite_product);
                        // Nếu product_id đã tồn tại, không làm gì
                        return redirect()->back()->with('error',"$exit_id->id".' exited !');
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
}
