<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserController extends Controller {

    public function index() {
        return view('login');
    }

    /**
     * check login credetail
     * @param Request $request
     */
    public function postLogin(Request $request) {

        $credentials = [
            'email' =>  $request->input('email'),
            'password' =>  $request->input('password')
        ];

        if (Auth::attempt($credentials)) {

           if(Auth::user()->user_type == 'customer'){
               return redirect('customer');
           }
           return redirect('agent');
        }
        return redirect()
            ->back()
            ->with("messageWarning", "Invalid Email or Password.")
            ->withInput();
    }

    public function dashBoard() {

        return view('dashboard');
    }

    /**
     * logout with destory session
     */
    public function userLogout() {

        \Session::flush();
        \Cache::flush();
        \Auth::logout();
        return redirect('/');
    }

}
