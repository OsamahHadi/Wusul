<?php

namespace App\Models;

use App\Models\User;
use App\Models\Address;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public $path="assets/images/orders/";

    protected $fillable = [
        'description',
        'price',
        'code',
        'hash_code',
        'status',
        'payment_id',
        'service_id',
        'user_id',
        'images',
        'date'
    ];
    protected $casts = [
        'date' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }

        // order  address
public function Address(){
    return $this->morphOne(Address::class,'address');
}
    // order  location
    public function location(){
        return $this->morphOne(Location::class,'location');
    }

    public function payment(){
        return $this->hasOne(Payment::class,'order_id');
    }

    public function scopeCheckOwner($query){
        if(Auth::user()->userServiceProvider()){

            return $query->whereHas('service',function ($q){
                $q->where('user_id',Auth::id());
            });
        }elseif (Auth::user()->type==0) {
            return $query->where('user_id',Auth::id());
        }else {
        }
    }
    public function scopeWithFilters($query, $search,$category,$status)
    {
        return $query->when($search, function ($query) use ($search) {

           $query->where(function ($query) use ($search) {
                    $query->where(function ($query) use ($search) {
                            $query->whereHas('user', function ($query)  use ($search){
                                if(Auth::user()->type==1 || Auth::user()->type==2){
                                    $query->where('name', 'like', '%' .  $search . '%');
                                }else{
                                    $query->where('id', '=',  '' );
                                }
                            })->orWhereHas('service', function ($query)  use ($search){
                                if(Auth::user()->type == 1 || Auth::user()->type == 0){
                                $query->whereHas('user',function ($query)  use ($search){
                                    return $query->where('name', 'like', '%' .  $search . '%');
                                });
                            }else{
                                    $query->where('name', 'like', '%' .  $search . '%');
                            }
                            });
                        
                        });

            });
            })->when($status, function ($query) use ($status) {
                
                    $query->where('status', $status );
            })->when($category, function ($query) use ($category) {
                        $query->whereHas('service', function ($query)  use ($category){
                            $query->where('service_cat_id', $category);});
            });

}
}
