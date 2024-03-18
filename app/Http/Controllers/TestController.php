<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TestController extends Controller
{
    //


    // public function downloadImg(Request $request){
    //     if(!empty($request->image)){
    //             $image = trim($request->image);
    //             $file_name = "Bitstorm".uniqid().'png';
    //             $header = [
    //                 'Content-Type' => 'application/png'
    //             ];
    //             response()->download($image,$file_name);

    //     }
    //     return view('test');

    // }
    public function downloadDoc(Request $request){
        if(!empty($request->doc)){
                $image = trim($request->doc);
                $file_name = "Bitstorm-".uniqid().'pdf';
                $header = [
                    'Content-Type' => 'application/pdf'
                ];
                response()->download($image,$file_name,$header);

        }
        return view('test');

    }
}
