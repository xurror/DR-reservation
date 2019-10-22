<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    // table
    protected $table = 'requests';

    // relations
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Package', 'package_id');
    }
}
