<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\User;
use App\Models\Question;
use App\Models\Vacancy;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Pagination\Paginator;

class GeneralController extends Controller
{

    //Ana səhifə görünüşü
    public function index()
    {
        $questions = Question::where('status', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $vacancys = Vacancy::where('status', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $users = User::all();
        $news = News::where('status', '1')->where('type', 'xeber')->orderBy('id', 'DESC')->get();
        $blogs = News::where('status', '1')->where('type', 'meqale')->orderBy('id', 'DESC')->paginate(2);
        return view('index', compact('questions', 'vacancys', 'users', 'news', 'blogs'));
    }

    //login görünüş
    public function sing_in_view()
    {
        return view('sing_in');
    }

    //login olma
    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $request->flash();
        $login = $request->only(['email', 'password']);
        $remember = $request->has('remember') ? true : false;
        $user = User::where('email', $request->email)->first();

        if ($user && $user->status == '1' && $user->confirm == '1') {
            if (Auth::attempt($login, $remember)) {
                return redirect()->route('index');
            } else {
                return redirect()->back()->with('error', 'E-poçt və ya şifrə yanlışdır! Yenidən cəhd edin');
            }
        } else {
            return redirect()->back()->with('error', 'E-poçt təsdiq olunmayıb! E-poçtunuza daxil olun və təsdiq edin');
        }
    }

    //Logaut etmə
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    //qeydiyyat görünüş
    public function register_view()
    {
        return view('register');
    }

    //qeydiyyatdan keçmə
    public function register_post(Request $request)
    {
        $request->validate([
            'Ad_Soyad' => 'required|min:3',
            'Email' => 'required|email|unique:users|string',
            'Sifre' => 'required',
            'Cinsiyyet' => 'required',
            'Tekrar_sifre' => 'required|regex:/^(?=(?:.*[A-Z]))(?=(?:.*[a-z]))(?=(?:.*[0-9]))(?=(?:.*))\S{8,}$/|min:8',
        ]);

        if ($request->password === $request->passwordrepeat) {
            $register = User::create([
                'name' => $request->Ad_Soyad,
                'email' => $request->Email,
                'password' => bcrypt($request->Sifre),
                'token' => self::get_token(),
                'role' => '1',
                'gender' => $request->Cinsiyyet,
                'image' => $request->Cinsiyyet === 'male' ? 'male.png' : 'female.png',
            ]);
        } else {
            return redirect()->back()->with('error', 'Təkrar şifrə  ilə ilk şifrə ilə eyni deyil!');;
        }

        if ($register) {
            $token = User::where('email', $request->Email)->first()->token;
            $data = array(
                'email' => $request->Email,
                'token' => $token,
                'view' => 'mails.email_verify'
            );
            Mail::to($request->Email)->send(new SendMail($data));
            return redirect()->route('sing_in_view')->with('success', 'Qeydiyyatınız uğurla tamamlanmışdır! Hesabınızın aktivləşdirmək üçün zəhmət olmasa elektron poçtunuza daxil olaraq təsdiqləyin!');
        } else {
            return redirect()->back();
        }
    }

    //toket duzeltmek
    public static function get_token()
    {
        $characters = '0123456789QWERTYUIOPLKJHGFDSAZXCVBNMqwertyuioplkjhgfdsazxcvbnm';
        $randomString = '';

        for ($i = 0; $i < 32; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $check = User::where('token', $randomString)->first();
        if (empty($check)) {
            return $randomString;
        }
        self::get_token();
    }

    //email tesdiqleme
    public function EmailVerify(Request $request)
    {
        $user = User::where('email', $request->email)->where('token', $request->token)->first();

        $user->confirm = '1';
        $user->token = null;

        if ($user->save()) {
            return "ok";
        } else {
            return "no";
        }
    }

}
