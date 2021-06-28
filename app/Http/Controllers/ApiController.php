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
use App\Provider;
use App\ProviderType;
use App\PayoutRequest;
use App\Country;
use Illuminate\Support\Facades\Hash;
class ApiController extends Controller
{
    public $SuccessStatus = 200;
    public $RequirementField = 201;
    public $ServerError = 202;
    public $msg  = ["errors"=>null];

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
                         'services'=>auth()->user()->provider->services->loadMissing('service'),
                        'providerTypeName'=>auth()->user()->provider->ProviderType->name,
                        'country'=>auth()->user()->provider->country->name,
                    );

                     return response()->json($data, $this->SuccessStatus);
                }else {
                    $this->msg['errors'] = "Login Informations Wrong";
            return response()->json($this->msg, $this->ServerError);
                }
            } catch (\Throwable $th) {
                $this->msg['errors'] = "Login Informations Wrong";
                return response()->json($this->msg, $this->ServerError);
            }
        }else{
            $this->msg['errors'] = "Login Informations Wrong";
            return response()->json($this->msg, $this->ServerError);
        }
    }

    public function GetUserByToken()
    {

        if (Auth::check()) {
            $data = array(
                'user'=>auth()->user()->provider->loadMissing('orders.details')->loadMissing('orders.service'),
                'user'=>auth()->user(),
                'earnings'=>auth()->user()->wallets->where('transaction_type',0)->sum('amount'),
                'withdrawl'=>(auth()->user()->wallets->where('transaction_type',0)->sum('amount') - auth()->user()->wallets->where('transaction_type',1)->sum('amount')),
                'orders'=>auth()->user()->provider->orders->count(),
                'services'=>auth()->user()->provider->services->loadMissing('service'),
                'providerTypeName'=>auth()->user()->provider->ProviderType->name,
                'country'=>auth()->user()->provider->country->name,
            );
    
            return response()->json($data, $this->SuccessStatus);
        }else{
            $msg['errors'] = "No User Signed In";
            return response()->json($this->msg, $this->ServerError);
        }
    }

    public function AcceptOrder(Request $request)
    {
        // return $request->all();
        $order = Order::find($request->id);

        if ($order) {
        $order->status = 1;
        if ($order->save()) {
            return response()->json($order->status,$this->SuccessStatus);
        }else{
            $this->msg['errors'] = "The Order Not Accepted ";
            return response()->json($this->msg, $this->ServerError);
        }
        }else {
            $this->msg['errors'] = "The Order Not Found ";
            return response()->json($this->msg, $this->ServerError);
        }
    }
    public function RejectOrder(Request $request)
    {
        $order = Order::find($request->id);
        if ($order) {
            $order->status = 3;
        if ($order->save()) {
            return response()->json($order->status,$this->SuccessStatus);
        }else {
            $this->msg['errors'] = "The Order Not Rejected ";
            return response()->json($this->msg, $this->ServerError);
        }
        }else {
            $this->msg['errors'] = "The Order Not Found ";
            return response()->json($this->msg, $this->ServerError);
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

        }else {
            $this->msg['errors'] = "Please upload Video ";
            return response()->json($this->msg, $RequirementField);
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
        return response()->json(1,$this->SuccessStatus);
    }

    public function user(Request $request)
    {
        return $request;
    }
    public function Logout(Request $request)
    {
        $user = auth()->user();
        $user->api_token = null;
        if ($user->save()) {
            return response()->json(1,$this->SuccessStatus);
        }
    }
    public function SignUp(Request $request)
    {
        //  return $request->all();
      $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
        'about_me' => 'required',
        'provider_type_id' => 'required',
        'country_id' => 'required',
    ]);
    if ($validated) {
     $random = Str::random(40);
     $file = $request->file('avatar');
     $filename = $file->getClientOriginalName();
     $avatar = explode('.',$filename);
     $avatar = $random.'.'.$file->extension();

   if ($fil= $file->move(public_path(), $avatar)) {
       // File is saved successfully

     $user =  User::create([
        'name' => $request->name,
        'email' =>$request->email,
        'password' => Hash::make($request->password),
        'user_type'=>1,
        'avatar'=>$avatar,
        'api_token' => Str::random(60),
    ]);
  }
    if ($user) {
     $provider = new Provider();

        $random = Str::random(40);
        $file = $request->file('video');
        $filename = $file->getClientOriginalName();
        $newName = explode('.',$filename);
        
        $newName = $random.'.'.$request->extension;
        $fil= $file->move(public_path(), $newName);

        $provider->video = $newName;


       $provider->user_id = $user->id;

       $provider->about_me = $request->about_me;
       $provider->provider_type_id = $request->provider_type_id;
       $provider->country_id = $request->country_id;
       $provider->is_approved = false;
       $provider->save(); 
       
        
       
    }
    }else {
        $this->msg['errors'] = "Login Informations Wrong";
        return response()->json($this->msg, $this->ServerError);
    }
}

    public function Categories()
    {
        $categories = ProviderType::all();
        return response()->json($categories, $this->SuccessStatus);
    }
    public function Countries()
    {
        $countries = Country::all();
        return response()->json($countries, $this->SuccessStatus);
    }
    public function payout_request(Request $request)
    {
        $payout = new PayoutRequest();
        $payout->user_id = auth()->user()->id;
        $payout->amount = $request->amount;
        $payout->status = 0;
        $payout->admin_msg = "";
        $payout->details = "IBAN : ". $request->iban . " Account Owner Name : " .$request->account_name;
        if ($payout->save()) {
            return response()->json(1, $this->SuccessStatus);
        }
    }
    public function UpdateService(Request $request)
    {
        $service = ProviderService::find($request->provider_service_id);
        $service->price = $request->price;
        if ($service->save()) {
            return response()->json(1,$this->SuccessStatus);
        }else {
            return response()->json(1,$this->ServerError);
        }
    }
}
