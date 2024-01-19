<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function tag($id)
    {
        if (auth()->user() && auth()->user()->user_type == 'admin') {
            $students = User::where('user_type', 'student')->get();
            $tags = Tags::with('student')->where('teacher_id', $id)->get();
            return view('admin.teachers.tag', ['id' => $id, 'students' => $students, 'tags' => $tags]);
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
            $selectedStudentIds = $request->input('students', []);
            $teacher_id = $request->input('teacher_id');

            Tags::where('teacher_id', $teacher_id)->delete();

            foreach ($selectedStudentIds as $student_id) {
                Tags::create([
                    'teacher_id' => $teacher_id,
                    'student_id' => $student_id
                ]);
            }

            return redirect('/teachers');
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tags $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tags $tags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tags $tags)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tags $tags)
    {
        //
    }
}
