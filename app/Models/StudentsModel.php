<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'password', 'fname', 'lname', 'dob', 'phone', 'mobile', 'parent_id', 'date_of_join', 'status', 'last_login_date', 'last_login_ip'];

    public function parent()
    {
        return $this->belongsTo(ParentModel::class, 'parent_id');
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_student');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }
}

