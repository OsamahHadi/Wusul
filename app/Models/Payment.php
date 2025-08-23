<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    public $path="assets/images/payments/";

    protected $fillable = [
        'image',
        'payment_type_id',
        'code',
        'checkPayment',
        'receipt'
    ];

    // public function paymentType(){
    //     return $this->belongsTo(PaymentType::class,'payment_type_id');
    // }

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
