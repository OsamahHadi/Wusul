<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id',
        'is_active'
    ];
    public function state(){
        return $this->belongsTo(State::class,'state_id');
    }
}
