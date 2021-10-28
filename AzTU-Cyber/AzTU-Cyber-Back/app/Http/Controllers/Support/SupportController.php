<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function support_list()
    {
        $supports = Support::orderBy('id','ASC')->get();
        return view('support.support_list', compact('supports'));
    }

    public function status(Request $request)
    {
        $support = Support::where('id', $request->id)->first();
        if ($support) {
            $support->status = $request->status;
            if ($support->save()) {
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
        $support = Support::where('id', $request->id)->first();
        if ($support) {
            if ($support->delete()) {
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
        $support = Support::where('id', $request->id)->first();

        if ($support) {
            return response()->json([$support]);
        } else {
            return false;
        }
    }
}
