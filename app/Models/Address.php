<?php

namespace App\Models;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'city_id',
        'description'
    ];

    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    
    public function state(){
        return $this->belongsTo(State::class,'state_id');
    }

    public function scopeWithFilters($query, $state, $city)
    {
        return $query->when($state, function ($query) use ($state) {
                $query->where('state_id','=' ,intval($state));
            })
            ->when($city, function ($query) use ($city) {
                $query->where('city_id','=',intval($city));
            });
    }
    
    public function address(){
        return $this->morphTo();
    }
}
