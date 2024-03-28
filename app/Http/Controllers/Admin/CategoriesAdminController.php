<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoffeModel;


class CategoriesAdminController extends Controller
{
    public function index(Request $request)
    {
        $categories = CoffeModel::select('categories.name')
        ->join('categories', 'categories.id','=','coffe.category_id')
        ->distinct()
        ->get(); // Chọn các category duy nhất
        return view('admin.category.Categories', compact('categories')); // Truyền dữ liệu categories vào view
    }

    public function create(Request $request){
        return $request->category;
    }

}
