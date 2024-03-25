<?php

namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;
use App\Models\CoffeModel;

class CategoryController extends Controller
{
    public function index(){
        $data = CoffeModel::all();
        return view('Category', compact('data'));
    }
}
