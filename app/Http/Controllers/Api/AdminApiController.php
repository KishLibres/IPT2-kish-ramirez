<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminApiController extends Controller
{
    public function stats()
    {
        $students = \App\Models\Student::where('archived', false)->count();
        $faculty = \App\Models\Faculty::where('archived', false)->count();
        $courses = \App\Models\Course::count();
        $departments = \App\Models\Department::count();
        return response()->json([
            'students' => $students,
            'faculty' => $faculty,
            'courses' => $courses,
            'departments' => $departments,
            'pending_enrollments' => 0,
            'system_status' => 'OK',
            'year' => '2025-2026',
        ]);
    }

    // legacy stubs removed; data now served by dedicated controllers
}


