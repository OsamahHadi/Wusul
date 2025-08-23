<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCat extends Model
{
    use HasFactory;

    public $path="assets/images/admin/services_cat/";
    protected $fillable = [
        'name',
        'image',
        'description'
    ];
    public function services(){
        return $this->hasMany(Service::class,'service_cat_id','id');
    }
    
}
