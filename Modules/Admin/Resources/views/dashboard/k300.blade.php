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
            <th>จังหวัด</th>
          </tr> 
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($k300 as $item =>$value)
            <tr>
                <td style="width: 10%">{{ $k300->firstItem() + $item }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->tel }}</td>
                <td>{{ $value->districts }}</td>
                <td>{{ $value->provinces }}</td>
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
    @if($k300->currentPage() < 3)
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
      <ul class="pagination" style="margin-left: 25px;margin-top: 15px;">
        <li class="page-item">
          <a class="page-link" href="{{$k300->previousPageUrl()}}"><b><</b></a>
        </li>
        @foreach($k300->getUrlRange($start, $end) as $key => $value)
          <li class="page-item @if($k300->currentPage() == $key) active @endif"><a class="page-link" href="{{$value}}">{{$key}}</a></li>
        @endforeach
        <li class="page-item">
          <a class="page-link" href="{{$k300->nextPageUrl()}}"><b>></b></a>
        </li>
      </ul>
    </div>
    {{-- แบ่งหน้า --}}
  
    
  </div>
@endsection
