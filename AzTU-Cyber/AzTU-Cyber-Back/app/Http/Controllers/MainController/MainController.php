<?php

namespace App\Http\Controllers\MainController;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
            $news_active_count = News::where('status','1')->count();
            $news_waiting_count = News::where('status','2')->count();
            $news_deactive_count = News::where('status','0')->count();
            $users_count = User::where('role','1')->count();
            $admin_count = User::where('role','0')->count();
            $questions_count = Question::count();
        return view('index',compact('news_waiting_count','news_active_count','news_deactive_count','users_count','admin_count','questions_count'));
    }
}
