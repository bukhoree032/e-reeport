@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">ข้อมูลรายงานการประชุม</span>
</h4>
<div class="card-toolbar">
    <!--begin::Button-->
    <a href="{{ route('manage.create.report') }}" class="btn btn-primary font-weight-bolder">
    <i class="la la-plus"></i>เพิ่ม</a>
    <!--end::Button-->
</div>
<br>
<!-- Basic Bootstrap Table -->
<div class="card">
  <h5 class="card-header">ข้อมูลรายงานการประชุม</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
            <th>ลำดับ</th>
            <th>รายงานประจำเดือน</th>
            <th>ครั้งที่</th>
            <th>ตำบล</th>
            <th>อำเภอ</th>
            <th>จังหวัด</th>
            <th>เวลาแก้ไข</th>
            <th>จัดการ</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($result as $item =>$value)
          <tr><td>{{ $item+1 }}</td>
            <td>{{ $value->month }}/{{ $value->year }}</td>
            <td>{{ $value->round }}/{{ $value->year_round }}</td>
            <td>{{ $value->district }}</td>
            <td>{{ $value->amphur }}</td>
            <td>{{ $value->province }}</td>
            <td>{{ $value->updated_at }}</td>
            <td>
                {{-- <a class="fas fa-eye pointer" href="{{ route('manage.page.detail_meeting',$value->id) }}"></a>
                <a class="fas fa-edit pointer" href="{{ route('manage.edit.meeting',$value->id) }}" style="margin-left: 15px" ></a>
                <a onclick="return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่ ?')" class="far fa-trash-alt pointer" href="{{ route('manage.delet.meeting',$value->id) }}" style="margin-left: 15px"></a> --}}
            
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('manage.page.detail_report',$value->id) }}"><i class="bx bx-eye me-2"></i> รายละเอียด</a>
                    <a class="dropdown-item" href="{{ route('manage.edit.report',$value->id) }}"><i class="bx bx-edit-alt me-2"></i> แก้ไข</a>
                    <a class="dropdown-item" href="{{ route('manage.delet.report',$value->id) }}"><i class="bx bx-trash me-2"></i> ลบ</a>
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
