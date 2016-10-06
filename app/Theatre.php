<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    public $timestamps = false;
    public $fillable = ["location", "theatre_num", "seats"];
}
