<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mark extends Model
{
    use HasFactory; 
    public $timestamps = false;
    protected $fillable = ['subject_id', 'student_id', 'mark'];

    function Subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    function Student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
