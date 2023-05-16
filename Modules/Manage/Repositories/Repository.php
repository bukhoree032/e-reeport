<?php

namespace Modules\Manage\Repositories;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manage\Entities\Stores;
use Modules\Manage\Entities\Flowers;
use Modules\Manage\Entities\Farmes;
use Modules\Manage\Entities\Meeting;
use Modules\Manage\Entities\Activity;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class Repository 
{
    public function __construct()
    {
        $this->classModelStores = Stores::class;
        $this->classModelFlowers = Flowers::class;
        $this->classModelFarmes = Farmes::class;
        $this->classModelMeeting = Meeting::class;
        $this->classModelActivity = Activity::class;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function index($db,$id)
    {
        // if($db == "meeting"){
        //     $colum_dis = "FA_SUB_DISTRICT";
        // }elseif($db == "stores"){
        //     $colum_dis = "S_SUB_DISTRICT";
        // }
        $data = \DB::table($db)
                        // ->select($db.'.id as id_db',$db.'.*','districts.name_th as name_dis','amphures.name_th as name_amp','provinces.name_th as name_prv','districts.*','amphures.*','provinces.*')
                        // ->join('districts',$db.'.'.$colum_dis,'=','districts.id')
                        // ->join('amphures','districts.amphure_id','=','amphures.id')
                        // ->join('provinces','amphures.province_id','=','provinces.id')
                        ->where('meeting.id_user',$id)
                        ->get();

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
        $request['no_meeting'] = serialize($request['no_meeting']);
        $request['p_meeting'] = serialize($request['p_meeting']);
        
        $insert = $this->$db::create($request);
        
        return $insert;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($request,$id,$db)
    {
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

