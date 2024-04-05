<?php

namespace App\Http\Controllers\Admin;

use App\Models\CoffeModel;
use App\Models\CoffeShop;
use App\Models\Cartegory;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
    private $products;

    public function __construct()
    {
        $this->products = new CoffeModel();
    }

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

        
        $coffee->reviews = $request->get('reviews');
        $coffee->rating = $request->get('rating');
        $coffee->quantity = $request->get('quantity');
        $coffee->coffe_shop_id = $request->get('coffee_shop_id');
        $coffee->category_id = $request->get('category_id');
        $mainImageName = '';
        $secondaryImages = [];
        // Xử lý tệp ảnh chính
        if ($request->hasfile('image')) {
            $mainImage = $request->file('image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('assets/img/product/'), $mainImageName);
        }
        // Xử lý tệp ảnh phụ
        for ($i = 1; $i <= 3; $i++) {
            $inputName = 'image' . $i;
            if ($request->hasfile($inputName)) {
                $file = $request->file($inputName);
                $imageName = $file->getClientOriginalName();
                $file->move(public_path('assets/img/product/'), $imageName);
                $secondaryImages[] = $imageName;
            }
        }
        // Đưa tất cả các ảnh vào cùng một mảng
        $imagePaths = [$mainImageName];
        $imagePaths = array_merge($imagePaths, $secondaryImages);
        $coffee->images = json_encode($imagePaths);
        $coffee->save();
        return redirect()->route('admin.products')->with('success', 'Add new product sucessfully!');

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

    public function update(UpdateProductRequest $request, $id){
        $coffee = $this->products::findOrFail($id);

        $data = $request->only([
            'name', 'size', 'weight', 'price', 'reviews', 'rating', 'quantity', 'coffe_shop_id', 'category_id'
        ]);
        $mainImageName = '';
        $secondaryImages = [];
        // Xử lý tệp ảnh chính
        if ($request->hasfile('image')) {
            $mainImage = $request->file('image');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move(public_path('assets/img/product/'), $mainImageName);
        } else {
            $mainImageName = $coffee->images ? json_decode($coffee->images)[0] : '';
        }

        $data['images'] = json_encode([$mainImageName]);

        // Xử lý tệp ảnh phụ
        for ($i = 1; $i <= 3; $i++) {
            $inputName = 'image' . $i;
            if ($request->hasfile($inputName)) {
                $file = $request->file($inputName);
                $imageName = $file->getClientOriginalName();
                $file->move(public_path('assets/img/product/'), $imageName);
                $secondaryImages[] = $imageName;
            }
        }

        // Nếu không có file ảnh chính mới được tải lên, và không có ảnh trong cơ sở dữ liệu,
        // thì giữ nguyên các ảnh phụ từ cơ sở dữ liệu
        if (empty($mainImageName) && empty($secondaryImages)) {
            $data['images'] = $coffee->images;
        } elseif (!empty($secondaryImages)) {
            // Nếu có file ảnh phụ mới được tải lên, thêm chúng vào mảng images
            $data['images'] = json_encode(array_merge([$mainImageName], $secondaryImages));
        }

        $coffee->update($data);
        return redirect()->route('admin.products')->with('success', 'Update product successfully!');
    }

    public function destroy($id)
    {
        $car = CoffeModel::find($id);
        $car->delete();
        return redirect()->route('admin.products')->with('success', 'Delete sucessfully!');    
    }
}