<?php

namespace Modules\Manage\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Manage\Repositories\Repository as Repository;

use Illuminate\Support\Str;
use App\Http\Controllers\UploadeFileController;

class FlowerController extends UploadeFileController
{
    protected $Repository;

    public function __construct(Repository $Repository)
    {
        $this->Repository = $Repository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $page_title = 'ดอกไม้';
        $page_description = '';
        $page = compact('page_title', 'page_description');
        
        $db = "flowers";
        $data['result'] = $this->Repository->show($db);

        return view('manage::flower.manage_flower',compact('page_title', 'page_description'),$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $page_title = 'เพิ่มข้อมูลดอกไม้';
        $page_description = '';

        return view('manage::flower.form_flower', compact('page_title', 'page_description'));
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function CreateFlower(Request $request)
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
                $file_multiples[$key] = $uploade->uploadImage(
                    $value,
                    'flowers',
                    Str::random(5)
                );
            }
            $request['file_multiple'] = serialize($file_multiples);
        }
        $data['result'] = $this->Repository->insert($request->all(),'classModelFlowers');
        return redirect()->route('index.flower');
    }

    public function PageDetailFlower($id)
    {
        $page_title = 'รายละเอียดข้อมูลดอกไม้';
        $page_description = '';

        
        $data['result'] = $this->Repository->ShowId($id,'flowers');

        if(isset($data['result']->file_multiple)){
            $data['result']->file_multiple = unserialize($data['result']->file_multiple);
        }

        return view('manage::flower.detail_flower', compact('page_title', 'page_description'),$data);
    }
    
    public function PageEditFlower($id)
    {
        $page_title = 'แก้ไขข้อมูลดอกไม้';
        $page_description = '';

        $data['result'] = $this->Repository->ShowId($id,'flowers');

        if(isset($data['result']->file_multiple)){
            $data['result']->file_multiple = unserialize($data['result']->file_multiple);
        }

        return view('manage::flower.edit_flower', compact('page_title', 'page_description'),$data);
    }
    
    public function UpdateFlower(Request $request, $id)
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
                $file_multiples[$key] = $uploade->uploadImage(
                    $value,
                    'flowers',
                    Str::random(5)
                );
            }
            $request['file_multiple'] = serialize($file_multiples);
        }

        $data['result'] = $this->Repository->update($request->all(), $id,'classModelFlowers');

        return redirect()->route('index.flower');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('manage::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('manage::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
