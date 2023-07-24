<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordBasic extends Controller
{
  public function index(Request $request)
  {
    $user = \DB::table('users')
            ->where('email',$request->email)
            ->where('tel',$request->tel)
            ->get();
    if(isset($user[0])){
      return redirect()->route('auth.reset.password',$user[0]->id);
    }
    // return redirect()->route('home');
    
    $user = \DB::table('users')
            ->where('email',$request->email)
            ->get();
    if(isset($user[0])){
      $user = \DB::table('users')
            ->where('tel',$request->tel)
            ->get();
            
      return redirect()->back()->with('success', 'เบอร์โทรศัพท์ไม่ถูกต้อง');
    }else{
      return redirect()->back()->with('success', 'อีเมล์ไม่ถูกต้อง');
    }
  }
}
