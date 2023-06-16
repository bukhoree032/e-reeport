@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">ข้อมูลกิจกรรม</span>
</h4>
<div class="card-toolbar">
    <!--begin::Button-->
    @if(Auth::user()->status != 5)
      <a href="{{ route('manage.create.activity') }}" class="btn btn-primary font-weight-bolder">
      <i class="la la-plus"></i>เพิ่มกิจกรรม</a>
    @endif
    <!--end::Button-->
</div>
<br>
<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">กิจกรรมทั้งหมด ({{$count}} กิจกรรม)</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อกิจกรรม</th>
            <th>จำนวนครัวเรือน</th>
            <th>งบประมาณ</th>
            <th>ละติจูด</th>
            <th>เวลาแก้ไข</th>
            <th>จัดการ</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($result as $item =>$value)
          <tr>
            <td>{{ $result->firstItem() + $item }}</td>
            <td>{{ $value->name}}</td>
            <td>{{ $value->numberpeople}}</td>
            <td>{{ $value->budget}}</td>
            <td>{{ $value->lat }},{{ $value->log }}</td>
            <td>{{ $value->updated_at }}</td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('manage.edit.activity',$value->id) }}"><i class="bx bx-edit-alt me-2"></i> แก้ไข</a>
                    <a onclick="return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่ ?')" class="dropdown-item" href="{{ route('manage.delet.activity',$value->id) }}"><i class="bx bx-trash me-2"></i> ลบ</a>
                                
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
  @if($result->currentPage() < 3)
    @php $start = 1; @endphp
    @php $end = 5; @endphp
  @else
    @php $start = $result->currentPage()-2; @endphp
    @php $end = $start+4 @endphp
    @if($result->lastPage()-2 < $result->currentPage())
      @php $start = $result->currentPage()-2; @endphp
      @php $end = $result->lastPage(); @endphp
    @endif
  @endif


  <div class="card">
    <ul class="pagination" style="margin-left: 25px;margin-top: 15px;">
      <li class="page-item">
        <a class="page-link" href="{{$result->previousPageUrl()}}"><b><</b></a>
      </li>
      @foreach($result->getUrlRange($start, $end) as $key => $value)
        <li class="page-item @if($result->currentPage() == $key) active @endif"><a class="page-link" href="{{$value}}">{{$key}}</a></li>
      @endforeach
      <li class="page-item">
        <a class="page-link" href="{{$result->nextPageUrl()}}"><b>></b></a>
      </li>
    </ul>
  </div>
  {{-- แบ่งหน้า --}}

  
</div>
<!--/ Basic Bootstrap Table -->

<hr class="my-5">

@endsection
