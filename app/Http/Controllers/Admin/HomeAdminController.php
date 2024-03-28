<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CoffeModel;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class HomeAdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $orders = Orders::all();
        $coffees = CoffeModel::all();
        $data = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')->get();
        return view('admin.HomeAdmin', compact('users', 'orders', 'coffees', 'data'));
    }
   
}
