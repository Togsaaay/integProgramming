<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function index()
    {
        return response()->json(ExamType::all());
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:45']);

        $examType = ExamType::create($request->all());
        return response()->json($examType, 201);
    }

    public function show(ExamType $examType)
    {
        return response()->json($examType);
    }

    public function update(Request $request, ExamType $examType)
    {
        $request->validate(['name' => 'required|string|max:45']);
        $examType->update($request->all());
        return response()->json($examType);
    }

    public function destroy(ExamType $examType)
    {
        $examType->delete();
        return response()->json(null, 204);
    }
}
