<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Http\Request;

class Rating extends Component
{
    public $orderId;
    public $stars;

    public function mount(Request $request){
        $order=Order::with('service','user')->CheckOwner()->findOrFail($request->id);
        $this->orderId=$request->id;
        $service_id=$order->service->id;
        $rating= $order->user->rating()->where('service_id',$service_id)->first();
        if($rating){
            $this->stars=$rating->pivot->stars;
            // $order->user->rating()->sync([$service_id => ['stars'=>'0']],false);
        }


    }
    public function render()
    {
        $order=Order::with('service','user')->CheckOwner()->findOrFail($this->orderId);
        $service = $order->service;
        $service_id = $service->id;
        $order->user->rating()->sync([$service_id =>['stars'=> $this->stars ?? '0']],false);

        $ratings=$service->rating()->get();
        $services=$service->user->services;
        $sumR=0;
        $sumS=0;
        foreach ($ratings as $rating) {
            $sumR+=(int)$rating->pivot->stars;
        }
        foreach ($services as $service) {
            $sumS+=(int)$service->stars;
        }
        $service->stars=($sumR/count($ratings)); 
        $service->save();
        $service->user->stars=($sumS/count($services)); 
        $service->user->save();
        return view('livewire.rating');
    }
}
