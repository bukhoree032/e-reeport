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

  <form action="{{ route('search_3k') }}" method="POST" enctype="multipart/form-data">  
      @csrf
      <div class="row">
          <div class="col-md-2">
              <label>จังหวัด</label>
              <select class="form-control" id="pro" name="pro">
                  <option value="" selected>-- เลือก --</option>
                  @foreach ($pro as $key => $value)
                      <option value="{{ $value->provinces }}">{{ $value->provinces }}</option>
                  @endforeach
              </select>
          </div>
          <div class="col-md-2">
            <label for="exampleInputEmail1">อำเภอ</label>
            <select class="form-control" id="aum" name="aum">
              <option value="" selected>-- เลือก --</option>
            </select>
          </div>
          <div class="col-md-2">
            <label></label>ค้นหาชื่อ-นามสกุล</label>
            <input type="text" class="form-control" name="search" placeholder="ค้นหาจากชื่อ-นามสกุล" />
          </div>
          <div class="col-md-1">
            <button style="margin-top: 28%;" class="btn btn-primary">ค้นหา</button>
          </div>
      </div>
  </form>
  <br>
<div class="card">
    <h5 class="card-header">ตำบล 300,000  ({{$countk300}} ตำบล)</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>ลำดับ</th>
            <th>ชิ้อ-นามสกุล</th>
            <th>เบอร์โทรศัพท์</th>
            <th>ตำบล</th>
            <th>อำเภอ</th>
            <th>จังหวัด</th>
            <th>จัดการ</th>
          </tr> 
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($k300 as $item =>$value)
            <tr>
                <td style="width: 10%">{{ $item +1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->tel }}</td>
                <td>{{ $value->districts }}</td>
                <td>{{ $value->amphures }}</td>
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
          @if(isset($item) && $item < 3)
            <tr>
              <td><i class="fa-lg text-primary me-3"></i></td>
              <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
              <td><i class="fa-lg text-primary me-3"></i></td>
              <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
              <td><i class="fa-lg text-primary me-3"></i></td>
              <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>


    {{-- แบ่งหน้า --}}
    {{-- @if($k300->currentPage() < 3)
      @php $start = 1; @endphp
      @php $end = 5 @endphp
      @if($k300->lastPage() < 5)
        @php $end = $k300->lastPage(); @endphp
      @endif
    @else
      @php $start = $k300->currentPage()-2; @endphp
      @php $end = $start+4 @endphp
      @if($k300->lastPage()-2 < $k300->currentPage())
        @php $start = $k300->currentPage()-2; @endphp
        @php $end = $k300->lastPage(); @endphp
      @endif
    @endif
  
  
    <div class="card">
      <ul class="pagination justify-content-end" style="padding-top: 11px; padding-right: 17px;">
      <li class="page-item prev">
        <a class="page-link" href="{{$k300->url(1)}}"><i class="tf-icon bx bx-chevrons-left"></i></a>
      </li>
      <li class="page-item prev">
        <a class="page-link" href="{{$k300->previousPageUrl()}}"><i class="tf-icon bx bx-chevron-left"></i></a>
      </li>
        @foreach($k300->getUrlRange($start, $end) as $key => $value)
          <li class="page-item @if($k300->currentPage() == $key) active @endif"><a class="page-link" href="{{$value}}">{{$key}}</a></li>
        @endforeach
      <li class="page-item next">
        <a class="page-link" href="{{$k300->nextPageUrl()}}"><i class="tf-icon bx bx-chevron-right"></i></a>
      </li>
      <li class="page-item next">
        <a class="page-link" href="{{$k300->url($k300->lastPage())}}"><i class="tf-icon bx bx-chevrons-right"></i></a>
      </li>
      </ul>
    </div> --}}
    {{-- แบ่งหน้า --}}
  
    
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  $('#pro').change(function(){
    var id = this.value;
    if(id != ''){
      $.ajax({
        url: "{{ route('pro') }}",
        method: "post",
        data: {
          id: id,
          "_token": "{{ csrf_token() }}",
        },
        success:function(data)
        {
          var layout = '<option value="" selected>-- เลือก --</option>';
          $.each(data,function(key,value){
            layout += '<option value='+value.name_th+'>'+value.name_th+'</option>';
          });
        $('#aum').html(layout);
      }
    })
    }
  });
</script>
@endsection
