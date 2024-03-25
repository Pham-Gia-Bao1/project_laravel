<?php

namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;

use Illuminate\Http\Request;
use App\Models\CoffeModel;

class CategoryController extends Controller
{
    public function index(Request $request){
        $coffe = new CoffeModel();
        $data = $coffe->all();
        if(isset($request->box)){
            if($request->box !== 'all'){

                $value = $request->input('box');
                $data = $coffe->all()->where('category', '=',$value);
            } 
        }
        return view('Category', compact('data'));
    }
}
