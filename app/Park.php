<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    protected $fillable = ["name"];

    public function borough()
    {
        return $this->belongsTo(Borough::class);
    }
}
