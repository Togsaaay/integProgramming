<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;

    // Define the table name explicitly
    protected $table = 'parents';  // ✅ Ensure this matches the database table

    // Allow mass assignment
    protected $fillable = [
        'email',
        'password',
        'fname',
        'lname',
        'dob',
        'phone',
        'mobile',
        'status',
        'last_login_date',
        'last_login_ip'
    ];
}
