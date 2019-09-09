<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // table
    protected $table = 'reservation';
    // primary key
    public $primaryKey = 'reservation_id';
    // timestamps
    public $timestamps = false;

    // Relations
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function rooms()
    {
        return $this->belongsTo('App\Rooms', 'room_id');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }
}
