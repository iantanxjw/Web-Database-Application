<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $timestamps = false;
    public $fillable = ["sess_id", "user_id", "status"];
}
