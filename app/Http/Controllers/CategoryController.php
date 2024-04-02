<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Models\CoffeModel;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $coffe = new CoffeModel();
        $data = $coffe->all();
        if (!empty($request->get('max-price'))) {
            $min_price = $request->get('min-price');
            $max_price = $request->get('max-price');
            $data = $coffe->whereBetween('price', [$min_price, $max_price])->get();
        }
        if (isset($request->box)) {
            if ($request->box !== 'all') {
                $value = $request->input('box');
                $dataQuery = $coffe->join('categories', 'categories.id','=','coffe.category_id')->where('categories.name','=',$value);
                if ($request->has('size')) {
                    $size = $request->input('size');
                    $dataQuery->where('size', '=', $size);
                }

                $data = $dataQuery->get();
            }
        }
        $infor = $request->input('search');
        if (isset($infor)) {
            $data = $this->search($infor);
        }

        return view('Category', compact('data'));
    }
    public function search($infor)
    {
        $coffe = new CoffeModel();
        $query = $coffe->query();
        $keywords = explode(' ', $infor);

        foreach ($keywords as $keyword) {
            if (is_numeric($keyword)) {
                $query->orWhereRaw("CAST(price AS UNSIGNED) = ?", [explode('.', $keyword)[0]]);
            } else {
                $query->orWhere('name', 'like', '%' . $keyword . '%')
                    ->orWhere('weight', 'like', '%' . $keyword . '%')
                    ->orWhere('rating', 'like', '%' . $keyword . '%')
                    ->orWhere('size', 'like', '%' . $keyword . '%')
                    ->orWhere('reviews', 'like', '%' . $keyword . '%');
            }
        }
        $data = $query->get();
        return $data;
    }
}
