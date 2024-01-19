<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teachers = User::where('user_type', 'teacher')->orderBy('fullname')->get();
        return view('admin.teachers.home', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function loginForm()
    {
        return view('teachers.home');
    }

    public function teacherLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required'],
            'password' => 'required'
        ]);

        $registered = User::where('email', $request->input('email'))->where('user_type', 'teacher')->get();

        if (count($registered) > 0) {
            if (auth()->attempt($validated)) {
                $request->session()->regenerate();

                return redirect('/')->with('message', 'Welcome back Teacher.');
            }

            return redirect()->back()->with('message', 'Email and password do not not match.')->with('status', 'danger');
        } else {
            return redirect()->back()->with('message', 'Email and password do not not match.')->with('status', 'danger');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (auth()->user() && auth()->user()->user_type == 'admin') {
            $validate = $request->validate([
                'teacher_id' => 'required',
                'email' => 'required',
                'fullname' => 'required'
            ]);

            if ($validate) {
                $pass = bcrypt($request->input('teacher_id'));
                User::create([
                    'user_id' => $request->input('teacher_id'),
                    'email' => $request->input('email'),
                    'fullname' => $request->input('fullname'),
                    'password' => $pass,
                    'user_type' => 'teacher'
                ]);

                return redirect('/teachers');
            }
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $teachers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $teachers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $teachers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teachers)
    {
        //
    }
}
