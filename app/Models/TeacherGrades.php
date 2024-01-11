<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherGrades extends Model
{
    protected $table = 'grades';
    protected $primaryKey = 'id';
    protected $fillable = ['student_id', 'lesson_id', 'grade'];
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
