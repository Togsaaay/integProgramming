<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use Illuminate\Support\Facades\Hash;
use Exception;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function createParents(Request $request)
    {
        try {
            // Validate input
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

            // Create the parent record
            $parent = ParentModel::create([
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
