@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">ข้อมูลการประชุม </span>
</h4>
<div class="card-toolbar">
    <!--begin::Button-->
    @if($activity == 'y')
      <a href="{{ route('manage.create.meeting') }}" class="btn btn-primary font-weight-bolder">
      <i class="la la-plus"></i>เพิ่ม</a>
    @else
      <a href="#" class="btn btn-danger font-weight-bolder" style="cursor: not-allowed;">
      <i class="la la-plus"></i>กรุณาเพิ่มกิจกรรมก่อน</a>
    @endif
    <!--end::Button-->
</div>
<br>
<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">ข้อมูลการประชุม</h5>
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
              <td>{{ $item+1 }}</td>
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
                      <a class="dropdown-item" href="{{ route('manage.page.detail_meeting',$value->id) }}"><i class="bx bx-eye me-2"></i> รายละเอียด</a>
                      <a class="dropdown-item" href="{{ route('manage.edit.meeting',$value->id) }}"><i class="bx bx-edit-alt me-2"></i> แก้ไข</a>
                      <a class="dropdown-item" href="{{ route('manage.delet.meeting',$value->id) }}"><i class="bx bx-trash me-2"></i> ลบ</a>
                    </div>
                  </div>
              </td>
          </tr>    
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->

<hr class="my-5">

@endsection
