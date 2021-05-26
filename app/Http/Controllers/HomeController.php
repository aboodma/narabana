<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Order;
use Crypt;

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
        return view('website.checkout',compact('request'));
     }

     public function payment_info(Request $request)
     {
        return view('website.payment_info',compact('request'));
     }
     public function pay(Request $request)
     {
        $order = New Order;
        $order->user_id = auth()->user()->id;
        $order->provider_id = $request->provider_id;
        $order->service_id = $request->service_id;
        $order->total_price = $request->price;
        $order->status = 2;
        if (isset($request->is_public)) {
           $order->is_public = $request->is_public;
         }
        $order->save();

        $order_id =  Crypt::encrypt($order->id);
        return redirect()->route('order_complete',$order_id);
     }
     public function order_complete($order_id)
     {
      $order_id =  Crypt::decrypt($order_id);
      $order = Order::find($order_id);
      return view('website.order_complete');
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
