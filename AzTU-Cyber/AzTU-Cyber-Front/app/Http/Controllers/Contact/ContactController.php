<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //Əlaqə səhifə görünüşü
    public function contact_view(){
        $setting = Setting::first();
        return view('contact',compact('setting',));
    }

    //Əlaqə mesaj göndərmə
    public function send_message(Request $request)
    {
        $request->validate([
            'name' =>'required|max:255',
            'email' => 'required|email',
            'content' => 'required',
        ]);

        $message = Contact::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'content' => $request->content,
            'status'=>'0',

        ]);

        if ( $message->save()) {
            return redirect()->back()->with('success','Mesajınız uğurla göndərildi!');
        } else {
            return redirect()->back()->with('error','E-poçt göndərərkən xəta oldu! Sonra təkrar cəhd edin');
        }
    }
}
