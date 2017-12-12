<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Location;

class Reservation extends Model
{
    //
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    
    public function isCanceld()
    {
    	if (empty($this)) {
    		return false;
    	}
    	else {
    		return $this->canceld;
    	}
    }
}
