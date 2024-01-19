<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (auth()->user() && auth()->user()->user_type == 'admin') {
            $students = User::where('user_type', 'student')->orderBy('fullname')->get();
            return view('admin.students.home', ['students' => $students]);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (auth()->user() && auth()->user()->user_type == 'admin') {
            $validate = $request->validate([
                'student_id' => 'required',
                'email' => 'required',
                'fullname' => 'required'
            ]);

            if ($validate) {
                $pass = bcrypt($request->input('student_id'));
                User::create([
                    'user_id' => $request->input('student_id'),
                    'email' => $request->input('email'),
                    'fullname' => $request->input('fullname'),
                    'password' => $pass,
                    'user_type' => 'student',
                ]);

                return redirect('/students');
            }
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $students)
    {
        //
    }
}
