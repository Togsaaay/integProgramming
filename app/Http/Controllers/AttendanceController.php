<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return response()->json(Attendance::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'student_id' => 'required|exists:students,id',
            'status' => 'required|boolean',
            'remark' => 'nullable|string',
        ]);

        $attendance = Attendance::create($request->all());
        return response()->json($attendance, 201);
    }

    public function show(Attendance $attendance)
    {
        return response()->json($attendance);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $attendance->update($request->all());
        return response()->json($attendance);
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return response()->json(null, 204);
    }
}
