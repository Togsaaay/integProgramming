<?php

namespace App\Http\Controllers;

use App\Models\ExamResult;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    public function index()
    {
        return response()->json(ExamResult::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'student_id' => 'required|exists:students,id',
            'marks' => 'required|string|max:45',
        ]);

        $examResult = ExamResult::create($request->all());
        return response()->json($examResult, 201);
    }

    public function show(ExamResult $examResult)
    {
        return response()->json($examResult);
    }

    public function update(Request $request, ExamResult $examResult)
    {
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'student_id' => 'required|exists:students,id',
            'marks' => 'required|string|max:45',
        ]);

        $examResult->update($request->all());
        return response()->json($examResult);
    }

    public function destroy(ExamResult $examResult)
    {
        $examResult->delete();
        return response()->json(null, 204);
    }
}
