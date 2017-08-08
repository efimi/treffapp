<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    //
    public function locations()
    {
      return $this->belongsTo(Location::class);
    }
    public function logbook()
    {
      return $this->belongsTo(LogBook::class);
    }

}
