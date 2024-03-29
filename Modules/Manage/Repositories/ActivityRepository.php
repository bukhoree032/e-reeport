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

class ActivityRepository 
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
        $data = \DB::table($db)
                        ->select('*')
                        ->where('activity.id_districts',$id)
                        ->paginate(10);
        foreach ($data as $key => $value) {
            $ac = \DB::table('activitymeeting')
                ->where('id_ac',$value->id)
                ->get();
            
            $value->ac = '';
            if(isset($ac[0])){ 
                $value->ac = 'y';
            }else{
                $value->ac = 'n';
            }

            $ac = \DB::table('reportactivity')
                ->where('id_ac',$value->id)
                ->get();
            
            if($value->ac != 'y'){
                if(isset($ac[0])){ 
                    $value->ac = 'y';
                }else{
                    $value->ac = 'n';
                }
            }
        }
        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function count($db,$id)
    {
        $data = \DB::table($db)
                        ->where('activity.id_districts',$id)
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
    public function ShowActivity($id,$db)
    {
        $data = \DB::table($db)
                        ->where('id_districts',$id)
                        ->get();
        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function ShowActivityAll($db)
    {
        $data = \DB::table($db)
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

