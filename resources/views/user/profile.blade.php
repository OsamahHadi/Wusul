@extends(Auth::user()->type==0?'layouts.app':'layouts.dashboard')

@section('extra-style')
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-help-center.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
@endsection

@section('content')

    <div class="container-xxl flex-grow-1">
        <div class="container-xxl flex-grow-1 container-p-y px-sm-2 px-0">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">الملف الشخصي /</span> البيانات الشخصية
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
                                @if($user->profile->image))
                                    <img src="{{asset('assets/images/users/'.$user->profile->image)}}" alt="" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                                @else
                                    <img src="{{ asset('img/user1.png') }}" alt="" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                                @endif
                            </div>
                            <div class="flex-grow-1 mt-3 mt-sm-5">
                                <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                    <div class="user-profile-info">
                                        <h4>{{ $user->name }}</h4>
                                        <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                            <li class="list-inline-item fw-semibold">
                                                <i class='bx bx-pen'></i>
                                                @if($user->type==1)
                                                    مدير النظام
                                                @elseif($user->type==2)
                                                    موفر خدمة
                                                @else
                                                    مستخدم
                                                @endif
                                            </li>
                                            <li class="list-inline-item fw-semibold">
                                                <i class='bx bx-map'></i>{{ ($user->address->state->name ?? '') . ' - ' . ($user->address->city->name ?? '') }}
                                            </li>
                                            <li class="list-inline-item fw-semibold">
                                                <i class='bx bx-calendar-alt'></i> أنظم {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                                            </li>
                                        </ul>
                                    </div>
                                    @if(Auth::id() == $user->id)
                                    <a href="{{ route('account') }}" class="btn btn-primary text-nowrap">
                                        <i class='bx bx-edit'></i> تعديل
                                    </a>
                                    @endif
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
                        <li class="nav-item"><a class="nav-link active"
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile.orders') }}"><i class='bx bx-grid-alt'></i> الطلبات</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('wallet') }}"><i class='bx bx-wallet'></i> المحفظة</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!--/ Navbar pills -->

            <!-- User Profile Content -->
            <div class="row">
                <div class="col-md-6 col-12">
                    <!-- About User -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <small class="text-muted text-uppercase">عام</small>
                            <ul class="list-unstyled mb-4 mt-3">
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">الأسم الكامل:</span> <span>{{ $user->name }}</span></li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">نوع الحساب:</span> <span>
                                        @if($user->type==1)
                                            مدير النظام
                                        @elseif($user->type==2)
                                            موفر خدمة
                                        @else
                                            مستخدم
                                        @endif
                                    </span></li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">الحالة:</span> <span>{{ $user->is_active?'نشط':'غير مفعل' }}</span></li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-data"></i><span class="fw-semibold mx-2">تاريخ الميلاد:</span> <span>{{ $user->profile->birthday ?? ' ----- ' }}</span></li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bxs-flag"></i><span class="fw-semibold mx-2">المحافظة:</span> <span>{{ $user->address->state->name ?? ' ----- ' }}</span></li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bxs-city"></i><span class="fw-semibold mx-2">المدينة:</span> <span>{{ $user->address->city->name ?? ' ----- ' }}</span></li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-current-location"></i><span class="fw-semibold mx-2">العنوان:</span> <span>{{ $user->address->description ?? ' ----- ' }}</span></li>
                                <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">تاريخ الانضمام:</span> <span>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ About User -->
                </div>
                <div class="col-md-6 col-12">
                    <div class="row">
                        <!-- Profile Overview -->
                        <div class="col-md-12 col-sm-6 col-12">
                            <div class=" card mb-4">
                                <div class="card-body pe-0">
                                    <small class="text-muted text-uppercase">التواصل</small>
                                    <ul class="list-unstyled mb-4 mt-3">
                                        <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-semibold mx-2">هاتف:</span> <span style="direction: ltr">{{ $user->profile->phone ?? ' ----- ' }}</span></li>
                                        <li class="d-flex align-items-center mb-3 flex-wrap"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2 text-nowrap">البريد الالكتروني:</span> <span class="text-primary">{{ $user->email }}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Profile Overview -->
                        <!-- Profile Overview -->
                        <div class="col-md-12 col-sm-6 col-12">
                            <div class=" card mb-4">
                                <div class="card-body">
                                    <small class="text-muted text-uppercase">حسابات التواصل الاجتماعي</small>
                                    <ul class="list-unstyled mt-3 mb-0">
                                        @isset($user->social->facebook)
                                        <li class="d-flex align-items-center mb-3"><i class="bx bxl-facebook"></i><a href="//{{ $user->social->facebook }}" target="_blank" class="fw-semibold mx-2 link-primary">فيس بوك</a></li>
                                        @endisset
                                        @isset($user->social->twitter)
                                        <li class="d-flex align-items-center mb-3"><i class='bx bxl-twitter'></i><a href="//{{ $user->social->twitter }}" target="_blank" class="fw-semibold mx-2 link-primary">تويتر</a></li>
                                        @endisset
                                        @isset($user->social->instagram)
                                        <li class="d-flex align-items-center mb-3"><i class="bx bxl-instagram"></i><a href="//{{ $user->social->instagram }}" target="_blank" class="fw-semibold mx-2 link-primary">اسنتاقرام</a></li>
                                        @endisset
                                        @isset($user->social->linkedin)
                                        <li class="d-flex align-items-center mb-3"><i class="bx bxl-linkedin"></i><a href="//{{ $user->social->linkedin }}" target="_blank" class="fw-semibold mx-2 link-primary">لينكداين</a></li>
                                        @endisset
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Profile Overview -->
                    </div>
                </div>
            </div>
            <!--/ User Profile Content -->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
@endsection
