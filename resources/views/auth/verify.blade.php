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
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('تم ارسال رابط تفعيل جديد الى بريدك الالكتروني') }}
                </div>
            @endif
            <h3 class="mb-5 text-center">تحقق من بريدك الألكتروني ✉️</h3>
            <p class="text-start">
                تم ارسال رابط تفعيل الحساب الى بريدك الالكتروني<br> يرجى اتباع الرابط في الداخل للمتابعة
            </p>
            <a class="btn btn-primary w-100 my-3" href="{{ route('index') }}">تخطي الأن</a>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf

                <p class="text-center">لم يصلك البريد؟
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">اعادة ارسال</button>
            </form>
        </div>
    </div>

@endsection
