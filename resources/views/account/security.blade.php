@extends(Auth::user()->type==0?'layouts.app':'layouts.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y mt-3">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">اعدادات الحساب /</span> الامان
        </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item"><a class="nav-link" href="{{ route('account') }}"><i
                                class="bx bx-user me-1"></i> بيانات عامة</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('account_security') }}"><i
                                class="bx bx-lock-alt me-1"></i> الأمن</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('account_social') }}"><i
                                class="bx bx-link-alt me-1"></i> التواصل</a></li>
                </ul>
                <!-- Change Password -->
                <div class="card mb-4">
                    <h5 class="card-header">تغيير كلمة السر</h5>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if((session('success')))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="{{route('account.changePass')}}"
                         class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                         @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                    <label class="form-label" for="currentPassword">كلمة السر الحالية</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <input class="form-control" type="password" name="current_password" id="currentPassword" placeholder="············">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div><div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                    <label class="form-label" for="newPassword">كلمة السر الجديدة</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <input class="form-control" type="password" id="newPassword" name="new_password" placeholder="············">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div><div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                    <label class="form-label" for="confirmPassword">تأكيد كلمة السر الجديدة</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="············">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div><div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
{{--                                <div class="col-12 mb-4">--}}
{{--                                    <p class="fw-semibold mt-2">متطلبات كلمة المرور</p>--}}
{{--                                    <ul class="ps-3 mb-0">--}}
{{--                                        <li class="mb-1">على الاقل 8 أحرف - كلما كانت اكبر كلما كان أفضل</li>--}}
{{--                                        <li class="mb-1">على الأقل حرف صغير واحد</li>--}}
{{--                                        <li>على الاقل رقم واحد , حرف , أو رمز</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                                <div class="col-12 mt-1">
                                    <button type="submit" class="btn btn-primary me-2">حفظ التغييرات</button>
                                    <button type="reset" class="btn btn-label-secondary">الغاء</button>
                                </div>
                            </div>
                            <div></div><input type="hidden"></form>
                    </div>
                </div>
                <!--/ Change Password -->

            </div>
        </div>
    </div>
@endsection
