<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'phone', 'address'];
    use HasFactory;

    public function groups()
    {
        return $this->belongsTo(Group::class, 'students_groups', 'student_id', 'group_id');
    }
}
