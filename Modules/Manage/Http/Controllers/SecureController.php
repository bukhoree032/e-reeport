<?php

namespace Modules\Manage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\Repository as Repository;
use Modules\Admin\Repositories\ActivityRepository as ActivityRepository;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class SecureController extends UploadeFileController
{
    protected $Repository;

    public function __construct(Repository $Repository,ActivityRepository $ActivityRepository)
    {
        $this->middleware('auth');
        $this->Repository = $Repository;
        $this->ActivityRepository = $ActivityRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $id =1 ;
        if(Auth::user()->status != 5){
            return redirect()->route('index.meeting');
        }
        
        $data['pro'] = \DB::table('users')
                            ->select('provinces')
                            ->groupBy('provinces')
                        ->get();

        $time = date('Y-m');

        $data['id'] = $id;
        $data['time'] = $time;
        
        $timeth=date_create($data['time']);
        $timeth = date_format($timeth,"Y")+'543'."-".date_format($timeth,"m");

        $row = 0;

        foreach ($data['pro'] as $key_pro => $value_pro) {
            $data['meet'][$value_pro->provinces]['narcotics'] = 0;
            $data['meet'][$value_pro->provinces]['unrest'] = 0;
            $data['meet'][$value_pro->provinces]['guard'] = 0;
            $data['meet'][$value_pro->provinces]['covid'] = 0;
            $data['meet'][$value_pro->provinces]['picture_meet'] = 0;
        
            $data['result'] = \DB::table('meeting')
                                ->select('users.id as id_user','meeting.id as id_meet',
                                'meeting.narcotics','meeting.unrest','meeting.guard','meeting.covid','activitymeeting.picture_meet',
                                'users.provinces','users.amphures','users.districts','users.status')
                                ->join('activitymeeting', 'activitymeeting.id_meet', '=', 'meeting.id_user')
                                ->join('users', 'users.id', '=', 'meeting.id_user')
                                ->where('meeting.meeting_date', 'like', $timeth.'%')
                                ->where('users.provinces', $value_pro->provinces)
                                ->ORDERBY('amphures','deSC')
                                // ->where('meeting.id_user' ,$value->id)
                                ->get();

            foreach ($data['result'] as $key => $value) {
                $data['data_meet'][$row] = $value;
                $row ++;
                if($value->narcotics != ''){
                    $value->narcotics = 'มี';
                    $data['meet'][$value_pro->provinces]['narcotics'] ++;
                }
                
                if($value->unrest != ''){
                    $value->unrest = 'มี';
                    $data['meet'][$value_pro->provinces]['unrest'] ++;
                }
                
                if($value->guard != ''){
                    $value->guard = 'มี';
                    $data['meet'][$value_pro->provinces]['guard'] ++;
                }
                
                if($value->covid != ''){
                    $value->covid = 'มี';
                    $data['meet'][$value_pro->provinces]['covid'] ++;
                }
                
                if($value->picture_meet != '' AND $value->picture_meet != 's:0:"";'){
                    // dd($value->picture_meet);
                    $value->picture_meet = 'มี';
                    $data['meet'][$value_pro->provinces]['picture_meet'] ++;
                }
            }
        }
        return view('admin::secure.secure',$data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index_search(Request $request)
    {
        // dd($request->cars);
        $id =1 ;
        if(Auth::user()->status != 5){
            return redirect()->route('index.meeting');
        }
        
        $data['pro'] = \DB::table('users')
                            ->select('provinces')
                            ->groupBy('provinces')
                        ->get();

        $time = $request->cars;
// dd($time);
        $data['id'] = $id;
        $data['time'] = $time;
        
        $timeth=date_create($data['time']);
        $timeth = date_format($timeth,"Y")+'543'."-".date_format($timeth,"m");

        $row = 0;

        foreach ($data['pro'] as $key_pro => $value_pro) {
            $data['meet'][$value_pro->provinces]['narcotics'] = 0;
            $data['meet'][$value_pro->provinces]['unrest'] = 0;
            $data['meet'][$value_pro->provinces]['guard'] = 0;
            $data['meet'][$value_pro->provinces]['covid'] = 0;
            $data['meet'][$value_pro->provinces]['picture_meet'] = 0;
        
            $data['result'] = \DB::table('meeting')
                                ->select('users.id as id_user','meeting.id as id_meet',
                                'meeting.narcotics','meeting.unrest','meeting.guard','meeting.covid','activitymeeting.picture_meet',
                                'users.provinces','users.amphures','users.districts','users.status')
                                ->join('activitymeeting', 'activitymeeting.id_meet', '=', 'meeting.id_user')
                                ->join('users', 'users.id', '=', 'meeting.id_user')
                                ->where('meeting.meeting_date', 'like', $timeth.'%')
                                ->where('users.provinces', $value_pro->provinces)
                                ->ORDERBY('amphures','deSC')
                                // ->where('meeting.id_user' ,$value->id)
                                ->get();

            foreach ($data['result'] as $key => $value) {
                $data['data_meet'][$row] = $value;
                $row ++;
                if($value->narcotics != ''){
                    $value->narcotics = 'มี';
                    $data['meet'][$value_pro->provinces]['narcotics'] ++;
                }
                
                if($value->unrest != ''){
                    $value->unrest = 'มี';
                    $data['meet'][$value_pro->provinces]['unrest'] ++;
                }
                
                if($value->guard != ''){
                    $value->guard = 'มี';
                    $data['meet'][$value_pro->provinces]['guard'] ++;
                }
                
                if($value->covid != ''){
                    $value->covid = 'มี';
                    $data['meet'][$value_pro->provinces]['covid'] ++;
                }
                
                if($value->picture_meet != '' AND $value->picture_meet != 's:0:"";'){
                    // dd($value->picture_meet);
                    $value->picture_meet = 'มี';
                    $data['meet'][$value_pro->provinces]['picture_meet'] ++;
                }
            }
        }
        return view('admin::secure.secure',$data);
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function amp($id)
    {
        $data['result'] = \DB::table('amphures')
                        ->where('id',$id)
                        ->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('manage::create');
        // ประเภทกิจกรรม
        // $data['user'] = \DB::table('activity')
        // ->join('users', 'users.id', '=', 'activity.id_districts')
        // -> select('activity.name','activity.category','users.status','users.districts','users.amphures','users.provinces')
        // // ->select('category',\DB::raw("count(category) as sumwithdraw"))
        // // ->where('status' ,'1')
        // // ->GROUPBY('category')
        //                     ->ORDERBY('provinces','deSC')
        //                     ->ORDERBY('amphures','deSC')
        // ->get();
        // // dd($data['user']);
        // return view('admin::secure.activity',$data);
        // dd($data['user']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('manage::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('manage::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
