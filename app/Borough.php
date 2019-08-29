<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borough extends Model
{
    protected $fillable = ["name"];
    public $timestamps = false;

    public function parks()
    {
        return $this->hasMany(Park::class);
    }
}
