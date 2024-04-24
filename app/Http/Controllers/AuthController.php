<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboards.index');
        }

        return back()->withErrors(['email' => 'Username Or Password Not Match!']);
    }

    public function singUp(){
     return view('auth.register');
    }

    public function register(Request $request){
        // dd($request->all);
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:3',
        ]);

        // Create a new user
        $user = User::create([
            'role_id' =>'1',
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Log in the new user
        auth()->login($user);

        return redirect()->route('dashboards.index');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }

}
