<?php

namespace App\Http\Controllers\Admin;

use App\Models\CoffeModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductControlller extends Controller
{
    public function index(Request $request){
        $products = CoffeModel::all();
        return view('admin.products.ProductView',compact('products'));
    }
}
