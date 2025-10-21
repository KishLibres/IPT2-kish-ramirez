<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::orderBy('student_no')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_no' => ['required','string','max:50','unique:students,student_no'],
            'name' => ['required','string','max:255'],
            'email' => ['required','email','unique:students,email'],
            'course' => ['nullable','string','max:255'],
            'dept' => ['nullable','string','max:255'],
            'status' => ['nullable','in:active,inactive'],
        ]);
        $data['status'] = $data['status'] ?? 'active';
        return Student::create($data);
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => ['sometimes','string','max:255'],
            'email' => ['sometimes','email','unique:students,email,'.$student->id],
            'course' => ['sometimes','nullable','string','max:255'],
            'dept' => ['sometimes','nullable','string','max:255'],
            'status' => ['sometimes','in:active,inactive'],
        ]);
        $student->update($data);
        return $student;
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->noContent();
    }

    public function restore(Student $student)
    {
        $student->archived = false;
        $student->status = 'active';
        $student->save();
        return response()->json($student);
    }
}


