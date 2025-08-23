<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'sender_id',
        'show',
    ];

    public function user(){
        return $this->belongsTo(User::class,'sender_id');
    }

    public function scopeWithFilters($query, $search,$status)
    {
        return $query->when($search, function ($query) use ($search) {
           $query->where(function ($query) use ($search) {
                $query->where('message', 'like', '%' .  $search . '%')
                ->orWhere(function ($query) use ($search) {
                    $query->whereHas('user', function ($query)  use ($search){
                            $query->where('name', 'like', '%' .  $search . '%');
                });
            });

            });
    })->when($status, function ($query) use ($status) {
        $status==2?$query->where('show', 0 ):$query->where('show', $status );
});
}   
}
