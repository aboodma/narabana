<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function provider_profile(Provider $provider)
     {
        return view('website.provider_profile',compact('provider'));
     }


     public function customer_dashboard()
     {
        return view('website.customer.dashboard');
     }
     public function checkout(Request $request)
     {
   
        return view('website.checkout');
     }

     public function payment_info(Request $request)
     {
        return view('website.payment_info');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
