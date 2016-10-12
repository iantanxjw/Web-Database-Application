<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public $fillable = ['movie', 'mv_name','u_id'
    ];
}
