<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;


class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:6',
            'fname' => 'required|string|max:45',
            'lname' => 'required|string|max:45',
            'parent_id' => 'nullable|exists:parents,id',
        ]);

        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function show(Student $student)
    {
        return response()->json($student);
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return response()->json($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(null, 204);
    }

    public function createStudent(Request $request)
{
    try {
        // Validate request data
        $request->validate([
            'email' => 'required|email|max:45|unique:students,email',
            'password' => 'required|min:6|max:45',
            'fname' => 'required|string|max:45',
            'lname' => 'required|string|max:45',
            'dob' => 'required|date',
            'phone' => 'nullable|string|max:15',
            'mobile' => 'nullable|string|max:15',
            'parent_id' => 'nullable|exists:parents,id',
            'date_of_join' => 'nullable|date',
            'status' => 'boolean',
        ]);

        // Create student
        $student = Student::create([
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encrypt password
            'fname' => $request->fname,
            'lname' => $request->lname,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'parent_id' => $request->parent_id,
            'date_of_join' => $request->date_of_join,
            'status' => $request->status ?? true, // Default true if not provided
        ]);

        return response()->json([
            'message' => 'Student created successfully',
            'student' => $student
        ], 201);
    } catch (Exception $e) {
        return response()->json([
            'message' => 'Error creating student',
            'error' => $e->getMessage()
        ], 500);
    }
}
}

