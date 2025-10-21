<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function courses()
    {
        return Course::orderBy('code')->get();
    }
    public function departments()
    {
        return Department::orderBy('code')->get();
    }
    public function academicYears()
    {
        return AcademicYear::orderBy('year')->get();
    }

    public function storeCourse(Request $request)
    {
        $data = $request->validate([
            'code' => ['required','string','max:50','unique:courses,code'],
            'name' => ['required','string','max:255'],
            'department' => ['nullable','string','max:255'],
            'status' => ['nullable','in:active,inactive'],
        ]);
        $data['status'] = $data['status'] ?? 'active';
        return Course::create($data);
    }

    public function storeDepartment(Request $request)
    {
        $data = $request->validate([
            'code' => ['required','string','max:50','unique:departments,code'],
            'name' => ['required','string','max:255'],
            'status' => ['nullable','in:active,inactive'],
        ]);
        $data['status'] = $data['status'] ?? 'active';
        return Department::create($data);
    }

    public function storeAcademicYear(Request $request)
    {
        $data = $request->validate([
            'year' => ['required','string','max:50','unique:academic_years,year'],
            'status' => ['nullable','in:active,inactive'],
        ]);
        $data['status'] = $data['status'] ?? 'active';
        return AcademicYear::create($data);
    }
}


