<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutFollowers extends Model
{
    protected $fillable = ['first_name', 'last_name', 'birthday', 'repository', 'user_id'];

    public function getRouteKeyName()
    {
        return "user_id";
    }
}
