<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('admin.user.Users',compact('users'));
    }
    public function create(){
        return view('admin.user.CreateUser');
    }
    public function store(Request $request){
        $rules = [
            'name'=>'required',
            'email'=>'required|regex:/^.+@.+$/i',
            'password'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'image'=>'required',
            'phone_number'=>'required',
            'status'=>'required',
            'role'=>'required',
        ];
        $messages = [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.regex' => 'The email address is invalid.',
            'password.required'=>'Please enter your password.',
            'first_name.required' => 'Please enter your first name.',
            'last_name.required' => 'Please enter your last name.',
            'address.required' => 'Please enter your address.',
            'image.required' => 'Please select an image.',
            'phone_number.required' => 'Please enter your phone number.',
            'status.required' => 'Please select a status.',
            'role.required' => 'Please select a role.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Lưu các giá trị vào cơ sở dữ liệu
            // Ví dụ:
            if(isset($request->id)){
                $user = User::find($request->id);
                $notification = 'updated';
                // dd($user);
            }else{
                $user = new User();
                $notification = 'created';
            }
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->address = $request->input('address');
            $user->phone_number = $request->input('phone_number');
            $user->status = $request->input('status');
            $user->role = $request->input('role');
    
            // Lưu ảnh
            if ($request->hasFile('image')) {
                $avatarFile = $request->file('image');
                $fileName = time() . '_' . $avatarFile->getClientOriginalName();
                $filePath = 'assets/img/avatar/' . $fileName;
                if ($avatarFile->isValid()) {
                    $avatarPath = $avatarFile->storeAs('assets/img/avatar', $fileName);
                    $avatarFile->move(public_path('assets/img/avatar'), $fileName);
                    if (!$avatarPath) {
                        return redirect()->back()->with('message', 'Không thể lưu ảnh.');
                    }
                    $user->img  = str_replace('assets/img/avatar/', '', $avatarPath);
                }
            }
    
            $user->save();
    
            // Redirect hoặc thực hiện hành động tiếp theo sau khi lưu vào cơ sở dữ liệu
            return redirect()->route('admin.users')->with('success', "User $notification successfully");
        }
    }
    
    public function delete(Request $request){
        $user = User::find($request->id);
        if($user){
            $imagePath = public_path('assets/img/avatar/' . $user->img);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $user->delete();
    
            return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
        }
        return redirect()->route('admin.users')->with('error', 'User not found.');
    }
    public function update(string $id){
        $user = User::find($id);
        return view('admin.user.UpdateUser',compact('user'));
    }
}
