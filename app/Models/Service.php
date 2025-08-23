<?php

namespace App\Models;

use App\Models\User;
use App\Models\Address;
use App\Models\ServiceCat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    public $path="assets/images/serviceProvider/services/";

    protected $fillable = [
        'user_id',
        'name',
        'image',
        'description',
        'type',
        'price',
        'stars',
        'service_cat_id',
        'interval',
        'is_active'
    ];

// // user services
public function user()
{
    return $this->belongsTo(User::class, 'user_id') ;
}


// user services rating
public function rating()
{
    return $this->belongsToMany(User::class, 'service_rating')->withPivot('stars');
}


// orders on service
    public function orders(){
        return $this->hasMany(Order::class,'service_id');
    }

    // service `s works
    public function works(){
        return $this->hasMany(Work::class,'service_id');
    }

    // category of service
    public function category(){
        return $this->belongsTo(ServiceCat::class,'service_cat_id');
    }

    public function scopeWithFilters($query, $search,$category,$active,$stars)
    {
        return $query->when($search, function ($query) use ($search) {
           $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' .  $search . '%')
                ->orWhere('description', 'like', '%' .  $search . '%')
                ->orWhere(function ($query) use ($search) {
                    $query->whereHas('user', function ($query)  use ($search){
                        return $query->where('name', 'like', '%' .  $search . '%');
                    })
                    ->orWhere(function ($query) use ($search) {
                        $query->whereHas('address', function ($query)  use ($search){
                            return $query->where('description', 'like', '%' .  $search . '%');
                        });
                    });
                });

            });
    })
    ->when($active, function ($query) use ($active) {
        $query->where('is_active', $active );
})
        ->when($category, function ($query) use ($category) {
                $query->where('service_cat_id', $category);
        })
        ->when($stars, function ($query) use ($stars) {
            $query->where('stars', $stars);
        });
}


    public function address(){
        return $this->hasOneThrough(Address::class, User::class,'id','address_id','user_id','id')
        ->where(
            'address_type', 'App\\Models\\User'
        );
    }
//     //Topic Model
// public function users()
// {
//     return $this->belongsToMany(User::class, 'subscribers', 'subscribale_id', 'user_id')
//         ->where('subscribale_type', static::class);
// }

}
