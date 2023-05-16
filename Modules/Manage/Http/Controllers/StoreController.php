<?php

namespace Modules\Manage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manage\Repositories\Repository as Repository;
use Modules\Manage\Repositories\StoresRepository as StoresRepository;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class StoreController extends UploadeFileController
{
    protected $Repository;

    public function __construct(Repository $Repository,StoresRepository $StoresRepository)
    {
        $this->Repository = $Repository;
        $this->StoresRepository = $StoresRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $page_title = 'ร้านค้า';
        $page_description = '';

        $db = "stores";
        $data['result'] = $this->Repository->index($db);

        return view('manage::store.manage_store', compact('page_title', 'page_description'),$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'เพิ่มข้อมูลร้านค้า';
        $page_description = '';

        $data['result'] = $this->Repository->show('flowers');
        $data['resultAmphures'] = $this->Repository->show('amphures');
        $data['resultProvinces'] = $this->Repository->show('provinces');
        $data['resultDistricts'] = $this->Repository->districts('provinces');

        return view('manage::store.form_store', compact('page_title', 'page_description'),$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function CreateStore(Request $request)
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
        $page_title = 'เพิ่มข้อมูลร้านค้า';
        $page_description = '';
        $datajount['resultID'] = $this->Repository->ProvinceJoin($request['S_SUB_DISTRICT']);
        
        $request['S_DISTRICT'] = $datajount['resultID']['result'][0]->id_amphures ?? null;
        $request['S_PROVINCE'] = $datajount['resultID']['result'][0]->id_provinces ?? null;
        $request['S_FLOWER'] = serialize($request['S_FLOWER']);
        $request['S_FLOWER_OTHER'] = serialize($request['S_FLOWER_OTHER']);
        $request['S_CUSTOMER_GROUP'] = serialize($request['S_CUSTOMER_GROUP']);
        $request['S_CUSTOMER_GROUP_OTHER'] = serialize($request['S_CUSTOMER_GROUP_OTHER']);
        $request['S_SOURCE'] = serialize($request['S_SOURCE']);
        $request['S_SEND_OTHER'] = serialize($request['S_SEND_OTHER']);
        $request['S_CONDITION_SELL_OTHER'] = serialize($request['S_CONDITION_SELL_OTHER']);
        $request['S_CUSTOMER_PAYS_OTHER'] = serialize($request['S_CUSTOMER_PAYS_OTHER']);
        $request['S_PROMOTION_OTHER'] = serialize($request['S_PROMOTION_OTHER']);

        $data['result'] = $this->Repository->insert($request->all(),'classModelStores');
        
        return redirect()->route('manage.create.store2',$data['result']['id']);
    }

    public function FormStore2($id)
    {
        // dd($id);
        $page_title = 'เพิ่มข้อมูลร้านค้า';
        $page_description = '';
        
        
        $data['resultID'] = $this->StoresRepository->ShowId($id,'stores');

        return view('manage::store.form_store_part2',compact('page_title', 'page_description'),$data);
    }
    
    public function CreateStore2(Request $request,$id)
    {
        $page_title = 'เพิ่มข้อมูลร้านค้า';
        $page_description = '';

        $request['S_VOLUME'] = serialize($request['S_VOLUME']);
        $request['S_REMAINING'] = serialize($request['S_REMAINING']);
        $request['S_REMAINING_CAUSE_OTHER'] = serialize($request['S_REMAINING_CAUSE_OTHER']);
        $request['S_SET_PRICE'] = serialize($request['S_SET_PRICE']);
        $request['S_PROBLEM'] = serialize($request['S_PROBLEM']);

        $datas = $request->all();
        $data['result'] = $this->Repository->update($datas,$id,'classModelStores');

        // return view('manage::store.form_store_part2');
        return redirect()->route('index.store');
    }
    
    public function PageEditStore($id)
    {
        $page_title = 'แก้ไขข้อมูลร้านค้า';
        $page_description = '';

        $data['result'] = $this->Repository->ShowId($id,'stores');
        $data['flowers'] = $this->Repository->show('flowers');
        $data['resultAmphures'] = $this->Repository->show('amphures');
        $data['resultProvinces'] = $this->Repository->show('provinces');
        $data['resultDistricts'] = $this->Repository->districts('provinces');

        if(isset($data['result']->S_FLOWER)){
            $data['result']->S_FLOWER = unserialize($data['result']->S_FLOWER);
        }
        if(isset($data['result']->S_CUSTOMER_GROUP)){
            $data['result']->S_CUSTOMER_GROUP = unserialize($data['result']->S_CUSTOMER_GROUP);
        }
        if(isset($data['result']->S_SOURCE)){
            $data['result']->S_SOURCE = unserialize($data['result']->S_SOURCE);
        }
        if(isset($data['result']->S_SEND_OTHER)){
            $data['result']->S_SEND_OTHER = unserialize($data['result']->S_SEND_OTHER);
        }
        if(isset($data['result']->S_CONDITION_SELL_OTHER)){
            $data['result']->S_CONDITION_SELL_OTHER = unserialize($data['result']->S_CONDITION_SELL_OTHER);
        }
        if(isset($data['result']->S_CUSTOMER_PAYS_OTHER)){
            $data['result']->S_CUSTOMER_PAYS_OTHER = unserialize($data['result']->S_CUSTOMER_PAYS_OTHER);
        }
        if(isset($data['result']->S_PROMOTION_OTHER)){
            $data['result']->S_PROMOTION_OTHER = unserialize($data['result']->S_PROMOTION_OTHER);
        }
        if(isset($data['result']->S_VOLUME)){
            $data['result']->S_VOLUME = unserialize($data['result']->S_VOLUME);
        }
        if(isset($data['result']->S_REMAINING)){
            $data['result']->S_REMAINING = unserialize($data['result']->S_REMAINING);
        }
        if(isset($data['result']->S_REMAINING_CAUSE_OTHER)){
            $data['result']->S_REMAINING_CAUSE_OTHER = unserialize($data['result']->S_REMAINING_CAUSE_OTHER);
        }
        if(isset($data['result']->S_SET_PRICE)){
            $data['result']->S_SET_PRICE = unserialize($data['result']->S_SET_PRICE);
        }
        if(isset($data['result']->S_PROBLEM)){
            $data['result']->S_PROBLEM = unserialize($data['result']->S_PROBLEM);
        }
        if(isset($data['result']->file_multiple)){
            $data['result']->file_multiple = unserialize($data['result']->file_multiple);
        }

        return view('manage::store.edit_store', compact('page_title', 'page_description'),$data);
    }

    public function PageDetailStore($id)
    {
        $page_title = 'รายละเอียดร้าน';
        $page_description = '';

        
        $data['result'] = $this->Repository->ShowId($id,'stores');

        return view('manage::store.detail_store',compact('page_title', 'page_description'),$data);
    }

    // EditStoreStep1
    public function EditStoreStep1(Request $request,$id)
    {
        $page_title = 'รายละเอียดร้าน';
        $page_description = '';

        // dd($request['file_multiples_edit']);
        

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
        dd($request['file_multiples_edit']);

        $datajount['resultID'] = $this->Repository->ProvinceJoin($request['S_SUB_DISTRICT']);
        
        $request['S_DISTRICT'] = $datajount['resultID']['result'][0]->id_amphures ?? null;
        $request['S_PROVINCE'] = $datajount['resultID']['result'][0]->id_provinces ?? null;
        $request['S_FLOWER'] = serialize($request['S_FLOWER']);
        $request['S_FLOWER_OTHER'] = serialize($request['S_FLOWER_OTHER']);
        $request['S_CUSTOMER_GROUP'] = serialize($request['S_CUSTOMER_GROUP']);
        $request['S_CUSTOMER_GROUP_OTHER'] = serialize($request['S_CUSTOMER_GROUP_OTHER']);
        $request['S_SOURCE'] = serialize($request['S_SOURCE']);
        $request['S_SEND_OTHER'] = serialize($request['S_SEND_OTHER']);
        $request['S_CONDITION_SELL_OTHER'] = serialize($request['S_CONDITION_SELL_OTHER']);
        $request['S_CUSTOMER_PAYS_OTHER'] = serialize($request['S_CUSTOMER_PAYS_OTHER']);
        $request['S_PROMOTION_OTHER'] = serialize($request['S_PROMOTION_OTHER']);

        unset($request['file_multiples_edit']);
        unset($request['file_multiples']);
        
        $data['result'] = $this->Repository->update($request->all(),$id,'classModelStores');

        return redirect()->route('manage.page2.edit_store',$id);
    }

    public function Page2EditStore($id)
    {
        $page_title = 'รายละเอียดร้าน';
        $page_description = '';

        $data['resultID'] = $this->StoresRepository->ShowId($id,'stores');
        
        $data['resultID']['result'][0]->S_VOLUME = unserialize($data['resultID']['result'][0]->S_VOLUME);
        $data['resultID']['result'][0]->S_REMAINING = unserialize($data['resultID']['result'][0]->S_REMAINING);
        $data['resultID']['result'][0]->S_REMAINING_CAUSE_OTHER = unserialize($data['resultID']['result'][0]->S_REMAINING_CAUSE_OTHER);
        $data['resultID']['result'][0]->S_SET_PRICE = unserialize($data['resultID']['result'][0]->S_SET_PRICE);
        $data['resultID']['result'][0]->S_PROBLEM = unserialize($data['resultID']['result'][0]->S_PROBLEM);

        return view('manage::store.edit_store_part2',compact('page_title', 'page_description'),$data);
    }

    public function EditStoreStep2(Request $request,$id)
    {
        $request['S_VOLUME'] = serialize($request['S_VOLUME']);
        $request['S_REMAINING'] = serialize($request['S_REMAINING']);
        $request['S_REMAINING_CAUSE_OTHER'] = serialize($request['S_REMAINING_CAUSE_OTHER']);
        $request['S_SET_PRICE'] = serialize($request['S_SET_PRICE']);
        $request['S_PROBLEM'] = serialize($request['S_PROBLEM']);

        $data['result'] = $this->Repository->update($request->all(),$id,"classModelStores");
        
        return redirect()->route('index.store');
    }

    public function delet($id)
    {
        $this->Repository->destroy($id,'classModelStores');
        
        return redirect()->route('index.store');
    }
}
