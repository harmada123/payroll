<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    protected $fillable = [
        'deduction _type','amount','user_id','cutoff'
    ];
}
