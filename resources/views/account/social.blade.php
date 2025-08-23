@extends(Auth::user()->type==0?'layouts.app':'layouts.dashboard')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/pickr/pickr-themes.css" />

@section('extra-style')

@endsection

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y mt-3">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">أعدادات الحساب /</span> التواصل
        </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item"><a class="nav-link" href="{{ route('account') }}"><i
                                class="bx bx-user me-1"></i> بيانات عامة</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('account_security') }}"><i
                                class="bx bx-lock-alt me-1"></i> الأمن</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('account_social') }}"><i
                                class="bx bx-link-alt me-1"></i> التواصل</a></li>
                </ul>

                <div class="card mb-4">
                    @if (session('sucess'))
                        <div class="alert alert-success m-3" role="alert">
                            {{ session('sucess') }}
                        </div>
                    @endif
                    <h5 class="card-header">حسابات التواصل الاجتماعي</h5>
                    <div class="col-md-8 card-body demo-vertical-spacing demo-only-element">
                        <form method="POST" action="{{route('account_updateSocial')}}">
                            @csrf
                            <div class="input-group mt-3">
                                <label class="form-label fs-6" for="facebook">فيس بوك</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bxl-facebook me-1"></i></span>
                                    <input type="text" name="facebook" id="facebook" class="form-control" placeholder="www.facebook.com/example" value="{{ $social->facebook ?? '' }}">
                                </div>
                            </div>

                            <div class="input-group mt-3">
                                <label class="form-label fs-6" for="facebook">تويتر</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bxl-twitter me-1"></i></span>
                                    <input type="text" name="twitter" id="facebook" class="form-control" placeholder="www.twitter.com/example" value="{{ $social->twitter ?? '' }}">
                                </div>
                            </div>

                            <div class="input-group mt-3">
                                <label class="form-label fs-6" for="facebook">انستاقرام</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bxl-instagram me-1"></i></span>
                                    <input type="text" name="instagram" id="facebook" class="form-control" placeholder="www.instagram.com/example" value="{{ $social->instagram ?? '' }}">
                                </div>
                            </div>

                            <div class="input-group mt-3">
                                <label class="form-label fs-6" for="facebook">لينكيد ان</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bxl-linkedin me-1"></i></span>
                                    <input type="text" name="linkedin" id="facebook" class="form-control" placeholder="www.linkedin.com/example" value="{{ $social->linkedin ?? '' }}">
                                </div>
                            </div>

                            <div class="mt-2 text-center">
                                <button type="submit" class="btn btn-primary me-2">حفظ التغييرات</button>
                                <button type="reset" class="btn btn-label-secondary">الغاء</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- / Content -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>
    <script src="../../assets/vendor/libs/moment/moment.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="../../assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="../../assets/vendor/libs/pickr/pickr.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/forms-pickers.js"></script>


    <script>
        imgInp = document.getElementById('upload');
        imgView = document.getElementById('uploadedImg');
        reset = document.getElementById('reset');
        const r = imgView.src;

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgView.src = URL.createObjectURL(file)
            }
        }

        reset.onclick = evt => {
            imgInp.value = "",
                imgView.src = r
        }
    </script>
@endsection
