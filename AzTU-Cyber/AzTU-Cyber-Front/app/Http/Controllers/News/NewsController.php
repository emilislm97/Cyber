<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //Tək xəbərin səhifə görünüşü
    public function news_single_view($id){
        $news = News::where('type', 'xeber')->where('status', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $news_single = News::where('id', $id)->where('status', '1')->orderBy('id', 'DESC')->first();
        return view('news.news_single',compact('news_single','news'));
    }

    //Tək blogun səhifə görünüşü
    public function blog_single_view($id){
        $blogs = News::where('type', 'meqale')->where('status', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $blog_single = News::where('id', $id)->where('status', '1')->orderBy('id', 'DESC')->first();
        return view('blog.blog_single',compact('blog_single','blogs'));
    }
}
