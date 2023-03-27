<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::all()->where('email', '=', $request->email)->first();

        if (Hash::check($request->password, $user->getAuthPassword())) {
            return [
                'token' => $user->createToken(time())->plainTextToken
            ];
        }

        // if(Auth::attempt([$credentials])){
        //     $user = Auth::user();
        //     return[
        //         'token'=> $user->createToken(time())->plainTextToken
        //     ];
        // }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        if ($request->user()->currentAccessToken()->delete()) {
            return [
                'message' => 'Successfully logged out!'
            ];
        }
    }
}
