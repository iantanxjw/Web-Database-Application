<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    public $timestamps = false;
    public $fillable = ["type", "qty", "booking_id"];
}
