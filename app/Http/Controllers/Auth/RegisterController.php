<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Modules\Manage\Repositories\Repository as Repository;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $Repository;

    public function __construct(Repository $Repository)
    {
        $this->Repository = $Repository;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function pageregister()
    {
        $data['resultDistricts'] = $this->Repository->districts('provinces');
        
        return view('content.authentications.auth-register-basic',$data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $districts = \DB::table('districts')
            ->select('districts.name_th as dis_name','amphures.name_th as aum_name','provinces.name_th as pro_name')
            ->join('amphures','amphures.id','=','districts.amphure_id')
            ->join('provinces','amphures.province_id','=','provinces.id')
            ->where('districts.id',$data['districts'])
            ->get()[0];
        
        $data['districts'] = $districts->dis_name;
        $data['amphures'] = $districts->aum_name;
        $data['provinces'] = $districts->pro_name;
        
        $ีuser = \DB::table('users')
            ->where('users.districts',$data['districts'])
            ->get();
            
        $result =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $affected = \DB::table('users')
                ->where('id', $result->id)
                ->update([
                        'districts' => $data['districts'],
                        'amphures' => $data['amphures'],
                        'provinces' => $data['provinces']
                        ]);
        return $result;

        // if(!empty($ีuser[0])){
        //     // ถ้ามีข้อมูลของตำบลอยู่แล้วไม่สามารถสมัคได้
        //     return $data['districts'];
        // }else{
        //     $result =  User::create([
        //         'name' => $data['name'],
        //         'email' => $data['email'],
        //         'password' => Hash::make($data['password'])
        //     ]);

        //     $affected = \DB::table('users')
        //             ->where('id', $result->id)
        //             ->update([
        //                     'districts' => $data['districts'],
        //                     'amphures' => $data['amphures'],
        //                     'provinces' => $data['provinces']
        //                     ]);
        //     return $result;
        // }
        
    }
}
