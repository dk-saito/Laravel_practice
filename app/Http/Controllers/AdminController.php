<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  Auth;
class AdminController extends Controller
{

    // public function register(Request $request){
    //     admin::insert([
    //         'name'=>$request,
    //         'email'=>$request,
    //         'password'=Hash::make($request->password),
    //         'created_at'=,
    //     ])
    // }
    // public function Index(){
    //     return view('admin.admin_login');
    // }
    // public function Dashboard(){
    //     return view('admin.index');
    // }
    // public function Login(Request $request){
    //     dd($request->all());
    //     $check =$request->all();
    //     if(Auth::guard('admin')
    //     ->attempt(['email'=>$check['email']
    //     ,'password'=>$check['password']])){
    //         return redirect()->route('admin.dashboard')->with('error','ログインに成功しました');
    //     }else{
    //         return back()->with('error','ログイン情報が間違ってます');
    //     }
    // }
    // public function Logout(){
    //     Auth::guard('admin')->logout();
    //     return redirect()->('login_from')->with('error','ログアウトしました');
    // }
}
