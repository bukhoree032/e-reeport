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
    
    return view('content.dashboard.dashboards-analytics');
    // if(!isset(Auth::user()->password)){
    //   return view('auth.login');
    // }else{
    //   return view('content.dashboard.dashboards-analytics');
    // }
  }
}
