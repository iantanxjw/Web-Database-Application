<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    public $fillable = ["location", "seats"];
}
