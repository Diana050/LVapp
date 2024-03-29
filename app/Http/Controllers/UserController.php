<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show register form
    public  function create(){
        return view('users.register');
    }

    public function index(){
        return view('manage.userProfile');
    }

    //Store Create new user
    public function store(Request $request){
        $formFields =  $request->validate([
            'UserName' => ['required', 'min:3', Rule::unique('users', 'UserName')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/']
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/news')->with('message', 'User created and logged in!');

    }


    //log out
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/news')->with('message', 'You have been successfully logged out!');

    }

    //show log in form
    public function login(){
        return view('users.login');
    }

    //authenticate user
    public function authenticate(Request $request){
        $formFields =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/news')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}
