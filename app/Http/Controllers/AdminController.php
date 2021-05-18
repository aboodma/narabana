<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function users($user_type)
    {
      $users = User::where('user_type',$user_type)->get();
      return view('backend.users.list',compact('users','user_type'));
    }

    public function user_view(User $user)
    {
      return $user;
    }

    public function user_edit(User $user)
    {
        return view('backend.users.edit',compact('user'));
    }
    public function user_create($user_type)
    {
      return view('backend.users.create',compact('user_type'));
    }
    public function user_update(Request $request , User $user)
    {
      
      $user->name = $request->name;
      $user->phone = $request->phone;
      if ($user->save()) {
        return redirect()->back();
      }
    }
    public function user_delete(Request $request , User $user)
    {
      return $user;
    }
    public function user_store(Request $request,$user_type)
    {
    try {
      $user =  User::create([
        'name' => $request->name,
        'email' =>$request->email,
        'password' => Hash::make($request->password),
        'user_type'=>$user_type
    ]);
    return redirect()->route('admin.users',$user_type);
    } catch (\Throwable $th) {
      //throw $th;
    }

    }
}
