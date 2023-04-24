<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){

        return view('admin.auth.login');
    }
    public function login(LoginRequest $req){
        $auth=Auth::attempt([
            'name'=>$req->name,
            'password'=>$req->password,
        ]);
        if($auth){
            return view('admin.pages.dashboard')->with('success','Welcome'.auth()->user());
        }else{
            return redirect()->back()->with('error','Name or password is incorrect');
        }
    }public function logout(){

        Auth::logout();
    }
}
