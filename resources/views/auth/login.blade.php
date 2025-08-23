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
            <h4 class="mb-4 text-center">تسجيل الدخول</h4>

            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                           value="{{ old('email') }}" placeholder="ادخل بريدك الالكتروني" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">كلمة المرور</label>
                    </div>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                               placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                               aria-describedby="password"/>
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <a href="{{ route('password.request') }}">
                        <small>هل نسيت كلمة المرور؟</small>
                    </a>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember-me">تذكرني</label>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">تسجيل الدخول</button>
                </div>
            </form>

            <p class="text-center">
                <span>هل انت جديد على منصتنا؟</span>
                <a href="{{ route('register') }}">
                    <span>انشاء حساب</span>
                </a>
            </p>

            <div class="divider my-4">
                <div class="divider-text">أو</div>
            </div>

            <!-- Extra login options -->
            <div class="d-flex justify-content-center">
                <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                    <i class="tf-icons bx bxl-facebook"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                    <i class="tf-icons bx bxl-google-plus"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                    <i class="tf-icons bx bxl-twitter"></i>
                </a>
            </div>
        </div>
    </div>

@endsection
