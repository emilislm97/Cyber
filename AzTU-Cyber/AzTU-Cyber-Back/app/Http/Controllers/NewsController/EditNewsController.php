<?php

namespace App\Http\Controllers\NewsController;

use App\Http\Controllers\Controller;
use App\Models\News;
use Buglinjo\LaravelWebp\Webp;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class EditNewsController extends Controller
{
    public function news_edit($id)
    {
        $news = $getList = News::find($id);

        if (!$news) {
            return redirect()->back();
        } else {
            return view('news.news_edit', compact('news'));
        }
    }

    public function news_edit_post(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'contentt' => 'required',
             'type'=>'required'
        ]);

        $news = News::find($id);

        if ($news) {
            $slug = Str::slug($request->name);
            $date = date('Y-m-d');
            $news->name = $request->name;
            $news->type = $request->type;
            $news->slug = $slug;
            $news->content = $request->contentt;
            $news->status = '0';
            $news->updated_at = $date;

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpg,jpeg,png,jfif|max:1024'
                ]);

                $old_image = public_path() . '/assets/media/news/' . $news->image;
                if (file_exists($old_image)) {
                    unlink($old_image);
                }

                $image = $request->file('image');
                $name = $slug.'-'.rand(1000,99999).'.webp';
                $path = public_path() . '/assets/media/news/' . $news->id;

                $webp = Webp::make($image);
                if ($webp->save($path.'/'.$name)) {
                    $news->image = $news->id . '/' . $name;
                }else{
                    return redirect()->back()->withInput()->with('error','Şəkil yüklənmədi. Zəhmət olmasa yenidən cəhd edin!');
                }
            }

            if ($news->save()) {
                return redirect()->route('news_edit', $news->id)->with('success', 'Təbriklər. Post uğurla redaktə edildi!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin!');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin!');
        }
    }
}
