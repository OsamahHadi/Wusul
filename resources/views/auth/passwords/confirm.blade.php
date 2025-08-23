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
            <h4 class="mb-3 text-center">تأكيد كلمة السر 🔒</h4>
            <p class="mb-4">يرجى تأكيد كلمة السر الخاصة بك قبل المتابعة.</p>
            <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework"
                  method="POST" action="{{ route('password.confirm') }}" novalidate="novalidate">
                @csrf

                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">كلمة المرور</label>
                        <a href="{{ route('password.request') }}">
                            <small>هل نسيت كلمة المرور؟</small>
                        </a>
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
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">تأكيد كلمة المرور</button>
                <input type="hidden">
            </form>
        </div>
    </div>

@endsection
