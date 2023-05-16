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
                        <h3 class="card-label">ข้อมูลดอกไม้</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-download"></i>รายงาน</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav flex-column nav-hover">
                                    <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-print"></i>
                                            <span class="nav-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-copy"></i>
                                            <span class="nav-text">Copy</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-excel-o"></i>
                                            <span class="nav-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-text-o"></i>
                                            <span class="nav-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon la la-file-pdf-o"></i>
                                            <span class="nav-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <!--end::Dropdown-->
                        <!--begin::Button-->
                        <a href="{{ route('index.flower') }}" class="btn btn-primary font-weight-bolder"><i class="la la-eye"></i>ดอกไม้</a>
                        <!--end::Button-->
                    </div>
                </div>
                {{-- @dd($result) --}}
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 20%">เรื่อง</th>
                            <th scope="col" style="width: 80%">รายละเอียด</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th >ชื่อดอกไม้</th>
                            <td> @isset($result->F_NAME) {{ $result->F_NAME }} @endisset</td>
                          </tr>
                          <tr>
                            <th >ชื่อสามัญ</th>
                            <td> @isset($result->F_NAME) {{ $result->F_COMMON_NAME }} @endisset</td>
                          </tr>
                          <tr>
                            <th >ชื่อวิทยาศาสตร์</th>
                            <td> @isset($result->F_NAME) {{ $result->F_SCIENTIFIC_NAME }} @endisset</td>
                          </tr>
                          <tr>
                            <th >ชื่ออื่นๆ</th>
                            <td> @isset($result->F_NAME) {{ $result->F_OTHER_NAME }} @endisset</td>
                          </tr>
                          <tr>
                            <th >ประเภทดอกไม้</th>
                              @if($result->F_TYPE == '')
                                <td></td>
                              @endif
                              @if($result->F_TYPE == '1')
                                <td>ไม้ใบ</td>
                              @endif
                              @if($result->F_TYPE == '2')
                                <td>ไม้ดอก</td>
                              @endif
                          </tr>
                          <tr>
                            <th >ลักษณะโดยรวม</th>
                            <td> @isset($result->F_NAME) {{ $result->F_OVERALL_APPEARANCE }} @endisset</td>
                          </tr>
                          <tr>
                            <th >ลักษณะต้น</th>
                            <td> @isset($result->F_NAME) {{ $result->F_NATURE_TRUNK }} @endisset</td>
                          </tr>
                          <tr>
                            <th >ลักษณะใบ</th>
                            <td> @isset($result->F_NAME) {{ $result->F_NATURE_LEAF }} @endisset</td>
                          </tr>
                          <tr>
                            <th >ลักษณะดอก</th>
                            <td> @isset($result->F_NAME) {{ $result->F_NATURE_FLOWER }} @endisset</td>
                          </tr>
                          <tr>
                            <th >ข้อมูลทั่วไป</th>
                            <td> @isset($result->F_NAME) {{ $result->F_GENERAL_INFORMATION }} @endisset</td>
                          </tr>
                          <tr>
                            <th >การปลูกเลี้ยง</th>
                            <td> @isset($result->F_NAME) {{ $result->F_PLANT }} @endisset</td>
                          </tr>
                          <tr>
                            <th >การขยายพันธุ์</th>
                            <td> @isset($result->F_NAME) {{ $result->F_PROPAGATION }} @endisset</td>
                          </tr>
                          <tr>
                            <th >การใช้ประโยชน์</th>
                            <td> @isset($result->F_NAME) {{ $result->F_UTILIZATION }} @endisset</td>
                          </tr>
                          <tr>
                            <th >เวลาเพิ่ม</th>
                            <td> @isset($result->F_NAME) {{ $result->created_at }} @endisset</td>
                          </tr>
                          <tr>
                            <th >เวลาอัพเดต</th>
                            <td> @isset($result->F_NAME) {{ $result->updated_at }} @endisset</td>
                          </tr>
                          <tr>
                            <th >รูปปก</th>
                            <td>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="{{$result->file}}" alt="" style="width: 100%">
                                    </div>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <th >รูปทั้งหมด</th>
                            <td> 
                                <div class="row">
                                  @foreach ($result->file_multiple as $key => $value)
                                    <div class="col-lg-3">
                                        <img src="{{$value}}" alt="" style="width: 100%">
                                    </div>
                                  @endforeach
                                </div>
                            </td>
                          </tr>
                        </tbody>
                    </table>
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
    <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
  
   
    <script src="{{ asset('js/pages/crud/forms/widgets/select2.js') }}"></script>
@endsection