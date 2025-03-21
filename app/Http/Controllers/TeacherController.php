<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return response()->json(Teacher::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|string|min:6',
            'fname' => 'required|string|max:45',
            'lname' => 'required|string|max:45',
        ]);

        $teacher = Teacher::create($request->all());
        return response()->json($teacher, 201);
    }

    public function show(Teacher $teacher)
    {
        return response()->json($teacher);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'fname' => 'required|string|max:45',
            'lname' => 'required|string|max:45',
        ]);

        $teacher->update($request->all());
        return response()->json($teacher);
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json(null, 204);
    }
}

