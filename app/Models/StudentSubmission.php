<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSubmission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'age',
        'course',
        'score',
        'farol',
        'axis_a',
        'axis_b',
        'axis_c',
        'axis_d',
    ];
}
