<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model
{
    use HasFactory;

    public $path="assets/images/serviceProvider/works/";

    protected $fillable = [
        'service_id',
        'title',
        'image',
        'url'
    ];

    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
    
    public function scopeCheckOwner($query){

        return $query->whereHas('service',function ($q){
            $q->where('user_id',Auth::id());
        });
    }

    
}
