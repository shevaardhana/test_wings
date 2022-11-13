<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = Login::where('user', $request->user)->first();

        if($user->password == $request->password)
        {
            return view('pages.home')->with([
                'user' => $user
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'user or password not correctly'
            ], 401);
        }

    }
}
