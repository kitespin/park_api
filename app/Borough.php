<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borough extends Model
{
    protected $fillable = ["name"];
    public $timestamps = false;
}
