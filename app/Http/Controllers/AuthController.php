<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\User;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_post(Request $request){
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect()->intended('movies');
        }else{
            // return 'gagal';
            return redirect('/')->with('error', 'Email or password is wrong!');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function register_post(Request $request)
    {
        // Buat user baru dengan password yang sudah di-hash
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash password sebelum disimpan
        $user->save();

        return redirect('/')->with('success', 'Account created successfully');
    }
}
