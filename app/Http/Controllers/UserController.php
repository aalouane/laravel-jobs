<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
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
}
