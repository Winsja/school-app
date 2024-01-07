<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'teacher_id'];
    use HasFactory;

    // relacja pomiędzy tabelą teacher i subject | subject.teacher_id = teacher.id
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
