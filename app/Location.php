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


    public function scopeIncrementUsedPlacesOf($query,$id)
    {
      return $query->whereId($id)->increment('used_places');
    }
    public static function getNewRandom()
    {
      
      $today = Carbon::now()->formatLocalized('%A');
      return self::where('closed_on', '!=', $today)->where('is_used', false)->inRandomOrder()->first();
    }

}
