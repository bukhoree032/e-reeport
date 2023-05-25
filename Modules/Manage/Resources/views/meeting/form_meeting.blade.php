@extends('layouts/contentNavbarLayout')

@section('title', 'Evalocal')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">เพิ่มข้อมูลการประชุม /</span>
</h4>

<style>
    .margin_top{
        margin-top: 13px;
    }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">เพิ่มข้อมูลการประชุม</h5>
      <div class="card-body">
        
        <form action="{{ route('manage.insert.meeting') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <input type="" hidden  class="form-control" name="id_user" value="{{Auth::user()->id}}"/>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>รายงานผลการดำเนินงานสภาสันติสุขตำบล:</label>
                        <input type="text" class="form-control" name="district" placeholder="ตำบล" value="{{auth::user()->districts}}" readonly/>
                    </div>
                    <div class="col-lg-4">
                        <label>ครั้งที่:</label>
                        <input type="text" class="form-control" name="round" placeholder="ประชุมครั้งที่" required/>
                    </div>
                    <div class="col-lg-4">
                        <label>วัน/เดือน/ปี:</label>
                        <input type="date" class="form-control" name="meeting_date" placeholder="วัน/เดือน/ปี ที่ประชุม" value="{{"2566-01-01"}}"/>
                    </div>
                    <div class="col-lg-12 margin_top">
                        <label>สถานที่ประชุม:</label>
                        <input type="text" class="form-control" name="location" placeholder="สถานที่ประชุม" />
                    </div>
                </div>
                
                <div class="col-lg-12"><b>ผู้มาประชุม (ให้ลงเฉพาะสมาชิกสภาสันติสุข)</b></div>
                <br>
                <div class="form-group row">
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_president" style="width: 100%;">
                            @if(isset($resultID->title_president))
                                <option value="{{$resultID->title_president}}" selected>{{$resultID->title_president}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (ประธานสภาสันติสุขตำบล)</label>
                        <input type="text" class="form-control" name="name_president" placeholder="ชื่อ" value="@if(isset($resultID->name_president)) {{$resultID->name_president}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_president" placeholder="นามสกุล"  value="@if(isset($resultID->lastname_president)) {{$resultID->lastname_president}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_president" value="ประธานสภาสันติสุขตำบล" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_vice_president1" style="width: 100%;">
                            @if(isset($resultID->title_vice_president1))
                                <option value="{{$resultID->title_vice_president1}}" selected>{{$resultID->title_vice_president1}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (รองประธาน)</label>
                        <input type="text" class="form-control" name="name_vice_president1" placeholder="ชื่อ" value="@if(isset($resultID->name_vice_president1)) {{$resultID->name_vice_president1}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_vice_president1" placeholder="นามสกุล" value="@if(isset($resultID->lastname_vice_president1)) {{$resultID->lastname_vice_president1}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_vice_president1" value="รองประธาน" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_vice_president2" style="width: 100%;">
                            @if(isset($resultID->title_vice_president2))
                                <option value="{{$resultID->title_vice_president2}}" selected>{{$resultID->title_vice_president2}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (รองประธาน)</label>
                        <input type="text" class="form-control" name="name_vice_president2" placeholder="ชื่อ" value="@if(isset($resultID->name_vice_president2)) {{$resultID->name_vice_president2}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_vice_president2" placeholder="นามสกุล" value="@if(isset($resultID->lastname_vice_president2)) {{$resultID->lastname_vice_president2}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_vice_president2" value="รองประธาน" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_group_plan" style="width: 100%;">
                            @if(isset($resultID->title_group_plan))
                                <option value="{{$resultID->title_group_plan}}" selected>{{$resultID->title_group_plan}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (กลุ่มภารกิจด้านแผนงานและพัฒนา)</label>
                        <input type="text" class="form-control" name="name_group_plan" placeholder="ชื่อ" value="@if(isset($resultID->name_group_plan)) {{$resultID->name_group_plan}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_group_plan" placeholder="นามสกุล" value="@if(isset($resultID->lastname_group_plan)) {{$resultID->lastname_group_plan}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_group_plan" value="กลุ่มภารกิจด้านแผนงานและพัฒนา" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_group_budget" style="width: 100%;">
                            @if(isset($resultID->title_group_budget))
                                <option value="{{$resultID->title_group_budget}}" selected>{{$resultID->title_group_budget}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (กลุ่มภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ)</label>
                        <input type="text" class="form-control" name="name_group_budget" placeholder="ชื่อ" value="@if(isset($resultID->name_group_budget)) {{$resultID->name_group_budget}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_group_budget" placeholder="นามสกุล" value="@if(isset($resultID->lastname_group_budget)) {{$resultID->lastname_group_budget}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_group_budget" value="กลุ่มภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_group_environment" style="width: 100%;">
                            @if(isset($resultID->title_group_environment))
                                <option value="{{$resultID->title_group_environment}}" selected>{{$resultID->title_group_environment}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (กลุ่มภารกิจด้านพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม)</label>
                        <input type="text" class="form-control" name="name_group_environment" placeholder="ชื่อ" value="@if(isset($resultID->name_group_environment)) {{$resultID->name_group_environment}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_group_environment" placeholder="นามสกุล" value="@if(isset($resultID->lastname_group_environment)) {{$resultID->lastname_group_environment}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_group_environment" value="กลุ่มภารกิจด้านพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_group_edu" style="width: 100%;">
                            @if(isset($resultID->title_group_edu))
                                <option value="{{$resultID->title_group_edu}}" selected>{{$resultID->title_group_edu}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (กลุ่มภารกิจด้านการพัฒนาการศึกษาศาสนาและวัฒนธรรม)</label>
                        <input type="text" class="form-control" name="name_group_edu" placeholder="ชื่อ" value="@if(isset($resultID->name_group_edu)) {{$resultID->name_group_edu}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_group_edu" placeholder="นามสกุล" value="@if(isset($resultID->lastname_group_edu)) {{$resultID->lastname_group_edu}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_group_edu" value="กลุ่มภารกิจด้านการพัฒนาการศึกษาศาสนาและวัฒนธรรม" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_group_director" style="width: 100%;">
                            @if(isset($resultID->title_group_director))
                                <option value="{{$resultID->title_group_director}}" selected>{{$resultID->title_group_director}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (กลุ่มภารกิจด้านอำนวยการ ฯ)</label>
                        <input type="text" class="form-control" name="name_group_director" placeholder="ชื่อ" value="@if(isset($resultID->name_group_director)) {{$resultID->name_group_director}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_group_director" placeholder="นามสกุล" value="@if(isset($resultID->lastname_group_director)) {{$resultID->lastname_group_director}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_group_director" value="กลุ่มภารกิจด้านอำนวยการ ฯ" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_group_stability" style="width: 100%;">
                            @if(isset($resultID->title_group_stability))
                                <option value="{{$resultID->title_group_stability}}" selected>{{$resultID->title_group_stability}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (กลุ่มภารกิจด้านอำนวยการ ฯ)</label>
                        <input type="text" class="form-control" name="name_group_stability" placeholder="ชื่อ" value="@if(isset($resultID->name_group_stability)) {{$resultID->name_group_stability}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_group_stabilit" placeholder="นามสกุล" value="@if(isset($resultID->lastname_group_stabilit)) {{$resultID->lastname_group_stabilit}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_group_stability" value="กลุ่มภารกิจด้านอำนวยการ ฯ" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_director1" style="width: 100%;">
                            @if(isset($resultID->title_director1))
                                <option value="{{$resultID->title_director1}}" selected>{{$resultID->title_director1}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (กรรมการ)</label>
                        <input type="text" class="form-control" name="name_director1" placeholder="ชื่อ" value="@if(isset($resultID->name_director1)) {{$resultID->name_director1}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_director1" placeholder="นามสกุล" value="@if(isset($resultID->lastname_director1)) {{$resultID->lastname_director1}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_director1" value="กรรมการ" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_director2" style="width: 100%;">
                            @if(isset($resultID->title_director2))
                                <option value="{{$resultID->title_director2}}" selected>{{$resultID->title_director2}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (กรรมการ)</label>
                        <input type="text" class="form-control" name="name_director2" placeholder="ชื่อ" value="@if(isset($resultID->name_director2)) {{$resultID->name_director2}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_director2" placeholder="นามสกุล" value="@if(isset($resultID->lastname_director2)) {{$resultID->lastname_director2}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_director2" value="กรรมการ" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_director3" style="width: 100%;">
                            @if(isset($resultID->title_director3))
                                <option value="{{$resultID->title_director3}}" selected>{{$resultID->title_director3}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (กรรมการ)</label>
                        <input type="text" class="form-control" name="name_director3" placeholder="ชื่อ" value="@if(isset($resultID->name_director3)) {{$resultID->name_director3}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_director3" placeholder="นามสกุล" value="@if(isset($resultID->lastname_director3)) {{$resultID->lastname_director3}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_director3" value="กรรมการ" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_bailiff" style="width: 100%;">
                            @if(isset($resultID->title_bailiff))
                                <option value="{{$resultID->title_bailiff}}" selected>{{$resultID->title_bailiff}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (เลขานุการ คนที่ 1 ปลัดอำเภอผู้เป็นหัวหน้าประจำตำบล)</label>
                        <input type="text" class="form-control" name="name_bailiff" placeholder="ชื่อ" value="@if(isset($resultID->name_bailiff)) {{$resultID->name_bailiff}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_bailiff " placeholder="นามสกุล" value="@if(isset($resultID->lastname_bailiff)) {{$resultID->lastname_bailiff}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_bailiff" value="เลขานุการ คนที่ 1 ปลัดอำเภอผู้เป็นหัวหน้าประจำตำบล" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_soldier" style="width: 100%;">
                            @if(isset($resultID->title_soldier))
                                <option value="{{$resultID->title_soldier}}" selected>{{$resultID->title_soldier}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (เลขานุการ คนที่ 2 ผบ.ร้อยเฉพาะกิจประจำตำบล)</label>
                        <input type="text" class="form-control" name="name_soldier" placeholder="ชื่อ" value="@if(isset($resultID->name_soldier)) {{$resultID->name_soldier}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_soldier" placeholder="นามสกุล" value="@if(isset($resultID->lastname_soldier)) {{$resultID->lastname_soldier}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_soldier" value="เลขานุการ คนที่ 2 ผบ.ร้อยเฉพาะกิจประจำตำบล" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_rule" style="width: 100%;">
                            @if(isset($resultID->title_rule))
                                <option value="{{$resultID->title_rule}}" selected>{{$resultID->title_rule}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (ผู้ช่วยเลขานุการเจ้าหน้าที่ปกครองประจำตำบล)</label>
                        <input type="text" class="form-control" name="name_rule" placeholder="ชื่อ" value="@if(isset($resultID->name_rule)) {{$resultID->name_rule}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_rule" placeholder="นามสกุล" value="@if(isset($resultID->lastname_rule)) {{$resultID->lastname_rule}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_rule" value="ผู้ช่วยเลขานุการเจ้าหน้าที่ปกครองประจำตำบล" hidden />
                    
                    <div class="col-lg-2  margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="title_volunteer" style="width: 100%;">
                            @if(isset($resultID->title_volunteer))
                                <option value="{{$resultID->title_volunteer}}" selected>{{$resultID->title_volunteer}}</option>
                            @else
                                <option value="" selected>-- คำนำหน้า --</option>
                            @endif
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>ชื่อ (ผู้ช่วยเลขานุการบัณฑิตอาสา)</label>
                        <input type="text" class="form-control" name="name_volunteer" placeholder="ชื่อ" value="@if(isset($resultID->name_volunteer)) {{$resultID->name_volunteer}} @endif"/>
                    </div>
                    <div class="col-lg-5  margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="lastname_volunteer" placeholder="นามสกุล" value="@if(isset($resultID->lastname_volunteer)) {{$resultID->lastname_volunteer}} @endif"/>
                    </div>
                    <input type="text" class="form-control" name="position_volunteer" value="ผู้ช่วยเลขานุการบัณฑิตอาสา" hidden />
                </div>






















                <div class="col-lg-12"><b>ผู้ไม่มาประชุม (ให้ลงเฉพาะสมาชิกสภาสันติสุข)</b></div>
                <br>
                <div class="form-group row">
                    
                    @for($r = 1; $r <= 3; $r++)
                    <div class="col-lg-2 margin_top">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="no_meeting[{{ $r }}][title]" style="width: 100%;">
                            <option value="" selected>-- คำนำหน้า --</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-2 margin_top">
                        <label>ชื่อ:</label>
                        <input type="text" class="form-control" name="no_meeting[{{ $r }}][name]" placeholder="ชื่อ" />
                    </div>
                    <div class="col-lg-2 margin_top">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="no_meeting[{{ $r }}][lastname]" placeholder="นามสกุล" />
                    </div>
                    <div class="col-lg-3 margin_top">
                        <label>ตำแหน่ง:</label>
                        <input type="text" class="form-control" name="no_meeting[{{ $r }}][position]" placeholder="ตำแหน่ง" />
                    </div>
                    <div class="col-lg-3 margin_top">
                        <label>สาเหตุการไม่เข้าประชุม:</label>
                        <input type="text" class="form-control" name="no_meeting[{{ $r }}][reason]" placeholder="สาเหตุการไม่เข้าประชุม" />
                    </div>
                    @endfor
                </div>


















                <div class="col-lg-12"><b>ผู้เข้าร่วมประชุม (เฉพาะผู้ที่ไม่ได้เป็นสมาชิกสภาสันติสุข)</b></div>
                <br>
                <div class="form-group row">
                    @for($r = 1; $r <= 4; $r++)
                    <div class="col-lg-2">
                        <label>คำนำหน้า:</label>
                        <span class="text-danger">*</span></label>
                        <select id="pro" class="form-control" name="p_meeting[{{ $r }}][title]" style="width: 100%;">
                            <option value="" selected>-- คำนำหน้า --</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-lg-5">
                        <label>ชื่อ:</label>
                        <input type="text" class="form-control" name="p_meeting[{{ $r }}][name]" placeholder="ชื่อ" />
                    </div>
                    <div class="col-lg-5">
                        <label>นามสกุล:</label>
                        <input type="text" class="form-control" name="p_meeting[{{ $r }}][lastname]" placeholder="นามสกุล" />
                    </div>
                    @endfor

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
      </div>
    </div>
  </div>
</div>
@endsection
