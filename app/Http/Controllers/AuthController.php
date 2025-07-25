<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Register User
    public function register(Request $request){
        //Validate
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|max:25|email',
            'password' => 'required|min:3|confirmed',
        ]);

        dd('ok');

        //Register

        //Login

        //Redirect
    }
}
