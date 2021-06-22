<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;
use App\User;
use App\Order;
use VideoThumbnail;
use App\Notification;
use App\Wallet;
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
        // return $request->all();
        $order = Order::find($request->id);
        $order->status = 1;
        if ($order->save()) {
            return response()->json($order->status,200);
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
    public function ProccedOrder(Request $request)
    {
        if($request->hasFile('video')){
            $random = Str::random(40);
            $file = $request->file('video');     
            $filename = $file->getClientOriginalName();
            $newName = explode('.',$filename);
            
            $newName = $random.'.'.$file->extension();
            $fil= $file->move(public_path(), $newName);
   
        }
        $thumb = VideoThumbnail::createThumbnail(public_path($newName), public_path('uploads/thumbs/'), $random.'.jpg', 0, 540, 902);
     
        $order = Order::find($request->order_id);
        $order_details = $order->details;
        $order_details->provider_message = $newName;
        $order_details->save();
        $order->status = 2;
        $order->save();
            $Providernotify = new Notification;
            $Providernotify->user_id = auth()->user()->id;
            $Providernotify->msg = "Order Status Updated";
            $Providernotify->type = 1;
            $Providernotify->save();

            $Customernotify = new Notification;
            $Customernotify->user_id = $order->user_id;
            $Customernotify->msg = "Order Status Updated";
            $Customernotify->type = 1;
            $Customernotify->save();
        $wallet = new Wallet();
        $wallet->user_id = auth()->user()->id;
        $wallet->transaction_type = 0 ;
        $wallet->amount = $order->total_price;
        $wallet->save();
    }

    public function user(Request $request)
    {
        return $request;
    }
}
