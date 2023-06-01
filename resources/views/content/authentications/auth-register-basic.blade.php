@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
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
          <h4 class="mb-2">สร้างบัญชีผู้ใช้ 🚀</h4>
          <p class="mb-4">สร้างบัญชีผู้ใช้เพื่อใช้งาน</p>
          <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">ชื่อ - นามสกุล</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="ชื่อ - นามสกุล" autocomplete="name" autofocus>

              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="tel" class="form-label">เบอร์โทรศัพท์</label>
              <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required placeholder="เบอร์โทรศัพท์" autocomplete="tel" autofocus>

              @error('tel')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">อีเมล์</label>
              
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="อีเมล์" autocomplete="email">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">รหัสผ่าน</label>
              
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="รหัสผ่าน" autocomplete="new-password">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">ยืนยันรหัสผ่าน</label>
              
              
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="ยืนยันรหัสผ่าน" autocomplete="new-password">
            </div>
            
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">เลือกตำบลที่ดูแล</label>
              <span class="text-danger">*</span></label>
              <select id="districts" class="js-example-basic-multiple" name="districts" style="width: 100%;" required>
                  <option value="" selected>-- ตำบล --</option>
                  @foreach ($resultDistricts as $item => $value)
                  <option value="{{ $value->id_districts }}">ต.{{ $value->name_districts }}  >>  อ.{{ $value->name_amphures }}  >>  จ.{{ $value->name_provinces }}</option>
                  {{-- <option value="{{ $value->id_districts }}">ต.{{ $value->name_districts }}  >>  อ.{{ $value->name_amphures }}  >>  จ.{{ $value->name_provinces }}  >> {{ $value->zip_code_districts }}</option> --}}
                  @endforeach
              </select>
            </div>

            <div class="mb-3 form-password-toggle">
              <label for="status">งบประมาณที่ได้รับ:</label>
              <select name="status" class="form-control" required>
                <option value="">-- เลือกงบประมาณ --</option>
                  <option value="2">1,000,000</option>
                  <option value="1">300,000</option>
              </select>
            </div>
            {{-- <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                <label class="form-check-label" for="terms-conditions">
                  I agree to
                  <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
              </div>
            </div> --}}

            <button class="btn btn-primary d-grid w-100">
              สร้างบัญชี
            </button>
          </form>

          <p class="text-center">
            <span>มีบัญชีผู้ใช้อยู่แล้ว?</span>
            <a href="{{ route('dashboard-analytics') }}">
              <span>เข้าสู่ระบบ</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
</div>



@endsection
