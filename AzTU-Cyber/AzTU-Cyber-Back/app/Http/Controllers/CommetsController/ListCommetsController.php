<?php

namespace App\Http\Controllers\CommetsController;

use App\Http\Controllers\Controller;
use App\Models\Commet;
use App\Models\User;
use Illuminate\Http\Request;

class ListCommetsController extends Controller
{
    public function commets_list()
    {
        $commets = Commet::orderBy('id','ASC')->get();
        return view('commets.commets_list', compact('commets'));
    }

    public function status(Request $request)
    {
        $commet = Commet::where('id', $request->id)->first();
        if ($commet) {
            $commet->status = $request->status;
            if ($commet->save()) {
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
        $commet = Commet::where('id', $request->id)->first();
        if ($commet) {
            if ($commet->delete()) {
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
        $commet = Commet::where('id', $request->id)->first();
        $user_name = User::where('id', $commet->user_id)->first();
        if ($commet) {
            return response()->json([$commet,$user_name]);
        } else {
            return false;
        }
    }
}
