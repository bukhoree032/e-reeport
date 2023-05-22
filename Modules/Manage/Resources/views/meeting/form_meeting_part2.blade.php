@extends('layouts/contentNavbarLayout')

@section('title', 'Basic Inputs - Forms')

@section('page-script')
<script src="{{asset('assets/js/form-basic-inputs.js')}}"></script>
<script type="text/javascript">
    function a() 
        {   
            if (document.getElementById('yesCheck').checked) {
                    document.getElementById('ifYes').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYes').style.visibility = 'hidden';
            }
        }
</script>
<script type="text/javascript">
    function a1() 
        {   
            if (document.getElementById('yesCheck1').checked) {
                    document.getElementById('ifYes1').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYes1').style.visibility = 'hidden';
            }
        }
</script>
<script type="text/javascript">
    function a2() 
        {   
            if (document.getElementById('yesCheck2').checked) {
                    document.getElementById('ifYes2').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYes2').style.visibility = 'hidden';
            }
        }
</script>
<script type="text/javascript">
    function a3() 
        {   
            if (document.getElementById('yesCheck3').checked) {
                    document.getElementById('ifYes3').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYes3').style.visibility = 'hidden';
            }
        }
</script>

<script type="text/javascript">
    function b2() 
        {   
            if (document.getElementById('yesCheckb2').checked) {
                    document.getElementById('ifYesb2').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYesb2').style.visibility = 'hidden';
            }
        }
</script>

<script type="text/javascript">
    function b3() 
        {   
            if (document.getElementById('yesCheckb3').checked) {
                    document.getElementById('ifYesb3').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYesb3').style.visibility = 'hidden';
            }
        }
</script>

<script type="text/javascript">
    function c1() 
        {   
            if (document.getElementById('yesCheckc1').checked) {
                    document.getElementById('ifYesc1').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYesc1').style.visibility = 'hidden';
            }
        }
</script>

<script type="text/javascript">
    function c2() 
        {   
            if (document.getElementById('yesCheckc2').checked) {
                    document.getElementById('ifYesc2').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYesc2').style.visibility = 'hidden';
            }
        }
</script>


<script type="text/javascript">
    function d1() 
        {   
            if (document.getElementById('yesCheckd1').checked) {
                    document.getElementById('ifYesd1').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYesd1').style.visibility = 'hidden';
            }
        }
</script>


<script type="text/javascript">
    function d2() 
        {   
            if (document.getElementById('yesCheckd2').checked) {
                    document.getElementById('ifYesd2').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYesd2').style.visibility = 'hidden';
            }
        }
</script>

<script type="text/javascript">
    function d3() 
        {   
            if (document.getElementById('yesCheckd3').checked) {
                    document.getElementById('ifYesd3').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYesd3').style.visibility = 'hidden';
            }
        }
</script>

<script type="text/javascript">
    function d4() 
        {   
            if (document.getElementById('yesCheckd4').checked) {
                    document.getElementById('ifYesd4').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYesd4').style.visibility = 'hidden';
            }
        }
</script>

<script type="text/javascript">
    function e1() 
        {   
            if (document.getElementById('yesChecke1').checked) {
                    document.getElementById('ifYese1').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYese1').style.visibility = 'hidden';
            }
        }
</script>

<script type="text/javascript">
    function e2() 
        {   
            if (document.getElementById('yesChecke2').checked) {
                    document.getElementById('ifYese2').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYese2').style.visibility = 'hidden';
            }
        }
</script>

<script type="text/javascript">
    function f1() 
        {   
            if (document.getElementById('yesCheckf1').checked) {
                    document.getElementById('ifYesf1').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYesf1').style.visibility = 'hidden';
            }
        }
</script>


<script type="text/javascript">
    function f2() 
        {   
            if (document.getElementById('yesCheckf2').checked) {
                    document.getElementById('ifYesf2').style.visibility = 'visible';
            } 
            else {
                    document.getElementById('ifYesf2').style.visibility = 'hidden';
            }
        }
</script>




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
                        <br>
                        <label>1.1 สถานการณ์ยาเสพติด:</label>
                        <div class="col-lg-12  margin_top">
                            <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:a();" name="yesno" id="yesCheck" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:a();" name="yesno" id="noCheck" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            </div>
                            <div id="ifYes" style="visibility:hidden"class="col-lg-12 ">
                                <input type="text" class="form-control " name="narcotics" placeholder="สถานการณ์ยาเสพติด" />
                            </div>
                        </div>

                        <label>1.2 สถานการณ์ความไม่สงบ :</label>
                        <div class="col-lg-12  margin_top">
                            <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:a1();" name="yesno1" id="yesCheck1" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:a1();" name="yesno1" id="noChec1k" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            </div>
                            <div id="ifYes1" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="unrest" placeholder="สถานการณ์ความไม่สงบ" />
                            </div>
                        </div>
                        
                        <label>1.3 การปฏิบัติหน้าที่เวรยาม:</label>
                        <div class="col-lg-12  margin_top">
                            <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:a2();" name="yesno2" id="yesCheck2" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:a2();" name="yesno2" id="noCheck2" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            </div>
                            <div id="ifYes2" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="guard" placeholder="การปฏิบัติหน้าที่เวรยาม" />
                            </div>
                        </div>

                        <label>1.4 อื่นๆ:</label>
                        <div class="col-lg-12  margin_top">
                            <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:a3();" name="yesno3" id="yesCheck3" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:a3();" name="yesno3" id="noCheck3" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            </div>
                            <div id="ifYes3" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="other1" placeholder="อื่นๆ:" />
                            </div>
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
                        <div class="col-lg-12" style="margin-top: 20px">
                            <div class="field" align="left">
                                <input type="file" style="display:none" id="upload-images" name="pictures[]" multiple="multiple"></input>
                                <div id="uploads" class="drop-areas">
                                    เพิ่มรูปภาพกลุ่มทั้งหมด +
                                </div>
                                <div id="thumbnails"></div>
                            </div>
                        </div> 
                        <label>2.2 โครงการของส่วนราชการในตำบล:</label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:b2();" name="yesnob2" id="yesCheckb2" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:b2();" name="yesnob2" id="noCheckb2" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYesb2" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="government" placeholder="โครงการของส่วนราชการในตำบล" />
                            </div>
                        </div>

                        <label>2.3 อื่นๆ:</label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:b3();" name="yesnob3" id="yesCheckb3" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:b3();" name="yesnob3" id="noCheckb3" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYesb3" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="other2" placeholder="อื่นๆ" />
                            </div>
                        </div>

                        <label><b>3. ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ (ปลัด อปท.):</b></label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:c1();" name="yesnoc1" id="yesCheckc1" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:c1();" name="yesnoc1" id="noCheckc1" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYesc1" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="coordinate" placeholder="ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ" />
                            </div>
                        </div>

                        <label>3.1 อื่นๆ:</label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:c2();" name="yesnoc2" id="yesCheckc2" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:c2();" name="yesnoc2" id="noCheckc2" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYesc2" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="other3" placeholder="อื่นๆ" />
                            </div>
                        </div>

                        <label class="  margin_top"><b>4.ภารกิจด้านการพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม (ผอ.รพ.สต.):</b></label><br>

                        <label>4.1 สถานการณ์สุขอนามัย(โควิด 19 และอื่นๆ):</label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:d1();" name="yesnod1" id="yesCheckd1" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:d1();" name="yesnod1" id="noCheckd1" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYesd1" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="covid" placeholder="สถานการณ์สุขอนามัย" />
                            </div>
                        </div> 

                        <label>4.2 บ้าน/ซ่อมบ้าน (ส่งต่อ พอช.):</label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:d2();" name="yesnod2" id="yesCheckd2" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:d2();" name="yesnod2" id="noCheckd2" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYesd2" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="home" placeholder="บ้าน/ซ่อมบ้าน (ส่งต่อ พอช.)" />
                            </div>
                        </div>

                        <label>4.3 ผู้สูงอายุ :</label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:d3();" name="yesnod3" id="yesCheckd3" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:d3();" name="yesnod3" id="noCheckd3" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYesd3" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="elder" placeholder="ผู้สูงอายุ" />
                            </div>
                        </div>

                        <label>4.4 อื่นๆ:</label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:d4();" name="yesnod4" id="yesCheckd4" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:d4();" name="yesnod4" id="noCheckd4" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYesd4" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="other4" placeholder="อื่นๆ:" />
                            </div>
                        </div>
                        
                
                        <label class="  margin_top"><b>5. ภารกิจการพัฒนาการศึกษา ศาสนาและวัฒนธรรม (ครู อาสา กศน.):</b></label><br>
                        <label>5.1 สถานการณ์เด็กหลุดจากระบบการศึกษา :</label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:e1();" name="yesnoe1" id="yesChecke1" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:e1();" name="yesnoe1" id="noChecke1" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYese1" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="education" placeholder="สถานการณ์เด็กหลุดจากระบบการศึกษา" />
                            </div>
                        </div>
                        
                        <label>5.2 อื่นๆ:</label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:e2();" name="yesnoe2" id="yesChecke2" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:e2();" name="yesnoe2" id="noChecke2" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYese2" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="other5" placeholder="อื่นๆ:" />
                            </div>
                        </div>
                        

                        <label><b>6.กลุ่มภารกิจด้านอำนวยการและการบริหาร(ปลัดอำเภอผู้เป้นหัวหน้าประจำตำบล):</b></label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:f1();" name="yesnof1" id="yesCheckf1" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:f1();" name="yesnof1" id="noCheckf1" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYesf1" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="executive" placeholder="กลุ่มภารกิจด้านอำนวยการและการบริหาร" />
                            </div>
                        </div>

                        <label>6.1 อื่นๆ:</label>
                        <div class="col-lg-12">
                                <input class="form-check-input" type="radio" value="" onclick="javascript:f2();" name="yesnof2" id="yesCheckf2" />
                                <label class="form-check-label" for="secure"> มี</label>
                                <input class="form-check-input" type="radio" value="" onclick="javascript:f2();" name="yesnof2" id="noCheckf2" />
                                <label class="form-check-label" for="secure2"> ไม่มี</label>
                            <div id="ifYesf2" style="visibility:hidden"class="col-lg-12 ">
                            <input type="text" class="form-control " name="other6" placeholder="อื่นๆ:" />
                            </div>
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


