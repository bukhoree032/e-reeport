<?php

namespace Modules\Manage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manage\Repositories\Repository as Repository;
use Modules\Manage\Repositories\ReportRepository as ReportRepository;
use Modules\Manage\Repositories\ActivityRepository as ActivityRepository;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class ReportmeetingController extends UploadeFileController
{
    protected $Repository;

    public function __construct(Repository $Repository,ReportRepository $ReportRepository,ActivityRepository $ActivityRepository)
    {
        $this->middleware('auth');
        $this->Repository = $Repository;
        $this->ReportRepository = $ReportRepository;
        $this->ActivityRepository = $ActivityRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(Auth::user()->status == 5){
            return redirect()->route('admin.index.report');
        }

        $page_title = 'รายงานผลการดำเนินงาน';
        $page_description = '';

        $db = "reportmeeting";
        
        $activity = $this->ActivityRepository->ShowActivity(auth::user()->id,'activity');
        if(isset($activity[0])){
            $data['activity'] = 'y';
        }else{
            $data['activity'] = 'n';
        }
        
        $data['result'] = $this->ReportRepository->index($db,auth::user()->id);

        $data['count'] = $this->ReportRepository->count($db,Auth::user()->id);
        
        return view('manage::reeportmeeting.manage_report', compact('page_title', 'page_description'),$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'บันทึกรายงานผลการดำเนินงาน';
        $page_description = '';

        $data['result'] = $this->ActivityRepository->ShowActivity(auth::user()->id,'activity');

        $data['resultAmphures'] = $this->ReportRepository->show('amphures');
        $data['resultProvinces'] = $this->ReportRepository->show('provinces');
        $data['resultDistricts'] = $this->ReportRepository->districts('provinces');

        return view('manage::reeportmeeting.form_report', compact('page_title', 'page_description'),$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function insert(Request $request)
    {
        if(!isset($request->activity[0])){
            return redirect()->route('admin.index.activity');
        }

        $data['resulta'] = $this->ReportRepository->insert($request->all(),'classModelReportmeeting');

        foreach ($request->activity as $key => $value) {
            $insertDb = \DB::table('reportactivity')->insert([
                'id_user_reac' => auth::user()->id,
                'id_report' => $data['resulta']->id,
                'id_ac' => $value['id_ac'],
                're_ac_name' => $value['activity'],
                're_ac_approve' => $value['approve'],
                're_ac_withdraw' => $value['withdraw'],
                're_ac_target' => $value['target'],
                're_ac_income' => $value['income'],
                're_ac_quality' => $value['quality'],
                're_ac_problem' => $value['problem'],
                're_ac_note' => $value['note'],
                
            ]);
        }

        $data['resultAmphures'] = $this->ReportRepository->show('amphures');
        $data['resultProvinces'] = $this->ReportRepository->show('provinces');
        $data['resultDistricts'] = $this->ReportRepository->districts('provinces');
        
        return redirect()->route('index.report');
    }
    
    public function Edit(Request $request,$id)
    {
        $page_title = 'แก้ไขข้อมูลดกลุ่มเกษตรกร และฟาร์ม';
        $page_description = '';

        $data['resultID'] = $this->ReportRepository->ShowId($id,'reportmeeting');

        $data['activitymeeting'] = $this->Repository->ShowIdAll('id_report',$id,'reportactivity');

        $data['result'] = $this->ReportRepository->show('flowers');
        $data['resultAmphures'] = $this->ReportRepository->show('amphures');
        $data['resultProvinces'] = $this->ReportRepository->show('provinces');
        $data['resultDistricts'] = $this->ReportRepository->districts('provinces');

        return view('manage::reeportmeeting.edit_report', compact('page_title', 'page_description'),$data);
    }
    
    public function Update(Request $request,$id)
    {

        $data['result'] = $this->ReportRepository->update($request->all(),$id,'classModelReportmeeting');

        foreach ($request->activity as $key => $value) {
            $result = \DB::table('reportactivity')
                        ->where('id_ac_report', $value['id_ac_report'])
                        ->update([
                            'id_report' => $id,
                            're_ac_name' => $value['activity'],
                            're_ac_approve' => $value['approve'],
                            're_ac_withdraw' => $value['withdraw'],
                            're_ac_target' => $value['target'],
                            're_ac_income' => $value['income'],
                            're_ac_quality' => $value['quality'],
                            're_ac_problem' => $value['problem']
                    ]);
        }
        
        return redirect()->route('index.report');
    }

    public function PageDetailReport($id)
    {
        $page_title = 'เพิ่มข้อมูลร้านค้า';
        $page_description = '';

        $data['resultID'] = $this->ReportRepository->ShowId($id,'reportmeeting');

        $data['activitymeeting'] = $this->Repository->ShowIdAll('id_report',$id,'reportactivity');

        // $data['resultID'] = $this->ReportRepository->ShowId($id,'reportmeeting');
        // dd($data['resultID']);
        // $data['resultID']->activity = unserialize($data['resultID']->activity);

        return view('manage::reeportmeeting.detail_report',compact('page_title', 'page_description'),$data);
    }

    public function delet($id)
    {
        $this->ReportRepository->destroy($id,'classModelReportmeeting');

        $data = \DB::table('reportactivity')
                        ->where('id_report', $id)
                        ->delete();

        return redirect()->route('index.report');
    }
}
