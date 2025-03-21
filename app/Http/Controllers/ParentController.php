<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
class ParentController extends Controller
{
    public function index()
    {
        return response()->json(ParentModel::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:parents,email',
            'password' => 'required|string|min:6',
            'fname' => 'required|string|max:45',
            'lname' => 'required|string|max:45',
        ]);

        $parent = ParentModel::create($request->all());
        return response()->json($parent, 201);
    }

    public function show(ParentModel $parent)
    {
        return response()->json($parent);
    }

    public function update(Request $request, ParentModel $parent)
    {
        $parent->update($request->all());
        return response()->json($parent);
    }

    public function destroy(ParentModel $parent)
    {
        $parent->delete();
        return response()->json(null, 204);
    }

    

    public function createParents(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'email' => 'required|email|unique:parents,email',
                'password' => 'required|min:6',
                'fname' => 'required|string|max:45',
                'lname' => 'required|string|max:45',
                'dob' => 'required|date',
                'phone' => 'nullable|string|max:15',
                'mobile' => 'nullable|string|max:15',
                'status' => 'boolean'
            ]);
    
            // Create a new parent record
            $parent = Parent::create([
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash password
                'fname' => $request->fname,
                'lname' => $request->lname,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'mobile' => $request->mobile,
                'status' => $request->status ?? true,
            ]);
    
            return response()->json([
                'message' => 'Parent created successfully',
                'parent' => $parent
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}

