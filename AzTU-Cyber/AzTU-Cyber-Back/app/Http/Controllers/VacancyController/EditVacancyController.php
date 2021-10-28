<?php

namespace App\Http\Controllers\VacancyController;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class EditVacancyController extends Controller
{
    public function vacancy_edit($id)
    {
        $vacancy = $getList = Vacancy::find($id);

        if (!$vacancy) {
            return redirect()->back();
        } else {
            return view('vacancy.vacancy_edit', compact('vacancy'));
        }
    }

    public function vacancy_edit_post(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'contentt' => 'required',
        ]);

        $vacancy = Vacancy::find($id);

        if ($vacancy) {

            $date = date('Y-m-d');
            $vacancy->title = $request->name;
            $vacancy->content = $request->contentt;
            $vacancy->status = '0';
            $vacancy->updated_at = $date;


            if ($vacancy->save()) {
                return redirect()->route('vacancy_edit', $vacancy->id)->with('success', 'Təbriklər. Vakansiya uğurla redaktə edildi!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin!');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin!');
        }
    }
}
