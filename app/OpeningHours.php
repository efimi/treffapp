<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\Day;
class OpeningHours extends Model
{
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }

}
