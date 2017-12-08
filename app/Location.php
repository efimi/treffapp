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

    public function isCanceld($date)
    {
        return !empty(Reservation::where('location_id', $this->id )->whereRaw('Date(date) = Date('. $date .')')->first());
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
            if (($location['used_places'] + $amount) > $location->max_places OR $location->isCanceld(Carbon::now())) {
                $locations->forget($key);
            }
        });

        $locations = $locations->sortByDesc('used_places');
        // TODO: in Random Order
        return $locations->first();
    }

    public function used_places()
    {
        return History::whereRaw('Date(date) = CURDATE()')->where('location_id', $this->id)->where('confirmed', 1)->get()->pluck('amount')->sum();
    }
}
