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
    public function index()
    {
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
        ->get();

        $data['countk300'] = \DB::table('users')
        ->where('status' ,'1')
        ->count();
    
        return view('admin::dashboard.k300', compact('page_title', 'page_description'),$data);
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
        ->get();

        $data['countm1'] = \DB::table('users')
        ->where('status' ,'2')
        ->count();
    
        return view('admin::dashboard.m1', compact('page_title', 'page_description'),$data);
    }
}
