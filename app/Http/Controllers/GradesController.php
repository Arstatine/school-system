<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (auth()->user() && auth()->user()->user_type == 'admin') {
            $grades = Grades::with('student')
                ->with('teacher')
                ->orderBy('created_at', 'desc')
                ->get()
                ->groupBy('group_id');

            return view('teachers.grades.lists', ['grades' => $grades]);
        } else if (auth()->user() && auth()->user()->user_type == 'teacher') {
            $teacher_id = auth()->user()->id;
            $grades = Grades::with('student')
                ->with('teacher')
                ->where('teacher_id', $teacher_id)
                ->orderBy('created_at', 'desc')
                ->get()
                ->groupBy('group_id');

            return view('teachers.grades.lists', ['grades' => $grades]);
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
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        if (auth()->user()) {
            $grades = Grades::with('student')->where('group_id', $id)->get();
            return view('teachers.grades.grade', ['grades' => $grades]);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grades $grades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grades $grades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grades $grades)
    {
        //
    }
}
