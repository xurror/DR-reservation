<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    // table
    protected $table = 'packages';

    // Relations
    public function reservation()
    {
        return $this->hasMany('App\Models\Reservation');
    }
}
