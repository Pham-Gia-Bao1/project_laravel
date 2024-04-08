<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (isset($request->name)) {
            $name_user = $request->name;
            $phone_number_user = $request->phone;
            $address_user = $request->address;
            $city_user = $request->city;
            $result =  $user->update([
                'first_name' => $name_user,
                'phone_number' => $phone_number_user,
                'address' => $address_user . ' ' . $city_user
            ]);
            if($result){
                $messge = 'Successfully updated';
            }else{
                $messge = 'Error updated';
            }
            return redirect()->back()->with('message',$messge);

        }
        return view('Shipping',compact('user'));
    }
}
