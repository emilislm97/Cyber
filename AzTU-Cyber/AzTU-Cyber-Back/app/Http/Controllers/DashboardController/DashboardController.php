<?php

namespace App\Http\Controllers\DashboardController;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::where('id', '!=', auth()->user()->id)->where('role', '0')->get();
        return view('dashboard.dashboard', compact('users'));
    }

    public function dashboard_post(Request $request)
    {
        $request->validate([
            'name_surname' => 'required',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $user->name = $request->name_surname;
        $user->updated_at = date('Y-m-d H:i:s');


        if ($request->current_password) {
            $request->validate([
                'current_password' => 'required|min:8',
                'new_password' => 'required|min:8',
                'new_password_confirm' => 'required|min:8|same:new_password'

            ]);
            if (Hash::check($request->current_password, $user->password)) {
                $password = Hash::make($request->new_password);
                $user->password = $password;
                $mail = [
                    'title' => 'AzTU-Cyber - Change Pass!',
                    'email' => $request->email,
                    'name' => $request->name_surname,
                    'role' => $request->roles,
                    'password' =>  $request->new_password,
                    'view' => 'mails.new_user'
                ];
            } else {
                return redirect()->back()->with('error', 'Cari şifrə düzgün deyil!');
            }
        }
        if ($user->save()) {
            return redirect()->back()->with('success', 'Təbriklər. Profil yenilənməsi uğurla yerinə yetirildi');
        } else {
            return redirect()->back()->with('error', 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin!');
        }
    }

    public function password_confirm(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        if ($user) {
            if (Hash::check($request->currentpassword, $user->password)) {
                return response()->json(1);
            } else {
                return response()->json(0);
            }
        } else {
            return response()->json(0);
        }
    }



}
