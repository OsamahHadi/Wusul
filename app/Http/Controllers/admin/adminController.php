<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers=count(User::all());
        $userServiceProvider=count(User::where('type',2)->get());
        $users=count(User::where('type',0)->get());
        $orders=count(Order::all());
        $orders_done=count(Order::where('status',3)->get());
        $orders_fail=count(Order::whereIn('status',[4,5])->get());
        $services=count(Service::all());
        $transactions=Auth::user()->wallet->transactions;
        $total=0;
        // return $transactions;
        foreach ($transactions as $transaction ) {
            if($transaction->type=='deposit'){
                $rate= ($transaction->amount) * (5 / 100);
                $total+=$rate;
            }
        };
        // return $total;
        // نسبة الموقع 
        return view('admin.home',compact('allUsers','userServiceProvider','users','orders','orders_done','orders_fail','total','services'));
    }

    public function reports(){
        try {
            $reports=Report::with('user')->paginate(10);
            return view('admin.complaints',compact('reports'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function reportShow($id){
        try {
            $report=Report::with('user')->findOrFail($id);
            $report->update([
                'show'=>1
            ]);
            return view('admin.report',compact('report'));

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
