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
