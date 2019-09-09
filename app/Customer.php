<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // table
    protected $table = 'customer';
    // primary key
    public $primaryKey = 'customer_id';
    // timestamps
    public $timestamps = false;
    

    // Relations
    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }
}
