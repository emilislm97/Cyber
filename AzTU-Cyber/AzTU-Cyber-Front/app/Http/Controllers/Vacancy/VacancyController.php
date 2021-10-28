<?php

namespace App\Http\Controllers\Vacancy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use Illuminate\Pagination\Paginator;

class VacancyController extends Controller
{
    //Vakansiyalar səhifə görünüşü
    public function vacancy_view(){
        $vacancys = Vacancy::where('status', '1')->orderBy('id', 'DESC')->paginate(2);
        return view('vacancy.vacancy',compact('vacancys'));
    }

    //Tək vakansiya səhifə görünüşü
    public function vacancy_single_view($id){
        $vacancys = Vacancy::where('status', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $vacancy_single = Vacancy::where('id', $id)->where('status', '1')->orderBy('id', 'DESC')->first();
        return view('vacancy.vacancy_single',compact('vacancy_single','vacancys'));
    }
}
