<?php

namespace App\Http\Controllers\qrcodeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QrlineController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //   $this->middleware('auth');
  }
  
  public function index()
  {
    return view('qrline');
  }
}

