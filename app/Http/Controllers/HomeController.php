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

        $data = $this->coffe->inRandomOrder()->get(); // Access the property using $this->coffe
        if (Auth::user()) {

            if (isset($request->vnp_Amount) && !empty($request->vnp_Amount)) {
                $notifiction = 'Payment success';
                DB::table('shopping_cart')->where('user_id', Auth::id())->delete();
                return view('Home', compact('data'))->with('success', $notifiction);
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
