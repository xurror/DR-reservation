<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // table
    protected $table = 'reservations';

    // Relations
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Rooms');
    }

    public function payment()
    {
        return $this->hasMany('App\Models\Payment');
    }
}
