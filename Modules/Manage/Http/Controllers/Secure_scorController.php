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

class Secure_scorController extends UploadeFileController
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
        $time = date('Y-m');
            if(Auth::user()->status != 5){
                return redirect()->route('index.meeting');
            }
            
            $data['pro'] = \DB::table('users')
                                ->select('provinces')
                                ->groupBy('provinces')
                            ->get();
    
            $data['user'] = \DB::table('users')
                                ->select('id','provinces','amphures','districts','status')
                                // ->where('status' ,$id)
                                ->where('users.status', '!=' ,'5')
                                ->ORDERBY('provinces','deSC')
                                ->ORDERBY('amphures','deSC')
                                ->get();
            
            foreach ($data['user'] as $key => $value) {

                    $data['id'] = $id;
                    $data['time'] = $time;
                    
                    $timeth=date_create($data['time']);

                    // รายงานการประชุม
                    $time_y = date_format($timeth,"Y")+'543';
                    $time_m = date_format($timeth,"m");
                    $mont = [
                        '01'=>'มกราคม',
                        '02'=>'กุมภาพันธ์',
                        '03'=>'มีนาคม',
                        '04'=>'เมษายน',
                        '05'=>'พฤษภาคม',
                        '06'=>'มิถุนายน',
                        '07'=>'กรกฎาคม',
                        '08'=>'สิงหาคม',
                        '09'=>'กันยายน',
                        '10'=>'ตุลาคม',
                        '11'=>'พฤศจิกายน',
                        '12'=>'ธันวาคม',
                    ];
                    $data['result'] = \DB::table('reportmeeting')
                        ->select('id')
                        ->where('reportmeeting.month', $mont[$time_m])
                        ->where('reportmeeting.year', $time_y)
                        ->where('reportmeeting.id_user' ,$value->id)
                        ->get();  
                    
                    $timeth = date_format($timeth,"Y")+'543'."-".date_format($timeth,"m");
                    $data['user'][$key]->date = $timeth;

                    $mi = 'secure';
                    if(empty($data['result']['0'])){
                        $data['user'][$key]->$mi['report'] = 'ไม่มี';
                    }else{
                        $data['user'][$key]->$mi['report'] = 'มี';
                    }
                    // รายงานการประชุม

                    // บันทึกการประชุม

                    $data['result'] = \DB::table('meeting')
                                    ->LEFTJOIN('activitymeeting', 'meeting.id_user', '=', 'activitymeeting.id_meet')
                                    ->where('meeting.meeting_date', 'like', $timeth.'%')
                                    ->where('meeting.id_user' ,$value->id)
                                    ->get();
                    if(empty($data['result']['0'])){
                        $data['user'][$key]->$mi['meet'] = 'ไม่มี';
                    }else{
                        $data['user'][$key]->$mi['meet'] = 'มี';
                    }
                    
                    // บันทึกการประชุม

                    // รูปภาพ

                    foreach ($data['result'] as $key_result => $value_result) {

                        if($value_result->picture_meet != '' AND $value_result->picture_meet != 's:0:"";'){
                            $data['user'][$key]->$mi['picture_meet'] = 'มี';
                        }

                        if($value_result->strength != ''){
                            $data['user'][$key]->$mi['strength'] = 'มี';
                        }
                    }
                    if(!isset($data['user'][$key]->$mi['picture_meet'])){
                        $data['user'][$key]->$mi['picture_meet'] = 'ไม่มี';
                    }
                    
                    if(!isset($data['user'][$key]->$mi['strength'])){
                        $data['user'][$key]->$mi['strength'] = 'ไม่มี';
                    }
                    // รูปภาพ
                
            }
        return view('admin::secure_scor.secure_scor',$data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index_search(Request $request)
    {
        $id =1 ;
        if(Auth::user()->status != 5){
            return redirect()->route('index.meeting');
        }
        
        $data['pro'] = \DB::table('users')
                            ->select('provinces')
                            ->groupBy('provinces')
                        ->get();

        $data['user'] = \DB::table('users')
                            ->select('id','provinces','amphures','districts','status')
                            // ->where('status' ,$id)
                            ->where('users.status', '!=' ,'5')
                            ->ORDERBY('provinces','deSC')
                            ->ORDERBY('amphures','deSC')
                            ->get();
        
        foreach ($data['user'] as $key => $value) {

            $time = $request->cars;
            
                $data['id'] = $id;
                $data['time'] = $time;
                
                $timeth=date_create($data['time']);

                // รายงานการประชุม
                $time_y = date_format($timeth,"Y")+'543';
                $time_m = date_format($timeth,"m");
                $mont = [
                    '01'=>'มกราคม',
                    '02'=>'กุมภาพันธ์',
                    '03'=>'มีนาคม',
                    '04'=>'เมษายน',
                    '05'=>'พฤษภาคม',
                    '06'=>'มิถุนายน',
                    '07'=>'กรกฎาคม',
                    '08'=>'สิงหาคม',
                    '09'=>'กันยายน',
                    '10'=>'ตุลาคม',
                    '11'=>'พฤศจิกายน',
                    '12'=>'ธันวาคม',
                ];
                $data['result'] = \DB::table('reportmeeting')
                    ->select('id')
                    ->where('reportmeeting.month', $mont[$time_m])
                    ->where('reportmeeting.year', $time_y)
                    ->where('reportmeeting.id_user' ,$value->id)
                    ->get();  
                
                $timeth = date_format($timeth,"Y")+'543'."-".date_format($timeth,"m");
                $data['user'][$key]->date = $timeth;

                $mi = 'secure';
                if(empty($data['result']['0'])){
                    $data['user'][$key]->$mi['report'] = 'ไม่มี';
                }else{
                    $data['user'][$key]->$mi['report'] = 'มี';
                }
                // รายงานการประชุม

                // บันทึกการประชุม

                $data['result'] = \DB::table('meeting')
                                ->LEFTJOIN('activitymeeting', 'meeting.id', '=', 'activitymeeting.id_meet')
                                ->where('meeting.meeting_date', 'like', $timeth.'%')
                                ->where('meeting.id_user' ,$value->id)
                                ->get();
                if(empty($data['result']['0'])){
                    $data['user'][$key]->$mi['meet'] = 'ไม่มี';
                }else{
                    $data['user'][$key]->$mi['meet'] = 'มี';
                }
                
                // บันทึกการประชุม

                // รูปภาพ

                foreach ($data['result'] as $key_result => $value_result) {

                    if($value_result->picture_meet != '' AND $value_result->picture_meet != 's:0:"";'){
                        $data['user'][$key]->$mi['picture_meet'] = 'มี';
                    }

                    if($value_result->strength != ''){
                        $data['user'][$key]->$mi['strength'] = 'มี';
                    }
                }
                
                if(!isset($data['user'][$key]->$mi['picture_meet'])){
                    $data['user'][$key]->$mi['picture_meet'] = 'ไม่มี';
                }
                    
                if(!isset($data['user'][$key]->$mi['strength'])){
                    $data['user'][$key]->$mi['strength'] = 'ไม่มี';
                }
                // รูปภาพ
            
        }
        return view('admin::secure_scor.secure_scor',$data);
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function excell($time)
    {
        $id =1 ;
            if(Auth::user()->status != 5){
                return redirect()->route('index.meeting');
            }
            
            $data['pro'] = \DB::table('users')
                                ->select('provinces')
                                ->groupBy('provinces')
                            ->get();
    
            $data['user'] = \DB::table('users')
                                ->select('id','provinces','amphures','districts','status')
                                // ->where('status' ,$id)
                                ->where('users.status', '!=' ,'5')
                                ->ORDERBY('provinces','deSC')
                                ->ORDERBY('amphures','deSC')
                                ->get();
            
            foreach ($data['user'] as $key => $value) {

                    $data['id'] = $id;
                    $data['time'] = $time;
                    
                    $timeth=date_create($data['time']);

                    // รายงานการประชุม
                    $time_y = date_format($timeth,"Y")+'543';
                    $time_m = date_format($timeth,"m");
                    $mont = [
                        '01'=>'มกราคม',
                        '02'=>'กุมภาพันธ์',
                        '03'=>'มีนาคม',
                        '04'=>'เมษายน',
                        '05'=>'พฤษภาคม',
                        '06'=>'มิถุนายน',
                        '07'=>'กรกฎาคม',
                        '08'=>'สิงหาคม',
                        '09'=>'กันยายน',
                        '10'=>'ตุลาคม',
                        '11'=>'พฤศจิกายน',
                        '12'=>'ธันวาคม',
                    ];
                    $data['result'] = \DB::table('reportmeeting')
                        ->select('id')
                        ->where('reportmeeting.month', $mont[$time_m])
                        ->where('reportmeeting.year', $time_y)
                        ->where('reportmeeting.id_user' ,$value->id)
                        ->get();  
                    
                    $timeth = date_format($timeth,"Y")+'543'."-".date_format($timeth,"m");
                    $data['user'][$key]->date = $timeth;

                    $mi = 'secure';
                    if(empty($data['result']['0'])){
                        $data['user'][$key]->$mi['report'] = '0';
                    }else{
                        $data['user'][$key]->$mi['report'] = '1';
                    }
                    // รายงานการประชุม

                    // บันทึกการประชุม

                    $data['result'] = \DB::table('meeting')
                                    ->LEFTJOIN('activitymeeting', 'meeting.id', '=', 'activitymeeting.id_meet')
                                    ->where('meeting.meeting_date', 'like', $timeth.'%')
                                    ->where('meeting.id_user' ,$value->id)
                                    ->get();
                    if(empty($data['result']['0'])){
                        $data['user'][$key]->$mi['meet'] = '0';
                    }else{
                        $data['user'][$key]->$mi['meet'] = '1';
                    }
                    
                    // บันทึกการประชุม

                    // รูปภาพ
                    $data['user'][$key]->$mi['picture_meet'] = '0';

                    foreach ($data['result'] as $key_result => $value_result) {

                        if($value_result->picture_meet != '' AND $value_result->picture_meet != 's:0:"";'){
                            $data['user'][$key]->$mi['picture_meet'] = '1';
                        }

                        if($value_result->strength != ''){
                            $data['user'][$key]->$mi['strength'] = '1';
                        }
                    }
                    if(!isset($data['user'][$key]->$mi['picture_meet'])){
                        $data['user'][$key]->$mi['picture_meet'] = '0';
                    }
                    
                    if(!isset($data['user'][$key]->$mi['strength'])){
                        $data['user'][$key]->$mi['strength'] = '0';
                    }
                    // รูปภาพ
                
            }
            return view('admin::secure_scor.secure_scor_excell',$data);
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
