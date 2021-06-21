<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;
use App\User;
use App\Order;

class ApiController extends Controller
{
    public function Login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validated) {
            $userdata = array(
                'email'=>$request->email,
                'password'=>$request->password,
            );
            try {
               $att = Auth::attempt($userdata);
                if ($att) {
                    $token = Str::random(60);

                    $request->user()->forceFill([
                        'api_token' => hash('sha256', $token),
                        'mobile_token' => $request->token,
                    ])->save();
                    $data = array(
                        'user'=>auth()->user()->provider->loadMissing('orders.details')->loadMissing('orders.service'),
                        'user'=>auth()->user(),
                        'earnings'=>auth()->user()->wallets->where('transaction_type',0)->sum('amount'),
                        'withdrawl'=>(auth()->user()->wallets->where('transaction_type',0)->sum('amount') - auth()->user()->wallets->where('transaction_type',1)->sum('amount')),
                        'orders'=>auth()->user()->provider->orders->count(),
                        'providerTypeName'=>auth()->user()->provider->ProviderType->name,
                        'country'=>auth()->user()->provider->country->name,
                    );

                     return response()->json($data, 200);
                }
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function GetUserByToken($token)
    {
        $user = User::where('api_token',$token)->first();
        $data = array(
            'user'=>$user->provider->loadMissing('orders.details')->loadMissing('orders.service'),
            'user'=>$user,
            'earnings'=>$user->wallets->where('transaction_type',0)->sum('amount'),
            'withdrawl'=>($user->wallets->where('transaction_type',0)->sum('amount') - $user->wallets->where('transaction_type',1)->sum('amount')),
            'orders'=>$user->provider->orders->count(),
            'providerTypeName'=>$user->provider->ProviderType->name,
            'country'=>$user->provider->country->name,
        );

     return response()->json($data, 200);
    }

    public function AcceptOrder(Request $request)
    {
       try {
        $order = Order::find($request->id);
        $order->status = 1;
        if ($order->save()) {
            return response()->json($order->status,200);
        }
       } catch (\Throwable $th) {
           return $th;
       }
    }
    public function RejectOrder(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = 3;
        if ($order->save()) {
            return response()->json($order->status,200);
        }
    }
}
