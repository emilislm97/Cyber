<?php

namespace App\Http\Controllers\UsersController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListUsersController extends Controller
{
    public function users_list()
    {
        $users = User::where('role','1')->orderBy('id','ASC')->get();

        return view('users.users_list', compact('users'));
    }

    public function status(Request $request)
    {
        $users = User::where('id', $request->id)->first();
        if ($users) {
            $users->status = $request->status;
            if ($users->save()) {
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
        $users =   User::where('id', $request->id)->first();
        if ($users) {
            if ($users->delete()) {
                return response()->json('1');
            } else {
                return response()->json('0');
            }
        } else {
            return response()->json('0');
        }
    }
}
