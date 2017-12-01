<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Location;
use App\User;

class History extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function getMember()
    {
        return History::where('date', $this->date)->where('date', '!=', date('d.m.Y'))->where('location_id', $this->location_id)->where('user_id', '!=', $this->user_id)->get();
    }


}
