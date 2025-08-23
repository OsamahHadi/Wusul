<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index(){
        try {
            $user = User::with('profile','address','social')->findOrFail(Auth::id());
//            return $user;
            return view('user.profile',compact('user'));

        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function services(){
        try {
            $user = User::with('profile','address')->findOrFail(Auth::id());
//            return $user;
            return view('user.services',compact('user'));

        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function orders(){
        try {
    
            return view('user.orders');

        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function wallet(){
        try {
        
                $user   = User::find(Auth::id());
        
                $wallet = $user->wallet;
        
                $transactions = $wallet->transactions;
        
                $pull = 0;
        
                $deposition = 0;
        
                //clc recipient and sender
                foreach ($transactions as $transaction) {
        
                    if ($transaction->type == 'deposit'){

                        $deposition += $transaction->amount;
                    }
                    else{

                        $pull += $transaction->amount;
                    }
                }

            return view('user.wallet', compact('user','wallet', 'pull', 'deposition', 'transactions'));

        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    // show
    public function show($id){
        try {
            $user = User::with('profile','address','social')->findOrFail($id);

            return view('user.profile',compact('user'));

        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function showService($id){
        try {
            $user = User::with('profile','address')->findOrFail($id);
//            return $user;
            return view('user.services',compact('user'));

        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
