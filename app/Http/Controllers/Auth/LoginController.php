<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{   
    function __construct()
    {
        $this->middleware(['guest']);
    }
    function index(){
        return view('auth.login');
    }
    function store(Request $request){

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','InValid login details');
        }

        return redirect()->route('dashboard');
        

    }
}
