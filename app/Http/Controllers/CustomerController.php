<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   public function profile()
   {
       return view('website.customer.profile');
   }

   public function orders()
   {
       $user = auth()->user();
       $orders = $user->orders;
       return view('website.customer.orders',compact('orders'));
   }

   public function videos()
   {
    $user = auth()->user();
    $orders = $user->orders->where('status',2);
    return view('website.customer.videos',compact('orders'));
   
   }
}
