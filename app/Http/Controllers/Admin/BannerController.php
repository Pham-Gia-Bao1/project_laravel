<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function index(Request $request){
        $banners = Banners::all();
        $id = $request->query('id');
        if(isset($id)){
            $banner = Banners::find($id);
            if($banner && count($banners) > 0){
                $firstBanner = $banners[0]; // Lấy banner đầu tiên trong danh sách
                if($firstBanner){
                    // Hoán đổi vị trí của banner vừa được tìm và banner đầu tiên trong danh sách
                    $tempPosition = $banner->image;
                    $banner->image = $firstBanner->image;
                    $firstBanner->image = $tempPosition;

                    // Lưu trữ thay đổi vào cơ sở dữ liệu
                    $banner->save();
                    $firstBanner->save();
                }
            }
            return redirect()->route('admin.banner')->with('success','Banner changed successfully');
        }
        // dd($banner);
        return view('admin.banner.Banner', compact('banners'));

    }
    public function update(Request $request){
        // $id = $request->id;
        // $banner = Banners::find($id);
        return view('admin.banner.UpdateBanner');
    }
    public function store(Request $request) {
        // dd('advhdvs00');
            $rules = [
                'image' => 'required|mimes:jpg,png,pdf,bmp',
            ];

            $messages = [
                'image.required' => 'Please choose an image',
                'image.mimes' => 'The image must be jpg, png, bmp, or pdf'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                // Handle file upload
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('assets/img/slideshow'), $imageName);

                    // Create a new banner
                    $banner = new Banners();
                    $banner->image = $imageName;
                    $banner->save();
                    $banners = Banners::all();
                    if ($banner && $banners->isNotEmpty()) {
                        $firstBanner = $banners->first(); // Lấy banner đầu tiên trong danh sách

                        // Hoán đổi vị trí của banner mới và banner đầu tiên trong danh sách
                        $tempImage = $banner->image;
                        $banner->image = $firstBanner->image;
                        $firstBanner->image = $tempImage;

                        // Lưu trữ thay đổi vào cơ sở dữ liệu
                        $banner->save();
                        $firstBanner->save();
                    }
                    // Redirect or perform further actions after saving to the database
                    return redirect()->route('admin.banner')->with('success', 'Banner updated successfully');
                } else {
                    // Handle case where no image is uploaded
                    return redirect()->back()->withErrors('No image uploaded')->withInput();
                }
        }
    }
    public function delete(Request $request){
        $id = $request->id;
        $banner = Banners::find($id);
        $banner->delete();
        return redirect()->back()->with('success', 'Banner deleted');
    }

}
