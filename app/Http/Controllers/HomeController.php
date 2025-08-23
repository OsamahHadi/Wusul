<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->is_active==0){

            return redirect('activation')->with(Auth::logout());
        }
                // this check if user is admin
                if(Auth::user()->admin()){

                    //  this rout for admin/
                    return redirect(RouteServiceProvider::ADMIN);

                }else if(Auth::user()->userServiceProvider()){

                    //  this rout for serviceProvider/
                    return redirect(RouteServiceProvider::USER_SERVICE_PROVIDER);

                }else{


                    //  this rout for user
                    return redirect()->route('index');

                }
                // php artisan make:controller userServiceProvider --resource
    }

}
