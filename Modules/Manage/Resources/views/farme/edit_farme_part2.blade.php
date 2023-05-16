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
        }
    </style>
    <div class="row">
        <div class="col-lg-6 col-xxl-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">แบบสอบถามร้านค้าส่วนที่ 2</h3>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">
                            <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                            <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                        </div>
                    </div>
                </div>
                <form action="{{ route('manage.update.farme2',$resultID['result'][0]->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label style="margin-top: 10px"><b>ปริมาณการผลิต (ครั้ง/สัปดาห์/เดือน):</b></label>
                                <table class="table table-bordered table-hover table-checkable"  style="margin-top: 13px !important">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อดอกไม้</th>
                                            <th>ต่อครั้ง</th>
                                            <th>ต่อสัปดาห์</th>
                                            <th>ต่อเดือน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($resultID['resultflower'] as $item => $value)
                                        <tr>
                                            <td>{{ $item+1 }}</td>
                                            <td>{{ $value[0]->F_NAME }}</td>
                                            <td>
                                                <input type="text" name="FA_REMAINING[{{ $value[0]->id }}][PER_TIME][QUANTITY]" value="{{ $resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_TIME']['QUANTITY'] ?? null }}">
                                                <select name="FA_REMAINING[{{ $value[0]->id }}][PER_TIME][UNIT]" id="cars">
                                                    @if(!isset($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_TIME']['UNIT']))
                                                        @php $resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_TIME']['UNIT'] = '' @endphp
                                                    @endif
                                                    {{-- @dd($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_TIME']['UNIT']) --}}
                                                    <option value="">-- หน่วย --</option>
                                                    <option value="ช่อ" @if ($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_TIME']['UNIT'] == "ช่อ") selected  @endif>ช่อ</option>
                                                    <option value="ดอก" @if ($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_TIME']['UNIT'] == "ดอก") selected  @endif>ดอก</option>
                                                    <option value="กิโล" @if ($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_TIME']['UNIT'] == "กิโล") selected  @endif>กิโล</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="FA_REMAINING[{{ $value[0]->id }}][PER_WEEK][QUANTITY]" value="{{ $resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_WEEK']['QUANTITY'] ?? null }}">
                                                <select name="FA_REMAINING[{{ $value[0]->id }}][PER_WEEK][UNIT]" id="cars">
                                                    @if(!isset($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_TIME']['UNIT']))
                                                        @php $resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_WEEK']['UNIT'] = '' @endphp
                                                    @endif
                                                    <option value="">-- หน่วย --</option>
                                                    <option value="ช่อ" @if ($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_WEEK']['UNIT'] == "ช่อ") selected  @endif>ช่อ</option>
                                                    <option value="ดอก" @if ($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_WEEK']['UNIT'] == "ดอก") selected  @endif>ดอก</option>
                                                    <option value="กิโล" @if ($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_WEEK']['UNIT'] == "กิโล") selected  @endif>กิโล</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="FA_REMAINING[{{$value[0]->id}}][PER_MONTH][QUANTITY]" value="{{ $resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_MONTH']['QUANTITY'] ?? null }}">
                                                <select name="FA_REMAINING[{{ $value[0]->id }}][PER_MONTH][UNIT]" id="cars">
                                                    @if(!isset($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_TIME']['UNIT']))
                                                        @php $resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_MONTH']['UNIT'] = '' @endphp
                                                    @endif
                                                    <option value="">-- หน่วย --</option>
                                                    <option value="ช่อ" @if ($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_MONTH']['UNIT'] == "ช่อ") selected  @endif>ช่อ</option>
                                                    <option value="ดอก" @if ($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_MONTH']['UNIT'] == "ดอก") selected  @endif>ดอก</option>
                                                    <option value="กิโล" @if ($resultID['result'][0]->FA_REMAINING[$value[0]->id]['PER_MONTH']['UNIT'] == "กิโล") selected  @endif>กิโล</option>
                                                </select>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <label style="margin-top: 10px"><b>วิธีการตั้งราคา ในการขายโดยเฉลี่ย:</b></label>
                                <table class="table table-bordered table-hover table-checkable"  style="margin-top: 13px !important">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อดอกไม้</th>
                                            <th>ดอก</th>
                                            <th>ช่อ</th>
                                            <th>กิโล</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($resultID['resultflower'] as $item => $value)
                                            {{-- @dd($resultID['result'][0]->FA_SET_PRICE) --}}
                                            <tr>
                                                <td>{{ $item+1 }}</td>
                                                <td>{{ $resultID['resultflower'][$item][0]->F_NAME }}</td>
                                                <td>
                                                    <input type="text" name="FA_SET_PRICE[{{$value[0]->id}}][FLOWER]" value="{{ $resultID['result'][0]->FA_SET_PRICE[$value[0]->id]['FLOWER'] ?? null}}"> บาท
                                                </td>
                                                <td>
                                                    <input type="text" name="FA_SET_PRICE[{{$value[0]->id}}][BOUQUET]" value="{{ $resultID['result'][0]->FA_SET_PRICE[$value[0]->id]['BOUQUET'] ?? null}}"> บาท
                                                </td>
                                                <td>
                                                    <input type="text" name="FA_SET_PRICE[{{$value[0]->id}}][KILO]" value="{{ $resultID['result'][0]->FA_SET_PRICE[$value[0]->id]['KILO'] ?? null}}"> บาท
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkbox-list">
                                    <label style="margin-top: 10px"><b>สาเหตุที่ทำให้คงเหลือใช้การไม่ได้ คือ:</b></label>
                                    @foreach(__FA_REMAINING_CAUSE() as $key => $value)
                                        @if($value != 'อื่นๆ')
                                            <label class="checkbox">
                                                <input type="checkbox" value="{{ $value }}" name="FA_REMAINING_CAUSE[{{$key}}][0]" @foreach ($resultID['result'][0]->FA_REMAINING_CAUSE as $item) @if(in_array($value, $item)) checked @endif @endforeach>
                                                <span></span>{{ $value }}
                                            </label>
                                        @else
                                            <div class="row checkbox_margin">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="{{ $value }}" name="FA_REMAINING_CAUSE[{{$key}}][0]" @foreach ($resultID['result'][0]->FA_REMAINING_CAUSE as $item) @if(in_array($value, $item)) checked @endif @endforeach>
                                                    <span></span>{{ $value }}
                                                </label>
                                                <input type="text" class="form-control specify" style="width: 20%" name="FA_REMAINING_CAUSE[{{$key}}][1]" placeholder="ระบุ" value="{{$resultID['result'][0]->FA_REMAINING_CAUSE[$key][1] ?? null}}"/>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label style="margin-top: 10px"><b>ข้อจำกัด/ปัญหา:</b></label>
                                <table class="table table-bordered table-hover table-checkable"  style="margin-top: 13px !important">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อดอกไม้</th>
                                            <th>ข้อจำกัด/ปัญหา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>ดอกไม้</td>
                                            <td>
                                                <textarea name="FA_PROBLEM[FLOWER]" class="form-control" id="" cols="30" rows="3">{{ $resultID['result'][0]->FA_PROBLEM['FLOWER'] ?? null}}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>ไม้ใบ</td>
                                            <td>
                                                <textarea name="FA_PROBLEM[FOLIAGE_PLANT]" class="form-control" id="" cols="30" rows="3">{{ $resultID['result'][0]->FA_PROBLEM['FOLIAGE_PLANT']  ?? null}}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>การจำหน่าย</td>
                                            <td>
                                                <textarea name="FA_PROBLEM[SELL]" class="form-control" id="" cols="30" rows="3">{{ $resultID['result'][0]->FA_PROBLEM['SELL']  ?? null}}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>ราคา</td>
                                            <td>
                                                <textarea name="FA_PROBLEM[PRICE]" class="form-control" id="" cols="30" rows="3">{{ $resultID['result'][0]->FA_PROBLEM['PRICE']  ?? null}}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>ลูกค้า</td>
                                            <td>
                                                <textarea name="FA_PROBLEM[CUSTOMER]" class="form-control" id="" cols="30" rows="3">{{ $resultID['result'][0]->FA_PROBLEM['CUSTOMER']  ?? null}}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>อื่น</td>
                                            <td>
                                                <textarea name="FA_PROBLEM[OTHER]" class="form-control" id="" cols="30" rows="3">{{ $resultID['result'][0]->FA_PROBLEM['OTHER']  ?? null}}</textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Select2 CSS -->
                        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> --}}
                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary mr-2">บันทึก</button>
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
@endsection
