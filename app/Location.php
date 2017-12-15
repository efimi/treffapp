<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\OpeningHours;
use App\History;
use App\Reservation;

class Location extends Model
{
    //
    protected $guarded = [];

    public function openinHours()
    {
        return $this->hasMany(OpeningHours::class, 'location_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'location_id');
    }
    // Todo: function functioniert nicht
    public function reservationFor($date)
    {
        return $this->reservations()->whereRaw('date('. $date .') = date(created_at)')->first();
    }
    public function reservationForToday()
    {
        return $this->reservations()->whereRaw('CURRENT_DATE = date(created_at)')->first();
    }

    public function hasCanceld($date)
    {
        return $this->reservationFor($date)->isCanceld();
    }
     public function hasCanceldToday()
    {
        return $this->reservationForToday()->isCanceld();
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }

    static public function getPossibleLocations($amount)
    {
        $today = Carbon::now()->dayOfWeek;
        $locations = self::where('closed_on', '!=', $today)->get();
        foreach ($locations AS $key => $location) {
            $locations[$key]['used_places'] = $location->used_places();
        }
        $locations->each(function ($location, $key) use ($amount, $locations) {
            if (($location['used_places'] + $amount) > $location->max_places) {
                $locations->forget($key);
            }
        });
        $locations = $locations->sortByDesc('used_places')->shuffle();
        // wenn alle schon belegt sind
        if (empty($locations)){
            $locations = self::where('closed_on', '!=', $today)->get();
        }
        // TODO: in Random Order
        return $locations;
    }

    public function used_places()
    {
        return History::whereRaw('Date(date) = CURDATE()')->where('location_id', $this->id)->where('confirmed', 1)->get()->pluck('amount')->sum();
    }
}
