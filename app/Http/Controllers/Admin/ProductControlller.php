<?php

namespace App\Http\Controllers\Admin;

use App\Models\CoffeModel;
use App\Models\CoffeShop;
use App\Models\Cartegory;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
trait UpLoadFileTrait // Corrected trait name
{
    public function upLoadFile(Request $request, string $inputName, ?string $olfPath = null, string $path = '/assets/img/product')
    {
        if ($request->hasFile($inputName)) {
            $file = $request->get($inputName);
            // $ext = $file->getClientOriginalName();
            // $file_name = 'media_' . uniqid() . '.' . $ext;
            // $file->move(public_path($path), $file_name);
            // return $path . '/' . $file_name;
            return $file;
        }
        return null;
    }
}
class ProductControlller extends Controller
{
    use UpLoadFileTrait; // Ensure trait name matches exactly

    public function index(Request $request)
    {
        $products = CoffeModel::all();
        return view('admin.products.ProductView', compact('products'));
    }

    public function create(Request $request)
    {
        // Retrieve existing id_shop values
        $existingIdShops = CoffeShop::pluck('id')->toArray();
        $availableIdShops = [];
        for ($i = 1; $i <= 20; $i++) {
            if (!in_array($i, $existingIdShops)) {
                $availableIdShops[] = $i;
            }
        }
        $existingIdCategory = Cartegory::pluck('id')->toArray();
        $availableIdCategory = [];
        for ($i = 1; $i <= 20; $i++) {
            if (!in_array($i, $existingIdCategory)) {
                $availableIdCategory[] = $i;
            }
        }
        if ($request->has('size') && $request->has('name')) {
            $coffee = new CoffeModel();

            $coffee->name = $request->get('name');
            $coffee->size = $request->get('size');
            $coffee->weight = $request->get('weight');
            $coffee->price = $request->get('price');
            $avatarFile = $request->get('image');
            $filePath = 'assets/img/product/';
            $saveFile = $this->upLoadFile($request,'name');
            dd($saveFile);
            // dâng lỗi ở đây ------------------------------------------------------

            // Gán đường dẫn của file vào trường 'images' của đối tượng $coffee
            $coffee->images = json_encode([$filePath]);
            $coffee->reviews = $request->get('reviews');
            $coffee->rating = $request->get('rating');
            $coffee->quantity = $request->get('quantity');
            $coffee->coffe_shop_id = $request->get('coffee_shop_id');
            $coffee->category_id = $request->get('category_id');
            $coffee->save();
            return true;
        }
        return view('admin.products.CreateProduct', compact('availableIdShops', 'availableIdCategory'));
    }
}
