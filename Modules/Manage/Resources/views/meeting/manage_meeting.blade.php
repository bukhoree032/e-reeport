@extends('layouts/contentNavbarLayout')

@section('title', 'Evalocal')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">ข้อมูลการประชุม </span>
</h4>
<div class="card-toolbar">
    <!--begin::Button-->
    @isset($activity)
      @if($activity == 'y')
        <a href="{{ route('manage.create.meeting') }}" class="btn btn-primary font-weight-bolder">
        <i class="la la-plus"></i>เพิ่ม</a>
      @else
        <a href="#" class="btn btn-danger font-weight-bolder" style="cursor: not-allowed;">
        <i class="la la-plus"></i>กรุณาเพิ่มกิจกรรมก่อน</a>
      @endif
    @endisset
    <!--end::Button-->
</div>
<br>
<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">ข้อมูลการประชุม  ({{$count}} การประชุม)</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ลำดับ</th>
          <th>ตำบล</th>
          <th>ครั้งที่</th>
          {{-- <th>lat/สถานที่</th> --}}
          <th>ว/ด/ป</th>
          <th>สถานที่</th>
          <th>เวลาแก้ไข</th>
          <th>จัดการ</th>
        </tr> 
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($result as $item =>$value)
          <tr>
            @isset($result->onEachSide)
              <td>{{ $result->firstItem() + $item }}</td>
            @else
              <td>{{ $item+1 }}</td>
            @endisset
              <td>{{ $value->district }}</td>
              <td>{{ $value->round }}</td>
              <td>{{ $value->meeting_date }}</td>
              <td>{{ $value->location }}</td>
              <td>{{ $value->updated_at }}</td>
              <td>
                  {{-- <a class="fas fa-eye pointer" href="{{ route('manage.page.detail_meeting',$value->id) }}"></a>
                  <a class="fas fa-edit pointer" href="{{ route('manage.edit.meeting',$value->id) }}" style="margin-left: 15px" ></a>
                  <a onclick="return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่ ?')" class="far fa-trash-alt pointer" href="{{ route('manage.delet.meeting',$value->id) }}" style="margin-left: 15px"></a> --}}
              
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a target="_blank" class="dropdown-item" href="{{ route('manage.page.detail_meeting',$value->id) }}"><i class="bx bx-eye me-2"></i> รายละเอียด</a>
                      @isset($activity)
                        @if($activity == 'y')
                          <a class="dropdown-item" href="{{ route('manage.edit.meeting',$value->id) }}"><i class="bx bx-edit-alt me-2"></i> แก้ไข</a>
                        @else
                          <a class="dropdown-item" style="cursor: not-allowed;" href="#"><i class="bx bx-edit-alt me-2"></i> กรุณาเพิ่มกิจกรรม</a>
                        @endif
                      @endisset
                      <a onclick="return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่ ?')" class="dropdown-item" href="{{ route('manage.delet.meeting',$value->id) }}"><i class="bx bx-trash me-2"></i> ลบ</a>
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
@isset($result->onEachSide)
  {{-- $paginator->lastPage() หน้าสุดท้าย --}}
  {{-- $paginator->currentPage() หน้าปัจจุบัน --}}
  @if($result->currentPage() < 3)
    @php $start = 1; @endphp
    @php $end = 5 @endphp
    @if($result->lastPage() < 5)
      @php $end = $result->lastPage(); @endphp
    @endif
  @else
  {{-- @dd($result->lastPage()) --}}
    @php $start = $result->currentPage()-2; @endphp
    @php $end = $start+4 @endphp
    @if($result->lastPage()-2 < $result->currentPage())
      @php $start = $result->currentPage()-2; @endphp
      @php $end = $result->lastPage(); @endphp
    @endif
  @endif
  <div class="card">
    <ul class="pagination justify-content-end" style="padding-top: 11px; padding-right: 17px;">
      <li class="page-item prev">
        <a class="page-link" href="{{$result->url(1)}}"><i class="tf-icon bx bx-chevrons-left"></i></a>
      </li>
      <li class="page-item prev">
        <a class="page-link" href="{{$result->previousPageUrl()}}"><i class="tf-icon bx bx-chevron-left"></i></a>
      </li>
      @foreach($result->getUrlRange($start, $end) as $key => $value)
        <li class="page-item @if($result->currentPage() == $key) active @endif"><a class="page-link" href="{{$value}}">{{$key}}</a></li>
      @endforeach
      <li class="page-item next">
        <a class="page-link" href="{{$result->nextPageUrl()}}"><i class="tf-icon bx bx-chevron-right"></i></a>
      </li>
      <li class="page-item next">
        <a class="page-link" href="{{$result->url($result->lastPage())}}"><i class="tf-icon bx bx-chevrons-right"></i></a>
      </li>
    </ul>
  </div>

@endisset
{{-- แบ่งหน้า --}}
  
</div>
<!--/ Basic Bootstrap Table -->

<hr class="my-5">

@endsection
