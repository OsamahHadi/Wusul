@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-help-center.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css">

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
@endsection

@section('content')

    <div class="mt-5"></div>
    {{-- <div class="container-xxl flex-grow-1">
        <div class="container-xxl flex-grow-1 container-p-y px-sm-2 px-0">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">الملف الشخصي /</span> الطلبات
            </h4>


            <!-- Header -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="user-profile-header-banner">
                            <img src="../../assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
                        </div>
                        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                                @if(isset(Auth::user()->profile->image))
                                    <img src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}" alt="" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                                @else
                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                                @endif
                            </div>
                            <div class="flex-grow-1 mt-3 mt-sm-5">
                                <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                    <div class="user-profile-info">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                            <li class="list-inline-item fw-semibold">
                                                <i class='bx bx-pen'></i>
                                                @if($user->type==1)
                                                    مدير النظام
                                                @elseif(Auth::user()->type==2)
                                                    صاحب خدمة
                                                @else
                                                    مستخدم

                                                @endif
                                            </li>
                                            <li class="list-inline-item fw-semibold">
                                                <i class='bx bx-map'></i>{{ ($user->address->state->name??'') . ' - ' . ($user->address->city->name??'') }}
                                            </li>
                                            <li class="list-inline-item fw-semibold">
                                                <i class='bx bx-calendar-alt'></i>
                                                أنظم {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-primary text-nowrap">
                                        <i class='bx bx-edit'></i> تعديل
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Header -->

            <!-- Navbar pills -->
            <div class="row">
                <div class="col-md-12">

                    <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                        <li class="nav-item"><a class="nav-link"
                                                @if(Auth::id() == $user->id)
                                                href="{{ route('profile') }}"
                                                @else
                                                href="{{ route('profile.show',$user->id) }}"
                                @endif
                            ><i class='bx bx-user'></i> البيانات الشخصية</a>
                        </li>

                        @if($user->type == 2)
                            <li class="nav-item"><a class="nav-link"
                                                    @if(Auth::id() == $user->id)
                                                    href="{{ route('profile.service') }}"
                                                    @else
                                                    href="{{ route('profile.service.show', $user->id) }}"
                                    @endif
                                ><i class='bx bx-group'></i> الخدمات</a></li>
                        @endif
                        @if($user->type == 0 && Auth::id() == $user->id)
                            <li class="nav-item"><a class="nav-link active" href="{{ route('profile.orders') }}"><i class='bx bx-grid-alt'></i> الطلبات</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('profile.wallet') }}"><i class='bx bx-wallet'></i> المحفظة</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!--/ Navbar pills -->

            <!-- User Profile Content -->
            <div class="row">
                <div class="card">
                    <div class="row d-sm-inline-flex mx-2 pt-3">
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">بحث</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                                <input type="text" class="form-control" placeholder="بحث..." aria-label="Search..." aria-describedby="basic-addon-search31">
                                <span class="input-group-text btn btn-primary" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">نوع الخدمة</label>
                            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx"
                                    data-tick-icon="bx-check" data-style="btn-default">
                                <option data-icon="bx bx-list-check">الكل</option>
                                <option data-icon="bx bx-user">كهرباء</option>
                                <option data-icon="bx bx-user-pin">تقنية</option>
                                <option data-icon="bx bxs-user-account">صحة</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">ترتيب حسب</label>
                            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx"
                                    data-tick-icon="bx-check" data-style="btn-default">
                                <option data-icon="bx bx-rename">الاسم</option>
                                <option data-icon="bx bxs-watch">تاريخ التسجيل</option>
                                <option data-icon="bx bx-star">اجمالي التقييمات</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">حالة الخدمة</label>
                            <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx"
                                    data-tick-icon="bx-check" data-style="btn-default">
                                <option data-icon="bx bx-list-check">الكل</option>
                                <option data-icon="bx bx-check">مفعلة</option>
                                <option data-icon="bx bx-block">متوقفة</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="nav-align-top">

                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover mb-5">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>أسم الخدمة</th>
                                        <th>نوع الخدمة</th>
                                        <th>اسم موفر الخدمة</th>
                                        <th>تاريخ الطلب</th>
                                        <th>تاريخ التسليم المتوقع</th>
                                        <th>الحالة</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td> تصميم مواقع ويب </td>
                                        <td><span class="badge bg-label-primary fs-6 me-1">برمجة</span></td>
                                        <td>عبدالهادي ديان</td>
                                        <td>2022-05-12</td>
                                        <td>2022-05-12</td>
                                        <td><span class="badge bg-success fs-6 me-1">مكتمل</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td> تصميم مواقع ويب </td>
                                        <td><span class="badge bg-label-primary fs-6 me-1">برمجة</span></td>
                                        <td>عبدالهادي ديان</td>
                                        <td>2022-05-12</td>
                                        <td>2022-05-12</td>
                                        <td><span class="badge bg-label-warning fs-6 me-1">انتظار التاكيد</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td> تصميم مواقع ويب </td>
                                        <td><span class="badge bg-label-primary fs-6 me-1">برمجة</span></td>
                                        <td>عبدالهادي ديان</td>
                                        <td>2022-05-12</td>
                                        <td>2022-05-12</td>
                                        <td><span class="badge bg-warning fs-6 me-1">انتظار الدفع</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td> تصميم مواقع ويب </td>
                                        <td><span class="badge bg-label-primary fs-6 me-1">برمجة</span></td>
                                        <td>عبدالهادي ديان</td>
                                        <td>2022-05-12</td>
                                        <td>2022-05-12</td>
                                        <td><span class="badge bg-danger fs-6 me-1">مرفوض</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td> تصميم مواقع ويب </td>
                                        <td><span class="badge bg-label-primary fs-6 me-1">برمجة</span></td>
                                        <td>عبدالهادي ديان</td>
                                        <td>2022-05-12</td>
                                        <td>2022-05-12</td>
                                        <td><span class="badge bg-primary fs-6 me-1">انتظار التسليم</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination my-5 justify-content-center">
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
            <!--/ User Profile Content -->
        </div>
    </div> --}}
    <livewire:orders-filter/>
@endsection

@section('scripts')
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
@endsection
