<?php

namespace App\Http\Controllers;

use App\Models\ClassroomStudent;
use Illuminate\Http\Request;

class ClassroomStudentController extends Controller
{
    public function index()
    {
        return response()->json(ClassroomStudent::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'student_id' => 'required|exists:students,id',
        ]);

        $classroomStudent = ClassroomStudent::create($request->all());
        return response()->json($classroomStudent, 201);
    }

    public function show(ClassroomStudent $classroomStudent)
    {
        return response()->json($classroomStudent);
    }

    public function update(Request $request, ClassroomStudent $classroomStudent)
    {
        $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'student_id' => 'required|exists:students,id',
        ]);

        $classroomStudent->update($request->all());
        return response()->json($classroomStudent);
    }

    public function destroy(ClassroomStudent $classroomStudent)
    {
        $classroomStudent->delete();
        return response()->json(null, 204);
    }
}
