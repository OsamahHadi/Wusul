@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<!-- Row Group CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
<!-- Form Validation -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@section('extra-style')

@endsection

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y mt-3">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">أعدادات الحساب /</span> الخدمات
        </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item"><a class="nav-link" href="{{ route('account_personal') }}"><i
                                class="bx bx-user me-1"></i> بيانات عامة</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('account_security') }}"><i
                                class="bx bx-lock-alt me-1"></i> الأمن</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('account_services') }}"><i
                                class="bx bx-detail me-1"></i> الخدمات</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('account_social') }}"><i
                                class="bx bx-link-alt me-1"></i> التواصل</a></li>
                </ul>
                <div class="card mb-4 p-3">
                    <div class="col-12 position-relative">
                        <h5 class="card-header">الخدمات</h5>
                        <button type="button" class="btn btn-lg btn-primary position-absolute top-0 end-0 m-3" data-bs-toggle="modal"
                                data-bs-target="#addService">
                            أضافة خدمة&nbsp;<span class="tf-icons bx bx-book-add"></span>
                        </button>
                        <div class="modal fade" id="addService" tabindex="-1" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">

                                <div class="modal-content">
                                {{--                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}



                                <!-- Account -->


                                    <form id="formAccountSettings" method="POST" onsubmit="return false"
                                          class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-sm-center gap-4 flex-wrap">
                                                <img src="../../assets/img/backgrounds/event.jpg" alt="user-avatar"
                                                     class="d-block rounded img-fluid h-px-150 w-px-150"
                                                     style="object-fit: contain" id="uploadedImg">
                                                <div class="button-wrapper my-auto">
                                                    <label for="upload" class="btn btn-primary me-2" tabindex="0">
                                                        <span class="d-none d-sm-block">أضافة صورة</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" id="upload" class="account-file-input"
                                                               hidden="" accept="image/png, image/jpeg">
                                                    </label>
                                                </div>
                                                <p class="text-muted mb-0">الصيغ المتاحة JPG, GIF أو PNG. الحد الأقصى
                                                    800K</p>
                                            </div>
                                        </div>
                                        <hr class="my-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="name" class="form-label">أسم الخدمة</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                           placeholder="أسم الخدمة">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="timeZones" class="form-label">المجال</label>
                                                    <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                        <option value="" data-select2-id="2">أختر</option>
                                                        <option value="Turkey">الكهرباء</option>
                                                        <option value="Ukraine">التصميم</option>
                                                        <option value="United Arab Emirates">البرمجة</option>
                                                        <option value="United Kingdom">النجارة</option>
                                                        <option value="United States">الرياضة</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="timeZones" class="form-label">مدة التسليم</label>
                                                    <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                        <option value="" data-select2-id="2">أختر</option>
                                                        <option value="Turkey">رقمي</option>
                                                        <option value="Ukraine">دفع عند الاستلام</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                <label for="interval" class="form-label">مدة التسليم</label>
                                                <input type="text" class="form-control" id="interval" name="interval"
                                                    placeholder="مدة التسليم">
                                                </div>
                                                <div>
                                                    <label for="exampleFormControlTextarea1" class="form-label">وصف
                                                        الخدمة</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                              rows="3" placeholder="الوصف"></textarea>
                                                </div>


                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2"> حفظ التعديل</button>
                                                <button type="button" class="btn btn-label-secondary"
                                                        data-bs-dismiss="modal">إلغاء
                                                </button>
                                            </div>
                                            <div></div>
                                            <input type="hidden">
                                        </div>

                                    </form>
                                    <input type="hidden">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account -->
                    <div class="row mb-5">
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header flex-grow-0">
                                </div>
                                <img class="img-fluid" src="../../assets/img/backgrounds/event.jpg"
                                     alt="Card image cap">
                                <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                    <h5 class="mb-0 text-dark">21</h5>
                                    <span class="text-primary">May</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-truncate">تصميم قواعد بياناتMysql</h5>
                                    <!--<div class="d-flex gap-2">
                                        <span class="badge bg-label-primary">Technical</span>
                                        <span class="badge bg-label-primary">Account</span>
                                        <span class="badge bg-label-primary">Excel</span>
                                    </div>-->
                                    <div class="d-flex my-3">
                                        <div class="d-flex align-items-center justify-content-between">

                                        </div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#largeModal"> تعديل
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="modal fade" id="largeModal" tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content">
                                    {{--                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}



                                    <!-- Account -->


                                        <form id="formAccountSettings" method="POST" onsubmit="return false"
                                              class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-sm-center gap-4 flex-wrap">
                                                    <img src="../../assets/img/backgrounds/event.jpg" alt="user-avatar"
                                                         class="d-block rounded img-fluid h-px-150 w-px-150"
                                                         style="object-fit: contain" id="uploadedImg">
                                                    <div class="button-wrapper my-auto">
                                                        <label for="upload" class="btn btn-primary me-2" tabindex="0">
                                                            <span class="d-none d-sm-block">تعديل الصورة</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" class="account-file-input"
                                                                   hidden="" accept="image/png, image/jpeg">
                                                        </label>
                                                    </div>
                                                    <p class="text-muted mb-0">الصيغ المتاحة JPG, GIF أو PNG. الحد الأقصى
                                                        800K</p>
                                                </div>
                                            </div>
                                            <hr class="my-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="name" class="form-label">أسم الخدمة</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                               placeholder="أسم الخدمة">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">المجال</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">الكهرباء</option>
                                                            <option value="Ukraine">التصميم</option>
                                                            <option value="United Arab Emirates">البرمجة</option>
                                                            <option value="United Kingdom">النجارة</option>
                                                            <option value="United States">الرياضة</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">مدة التسليم</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">رقمي</option>
                                                            <option value="Ukraine">دفع عند الاستلام</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">مدة التسليم</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">يوم</option>
                                                            <option value="Ukraine">يومين</option>
                                                            <option value="United Arab Emirates">3 أيام</option>
                                                            <option value="United Kingdom">4 أيام</option>
                                                            <option value="United States">5 أيام</option>
                                                            <option value="United States">6 أيام</option>
                                                            <option value="United States"> أسبوع</option>
                                                            <option value="United States">أسبوعين</option>
                                                            <option value="United States">3 أسابيع</option>
                                                            <option value="United States">شهر</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="exampleFormControlTextarea1" class="form-label">وصف
                                                            الخدمة</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                                  rows="3" placeholder="الوصف"></textarea>
                                                    </div>


                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary me-2"> حفظ التعديل</button>
                                                    <button type="button" class="btn btn-label-secondary"
                                                            data-bs-dismiss="modal">إلغاء
                                                    </button>
                                                </div>
                                                <div></div>
                                                <input type="hidden">
                                            </div>

                                        </form>
                                        <input type="hidden">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header flex-grow-0">
                                </div>
                                <img class="img-fluid" src="../../assets/img/backgrounds/event.jpg"
                                     alt="Card image cap">
                                <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                    <h5 class="mb-0 text-dark">21</h5>
                                    <span class="text-primary">May</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-truncate">تصميم قواعد بياناتMysql</h5>
                                    <!--<div class="d-flex gap-2">
                                        <span class="badge bg-label-primary">Technical</span>
                                        <span class="badge bg-label-primary">Account</span>
                                        <span class="badge bg-label-primary">Excel</span>
                                    </div>-->
                                    <div class="d-flex my-3">
                                        <div class="d-flex align-items-center justify-content-between">

                                        </div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#largeModal"> تعديل
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="modal fade" id="largeModal" tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content">
                                    {{--                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}



                                    <!-- Account -->


                                        <form id="formAccountSettings" method="POST" onsubmit="return false"
                                              class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-sm-center gap-4 flex-wrap">
                                                    <img src="../../assets/img/backgrounds/event.jpg" alt="user-avatar"
                                                         class="d-block rounded img-fluid h-px-150 w-px-150"
                                                         style="object-fit: contain" id="uploadedImg">
                                                    <div class="button-wrapper my-auto">
                                                        <label for="upload" class="btn btn-primary me-2" tabindex="0">
                                                            <span class="d-none d-sm-block">تعديل الصورة</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" class="account-file-input"
                                                                   hidden="" accept="image/png, image/jpeg">
                                                        </label>
                                                    </div>
                                                    <p class="text-muted mb-0">الصيغ المتاحة JPG, GIF أو PNG. الحد الأقصى
                                                        800K</p>
                                                </div>
                                            </div>
                                            <hr class="my-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="name" class="form-label">أسم الخدمة</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                               placeholder="أسم الخدمة">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">المجال</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">الكهرباء</option>
                                                            <option value="Ukraine">التصميم</option>
                                                            <option value="United Arab Emirates">البرمجة</option>
                                                            <option value="United Kingdom">النجارة</option>
                                                            <option value="United States">الرياضة</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">مدة التسليم</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">رقمي</option>
                                                            <option value="Ukraine">دفع عند الاستلام</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">مدة التسليم</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">يوم</option>
                                                            <option value="Ukraine">يومين</option>
                                                            <option value="United Arab Emirates">3 أيام</option>
                                                            <option value="United Kingdom">4 أيام</option>
                                                            <option value="United States">5 أيام</option>
                                                            <option value="United States">6 أيام</option>
                                                            <option value="United States"> أسبوع</option>
                                                            <option value="United States">أسبوعين</option>
                                                            <option value="United States">3 أسابيع</option>
                                                            <option value="United States">شهر</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="exampleFormControlTextarea1" class="form-label">وصف
                                                            الخدمة</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                                  rows="3" placeholder="الوصف"></textarea>
                                                    </div>


                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary me-2"> حفظ التعديل</button>
                                                    <button type="button" class="btn btn-label-secondary"
                                                            data-bs-dismiss="modal">إلغاء
                                                    </button>
                                                </div>
                                                <div></div>
                                                <input type="hidden">
                                            </div>

                                        </form>
                                        <input type="hidden">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header flex-grow-0">
                                </div>
                                <img class="img-fluid" src="../../assets/img/backgrounds/event.jpg"
                                     alt="Card image cap">
                                <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                    <h5 class="mb-0 text-dark">21</h5>
                                    <span class="text-primary">May</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-truncate">تصميم قواعد بياناتMysql</h5>
                                    <!--<div class="d-flex gap-2">
                                        <span class="badge bg-label-primary">Technical</span>
                                        <span class="badge bg-label-primary">Account</span>
                                        <span class="badge bg-label-primary">Excel</span>
                                    </div>-->
                                    <div class="d-flex my-3">
                                        <div class="d-flex align-items-center justify-content-between">

                                        </div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#largeModal"> تعديل
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="modal fade" id="largeModal" tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content">
                                    {{--                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}



                                    <!-- Account -->


                                        <form id="formAccountSettings" method="POST" onsubmit="return false"
                                              class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-sm-center gap-4 flex-wrap">
                                                    <img src="../../assets/img/backgrounds/event.jpg" alt="user-avatar"
                                                         class="d-block rounded img-fluid h-px-150 w-px-150"
                                                         style="object-fit: contain" id="uploadedImg">
                                                    <div class="button-wrapper my-auto">
                                                        <label for="upload" class="btn btn-primary me-2" tabindex="0">
                                                            <span class="d-none d-sm-block">تعديل الصورة</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" class="account-file-input"
                                                                   hidden="" accept="image/png, image/jpeg">
                                                        </label>
                                                    </div>
                                                    <p class="text-muted mb-0">الصيغ المتاحة JPG, GIF أو PNG. الحد الأقصى
                                                        800K</p>
                                                </div>
                                            </div>
                                            <hr class="my-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="name" class="form-label">أسم الخدمة</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                               placeholder="أسم الخدمة">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">المجال</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">الكهرباء</option>
                                                            <option value="Ukraine">التصميم</option>
                                                            <option value="United Arab Emirates">البرمجة</option>
                                                            <option value="United Kingdom">النجارة</option>
                                                            <option value="United States">الرياضة</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">مدة التسليم</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">رقمي</option>
                                                            <option value="Ukraine">دفع عند الاستلام</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">مدة التسليم</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">يوم</option>
                                                            <option value="Ukraine">يومين</option>
                                                            <option value="United Arab Emirates">3 أيام</option>
                                                            <option value="United Kingdom">4 أيام</option>
                                                            <option value="United States">5 أيام</option>
                                                            <option value="United States">6 أيام</option>
                                                            <option value="United States"> أسبوع</option>
                                                            <option value="United States">أسبوعين</option>
                                                            <option value="United States">3 أسابيع</option>
                                                            <option value="United States">شهر</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="exampleFormControlTextarea1" class="form-label">وصف
                                                            الخدمة</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                                  rows="3" placeholder="الوصف"></textarea>
                                                    </div>


                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary me-2"> حفظ التعديل</button>
                                                    <button type="button" class="btn btn-label-secondary"
                                                            data-bs-dismiss="modal">إلغاء
                                                    </button>
                                                </div>
                                                <div></div>
                                                <input type="hidden">
                                            </div>

                                        </form>
                                        <input type="hidden">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header flex-grow-0">
                                </div>
                                <img class="img-fluid" src="../../assets/img/backgrounds/event.jpg"
                                     alt="Card image cap">
                                <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                    <h5 class="mb-0 text-dark">21</h5>
                                    <span class="text-primary">May</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-truncate">تصميم قواعد بياناتMysql</h5>
                                    <!--<div class="d-flex gap-2">
                                        <span class="badge bg-label-primary">Technical</span>
                                        <span class="badge bg-label-primary">Account</span>
                                        <span class="badge bg-label-primary">Excel</span>
                                    </div>-->
                                    <div class="d-flex my-3">
                                        <div class="d-flex align-items-center justify-content-between">

                                        </div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#largeModal"> تعديل
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="modal fade" id="largeModal" tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content">
                                    {{--                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}



                                    <!-- Account -->


                                        <form id="formAccountSettings" method="POST" onsubmit="return false"
                                              class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-sm-center gap-4 flex-wrap">
                                                    <img src="../../assets/img/backgrounds/event.jpg" alt="user-avatar"
                                                         class="d-block rounded img-fluid h-px-150 w-px-150"
                                                         style="object-fit: contain" id="uploadedImg">
                                                    <div class="button-wrapper my-auto">
                                                        <label for="upload" class="btn btn-primary me-2" tabindex="0">
                                                            <span class="d-none d-sm-block">تعديل الصورة</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" class="account-file-input"
                                                                   hidden="" accept="image/png, image/jpeg">
                                                        </label>
                                                    </div>
                                                    <p class="text-muted mb-0">الصيغ المتاحة JPG, GIF أو PNG. الحد الأقصى
                                                        800K</p>
                                                </div>
                                            </div>
                                            <hr class="my-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="name" class="form-label">أسم الخدمة</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                               placeholder="أسم الخدمة">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">المجال</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">الكهرباء</option>
                                                            <option value="Ukraine">التصميم</option>
                                                            <option value="United Arab Emirates">البرمجة</option>
                                                            <option value="United Kingdom">النجارة</option>
                                                            <option value="United States">الرياضة</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">مدة التسليم</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">رقمي</option>
                                                            <option value="Ukraine">دفع عند الاستلام</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="timeZones" class="form-label">مدة التسليم</label>
                                                        <select id="selectpickerBasic" class="selectpicker w-100" data-style="btn-default">
                                                            <option value="" data-select2-id="2">أختر</option>
                                                            <option value="Turkey">يوم</option>
                                                            <option value="Ukraine">يومين</option>
                                                            <option value="United Arab Emirates">3 أيام</option>
                                                            <option value="United Kingdom">4 أيام</option>
                                                            <option value="United States">5 أيام</option>
                                                            <option value="United States">6 أيام</option>
                                                            <option value="United States"> أسبوع</option>
                                                            <option value="United States">أسبوعين</option>
                                                            <option value="United States">3 أسابيع</option>
                                                            <option value="United States">شهر</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="exampleFormControlTextarea1" class="form-label">وصف
                                                            الخدمة</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                                  rows="3" placeholder="الوصف"></textarea>
                                                    </div>


                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary me-2"> حفظ التعديل</button>
                                                    <button type="button" class="btn btn-label-secondary"
                                                            data-bs-dismiss="modal">إلغاء
                                                    </button>
                                                </div>
                                                <div></div>
                                                <input type="hidden">
                                            </div>

                                        </form>
                                        <input type="hidden">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>

    </div>
    <!-- / Content -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
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
