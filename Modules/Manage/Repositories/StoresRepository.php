<?php

namespace Modules\Manage\Repositories;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manage\Entities\Stores;
use Modules\Manage\Entities\Flowers;

class StoresRepository 
{
    public function __construct()
    {
        $this->classModelStores = Stores::class;
        $this->classModelFlowers = Flowers::class;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($db)
    {
        // dd("aaaaaa");
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

        $data['result'][0]->S_FLOWER = unserialize($data['result'][0]->S_FLOWER);

        foreach ($data['result'][0]->S_FLOWER as $key => $value) {
            $data['resultflower'][$key] = \DB::table('flowers')
                        ->where('id',$value)
                        ->get();
        }

        // dd($data['result'][0]->S_FLOWER);

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
        // $insert = $this->$db::update($data);
        // dd($id);
        return $data;
    }
}

