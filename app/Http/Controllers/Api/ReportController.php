<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Faculty;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function studentsCsv(Request $request)
    {
        $course = trim((string) $request->query('course', ''));
        $dept = trim((string) $request->query('dept', ''));

        $query = Student::query();
        if ($course !== '' && strtolower($course) !== 'all') {
            $query->where('course', $course);
        }
        if ($dept !== '' && strtolower($dept) !== 'all') {
            $query->where('dept', $dept);
        }
        $rows = $query->orderBy('student_no')->get(['student_no','name','email','course','dept','year_level','status']);

        $lines = [];
        $lines[] = 'student_no,name,email,course,dept,year_level,status';
        foreach ($rows as $r) {
            $lines[] = sprintf('%s,%s,%s,%s,%s,%s,%s',
                self::csv($r->student_no),
                self::csv($r->name),
                self::csv($r->email),
                self::csv($r->course),
                self::csv($r->dept),
                self::csv($r->year_level),
                self::csv($r->status)
            );
        }
        $csv = implode("\r\n", $lines) . "\r\n";
        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="students.csv"',
        ]);
    }

    public function facultyCsv(Request $request)
    {
        $dept = trim((string) $request->query('dept', ''));
        $query = Faculty::query();
        if ($dept !== '' && strtolower($dept) !== 'all') {
            $query->where('department', $dept);
        }
        $rows = $query->orderBy('code')->get(['code','name','email','department','status']);

        $lines = [];
        $lines[] = 'code,name,email,department,status';
        foreach ($rows as $r) {
            $lines[] = sprintf('%s,%s,%s,%s,%s',
                self::csv($r->code),
                self::csv($r->name),
                self::csv($r->email),
                self::csv($r->department),
                self::csv($r->status)
            );
        }
        $csv = implode("\r\n", $lines) . "\r\n";
        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="faculty.csv"',
        ]);
    }

    private static function csv($value): string
    {
        $s = (string) ($value ?? '');
        $s = str_replace('"', '""', $s);
        if (preg_match('/[",\n\r]/', $s)) {
            return '"' . $s . '"';
        }
        return $s;
    }
}


