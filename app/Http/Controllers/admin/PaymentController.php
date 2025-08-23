<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index(){
        $payments=Payment::with(['order' => function($q){
            $q->with(['service' => function($q){
                $q->with('user');
            },'user']);
        }])->get();
        // return $payments;
        return view('admin.payment',compact('payments'));
    }

    public function paymentCheck(Request $request){
        try {
            $payment=Payment::with('order')->findOrFail($request->id);
            $payment->update([
                'checkPayment'=>1,
            ]);
            $payment->order()->update([
                'status'=>7
            ]);
            $admin  = User::where('type', '1')->first();
    
            $admin->deposit($payment->order->price,['payment_id'=>$payment->id,
            'deposit'=>'تم اداع' .$payment->order->price .' مقابل الطلب رقم'. $payment->order->id]);
            // $order=Order::with('user','service','payment')->CheckOwner()->findOrFail($request->order);
            return redirect()->back()->with(['success' => 'تمت  العملية بنجاح   بنجاح']);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }


    //
    public function receiveOrder(Request $request)
    {
        try {
            // return $request;
            // get order
            $order=Order::with('payment')->CheckOwner()->findOrFail($request->id);

            $admin  = User::where('type', '1')->first();

            // check if user is receive order
            if ($order->payment->code ==  $request->code) {

                $rate=$order->price * (5 / 100);
                // calc total amount that convert to user
                $amount = $order->price - $rate;
                // get 
                $serviceProvider = $order->service->user;


                $admin->transfer($serviceProvider, $amount,['payment'=>$order->payment->id,'deposit'=>
                ' تم تحويل الملبغ '.$amount . ' مقابل الطلب رقم '.$order->id . ' بعد ان تم خصم' . $rate .' نسبة الموقع' . ' من اجمالي المبلغ  ' . $order->price,
                'pull'=>' تم سحب المبلغ '. $amount . ' مقابل تاكيد الطلب رقم ' . $order->id
            ]);

                $order->status = 3;

                $order->save();

                return redirect()->back()->with(['success' => 'تمت  العملية بنجاح   بنجاح']);
            }
        } catch (\Throwable $th) {
            // throw $th;
            return $th->getMessage();
        }
    }
}
