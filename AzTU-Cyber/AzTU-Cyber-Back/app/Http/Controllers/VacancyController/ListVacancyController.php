<?php

namespace App\Http\Controllers\VacancyController;
use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use App\Models\User;
use Illuminate\Http\Request;

class ListVacancyController extends Controller
{
    public function vacancy_list()
    {
        $vacancys = Vacancy::orderBy('id', 'ASC')->get();
        $users = User::where('role', '0')->get();

        return view('vacancy.vacancy_list', compact('vacancys', 'users'));
    }

    public function status(Request $request)
    {
        $vacancy = Vacancy::where('id', $request->id)->first();
        if ($vacancy) {
            $vacancy->status = $request->status;
            if ($vacancy->save()) {
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

        $vacancy = Vacancy::where('id', $request->id)->first();
        if ($vacancy) {
            if ($vacancy->delete()) {
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
        $vacancy = Vacancy::where('id', $request->id)->first();
        if ($vacancy) {
            return response()->json([$vacancy]);
        } else {
            return false;
        }
    }
}
