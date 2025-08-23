@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-help-center.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css">
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container-xxl flex-grow-1 container-p-y px-sm-2 px-0">

            <div class="card overflow-hidden ">
                <!-- Help Center Header -->
                <div class="help-center-header d-flex flex-column justify-content-center align-items-center">
                    <h3 class="text-center"> ابحث عن الخدمة التي تحتاجها </h3>
                    <div class="input-wrapper my-3 input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon1"><i
                                class="bx bx-search-alt bx-xs text-muted"></i></span>
                        <input type="text" class="form-control form-control-lg"
                               placeholder="ادخل اسم الخدمة او اسم موفر الخدمة" aria-label="Search"
                               aria-describedby="basic-addon1">
                        <span class="input-group-text p-0" id="basic-addon1">
                            <button type="button" class="d-sm-none d-inline-flex btn btn-icon text-dark" data-bs-toggle="modal"
                                    data-bs-target="#backDropModal">
                                <span class="bx bx-cog fs-2"></span>
                            </button>
                        </span>
                    </div>
                    <div class="input-wrapper row d-sm-inline-flex d-none">
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <label for="selectpickerIcons" class="form-label fs-5 fw-bolder">الخدمة</label>
                            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx"
                                    data-tick-icon="bx-check" data-style="btn-default">
                                <option data-icon="bx bx-list-check">الكل</option>
                                <option data-icon="bx bx-plug">كهرباء</option>
                                <option data-icon="bx bx-devices">تقنية</option>
                                <option data-icon="bx bx-heart">صحة</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <label for="selectpickerIcons" class="form-label fs-5 fw-bolder">ترتيب حسب</label>
                            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx"
                                    data-tick-icon="bx-check" data-style="btn-default">
                                <option data-icon="bx bx-rename">الاسم</option>
                                <option data-icon="bx bx-current-location">الاقرب</option>
                                <option data-icon="bx bx-star">اجمالي التقييمات</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <label for="selectpickerBasic" class="form-label fs-5 fw-bolder">المحافظة</label>
                            <select class="selectpicker w-100 show-tick" id="selectpickerBasic" data-icon-base="bx"
                                    data-tick-icon="bx-check" data-style="btn-default">
                                <option>الكل</option>
                                <option>حضرموت</option>
                                <option>المهرة</option>
                                <option>عدن</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <label for="selectpickerBasic" class="form-label fs-5 fw-bolder">المدينة</label>
                            <select class="selectpicker w-100 show-tick" id="selectpickerBasic" data-icon-base="bx"
                                    data-tick-icon="bx-check" data-style="btn-default">
                                <option>الكل</option>
                                <option>المكلا</option>
                                <option>فوه</option>
                                <option>الشحر</option>
                            </select>
                        </div>
                    </div>
                    <div>
                    </div>
                    <p class="text-center px-3 mb-0">كما يمكنك البحث عن اقرب خدمة متوفرة</p>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                    <div class="modal-dialog">
                        <form class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title w-100 text-center fw-bolder fs-2" id="backDropModalTitle">بحث متقدم</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body py-0">
                                <div class="input-wrapper my-3 input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="bx bx-search-alt bx-xs text-muted"></i></span>
                                    <input type="text" class="form-control form-control-lg"
                                           placeholder="ادخل اسم الخدمة او اسم موفر الخدمة" aria-label="Search"
                                           aria-describedby="basic-addon1">
                                    <span class="input-group-text p-0" id="basic-addon1"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="selectpickerIcons" class="form-label fs-5 fw-bolder">الخدمة</label>
                                        <select class="selectpicker w-100 show-tick" id="selectpickerIcons"
                                                data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                                            <option data-icon="bx bx-list-check">الكل</option>
                                            <option data-icon="bx bx-plug">كهرباء</option>
                                            <option data-icon="bx bx-devices">تقنية</option>
                                            <option data-icon="bx bx-heart">صحة</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="selectpickerIcons" class="form-label fs-5 fw-bolder">ترتيب
                                            حسب</label>
                                        <select class="selectpicker w-100 show-tick" id="selectpickerIcons"
                                                data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                                            <option data-icon="bx bx-rename">الاسم</option>
                                            <option data-icon="bx bx-current-location">الاقرب</option>
                                            <option data-icon="bx bx-star">اجمالي التقييمات</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="selectpickerBasic"
                                               class="form-label fs-5 fw-bolder">المحافظة</label>
                                        <select class="selectpicker w-100 show-tick" id="selectpickerBasic"
                                                data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                                            <option>الكل</option>
                                            <option>حضرموت</option>
                                            <option>المهرة</option>
                                            <option>عدن</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="selectpickerBasic" class="form-label fs-5 fw-bolder">المدينة</label>
                                        <select class="selectpicker w-100 show-tick" id="selectpickerBasic"
                                                data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default">
                                            <option>الكل</option>
                                            <option>المكلا</option>
                                            <option>فوه</option>
                                            <option>الشحر</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
{{--                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">الغاء</button>--}}
                                <button type="button" class="btn btn-primary w-100">
                                    <span class="tf-icons bx bx-search"></span>&nbsp; بحث
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Help Center Header -->

                <!-- Search services -->
                <div class="help-center-popular-articles py-5">
                    <div class="container-xl">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header flex-grow-0">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="../../assets/img/avatars/9.png" alt="User" class="rounded-circle">
                                            </div>
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                <div class="me-2">
                                                    <h5 class="mb-0 fw-bolder">أسامة هادي</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="img-fluid" src="../../assets/img/backgrounds/event.jpg" alt="Card image cap">
                                    <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                        <h5 class="mb-0 fw-bold py-2">تقنية</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-truncate text-center fs-3 fw-bolder">هندسة مكيفات</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="card-actions d-flex justify-content-around w-100 fs-4">
                                                <a href="javascript:;" class="text-muted me-3"><i class="bx bx-star me-1 fs-4"></i> 236</a>
                                                <a href="javascript:;" class="text-muted"><i class="bx bx-cart me-1 fs-4"></i> 12</a>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-5">
                                            <a href="{{ route('service')}}" class="btn btn-primary mx-auto" role="button">وصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header flex-grow-0">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="../../assets/img/avatars/1.png" alt="User" class="rounded-circle">
                                            </div>
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                <div class="me-2">
                                                    <h5 class="mb-0 fw-bolder">أسامة هادي</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="img-fluid" src="../../assets/img/backgrounds/7.jpg" alt="Card image cap">
                                    <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                        <h5 class="mb-0 fw-bold py-2">تقنية</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-truncate text-center fs-3 fw-bolder">هندسة مكيفات</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="card-actions d-flex justify-content-around w-100 fs-4">
                                                <a href="javascript:;" class="text-muted me-3"><i class="bx bx-star me-1 fs-4"></i> 236</a>
                                                <a href="javascript:;" class="text-muted"><i class="bx bx-cart me-1 fs-4"></i> 12</a>
                                            </div>
                                            {{--                                            <div class="dropup d-none d-sm-block">--}}
                                            {{--                                                <button class="btn p-0" type="button" id="sharedList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--                                                    <i class="bx bx-dots-vertical"></i>--}}
                                            {{--                                                </button>--}}
                                            {{--                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sharedList">--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>

                                        <div class="d-flex mt-5">
                                            <a href="javascript:;" class="btn btn-primary mx-auto" role="button">وصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header flex-grow-0">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="../../assets/img/avatars/9.png" alt="User" class="rounded-circle">
                                            </div>
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                <div class="me-2">
                                                    <h5 class="mb-0 fw-bolder">أسامة هادي</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="img-fluid" src="../../assets/img/backgrounds/3.jpg" alt="Card image cap">
                                    <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                        <h5 class="mb-0 fw-bold py-2">تقنية</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-truncate text-center fs-3 fw-bolder">هندسة مكيفات</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="card-actions d-flex justify-content-around w-100 fs-4">
                                                <a href="javascript:;" class="text-muted me-3"><i class="bx bx-star me-1 fs-4"></i> 236</a>
                                                <a href="javascript:;" class="text-muted"><i class="bx bx-cart me-1 fs-4"></i> 12</a>
                                            </div>
                                            {{--                                            <div class="dropup d-none d-sm-block">--}}
                                            {{--                                                <button class="btn p-0" type="button" id="sharedList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--                                                    <i class="bx bx-dots-vertical"></i>--}}
                                            {{--                                                </button>--}}
                                            {{--                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sharedList">--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>

                                        <div class="d-flex mt-5">
                                            <a href="javascript:;" class="btn btn-primary mx-auto" role="button">وصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header flex-grow-0">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="../../assets/img/avatars/9.png" alt="User" class="rounded-circle">
                                            </div>
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                <div class="me-2">
                                                    <h5 class="mb-0 fw-bolder">أسامة هادي</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="img-fluid" src="../../assets/img/backgrounds/5.jpg" alt="Card image cap">
                                    <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                        <h5 class="mb-0 fw-bold py-2">تقنية</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-truncate text-center fs-3 fw-bolder">هندسة مكيفات</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="card-actions d-flex justify-content-around w-100 fs-4">
                                                <a href="javascript:;" class="text-muted me-3"><i class="bx bx-star me-1 fs-4"></i> 236</a>
                                                <a href="javascript:;" class="text-muted"><i class="bx bx-cart me-1 fs-4"></i> 12</a>
                                            </div>
                                            {{--                                            <div class="dropup d-none d-sm-block">--}}
                                            {{--                                                <button class="btn p-0" type="button" id="sharedList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--                                                    <i class="bx bx-dots-vertical"></i>--}}
                                            {{--                                                </button>--}}
                                            {{--                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sharedList">--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>

                                        <div class="d-flex mt-5">
                                            <a href="javascript:;" class="btn btn-primary mx-auto" role="button">وصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header flex-grow-0">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="../../assets/img/avatars/9.png" alt="User" class="rounded-circle">
                                            </div>
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                <div class="me-2">
                                                    <h5 class="mb-0 fw-bolder">أسامة هادي</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="img-fluid" src="../../assets/img/backgrounds/8.jpg" alt="Card image cap">
                                    <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                        <h5 class="mb-0 fw-bold py-2">تقنية</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-truncate text-center fs-3 fw-bolder">هندسة مكيفات</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="card-actions d-flex justify-content-around w-100 fs-4">
                                                <a href="javascript:;" class="text-muted me-3"><i class="bx bx-star me-1 fs-4"></i> 236</a>
                                                <a href="javascript:;" class="text-muted"><i class="bx bx-cart me-1 fs-4"></i> 12</a>
                                            </div>
                                            {{--                                            <div class="dropup d-none d-sm-block">--}}
                                            {{--                                                <button class="btn p-0" type="button" id="sharedList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--                                                    <i class="bx bx-dots-vertical"></i>--}}
                                            {{--                                                </button>--}}
                                            {{--                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sharedList">--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>

                                        <div class="d-flex mt-5">
                                            <a href="javascript:;" class="btn btn-primary mx-auto" role="button">وصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header flex-grow-0">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="../../assets/img/avatars/9.png" alt="User" class="rounded-circle">
                                            </div>
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                <div class="me-2">
                                                    <h5 class="mb-0 fw-bolder">أسامة هادي</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="img-fluid" src="../../assets/img/backgrounds/10.jpg" alt="Card image cap">
                                    <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                        <h5 class="mb-0 fw-bold py-2">تقنية</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-truncate text-center fs-3 fw-bolder">هندسة مكيفات</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="card-actions d-flex justify-content-around w-100 fs-4">
                                                <a href="javascript:;" class="text-muted me-3"><i class="bx bx-star me-1 fs-4"></i> 236</a>
                                                <a href="javascript:;" class="text-muted"><i class="bx bx-cart me-1 fs-4"></i> 12</a>
                                            </div>
                                            {{--                                            <div class="dropup d-none d-sm-block">--}}
                                            {{--                                                <button class="btn p-0" type="button" id="sharedList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--                                                    <i class="bx bx-dots-vertical"></i>--}}
                                            {{--                                                </button>--}}
                                            {{--                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sharedList">--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>

                                        <div class="d-flex mt-5">
                                            <a href="javascript:;" class="btn btn-primary mx-auto" role="button">وصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header flex-grow-0">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="../../assets/img/avatars/9.png" alt="User" class="rounded-circle">
                                            </div>
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                <div class="me-2">
                                                    <h5 class="mb-0 fw-bolder">أسامة هادي</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="img-fluid" src="../../assets/img/backgrounds/16.jpg" alt="Card image cap">
                                    <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                        <h5 class="mb-0 fw-bold py-2">تقنية</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-truncate text-center fs-3 fw-bolder">هندسة مكيفات</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="card-actions d-flex justify-content-around w-100 fs-4">
                                                <a href="javascript:;" class="text-muted me-3"><i class="bx bx-star me-1 fs-4"></i> 236</a>
                                                <a href="javascript:;" class="text-muted"><i class="bx bx-cart me-1 fs-4"></i> 12</a>
                                            </div>
                                            {{--                                            <div class="dropup d-none d-sm-block">--}}
                                            {{--                                                <button class="btn p-0" type="button" id="sharedList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--                                                    <i class="bx bx-dots-vertical"></i>--}}
                                            {{--                                                </button>--}}
                                            {{--                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sharedList">--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>

                                        <div class="d-flex mt-5">
                                            <a href="javascript:;" class="btn btn-primary mx-auto" role="button">وصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header flex-grow-0">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="../../assets/img/avatars/9.png" alt="User" class="rounded-circle">
                                            </div>
                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                <div class="me-2">
                                                    <h5 class="mb-0 fw-bolder">أسامة هادي</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="img-fluid" src="../../assets/img/backgrounds/18.jpg" alt="Card image cap">
                                    <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center p-1">
                                        <h5 class="mb-0 fw-bold py-2">تقنية</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-truncate text-center fs-3 fw-bolder">هندسة مكيفات</h5>
                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <div class="card-actions d-flex justify-content-around w-100 fs-4">
                                                <a href="javascript:;" class="text-muted me-3"><i class="bx bx-star me-1 fs-4"></i> 236</a>
                                                <a href="javascript:;" class="text-muted"><i class="bx bx-cart me-1 fs-4"></i> 12</a>
                                            </div>
                                            {{--                                            <div class="dropup d-none d-sm-block">--}}
                                            {{--                                                <button class="btn p-0" type="button" id="sharedList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                            {{--                                                    <i class="bx bx-dots-vertical"></i>--}}
                                            {{--                                                </button>--}}
                                            {{--                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sharedList">--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
                                            {{--                                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>

                                        <div class="d-flex mt-5">
                                            <a href="javascript:;" class="btn btn-primary mx-auto" role="button">وصول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Search services -->

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mb-5">
                        <li class="page-item first">
                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                        </li>
                        <li class="page-item prev">
                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">2</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0);">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">5</a>
                        </li>
                        <li class="page-item next">
                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                        </li>
                        <li class="page-item last">
                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
@endsection
