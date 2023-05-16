<?php

namespace Modules\Manage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manage\Repositories\ReportRepository as Repository;
use Modules\Manage\Repositories\ActivityRepository as ActivityRepository;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class ReportmeetingController extends UploadeFileController
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
        // dd('asd');
        // dd(auth::user());
        $page_title = 'รายงานการประชุม';
        $page_description = '';

        $db = "reportmeeting";
        
        $data['result'] = $this->Repository->index($db,auth::user()->id);
        
        return view('manage::reeportmeeting.manage_report', compact('page_title', 'page_description'),$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'บันทึกรายงานการประชุม';
        $page_description = '';

        $data['result'] = $this->ActivityRepository->ShowActivity(auth::user()->id,'activity');

        $data['resultAmphures'] = $this->Repository->show('amphures');
        $data['resultProvinces'] = $this->Repository->show('provinces');
        $data['resultDistricts'] = $this->Repository->districts('provinces');

        return view('manage::reeportmeeting.form_report', compact('page_title', 'page_description'),$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function insert(Request $request)
    {
        $data['resulta'] = $this->Repository->insert($request->all(),'classModelReportmeeting');
        

        $data['resultAmphures'] = $this->Repository->show('amphures');
        $data['resultProvinces'] = $this->Repository->show('provinces');
        $data['resultDistricts'] = $this->Repository->districts('provinces');
        
        return redirect()->route('index.report');
    }
    
    public function Edit(Request $request,$id)
    {
        $page_title = 'แก้ไขข้อมูลดกลุ่มเกษตรกร และฟาร์ม';
        $page_description = '';

        $data['resultID'] = $this->Repository->ShowId($id,'reportmeeting');
        $data['resultID']->activity = unserialize($data['resultID']->activity);

        $data['result'] = $this->Repository->show('flowers');
        $data['resultAmphures'] = $this->Repository->show('amphures');
        $data['resultProvinces'] = $this->Repository->show('provinces');
        $data['resultDistricts'] = $this->Repository->districts('provinces');

        return view('manage::reeportmeeting.edit_report', compact('page_title', 'page_description'),$data);
    }
    
    public function Update(Request $request,$id)
    {

        $data['result'] = $this->Repository->update($request->all(),$id,'classModelReportmeeting');
        
        return redirect()->route('index.report');
    }

    public function PageDetailReport($id)
    {
        $page_title = 'เพิ่มข้อมูลร้านค้า';
        $page_description = '';

        $data['resultID'] = $this->Repository->ShowId($id,'reportmeeting');

        $data['resultID']->activity = unserialize($data['resultID']->activity);

        return view('manage::reeportmeeting.detail_report',compact('page_title', 'page_description'),$data);
    }

    public function delet($id)
    {
        $this->Repository->destroy($id,'classModelReportmeeting');
        
        return redirect()->route('index.report');
    }
}
