<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get_all_users(){
        return response()->json(User::all());
    }

    public function get_single_user(Request $request){
        return response()->json(User::all()->where('user_id','=',$request->id));
    }
}
