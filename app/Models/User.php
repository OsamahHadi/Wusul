<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Report;
use App\Models\Address;
use App\Models\Service;
use App\Models\Location;
use App\Models\UserProfile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;

class User extends Authenticatable implements Wallet
//    , MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable , HasWallet;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'is_active',

    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // user profile
    public function profile(){
        return $this->hasOne(UserProfile::class,'user_id');
    }

    // user  address
public function address(){
    return $this->morphOne(Address::class,'address');
}
    // user  location
    public function location(){
        return $this->morphOne(Location::class,'location');
    }

    // user services
public function services()
{
    return $this->hasMany(Service::class, 'user_id');
}

// user services rating
public function rating()
{
    return $this->belongsToMany(Service::class, 'service_rating')->withPivot('stars');
}

// user social
public function social(){
    return $this->hasOne(Social::class);
}

// user Orders
public function orders(){
    return $this->hasMany(Order::class,'user_id');
}

// user reports
public function reports(){
    return $this->hasMany(Report::class,'sender_id');
}
public function admin(){
    if($this->type == 1){
        return true;
    }else{
        return false;
    }
}
public function userServiceProvider(){
    if($this->type == 2){
        return true;
    }else{
        return false;
    }


}
public function scopeWithFilters($query, $search,$type,$active,$stars)
{
    return $query->when($search, function ($query) use ($search) {
       $query->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' .  $search . '%')
            ->orWhere('email', 'like', '%' .  $search . '%');
        });
})
->when($active, function ($query) use ($active) {
    $query->where(function ($query) use ($active) {
        $e;
       if($active == 3){
            $query->where('email_verified_at', '!=', '');
        }else{
            $active==2?$active=0:$active=1;
            $query->where('is_active', $active );
            }
        });
})
    ->when($type, function ($query) use ($type) {
            if($type==3){
                $type=0;
            }
            $query->where('type', $type);
    })
    ->when($stars, function ($query) use ($stars) {
        $query->where('stars', $stars);
    });
}


}
