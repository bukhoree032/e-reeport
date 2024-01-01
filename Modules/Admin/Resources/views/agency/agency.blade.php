@extends('layouts/contentNavbarLayout')

@section('title', 'Evalocal')

@section('content')

<a href="{{ route('agency.excell',$time) }}" class="btn btn-success">Excel</a>
{{-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">ข้อมูลการประชุม </span>
</h4> --}}
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
<br>
<br>

<form action="{{ route('agency.search') }}" method="post"enctype="multipart/form-data">
  @csrf
  {{ method_field('PUT') }}
  <div class="row">

    <div class="col-md-3">
      <label for="cars">ประจำเดือน:</label>
{{-- @dd($time) --}}
      <select name="cars" id="cars" class="form-control">
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

      <div class="col-md-1">
          <button style="margin-top: 27px" type="submit" class="form-control btn btn-sm btn-info">ค้นหา</button>
      </div>
  </div>
</form>

<br>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.14-beta/nv.d3.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.4.4/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.14-beta/nv.d3.js"></script>

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">บันทึกข้อมูลการประชุม</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>จังหวัด</th>
              <th>อำเภอ</th>
              <th>ตำบล</th>
              <th>งบประมาณ</th>

              <th>{{$time}} ด้านที่ 1</th>
              <th>{{$time}} ด้านที่ 2</th>
              <th>{{$time}} ด้านที่ 3</th>
              <th>{{$time}} ด้านที่ 4</th>
              <th>{{$time}} ด้านที่ 5</th>
              <th>{{$time}} ด้านที่ 6</th>
            </tr> 
          </thead>
          <tbody class="table-border-bottom-0">
              @foreach ($user as $item =>$value)
                  <tr>
                    <td>{{ $item+1 }}</td>
                    <td>{{ $value->provinces }}</td>
                    <td>{{ $value->amphures }}</td>
                    <td>{{ $value->districts }}</td>
                    @if($value->status == 1)
                      <td>300,000</td>
                    @else
                      <td>1,000,000</td>
                    @endif
                    @foreach ($value->agency as $item_secure => $value_secure)
                      <td>{{ $value_secure }}</td>
                    @endforeach
                  </tr> 
              @endforeach
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->

  <!--/ Basic Bootstrap Table -->
</div>
@endsection
