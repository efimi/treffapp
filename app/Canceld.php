<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Location;

class Canceld extends Model
{
    //
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
