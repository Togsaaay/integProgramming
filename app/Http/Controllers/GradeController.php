<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        return response()->json(Grade::all());
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:45']);
        $grade = Grade::create($request->all());
        return response()->json($grade, 201);
    }

    public function show(Grade $grade)
    {
        return response()->json($grade);
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate(['name' => 'required|string|max:45']);
        $grade->update($request->all());
        return response()->json($grade);
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return response()->json(null, 204);
    }
}
