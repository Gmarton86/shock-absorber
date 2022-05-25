<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Active_User;

class UserController extends Controller
{
    public function user(Request $request)
    {
        $user = Active_User::where('name', '=', $request->name)->first();
        if ($user === null) {
            $user = new Active_User();
            $user->name = $request->name;
            $user->save();
        }
    }

    public function all()
    {

        $users = Active_User::all();

        return response()->json([
            'status' => 200,
            'users' => $users,
        ]);
    }
}
