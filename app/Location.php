<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Location extends Model
{
    //
    protected $guarded = [];

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

    static public function getPossibleLocations($amount)
    {
        $today = Carbon::now()->dayOfWeek;
        $location = self::whereRaw('used_places <= max_places - ' . $amount)
            ->where('closed_on', '!=', $today)
            ->orderBy('used_places', 'DESC')
            ->inRandomOrder()
            ->first();
        if (empty($location)) {
            $location = self::orderBy('used_places', 'ASC')
                ->first();
        }
        return $location;
    }
}
