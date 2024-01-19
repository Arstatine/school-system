<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Tags;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Str;

class ExcelController extends Controller
{
    //
    public function exportLists()
    {
        if (auth()->user() && auth()->user()->user_type == 'teacher') {
            $tags = Tags::with('student')->where('teacher_id', auth()->user()->id)->get();
            $data = [];

            foreach ($tags as $tag) {
                array_push($data, ['ID' => $tag->student->id, 'Student ID' => $tag->student->user_id, 'Name' => $tag->student->fullname, 'Grade' => '']);
            }

            return (new FastExcel($data))->download('student_lists.xlsx');
        } else {
            abort(404);
        }
    }

    public function importGrade(Request $request)
    {
        if (auth()->user() && auth()->user()->user_type == 'teacher') {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv',
            ]);

            $excelFile = $request->file('file');

            try {
                $group_id = Str::uuid()->toString();
                $teacher_id = auth()->user()->id;
                (new FastExcel)->import($excelFile, function ($line) use ($teacher_id, $group_id) {
                    if ($line['ID']) {
                        Grades::create([
                            'teacher_id' => $teacher_id,
                            'student_id' => $line['ID'],
                            'group_id' => $group_id,
                            'grade' => $line['Grade']
                        ]);
                    }
                });
                return redirect('/grades');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
            }
        } else {
            abort(404);
        }
    }
}
