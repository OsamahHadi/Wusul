<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="rtl" data-theme="theme-semi-dark"
      data-assets-path="assets/" data-template="vertical-menu-template-semi-dark">


<!-- layouts-without-menu.html , Sat, 26 Mar 2022 16:50:53 GMT -->
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
<meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title','منصة وصول')</title>


    <meta name="description"
          content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!"/>
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-semi-dark.css') }}"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}"/>


    <!-- Page CSS -->

        <livewire:styles />

 {{-- @vite(['resources/js/app.js']) --}}
{{-- <script src="{{ asset('js/echo.js') }}"></script> --}}

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
{{--    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>--}}
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    {{-- pusher --}}
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');


    </script>
             {{-- Pusher.logToConsole = true;

        var pusher = new Pusher('360e737254380879929e', {
            cluster: 'mt1'
        }); --}}

    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

    @yield('extra-style')

</head>

<body>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
        <!-- Aside -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

            <div class="app-brand demo h-px-100 zindex-5">
                <a href="{{ route('home') }}" class="app-brand-link w-100 d-flex justify-content-center flex-wrap">
                    <img src="{{ asset('img/herooo-img.png') }}" class="w-px-40 h-auto p-1" alt="" srcset="">
                    <span class="ms-1 fs-4 fw-bold text-white">وصول</span>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1 mt-4 mb-3">
                @if(Auth::user()->admin())
                <!-- Dashboards -->
                <li class="menu-item {{Request::url() === route('admin.home') ? 'active' : ''}}">
                    <a href="{{ route('admin.home') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div>لوحة التحكم</div>
                    </a>
                </li>
                 <!-- Misc -->
                <li class="menu-header text-uppercase text-white fs-6"><span class="menu-header-text">أدارة العمليات</span></li>
                <li class="menu-item {{Request::url() === route('admin.users') ? 'active' : ''}}">
                    <a href="{{route('admin.users')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div>المستخدمين</div>
                    </a>
                </li>
                <li class="menu-item {{Request::url() === route('admin.services') ? 'active' : ''}}">
                    <a href="{{route('admin.services')}}"
                       class="menu-link">
                        <i class="menu-icon tf-icons bx bx-grid-alt"></i>
                        <div>الخدمات</div>
                    </a>
                </li>

                <li class="menu-header text-uppercase text-white fs-6"><span class="menu-header-text">أدارة العمليات</span></li>
                <li class="menu-item {{Request::url() === route('payments') ? 'active' : ''}}">
                    <a href="{{route('payments')}}"
                       class="menu-link">
                        <i class="menu-icon tf-icons bx bx-money"></i>
                        <div>أدارة الفواتير</div>
                    </a>
                </li>
                <li class="menu-item {{Request::url() === route('reports') ? 'active' : ''}}">
                    <a href="{{route('reports')}}"
                       class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-report"></i>
                        <div>أدارة البلاغات</div>
                    </a>
                </li>
                <li class="menu-header text-uppercase text-white fs-6"><span class="menu-header-text">أدارة الطلبات</span></li>
                <li class="menu-item {{Request::url() === route('orders') ? 'active' : ''}}">
                    <a href="{{route('orders')}}"
                       class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-archive-out"></i>
                        <div>الطلبات</div>
                    </a>
                </li>

                <li class="menu-header text-uppercase text-white fs-6"><span class="menu-header-text">أعدادات المنصة</span></li>
                <li class="menu-item {{Request::url() === route('wallet') ? 'active' : ''}}">
                    <a href="{{route('wallet')}}"
                       class="menu-link">
                        <i class="menu-icon tf-icons bx bx-money"></i>
                        <div>المحفظة</div>
                    </a>
                </li>
                <li class="menu-item {{Request::url() === route('categories') ? 'active' : ''}}">
                    <a href="{{route('categories')}}"
                       class="menu-link">
                        <i class="menu-icon tf-icons bx bx-file"></i>
                        <div>أدارة المجالات</div>
                    </a>
                </li>
                <li class="menu-item {{Request::url() === route('states') ? 'active' : ''}}">
                    <a href="{{route('states')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-city"></i>
                        <div>أدارة المحافظات</div>
                    </a>
                </li>
                <li class="menu-item {{Request::url() === route('cities') ? 'active' : ''}}">
                    <a href="{{route('cities')}}"
                       class="menu-link">
                        <i class="menu-icon tf-icons bx bx-current-location"></i>
                        <div>أدارة المدن</div>
                    </a>
                </li>
                @endif

                @if(Auth::user()->userServiceProvider())
                <!-- Service Provider -->
                <li class="menu-item {{Request::url() === route('serviceProvider.home') ? 'active' : ''}}">
                    <a href="{{ route('serviceProvider.home') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div>لوحة التحكم</div>
                    </a>
                </li>
                <!-- Orders -->
                <li class="menu-header text-uppercase text-white fs-6"><span class="menu-header-text">أدارة الطلبات</span></li>

                <li class="menu-item {{Request::url() === route('orders') ? 'active' : ''}}">
                    <a href="{{route('orders')}}"

                       class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-archive-out"></i>
                        <div>الطلبات</div>
                    </a>
                </li>
                <li class="menu-header text-uppercase text-white fs-6"><span class="menu-header-text">أدارة الخدمات</span></li>

                <li class="menu-item {{Request::url() === route('service') ? 'active' : ''}}">
                    <a href="{{route('service')}}" class="menu-link">

                        <i class="menu-icon tf-icons bx bx-grid-alt"></i>
                        <div>الخدمات</div>
                    </a>
                </li>
                <li class="menu-item {{Request::url() === route('service.create') ? 'active' : ''}}">
                    <a href="{{route('service.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-add-to-queue"></i>
                        <div>اضافة خدمة</div>
                    </a>
                </li>
                <!-- Money -->
                <li class="menu-header text-uppercase text-white fs-6"><span class="menu-header-text">أدارة العمليات</span></li>
                <li class="menu-item">
                    <a href="{{route('wallet')}}"
                       class="menu-link">
                        <i class="menu-icon tf-icons bx bx-money"></i>
                        <div>المحفظة</div>
                    </a>
                </li>
                @endif
            </ul>
        </aside>
        <!-- / Aside -->

        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                 id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">


                        @auth()
                            <ul class="navbar-nav flex-row align-items-center ms-auto">

                                <!-- Quick links  -->
                                <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        <i class="bx bx-grid-alt bx-sm"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end py-0">
                                        <div class="dropdown-menu-header border-bottom">
                                            <div class="dropdown-header d-flex align-items-center py-3">
                                                <h5 class="text-body mb-0 me-auto">اختصارات</h5>
                                                <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add shortcuts" aria-label="Add shortcuts"><i class="bx bx-sm bx-plus-circle"></i></a>
                                            </div>
                                        </div>
                                        <div class="dropdown-shortcuts-list scrollable-container ps ps__rtl ps--active-y">
                                            <div class="row row-bordered overflow-visible g-0">
                                                <div class="dropdown-shortcuts-item col">
                                      <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                        <i class="bx bx-calendar fs-4"></i>
                                      </span>
                                                    <a href="app-calendar.html" class="stretched-link">التقويم</a>
                                                    <small class="text-muted mb-0">المواعيد</small>
                                                </div>
                                                <div class="dropdown-shortcuts-item col">
                                      <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                        <i class="bx bx-food-menu fs-4"></i>
                                      </span>
                                                    <a href="app-invoice-list.html" class="stretched-link">الحساب</a>
                                                    <small class="text-muted mb-0">ادارة الحسابات</small>
                                                </div>
                                            </div>
                                            <div class="row row-bordered overflow-visible g-0">
                                                <div class="dropdown-shortcuts-item col">
                                      <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                        <i class="bx bx-user fs-4"></i>
                                      </span>
                                                    <a href="app-user-list.html" class="stretched-link">المستخدمين</a>
                                                    <small class="text-muted mb-0">ادارة المستخدمين</small>
                                                </div>
                                                <div class="dropdown-shortcuts-item col">
                                      <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                        <i class="bx bx-check-shield fs-4"></i>
                                      </span>
                                                    <a href="app-access-roles.html" class="stretched-link">ادارة الادوار</a>
                                                    <small class="text-muted mb-0">الصلاحيات</small>
                                                </div>
                                            </div>
                                            <div class="row row-bordered overflow-visible g-0">
                                                <div class="dropdown-shortcuts-item col">
                                      <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                        <i class="bx bx-pie-chart-alt-2 fs-4"></i>
                                      </span>
                                                    <a href="index-2.html" class="stretched-link">لوحة التحكم</a>
                                                    <small class="text-muted mb-0">الملف الشخصي</small>
                                                </div>
                                                <div class="dropdown-shortcuts-item col">
                                      <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                        <i class="bx bx-cog fs-4"></i>
                                      </span>
                                                    <a href="{{ route('account') }}" class="stretched-link">الاعدادات</a>
                                                    <small class="text-muted mb-0">اعدادات الحساب</small>
                                                </div>
                                            </div>
                                            <div class="row row-bordered overflow-visible g-0">
                                                <div class="dropdown-shortcuts-item col">
                                      <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                        <i class="bx bx-help-circle fs-4"></i>
                                      </span>
                                                    <a href="pages-help-center-landing.html" class="stretched-link">مركز الدعم</a>
                                                    <small class="text-muted mb-0">الاسئلة الشائعة</small>
                                                </div>
                                                <div class="dropdown-shortcuts-item col">
                                      <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                        <i class="bx bx-window-open fs-4"></i>
                                      </span>
                                                    <a href="modal-examples.html" class="stretched-link">قوائم</a>
                                                    <small class="text-muted mb-0">قوائم المستخدم</small>
                                                </div>
                                            </div>
                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 337px; height: 480px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 378px;"></div></div></div>
                                    </div>
                                </li>
                                <!-- Quick links -->

                                <!-- Notification -->
                                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        <i class="bx bx-bell bx-sm"></i>
{{--                                        <span class="badge bg-danger rounded-pill badge-notifications">5</span>--}}
                                    </a>
                                    <ul class="dropdown-menu py-0">
                                        <li class="dropdown-menu-header border-bottom">
                                            <div class="dropdown-header d-flex align-items-center py-3">
                                                <h5 class="text-body mb-0 me-auto">الاشعارات</h5>
                                                <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Mark all as read" aria-label="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                                            </div>
                                        </li>
                                        <li class="dropdown-notifications-list scrollable-container ps ps__rtl">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar">
                                                                <img src="assets/img/avatars/2.png" alt="" class="w-px-40 h-auto rounded-circle">
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1">New Message ✉️</h6>
                                                            <p class="mb-0">You have new message from Natalie</p>
                                                            <small class="text-muted">1h ago</small>
                                                        </div>
                                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: -13px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></li>
                                        <li class="dropdown-menu-footer border-top">
                                            <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center p-3">
                                                عرض جميع الاشعارات
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ Notification -->

                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">

                                            @if(isset(Auth::user()->profile->image))
                                                <img src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}" alt="" class="w-px-40 h-100 rounded-circle">
                                            @else
                                                <img src="{{ asset('img/user1.png') }}" alt="" class="w-px-40 h-auto rounded-circle">
                                            @endif
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="pages-account-settings-account.html">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">
                                                    @if(isset(Auth::user()->profile->image))
                                                            <img src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}"
                                                            alt="Profile" class="w-px-40 h-100 rounded-circle" id="">
                                                        @else
                                                    <img src="{{ asset('img/user.png') }}" alt="" class="w-px-40 h-100 rounded-circle">

                                                    @endif                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span class="fw-semibold d-block">{{Auth::user()->name}}</span>
                                                        <small class="text-muted"> {{Auth::user()->type==1?'مديرالنظام':'موفر خدمه'}}</small>

                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('home') }}">
                                                <i class="bx bx-home-circle me-2"></i>
                                                <span class="align-middle">لوحة التحكم</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('profile') }}">
                                                <i class="bx bx-user me-2"></i>
                                                <span class="align-middle">ملفي الشخصي</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('account') }}">
                                                <i class="bx bx-cog me-2"></i>
                                                <span class="align-middle">الاعدادت</span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('contact') }}">
                                                <i class="bx bx-support me-2"></i>
                                                <span class="align-middle">المساعدة</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('about') }}">
                                                <i class="bx bx-help-circle me-2"></i>
                                                <span class="align-middle">الاسئلة الشائعة</span>
                                            </a>
                                        </li>
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addreport">
                                            <i class="bx bx-support me-2"></i>
                                            <span class=>الابلاغ عن مشكله</span>
                                        </button>
                                        <li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">تسجيل الخروج</span>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ User -->


                            </ul>
                        @endauth

                        @guest()
                            <div class="d-flex flex-row align-items-center ms-auto">
                                <a href="{{ route('login') }}" class="btn btn-label-primary mx-1">تسجيل الدخول</a>
                                <a href="{{ route('register') }}" class="btn btn-dark mx-1">انشاء حساب</a>
                            </div>
                        @endguest


                    </ul>
                </div>


                <!-- Search Small Screens -->
                <div class="navbar-search-wrapper search-input-wrapper d-none">
                    <input type="text" class="form-control search-input container-xxl border-0"
                           placeholder="Search..." aria-label="Search...">
                    <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                </div>


            </nav>
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="container-xxl flex-grow-1 container-p-y">

                <!-- Content -->

                <div class="modal fade" id="addreport" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form id="formAccountSettings" method="POST" action="{{route('reports.add')}}" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                <hr class="my-0">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title fs-5 fw-bolder" id="modalToggleLabel">الابلاغ عن مشكلة </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <label for="exampleFormControlTextarea1" class="form-label">وصف
                                                المشكله</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="الوصف" name='message'></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-2 text-center">
                                        <button type="submit" class="btn btn-primary me-2"> حفظ</button>
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">إلغاء
                                        </button>
                                    </div>
                                    <div></div>
                                    <input type="hidden">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                    @yield('content')
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">

                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->


<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
const {Echo} import from "{{ asset('js/echo.js') }}"

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '360e737254380879929e',
    cluster: 'mt1',
    forceTLS: true


});
Echo.channel("orders{{Auth::id()}}")
        .listen('Message', (e) => {
            console.log(e);
        });

</script>
<!-- Page JS -->

<livewire:scripts />

<!-- / Layout wrapper -->
@yield('scripts')
</body>


<!-- layouts-without-menu.html , Sat, 26 Mar 2022 16:50:54 GMT -->
</html>
