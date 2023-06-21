<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Analytics extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }
  
  public function index()
  {
    // dd(Auth::user()->districts);
    $data['user'] = \DB::table('users')
                  ->where('districts', Auth::user()->districts)
                  ->get();
    if(isset($data['user'][1])){
      $delet = \DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->delete();

      return view('auth.passwords.doubly',$data);
    }

    return redirect()->route('dashboard');
  }
}
