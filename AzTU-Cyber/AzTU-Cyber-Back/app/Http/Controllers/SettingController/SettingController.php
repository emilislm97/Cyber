<?php

namespace App\Http\Controllers\SettingController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function setting_edit()
    {
        $setting = Setting::first();

        if (!$setting) {
            return redirect()->back();
        } else {
            return view('setting.setting_edit', compact('setting'));
        }
    }

    public function setting_edit_post(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'map' => 'required',
            'number' => 'required',
            'fax' => 'required',
            'instagram'=>'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'telegram' => 'required',
        ]);

        $setting = Setting::first();
        $date = date('Y-m-d');
        $setting->content = $request->content;
        $setting->map = $request->map;
        $setting->number = $request->number;
        $setting->fax = $request->fax;
        $setting->instagram = $request->instagram;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->telegram = $request->telegram;
        $setting->updated_at = $date;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png,jfif'
            ]);

            $old_image = public_path() . '/assets/media/setting/'.$setting->logo;
            if (file_exists($old_image)) {
                unlink($old_image);
            }
            $image = $request->file('image');
            $image_name = 'logo'.'.'.$image->getClientOriginalExtension();

            $image->move(public_path().'/assets/media/setting/',$image_name);

            $setting->logo = $image_name;

        }

        if ($setting->save()) {
            return redirect()->route('setting_edit', $setting->id)->with('success', 'Təbriklər. Haqqında uğurla redaktə edildi!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin!');
        }
    }
}
