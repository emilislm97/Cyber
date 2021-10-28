<?php

namespace App\Http\Controllers\NewsController;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ListNewsController extends Controller
{
    public function news_list()
    {
        $news = News::orderBy('id','ASC')->get();
        $users = User::where('role', '0')->get();

        return view('news.news_list', compact('news','users'));
    }

    public function status(Request $request)
    {
        $news = News::where('id', $request->id)->first();
        if ($news) {
            $news->status = $request->status;
            if ($news->save()) {
                return response()->json('1');
            } else {
                return response()->json('0');
            }
        } else {
            return response()->json('0');
        }
    }

    public function delete(Request $request)
    {

        $news = News::where('id', $request->id)->first();
        if ($news) {
            File::deleteDirectory(public_path('assets/media/news/' . $news->id));
            if ($news->delete()) {
                return response()->json('1');
            } else {
                return response()->json('0');
            }
        } else {
            return response()->json('0');
        }
    }

    public function show(Request $request)
    {
        $news = News::where('id', $request->id)->first();
        if ($news) {
            return response()->json([$news]);
        } else {
            return false;
        }
    }
}
