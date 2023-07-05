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
            <a href="{{ route('dashboard') }}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',['width'=>25,'withbg' => "#696cff"])</span>
              <span class="app-brand-text demo text-body fw-bolder">{{ config('variables.templateName') }}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">ต้องการเปลียนรหัสผ่าน? 🔒</h4>
          <p class="mb-4">ป้อนหรัสผ่านใหม่และยืนยันรหัสผ่านใหม่ เพื่อเปลียนรหัสผ่าน</p>
          <form id="formAuthentication" class="mb-3" action="{{ route('auth.reset.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="494847">
            <input type="hidden" name="iduser" value="{{$user->id}}">

            <div class="mb-3">
              <label for="email" class="form-label">ชื่อ - นามสกุล</label>
              <input type="text" class="form-control" value="{{ $user->name }}" readonly autofocus>
            </div>
            
            <div class="mb-3">
              <label for="email" class="form-label">อีเมล</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ $user->email ?? old('email') }}" readonly autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่านใหม่</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">ยืนยันรหัสผ่านใหม่</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                
            </div>
            <button class="btn btn-primary d-grid w-100">เปลียนรหัสผ่าน</button>
          </form>
          <div class="text-center">
            <a href="{{ route('dashboard') }}" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              กลับหน้าหลัก
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
@endsection
