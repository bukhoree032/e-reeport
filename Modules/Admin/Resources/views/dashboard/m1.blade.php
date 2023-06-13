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
            <th>ตำบล</th>
          </tr> 
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($m1 as $item =>$value)
            <tr>
                <td style="width: 10%">{{ $item+1 }}</td>
                <td>{{ $value->districts }}</td>
            </tr>    
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
