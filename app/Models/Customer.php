<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // table
    protected $table = 'customers';

    // Relations
    public function reservation()
    {
        return $this->hasMany('App\Models\Reservation');
    }

    public function paymentRequest()
    {
        return $this->hasMany('App\Models\PaymentRequest');
    }
}
