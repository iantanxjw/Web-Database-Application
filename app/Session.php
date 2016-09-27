<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $fillable = ["start_time", "duration", "num_bookings"];
}
