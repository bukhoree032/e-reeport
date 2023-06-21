@extends('layouts/blankLayout')

@section('title', 'Under Maintenance - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection

@section('content')
<!--Under Maintenance -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-2 mx-2">เกิดข้อผิดพลาดในการเชื่อมต่อ!</h2>
    <p class="mb-4 mx-2">
      เนื่องจากตำบล{{$user[0]->districts}} มีการลงทะเบียนแล้วโดย{{$user[0]->name}} ({{$user[0]->email}})
    </p>
    <a href="{{url('/')}}" class="btn btn-primary">กลับหน้าหลัก</a>
    <div class="mt-4">
      <img src="{{asset('assets/img/illustrations/girl-doing-yoga-light.png')}}" alt="girl-doing-yoga-light" width="500" class="img-fluid">
    </div>
  </div>
</div>
<!-- /Under Maintenance -->
@endsection
