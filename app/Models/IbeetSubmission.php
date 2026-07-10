<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IbeetSubmission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'score',
        'farol',
        'axis_a',
        'axis_b',
        'axis_c',
        'axis_d',
    ];
}
