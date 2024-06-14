<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //validate
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => [
                'required', 'max:255', 'email',
                'unique:users'
            ],
            'password' => ['required', 'min:3', 'confirmed']
        ]);






        //register

        $user = User::create([
            'name' => $fields['username'],
            'email' => $fields['email'],
            'password' => $fields['password'],
        ]);


        //Login
        // Auth::login($user);


        //redirect 
        return redirect()->route('home');
    }


    //login user
    public function login(Request $request)
    {
        //validate
        $fields = $request->validate([

            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);


        // dd($request);

        //Try to login  the user
        if(Auth::attempt($fields, $request->remember)){
            return redirect()->intended('dashboard');
        }else{
            return back()->withErrors([
               'failed'=>'The provided credentials do not match out records.'
            ]);
        }
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
