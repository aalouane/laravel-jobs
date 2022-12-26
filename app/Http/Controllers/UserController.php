<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    // Show register/created form
    public function create()
    {
        return view('users.register');
    }

    // Store User
    public function store(Request $request) 
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:3']
        ]);
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message', 'User Created and logged in');
    }

    //
    public function login()
    {
        return view('users.login');
    }

    public function authentication(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3']
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are logged now!');
        }

        return back()->withErrors(['email' => 'Envalid credentials !'])->onlyInput('email');
    }

    public function logout(Request $requeset)
    {
        auth()->logout();

        $requeset->session()->invalidate();
        $requeset->session()->regenerateToken();

        return redirect('/')->with('message', 'You are now logged out!');
    }
}
