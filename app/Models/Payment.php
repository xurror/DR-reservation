<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // table
    protected $table = 'payments';

    // relations
    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }
}
