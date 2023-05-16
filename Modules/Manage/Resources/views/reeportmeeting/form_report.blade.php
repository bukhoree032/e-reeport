@extends('layouts/contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">เพิ่มข้อมูลรายงานการประชุม</span>
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
                <h3 class="card-title">เพิ่มข้อมูลรายงานการประชุม</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('manage.insert.report') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                        
                    <input type="" hidden  class="form-control" name="id_user" value="{{Auth::user()->id}}"/>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>รายงานครั้งที่</label><select id="pro" class="form-control" name="round" style="width: 100%;">
                                <option value="" selected>--ประชุมครั้งที่--</option>
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
                        <div class="col-lg-6">
                            <label>พ.ศ:</label>
                            <select id="pro" class="form-control" name="year_round" style="width: 100%;">
                                <option selected>-- ปี --</option>
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
                        <div class="col-lg-4 margin_top">
                            <label>แบบรายงานผลการดำเนินงานประจำเดือน:</label>
                            <select id="pro" class="form-control" name="month" style="width: 100%;">
                                <option selected>--เดือน--</option>
                                <option value="มกราคม">มกราคม</option>
                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                <option value="มีนาคม">มีนาคม</option>
                                <option value="เมษายน">เมษายน</option>
                                <option value="พฤษภาคม">พฤษภาคม</option>
                                <option value="มิถุนายน">มิถุนายน</option>
                                <option value="กรกฎาคม">กรกฎาคม</option>
                                <option value="สิงหาคม">สิงหาคม</option>
                                <option value="กันยายน">กันยายน</option>
                                <option value="ตุลาคม">ตุลาคม</option>
                                <option value="พฤศจิกายน">พฤศจิกายน</option>
                                <option value="ธันวาคม">ธันวาคม</option>
                            </select>
                        </div>
                        <div class="col-lg-4 margin_top">
                            <label>พ.ศ:</label>
                            <select id="pro" class="form-control" name="year" style="width: 100%;">
                                <option value="" selected>- ปี --</option>
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
                        <div class="col-lg-4 margin_top">
                            <label>ประจำปีงบประมาณ พ.ศ.:</label>
                            <select id="pro" class="form-control" name="year_budget" style="width: 100%;">
                                <option value="" selected>--ปี--</option>
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
                    </div>
                    <div class="form-group row margin_top">
                        <div class="col-lg-4">
                            <label>สภาสันติสุขตำบล:</label>
                            <input type="text" class="form-control" name="district" value="{{auth::user()->districts}}" readonly placeholder="สภาสันติสุขตำบล" />
                        </div>
                        <div class="col-lg-4">
                            <label>สภาสันติสุขอำเภอ:</label>
                            <input type="text" class="form-control" name="amphur" value="{{auth::user()->amphures}}" readonly placeholder="สภาสันติสุขอำเภอ" />
                        </div>
                        <div class="col-lg-4">
                            <label>สภาสันติสุขจังหวัด:</label>
                            <input type="text" class="form-control" name="province" value="{{auth::user()->provinces}}" readonly placeholder="สภาสันติสุขจังหวัด" />
                        </div>
                    </div>
                    
                    <div class="col-lg-12 margin_top"><b>แบบรายงานผลการดำเนินงานประจำเดือน : ส่วนที่ 1</b></div>
                    <br>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>รายงานการประชุมสภาสันติสุขตำบล:</label>
                            <input type="text" class="form-control" name="district1" value="{{auth::user()->districts}}" readonly  placeholder="รายงานการประชุมสภาสันติสุขตำบล" />
                        </div>
                        <div class="col-lg-6">
                            <label>ประจำเดือน</label>
                            <select id="pro" class="form-control" name="month1" style="width: 100%;">
                                <option selected>--เดือน--</option>
                                <option value="มกราคม">มกราคม</option>
                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                <option value="มีนาคม">มีนาคม</option>
                                <option value="เมษายน">เมษายน</option>
                                <option value="พฤษภาคม">พฤษภาคม</option>
                                <option value="มิถุนายน">มิถุนายน</option>
                                <option value="กรกฎาคม">กรกฎาคม</option>
                                <option value="สิงหาคม">สิงหาคม</option>
                                <option value="กันยายน">กันยายน</option>
                                <option value="ตุลาคม">ตุลาคม</option>
                                <option value="พฤศจิกายน">พฤศจิกายน</option>
                                <option value="ธันวาคม">ธันวาคม</option>
                            </select>
                        </div>
                        <div class="col-lg-6 margin_top">
                            <label>วันที่/เดือน/ปี:</label>
                            <input type="date" class="form-control" name="date_report" placeholder="วันที่/เดือน/ปี" value="{{"2566-01-01"}}"/>
                        </div>

                        <div class="col-lg-6  margin_top">
                            <label>สถานที่:</label>
                            <input type="text" class="form-control" name="location" placeholder="สถานที่" />
                        </div>
                            <div class="col-lg-4 margin_top">
                                <label>ตำบล:</label>
                                <input type="text" class="form-control" name="district2" value="{{auth::user()->districts}}" readonly placeholder="" />
                            </div>
                            <div class="col-lg-4 margin_top">
                                <label>อำเภอ:</label>
                                <input type="text" class="form-control" name="amphur2" value="{{auth::user()->amphures}}" readonly placeholder="" />
                            </div>
                            <div class="col-lg-4 margin_top">
                                <label>จังหวัด:</label>
                                <input type="text" class="form-control" name="province2" value="{{auth::user()->provinces}}" readonly placeholder="" />
                            </div>
                        </div>

                        <div class="col-lg-12 margin_top"><b>ตามระเบียบวาระที่ 3 เรื่องเสนอให้ที่ประชุมทราบ (เรื่องสืบเนื่อง)</b></div>
                        <br>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>1. ภารกิจด้านความมั่นคงและรักษาความสงบเรียบร้อย (หน่วยทหารในพื้นที่/ตชด/ตำรวจภูธร):</label>
                            </div>
                            <div class="col-lg-2">
                                <input name="secure" class="form-check-input" type="radio" value="ดำเนินการแล้ว" id="secure" />
                                <label class="form-check-label" for="secure">ดำเนินการแล้ว</label>
                            </div>
                            <div class="col-lg-2">
                                <input name="secure" class="form-check-input" type="radio" value="ไม่ดำเนินการ" id="secure2" />
                                <label class="form-check-label" for="secure2">ไม่ดำเนินการ</label>
                            </div>

                            <div class="col-lg-6 margin_top">
                                <label>2. ภารกิจด้านแผนงานและการพัฒนาด้านเศรษฐกิจ(พัฒนากรประจำตำบล):</label>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <input name="economy" class="form-check-input" type="radio" value="ดำเนินการแล้ว" id="economy" />
                                <label class="form-check-label" for="economy">ดำเนินการแล้ว</label>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <input name="economy" class="form-check-input" type="radio" value="ไม่ดำเนินการ" id="economy2" />
                                <label class="form-check-label" for="economy2">ไม่ดำเนินการ</label>
                            </div>

                            <div class="col-lg-6 margin_top">
                                <label>3. ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ (ปลัด อปท.):</label>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <input name="budget" class="form-check-input" type="radio" value="ดำเนินการแล้ว" id="budget" />
                                <label class="form-check-label" for="budget">ดำเนินการแล้ว</label>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <input name="budget" class="form-check-input" type="radio" value="ไม่ดำเนินการ" id="budget2" />
                                <label class="form-check-label" for="budget2">ไม่ดำเนินการ</label>
                            </div>

                            <div class="col-lg-6 margin_top">
                                <label>4. ภารกิจด้านการพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม (ผอ.รพ.สต.):</label>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <input name="environment" class="form-check-input" type="radio" value="ดำเนินการแล้ว" id="environment" />
                                <label class="form-check-label" for="environment">ดำเนินการแล้ว</label>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <input name="environment" class="form-check-input" type="radio" value="ไม่ดำเนินการ" id="environment2" />
                                <label class="form-check-label" for="environment2">ไม่ดำเนินการ</label>
                            </div>

                            <div class="col-lg-6 margin_top">
                                <label>5. ภารกิจการพัฒนาการศึกษา ศาสนาและวัฒนธรรม (ครู อาสา กศน.):</label>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <input name="education" class="form-check-input" type="radio" value="ดำเนินการแล้ว" id="education" />
                                <label class="form-check-label" for="education">ดำเนินการแล้ว</label>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <input name="education" class="form-check-input" type="radio" value="ไม่ดำเนินการ" id="education2" />
                                <label class="form-check-label" for="education2">ไม่ดำเนินการ</label>
                            </div>

                            <div class="col-lg-6 margin_top">
                                <label>6. กลุ่มภารกิจด้านอำนวยการและการบริหาร(ปลัดอำเภอผู้เป้นหัวหน้าประจำตำบล):</label>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <input name="director" class="form-check-input" type="radio" value="ดำเนินการแล้ว" id="director" />
                                <label class="form-check-label" for="director">ดำเนินการแล้ว</label>
                            </div>
                            <div class="col-lg-2 margin_top">
                                <input name="director" class="form-check-input" type="radio" value="ไม่ดำเนินการ" id="director2" />
                                <label class="form-check-label" for="director2">ไม่ดำเนินการ</label>
                            </div>
                        
                        
                        <div class="col-lg-12 margin_top"><b>แบบรายงานผลการดำเนินงานประจำเดือน : ส่วนที่ 2</b></div>
                        <br>
                        @foreach($result as $key => $value)
                        <h3 style="margin-top: 30px">กิจกรรม{{$value->name}}</h3>
                        <div class="form-group row">
                            <div class="col-lg-6 margin_top">
                                <label>ชื่อโครงการ/กิจกรรม:</label>
                                <input type="text" class="form-control" name="activity[{{$key}}][activity]" placeholder="ชื่อโครงการ/กิจกรรม" value="{{$value->name}}" readonly/>
                            </div>
                            <div class="col-lg-3 margin_top">
                                <label>การเบิกจ่ายงบประมาณ (ได้รับอนุมัติ):</label>
                                <input type="text" class="form-control" name="activity[{{$key}}][approve]" placeholder="การเบิกจ่ายงบประมาณ (ได้รับอนุมัติ)" />
                            </div>
                            <div class="col-lg-3 margin_top">
                                <label>การเบิกจ่ายงบประมาณ (เบิก-จ่าย):</label>
                                <input type="text" class="form-control" name="activity[{{$key}}][withdraw]" placeholder="การเบิกจ่ายงบประมาณ (เบิก-จ่าย)" />
                            </div>
                            <div class="col-lg-3 margin_top">
                                <label>ผลการดำเนินงาน (กลุ่มเป้าหมาย (ประเภท/คน)):</label>
                                <input type="text" class="form-control" name="activity[{{$key}}][target]" placeholder="ผลการดำเนินงาน (กลุ่มเป้าหมาย (ประเภท/คน))" />
                            </div>
                            <div class="col-lg-3 margin_top">
                                <label>ผลการดำเนินงาน (รายได้ที่ได้รับจากกิจกรรม (บาท)):</label>
                                <input type="text" class="form-control" name="activity[{{$key}}][income]" placeholder="ผลการดำเนินงาน (รายได้ที่ได้รับจากกิจกรรม (บาท))" />
                            </div>
                            <div class="col-lg-3 margin_top">
                                <label>ผลการดำเนินงาน (คุณภาพชีวิตกลุ่มเป้าหมาย):</label>
                                <input type="text" class="form-control" name="activity[{{$key}}][quality]" placeholder="ผลการดำเนินงาน (คุณภาพชีวิตกลุ่มเป้าหมาย)" />
                            </div>
                            <div class="col-lg-3 margin_top">
                                <label>ผลการดำเนินงาน (ปัญหา/อุปสรรค/ข้อเสนอแนะ):</label>
                                <input type="text" class="form-control" name="activity[{{$key}}][problem]" placeholder="ผลการดำเนินงาน (ปัญหา/อุปสรรค/ข้อเสนอแนะ)" />
                            </div>
                            
                            <div class="col-lg-12 margin_top">
                                <label>หมายเหตุ</label>
                                <input type="text" class="form-control" name="activity[{{$key}}][note]" placeholder="หมายเหตุ" />
                            </div>
                        @endforeach
                        
                        {{-- <div class="col-lg-12 margin_top">
                            <label>หมายเหตุ:</label>
                            <div class="col-lg-12" style="margin-top: 20px">
                                <div class="field" align="left">
                                    <input type="file" style="display:none" id="upload-images2" name="activity[2][pictures]" multiple="multiple"></input>
                                    <div id="uploads2" class="drop-areas">
                                        เพิ่มรูปภาพกลุ่มทั้งหมด +
                                    </div>
                                    <div id="thumbnails"></div>
                                </div>
                            </div>
                        </div> --}}



                            
                            <div class="col-lg-12 margin_top">
                                <label>ลงชื่อปลัดอำเภอผู้เป็นหัวหน้าประจำตำบล:</label>
                                <input type="text" class="form-control" name="name_head" placeholder="ลงชื่อปลัดอำเภอผู้เป็นหัวหน้าประจำตำบล" />
                            </div>
                                <input type="text" class="form-control" value="ปลัดอำเภอผู้เป็นหัวหน้าประจำตำบล{{auth::user()->districts}}" name="position_head" hidden/>

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