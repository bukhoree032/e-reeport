<?php

namespace Modules\Manage\Repositories;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manage\Entities\Stores;
use Modules\Manage\Entities\Flowers;
use Modules\Manage\Entities\Farmes;

class FarmesRepository 
{
    public function __construct()
    {
        $this->classModelStores = Stores::class;
        $this->classModelFlowers = Flowers::class;
        $this->classModelFarmes = Farmes::class;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function index($db)
    {
        $data['result'] = \DB::table($db)
                        ->select($db.'.id as id_db',$db.'.*','districts.name_th as name_dis','amphures.name_th as name_amp','provinces.name_th as name_prv','districts.*','amphures.*','provinces.*')
                        ->join('districts',$db.'.FA_SUB_DISTRICT','=','districts.id')
                        ->join('amphures','districts.amphure_id','=','amphures.id')
                        ->join('provinces','amphures.province_id','=','provinces.id')
                        ->get();
        // dd($data);
        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($db)
    {
        $data['result'] = \DB::table($db)
                        ->get();
        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function ShowId($id,$db)
    {
        $data['result'] = \DB::table($db)
                        ->where('id',$id)
                        ->get();
        $data['result'][0]->FA_FLOWER = unserialize($data['result'][0]->FA_FLOWER);
        foreach ($data['result'][0]->FA_FLOWER as $key => $value) {
            $data['resultflower'][$key] = \DB::table('flowers')
                        ->where('F_NAME',$value)
                        ->get();
        }

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function insert($data,$db)
    {
        $insert = $this->$db::create($data);
        return $insert;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($data,$id,$db)
    {
        $data['update'] = \DB::table($db)
              ->where('id', $id)
              ->update($data);
        return $data;
    }
}

