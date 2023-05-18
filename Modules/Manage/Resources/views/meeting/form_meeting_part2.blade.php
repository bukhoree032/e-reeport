@extends('layouts/contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">เพิ่มข้อมูลการประชุม</span>
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
        
        <form action="{{ route('manage.insert.meeting2',$ID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label>เริ่มประชุมเวลา:</label>
                        <input class="form-control" type="time" name="begin_meet">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-11 margin_top">
                        <label>ระเบียบวาระที่ 1 ประธานแจ้งให้ทราบ:</label>
                        <input type="text" class="form-control " name="agenda1" placeholder="ระเบียบวาระที่ 1 " />
                    </div >
                </div>
                <div class="form-group row">
                    <div class="col-lg-4  margin_top">
                        <label>ระเบียบวาระที่ 2 ประชุมครั้งที่:</label>
                            <select id="pro" class="form-control" name="r_meet_no" style="width: 100%;">
                                <option selected>--ประชุมครั้งที่--</option>
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
                            <select id="pro" class="form-control" name="r_meeting_year" style="width: 100%;">
                                <option selected>--ประชุมครั้งที่--</option>
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
                            <input type="date" class="form-control " name="r_meeting_date" placeholder="วัน/เดือน/ปี" value="{{"2566-01-01"}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12  margin_top">
                            <label>มติที่ประชุม	รับรอง/แก้ไขเรื่อง:</label>
                            <input type="text" class="form-control " name="r_meet_edit" placeholder="มติที่ประชุม	รับรอง/แก้ไขเรื่อง" />
                        </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12  margin_top">
                        <label><b>ระเบียบวาระที่ 3	เรื่องเสนอให้ที่ประชุมทราบ (เรื่องสืบเนื่อง):</b></label>
                        <br>
                        <label><b>1. ภารกิจด้านความมั่นคงและรักษาความสงบเรียบร้อย (หน่วยทหารในพื้นที่/ตชด/ตำรวจภูธร):</b></label>

                        <div class="col-lg-12  margin_top">
                            <label>1.1 สถานการณ์ยาเสพติด:</label>
                            <input type="text" class="form-control " name="narcotics" placeholder="สถานการณ์ยาเสพติด" />
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>1.2 สถานการณ์ความไม่สงบ :</label>
                            <input type="text" class="form-control " name="unrest" placeholder="สถานการณ์ความไม่สงบ" />
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>1.3 การปฏิบัติหน้าที่เวรยาม:</label>
                            <input type="text" class="form-control " name="guard" placeholder="การปฏิบัติหน้าที่เวรยาม" />
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>1.4 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other1" placeholder="อื่นๆ:" />
                        </div>


                        <label class="  margin_top"><b>2. ภารกิจด้านแผนงานและการพัฒนาด้านเศรษฐกิจ(พัฒนากรประจำตำบล):</b></label>

                        <div class="col-lg-12  margin_top">
                            <label>2.1 โครงการเสริมสร้างความเข้มแข็งให้กับตำบล (ศอ.บต.):</label>
                        </div>
                        @foreach($result as $key => $value)
                            <div class="col-lg-12  margin_top">
                                <label>2.1.{{$key+1}} กิจกรรม{{$value->name}}:</label>
                                <input type="text" class="form-control " name="strength[{{$key}}][id_ac]" value="{{$value->id}}" hidden/>
                                <input type="text" class="form-control " name="strength[{{$key}}][strength]" placeholder="โครงการเสริมสร้างความเข้มแข็งให้กับตำบล" />
                            </div>
                            
                            <div class="col-lg-12" style="margin-top: 20px">
                                
                                <div class="input-group">
                                    <input type="file" class="form-control" name="strength[{{$key}}][pictures][]" id="inputGroupFile{{$key}}" multiple="multiple">
                                    <label class="input-group-text" for="inputGroupFile{{$key}}">Upload</label>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-lg-12" style="margin-top: 20px">
                            <div class="field" align="left">
                                <input type="file" style="display:none" id="upload-images" name="pictures[]" multiple="multiple"></input>
                                <div id="uploads" class="drop-areas">
                                    เพิ่มรูปภาพกลุ่มทั้งหมด +
                                </div>
                                <div id="thumbnails"></div>
                            </div>
                        </div> --}}
                        <div class="col-lg-12  margin_top">
                            <label>2.2 โครงการของส่วนราชการในตำบล:</label>
                            <input type="text" class="form-control " name="government" placeholder="โครงการของส่วนราชการในตำบล" />
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>2.3 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other2" placeholder="การปฏิบัติหน้าที่เวรยาม" />
                        </div>


                        <div class="col-lg-12  margin_top">
                            <label><b>3. ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ (ปลัด อปท.):</b></label>
                            <input type="text" class="form-control " name="coordinate" placeholder="ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ" />
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>3.1 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other3" placeholder="อื่นๆ:" />
                        </div>



                        <label class="  margin_top"><b>4.ภารกิจด้านการพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม (ผอ.รพ.สต.):</b></label>

                        <div class="col-lg-12  margin_top">
                            <label>4.1 สถานการณ์สุขอนามัย (โควิด 19 และอื่นๆ):</label>
                            <input type="text" class="form-control " name="covid" placeholder="สถานการณ์สุขอนามัย" />
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>4.2 บ้าน/ซ่อมบ้าน (ส่งต่อ พอช.):</label>
                            <input type="text" class="form-control " name="home" placeholder="บ้าน/ซ่อมบ้าน (ส่งต่อ พอช.)" />
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>4.3 ผู้สูงอายุ :</label>
                            <input type="text" class="form-control " name="elder" placeholder="ผู้สูงอายุ" />
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>4.4 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other4" placeholder="อื่นๆ:" />
                        </div>
                        


                        <label class="  margin_top"><b>5. ภารกิจการพัฒนาการศึกษา ศาสนาและวัฒนธรรม (ครู อาสา กศน.):</b></label>

                        <div class="col-lg-12  margin_top">
                            <label>5.1 สถานการณ์เด็กหลุดจากระบบการศึกษา :</label>
                            <input type="text" class="form-control " name="education" placeholder="สถานการณ์เด็กหลุดจากระบบการศึกษา" />
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>5.2 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other5" placeholder="อื่นๆ:" />
                        </div>
                        
                        <div class="col-lg-12  margin_top">
                            <label><b>6. กลุ่มภารกิจด้านอำนวยการและการบริหาร(ปลัดอำเภอผู้เป้นหัวหน้าประจำตำบล):</b></label>
                            <input type="text" class="form-control " name="executive" placeholder="กลุ่มภารกิจด้านอำนวยการและการบริหาร" />
                        </div>

                        <div class="col-lg-12  margin_top">
                            <label>6.1 อื่นๆ:</label>
                            <input type="text" class="form-control " name="other6" placeholder="อื่นๆ:" />
                        </div>


                        <div class="col-lg-12  margin_top">
                            <label>มติที่ประชุม:</label>
                            <input type="text" class="form-control " name="r_meeting" value="รับทราบ" placeholder="ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ" />
                        </div>
                        

                        <label class="  margin_top"><b>ระเบียบวาระที่ 4 :</b></label>

                        <div class="col-lg-12  margin_top">
                            <label>เรื่องเพื่อพิจารณา:</label>
                            <textarea class="form-control" name="agenda4" rows="3" cols="50"></textarea>
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>มติที่ประชุม:</label>
                            <textarea class="form-control" name="resolution4" rows="3" cols="50"></textarea>
                        </div>
                        


                        <label class="  margin_top"><b>ระเบียบวาระที่ 5:</b></label>

                        <div class="col-lg-12  margin_top">
                            <label>เรื่องอื่น ๆ:</label>
                            <textarea class="form-control" name="agenda5" rows="3" cols="50"></textarea>
                        </div>
                        <div class="col-lg-12  margin_top">
                            <label>มติที่ประชุม:</label>
                            <textarea class="form-control" name="resolution5" rows="3" cols="50"></textarea>
                        </div>
                        


                        <label class="  margin_top"><b>ระเบียบวาระที่ 6:</b></label>

                        <div class="col-lg-12  margin_top">
                            <label>ข้อสั่งการ/ปิดการประชุม:</label>
                            <textarea class="form-control" name="agenda6" rows="3" cols="100"></textarea>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-3  margin_top">
                                <label>ปิดการประชุมเวลา:</label>
                                <input class="form-control" type="time" name="end_meet">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-3  margin_top">
                                <label>ชื่อผู้จดบันทึกการประชุม:</label>
                                <input class="form-control" type="" name="name_record">
                            </div>
                            <div class="col-lg-3  margin_top">
                                <label>ตำแหน่ง:</label>
                                <input class="form-control" type="" name="position_record">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-3  margin_top">
                                <label>ชื่อผู้ตรวจรายงานการประชุม:</label>
                                <input class="form-control" type="" name="name_reporter">
                            </div>
                            <div class="col-lg-3  margin_top">
                                <label>ตำแหน่ง:</label>
                                <input class="form-control" type="" name="position_reporter">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-3  margin_top">
                                <label>ชื่อผู้รับรองการประชุม:</label>
                                <input class="form-control" type="" name="name_guarantee">
                            </div>
                            <div class="col-lg-3  margin_top">
                                <label>ตำแหน่ง ประธานสภาสันติสุขตำบล:</label>
                                <input class="form-control" type="" name="position_guarantee" value="{{auth::user()->districts}}" readonly>
                            </div>
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
      </div>
    </div>
  </div>
</div>
@endsection
