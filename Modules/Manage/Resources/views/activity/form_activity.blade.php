@extends('layouts/contentNavbarLayout')

@section('title', 'Evalocal')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">เพิ่มข้อมูลรายงานผลการดำเนินงาน</span>
</h4>

<style>
    .margin_top{
        margin-top: 13px;
    }
</style>
{{-- Dashboard 1 --}}
<div class="row">
    <div class="col-lg-12 col-xxl-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">เพิ่มข้อมูลรายงานผลการดำเนินงาน</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('manage.insert.activity') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <input type="" hidden class="form-control" name="id_districts" placeholder="" value="{{Auth::user()->id}}" />
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>ชื่อกิจกรรม:</label>
                            <input type="text" class="form-control" name="name" placeholder="ชื่อกิจกรรม" />
                        </div>

                        <div class="col-lg-6">
                            <label>ประเภทกิจกรรม:</label>
                            <select name="category" id="cars" class="form-control">
                                <option>-- เลือกประเภท --</option>
                                <option value="สัตว์น้ำ">สัตว์น้ำ</option>
                                <option value="สัตว์ปีก">สัตว์ปีก</option>
                                <option value="พืชผัก">พืชผัก</option>
                            </select>
                        </div>

                        <div class="col-lg-3">
                            <label>จำนวนครัวเรือน:</label>
                            <input type="number" class="form-control" name="numberpeople" placeholder="จำนวนครัวเรือน" />
                        </div>
                        <div class="col-lg-3">
                            <label>งบประมาณ:</label>
                            <input type="number" class="form-control" name="budget" placeholder="งบประมาณ" />
                        </div>
                        <div class="col-lg-3">
                            <label>ละติจูด:</label>
                            <input type="text" class="form-control" name="lat" placeholder="ละติจูด" />
                        </div>
                        <div class="col-lg-3">
                            <label>ลองติจูด:</label>
                            <input type="text" class="form-control" name="log" placeholder="ลองติจูด" />
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-primary mr-2">บันทึก</button>
                            <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>

@endsection