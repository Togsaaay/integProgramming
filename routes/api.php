<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;



// Public API Route for testing
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

// Expose API routes without authentication
// Route::apiResource('grades', GradeController::class);
// Route::apiResource('courses', CourseController::class);
// Route::apiResource('teachers', TeacherController::class);
// Route::apiResource('parents', ParentController::class);
// Route::apiResource('students', StudentController::class);
// Route::apiResource('classrooms', ClassroomController::class);
// Route::apiResource('attendances', AttendanceController::class);
// Route::apiResource('exam-types', ExamTypeController::class);
// Route::apiResource('exams', ExamController::class);
// Route::apiResource('exam-results', ExamResultController::class);
// Route::apiResource('classroom-students', ClassroomStudentController::class);

Route::post("/create-student", [StudentController::class, 'createStudent']);    
Route::post('/parents', [TestController::class, 'createParents']);
