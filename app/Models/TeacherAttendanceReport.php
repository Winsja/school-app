<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAttendanceReport extends Model
{
    protected $table = 'attendance';
    protected $primaryKey = 'id';
    protected $fillable = ['student_id', 'lesson_id', 'isPresent'];
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
