<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function index(){
        $banners = Banners::all();
        // dd($banner);
        return view('admin.banner.Banner', compact('banners'));
    } 
    public function update(Request $request){
        $id = $request->id;
        $banner = Banners::find($id);
        return view('admin.banner.UpdateBanner',compact('banner'));
    }
    public function store(Request $request) {
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
                
                // Find the banner by ID
                $id = $request->id;
                $banner = Banners::find($id);
    
                // Update the image attribute
                $banner->image = $imageName;
                $banner->save();
    
                // Redirect or perform further actions after saving to the database
                return redirect()->route('admin.banner')->with('success', 'Banner updated successfully');
            } else {
                // Handle case where no image is uploaded
                return redirect()->back()->withErrors('No image uploaded')->withInput();
            }
        }
    }
    
}
