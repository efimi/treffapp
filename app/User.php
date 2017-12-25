<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\History;
use App\Location;
use Carbon\Carbon;
use Auth;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'facebook_id', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function history()
    {
        return $this->hasMany(History::class);
    }
    public function locationToday()
    {
        return Location::find($this->last_click()->location_id);
    }
    public function amount()
    {
        return History::lastUserEntry($this)->amount;
    }

    public function last_click(){
        $last = History::lastUserEntry($this);
        return $last;
    }
    public function canPress()
    {
        // TODO: anpassen der Minuten
        return empty($this->last_click()) OR $this->minutesTillPressAllowed() <= 0 ;
    }
    public function minutesTillPressAllowed()
    {   $last_click = Carbon::parse($this->last_click()->date);
        $minutes = 1;
        $deadline = Carbon::now();
        return $deadline->diffInMinutes($last_click->addMinutes($minutes), false);
    }
    public function hasLocationAlready()
    {
        $last = History::lastUserEntry($this);
        if(empty($last)){
            return false;
        }
        return $last->confirmed;
    }
    public function getLastConfirmedLcoation()
    {
        if ($this->hasLocationAlready() == 'true ') {
            return History::lastUserEntry($this);
        }
        else {
            return null;
        }
    }
    public function matchedLocation()
    {
        return Location::find($this->last_click()->location_id);
    }
}
