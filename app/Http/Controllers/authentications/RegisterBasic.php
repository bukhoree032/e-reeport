<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Modules\Manage\Repositories\Repository as Repository;


class RegisterBasic extends Controller
{
  protected $Repository;

  public function __construct(Repository $Repository)
  {
      $this->Repository = $Repository;
  }

  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }
  
  public function insert(Request $request)
  {
    $data['resultDistricts'] = $this->Repository->districts('provinces');

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
  ]);
  return redirect()->route('dashboard-analytics');
  }
}
