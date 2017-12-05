<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\OpeningHours;

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
        return self::whereRaw('used_places <= max_places - ' . $amount)
            ->where('closed_on', '!=', $today)
            ->orderBy('used_places', 'DESC')
            ->inRandomOrder()
            ->first();
    }
}
