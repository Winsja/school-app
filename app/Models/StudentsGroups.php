<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsGroups extends Model
{
    protected $table = 'students_groups';
    protected $primaryKey = 'id';
    protected $fillable = ['student_id', 'group_id'];
    use HasFactory;
}
