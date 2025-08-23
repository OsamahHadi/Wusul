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
            <h4 class="mb-3 text-center">انشاء حساب جديد</h4>

            <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                  action="{{ route('register') }}" novalidate="novalidate">
                @csrf
                <div class="mb-3 fv-plugins-icon-container">
                    <label for="username" class="form-label">اسم المستخدم</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="username"
                           name="name" placeholder="أدخل اسم المستخدم" autofocus="" value="{{ old('name') }}">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 fv-plugins-icon-container">
                    <label for="email" class="form-label @error('email') is-invalid @enderror"
                           value="{{ old('email') }}">البريد الالكتروني</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="ادخل بريدك الالكتروني">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle fv-plugins-icon-container">
                    <label class="form-label" for="password">كلمة المرور</label>
                    <div class="input-group input-group-merge has-validation">
                        <input type="password" id="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               placeholder="············" aria-describedby="password">
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
                        <input type="password" id="confirm-password" class="form-control" name="password_confirmation"
                               placeholder="············" aria-describedby="password">
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

                <div class="row mb-3">
                    <label class="form-label" for="password">نوع الحساب</label>
                    <div class="col-sm mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="customRadioIcon2">
                                <span class="custom-option-body">
                                  <i class="bx bx-user"></i>
                                  <span class="custom-option-title"> مستخدم </span>
{{--                                  <small> انشاء حساب كمستخدم للبحث والحصول على الخدمات المناسبة </small>--}}
                                </span>
                                <input name="type" class="form-check-input" type="radio" value="0"
                                       id="customRadioIcon2" checked>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-icon checked">
                            <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                <span class="custom-option-body">
                                  <i class="bx bx-rocket"></i>
                                  <span class="custom-option-title">مقدم خدمة</span>
{{--                                  <small> انشاء حساب كمقدم خدمة لتقديم خدمات والحصول على طلبات </small>--}}
                                </span>
                                <input name="type" class="form-check-input" type="radio" value="2"
                                       id="customRadioIcon1">
                            </label>
                        </div>
                    </div>

                </div>

                <div class="mb-3 fv-plugins-icon-container">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                        <label class="form-check-label" for="terms-conditions">
                            اوافق على
                            <a href="javascript:void(0);">سياسات الخصوصية &amp; الشروط</a>
                        </label>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                </div>
                <button class="btn btn-primary d-grid w-100">انشاء حساب</button>
                <div></div>
                <input type="hidden"></form>

            <p class="text-center">
                <span>لديك حساب بالفعل؟</span>
                <a href="{{ route('login') }}">
                    <span>قم بتسجيل الدخول</span>
                </a>
            </p>
        </div>
    </div>
@endsection
