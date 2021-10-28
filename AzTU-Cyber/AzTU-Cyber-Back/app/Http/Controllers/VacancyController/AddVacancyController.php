<?php

namespace App\Http\Controllers\VacancyController;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

    class AddVacancyController extends Controller
{
    public function vacancy_add()
    {
        return view('vacancy.vacancy_add');
    }

    public function vacancy_add_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contentt' => 'required'
        ]);

        $vacancy = new Vacancy();
        $date = date('Y-m-d');
        $vacancy->title = $request->name;
        $vacancy->user_id = auth()->user()->id;
        $vacancy->content = $request->contentt;
        $vacancy->status = '0';
        $vacancy->created_at = $date;


        if ( $vacancy->save()) {
            return redirect()->route('vacancy_list')->with('success', 'Təbriklər. Vakansiya uğurla əlavə edildi!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin!');
        }
    }

}
