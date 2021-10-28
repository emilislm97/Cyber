<?php

namespace App\Http\Controllers\QuestionsController;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class ListQuestionsController extends Controller
{
    public function questions_list()
    {
        $questions = Question::orderBy('id','ASC')->get();
        return view('questions.questions_list', compact('questions'));
    }

    public function status(Request $request)
    {
        $question = Question::where('id', $request->id)->first();
        if ($question) {
            $question->status = $request->status;
            if ($question->save()) {
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
        $question = Question::where('id', $request->id)->first();
        if ($question) {
            if ($question->delete()) {
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
        $question = Question::where('id', $request->id)->first();

        $user_name = User::where('id', $question->user_id)->first();
        if ($question) {
            return response()->json([$question,$user_name]);
        } else {
            return false;
        }
    }
}
