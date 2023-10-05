<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\Repository as Repository;
use Modules\Admin\Repositories\ReportRepository as ReportRepository;
use Modules\Admin\Repositories\ActivityRepository as ActivityRepository;
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
        if(Auth::user()->status != 5){
            return redirect()->route('index.report');
        }

        $page_title = 'รายงานผลการดำเนินงาน';
        $page_description = '';

        $db = "reportmeeting";
        
        $data['result'] = $this->Repository->show($db);

        $data['count'] = $this->Repository->count($db);
        
        return view('manage::reeportmeeting.manage_report', compact('page_title', 'page_description'),$data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index_now($id,$time)
    {
        
        if(Auth::user()->status != 5){
            return redirect()->route('index.meeting');
        }
        
        $data['pro'] = \DB::table('users')
                            ->select('provinces')
                            ->groupBy('provinces')
                        ->get();

        $data['user'] = \DB::table('users')
                            ->select('id','districts','amphures')
                            ->where('status' ,$id)
                            ->get();

        if($time == 1){
            $time = date('Y-m');
        }

        $data['id'] = $id;
        $data['time'] = $time;
        
        $timeth=date_create($data['time']);
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
                        ->select('users.id','users.districts','users.amphures')
                        ->join('users', 'users.id', '=', 'reportmeeting.id_user')
                        ->where('reportmeeting.month', $mont[$time_m])
                        ->where('reportmeeting.year', $time_y)
                        ->where('users.status' ,$id)
                        ->groupBy('users.id','users.districts','users.amphures')
                        ->get();

        $key_user_no = 0;
        foreach ($data['user'] as $key => $value) {
            $row = 0;
            foreach ($data['result'] as $key_result => $value_result) {
                if($value->id == $value_result->id){
                    $row = 1;
                    break;
                }
            }
            if($row == 0){
                $data['result_no'][$key_user_no] =  $value;
                $key_user_no++;
            }
        }   
        return view('admin::now.report_now',$data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // public function now_search(Request $request)
    public function now_search(Request $request)
    {
        if(Auth::user()->status != 5){
            return redirect()->route('index.meeting');
        }
        $data['id'] = $request->budget;
        $data['time'] = $request->mont;
        
        $timeth=date_create($data['time']);
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
        
        $not_pro = '=';
        $not_aum = '=';

        if($request->pro == ''){
            $not_pro = '!=';
        }
        if($request->aum == ''){
            $not_aum = '!=';
        }

        $data['pro'] = \DB::table('users')
                            ->select('provinces')
                            ->groupBy('provinces')
                        ->get();

        $data['user'] = \DB::table('users')
                            ->select('id','districts','amphures')
                            ->where('status' ,$request->budget)
                            ->where('provinces' ,$not_pro ,$request->pro)
                            ->where('amphures' ,$not_aum ,$request->aum)
                            ->get();

        // $data['id'] = $id;

        $data['result'] = \DB::table('reportmeeting')
                        ->select('users.id','users.districts','users.amphures')
                        ->join('users', 'users.id', '=', 'reportmeeting.id_user')
                        ->where('reportmeeting.month', $mont[$time_m])
                        ->where('reportmeeting.year', $time_y)
                        ->where('users.status' ,$request->budget)
                        ->where('users.provinces' ,$not_pro ,$request->pro)
                        ->where('users.amphures' ,$not_aum ,$request->aum)
                        ->groupBy('users.id','users.districts','users.amphures')
                        ->get();

        $key_user_no = 0;
        foreach ($data['user'] as $key => $value) {
            $row = 0;
            foreach ($data['result'] as $key_result => $value_result) {
                if($value->id == $value_result->id){
                    $row = 1;
                    break;
                }
            }
            if($row == 0){
                $data['result_no'][$key_user_no] =  $value;
                $key_user_no++;
            }
        }   
        return view('admin::now.report_now',$data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function reportuser($id)
    {
        if(Auth::user()->status != 5){
            return redirect()->route('index.meeting');
        }

        $page_title = 'บันทึกการประชุม';
        $page_description = '';

        $db = "reportmeeting";
        
        $data['result'] = $this->Repository->ShowIdAll('id_user',$id,$db);

        $data['count'] = count($data['result']);

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
        
        return redirect()->route('index.report');
    }
}
