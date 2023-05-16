{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    {{-- @dd($result) --}}
    <div class="row">
        <div class="col-lg-6 col-xxl-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">แบบสอบถามร้านค้า</h3>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">
                            <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                            <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form action="{{ route('manage.insert.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- {{ method_field('PUT') }} --}}
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-12"><b>ข้อมูลเจ้าของร้าน</b></div>
                            <div class="col-lg-5">
                                <label style="margin-top: 10px"><b>ชื่อร้าน:</b></label>
                                <input type="text" class="form-control" name="S_NAME"/>
                            </div>
                            <div class="col-lg-7"></div>
                            <div class="col-lg-2">
                                <label style="margin-top: 10px"><b>คำนำหน้า:</b></label>
                                <select class="form-control" id="exampleSelect1" name="S_OWNER_PREFIX">
                                    <option value="">-- คำนำหน้า --</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <label style="margin-top: 10px"><b>ชื่อ-นามสกุลเจ้าของร้าน:</b></label>
                                <input type="text" class="form-control" name="S_OWNER_NAME">
                            </div>
                            <div class="col-lg-5">
                                <label style="margin-top: 10px"><b>เบอร์ติดต่อ:</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" name="S_PHONE">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label style="margin-top: 10px"><b>ที่อยู่เลขที่:</b></label>
                                <input type="text" class="form-control" name="S_NUMBER" />
                            </div>
                            <div class="col-lg-2">
                                <label style="margin-top: 10px"><b>หมู่:</b></label>
                                <input type="text" class="form-control"  name="S_VILLAGE"/>
                            </div>
                            {{-- @dd($resultDistricts) --}}
                            <div class="col-lg-8">
                                <label style="margin-top: 10px"><b>ตำบล/อำเภอ/จังหวัด:</b></label>
                                <span class="text-danger">*</span></label>
                                <select id="pro" class="js-example-basic-multiple" name="S_SUB_DISTRICT" style="width: 100%;" required>
                                    <option value="" selected>-- จังหวัด --</option>
                                    @foreach ($resultDistricts as $item => $value)
                                        <option value="{{ $value->id_districts }}">ตำบล{{ $value->name_districts }}  >>  อำเภอ{{ $value->name_amphures }}  >>  จังหวัด{{ $value->name_provinces }}  >> {{ $value->zip_code_districts }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-12"style="margin-top: 20px">
                                <label>ข้อมูลกลุ่ม:</label>
                                <textarea type="text" class="form-control" name="S_DETAIL" placeholder="ป้อนข้อมูลทั้วไปของร้าน" rows="3"></textarea>
                                <span class="form-text text-muted">กรุณาป้อนข้อมูลทั่วไป</span>
                            </div>

                            <div class="col-lg-4">
                                <label style="margin-top: 10px"><b>กรุณาป้อนพิกัด (ละติจูด):</b></label>
                                <input type="text" class="form-control"  name="S_LAT"/>
                            </div>
                            <div class="col-lg-4">
                                <label style="margin-top: 10px"><b>กรุณาป้อนพิกัด (ลองติจูด):</b></label>
                                <input type="text" class="form-control"  name="S_LONG"/>
                            </div>
                            
                            
                            <div class="col-lg-12" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label style="margin-top: 10px"><b>FACEBOOK :</b></label>
                                        <input type="text" class="form-control"  name="S_FACEBOOK">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label style="margin-top: 10px"><b>LINE :</b></label>
                                        <input type="text" class="form-control"  name="S_LINE">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label style="margin-top: 10px"><b>WEBSITE :</b></label>
                                        <input type="text" class="form-control"  name="S_WEBSITE">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12" style="margin-top: 20px">
                                <div class="field" align="left">
                                    <input type="file" style="display:none" id="upload-image" name="files" multiple="multiple"></input>
                                    <div id="upload" class="drop-area">
                                        อัปโหลดรูปหน้าปก +
                                    </div>
                                    <div id="thumbnail"></div>
                                </div>
                            </div>
                            <div class="col-lg-12" style="margin-top: 20px">
                                <div class="field" align="left">
                                    <input type="file" style="display:none" id="upload-images" name="file_multiples[]" multiple="multiple"></input>
                                    <div id="uploads" class="drop-areas">
                                        เพิ่มรูปภาพดอกไม้ทั้งหมด +
                                    </div>
                                    <div id="thumbnails"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Select2 CSS -->
                        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> --}}
                        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <div class="form-group row">
                            <div class="col-lg-12"><b>ข้อมูลการขายดอกไม้</b></div>
                            <div class="col-lg-6">
                                <label style="margin-top: 10px"><b>ดอกไม้ที่ขาย:</b></label><br>
                                <select id="single_f" class="js-example-basic-multiple" name="S_FLOWER[]" style="width: 100%;margin-top: 5px" multiple="multiple" required>
                                    @foreach ($result as $item)
                                    <option value="{{ $item->id }}">{{ $item->F_NAME }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label style="margin-top: 10px"><b>กลุ่มลูกค้า:</b></label>
                                <select id="single_c" class="js-example-basic-multiple" name="S_CUSTOMER_GROUP[]"  style="width: 100%" multiple="multiple">
                                    <option>ลูกค้ารายย่อย</option>
                                    <option>บุคคลทั่วไป</option>
                                    <option>โรงแรม</option>
                                    <option>สถาบันการศึกษา</option>
                                    <option>ร้านอาหาร</option>
                                    <option>บริษัท/ห้างร้าน</option>
                                    <option>หน่วยงานราชการ</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label style="margin-top: 10px"><b>แหล่งที่มาของดอกไม้:</b></label>
                                <div class="checkbox-list">
                                    <div class="radio-list">
                                        <label class="checkbox">
                                            <input type="checkbox" disabled="disabled" checked="checked" >
                                            <span></span>จังหวัด/อำเภอ
                                        </label>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <select id="single_pa" class="js-example-basic-multiple" name="S_SOURCE[1][PROVINCE]" style="width: 100%;" >
                                                    <option>-- จังหวัด --</option>
                                                    @foreach ($resultProvinces as $item => $value)
                                                        <option value="{{ $value->id }}">{{ $value->name_th }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <select id="single_da" class="js-example-basic-multiple" name="S_SOURCE[1][DISTRICT]" style="width: 100%;" >
                                                    <option>-- อำเภอ --</option>
                                                    @foreach ($resultAmphures as $item => $value)
                                                        <option value="{{ $value->id }}">{{ $value->name_th }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <label class="checkbox">
                                            <input type="checkbox" name="S_SOURCE[2]" value="ปากคลองตลาด">
                                            <span></span>ปากคลองตลาด
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="S_SOURCE[3]" value="มาเลเซีย">
                                            <span></span>มาเลเซีย
                                        </label>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <div id="boxesse">
                                                    <input type="text" class="form-control" name="S_SOURCE[4]" style="margin-top: 5px" placeholder="อื่น ๆ"/>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-2">
                                                <a class="btn btn-primary add-more-btn btn-sm" id="addbuttonse" style="margin-top: 5px">+</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label style="margin-top: 10px"><b>ทำเลที่ตั้งร้านมีผลต่อยอดขายหรือไม่:</b></label>
                                <div class="checkbox-list">
                                    <div class="radio-list">
                                        <label class="radio">
                                        <input type="radio" value="ไม่มี" name="S_LOCATION_AFFECT_SALE">
                                        <span></span>ไม่มี</label>
                                        <label class="radio">
                                        <input type="radio" value="มีน้อย" name="S_LOCATION_AFFECT_SALE">
                                        <span></span>มีน้อย</label>
                                        <label class="radio">
                                        <input type="radio" value="มีปานกลาง" name="S_LOCATION_AFFECT_SALE">
                                        <span></span>มีปานกลาง</label>
                                        <label class="radio">
                                        <input type="radio" value="มีมาก" name="S_LOCATION_AFFECT_SALE">
                                        <span></span>มีมาก</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label style="margin-top: 10px"><b>ภาวการณ์แข่งขันในปัจจุบัน:</b></label>
                                <div class="radio-list">
                                    <label class="radio">
                                    <input type="radio" value="ไม่มี" name="S_COMPETE">
                                    <span></span>ไม่มี</label>
                                    <label class="radio">
                                    <input type="radio" value="มีน้อย" name="S_COMPETE">
                                    <span></span>มีน้อย</label>
                                    <label class="radio">
                                    <input type="radio" value="มีปานกลาง" name="S_COMPETE">
                                    <span></span>มีปานกลาง</label>
                                    <label class="radio">
                                    <input type="radio" value="มีมาก" name="S_COMPETE">
                                    <span></span>มีมาก</label>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="radio-list">
                                    <label style="margin-top: 10px"><b>รูปแบบการส่ง:</b></label>
                                    <label class="radio">
                                    <input type="radio" value="รถยนต์" name="S_SEND">
                                    <span></span>รถยนต์</label>
                                    <label class="radio">
                                    <input type="radio" value="รถไฟ" name="S_SEND">
                                    <span></span>รถไฟ</label>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div id="boxess">
                                                <input type="text" class="form-control" name="S_SEND_OTHER[]" style="margin-top: 5px" placeholder="อื่น ๆ"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8"></div>
                            <div class="col-lg-12">
                                <label style="margin-top: 10px"><b>รูปแบบการขาย:</b></label>
                                <div class="radio-list">
                                    <label class="radio">
                                    <input type="radio" value="ขายหน้าร้านโดยตรง" name="S_SELL">
                                    <span></span>ขายหน้าร้านโดยตรง</label>
                                    <label class="radio">
                                    <input type="radio" value="ลูกค้าโทรศัพท์สั่งซื้อ" name="S_SELL">
                                    <span></span>ลูกค้าโทรศัพท์สั่งซื้อ</label>
                                    <label class="radio">
                                    <input type="radio" value="ขายออนไลน์ เพจร้าน" name="S_SELL">
                                    <span></span>ขายออนไลน์ เพจร้าน</label>
                                    <label class="radio">
                                    <input type="radio" value="ทั้ง 3 วิธี" name="S_SELL">
                                    <span></span>ทั้ง 3 วิธี</label>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <label style="margin-top: 10px"><b>เงื่อนไขในการขายดอกไม้:</b></label>
                                <div class="radio-list">
                                    <label class="radio">
                                    <input type="radio" value="ขายเงินสด" name="S_CONDITION_SELL">
                                    <span></span>ขายเงินสด</label>
                                    <label class="radio">
                                    <input type="radio" value="ขายเงินเชื่อ" name="S_CONDITION_SELL">
                                    <span></span>ขายเงินเชื่อ</label>
                                    <label class="radio">
                                    <input type="radio" value="ทั้งขายเงินสดและขายเงินเชื่อ" name="S_CONDITION_SELL">
                                    <span></span>ทั้งขายเงินสดและขายเงินเชื่อ</label>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div id="boxesc">
                                                <input type="text" class="form-control" name="S_CONDITION_SELL_OTHER[]" style="margin-top: 5px" placeholder="อื่น ๆ"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7"></div>
                            <div class="col-lg-5">
                                <label style="margin-top: 10px"><b>วิธีการจ่ายเงินของลูกค้า:</b></label>
                                <div class="radio-list">
                                    <label class="radio">
                                    <input type="radio" value="ขายเงินสด" name="S_CUSTOMER_PAYS">
                                    <span></span>ขายเงินสด</label>
                                    <label class="radio">
                                    <input type="radio" value="ขายเงินเชื่อ" name="S_CUSTOMER_PAYS">
                                    <span></span>ขายเงินเชื่อ</label>
                                    <label class="radio">
                                    <input type="radio" value="ทั้งขายเงินสดและขายเงินเชื่อ" name="S_CUSTOMER_PAYS">
                                    <span></span>ทั้งขายเงินสดและขายเงินเชื่อ</label>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div id="boxesp">
                                                <input type="text" class="form-control" name="S_CUSTOMER_PAYS_OTHER[]" style="margin-top: 5px" placeholder="อื่น ๆ"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7"></div>
                            <div class="col-lg-5">
                                <label style="margin-top: 10px"><b>การส่งเสริมการขาย(โปรโมชัน):</b></label>
                                <div class="radio-list">
                                    <label class="radio">
                                    <input type="radio" value="ไม่มี" name="S_PROMOTION">
                                    <span></span>ไม่มี</label>
                                    <label class="radio">
                                    <input type="radio" value="มีการให้ส่วนลด" name="S_PROMOTION">
                                    <span></span>มีการให้ส่วนลด</label>
                                    <label class="radio">
                                    <input type="radio" value="มีการแถม" name="S_PROMOTION">
                                    <span></span>มีการแถม</label>
                                    <label class="radio">
                                    <input type="radio" value="Social Media" name="S_PROMOTION">
                                    <span></span>Social Media</label>
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div id="boxespr">
                                                <input type="text" class="form-control" name="S_PROMOTION_OTHER[]" style="margin-top: 5px" placeholder="อื่น ๆ"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7"></div>
                            <div class="col-lg-5">
                                <label style="margin-top: 10px"><b>จำนวนแรงงานที่ใช้ในร้าน:</b></label>
                                <div class="radio-list">
                                    <label class="radio">
                                    <input type="radio" value="1-3 คน" name="S_LABOR">
                                    <span></span>1-3 คน</label>
                                    <label class="radio">
                                    <input type="radio" value="4-6 คน" name="S_LABOR">
                                    <span></span>4-6 คน</label>
                                    <label class="radio">
                                    <input type="radio" value="7 คนขึ้นไป" name="S_LABOR">
                                    <span></span>7 คนขึ้นไป</label>
                                </div>
                            </div>
                            <div class="col-lg-7"></div>
                        </div>
                       
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
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

{{-- Scripts Section --}}
@section('scripts')

<script>
    let addbutton = document.getElementById("addbutton");
    addbutton.addEventListener("click", function() {
    let boxes = document.getElementById("boxes");
    let clone = boxes.firstElementChild.cloneNode(true);
    boxes.appendChild(clone);
    });

    let addbuttong = document.getElementById("addbuttong");
    addbuttong.addEventListener("click", function() {
    let boxes = document.getElementById("boxesg");
    let clone = boxes.firstElementChild.cloneNode(true);
    boxes.appendChild(clone);
    });

    let addbuttonse = document.getElementById("addbuttonse");
    addbuttonse.addEventListener("click", function() {
    let boxes = document.getElementById("boxesse");
    let clone = boxes.firstElementChild.cloneNode(true);
    boxes.appendChild(clone);
    });

    let addbuttons = document.getElementById("addbuttons");
    addbuttons.addEventListener("click", function() {
    let boxes = document.getElementById("boxess");
    let clone = boxes.firstElementChild.cloneNode(true);
    boxes.appendChild(clone);
    });

    let addbuttonc = document.getElementById("addbuttonc");
    addbuttonc.addEventListener("click", function() {
    let boxes = document.getElementById("boxesc");
    let clone = boxes.firstElementChild.cloneNode(true);
    boxes.appendChild(clone);
    });

    let addbuttonp = document.getElementById("addbuttonp");
    addbuttonp.addEventListener("click", function() {
    let boxes = document.getElementById("boxesp");
    let clone = boxes.firstElementChild.cloneNode(true);
    boxes.appendChild(clone);
    });

    let addbuttonpr = document.getElementById("addbuttonpr");
    addbuttonpr.addEventListener("click", function() {
    let boxes = document.getElementById("boxespr");
    let clone = boxes.firstElementChild.cloneNode(true);
    boxes.appendChild(clone);
    });
</script>
<script>
    var imgUpload = document.getElementById('upload_imgs')
    , imgPreview = document.getElementById('img_preview')
    , imgUploadForm = document.getElementById('img-upload-form')
    , totalFiles
    , previewTitle
    , previewTitleText
    , img;

    imgUpload.addEventListener('change', previewImgs, false);
    imgUploadForm.addEventListener('submit', function (e) {
    e.preventDefault();
    alert('Images Uploaded! (not really, but it would if this was on your website)');
    }, false);

    function previewImgs(event) {
    totalFiles = imgUpload.files.length;
    
    if(!!totalFiles) {
        imgPreview.classList.remove('quote-imgs-thumbs--hidden');
        previewTitle = document.createElement('p');
        previewTitle.style.fontWeight = 'bold';
        previewTitleText = document.createTextNode(totalFiles + ' Total Images Selected');
        previewTitle.appendChild(previewTitleText);
        imgPreview.appendChild(previewTitle);
    }
    
    for(var i = 0; i < totalFiles; i++) {
        img = document.createElement('img');
        img.src = URL.createObjectURL(event.target.files[i]);
        img.classList.add('img-preview-thumb');
        imgPreview.appendChild(img);
    }
    }
</script>
<script>
            const readURL = (input) => {
    if (input.files && input.files[0]) {
        const reader = new FileReader()
        reader.onload = (e) => {
        $('#preview').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0])
    }
    }
    $('.choose').on('change', function() {
        readURL(this)
    let i
    if ($(this).val().lastIndexOf('\\')) {
        i = $(this).val().lastIndexOf('\\') + 1
    } else {
        i = $(this).val().lastIndexOf('/') + 1
    }
    const fileName = $(this).val().slice(i)
    $('.label').text(fileName)
    })
</script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    {{-- <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('js/datatable/sc_datatable.js') }}" type="text/javascript"></script> --}}
    
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
    {{-- <script src="{{ asset('js/pages/crud/forms/widgets/select.js') }}" type="text/javascript"></script> --}}
    
    <!-- upload file -->
    <script src="{{ asset('js/upload_file/upload_file.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/upload_file/upload_file_multiples.js') }}" type="text/javascript"></script>
    <!-- upload file -->
@endsection
