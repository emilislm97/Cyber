<?php

namespace App\Http\Controllers\DashboardController;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AddUserController extends Controller
{
    public function add_user()
    {
        return view('dashboard.add_user');
    }

    public function add_user_post(Request $request)
    {
        $request->validate([
            'name_surname' => 'required',
            'email' => 'email|required|unique:users',
        ]);
        $pass = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
        $password = Hash::make($pass);
        $user = new User();
        $user->name = $request->name_surname;
        $user->email = $request->email;
        $user->password =  $password;
        $user->role = '0';
        $user->image = 'avatar.png';
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date('Y-m-d H:i:s');

        if ($user->save()) {
            $mail = [
                'title' => 'AzTU-Cyber - Welcome',
                'email' => $request->email,
                'name' => $request->name_surname,
                'password' =>  $pass,
                'view' => 'mails.new_user'
            ];

            Mail::to(strtolower($request->email))->send(new SendMail($mail));
            return redirect()->route('dashboard')->withInput()->with('success', 'Təbriklər. İstifadəçi uğurla əlavə olundu!');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi. Yenidən cəhd edin!');
        }
    }

    public function user_delete(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($user) {
            if ($user->delete()) {
                return response()->json('1');
            } else {
                return response()->json('0');
            }
        } else {
            return response()->json('0');
        }
    }
}
