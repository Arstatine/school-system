<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function loginForm()
    {
        return view('admin.home');
    }

    public function adminLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required'],
            'password' => 'required'
        ]);

        $registered = User::where('email', $request->input('email'))->where('user_type', 'admin')->get();

        if (count($registered) > 0) {
            if (auth()->attempt($validated)) {
                $request->session()->regenerate();

                return redirect('/')->with('message', 'Welcome back admin.');
            }

            return redirect()->back()->with('message', 'Email and password do not not match.')->with('status', 'danger');
        } else {
            return redirect()->back()->with('message', 'Email and password do not not match.')->with('status', 'danger');
        }
    }

    // logout teacher/admin
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
