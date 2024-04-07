<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    private $orders;

    public function __construct()
    {
        $this->orders = new Orders();
    }

    public function index(){

        $orders = DB::table('orders')
            ->join('coffe', 'coffe.id', '=', 'orders.product_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'orders.*','coffe.name as product_name', 'coffe.quantity as product_quantity')
            ->get();
        return view('admin.Order', compact('orders'));
    }

    public function update(Request $request, string $id)
    {
        $order = $this->orders::findOrFail($id);
        $data = $request->all();
        $order->update($data);
        return redirect()->route('admin.order');
    }

}
