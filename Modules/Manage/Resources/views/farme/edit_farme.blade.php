{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<style>
    .specify{
        margin-top: -6px;
        margin-bottom: 10px; 
        margin-left: 24px;
    }
    .checkbox_margin{
        margin-left: 0px;
    }    #img-preview {
    display: none;
    width: 100%;
    border: 2px dashed #333;  
    margin-bottom: 20px;
  }
  #img-preview img {
    width: 100%;
    height: auto;
    display: block;
  }
  [type="file"] {
    height: 0;  
    width: 0;
    overflow: hidden;
  }
  [type="file"] + label {
    width: 100%;
    height: 40px;
    font-family: sans-serif;
    background: #f44336;
    padding: 10px 30px;
    border: 2px solid #f44336;
    border-radius: 3px;
    color: #fff;
    cursor: pointer;
    transition: all 0.2s;
  }
  [type="file"] + label:hover {
    background-color: #fff;
    color: #f44336;
  }
  
  /* -------------------------------------*/
  body {padding: 15px;}
  p {position:fixed; bottom:0; font-family: monospace; font-weight: bold; font-size:12px;}
  p a {color:#000;}
  
</style>
{{-- @dd($resultID) --}}
{{-- Dashboard 1 --}}
<div class="row">
    <div class="col-lg-6 col-xxl-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">แก้ข้อมูลดอกไม้กลุ่มเกษตรกร และฟาร์ม</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('manage.edit.farme1',$resultID['result'][0]->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label>คำนำหน้า:</label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="form-control" name="FA_TITLE" style="width: 100%;" required>
                                <option selected>-- คำนำหน้า --</option>
                                <option value="นาย" @if($resultID['result'][0]->FA_TITLE == 'นาย') checked @endif>นาย</option>
                                <option value="นาง" @if($resultID['result'][0]->FA_TITLE == 'นาง') checked @endif>นาง</option>
                                <option value="นางสาว" @if($resultID['result'][0]->FA_TITLE == 'นางสาว') checked @endif>นางสาว</option>
                            </select>
                            <span class="form-text text-muted">กรุณาเลือกคำนำหน้า</span>
                        </div>
                        <div class="col-lg-5">
                            <label>ชื่อหัวหน้ากลุ่มเกษตรกร:</label>
                            <input type="text" class="form-control" name="FA_NAME" value="{{ $resultID['result'][0]->FA_NAME }}" placeholder="ป้อนชื่อหัวหน้ากลุ่มเกษตรกร" />
                            <span class="form-text text-muted">กรุณาป้อนชื่อหัวหน้ากลุ่มเกษตรกร/ผู้ดูแล</span>
                        </div>
                        <div class="col-lg-5">
                            <label>ชื่อกลุ่มเกษตรกร (สวนดอกไม้):</label>
                            <input type="text" class="form-control" name="FA_GROUPNAME" value="{{ $resultID['result'][0]->FA_GROUPNAME }}" placeholder="ป้อนชื่อกลุ่มเกษตรกร" />
                            <span class="form-text text-muted">กรุณาป้อนชื่อกลุ่มเกษตรกร/สวนดอกไม้</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label>บ้านเลขที่:</label>
                            <input type="text" class="form-control" name="FA_HOUSENUMBER" value="{{ $resultID['result'][0]->FA_HOUSENUMBER }}" placeholder="ป้อนบ้านเลขที่" />
                            <span class="form-text text-muted">กรุณาป้อนบ้านเลขที่</span>
                        </div>
                        <div class="col-lg-4">
                            <label>หมู่:</label>
                            <input type="text" class="form-control" name="FA_MOO" value="{{ $resultID['result'][0]->FA_MOO }}" placeholder="ป้อนหมู่" />
                            <span class="form-text text-muted">กรุณาป้อนหมู่ที่</span>
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-top: 10px"><b>ตำบล/อำเภอ/จังหวัด:</b></label>
                            <span class="text-danger">*</span></label>
                            <select id="pro" class="js-example-basic-multiple" name="FA_SUB_DISTRICT" style="width: 100%;" required>
                                <option selected>-- จังหวัด --</option>
                                @foreach ($resultDistricts as $item => $value)
                                    <option value="{{ $value->id_districts }}" @if($ProvinceJoin[0]->id_districts == $value->id_districts) selected @endif>ตำบล{{ $value->name_districts }}  >>  อำเภอ{{ $value->name_amphures }}  >>  จังหวัด{{ $value->name_provinces }}  >> {{ $value->zip_code_districts }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-lg-4">
                            <label>รหัสไปรษณีย์:</label>
                            <input type="text" class="form-control" name="FA_ZIPCODE" placeholder="ป้อนรหัสไปรษณีย์" />
                            <span class="form-text text-muted">กรุณาป้อนรหัสไปรษณีย์</span>
                        </div> --}}
                        <div class="col-lg-4">
                            <label>เบอร์ติดต่อ:</label>
                            <input type="text" class="form-control" name="FA_PHONE" value="{{ $resultID['result'][0]->FA_PHONE }}" placeholder="ป้อนเบอร์ติดต่อ" />
                            <span class="form-text text-muted">กรุณาป้อนเบอร์ติดต่อ</span>
                        </div>
                        <div class="col-lg-4">
                            <label>พิกัด (ละติจูด):</label>
                            <input type="text" class="form-control" name="FA_LAT" value="{{ $resultID['result'][0]->FA_LAT }}" placeholder="ป้อนพิกัด (ละติจูด)" />
                            <span class="form-text text-muted">กรุณาป้อนพิกัด (ละติจูด)</span>
                        </div>
                        <div class="col-lg-4">
                            <label>พิกัด (ลองติจูด):</label>
                            <input type="text" class="form-control" name="FA_LONG" value="{{ $resultID['result'][0]->FA_LONG }}" placeholder="พิกัด (ลองติจูด)" />
                            <span class="form-text text-muted">กรุณาพิกัด (ลองติจูด)</span>
                        </div>
                        
                        <div class="col-lg-12"  style="margin-top: 20px">
                            <b>ข้อมูลพื้นที่</b>
                        </div>
                        <div class="col-lg-4">
                            <label>ไร่:</label>
                            <input type="text" class="form-control" name="FA_FARM" value="{{ $resultID['result'][0]->FA_FARM }}" placeholder="ป้อนจำนวนพื้นที่กี่ไร่" />
                            <span class="form-text text-muted">กรุณาป้อนจำนวนพื้นที่กี่ไร่</span>
                        </div>
                        <div class="col-lg-4">
                            <label>งาน:</label>
                            <input type="text" class="form-control" name="FA_FARM_WORK" value="{{ $resultID['result'][0]->FA_FARM_WORK }}" placeholder="ป้อนจำนวนพื้นที่กี่งาน" />
                            <span class="form-text text-muted">กรุณาป้อนจำนวนพื้นที่กี่งาน</span>
                        </div>
                        <div class="col-lg-4">
                            <label>ตารางเมตร:</label>
                            <input type="text" class="form-control" name="FA_METER" value="{{ $resultID['result'][0]->FA_METER }}" placeholder="ป้อนจำนวนพื้นที่กี่ตารางเมตร" />
                            <span class="form-text text-muted">กรุณาป้อนจำนวนพื้นที่กี่ตารางเมตร</span>
                        </div>

                        <div class="col-lg-12"style="margin-top: 20px">
                            <label>ข้อมูลกลุ่ม:</label>
                            <textarea type="text" class="form-control" name="FA_DETAIL" placeholder="ป้อนข้อมูลทั้วไปของกลุ่มหรือฟาร์ม" rows="3">{{ $resultID['result'][0]->FA_DETAIL }}</textarea>
                            <span class="form-text text-muted">กรุณาป้อนข้อมูลทั่วไป</span>
                        </div>

                        <div class="col-lg-12" style="margin-top: 20px">
                            <div class="row">
                                <div class="col-lg-3">
                                    รูปเดิม
                                    <img src="{{$resultID['result'][0]->file ?? asset('storage/app/public/icon/img.png')}}" alt="" style="width: 100%;height: 80%; margin-top: 0px">
                                    {{-- <button type="button" class="btn btn-danger btn-sm btn-block" >ลบรูป</button> --}}
                                    <input type="file" id="choose-file" name="files" accept="image/*" />
                                    <label for="choose-file">เลือกไฟล์ใหม่</label>
                                </div>
                                <div class="col-lg-4">
                                     
                                  <div>
                                    <div id="img-preview"></div>
                                    
                                  </div>
                                </div>
                              </div>
                        </div>
                        {{-- <div class="col-lg-12" style="margin-top: 20px">
                            <div class="field" align="left">
                                <input type="file" style="display:none" id="upload-image" name="files"></input>
                                <div id="upload" class="drop-area">
                                    อัปโหลดรูปหน้าปก +
                                </div>
                                <div id="thumbnail"></div>
                            </div>
                        </div> --}}
                        <div class="col-lg-12" style="margin-top: 50px">
                            <div class="row">
                                @isset($resultID['result'][0]->file_multiple[0])
                                    @foreach ($resultID['result'][0]->file_multiple as $key => $value)
                                        <div class="col-lg-3" id="{{$key}}">
                                            <input type="text"  name="file_multiples_edit[]" value="{{ $value }}" hidden>
                                            <img src="{{$value}}" alt="" style="width: 100%;height: 80%; margin-top: 10px">
                                            <button type="button" class="btn btn-danger btn-sm btn-block" onclick="myFunction({{$key}})">ลบรูป</button>
                                        </div>
                                    @endforeach    
                                @endisset
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <br>
                                    <div class="field" align="left">
                                        <input type="file" style="display:none" id="upload-images" name="file_multiples[]" multiple="multiple"></input>
                                        <label for="choose-file" id="uploads" class="drop-areas">
                                            เพิ่มรูปภาพกลุ่มทั้งหมด +
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-9"></div>
                                <div class="col-md-12">
                                    <div id="thumbnails"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @dd($resultID['result'][0]->FA_FLOWER) --}}
                    <div class="col-lg-12"><b>ข้อมูลการขายดอกไม้</b></div>
                    <div class="col-lg-4">
                        <label style="margin-top: 10px"><b>ดอกไม้ที่ผลิต:</b></label><br>
                        <select id="single_f" class="js-example-basic-multiple" name="FA_FLOWER[]" style="width: 100%;margin-top: 5px" multiple="multiple" required>
                            @foreach ($result as $item)
                                <option value="{{ $item->F_NAME }}" @foreach ($resultID['result'][0]->FA_FLOWER as $value) @if($value == $item->F_NAME) selected @endif  @endforeach>{{ $item->F_NAME }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <div class="checkbox-list">
                            <label style="margin-top: 10px"><b>กลุ่มลูกค้า:</b></label>
                            @foreach(__FA_CUSTOMER_GROUP() as $key => $value)
                                <div class="row checkbox_margin">
                                    <label class="checkbox">
                                        <input type="checkbox" value="{{ $value }}" name="FA_CUSTOMER_GROUP[{{$key}}][0]" @foreach ($resultID['result'][0]->FA_CUSTOMER_GROUP as $item) @if(in_array($value, $item)) checked @endif @endforeach>
                                        <span></span>{{ $value }}
                                    </label>
                                    <input type="text" class="form-control specify" style="width: 20%" name="FA_CUSTOMER_GROUP[{{$key}}][1]" placeholder="ระบุ" value="{{ $resultID['result'][0]->FA_CUSTOMER_GROUP[$key][1] }}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="checkbox-list">
                            <label style="margin-top: 10px"><b>ปัญหาการปลูก:</b></label>
                            @foreach(__FA_PROBLEM_PLANT() as $key => $value)
                                <div class="row checkbox_margin">
                                    <label class="checkbox">
                                        <input type="checkbox" value="{{ $value }}" name="FA_PROBLEM_PLANT[{{$key}}][0]" @foreach ($resultID['result'][0]->FA_PROBLEM_PLANT as $item) @if(in_array($value, $item)) checked @endif @endforeach>
                                        <span></span>{{ $value }}
                                    </label>
                                    <input type="text" class="form-control specify" style="width: 20%;" name="FA_PROBLEM_PLANT[{{$key}}][1]" placeholder="ระบุ" value="{{ $resultID['result'][0]->FA_PROBLEM_PLANT[$key][1] }}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="checkbox-list">
                            <label style="margin-top: 10px"><b>รูปแบบการส่ง:</b></label>
                            @foreach(__FA_SEND() as $key => $value)
                                @if($value != 'อื่นๆ')
                                    <label class="checkbox">
                                        <input type="checkbox" value="{{ $value }}" name="FA_SEND[{{$key}}][0]" @foreach ($resultID['result'][0]->FA_SEND as $item) @if(in_array($value, $item)) checked @endif @endforeach>
                                        <span></span>{{ $value }}
                                    </label>
                                @else
                                    <div class="row checkbox_margin">
                                        <label class="checkbox">
                                            <input type="checkbox" value="{{ $value }}" name="FA_SEND[{{$key}}][0]" @foreach ($resultID['result'][0]->FA_SEND as $item) @if(in_array($value, $item)) checked @endif @endforeach>
                                            <span></span>{{ $value }}
                                        </label>
                                        <input type="text" class="form-control specify" style="width: 20%" name="FA_SEND[{{$key}}][1]" placeholder="ระบุ" value="{{ $resultID['result'][0]->FA_SEND[$key][1] }}"/>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-8"></div>
                    <div class="col-lg-12">
                        <label style="margin-top: 10px"><b>รูปแบบการขาย:</b></label>
                        <div class="checkbox-list">
                            @foreach(__FA_SELL() as $key => $value)
                                @if($value != 'อื่นๆ')
                                    <label class="checkbox">
                                        <input type="checkbox" value="{{ $value }}" name="FA_SELL[{{$key}}][0]" @foreach ($resultID['result'][0]->FA_SELL as $item) @if(in_array($value, $item)) checked @endif @endforeach>
                                        <span></span>{{ $value }}
                                    </label>
                                @else
                                    <div class="row checkbox_margin">
                                        <label class="checkbox">
                                            <input type="checkbox" value="{{ $value }}" name="FA_SELL[{{$key}}][0]" @foreach ($resultID['result'][0]->FA_SELL as $item) @if(in_array($value, $item)) checked @endif @endforeach>
                                            <span></span>{{ $value }}
                                        </label>
                                        <input type="text" class="form-control specify" style="width: 20%" name="FA_SELL[{{$key}}][1]" placeholder="ระบุ" value="{{ $resultID['result'][0]->FA_SELL[$key][1] }}"/>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"></div>
                    <div class="col-lg-5">
                        <label style="margin-top: 10px"><b>จำนวนแรงงานที่ใช้ในร้าน:</b></label>
                        <div class="radio-list">
                            @php $data = __FA_LABOR()  @endphp
                            @foreach ($data as $item)
                                <label class="radio">
                                    <input type="radio" value="{{$item}}" name="FA_LABOR" @if($resultID['result'][0]->FA_LABOR == $item) checked @endif>
                                    <span></span>{{$item}}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-primary mr-2">บันทึก</button>
                            <a href="{{ route('manage.edit.farme2',$resultID['result'][0]->id) }}" class="btn btn-secondary">ส่วนที่2</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
<script>
    function myFunction(data) {
        var myobj = document.getElementById(data);
        myobj.remove();
    }
</script>
<script>
    const chooseFile = document.getElementById("choose-file");
    const imgPreview = document.getElementById("img-preview");

    chooseFile.addEventListener("change", function () {
    getImgData();
    });

    function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function () {
            imgPreview.style.display = "block";
            imgPreview.innerHTML = 'รูปใหม่<img style="width: 100%;height: 80%; margin-top: 10px" src="' + this.result + '" />';
            });    
        }
    }
</script>

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>
<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('js/pages/crud/datatables/data-sources/html.js') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
<!-- upload file -->
<script src="{{ asset('js/upload_file/upload_file.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/upload_file/upload_file_multiples.js') }}" type="text/javascript"></script>
<!-- upload file -->
@endsection