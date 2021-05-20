<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

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
    public function index()
    {
        //
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
