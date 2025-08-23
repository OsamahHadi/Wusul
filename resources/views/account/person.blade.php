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
            <span class="text-muted fw-light">أعدادات الحساب /</span> عام
        </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('account') }}"><i
                                class="bx bx-user me-1"></i> بيانات عامة</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('account_security') }}"><i
                                class="bx bx-lock-alt me-1"></i> الأمن</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('account_social') }}"><i
                                class="bx bx-link-alt me-1"></i> التواصل</a></li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">البيانات الشخصية</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                        @if(isset(Auth::user()->profile->image))
                            <img src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}"
                            alt="Profile" class=" uploadedImg d-block rounded h-px-150" id="">
                        @else
                             <img src="{{ asset('img/user1.png') }}" alt="user-avatar" class=" uploadedImg d-block rounded"
                                 height="100" width="100" id="uploadedImg"/>
                        @endif

                        <livewire:uploud-image>

                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                    <form id="formAccountSettings" method='POST' action="{{route('account.update')}}"
                                enctype="multipart/form-data" >
                                @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">الأسم الاول</label>
                                    <input class="form-control" type="text" id="firstName" name="firstName" value="{{$name[0]??''}}"
                                           autofocus/>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">الأسم الأخير</label>
                                    <input class="form-control" type="text" name="lastName" id="lastName" value="{{$name[1]??''}}"/>
                                </div>
                                <!-- Date Picker-->
                                <div class="col-md-6 col-12 mb-4">
                                    <label for="flatpickr-date" class="form-label">تاريخ الميلاد</label>
                                    <input type="text" name='birth' class="form-control" placeholder="YYYY-MM-DD" id="flatpickr-date" value="{{$profile->birthday??''}}" />
                                </div>
                                <!-- /Date Picker -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">رقم الهاتف</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">Ye (+967)</span>
                                        <input type="text" id="phoneNumber" value="{{$profile->phone??''}}" name="phone" class="form-control"
                                               placeholder="325 122 177"/>
                                    </div>
                                </div>
                                    @livewire('address-relation',['state_id'=>Auth::user()->address->state_id??'0' ,'city_id'=>Auth::user()->address->city_id??'0' ])

                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">العنوان</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->address->description??''}}" id="address" name="description"
                                           placeholder="العنوان..."/>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">حفظ التغييرات</button>
                                <button type="reset" class="btn btn-label-secondary">الغاء</button>
                            </div>
                        </form>
                    </div>

                    <!-- /Account -->
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
        imgView = document.querySelector('.uploadedImg');
        reset = document.getElementById('reset');

        const r = imgView.src;

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgView.src = URL.createObjectURL(file)
                console.log(imgInp);
            }
        }

        reset.onclick = evt => {
            imgInp.value = "",
            imgView.src = r
        }
    </script>
@endsection
