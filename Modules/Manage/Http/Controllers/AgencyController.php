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

class AgencyController extends UploadeFileController
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
                    $timeth = date_format($timeth,"Y")+'543'."-".date_format($timeth,"m");
                    $data['user'][$key]->date = $timeth;

                    // บันทึกการประชุม

                    $data['result'] = \DB::table('meeting')
                                    ->select('meeting.narcotics','meeting.unrest','meeting.guard','meeting.other1',
                                    'meeting.government','meeting.other2',
                                    'meeting.coordinate','meeting.other3',
                                    'meeting.covid','meeting.home','meeting.elder','meeting.other4',
                                    'meeting.education','meeting.other5',
                                    'meeting.executive','meeting.other6')
                                    ->where('meeting.meeting_date', 'like', $timeth.'%')
                                    ->where('meeting.id_user' ,$value->id)
                                    ->get();
                    
                    // บันทึกการประชุม

                    $mi = 'agency';
                    // รูปภาพ

                    $data['user'][$key]->$mi[1] = 'ไม่มี';
                    $data['user'][$key]->$mi[2] = 'ไม่มี';
                    $data['user'][$key]->$mi[3] = 'ไม่มี';
                    $data['user'][$key]->$mi[4] = 'ไม่มี';
                    $data['user'][$key]->$mi[5] = 'ไม่มี';
                    $data['user'][$key]->$mi[6] = 'ไม่มี';
                    foreach ($data['result'] as $key_result => $value_result) {
                        
                        if($value_result->narcotics != ''){
                            $data['user'][$key]->$mi[1] = 'มี';
                        }
                        if($value_result->unrest != ''){
                            $data['user'][$key]->$mi[1] = 'มี';
                        }

                        if($value_result->guard != ''){
                            $data['user'][$key]->$mi[1] = 'มี';
                        }

                        if($value_result->other1 != ''){
                            $data['user'][$key]->$mi[1] = 'มี';
                        }


                        if($value_result->government != ''){
                            $data['user'][$key]->$mi[2] = 'มี';
                        }

                        if($value_result->other2 != ''){
                            $data['user'][$key]->$mi[2] = 'มี';
                        }


                        if($value_result->coordinate != ''){
                            $data['user'][$key]->$mi[3] = 'มี';
                        }

                        if($value_result->other3 != ''){
                            $data['user'][$key]->$mi[3] = 'มี';
                        }


                        if($value_result->covid != ''){
                            $data['user'][$key]->$mi[4] = 'มี';
                        }

                        if($value_result->home != ''){
                            $data['user'][$key]->$mi[4] = 'มี';
                        }

                        if($value_result->elder != ''){
                            $data['user'][$key]->$mi[4] = 'มี';
                        }

                        if($value_result->other4 != ''){
                            $data['user'][$key]->$mi[4] = 'มี';
                        }


                        if($value_result->education != ''){
                            $data['user'][$key]->$mi[5] = 'มี';
                        }

                        if($value_result->other5 != ''){
                            $data['user'][$key]->$mi[5] = 'มี';
                        }


                        if($value_result->executive != ''){
                            $data['user'][$key]->$mi[6] = 'มี';
                        }

                        if($value_result->other6 != ''){
                            $data['user'][$key]->$mi[6] = 'มี';
                        }
                    }
                
            }
        return view('admin::agency.agency',$data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index_search(Request $request)
    {
        $id =1 ;
        $time = $request->cars;
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
                    $timeth = date_format($timeth,"Y")+'543'."-".date_format($timeth,"m");
                    $data['user'][$key]->date = $timeth;

                    // บันทึกการประชุม

                    $data['result'] = \DB::table('meeting')
                                    ->select('meeting.narcotics','meeting.unrest','meeting.guard','meeting.other1',
                                    'meeting.government','meeting.other2',
                                    'meeting.coordinate','meeting.other3',
                                    'meeting.covid','meeting.home','meeting.elder','meeting.other4',
                                    'meeting.education','meeting.other5',
                                    'meeting.executive','meeting.other6')
                                    ->where('meeting.meeting_date', 'like', $timeth.'%')
                                    ->where('meeting.id_user' ,$value->id)
                                    ->get();
                    
                    // บันทึกการประชุม

                    $mi = 'agency';
                    // รูปภาพ

                    $data['user'][$key]->$mi[1] = 'ไม่มี';
                    $data['user'][$key]->$mi[2] = 'ไม่มี';
                    $data['user'][$key]->$mi[3] = 'ไม่มี';
                    $data['user'][$key]->$mi[4] = 'ไม่มี';
                    $data['user'][$key]->$mi[5] = 'ไม่มี';
                    $data['user'][$key]->$mi[6] = 'ไม่มี';
                    foreach ($data['result'] as $key_result => $value_result) {
                        
                        if($value_result->narcotics != ''){
                            $data['user'][$key]->$mi[1] = 'มี';
                        }
                        if($value_result->unrest != ''){
                            $data['user'][$key]->$mi[1] = 'มี';
                        }

                        if($value_result->guard != ''){
                            $data['user'][$key]->$mi[1] = 'มี';
                        }

                        if($value_result->other1 != ''){
                            $data['user'][$key]->$mi[1] = 'มี';
                        }


                        if($value_result->government != ''){
                            $data['user'][$key]->$mi[2] = 'มี';
                        }

                        if($value_result->other2 != ''){
                            $data['user'][$key]->$mi[2] = 'มี';
                        }


                        if($value_result->coordinate != ''){
                            $data['user'][$key]->$mi[3] = 'มี';
                        }

                        if($value_result->other3 != ''){
                            $data['user'][$key]->$mi[3] = 'มี';
                        }


                        if($value_result->covid != ''){
                            $data['user'][$key]->$mi[4] = 'มี';
                        }

                        if($value_result->home != ''){
                            $data['user'][$key]->$mi[4] = 'มี';
                        }

                        if($value_result->elder != ''){
                            $data['user'][$key]->$mi[4] = 'มี';
                        }

                        if($value_result->other4 != ''){
                            $data['user'][$key]->$mi[4] = 'มี';
                        }


                        if($value_result->education != ''){
                            $data['user'][$key]->$mi[5] = 'มี';
                        }

                        if($value_result->other5 != ''){
                            $data['user'][$key]->$mi[5] = 'มี';
                        }


                        if($value_result->executive != ''){
                            $data['user'][$key]->$mi[6] = 'มี';
                        }

                        if($value_result->other6 != ''){
                            $data['user'][$key]->$mi[6] = 'มี';
                        }
                    }
                
            }
        return view('admin::agency.agency',$data);
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
                    $timeth = date_format($timeth,"Y")+'543'."-".date_format($timeth,"m");
                    $data['user'][$key]->date = $timeth;

                    // บันทึกการประชุม

                    $data['result'] = \DB::table('meeting')
                                    ->select('meeting.narcotics','meeting.unrest','meeting.guard','meeting.other1',
                                    'meeting.government','meeting.other2',
                                    'meeting.coordinate','meeting.other3',
                                    'meeting.covid','meeting.home','meeting.elder','meeting.other4',
                                    'meeting.education','meeting.other5',
                                    'meeting.executive','meeting.other6')
                                    ->where('meeting.meeting_date', 'like', $timeth.'%')
                                    ->where('meeting.id_user' ,$value->id)
                                    ->get();
                    
                    // บันทึกการประชุม

                    $mi = 'agency';
                    // รูปภาพ

                    $data['user'][$key]->$mi[1] = '0';
                    $data['user'][$key]->$mi[2] = '0';
                    $data['user'][$key]->$mi[3] = '0';
                    $data['user'][$key]->$mi[4] = '0';
                    $data['user'][$key]->$mi[5] = '0';
                    $data['user'][$key]->$mi[6] = '0';
                    foreach ($data['result'] as $key_result => $value_result) {
                        
                        if($value_result->narcotics != ''){
                            $data['user'][$key]->$mi[1] = '1';
                        }
                        if($value_result->unrest != ''){
                            $data['user'][$key]->$mi[1] = '1';
                        }

                        if($value_result->guard != ''){
                            $data['user'][$key]->$mi[1] = '1';
                        }

                        if($value_result->other1 != ''){
                            $data['user'][$key]->$mi[1] = '1';
                        }


                        if($value_result->government != ''){
                            $data['user'][$key]->$mi[2] = '1';
                        }

                        if($value_result->other2 != ''){
                            $data['user'][$key]->$mi[2] = '1';
                        }


                        if($value_result->coordinate != ''){
                            $data['user'][$key]->$mi[3] = '1';
                        }

                        if($value_result->other3 != ''){
                            $data['user'][$key]->$mi[3] = '1';
                        }


                        if($value_result->covid != ''){
                            $data['user'][$key]->$mi[4] = '1';
                        }

                        if($value_result->home != ''){
                            $data['user'][$key]->$mi[4] = '1';
                        }

                        if($value_result->elder != ''){
                            $data['user'][$key]->$mi[4] = '1';
                        }

                        if($value_result->other4 != ''){
                            $data['user'][$key]->$mi[4] = '1';
                        }


                        if($value_result->education != ''){
                            $data['user'][$key]->$mi[5] = '1';
                        }

                        if($value_result->other5 != ''){
                            $data['user'][$key]->$mi[5] = '1';
                        }


                        if($value_result->executive != ''){
                            $data['user'][$key]->$mi[6] = '1';
                        }

                        if($value_result->other6 != ''){
                            $data['user'][$key]->$mi[6] = '1';
                        }
                    }
                
            }
        return view('admin::agency.agency_excell',$data);
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
