<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index(){

        $orders = DB::table('orders')
            ->join('coffe', 'coffe.id', '=', 'orders.product_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'orders.*','coffe.name as product_name', 'coffe.quantity as product_quantity')
            ->get();
        //dd($orders);
        return view('admin.Order', compact('orders'));
    }
}
