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
