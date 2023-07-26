@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
{{-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">ตั้งค่าโปรไฟล์</span>
</h4> --}}

<div class="row">
  <div class="col-md-12">
    {{-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i class="bx bx-bell me-1"></i> Notifications</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-connections')}}"><i class="bx bx-link-alt me-1"></i> Connections</a></li>
    </ul> --}}
    <form method="POST" action="{{ route('auth.profile.update') }}" enctype="multipart/form-data">
    @csrf
      <div class="card mb-4">
        <h5 class="card-header">ข้อมูลโปรไฟล์</h5>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="@if($user[0]->file == null){{asset('assets/img/avatars/1.png')}}@else{{$user[0]->file}}@endif" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">เพิ่มรูปโปรไฟล์</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" name="files" hidden accept="image/png, image/jpeg" />
              </label>
              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">ยกเลิก</span>
              </button>

              <p class="text-muted mb-0">อนุญาต JPG, GIF หรือ PNG. ขนาดไม่เกิน 800K</p>
            </div>
          </div>
        </div>
        
        <input class="form-control" type="hidden" name="iduser" value="{{$user[0]->id}}"/>
        
        <hr class="my-0">
        <div class="card-body">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="name" class="form-label">ชื่อ - นามสกุล</label>
                <input class="form-control" type="text" id="firstName" name="name" value="{{$user[0]->name}}" autofocus required/>
              </div>
              <div class="mb-3 col-md-6">
                <label for="tel" class="form-label">เบอร์โทรศัพท์</label>
                <input class="form-control" type="text" name="tel" id="tel" value="{{$user[0]->tel}}" required/>
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label">E-mail</label>
                <input class="form-control" type="text" name="email" value="{{$user[0]->email}}" required />
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label">งบประมาณที่ได้รับ</label>
                <input type="text" class="form-control" value="@if($user[0]->status == 1) 1,000,000 @else 300,000 @endif" readonly/>
              </div>
              <div class="mb-3 col-md-4">
                <label class="form-label" for="phoneNumber">ตำบล</label>
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control" value="{{$user[0]->districts}}" readonly/>
                </div>
              </div>
              <div class="mb-3 col-md-4">
                <label class="form-label" for="phoneNumber">อำเภอ</label>
                <div class="input-group input-group-merge">
                  <input type="text" class="form-control" value="{{$user[0]->amphures}}" readonly/>
                </div>
              </div>
              <div class="mb-3 col-md-4">
                <label for="address" class="form-label">จังหวัด</label>
                <input type="text" class="form-control" value="{{$user[0]->provinces}}" readonly/>
              </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">บันทึก</button>
              <button type="reset" class="btn btn-outline-secondary">ยกเลิก</button>
            </div>
        </div>
        <!-- /Account -->
      </div>
    </form>
    {{-- <div class="card">
      <h5 class="card-header">Delete Account</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
          </div>
          <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
        </form>
      </div>
    </div> --}}
  </div>
</div>
@endsection
