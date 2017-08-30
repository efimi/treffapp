<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public function locations()
    {
      return $this->hasMany(Location::class);
    }
    public function visitors()
    {
      return $this->hasMany(Visitor::class);
    }
}
