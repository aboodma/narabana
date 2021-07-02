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
use App\ProviderService;
use App\Service;
use App\PayoutRequest;
use App\Country;
use Illuminate\Support\Facades\Hash;
use DB;


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
        $provider->video_thumpnail = 'uploads/thumbs/'.$random.".jpg";
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
        $slug = slugify($request->name);
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
        $provider->slug = $slug;
        $random = Str::random(40);
        $file = $request->file('video');
        $filename = $file->getClientOriginalName();
        $newName = explode('.',$filename);
        
        $newName = $random.'.'.$request->extension;
        $fil= $file->move(public_path(), $newName);

        $provider->video = $newName;

        $thumb = VideoThumbnail::createThumbnail(public_path($newName), public_path('uploads/thumbs/'), $random.'.jpg', 0, 540, 902);
        $provider->video_thumpnail = 'uploads/thumbs/'.$random.".jpg";
        $provider->user_id = $user->id;

       $provider->about_me = $request->about_me;
       $provider->provider_type_id = $request->provider_type_id;
       $provider->country_id = $request->country_id;
       $provider->is_approved = false;
       $provider->save(); 
       send_notify($user->mobile_token , "Welcome" , "Hi! Now you can manage your orders and your payments from your phone let's start now " , $image = null);
        
       
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
    public function AddService(Request $request)
    {
       $service = new ProviderService();
       $service->service_id = $request->service_id;
       $service->provider_id = auth()->user()->provider->id;
       $service->price = $request->price ;
       if ($service->save()) {
        return response()->json(1,$this->SuccessStatus);
        }else {
            return response()->json(1,$this->ServerError);
        }
    }
    public function AllServices(Request $request)
    {
        $serv = ProviderService::where('provider_id',auth()->user()->provider->id)->get();
        $data = array();
        $services = array();
        foreach ($serv as $ser) {
           array_push($data,$ser->service_id);
        }
        foreach (DB::table('services')->
        whereNotIn('id',$data)
        ->get() as $service){
            array_push($services,$service);
        }
      return response()->json($services,$this->SuccessStatus);

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
    public function DeleteService(Request $request)
    {
        $service = ProviderService::find($request->provider_service_id);
 
        if ($service->delete()) {
            return response()->json(1,$this->SuccessStatus);
        }else {
            return response()->json(1,$this->ServerError);
        }
    }
    public function update_profile(Request $request)
    {
        $slug = slugify($request->name);
    
       $provider = auth()->user()->provider;
        $provider->slug = $slug;
       $provider->about_me = $request->about_me;
       $provider->provider_type_id = $request->provider_type;
       $provider->country_id = $request->country_id;
       $provider->links_tiktok = $request->tiktok;
       $provider->links_fb = $request->fb;
       $provider->links_ig = $request->ig;
       $provider->links_snap = $request->snap;
       $provider->links_tweet = $request->tweet;
       $provider->links_youtube = $request->youtube;
       if ($request->has('video')) {
        $random = Str::random(40);
        $file = $request->file('video');
        $filename = $file->getClientOriginalName();
        $newName = explode('.',$filename);
        $newName = $random.'.'.$request->extension;
        $fil= $file->move(public_path(), $newName);
        $thumb = VideoThumbnail::createThumbnail(public_path($newName), public_path('uploads/thumbs/'), $random.'.jpg', 0, 540, 902);
        $provider->video_thumpnail = 'uploads/thumbs/'.$random.".jpg";
        $provider->video = $newName;
       }
       if ($provider->save()) {
           $user = auth()->user();
           $user->name = $request->name;
           if ($request->has('avatar')) {
            $random = Str::random(40);
            $file = $request->file('avatar');     
            $filename = $file->getClientOriginalName();
            $avatar = explode('.',$filename);
            $avatar = $random.'.'.$file->extension(); 
            if($fil= $file->move(public_path(), $avatar)){
                $user->avatar = $avatar;
                
            }            
           }
           if ($user->save()) {
            return response()->json(1,$this->SuccessStatus);
            }else {
            return response()->json(1,$this->ServerError);
            }
       }
       
    }
}
