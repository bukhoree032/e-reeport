@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">

@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])</span>
              <span class="app-brand-text demo text-body fw-bolder">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">{{config('variables.templateName')}}! ยินดีตอนรับ👋</h4>
          {{-- <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

          <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">อีเมล์</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="อีเมล์" autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">รหัสผ่าน</label>
                <a href="{{ route('password.request') }}">
                  <small>ลืมรหัสผ่านใช่หรือไม่?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            {{-- <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div> --}}
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">เข้าสู่ระบบ</button>
            </div>
          </form>

          <p class="text-center">
            <span>ไม่มีบัญชีผู้ใช้ใช่หรือไม่?</span>
            {{-- <a href="{{url('auth/register-basic')}}"> --}}
              <a href="{{ route('register.create') }}">
              <span>สร้างบัญชี</span>
            </a>
          </p>
          
          <h3><p class="text-center">
            {{-- <a href="{{url('auth/register-basic')}}"> --}}
              <a target="_blank" href="https://drive.google.com/drive/folders/1wCzajZT-UBCdpSqdoTqjaYg1dzMy83Bj?usp=sharing">
              <span>คู่มือการใช้งาน</span>
            </a>
          </p></h2>
          <p class="text-center">
              <a target="_blank" href="{{ route('qrline') }}">
                <img src="{{ asset('storage/qrline/3429.jpg') }}" style="width: 100%;"/>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
