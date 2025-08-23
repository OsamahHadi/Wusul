@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="app-brand justify-content-center mb-5">
                <a href="{{ route('index') }}" class="app-brand-link gap-2">
                    <img src="{{ asset('img/logo.png') }}" class="w-px-30" alt="">
                    <span class="app-brand-text demo text-body fw-bolder">منصة وصول</span>
                </a>
            </div>
            <h4 class="mb-3 text-center">اعادة ضبط كلمة المرور 🔒</h4>
            <p class="mb-4"><span class="fw-bold">قم بادخال البيانات التالية لاعادة ضبط كلمة المرور</span></p>

            <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework"
                  method="POST" action="{{ route('password.update') }}" novalidate="novalidate">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3 fv-plugins-icon-container">
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <input type="text" class="form-control " id="email" name="email" value="" placeholder="ادخل بريدك الالكتروني" autofocus="">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

                <div class="mb-3 form-password-toggle fv-plugins-icon-container">
                    <label class="form-label" for="password">كلمة المرور</label>
                    <div class="input-group input-group-merge has-validation">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="············" aria-describedby="password">
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle fv-plugins-icon-container">
                    <label class="form-label" for="password">تأكيد كلمة المرور</label>
                    <div class="input-group input-group-merge has-validation">
                        <input type="password" id="confirm-password" class="form-control" name="password_confirmation" placeholder="············" aria-describedby="password">
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <button class="btn btn-primary d-grid w-100 mb-3">اعادة ضبط كلمة المرور</button>
            </form>
        </div>
    </div>

@endsection
