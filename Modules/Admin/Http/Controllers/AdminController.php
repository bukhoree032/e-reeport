<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\Repository as Repository;
use Modules\Admin\Repositories\ActivityRepository as ActivityRepository;
use Modules\Admin\Repositories\DashboardRepository as DashboardRepository;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class AdminController extends UploadeFileController
{
    protected $Repository;

    public function __construct(Repository $Repository,ActivityRepository $ActivityRepository,DashboardRepository $DashboardRepository)
    {
        $this->middleware('auth');
        $this->Repository = $Repository;
        $this->ActivityRepository = $ActivityRepository;
        $this->DashboardRepository = $DashboardRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function pro(Request $request)
    {
        $data = \DB::table('provinces')
                        ->where('name_th' ,$request->id)
                        ->get()[0]->id;

        $data = \DB::table('amphures')
                    ->where('province_id' ,$data)
                    ->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function aum(Request $request)
    {
        $data = \DB::table('districts')
                    ->where('amphure_id' ,$request->id)
                    ->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(Auth::user()->status != 5){
            return redirect()->route('dashboard');
        }

        $page_title = 'บันทึกการประชุม';
        $page_description = '';

        // $db = "meeting";

        $data['ac'] = $this->DashboardRepository->index('activity');

        $data['re'] = $this->DashboardRepository->index('reportmeeting');

        $data['mee'] = $this->DashboardRepository->index('meeting');

        $data['k300'] = \DB::table('users')
        ->where('status' ,'1')
        ->count();

        $data['m1'] = \DB::table('users')
        ->where('status' ,'2')
        ->count();
        
        $data['sumwithdraw'] = \DB::table('reportactivity')
                        ->select(\DB::raw("SUM(re_ac_withdraw) as sumwithdraw"))
                        ->get()[0];
    
        return view('manage::dashboard.dashboard', compact('page_title', 'page_description'),$data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function k300()
    {
        $page_title = 'บันทึกการประชุม';
        $page_description = '';

        $data['k300'] = \DB::table('users')
        ->where('status' ,'1')
        ->paginate(10);

        $data['countk300'] = \DB::table('users')
        ->where('status' ,'1')
        ->count();

        $data['pro'] = \DB::table('users')
                                        ->select('provinces')
                                        ->where('status' ,'1')
                                        ->groupBy('provinces')
                                    ->get();
                                    
        foreach ($data['pro'] as $key => $value) {
            $data['dis300'] = \DB::table('users')
                ->where('status' ,'1')
                ->where('provinces',$value->provinces)
            ->count();
            $data['pro'][$key]->dis = $data['dis300'];

            $data['aum300'] = \DB::table('users')
                ->select('amphures')
                ->where('status','1')
                ->where('provinces',$value->provinces)
                ->groupBy('amphures')
            ->get();
            $data['pro'][$key]->aum = count($data['aum300']);
        }

        return view('admin::dashboard.k300', compact('page_title', 'page_description'),$data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function search_3k(Request $request)
    {
        $not_pro = '=';
        $not_aum = '=';
        $not_search = '=';
        
        if($request->pro == ''){
            $not_pro = '!=';
        }
        if($request->aum == ''){
            $not_aum = '!=';
        }
        if($request->search == ''){
            $not_search = '!=';
        }

        $data['k300'] = \DB::table('users')
                    ->where('status' ,'1')
                    ->where('provinces' ,$not_pro ,$request->pro)
                    ->where('amphures' ,$not_aum ,$request->aum)
                    ->Where('name', 'LIKE', '%'.$request->search.'%')
                    ->get();
        
        $data['countk300'] = \DB::table('users')
                    ->where('status' ,'1')
                    ->where('provinces' ,$not_pro ,$request->pro)
                    ->where('amphures' ,$not_aum ,$request->aum)
                    ->Where('name', 'LIKE', '%'.$request->search.'%')
                    ->count();

        $data['pro'] = \DB::table('users')
                            ->select('provinces')
                            ->where('status' ,'1')
                            ->groupBy('provinces')
                        ->get();
                                    
        foreach ($data['pro'] as $key => $value) {
            $data['dis300'] = \DB::table('users')
                ->where('status' ,'1')
                ->where('provinces',$value->provinces)
            ->count();
            $data['pro'][$key]->dis = $data['dis300'];

            $data['aum300'] = \DB::table('users')
                ->select('amphures')
                ->where('status','1')
                ->where('provinces',$value->provinces)
                ->groupBy('amphures')
            ->get();
            $data['pro'][$key]->aum = count($data['aum300']);
        }

        return view('admin::dashboard.k300', $data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function m1()
    {
        $page_title = 'บันทึกการประชุม';
        $page_description = '';

        $data['m1'] = \DB::table('users')
        ->where('status' ,'2')
        ->paginate(10);

        $data['countm1'] = \DB::table('users')
        ->where('status' ,'2')
        ->count();
        
        $data['pro'] = \DB::table('users')
                                        ->select('provinces')
                                        ->where('status' ,'2')
                                        ->groupBy('provinces')
                                    ->get();
                                    
        foreach ($data['pro'] as $key => $value) {
            $data['dis1m'] = \DB::table('users')
                ->select('districts', \DB::raw('count(districts) as total'))
                ->where('status' ,'2')
                ->where('provinces',$value->provinces)
                ->groupBy('districts')
            ->get();
            $data['pro'][$key]->dis = count($data['dis1m']);

            $data['aum1m'] = \DB::table('users')
                ->select('amphures')
                ->where('status','2')
                ->where('provinces',$value->provinces)
                ->groupBy('amphures')
            ->get();
            $data['pro'][$key]->aum = count($data['aum1m']);
        }

        return view('admin::dashboard.m1', compact('page_title', 'page_description'),$data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function search_1m(Request $request)
    {
        $not_pro = '=';
        $not_aum = '=';
        $not_search = '=';
        
        if($request->pro == ''){
            $not_pro = '!=';
        }
        if($request->aum == ''){
            $not_aum = '!=';
        }
        if($request->search == ''){
            $not_search = '!=';
        }

        $data['m1'] = \DB::table('users')
                    ->where('status' ,'2')
                    ->where('provinces' ,$not_pro ,$request->pro)
                    ->where('amphures' ,$not_aum ,$request->aum)
                    ->Where('name', 'LIKE', '%'.$request->search.'%')
                    ->get();
        
        $data['countm1'] = \DB::table('users')
                    ->where('status' ,'2')
                    ->where('provinces' ,$not_pro ,$request->pro)
                    ->where('amphures' ,$not_aum ,$request->aum)
                    ->Where('name', 'LIKE', '%'.$request->search.'%')
                    ->count();

        $data['pro'] = \DB::table('users')
                    ->select('provinces')
                    ->where('status' ,'2')
                    ->groupBy('provinces')
                    ->get();
                
        foreach ($data['pro'] as $key => $value) {
            $data['dis1m'] = \DB::table('users')
                                ->select('districts', \DB::raw('count(districts) as total'))
                                ->where('status' ,'2')
                                ->where('provinces',$value->provinces)
                                ->groupBy('districts')
                                ->get();
            $data['pro'][$key]->dis = count($data['dis1m']);

            $data['aum1m'] = \DB::table('users')
                                ->select('amphures')
                                ->where('status','2')
                                ->where('provinces',$value->provinces)
                                ->groupBy('amphures')
                                ->get();
            $data['pro'][$key]->aum = count($data['aum1m']);
}

        return view('admin::dashboard.m1', $data);
    }
}
