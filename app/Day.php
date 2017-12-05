<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OpeningHours;

class Day extends Model
{
    public function openingHour()
    {
        return $this->hasMany(OpeningHours::class,'day_id');
    }
}
