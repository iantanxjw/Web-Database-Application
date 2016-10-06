<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $timestamps = false;
    public $fillable = ["start_time", "duration", "num_bookings", "mv_id", "t_id"];


}
