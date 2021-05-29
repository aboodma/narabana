<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Service;
use App\ProviderService;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use FFMpeg\Filters\Video\VideoFilters;
use Illuminate\Support\Str;
use ProtoneMedia\LaravelFFMpeg\FFMpeg\CopyFormat;
class ProviderController extends Controller
{

    public function dashboard()
    {
        return view('website.provider.dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('website.provider.profile');
    }
    public function services()
    {
        return view('website.provider.services');
    }
    public function orders()
    {
        $orders = auth()->user()->provider->orders;
        return view('website.provider.orders',compact('orders'));
    }
    public function orders_procced(Order $order)
    {
        return view('website.provider.order_procced',compact('order'));
    }
    public function video_order_upload(Request $request)
    {
        if($request->hasFile('video')){
            $random = Str::random(40);
            $file = $request->file('video');     
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/ham_video';
            $newName = explode('.',$filename);
            $newName = $random.'.'.$newName[1];
            $fil= $file->move($path, $newName);
            FFMpeg::fromDisk('unoptimized_video')->open('ham_video/'.$newName)
            ->export()
            ->save($random.'.webm');
            unlink($path.'/'.$newName);
        }
        $order = Order::find($request->order_id);
        $order_details = $order->details;
        $order_details->provider_message = asset('uploads/'.$random.'.webm');
        $order_details->save();
        $order->status = 0;
        $order->save();
        return redirect()->route('provider.orders');

    }
    public function other_order_upload(Request $request)
    {
        $order = Order::find($request->order_id);
        $order_details = $order->details;
        $order_details->provider_message = $request->provider_note;
        $order_details->save();
        $order->status = 0;
        $order->save();
        return redirect()->route('provider.orders');

    }
    public function add_service(Service $service)
    {
       return view('website.provider.add_service',compact('service'));
    }
    public function store_service(Request $request)
    {
        $service_provider = new ProviderService();
        $service_provider->service_id = $request->service_id;
        $service_provider->provider_id = auth()->user()->provider->id;
        $service_provider->price = $request->price;
        if ($service_provider->save()) {
            return redirect()->route('provider.services');
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
    public function store(Request $request,$user_type)
    {
        $user =  User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'user_type'=>$user_type
        ]);
        if ($user) {
            $provider = new Provider();
            $provider->user_id = $user->id;
            $provider->about_me = $request->about_me;
            $provider->provider_type_id = $request->provider_type;
            $provider->country_id = $request->country_id;
            $provider->is_approved = $request->is_approved;
            $provider->save();
            return $provider;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user,$user_type)
    {

        $user->name = $request->name;
        $user->phone = $request->phone;
        if ($user->save()) {
            $provider = Provider::where('user_id',$user->id)->first();
            $provider->about_me = $request->about_me;
            $provider->country_id = $request->country_id;
            $provider->provider_type_id = $request->provider_type;
            $provider->is_approved = $request->is_approved;
            if ($provider->save()) {
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user ,Provider $provider)
    {
        if ($user->delete()) {
            if ($provider->delete()) {
                return redirect()->back();
            }
        }

    }
}
