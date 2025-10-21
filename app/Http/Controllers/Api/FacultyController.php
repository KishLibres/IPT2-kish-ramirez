<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        return Faculty::orderBy('code')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => ['required','string','max:50','unique:faculty,code'],
            'name' => ['required','string','max:255'],
            'email' => ['required','email','unique:faculty,email'],
            'department' => ['nullable','string','max:255'],
            'status' => ['nullable','in:active,inactive'],
        ]);
        $data['status'] = $data['status'] ?? 'active';
        return Faculty::create($data);
    }

    public function update(Request $request, Faculty $faculty)
    {
        $data = $request->validate([
            'name' => ['sometimes','string','max:255'],
            'email' => ['sometimes','email','unique:faculty,email,'.$faculty->id],
            'department' => ['sometimes','nullable','string','max:255'],
            'status' => ['sometimes','in:active,inactive'],
        ]);
        $faculty->update($data);
        return $faculty;
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return response()->noContent();
    }

    public function restore(Faculty $faculty)
    {
        $faculty->archived = false;
        $faculty->status = 'active';
        $faculty->save();
        return response()->json($faculty);
    }
}


