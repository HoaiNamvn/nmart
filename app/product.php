<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'value', 'description', 'check_status', 'thumbnail'
    ];
}
