<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    // table
    protected $table = 'payment_requests';

    // relations
    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation', 'reservation_id');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\Payment', 'payment_id');
    }
}
