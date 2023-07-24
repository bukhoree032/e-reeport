@extends('layouts/blankLayout')

@section('title', 'Forgot Password Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Forgot Password -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',['width'=>25,'withbg' => "#696cff"])</span>
              <span class="app-brand-text demo text-body fw-bolder">{{ config('variables.templateName') }}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">ลืมรหัสผ่านใช่หรือไม่? 🔒</h4>
          <p class="mb-4">ป้อนอีเมล์และเบอร์โทรศัพท์ของคุณ เพื่อเปลียนรหัสผ่านของคุณ</p>
            <form d="formAuthentication" class="mb-3" method="POST" action="{{ route('forgot') }}">
            @csrf

            @if (\Session::has('success'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
                {{-- <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button> --}}
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">อีเมล์</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-form-label text-md-end">เบอร์โทรศัพท์</label>

                  <div class="col-md-6">
                      <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}" required autofocus>

                      @error('tel')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                          เปลียนรหัสผ่าน
                        </button>
                    </div>
                </div>
            </form>
          <div class="text-center">
            <a href="{{url('home')}}" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              กลับหน้าล็อกอิน
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
@endsection


{{-- <script type="text/javascript">
  $(document).ready(function() {
        $(document).on('click','.login',function(evan) {
          evan.preventDefault();
          // alert ($(this).attr('id'));
          // var id = $(this).attr('id');
           $.ajax({
                method: "POST",
                url: "<?php echo site_url('frontend_control/check_login') ?>",
                dataType: 'json',
                data: $("#form_login").serialize(),
                success: function($result) {
                     console.log($result);
                     if ($result=='0') {
                     	// console.log("ยังไม่ยืนยัน");
                         $('#myModal_confirm').modal('show');
                     }else if ($result=='1'){
                     	console.log("ปกติ");
                        // document.getElementById("form_login").submit();
                     }else if ($result=='2'){
                     	// console.log("ระงับ");
                        $('#myModal_ban').modal('show');
                     }else if ($result=='3'){
                     	// console.log("ไม่ถูก");
                        $('#myModal_false').modal('show');
                     }
                }
             });
        })
    });
</script> --}}

