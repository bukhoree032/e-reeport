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
                                    ->join('activitymeeting', 'activitymeeting.id_meet', '=', 'meeting.id_user')
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
                    $data['user'][$key]->$mi['picture_meet'] = 'ไม่มี';

                    foreach ($data['result'] as $key_result => $value_result) {

                        if($value_result->picture_meet != '' AND $value_result->picture_meet != 's:0:"";'){
                            $data['user'][$key]->$mi['picture_meet'] = 'มี';
                        }
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
                                ->join('activitymeeting', 'activitymeeting.id_meet', '=', 'meeting.id_user')
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
                $data['user'][$key]->$mi['picture_meet'] = 'ไม่มี';

                foreach ($data['result'] as $key_result => $value_result) {

                    if($value_result->picture_meet != '' AND $value_result->picture_meet != 's:0:"";'){
                        $data['user'][$key]->$mi['picture_meet'] = 'มี';
                    }
                }
                // รูปภาพ
            
        }
        return view('admin::secure_scor.secure_scor',$data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index_search1(Request $request)
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
            // $data['meet'][$value_pro->provinces]['picture_meet'] = 0;
        
            $data['result'] = \DB::table('meeting')
                                ->select('users.id as id_user','meeting.id as id_meet',
                                'meeting.narcotics','meeting.unrest','meeting.guard','meeting.covid','activitymeeting.picture_meet',
                                'users.provinces','users.amphures','users.districts','users.status')
                                ->join('activitymeeting', 'activitymeeting.id_meet', '=', 'meeting.id_user')
                                ->join('users', 'users.id', '=', 'meeting.id_user')
                                ->where('meeting.meeting_date', 'like', $timeth.'%')
                                ->where('users.provinces', $value_pro->provinces)
                                ->where('users.status', '!=' ,'5')
                                ->ORDERBY('amphures','deSC')
                                // ->where('meeting.id_user' ,$value->id)
                                ->get();

            foreach ($data['result'] as $key => $value) {
                $data['data_meet'][$row] = $value;
                $row ++;
                if($value->narcotics != ''){
                    $value->narcotics = 'มี';
                    $data['meet'][$value_pro->provinces]['narcotics'] ++;
                }else{
                    $value->narcotics = 'ไม่มี';
                }
                
                if($value->unrest != ''){
                    $value->unrest = 'มี';
                    $data['meet'][$value_pro->provinces]['unrest'] ++;
                }else{
                    $value->unrest = 'ไม่มี';
                }
                
                if($value->guard != ''){
                    $value->guard = 'มี';
                    $data['meet'][$value_pro->provinces]['guard'] ++;
                }else{
                    $value->guard = 'ไม่มี';
                }
                
                if($value->covid != ''){
                    $value->covid = 'มี';
                    $data['meet'][$value_pro->provinces]['covid'] ++;
                }else{
                    $value->covid = 'ไม่มี';
                }
                
                // if($value->picture_meet != '' AND $value->picture_meet != 's:0:"";'){
                //     // dd($value->picture_meet);
                //     $value->picture_meet = 'มี';
                //     $data['meet'][$value_pro->provinces]['picture_meet'] ++;
                // }else{
                //     $value->picture_meet = 'ไม่มี';
                // }
            }
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
                                    ->join('activitymeeting', 'activitymeeting.id_meet', '=', 'meeting.id_user')
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
                    }
                    // รูปภาพ
                
            }
            return view('admin::secure_scor.secure_scor_excell',$data);
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // public function excell1($time)
    // {
    //     $id =1 ;
    //         if(Auth::user()->status != 5){
    //             return redirect()->route('index.meeting');
    //         }
            
    //         $data['pro'] = \DB::table('users')
    //                             ->select('provinces')
    //                             ->groupBy('provinces')
    //                         ->get();
    
    //         $data['user'] = \DB::table('users')
    //                             ->select('id','provinces','amphures','districts','status')
    //                             // ->where('status' ,$id)
    //                             ->where('users.status', '!=' ,'5')
    //                             ->ORDERBY('provinces','deSC')
    //                             ->ORDERBY('amphures','deSC')
    //                             ->get();
            
    //         $y = date('Y');
    //         $m = date('m');
    //         for ($i_y='2023'; $i_y <= $y; $i_y++) { 
    //             for ($i_m = '06'; $i_m <= '7'; $i_m++) { 
    //                 $time = $i_y.'-'.$i_m;


    //                     foreach ($data['user'] as $key => $value) {

    //                             $data['id'] = $id;
    //                             $data['time'] = $time;
                                
    //                             $timeth=date_create($data['time']);

    //                             // รายงานการประชุม
    //                             $time_y = date_format($timeth,"Y")+'543';
    //                             $time_m = date_format($timeth,"m");
    //                             $mont = [
    //                                 '01'=>'มกราคม',
    //                                 '02'=>'กุมภาพันธ์',
    //                                 '03'=>'มีนาคม',
    //                                 '04'=>'เมษายน',
    //                                 '05'=>'พฤษภาคม',
    //                                 '06'=>'มิถุนายน',
    //                                 '07'=>'กรกฎาคม',
    //                                 '08'=>'สิงหาคม',
    //                                 '09'=>'กันยายน',
    //                                 '10'=>'ตุลาคม',
    //                                 '11'=>'พฤศจิกายน',
    //                                 '12'=>'ธันวาคม',
    //                             ];
    //                             $data['result'] = \DB::table('reportmeeting')
    //                                 ->select('id')
    //                                 ->where('reportmeeting.month', $mont[$time_m])
    //                                 ->where('reportmeeting.year', $time_y)
    //                                 ->where('reportmeeting.id_user' ,$value->id)
    //                                 ->get();  
                                
    //                             $timeth = date_format($timeth,"Y")+'543'."-".date_format($timeth,"m");
    //                             $data['user'][$key]->date = $timeth;

    //                             $mi = 'secure';
    //                             if(empty($data['result']['0'])){
    //                                 $data['user'][$key]->$mi[$timeth]['report'] = '0';
    //                             }else{
    //                                 $data['user'][$key]->$mi[$timeth]['report'] = '1';
    //                             }
    //                             // รายงานการประชุม

    //                             // บันทึกการประชุม

    //                             $data['result'] = \DB::table('meeting')
    //                                             ->join('activitymeeting', 'activitymeeting.id_meet', '=', 'meeting.id_user')
    //                                             ->where('meeting.meeting_date', 'like', $timeth.'%')
    //                                             ->where('meeting.id_user' ,$value->id)
    //                                             ->get();
    //                             if(empty($data['result']['0'])){
    //                                 $data['user'][$key]->$mi[$timeth]['meet'] = '0';
    //                             }else{
    //                                 $data['user'][$key]->$mi[$timeth]['meet'] = '1';
    //                             }
                                
    //                             // บันทึกการประชุม

    //                             // รูปภาพ
    //                             $data['user'][$key]->$mi[$timeth]['picture_meet'] = '0';

    //                             foreach ($data['result'] as $key_result => $value_result) {

    //                                 if($value_result->picture_meet != '' AND $value_result->picture_meet != 's:0:"";'){
    //                                     $data['user'][$key]->$mi[$timeth]['picture_meet'] = '1';
    //                                 }
    //                             }
    //                             // รูปภาพ
    //                     }

            
    //                 if($i_m == '13'){
    //                     $i_m = '01';
    //                 }
    //             }
                
    //         }
    //         return view('admin::secure_scor.secure_scor_excell',$data);
    // }

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
