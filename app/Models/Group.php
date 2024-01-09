<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = ['group_name'];
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_groups', 'group_id', 'student_id');
    }
}
