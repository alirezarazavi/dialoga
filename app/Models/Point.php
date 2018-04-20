<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['dialog_id', 'user_id'];
    public $timestamps = false;
}
