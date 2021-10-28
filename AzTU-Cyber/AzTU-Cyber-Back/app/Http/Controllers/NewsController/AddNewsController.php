<?php

namespace App\Http\Controllers\NewsController;

use App\Http\Controllers\Controller;
use App\Models\News;
use Buglinjo\LaravelWebp\Webp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AddNewsController extends Controller
{
    public function news_add()
    {
        return view('news.news_add');
    }

    public function news_add_post(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png,jfif|max:1024',
            'contentt'=>'required',
            'type'=>'required'
        ]);

        $news = new News();

        $slug = Str::slug($request->name);
        $date = date('Y-m-d');

        $news->name = $request->name;
        $news->author_id = auth()->user()->id;
        $news->type = $request->type;
        $news->slug = $slug;
        $news->content = $request->contentt;
        $news->status = '2';
        $news->created_at = $date;

        if ($request->hasFile('image')){
            if (count(News::all()) == 0){
                $id = 1;
            }else{
                $id = News::orderBy('id','DESC')->first()->id+1;
            }
            $image = $request->file('image');
            $name = $slug.'.webp';

            //qovluq yaratma
            $path = public_path().'/assets/media/news/' . $id;
            File::makeDirectory($path, $mode = 0777, true, true);

            $webp = Webp::make($image);
            if ($webp->save($path.'/'.$name)) {
                $news->image = $id.'/'.$name;
            }else{
                return redirect()->back()->withInput()->with('error','Şəkil yüklənmədi. Zəhmət olmasa yenidən cəhd edin!');
            }
        }

        if ($news->save()){
            return redirect()->route('news_list')->with('success','Təbriklər. Post uğurla əlavə edildi!');
        }else{
            return redirect()->back()->withInput()->with('error','Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin!');
        }
    }
}
