{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row">
        <div class="col-lg-6 col-xxl-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-favourite text-primary"></i>
                        </span>
                        <h3 class="card-label">ข้อมูลดอกกลุ่มเกษตรกร และฟาร์ม</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('manage.create.farme') }}" class="btn btn-primary font-weight-bolder">
                        <i class="la la-plus"></i>เพิ่มกลุ่ม</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    {{-- @dd($result) --}}
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อกลุ่ม</th>
                                {{-- <th>ชื่อ-นามสกุล</th> --}}
                                <th>ที่อยู่</th>
                                {{-- <th>lat/long</th> --}}
                                <th>เวลาเพิ่ม</th>
                                <th>เวลาแก้ไข</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $item =>$value)
                            <tr>
                                <td>{{ $item+1 }}</td>
                                <td>{{ $value->FA_GROUPNAME }}</td>
                                {{-- <td>{{ $value->FA_NAME }}</td> --}}
                                {{-- <td>{{ $value->FA_HOUSENUMBER }} ม.{{ $value->FA_MOO }} ต.{{ $value->FA_SUB_DISTRICT[0]->name_districts }} อ.{{ $value->FA_SUB_DISTRICT[0]->name_amphures }} จ.{{ $value->FA_SUB_DISTRICT[0]->name_provinces }}</td> --}}
                                <td>ต.{{ $value->FA_SUB_DISTRICT[0]->name_districts }} อ.{{ $value->FA_SUB_DISTRICT[0]->name_amphures }} จ.{{ $value->FA_SUB_DISTRICT[0]->name_provinces }}</td>
                                {{-- <td>{{ $value->FA_LAT }},{{ $value->FA_LONG }}</td> --}}
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->updated_at }}</td>
                                <td>
                                    <a class="fas fa-eye pointer" href="{{ route('manage.page.detail_farme',$value->id_db) }}"></a>
                                    <a class="fas fa-edit pointer" href="{{ route('manage.edit.farme1',$value->id_db) }}" style="margin-left: 15px" ></a>
                                    <a onclick="return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่ ?')" class="far fa-trash-alt pointer" href="{{ route('manage.delet.farme',$value->id_db) }}" style="margin-left: 15px"></a>
                                </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
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
@endsection