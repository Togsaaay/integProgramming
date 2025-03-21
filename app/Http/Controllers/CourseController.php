<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return response()->json(Course::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    public function show(Course $course)
    {
        return response()->json($course);
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'grade_id' => 'required|exists:grades,id',
        ]);

        $course->update($request->all());
        return response()->json($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }
}

