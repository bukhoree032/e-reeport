@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')


<div class="col-lg-12 col-md-12 order-0">
  <div class="row">
    @foreach($pro as $key => $value)
      <div class="col-lg-3 col-md-12 col-6 mb-3">
        <div class="card">
          <div class="card-body button-color-cursor">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="dropdown">
              </div>
            </div>
            <span class="fw-semibold d-block mb-1"><h4>จังหวัด {{$value->provinces}}</h4></span>
            <b class="card-title mb-2">{{$value->aum}} อำเภอ</b>
            <b class="card-title mb-2">{{$value->dis}} ตำบล</b>
            
            {{-- <b class="card-title mb-2" style="cursor: pointer;" onclick="document.location='{{ route('admin.index.report') }}'">{{$value->aum}} อำเภอ</b>
            <b class="card-title mb-2" style="cursor: pointer;" onclick="document.location='{{ route('admin.index.report') }}'">{{$value->dis}} ตำบล</b> --}}
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>


<div class="card">
    <h5 class="card-header">ตำบล 1,000,000  ({{$countm1}} ตำบล)</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>ลำดับ</th>
            <th>ชิ้อ-นามสกุล</th>
            <th>เบอร์โทรศัพท์</th>
            <th>ตำบล</th>
            <th>จังหวัด</th>
            <th>จัดการ</th>
          </tr> 
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($m1 as $item =>$value)
            <tr>
              <td style="width: 10%">{{ $m1->firstItem() + $item }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->tel }}</td>
                <td>{{ $value->districts }}</td>
                <td>{{ $value->provinces }}</td>
                <td>
                  <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                  <div class="dropdown-menu">
                      {{-- <a class="dropdown-item" href="{{ route('manage.edit.activity',$value->id) }}"><i class="bx bx-edit-alt me-2"></i> แก้ไข</a> --}}
                      <a class="dropdown-item" href="{{ route('auth.reset.password',$value->id) }}"><i class="bx bx-edit-alt me-2"></i> แก้ไขรหัสผ่าน</a>
                      {{-- <a onclick="return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่ ?')" class="dropdown-item" href="{{ route('manage.delet.activity',$value->id) }}"><i class="bx bx-trash me-2"></i> ลบ</a> --}}
                                  
                  </div>
                  </div>
              </td>
            </tr>    
          @endforeach
        </tbody>
      </table>
    </div>


    {{-- แบ่งหน้า --}}
    @if($m1->currentPage() < 3)
      @php $start = 1; @endphp
      @php $end = 5 @endphp
      @if($m1->lastPage() < 5)
        @php $end = $m1->lastPage(); @endphp
      @endif
    @else
      @php $start = $m1->currentPage()-2; @endphp
      @php $end = $start+4 @endphp
      @if($m1->lastPage()-2 < $m1->currentPage())
        @php $start = $m1->currentPage()-2; @endphp
        @php $end = $m1->lastPage(); @endphp
      @endif
    @endif
  
  
    <div class="card">
      <ul class="pagination justify-content-end" style="padding-top: 11px; padding-right: 17px;">
      <li class="page-item prev">
        <a class="page-link" href="{{$m1->url(1)}}"><i class="tf-icon bx bx-chevrons-left"></i></a>
      </li>
      <li class="page-item prev">
        <a class="page-link" href="{{$m1->previousPageUrl()}}"><i class="tf-icon bx bx-chevron-left"></i></a>
      </li>
        @foreach($m1->getUrlRange($start, $end) as $key => $value)
          <li class="page-item @if($m1->currentPage() == $key) active @endif"><a class="page-link" href="{{$value}}">{{$key}}</a></li>
        @endforeach
      <li class="page-item next">
        <a class="page-link" href="{{$m1->nextPageUrl()}}"><i class="tf-icon bx bx-chevron-right"></i></a>
      </li>
      <li class="page-item next">
        <a class="page-link" href="{{$m1->url($m1->lastPage())}}"><i class="tf-icon bx bx-chevrons-right"></i></a>
      </li>
      </ul>
    </div>
    {{-- แบ่งหน้า --}}
  
    
  </div>
@endsection
