{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="row">
        <div class="col-lg-6 col-xxl-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h2 class="card-title">เพิ่มข้อมูลดอกไม้</h2>
                </div>
                <!--begin::Form-->
                <form action="{{ route('manage.insert.flower') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>ชื่อดอกไม้ :</label>
                                <input name="F_NAME" name="F_" type="text"  class="form-control" placeholder="ใส่ชื่อดอกไม้" />
                                <span class="form-text text-muted">กรุณาใส่ชื่อของดอกไม้</span>
                            </div>
                            <div class="col-lg-4">
                                <label>ชื่อสามัญ :</label>
                                <input name="F_COMMON_NAME" type="text" class="form-control" placeholder="ใส่ชื่อสามัญ" />
                                <span class="form-text text-muted">กรุณาใส่ชื่อสามัญของดอกไม้</span>
                            </div>
                            <div class="col-lg-4">
                                <label>ชื่อวิทยาศาสตร์ :</label>
                                <input name="F_SCIENTIFIC_NAME" type="text" class="form-control" placeholder="ใส่ชื่อวิทยาศาสตร์" />
                                <span class="form-text text-muted">กรุณาใส่ชื่อทางวิทยาศาสตร์ของดอกไม้</span>
                            </div>
                            <div class="col-lg-4">
                                <label>ชื่ออื่นๆ :</label>
                                <input name="F_OTHER_NAME" type="text" class="form-control" placeholder="ใส่ชื่อดอกไม้" />
                                <span class="form-text text-muted">กรุณาใส่ชื่อของดอกไม้</span>
                            </div>
                            <div class="col-lg-4">
                                <label>ประเภทดอกไม้:</label>
                                <select class="form-control" name="F_TYPE">
                                    <option value="" >-- เลือก --</option>
                                    <option value="ไม้ใบ">ไม้ใบ</option>
                                    <option value="ไม้ดอก">ไม้ดอก</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>ลักษณะโดยรวม:</label>
                                <textarea name="F_OVERALL_APPEARANCE" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label>ลักษณะต้น:</label>
                                <textarea name="F_NATURE_TRUNK" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>ลักษณะใบ:</label>
                                <textarea name="F_NATURE_LEAF" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label>ลักษณะดอก:</label>
                                <textarea name="F_NATURE_FLOWER" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label>ข้อมูลทั่วไป:</label>
                                <textarea name="F_GENERAL_INFORMATION" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label>การปลูกเลี้ยง:</label>
                                <textarea name="F_PLANT" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>การขยายพันธุ์:</label>
                                <textarea name="F_PROPAGATION" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label>การใช้ประโยชน์:</label>
                                <textarea name="F_UTILIZATION" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-lg-12" style="margin-top: 20px">
                                <div class="field" align="left">
                                    <input type="file" style="display:none" id="upload-image" name="files"></input>
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
<script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/datatable/sc_datatable.js') }}" type="text/javascript"></script>

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

<script src="{{ asset('js/upload_file/upload_file.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/upload_file/upload_file_multiples.js') }}" type="text/javascript"></script>

@endsection