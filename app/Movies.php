<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable = ["mv_id", "title", "desc", "release_date", "genre", "poster", "bg"];
}
