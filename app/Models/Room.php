<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // table
    protected $table = 'rooms';

    // Relations
    public function reservation()
    {
        return $this->hasMany('App\Models\Reservation');
    }
}
