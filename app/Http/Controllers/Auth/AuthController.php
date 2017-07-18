<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller {

    public function authenticate(Request $request){
        // return $request->input('email');
        if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')])){
            return redirect('admin');
        }else{
            return redirect('login');
        }
    }

    public function login(){
        return view('authenticate.login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function create(Request $request){
        $input = $request->all();
        User::create([
            'name'=>$input['name'],
            'email'=>$input['email'],
            'password'=>bcrypt($input['password']),
        ]);
        return "OK";
    }
}
