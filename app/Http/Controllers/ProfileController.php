<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Card;

class ProfileController extends Controller
{

    public function index()
    {
        return view('profile.Wallet');
    }

    public function get_info_user()
    {
        $user = User::find(Auth::user()->id);
        return view('profile.Edit_info_profile',compact('user'));
    }


    public function edit_profile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        // dd($user);
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email', // Thêm quy tắc email
            'phone_number' => 'required',
            'password' => 'required|min:8', // Thêm quy tắc min với giá trị tối thiểu là 8
        ]);

            // Fetch the user based on the provided user ID

        ;        // Check if the user exists
        if ($user) {
            // Get only the relevant fields for update
            $info = $request->only('name', 'email', 'phone_number', 'password');
            // dd($info);

            // Update the user information
            $user->update($info);

            // You might want to add a success message here or handle success in some way
            return redirect()->route('Profile')->with('success', 'Card created successfully.');
                }
        return $this->index();
    }

    public function create_card(Request $request)
{
    // Define validation rules
    $validationRules = [
        'first_name' => 'required|min:5',
        'last_name' => 'required|min:5',
        'card_number' => 'required|numeric|digits:16',
        'expiration_date' => 'required|date',
        'cvv' => 'required|numeric|digits:3',
        'phone_number' => 'required|numeric|digits:10'
    ];

    // Validate the request
    $validatedData = $request->validate($validationRules);

    // Process the request after successful validation
    $info = $request->only('user_id', 'first_name', 'last_name', 'card_number', 'expiration_date', 'cvv', 'phone_number');
    $info['set_default_card'] = $request->input('set_default_card', '0');

    // Create a new Card instance and set the attributes
    $card = new Card($info);

    // Save the card to the database
    $result = $card->save();

    // Check if card was saved successfully
    if ($result) {
        return $this->index()->with('success', 'Card created successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to create card.');
    }
}


    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function changeAvatar(Request $request){
        $user = User::find(Auth::user()->id);
        if (isset($request->avatar) && !empty($request->avatar)) {
            if ($request->hasFile('avatar')) {
                $avatarFile = $request->file('avatar');
                $fileName = time() . '_' . $avatarFile->getClientOriginalName();
                $filePath = 'assets/img/avatar/' . $fileName;
                if ($avatarFile->isValid()) {
                    $avatarPath = $avatarFile->storeAs('assets/img/avatar', $fileName);
                    $avatarFile->move(public_path('assets/img/avatar'), $fileName);
                    if (!$avatarPath) {
                        return redirect()->back()->with('error', 'Không thể lưu ảnh.');
                    }
                    $user->img  = str_replace('assets/img/avatar/', '', $avatarPath);
                    $user->save();
                    return redirect()->back()->with('success', 'Avatar đã được thay đổi thành công.');
                } else {
                    return redirect()->back()->with('success', 'Tệp tin ảnh không hợp lệ.');
                }
            } else {
                return redirect()->back()->with('error', 'Bạn chưa chọn ảnh mới.');
            }
        } else {
            return view('profile.Edit_avatar');
        }

    }
}


