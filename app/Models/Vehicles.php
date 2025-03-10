<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
