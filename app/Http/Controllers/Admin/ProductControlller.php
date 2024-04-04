<?php

namespace App\Http\Controllers\Admin;

use App\Models\CoffeModel;
use App\Models\CoffeShop;
use App\Models\Cartegory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
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
        $products = DB::table('coffe')
            ->join('categories', 'categories.id', '=', 'coffe.category_id')
            ->join('coffee_shops', 'coffee_shops.id', '=', 'coffe.coffe_shop_id')
            ->select('coffe.*', 'categories.name as category_name', 'coffee_shops.name as shop_name')
            ->get();
        return view('admin.products.ProductView', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $coffee = new CoffeModel();
        $coffee->name = $request->get('name');
        $coffee->size = $request->get('size');
        $coffee->weight = $request->get('weight');
        $coffee->price = $request->get('price');
        $avatarFile = $request->get('image');
        $filePath = 'assets/img/product/';
        $saveFile = $this->upLoadFile($request,'name');
        $coffee->images = json_encode([$filePath]);
        $coffee->reviews = $request->get('reviews');
        $coffee->rating = $request->get('rating');
        $coffee->quantity = $request->get('quantity');
        $coffee->coffe_shop_id = $request->get('coffee_shop_id');
        $coffee->category_id = $request->get('category_id');
        $coffee->save();
        return redirect()->route('admin.products')->with('success', 'add new product sucessfully!'); 
    }

    public function create(){
        $categories = DB::table('categories')->get();
        $coffe_shops = DB::table('coffee_shops')->get();
        return view('admin.products.CreateProduct', compact('categories', "coffe_shops"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coffe = CoffeModel::join('categories', 'categories.id', '=', 'coffe.category_id')
        ->join('coffee_shops', 'coffee_shops.id', '=', 'coffe.coffe_shop_id')
        ->select('coffe.*', 'categories.name as category_name', 'coffee_shops.name as shop_name')
        ->find($id);

        $categories = DB::table('categories')->get();
        $coffe_shops = DB::table('coffee_shops')->get();

        if (!$coffe) {
            // Xử lý khi không tìm thấy sản phẩm với ID cụ thể
            abort(404);
        }

       return view('admin.products.updateProduct', compact('coffe', 'categories', 'coffe_shops'));
    }

    public function update(ProductRequest $request, $id){
        $coffee = CoffeModel::find($id);
        $coffee->name = $request->get('name');
        $coffee->size = $request->get('size');
        $coffee->weight = $request->get('weight');
        $coffee->price = $request->get('price');
        $avatarFile = $request->get('image');
        $filePath = 'assets/img/product/';
        $saveFile = $this->upLoadFile($request, 'name');
        $coffee->images = json_encode([$filePath]);
        $coffee->reviews = $request->get('reviews');
        $coffee->rating = $request->get('rating');
        $coffee->quantity = $request->get('quantity');
        $coffee->coffe_shop_id = $request->get('coffee_shop_id');
        $coffee->category_id = $request->get('category_id');
        $coffee->save();
        return redirect()->route('admin.products')->with('success', 'Update product sucessfully!'); 
    }

    public function destroy($id)
    {
        $car = CoffeModel::find($id);
        $car->delete();
        return redirect()->route('admin.products')->with('success', 'Delete sucessfully!');
      
    }
}