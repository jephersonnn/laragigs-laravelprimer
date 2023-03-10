<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register/Create Form
    public function create()
    {
        return view('users.register');
    }

    //Store User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        //Hashing
        $formFields['password'] = bcrypt($formFields['password']);

        //Create user and push to db
        $user = User::create($formFields);

        //Create login session
        auth()->login($user);

        return redirect('/')->with('message', 'Registered and logged in!');
    }

    //Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    //Login User
    public function login()
    {
        return view('users.login');
    }

    //Authenticate
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are logged in!');
        }

        return back()->withErrors(['email' => 'Email or password is wrong'])->onlyInput();
    }
}
