@extends('layouts/contentNavbarLayout')

@section('title', 'Evalocal')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">ข้อมูลการประชุม </span>
</h4>
@php
  $row = 0;
  $mont = [
    ['2023-06','มิถุนายน2566'],
    ['2023-07','กรกฎาคม2566'],
    ['2023-08','สิงหาคม2566'],
    ['2023-09','กันยายน2566'],
    ['2023-10','ตุลาคม2566'],
    ['2023-11','พฤศจิกายน2566'],
    ['2023-12','ธันวาคม2566'],
    
    ['2024-01','มกราคม2567'],
    ['2024-02','กุมภาพันธ์2567'],
    ['2024-03','มีนาคม2567'],
    ['2024-04','เมษายน2567'],
    ['2024-05','พฤษภาคม2567'],
    ['2024-06','มิถุนายน2567'],
    ['2024-07','กรกฎาคม2567'],
    ['2024-08','สิงหาคม2567'],
    ['2024-09','กันยายน2567'],
    ['2024-10','ตุลาคม2567'],
    ['2024-11','พฤศจิกายน2567'],
    ['2024-12','ธันวาคม2567'],
    
    ['2025-01','มกราคม2568'],
    ['2025-02','กุมภาพันธ์2568'],
    ['2025-03','มีนาคม2568'],
    ['2025-04','เมษายน2568'],
    ['2025-05','พฤษภาคม2568'],
    ['2025-06','มิถุนายน2568'],
    ['2025-07','กรกฎาคม2568'],
    ['2025-08','สิงหาคม2568'],
    ['2025-09','กันยายน2568'],
    ['2025-10','ตุลาคม2568'],
    ['2025-11','พฤศจิกายน2568'],
    ['2025-12','ธันวาคม2568'],
  ]
@endphp
<div class="card-toolbar">
  <form action="{{ route('admin.index.mee_now_search') }}" method="POST" enctype="multipart/form-data">  
    @csrf
    <div class="row">
        <div class="col-md-2">
          <label>เดือน</label>
          <select class="form-control" id="m" name="mont">
              @foreach ($mont as $key => $value)
                @if($row == 0)
                  @if($value[0] == date('Y-m'))
                    <option value="{{ $value[0] }}" @if($time == $value[0])selected @endif>{{ $value[1] }}</option>
                    @php $row = 1; @endphp
                  @else
                    <option value="{{ $value[0] }}" @if($time == $value[0])selected @endif>{{ $value[1] }}</option>
                  @endif
                @endif
              @endforeach
          </select>
      </div>
      <div class="col-md-2">
          <label>งบประมาณ</label>
          <select class="form-control" id="budget" name="budget">
              <option value="1" @if($id == 1)selected @endif>300,000</option>
              <option value="2" @if($id == 2)selected @endif>1,000,000</option>
          </select>
      </div>
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
        <div class="col-md-1">
          <button style="margin-top: 28%;" class="btn btn-primary">ค้นหา</button>
        </div>
    </div>
</form>
</div>
<br>
<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <h5 class="card-header">บันทึกข้อมูลการประชุม  ({{count($result)}} ตำบล)</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>ตำบล</th>
              <th>อำเภอ</th>
              <th>จัดการ</th>
            </tr> 
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($result as $item =>$value)
              <tr>
                  <td>{{ $item+1 }}</td>
                  <td>{{ $value->districts }}</td>
                  <td>{{ $value->amphures }}</td>
                  <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a target="_blank" class="dropdown-item" href="{{ route('admin.index.meetinguser',$value->id) }}"><i class="bx bx-eye me-2"></i> ดูบันทึกการประชุม</a>
                        </div>
                      </div>
                  </td>
              </tr>    
            @endforeach
            @if(isset($item) && $item < 3)
              <tr>
                <td><i class="fa-lg text-primary me-3"></i></td>
                <td></td><td></td><td></td>
              </tr>
              <tr>
                <td><i class="fa-lg text-primary me-3"></i></td>
                <td></td><td></td><td></td>
              </tr>
              <tr>
                <td><i class="fa-lg text-primary me-3"></i></td>
                <td></td><td></td><td></td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->


  <!-- Basic Bootstrap Table -->
  <div class="col-lg-6">
    <div class="card">
      <h5 class="card-header">ยังไม่บันทึกข้อมูลการประชุม  ({{count($result_no)}} ตำบล)</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>ตำบล</th>
              <th>อำเภอ</th>
              <th>จัดการ</th>
            </tr> 
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($result_no as $item =>$value)
              <tr>
                  <td>{{ $item+1 }}</td>
                  <td>{{ $value->districts }}</td>
                  <td>{{ $value->amphures }}</td>
                  <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a target="_blank" class="dropdown-item" href="{{ route('admin.index.meetinguser',$value->id) }}"><i class="bx bx-eye me-2"></i> ดูบันทึกการประชุม</a>
                        </div>
                      </div>
                  </td>
              </tr>    
            @endforeach
            @if(isset($item) && $item < 3)
              <tr>
                <td><i class="fa-lg text-primary me-3"></i></td>
                <td></td><td></td><td></td>
              </tr>
              <tr>
                <td><i class="fa-lg text-primary me-3"></i></td>
                <td></td><td></td><td></td>
              </tr>
              <tr>
                <td><i class="fa-lg text-primary me-3"></i></td>
                <td></td><td></td><td></td><td></td><td></td><td></td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
</div>
<hr class="my-5">

@endsection
