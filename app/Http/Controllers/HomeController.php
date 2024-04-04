<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CoffeModel;
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

    public function all_coffe()
    {
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



  
}
