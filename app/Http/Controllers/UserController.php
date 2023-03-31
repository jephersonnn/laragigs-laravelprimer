<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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

        $formFields['password'] = bcrypt($formFields['password']);

        //Create user and push to db
        $user = User::create($formFields);

        //Create login session
        //
        $user->createToken('myapptoken')->plainTextToken;
        return redirect('/')->with('message', 'Registered and logged in!');

        //TODO: add tokens here

    }

    //Logout User
    public function logout(Request $request)
    {
        // auth()->logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        auth()->user()->tokens()->delete();

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

        $user = User::where('email', $formFields['email'])->first();

        if (!$user || !Hash::check($formFields['password'], $user->password)) {
            return response([
                'message' => 'Credentials do not match'
            ], 401);
        }

        $user->createToken('myapptoken')->plainTextToken;


        // if (auth()->attempt($formFields)) {
        //     $request->session()->regenerate();

        //     return redirect('/')->with('message', 'You are logged in!');
        // }

        return back()->withErrors(['email' => 'Email or password is wrong'])->onlyInput();
    }
}
