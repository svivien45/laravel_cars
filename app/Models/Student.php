<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory; 
    public $timestamps = false;
    protected $fillable = ['name', 'class_id', 'gender'];

    function SchoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }
}
