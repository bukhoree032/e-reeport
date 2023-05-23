@extends('layouts/contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Forms /</span> Basic Inputs
</h4>

<style>
    .margin_top{
        margin-top: 13px;
    }
</style>
{{-- Dashboard 1 --}}
<div class="row">
    <div class="col-lg-6 col-xxl-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">เพิ่มข้อมูลบันทึกการประชุม</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('manage.update.meeting',$resultID->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @dd($resultID) --}}
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>รายงานการประชุมสภาสันติสุขตำบล:</label>
                            <input type="text" class="form-control" name="district" placeholder="ตำบล" value="{{$resultID->district}}" />
                        </div>
                        <div class="col-lg-4">
                            <label>ครั้งที่:</label>
                            <input type="text" class="form-control" name="round" placeholder="ประชุมครั้งที่" value="{{$resultID->round}}"/>
                        </div>
                        <div class="col-lg-4">
                            <label>วัน/เดือน/ปี:</label>
                            <input type="text" class="form-control" name="meeting_date" placeholder="วัน/เดือน/ปี ที่ประชุม" value="{{$resultID->meeting_date}}" />
                        </div>
                        <div class="col-lg-12 margin_top">
                            <label>สถานที่ประชุม:</label>
                            <input type="text" class="form-control" name="location" placeholder="สถานที่ประชุม"  value="{{$resultID->location}}"/>
                        </div>
                    </div>
                    
                    <div class="col-lg-12"><b>ผู้มาประชุม (ให้ลงเฉพาะสมาชิกสภาสันติสุข)</b></div>
                    <br>
                    <div class="form-group row">
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_president" style="width: 100%;">
                                <option value="{{$resultID->title_president}}" selected>{{$resultID->title_president}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (ประธานสภาสันติสุขตำบล)</label>
                            <input type="text" class="form-control" name="name_president" placeholder="ชื่อ" value="{{$resultID->name_president}}" />
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_president" placeholder="นามสกุล" value="{{$resultID->lastname_president}}" />
                        </div>
                        <input type="text" class="form-control" name="position_president" value="ประธานสภาสันติสุขตำบล" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_vice_president1" style="width: 100%;">
                                <option value="{{$resultID->title_vice_president1}}" selected>{{$resultID->title_vice_president1}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (รองประธาน)</label>
                            <input type="text" class="form-control" name="name_vice_president1" placeholder="ชื่อ" value="{{$resultID->name_vice_president1}}" />
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_vice_president1" placeholder="นามสกุล" value="{{$resultID->lastname_vice_president1}}" />
                        </div>
                        <input type="text" class="form-control" name="position_vice_president1" value="รองประธาน" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_vice_president2" style="width: 100%;">
                                <option value="{{$resultID->title_vice_president2}}" selected>{{$resultID->title_vice_president2}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (รองประธาน)</label>
                            <input type="text" class="form-control" name="name_vice_president2" placeholder="ชื่อ"  value="{{$resultID->name_vice_president2}}"/>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_vice_president2" placeholder="นามสกุล" value="{{$resultID->lastname_vice_president2}}" />
                        </div>
                        <input type="text" class="form-control" name="position_vice_president2" value="รองประธาน" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_group_plan" style="width: 100%;">
                                <option value="{{$resultID->title_group_plan}}" selected>{{$resultID->title_group_plan}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (กลุ่มภารกิจด้านแผนงานและพัฒนา)</label>
                            <input type="text" class="form-control" name="name_group_plan" placeholder="ชื่อ" value="{{$resultID->name_group_plan}}" />
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_group_plan" placeholder="นามสกุล" value="{{$resultID->lastname_group_plan}}" />
                        </div>
                        <input type="text" class="form-control" name="position_group_plan" value="กลุ่มภารกิจด้านแผนงานและพัฒนา" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_group_budget" style="width: 100%;">
                                <option value="{{$resultID->title_group_budget}}" selected>{{$resultID->title_group_budget}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (กลุ่มภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ)</label>
                            <input type="text" class="form-control" name="name_group_budget" placeholder="ชื่อ"  value="{{$resultID->name_group_budget}}"/>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_group_budget" placeholder="นามสกุล" value="{{$resultID->lastname_group_budget}}" />
                        </div>
                        <input type="text" class="form-control" name="position_group_budget" value="กลุ่มภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_group_environment" style="width: 100%;">
                                <option value="{{$resultID->title_group_environment}}" selected>{{$resultID->title_group_environment}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (กลุ่มภารกิจด้านพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม)</label>
                            <input type="text" class="form-control" name="name_group_environment" placeholder="ชื่อ" value="{{$resultID->name_group_environment}}" />
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_group_environment" placeholder="นามสกุล" value="{{$resultID->lastname_group_environment}}" />
                        </div>
                        <input type="text" class="form-control" name="position_group_environment" value="กลุ่มภารกิจด้านพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_group_edu" style="width: 100%;">
                                <option value="{{$resultID->title_group_edu}}" selected>{{$resultID->title_group_edu}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (กลุ่มภารกิจด้านการพัฒนาการศึกษาศาสนาและวัฒนธรรม)</label>
                            <input type="text" class="form-control" name="name_group_edu" placeholder="ชื่อ"  value="{{$resultID->name_group_edu}}"/>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_group_edu" placeholder="นามสกุล" value="{{$resultID->lastname_group_edu}}" />
                        </div>
                        <input type="text" class="form-control" name="position_group_edu" value="กลุ่มภารกิจด้านการพัฒนาการศึกษาศาสนาและวัฒนธรรม" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_group_director" style="width: 100%;">
                                <option value="{{$resultID->title_group_director}}" selected>{{$resultID->title_group_director}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (กลุ่มภารกิจด้านอำนวยการ ฯ)</label>
                            <input type="text" class="form-control" name="name_group_director" placeholder="ชื่อ"  value="{{$resultID->name_group_director}}"/>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_group_director" placeholder="นามสกุล"  value="{{$resultID->lastname_group_director}}"/>
                        </div>
                        <input type="text" class="form-control" name="position_group_director" value="กลุ่มภารกิจด้านอำนวยการ ฯ" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_group_stability" style="width: 100%;">
                                <option value="{{$resultID->title_group_stability}}" selected>{{$resultID->title_group_stability}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (กลุ่มภารกิจด้านอำนวยการ ฯ)</label>
                            <input type="text" class="form-control" name="name_group_stability" placeholder="ชื่อ" value="{{$resultID->name_group_stability}}" />
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_group_stabilit" placeholder="นามสกุล" value="{{$resultID->lastname_group_stability}}" />
                        </div>
                        <input type="text" class="form-control" name="position_group_stability" value="กลุ่มภารกิจด้านอำนวยการ ฯ" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_director1" style="width: 100%;">
                                <option value="{{$resultID->title_director1}}" selected>{{$resultID->title_director1}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (กรรมการ)</label>
                            <input type="text" class="form-control" name="name_director1" placeholder="ชื่อ"  value="{{$resultID->name_director1}}"/>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_director1" placeholder="นามสกุล"  value="{{$resultID->lastname_director1}}"/>
                        </div>
                        <input type="text" class="form-control" name="position_director1" value="กรรมการ" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_director2" style="width: 100%;">
                                <option value="{{$resultID->title_director2}}" selected>{{$resultID->title_director2}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (กรรมการ)</label>
                            <input type="text" class="form-control" name="name_director2" placeholder="ชื่อ"  value="{{$resultID->name_director2}}"/>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_director2" placeholder="นามสกุล" value="{{$resultID->lastname_director2}}" />
                        </div>
                        <input type="text" class="form-control" name="position_director2" value="กรรมการ" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_director3" style="width: 100%;">
                                <option value="{{$resultID->title_director3}}" selected>{{$resultID->title_director3}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (กรรมการ)</label>
                            <input type="text" class="form-control" name="name_director3" placeholder="ชื่อ"  value="{{$resultID->name_director3}}"/>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_director3" placeholder="นามสกุล" value="{{$resultID->lastname_director3}}" />
                        </div>
                        <input type="text" class="form-control" name="position_director3" value="กรรมการ" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_bailiff" style="width: 100%;">
                                <option value="{{$resultID->title_bailiff}}" selected>{{$resultID->title_bailiff}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (เลขานุการ คนที่ 1 ปลัดอำเภอผู้เป็นหัวหน้าประจำตำบล)</label>
                            <input type="text" class="form-control" name="name_bailiff" placeholder="ชื่อ" value="{{$resultID->name_bailiff}}" />
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_bailiff " placeholder="นามสกุล"  value="{{$resultID->lastname_bailiff}}" />
                        </div>
                        <input type="text" class="form-control" name="position_bailiff" value="เลขานุการ คนที่ 1 ปลัดอำเภอผู้เป็นหัวหน้าประจำตำบล" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_soldier" style="width: 100%;">
                                <option value="{{$resultID->title_soldier}}" selected>{{$resultID->title_soldier}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (เลขานุการ คนที่ 2 ผบ.ร้อยเฉพาะกิจประจำตำบล)</label>
                            <input type="text" class="form-control" name="name_soldier" placeholder="ชื่อ"  value="{{$resultID->name_soldier}}"/>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_soldier" placeholder="นามสกุล" value="{{$resultID->lastname_soldier}}" />
                        </div>
                        <input type="text" class="form-control" name="position_soldier" value="เลขานุการ คนที่ 2 ผบ.ร้อยเฉพาะกิจประจำตำบล" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_rule" style="width: 100%;">
                                <option value="{{$resultID->title_rule}}" selected>{{$resultID->title_rule}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (ผู้ช่วยเลขานุการเจ้าหน้าที่ปกครองประจำตำบล)</label>
                            <input type="text" class="form-control" name="name_rule" placeholder="ชื่อ" value="{{$resultID->name_rule}}"/>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_rule" placeholder="นามสกุล"  value="{{$resultID->lastname_rule}}" />
                        </div>
                        <input type="text" class="form-control" name="position_rule" value="ผู้ช่วยเลขานุการเจ้าหน้าที่ปกครองประจำตำบล" hidden />
                        
                        <div class="col-lg-2  margin_top">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="title_volunteer" style="width: 100%;">
                                <option value="{{$resultID->title_volunteer}}" selected>{{$resultID->title_volunteer}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>ชื่อ (ผู้ช่วยเลขานุการบัณฑิตอาสา)</label>
                            <input type="text" class="form-control" name="name_volunteer" placeholder="ชื่อ"  value="{{$resultID->name_volunteer}}" />
                        </div>
                        <div class="col-lg-5  margin_top">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="lastname_volunteer" placeholder="นามสกุล" value="{{$resultID->lastname_volunteer}}"  />
                        </div>
                        <input type="text" class="form-control" name="position_volunteer" value="ผู้ช่วยเลขานุการบัณฑิตอาสา" hidden />
                    </div>




















                    <div class="col-lg-12"><b>ผู้ไม่มาประชุม (ให้ลงเฉพาะสมาชิกสภาสันติสุข)</b></div>
                    <br>
                    <div class="form-group row">
                        @foreach($resultID->no_meeting as $key => $value)
                            <div class="col-lg-2 margin_top">
                                <label>คำนำหน้า:</label>
                                <span class="text-danger">*</span></label>
                                <select id="pro" class="form-control" name="no_meeting[{{ $key }}][title]" style="width: 100%;">
                                    <option value="{{$value['title']}}" selected>{{$value['title']}}</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <label>ชื่อ:</label>
                                <input type="text" class="form-control" name="no_meeting[{{ $key }}][name]" placeholder="ชื่อ"  value="{{$value['name']}}" />
                            </div>
                            <div class="col-lg-2 margin_top">
                                <label>นามสกุล:</label>
                                <input type="text" class="form-control" name="no_meeting[{{ $key }}][lastname]" placeholder="นามสกุล" value="{{$value['lastname']}}"  />
                            </div>
                            <div class="col-lg-3 margin_top">
                                <label>ตำแหน่ง:</label>
                                <input type="text" class="form-control" name="no_meeting[{{ $key }}][position]" placeholder="ตำแหน่ง" value="{{$value['position']}}" />
                            </div>
                            <div class="col-lg-3 margin_top">
                                <label>สาเหตุการไม่เข้าประชุม:</label>
                                <input type="text" class="form-control" name="no_meeting[{{ $key }}][reason]" placeholder="สาเหตุการไม่เข้าประชุม" value="{{$value['reason']}}" />
                            </div>
                        @endforeach
                    </div>


















                    <div class="col-lg-12"><b>ผู้เข้าร่วมประชุม (เฉพาะผู้ที่ไม่ได้เป็นสมาชิกสภาสันติสุข)</b></div>
                    <br>
                    <div class="form-group row">
                        
                        @foreach($resultID->p_meeting as $key => $value)
                        <div class="col-lg-2">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="p_meeting[{{ $key }}][title]" style="width: 100%;">
                                <option value="{{$value['title']}}" selected>{{$value['title']}}</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col-lg-5">
                            <label>ชื่อ:</label>
                            <input type="text" class="form-control" name="p_meeting[{{ $key }}][name]" placeholder="ชื่อ" value="{{$value['name']}}" />
                        </div>
                        <div class="col-lg-5">
                            <label>นามสกุล:</label>
                            <input type="text" class="form-control" name="p_meeting[{{ $key }}][lastname]" placeholder="นามสกุล"  value="{{$value['lastname']}}"/>
                        </div>
                        @endforeach
                    </div>








                {{-- @dd($resultID) --}}
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label>เริ่มประชุมเวลา:</label>
                        <input class="form-control" type="time" name="begin_meet" value="{{$resultID->begin_meet}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-11">
                        <label>ระเบียบวาระที่ 1 ประธานแจ้งให้ทราบ:</label>
                        <input type="text" class="form-control " name="agenda1" placeholder="ระเบียบวาระที่ 1" value="{{$resultID->agenda1}}" />
                    </div >
                </div>
                <div class="form-group row">
                    <div class="col-lg-4  margin_top">
                        <label>ระเบียบวาระที่ 2 ประชุมครั้งที่:</label>
                            <select id="pro" class="form-control" name="r_meet_no" style="width: 100%;" >
                                <option value="{{$resultID->r_meet_no}}" selected>{{$resultID->r_meet_no}}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-lg-4  margin_top">
                            <label>ประชุมปี:</label>
                            <select id="pro" class="form-control" name="r_meeting_year " style="width: 100%;">
                                <option value="{{$resultID->r_meeting_year}}" selected>{{$resultID->r_meeting_year}}</option>
                                <option value="2560">2560</option>
                                <option value="2561">2561</option>
                                <option value="2562">2562</option>
                                <option value="2563">2563</option>
                                <option value="2564">2564</option>
                                <option value="2565">2565</option>
                                <option value="2566">2566</option>
                                <option value="2567">2567</option>
                                <option value="2568">2568</option>
                                <option value="2569">2569</option>
                            </select>
                        </div>
                        <div class="col-lg-4  margin_top">
                            <label>วัน/เดือน/ปี:</label>
                            <input type="date" class="form-control " name="r_meeting_date" placeholder="วัน/เดือน/ปี"  value="{{$resultID->r_meeting_date}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12  margin_top">
                            <label>มติที่ประชุม	รับรอง/แก้ไขเรื่อง:</label>
                            <input type="text" class="form-control " name="r_meet_edit" placeholder="มติที่ประชุม	รับรอง/แก้ไขเรื่อง" value="{{$resultID->r_meet_edit}}"/>
                        </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label><b>ระเบียบวาระที่ 3	เรื่องเสนอให้ที่ประชุมทราบ (เรื่องสืบเนื่อง):</b></label>
                        <br>
                        <label><b>1. ภารกิจด้านความมั่นคงและรักษาความสงบเรียบร้อย (หน่วยทหารในพื้นที่/ตชด/ตำรวจภูธร):</b></label>
                
                        <div class="col-lg-12  margin_top">
                            <label>1.1 สถานการณ์ยาเสพติด:</label>
                            <input type="text" class="form-control " name="narcotics" placeholder="สถานการณ์ยาเสพติด" value="{{$resultID->narcotics}}" />
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>1.2 สถานการณ์ความไม่สงบ :</label>
                            <input type="text" class="form-control " name="unrest " placeholder="สถานการณ์ความไม่สงบ" value="{{$resultID->unrest}}" />
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>1.3 การปฏิบัติหน้าที่เวรยาม:</label>
                            <input type="text" class="form-control " name="guard" placeholder="การปฏิบัติหน้าที่เวรยาม"  value="{{$resultID->guard}}"/>
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>1.4 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other1" placeholder="การปฏิบัติหน้าที่เวรยาม" value="{{$resultID->other1}}"/>
                        </div>
                
                
                        <label><b>2. ภารกิจด้านแผนงานและการพัฒนาด้านเศรษฐกิจ(พัฒนากรประจำตำบล):</b></label>
                        <div class="col-lg-12  margin_top">
                            <label>2.1 โครงการเสริมสร้างความเข้มแข็งให้กับตำบล (ศอ.บต.):</label>
                        </div>
                        @foreach($activitymeeting as $key => $value)
                            <div class="col-lg-12  margin_top">
                                <label>2.1.{{$key+1}} กิจกรรม{{$value->name_ac}}:</label>
                                <input type="text" class="form-control " name="strength[{{$key}}][id_ac_meet]" value="{{$value->id_ac_meet}}" hidden/>
                                <input type="text" class="form-control " name="strength[{{$key}}][id_ac]" value="{{$value->id_ac}}" hidden/>
                                <input type="text" class="form-control " name="strength[{{$key}}][name_ac]" value="{{$value->name_ac}}" hidden/>
                                <input type="text" class="form-control " name="strength[{{$key}}][strength]" placeholder="โครงการเสริมสร้างความเข้มแข็งให้กับตำบล" value="{{$value->strength}}"/>
                            </div>
                            
                            <div class="col-lg-12" style="margin-top: 20px">
                                
                                <div class="input-group">
                                    <input type="file" class="form-control" name="strength[{{$key}}][pictures][]" id="inputGroupFile{{$key}}" multiple="multiple">
                                    <label class="input-group-text" for="inputGroupFile{{$key}}">Upload</label>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12  margin_top">
                            <label>2.2 โครงการของส่วนราชการในตำบล:</label>
                            <input type="text" class="form-control " name="government" placeholder="โครงการของส่วนราชการในตำบล"  value="{{$resultID->government}}"/>
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>2.3 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other2" placeholder="อื่นๆ:" value="{{$resultID->other2}}"/>
                        </div>
                
                
                        <div class="col-lg-12  margin_top">
                            <label>3. ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ (ปลัด อปท.):</label>
                            <input type="text" class="form-control " name="coordinate" placeholder="ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ" value="{{$resultID->coordinate}}" />
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>3.1 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other3" placeholder="อื่นๆ:" value="{{$resultID->other3}}"/>
                        </div>
                
                
                        <label><b>4.ภารกิจด้านการพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม (ผอ.รพ.สต.):</b></label>
                
                        <div class="col-lg-12  margin_top">
                            <label>4.1 สถานการณ์สุขอนามัย (โควิด 19 และอื่นๆ):</label>
                            <input type="text" class="form-control " name="covid" placeholder="สถานการณ์สุขอนามัย" value="{{$resultID->covid}}" />
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>4.2 บ้าน/ซ่อมบ้าน (ส่งต่อ พอช.):</label>
                            <input type="text" class="form-control " name="home" placeholder="บ้าน/ซ่อมบ้าน (ส่งต่อ พอช.)" value="{{$resultID->home}}" />
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>4.3 ผู้สูงอายุ :</label>
                            <input type="text" class="form-control " name="elder" placeholder="ผู้สูงอายุ"  value="{{$resultID->elder}}" />
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>4.4 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other4" placeholder="อื่นๆ:" value="{{$resultID->other4}}"/>
                        </div>
                        
                
                
                        <label><b>5. ภารกิจการพัฒนาการศึกษา ศาสนาและวัฒนธรรม (ครู อาสา กศน.):</b></label>
                
                        <div class="col-lg-12  margin_top">
                            <label>5.1 สถานการณ์เด็กหลุดจากระบบการศึกษา :</label>
                            <input type="text" class="form-control " name="education" placeholder="สถานการณ์เด็กหลุดจากระบบการศึกษา" value="{{$resultID->education}}"/>
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>5.2 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other5" placeholder="อื่นๆ:" value="{{$resultID->other5}}"/>
                        </div>
                        
                        <div class="col-lg-12  margin_top">
                            <label>6. กลุ่มภารกิจด้านอำนวยการและการบริหาร(ปลัดอำเภอผู้เป้นหัวหน้าประจำตำบล):</label>
                            <input type="text" class="form-control " name="executive" placeholder="กลุ่มภารกิจด้านอำนวยการและการบริหาร" value="{{$resultID->executive}}" />
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>6.1 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other6" placeholder="อื่นๆ:" value="{{$resultID->other6}}"/>
                        </div>
                
                        <div class="col-lg-12  margin_top">
                            <label>มติที่ประชุม:</label>
                            <input type="text" class="form-control " name="r_meeting" value="รับทราบ" placeholder="ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ" value="{{$resultID->r_meeting}}" />
                        </div>
                        
                
                        <label><b>ระเบียบวาระที่ 4 :</b></label>
                
                        <div class="col-lg-12  margin_top">
                            <label>เรื่องเพื่อพิจารณา:</label>
                            <textarea class="form-control" name="agenda4" rows="3" cols="50">{{$resultID->agenda4}}</textarea>
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>มติที่ประชุม:</label>
                            <textarea class="form-control" name="resolution4" rows="3" cols="50">{{$resultID->resolution4}}</textarea>
                        </div>
                        
                
                
                        <label><b>ระเบียบวาระที่ 5:</b></label>
                
                        <div class="col-lg-12  margin_top">
                            <label>เรื่องอื่น ๆ:</label>
                            <textarea class="form-control" name="agenda5" rows="3" cols="50">{{$resultID->agenda5}}</textarea>
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>มติที่ประชุม:</label>
                            <textarea class="form-control" name="resolution5" rows="3" cols="50">{{$resultID->resolution5}}</textarea>
                        </div>
                        
                
                
                        <label><b>ระเบียบวาระที่ 6:</b></label>
                
                        <div class="col-lg-12  margin_top">
                            <label>ข้อสั่งการ/ปิดการประชุม:</label>
                            <textarea class="form-control" name="agenda6" rows="3" cols="100">{{$resultID->agenda6}}</textarea>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label>ปิดการประชุมเวลา:</label>
                                <input class="form-control" type="time" name="end_meet" value="{{$resultID->end_meet}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label>ชื่อผู้จดบันทึกการประชุม:</label>
                                <input class="form-control" type="" name="name_record" value="{{$resultID->name_record}}">
                            </div>
                            <div class="col-lg-3">
                                <label>ตำแหน่ง:</label>
                                <input class="form-control" type="" name="position_record" value="{{$resultID->position_record}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label>ชื่อผู้ตรวจรายงานการประชุม:</label>
                                <input class="form-control" type="" name="name_reporter" value="{{$resultID->name_reporter}}">
                            </div>
                            <div class="col-lg-3">
                                <label>ตำแหน่ง:</label>
                                <input class="form-control" type="" name="position_reporter" value="{{$resultID->position_reporter}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <label>ชื่อผู้รับรองการประชุม:</label>
                                <input class="form-control" type="" name="name_guarantee" value="{{$resultID->name_guarantee}}">
                            </div>
                            <div class="col-lg-3">
                                <label>ตำแหน่ง ประธานสภาสันติสุขตำบล:</label>
                                <input class="form-control" type="" name="position_guarantee" value="{{$resultID->position_guarantee}}">
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