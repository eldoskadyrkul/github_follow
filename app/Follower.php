<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
	protected $fillable = [
        'user_id', 'follow_id', 'status'
    ];
}
