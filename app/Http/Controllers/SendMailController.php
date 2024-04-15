<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;;
use App\Mail\SendMail;
class SendMailController extends Controller
{
    public function index(Request $request){
        $user_mail = $request->email_user;
        $subject = 'Email reply your contact';
        $body = $request->message;
        Mail::to($user_mail)->send(new SendMail($subject,$body));
        return redirect()->route('admin.contact')->with('message','Sent an email susscessfully');
    }

    public function showForm(Request $request){
        $message_user_sent = $request->message_user_sent;
        $email_user = $request->email_user;
        $id_user = $request->id_user;
        return view('admin.contact.Replies',compact('email_user','id_user','message_user_sent'));
    }
}
