<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'lat',
        'lang',
    ];
    public function location(){
        return $this->morphTo();
    }

    public function scopeIsWithinMaxDistance($query, $lat,$lang ,$radius = 1) {

        $haversine = "(6371 * acos(cos(radians($lat)) 
                        * cos(radians(lat)) 
                        * cos(radians(lang) 
                        - radians($lang)) 
                        + sin(radians($lat)) 
                        * sin(radians(lat))))";
        return $query
           ->select('lat','lang') //pick the columns you want here.
           ->selectRaw("{$haversine} AS distance")
           ->whereRaw("{$haversine} < ?", [$radius]);
   }

}
