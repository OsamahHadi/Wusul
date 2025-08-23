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
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h4 class="mb-5 text-center">هل نسيت كلمة المرور؟ 🔒</h4>
            <p class="mb-4">قم بادخال بريدك الالكتروني وسوف نقوم بأرسال التعليمات لأعادة ضبط كلمة المرور الخاصة بك</p>
            <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework"
                  method="POST" action="{{ route('password.email') }}" novalidate="novalidate">
                @csrf

                <div class="mb-3 fv-plugins-icon-container">
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                           value="{{ old('email') }}" placeholder="قم بادخال بريدك الالكتروني" autofocus="">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">أرسل رابط اعادة تعيين كلمة المرور</button>
            </form>
            <div class="text-center">
                <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                    العودة الى تسجيل الدخول
                </a>
            </div>
        </div>
    </div>

@endsection
