<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    // table
    protected $table = 'rooms';
    // primary key
    public $primaryKey = 'room_id';
    // timestamps
    public $timestamps = false;

    // Relations
    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }
}
