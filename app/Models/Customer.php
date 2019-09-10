<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // table
    protected $table = 'customers';
    // timestamps
    public $timestamps = false;

    // Relations
    public function reservation()
    {
        return $this->hasMany('App\Models\Reservation');
    }
}
