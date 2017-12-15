<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Location;
use App\User;
use Carbon\Carbon;

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

    public static function makeNewEntry($user, $location, $amount)
    {
        $history = new History;
        $history->user_id = $user->id;
        $history->location_id = $location->id;
        $history->date = Carbon::now();
        $history->amount = $amount;
        $history->save();
    }

    public function getMember()
    {
        return History::where('date', $this->date)->where('date', '!=', date('d.m.Y'))->where('location_id', $this->location_id)->where('user_id', '!=', $this->user_id)->get();
    }

    public static function lastUserEntry(User $user)
    {
        return History::where('user_id', $user->id)->orderBy('date', 'DESC')->first();
    }


}
