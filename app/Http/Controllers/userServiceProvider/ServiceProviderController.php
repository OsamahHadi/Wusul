<?php

namespace App\Http\Controllers\userServiceProvider;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceProviderController extends Controller
{
    public function home()
    {
        $orders=count(Order::CheckOwner()->get());
        $orders_done=count(Order::CheckOwner()->where('status',3)->get());
        $orders_fail=count(Order::CheckOwner()->whereIn('status',[4,5])->get());
        $services=count(Service::where('user_id',Auth::id())->get());
        $transactions=Auth::user()->wallet->transactions->where('type','deposit');
        $total=0;
        foreach ($transactions as $transaction ) {
            $total+=$transaction->amount;
        };
        return view('service_provider.home',compact('orders','orders_done','orders_fail','services','total'));
    }

}
