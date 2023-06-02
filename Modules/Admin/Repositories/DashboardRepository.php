<?php

namespace Modules\Admin\Repositories;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manage\Entities\Meeting;
use Modules\Manage\Entities\Activity;
use Modules\Manage\Entities\Activitymeeting;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class DashboardRepository 
{
    public function __construct()
    {
        $this->classModelMeeting = Meeting::class;
        $this->classModelActivity = Activity::class;
        $this->classModelActivitymeeting = Activitymeeting::class;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function index($db)
    {
        $data = \DB::table($db)
                        ->count();

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($db)
    {
        $data = \DB::table($db)
                        ->get();
        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function ShowId($id,$db)
    {
        $data = \DB::table($db)
                        ->where('id',$id)
                        ->get()['0'];
        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function ShowIdAll($colum,$id,$db)
    {
        $data = \DB::table($db)
                        ->where($colum,$id)
                        ->get();
        return $data;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function districts()
    {
        $data = \DB::table('districts')
                        ->join('amphures', 'districts.amphure_id', '=', 'amphures.id')
                        ->join('provinces', 'amphures.province_id', '=', 'provinces.id')
                        ->where('provinces.id','>=', 74)
                        ->where('provinces.id','<=', 76)
                        ->select('districts.id as id_districts','districts.name_th as name_districts','amphures.id as id_amphures','amphures.name_th as name_amphures','provinces.id as id_provinces','provinces.name_th as name_provinces','districts.zip_code as zip_code_districts')
                        
                        ->get();
        return $data;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function ProvinceJoin($id)
    {
        $data = \DB::table('districts')
                        ->join('amphures', 'districts.amphure_id', '=', 'amphures.id')
                        ->join('provinces', 'amphures.province_id', '=', 'provinces.id')
                        ->where('districts.id', $id)
                        ->select('districts.id as id_districts','districts.name_th as name_districts','amphures.id as id_amphures','amphures.name_th as name_amphures','provinces.id as id_provinces','provinces.name_th as name_provinces')
                        
                        ->get();
        // $insert = $this->$db::create($data);
        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function insert($request,$db)
    {
        if(isset($request['no_meeting'])){
            $request['no_meeting'] = serialize($request['no_meeting']);
        }

        if(isset($request['p_meeting'])){
            $request['p_meeting'] = serialize($request['p_meeting']);
        }

        $insert = $this->$db::create($request);
        
        return $insert;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function updateAll($request,$id,$db)
    {
        $result = $this->$db::findOrFail($id);
        $data = $result->update($request);

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($request,$id,$db)
    {
        if($request['yesno'] == 'n'){
            $request['narcotics'] = null;
        }
        if($request['yesno1'] == 'n'){
            $request['unrest'] = null;
        }
        if($request['yesno2'] == 'n'){
            $request['guard'] = null;
        }
        if($request['yesno3'] == 'n'){
            $request['other1'] = null;
        }

        
        if($request['yesnob2'] == 'n'){
            $request['government'] = null;
        }
        if($request['yesnob2'] == 'n'){
            $request['government'] = null;
        }
        if($request['yesnob3'] == 'n'){
            $request['other2'] = null;
        }

        
        if($request['yesnoc1'] == 'n'){
            $request['coordinate'] = null;
        }
        if($request['yesnoc2'] == 'n'){
            $request['other3'] = null;
        }


        if($request['yesnod1'] == 'n'){
            $request['covid'] = null;
        }
        if($request['yesnod2'] == 'n'){
            $request['home'] = null;
        }
        if($request['yesnod3'] == 'n'){
            $request['elder'] = null;
        }
        if($request['yesnod4'] == 'n'){
            $request['other4'] = null;
        }

        if($request['yesnoe1'] == 'n'){
            $request['education'] = null;
        }
        if($request['yesnoe2'] == 'n'){
            $request['other5'] = null;
        }

        if($request['yesnof1'] == 'n'){
            $request['executive'] = null;
        }
        if($request['yesnof2'] == 'n'){
            $request['other6'] = null;
        }
        
        $result = $this->$db::findOrFail($id);
        $data = $result->update($request);

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id, $db)
    {
        $result = $this->$db::findOrFail($id);

        return $result->delete();
    }
}

