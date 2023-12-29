@extends('layouts/contentNavbarLayout')

@section('title', 'Evalocal')

@section('content')

<a href="{{ route('agency.excell',$time) }}" class="btn btn-success">Excel</a>
{{-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">ข้อมูลการประชุม </span>
</h4> --}}

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
        <option value="2023-6" @if($time == '2023-6') selected @endif>มิถุนายน 2566</option>
        <option value="2023-7" @if($time == '2023-7') selected @endif>กรกฎาคม 2566</option>
        <option value="2023-8" @if($time == '2023-8') selected @endif>สิงหาคม 2566</option>
        <option value="2023-9" @if($time == '2023-9') selected @endif>กันยายน 2566</option>
        <option value="2023-10" @if($time == '2023-10') selected @endif>ตุลาคม 2566</option>
        <option value="2023-11" @if($time == '2023-11') selected @endif>พฤศจิกายน 2566</option>
        <option value="2023-11" @if($time == '2023-12') selected @endif>ธันวาคม 2566</option>
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
