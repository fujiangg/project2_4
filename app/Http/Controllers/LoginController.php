<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Session;
use \App\Models\User;

class LoginController extends Controller
{

    /**
     * LOGIN
     */

    public function login()
    {
        if (Auth::check()) 
        {
            return redirect('dashboard');
        }
        else
        {
            return view('logins.login');
        }
    }

    /**
     * ACTION LOGIN
     */

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $remember_me = ( !empty( $request->remember_me ))? TRUE : FALSE;

        if (Auth::Attempt($data)) 
        {
            $user = User::where(["email" => $data['email']])->first();

            Auth::login($user, $remember_me);

            return redirect('dashboard');
        }
        else
        {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    /**
     * ACTION LOGOUT
     */

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }

}