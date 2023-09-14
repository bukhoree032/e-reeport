<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\Repository as Repository;
use Modules\Admin\Repositories\ActivityRepository as AcRepository;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class ActivityController extends UploadeFileController
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
        if(Auth::user()->status != 5){
            return redirect()->route('index.activity');
        }

        $page_title = 'บันทึกการประชุม';
        $page_description = '';

        $db = "activity";
        
        $data['result'] = $this->Repository->show($db);

        $data['count'] = $this->Repository->count($db);

        return view('manage::activity.manage_activity', compact('page_title', 'page_description'),$data);
    }

    public function excell_activity()
    {
        if(Auth::user()->status != 5){
            return redirect()->route('index.activity');
        }

        $page_title = 'บันทึกการประชุม';
        $page_description = '';

        $db = "activity";
    
        $data['pro'] = \DB::table('users')
            ->select('provinces')
            ->groupBy('provinces')
            ->get();

        foreach ($data['pro'] as $key => $value) {
            $data['pro3k'][$value->provinces] = \DB::table('users')
                                                ->join('activity', 'activity.id_districts', '=', 'users.id')
                                                ->where('users.provinces', $value->provinces)
                                                ->where('users.status', '1')
                                                ->orderBy('amphures', 'desc')
                                                ->get();

            $data['pro1m'][$value->provinces] = \DB::table('users')
                                                ->join('activity', 'activity.id_districts', '=', 'users.id')
                                                ->where('users.provinces', $value->provinces)
                                                ->where('users.status', '2')
                                                ->orderBy('amphures', 'desc')
                                                ->get();
        }
        
        return view('manage::activity.excell_activity', compact('page_title', 'page_description'),$data);
    }
}
