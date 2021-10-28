<?php

namespace App\Http\Controllers\AboutController;

use App\Http\Controllers\Controller;
use App\Models\About;
use Buglinjo\LaravelWebp\Webp;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about_edit()
    {
        $about = About::first();

        if (!$about) {
            return redirect()->back();
        } else {
            return view('about.about_edit', compact('about'));
        }
    }

    public function about_edit_post(Request $request)
    {
        $request->validate([
            'contentt' => 'required',
        ]);

        $about = About::first();
        if ($about) {
            $date = date('Y-m-d');
            $about->content = $request->contentt;
            $about->updated_at = $date;

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpg,jpeg,png,jfif|max:1024'
                ]);

                $old_image = public_path() . '/assets/media/about/' . $about->image;
                if (file_exists($old_image)) {
                    unlink($old_image);
                }

                $image = $request->file('image');
                $path = public_path() .'/assets/media/about';

                $webp = Webp::make($image);
                if ($webp->save($path .'/about.webp')) {
                    $about->image = 'about.webp';
                } else {
                    return redirect()->back()->withInput()->with('error', 'Şəkil yüklənmədi. Zəhmət olmasa yenidən cəhd edin!');
                }
            }

            if ($about->save()) {
                return redirect()->route('about_edit', $about->id)->with('success', 'Təbriklər. Haqqında uğurla redaktə edildi!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin!');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin!');
        }
    }
}
