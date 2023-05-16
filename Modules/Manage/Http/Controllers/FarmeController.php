<?php

namespace Modules\Manage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manage\Repositories\Repository as Repository;
use Modules\Manage\Repositories\FarmesRepository as FarmesRepository;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class FarmeController extends UploadeFileController
{
    protected $Repository;

    public function __construct(Repository $Repository,FarmesRepository $FarmesRepository)
    {
        $this->Repository = $Repository;
        $this->FarmesRepository = $FarmesRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $page_title = 'กลุ่มเกษตรกร และฟาร์ม';
        $page_description = '';

        $db = "farmes";
        $data['result'] = $this->Repository->index($db);

        foreach ($data['result'] as $key => $value) {
            if(isset($value->file_multiple)){
                $value->file_multiple = unserialize($value->file_multiple);
            }
            if(isset($value->FA_SUB_DISTRICT)) {
                $value->FA_SUB_DISTRICT = $this->Repository->ProvinceJoin($value->FA_SUB_DISTRICT);
            }
        }

        return view('manage::farme.manage_farme', compact('page_title', 'page_description'),$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'เพิ่มข้อมูลดกลุ่มเกษตรกร และฟาร์ม';
        $page_description = '';

        $data['result'] = $this->Repository->show('flowers');
        $data['resultAmphures'] = $this->Repository->show('amphures');
        $data['resultProvinces'] = $this->Repository->show('provinces');
        $data['resultDistricts'] = $this->Repository->districts('provinces');

        return view('manage::farme.form_farme', compact('page_title', 'page_description'),$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function CreateFarme(Request $request)
    {
        $uploade = new UploadeFileController();
        if (!empty($request['files'])) {
            $request['file'] = $uploade->uploadImage(
                $request['files'],
                'flowers',
                Str::random(5)
            );
        }
        if (!empty($request['file_multiples'])) {
            foreach ($request['file_multiples'] as $key => $value) {
                $file_multiple[$key] = $uploade->uploadImage(
                    $value,
                    'flowers',
                    Str::random(5)
                );
            }
            $request['file_multiple'] = serialize($file_multiple);
        }

        $datajount['resultID'] = $this->Repository->ProvinceJoin($request['FA_SUB_DISTRICT']);

        $request['FA_DISTRICT'] = $datajount['resultID']['result'][0]->id_amphures ?? null;
        $request['FA_PROVINCE'] = $datajount['resultID']['result'][0]->id_provinces ?? null;

        $request['FA_FLOWER'] = serialize($request['FA_FLOWER']);
        $request['FA_PROBLEM_PLANT'] = serialize($request['FA_PROBLEM_PLANT']);
        $request['FA_CUSTOMER_GROUP'] = serialize($request['FA_CUSTOMER_GROUP']);
        $request['FA_SEND'] = serialize($request['FA_SEND']);
        $request['FA_SELL'] = serialize($request['FA_SELL']);
        // $request['FA_CONDITION_SELL_OTHER'] = serialize($request['FA_CONDITION_SELL_OTHER']);
        // $request['FA_CUSTOMER_PAYFA_OTHER'] = serialize($request['FA_CUSTOMER_PAYFA_OTHER']);
        // $request['FA_PROMOTION_OTHER'] = serialize($request['FA_PROMOTION_OTHER']);

        $data['resulta'] = $this->Repository->insert($request->all(),'classModelFarmes');

        $data['resultID'] = $this->FarmesRepository->ShowId($data['resulta']['id'],'farmes');

        $data['result'] = $this->Repository->show('flowers');
        $data['resultAmphures'] = $this->Repository->show('amphures');
        $data['resultProvinces'] = $this->Repository->show('provinces');
        $data['resultDistricts'] = $this->Repository->districts('provinces');

        return redirect()->route('manage.create.farme2',$data['resulta']['id']);
    }

    public function FormFarme2($id)
    {
        $page_title = 'เพิ่มข้อมูลกลุ่มเกษตรกร และฟาร์ม';
        $page_description = '';
        
        $data['resultID'] = $this->FarmesRepository->ShowId($id,'farmes');

        $data['result'] = $this->Repository->show('flowers');
        $data['resultAmphures'] = $this->Repository->show('amphures');
        $data['resultProvinces'] = $this->Repository->show('provinces');
        $data['resultDistricts'] = $this->Repository->districts('provinces');

        return view('manage::farme.form_farme_part2', compact('page_title', 'page_description'),$data);
    }

    public function CreateFarme2(Request $request,$id)
    {
        $page_title = 'เพิ่มข้อมูลร้านค้า';
        $page_description = '';

        $request['FA_REMAINING'] = serialize($request['FA_REMAINING']);
        $request['FA_REMAINING_CAUSE'] = serialize($request['FA_REMAINING_CAUSE']);
        $request['FA_SET_PRICE'] = serialize($request['FA_SET_PRICE']);
        if(isset($request['FA_PROBLEM'])){
            $request['FA_PROBLEM'] = serialize($request['FA_PROBLEM']);
        }
        // dd($request,$id);
        $datas = $request->all();
        $data['result'] = $this->Repository->update($datas,$id,'classModelFarmes');
        
        return redirect()->route('index.farme');
    }

    public function PageDetailFarme($id)
    {
        $page_title = 'รายละเอียดข้อมูลเกษตกร หรือฟาร์ม';
        $page_description = '';

        
        $data['result'] = $this->Repository->ShowId($id,'farmes');

        if(isset($data['result']->FA_SUB_DISTRICT)) {
            $data['result']->FA_SUB_DISTRICT = $this->Repository->ProvinceJoin($data['result']->FA_SUB_DISTRICT);
        }
        if(isset($data['result']->FA_FLOWER)){
            $data['result']->FA_FLOWER = unserialize($data['result']->FA_FLOWER);
        }
        if(isset($data['result']->FA_CUSTOMER_GROUP)){
            $data['result']->FA_CUSTOMER_GROUP = unserialize($data['result']->FA_CUSTOMER_GROUP);
        }
        if(isset($data['result']->FA_SEND_OTHER)){
            $data['result']->FA_SEND_OTHER = unserialize($data['result']->FA_SEND_OTHER);
        }
        if(isset($data['result']->FA_CONDITION_SELL_OTHER)){
            $data['result']->FA_CONDITION_SELL_OTHER = unserialize($data['result']->FA_CONDITION_SELL_OTHER);
        }
        if(isset($data['result']->FA_PROMOTION_OTHER)){
            $data['result']->FA_PROMOTION_OTHER = unserialize($data['result']->FA_PROMOTION_OTHER);
        }
        if(isset($data['result']->FA_VOLUME)){
            $data['result']->FA_VOLUME = unserialize($data['result']->FA_VOLUME);
        }
        if(isset($data['result']->FA_REMAINING)){
            $data['result']->FA_REMAINING = unserialize($data['result']->FA_REMAINING);
        }
        if(isset($data['result']->FA_REMAINING_CAUSE_OTHER)){
            $data['result']->FA_REMAINING_CAUSE_OTHER = unserialize($data['result']->FA_REMAINING_CAUSE_OTHER);
        }
        if(isset($data['result']->FA_SET_PRICE)){
            $data['result']->FA_SET_PRICE = unserialize($data['result']->FA_SET_PRICE);
        }
        if(isset($data['result']->FA_PROBLEM)){
            $data['result']->FA_PROBLEM = unserialize($data['result']->FA_PROBLEM);
        }
        if(isset($data['result']->file_multiple)){
            $data['result']->file_multiple = unserialize($data['result']->file_multiple);
        }

        return view('manage::farme.detail_farme',compact('page_title', 'page_description'),$data);
    }

    
    public function PageEditFarme1(Request $request,$id)
    {
        $page_title = 'แก้ไขข้อมูลดกลุ่มเกษตรกร และฟาร์ม';
        $page_description = '';

        $data['resultID'] = $this->FarmesRepository->ShowId($id,'farmes');

        $data['resultID']['result'][0]->file_multiple = unserialize($data['resultID']['result'][0]->file_multiple);
        $data['resultID']['result'][0]->FA_CUSTOMER_GROUP = unserialize($data['resultID']['result'][0]->FA_CUSTOMER_GROUP);
        $data['resultID']['result'][0]->FA_PROBLEM_PLANT = unserialize($data['resultID']['result'][0]->FA_PROBLEM_PLANT);
        $data['resultID']['result'][0]->FA_SEND = unserialize($data['resultID']['result'][0]->FA_SEND);
        $data['resultID']['result'][0]->FA_SELL = unserialize($data['resultID']['result'][0]->FA_SELL);
        $data['resultID']['result'][0]->FA_REMAINING = unserialize($data['resultID']['result'][0]->FA_REMAINING);
        $data['resultID']['result'][0]->FA_REMAINING_CAUSE = unserialize($data['resultID']['result'][0]->FA_REMAINING_CAUSE);
        $data['resultID']['result'][0]->FA_SET_PRICE = unserialize($data['resultID']['result'][0]->FA_SET_PRICE);
        $data['resultID']['result'][0]->FA_PROBLEM = unserialize($data['resultID']['result'][0]->FA_PROBLEM);
        
        $data['ProvinceJoin'] = $this->Repository->ProvinceJoin($data['resultID']['result'][0]->FA_SUB_DISTRICT);

        $data['result'] = $this->Repository->show('flowers');
        $data['resultAmphures'] = $this->Repository->show('amphures');
        $data['resultProvinces'] = $this->Repository->show('provinces');
        $data['resultDistricts'] = $this->Repository->districts('provinces');

        return view('manage::farme.edit_farme', compact('page_title', 'page_description'),$data);
    }

    public function EditFarmeStep1(Request $request,$id)
    {
        $uploade = new UploadeFileController();
        if (!empty($request['files'])) {
            $request['file'] = $uploade->uploadImage(
                $request['files'],
                'flowers',
                Str::random(5)
            );
        }
        if (!empty($request['file_multiples'])) {
            foreach ($request['file_multiples'] as $key => $value) {
                $file_multiple[$key] = $uploade->uploadImage(
                    $value,
                    'flowers',
                    Str::random(5)
                );
            }
            if(isset($request['file_multiples_edit'])){
                $file_multiple = array_merge($request['file_multiples_edit'],$file_multiple);
                $request['file_multiple'] = serialize($file_multiple);
            }else{
                $request['file_multiple'] = serialize($file_multiple);
            } 
        }else{
            if(isset($request['file_multiples_edit'])){
                $request['file_multiple'] = serialize($request['file_multiples_edit']);
            }
        }

        $datajount['resultID'] = $this->Repository->ProvinceJoin($request['FA_SUB_DISTRICT']);

        $request['FA_DISTRICT'] = $datajount['resultID']['result'][0]->id_amphures ?? null;
        $request['FA_PROVINCE'] = $datajount['resultID']['result'][0]->id_provinces ?? null;
        
        $request['FA_FLOWER'] = serialize($request['FA_FLOWER']);
        $request['FA_PROBLEM_PLANT'] = serialize($request['FA_PROBLEM_PLANT']);
        $request['FA_CUSTOMER_GROUP'] = serialize($request['FA_CUSTOMER_GROUP']);
        $request['FA_SEND'] = serialize($request['FA_SEND']);
        $request['FA_SELL'] = serialize($request['FA_SELL']);

        unset($request['file_multiples_edit']);
        unset($request['file_multiples']);

        $data['result'] = $this->Repository->update($request->all(),$id,'classModelFarmes');

        return redirect()->route('manage.edit.farme2',$id);
    }

    public function PageEditFarme2($id)
    {
        $page_title = 'แก้ไขข้อมูลดกลุ่มเกษตรกร และฟาร์ม';
        $page_description = '';
        
        $data['resultID'] = $this->FarmesRepository->ShowId($id,'farmes');

        $data['resultID']['result'][0]->FA_REMAINING = unserialize($data['resultID']['result'][0]->FA_REMAINING);
        $data['resultID']['result'][0]->FA_REMAINING_CAUSE = unserialize($data['resultID']['result'][0]->FA_REMAINING_CAUSE);
        $data['resultID']['result'][0]->FA_SET_PRICE = unserialize($data['resultID']['result'][0]->FA_SET_PRICE);
        $data['resultID']['result'][0]->FA_PROBLEM = unserialize($data['resultID']['result'][0]->FA_PROBLEM);

        $data['result'] = $this->Repository->show('flowers');
        $data['resultAmphures'] = $this->Repository->show('amphures');
        $data['resultProvinces'] = $this->Repository->show('provinces');
        $data['resultDistricts'] = $this->Repository->districts('provinces');
        if($data['resultID']['result'][0]->FA_REMAINING == null){
            return redirect()->route('manage.create.farme2',$id);
        }else{
            return view('manage::farme.edit_farme_part2', compact('page_title', 'page_description'),$data);
        }
    }
    
    public function EditFarmeStep2(Request $request,$id)
    {
        $request['FA_REMAINING'] = serialize($request['FA_REMAINING']);
        $request['FA_REMAINING_CAUSE'] = serialize($request['FA_REMAINING_CAUSE']);
        $request['FA_SET_PRICE'] = serialize($request['FA_SET_PRICE']);
        $request['FA_PROBLEM'] = serialize($request['FA_PROBLEM']);

        $data['result'] = $this->Repository->update($request->all(),$id,'classModelFarmes');
        
        return redirect()->route('index.farme');
    }

    public function delet($id)
    {
        $this->Repository->destroy($id,'classModelFarmes');
        
        return redirect()->route('index.farme');
    }
}
