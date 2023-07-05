<?php

namespace Modules\Manage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manage\Repositories\Repository as Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class AuthController extends UploadeFileController
{
    protected $Repository;

    public function __construct(Repository $Repository)
    {
        $this->middleware('auth');
        $this->Repository = $Repository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['user'] = \DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->get();

        return view('auth.passwords.profile',$data);
    }

    public function profileupdate(Request $request)
    {
        $uploade = new UploadeFileController();
        if (!empty($request['files'])) {
            $request['file'] = $uploade->uploadImage(
                $request['files'],
                'profile',
                Str::random(5)
            );
        }
        
        $this->Repository->updateAll($request->all(), $request->iduser,'classModelUser');

        return redirect()->route('auth.profile');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function reset($id)
    {
        $data['user'] = \DB::table('users')
        ->where('id' ,$id)
        ->get()[0];

        return view('auth.passwords.reset',$data);
    }

    public function resetupdate(Request $request)
    {
        if($request->password != $request->password_confirmation){
            
            $data['user'] = \DB::table('users')
                            ->where('id' ,$request->iduser)
                            ->get()[0];
            
            return view('auth.passwords.reset',$data);
        }

        if($request->iduser == Auth::user()->id || Auth::user()->status == '5'){
            $password = Hash::make($request->password);
            $aa = $request->all();
            $affected = \DB::table('users')
                        ->where('id', $request->iduser)
                        ->update(['password' => $password]);
        }

        return redirect()->route('dashboard');
    }

    // public function delet($id)
    // {
    //     $this->Repository->destroy($id,'classModelActivity');
        
    //     return redirect()->route('index.activity');
    // }
}
