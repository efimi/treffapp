<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\OpeningHours;
use App\History;

class Location extends Model
{
    //
    protected $guarded = [];

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

    public function openinHours()
    {
        return $this->hasMany(OpeningHours::class, 'location_id');
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

        $locations = $locations->sortByDesc('used_places');

        return $locations->first();
    }

    public function used_places()
    {
        return count(History::where('date', Carbon::now()->toDateString())->where('location_id', $this->id)->get());
    }
}
