<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPerson extends Model
{
    protected $fillable = ['user_id', 'follow_id', 'info_id'];

    public function getRouteKeyName()
    {
        return 'info_id';
    }
}
