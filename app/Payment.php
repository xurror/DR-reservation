<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // table
    protected $table = 'payment';
    // primary key
    public $primaryKey = 'payment_id';
    // timestamps
    public $timestamps = false;

    // relations
    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }
}
