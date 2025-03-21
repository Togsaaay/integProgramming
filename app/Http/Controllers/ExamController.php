<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        return response()->json(Exam::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'exam_type_id' => 'required|exists:exam_types,id',
            'start_date' => 'required|date',
        ]);

        $exam = Exam::create($request->all());
        return response()->json($exam, 201);
    }

    public function show(Exam $exam)
    {
        return response()->json($exam);
    }

    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'exam_type_id' => 'required|exists:exam_types,id',
            'start_date' => 'required|date',
        ]);

        $exam->update($request->all());
        return response()->json($exam);
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
        return response()->json(null, 204);
    }
}
