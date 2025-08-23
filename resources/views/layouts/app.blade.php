<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="rtl" data-theme="theme-semi-dark" data-assets-path="assets/" data-template="vertical-menu-template-semi-dark">


<!-- layouts-without-menu.html , Sat, 26 Mar 2022 16:50:53 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title','منصة وصول')</title>

    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">


    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-semi-dark.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />


    <!-- Page CSS -->

    <!-- Helpers -->
    {{-- <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>--}}

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    {{-- pusher --}}
    {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script> --}}
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');

    </script>
    {{--
             Pusher.logToConsole = true;

        var pusher = new Pusher('e4b4e21e1f468b8bddf2', {
            cluster: 'mt1'
        }); --}}


    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

    @yield('extra-style')

    <livewire:styles />

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  layout-without-menu">
        <div class="layout-container">

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                        <!-- Logo -->
                        <div class="navbar-nav align-items-center text-nowrap">
                            <a href="{{ route('index') }}">
                                <span class="ms-1 fs-4 fw-bold text-dark">وصول</span>
                                <img src="{{ asset('img/herooo-img.png') }}" class="w-px-40 h-auto p-1" alt="" srcset="">
                            </a>
                        </div>
                        <!-- /Logo -->


                        <ul class="navbar-nav d-md-flex d-none flex-row align-items-center ms-5 fs-5 gap-3">

                            <li class="nav-item me-2 me-xl-0">
                                <a href="{{ route('services') }}" class="nav-link primary">الخدمات</a>
                            </li>

                            <li class="nav-item me-2 me-xl-0">
                                <a href="{{ route('contact') }}" class="nav-link">التواصل</a>
                            </li>

                            <li class="nav-item me-2 me-xl-0">
                                <a href="{{ route('about') }}" class="nav-link">من نحن</a>
                            </li>


                        </ul>

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
                                                <a href="#" class="stretched-link">الاعدادات</a>
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
                                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps__rail-y" style="top: 0px; right: 337px; height: 480px;">
                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 378px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Quick links -->

                            <!-- Notification -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="bx bx-bell bx-sm"></i>
{{--                                    <span class="badge bg-danger rounded-pill badge-notifications">5</span>--}}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end py-0">
                                    <li class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h5 class="text-body mb-0 me-auto">الاشعارات</h5>
                                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Mark all as read" aria-label="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                                        </div>
                                    </li>
                                    <li class="dropdown-notifications-list scrollable-container ps ps__rtl">
                                        <ul class="list-group list-group-flush">
{{--                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div class="flex-shrink-0 me-3">--}}
{{--                                                        <div class="avatar">--}}
{{--                                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="" class="w-px-40 h-auto rounded-circle">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-grow-1">--}}
{{--                                                        <h6 class="mb-1">Congratulation Lettie 🎉</h6>--}}
{{--                                                        <p class="mb-0">Won the monthly best seller gold badge</p>--}}
{{--                                                        <small class="text-muted">1h ago</small>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-shrink-0 dropdown-notifications-actions">--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div class="flex-shrink-0 me-3">--}}
{{--                                                        <div class="avatar">--}}
{{--                                                            <span class="avatar-initial rounded-circle bg-label-danger">CF</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-grow-1">--}}
{{--                                                        <h6 class="mb-1">Charles Franklin</h6>--}}
{{--                                                        <p class="mb-0">Accepted your connection</p>--}}
{{--                                                        <small class="text-muted">12hr ago</small>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-shrink-0 dropdown-notifications-actions">--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div class="flex-shrink-0 me-3">--}}
{{--                                                        <div class="avatar">--}}
{{--                                                            <img src="assets/img/avatars/2.png" alt="" class="w-px-40 h-auto rounded-circle">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-grow-1">--}}
{{--                                                        <h6 class="mb-1">New Message ✉️</h6>--}}
{{--                                                        <p class="mb-0">You have new message from Natalie</p>--}}
{{--                                                        <small class="text-muted">1h ago</small>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-shrink-0 dropdown-notifications-actions">--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div class="flex-shrink-0 me-3">--}}
{{--                                                        <div class="avatar">--}}
{{--                                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-cart"></i></span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-grow-1">--}}
{{--                                                        <h6 class="mb-1">Whoo! You have new order 🛒 </h6>--}}
{{--                                                        <p class="mb-0">ACME Inc. made new order $1,154</p>--}}
{{--                                                        <small class="text-muted">1 day ago</small>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-shrink-0 dropdown-notifications-actions">--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div class="flex-shrink-0 me-3">--}}
{{--                                                        <div class="avatar">--}}
{{--                                                            <img src="assets/img/avatars/9.png" alt="" class="w-px-40 h-auto rounded-circle">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-grow-1">--}}
{{--                                                        <h6 class="mb-1">Application has been approved 🚀 </h6>--}}
{{--                                                        <p class="mb-0">Your ABC project application has been approved.</p>--}}
{{--                                                        <small class="text-muted">2 days ago</small>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-shrink-0 dropdown-notifications-actions">--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div class="flex-shrink-0 me-3">--}}
{{--                                                        <div class="avatar">--}}
{{--                                                            <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-pie-chart-alt"></i></span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-grow-1">--}}
{{--                                                        <h6 class="mb-1">Monthly report is generated</h6>--}}
{{--                                                        <p class="mb-0">July monthly financial report is generated </p>--}}
{{--                                                        <small class="text-muted">3 days ago</small>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-shrink-0 dropdown-notifications-actions">--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div class="flex-shrink-0 me-3">--}}
{{--                                                        <div class="avatar">--}}
{{--                                                            <img src="assets/img/avatars/5.png" alt="" class="w-px-40 h-auto rounded-circle">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-grow-1">--}}
{{--                                                        <h6 class="mb-1">Send connection request</h6>--}}
{{--                                                        <p class="mb-0">Peter sent you connection request</p>--}}
{{--                                                        <small class="text-muted">4 days ago</small>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-shrink-0 dropdown-notifications-actions">--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div class="flex-shrink-0 me-3">--}}
{{--                                                        <div class="avatar">--}}
{{--                                                            <img src="assets/img/avatars/6.png" alt="" class="w-px-40 h-auto rounded-circle">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-grow-1">--}}
{{--                                                        <h6 class="mb-1">New message from Jane</h6>--}}
{{--                                                        <p class="mb-0">Your have new message from Jane</p>--}}
{{--                                                        <small class="text-muted">5 days ago</small>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-shrink-0 dropdown-notifications-actions">--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">--}}
{{--                                                <div class="d-flex">--}}
{{--                                                    <div class="flex-shrink-0 me-3">--}}
{{--                                                        <div class="avatar">--}}
{{--                                                            <span class="avatar-initial rounded-circle bg-label-warning"><i class="bx bx-error"></i></span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-grow-1">--}}
{{--                                                        <h6 class="mb-1">CPU is running high</h6>--}}
{{--                                                        <p class="mb-0">CPU Utilization Percent is currently at 88.63%,</p>--}}
{{--                                                        <small class="text-muted">5 days ago</small>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="flex-shrink-0 dropdown-notifications-actions">--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>--}}
{{--                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
                                        </ul>
                                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps__rail-y" style="top: 0px; right: -13px;">
                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                        </div>
                                    </li>
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
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">

                                        @if(isset(Auth::user()->profile->image))
                                        <img src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}" alt="" class="w-px-40 h-100 rounded-circle">
                                        @else
                                        <img src="{{ asset('img/user.png') }}" alt="" class="w-px-40 h-auto rounded-circle">
                                        @endif
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        @if(isset(Auth::user()->profile->image))
                                                        <img src="{{asset('assets/images/users/'.Auth::user()->profile->image)}}" alt="Profile" class="w-px-40 h-100 rounded-circle" id="">
                                                        @else
                                                        <img src="{{ asset('img/user.png') }}" alt="" class="w-px-40 h-auto rounded-circle">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"> {{Auth::user()->name}}</span>
                                                    <small class="text-muted">
                                                        @if(Auth::user()->type==1)
                                                        مدير النظام
                                                        @elseif(Auth::user()->type==2)
                                                        صاحب خدمة
                                                        @else
                                                        مستخدم

                                                        @endif
                                                    </small>


                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        @if(Auth::user()->type != 0)
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            <i class="bx bx-home-circle me-2"></i>
                                            <span class="align-middle">لوحة التحكم</span>
                                        </a>
                                        @endif
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
                                    @if(Auth::user()->type == 0)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('wallet') }}">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                                <span class="flex-grow-1 align-middle">المحفظة</span>
{{--                                                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>--}}
                                            </span>
                                        </a>
                                    </li>
                                    @endif
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
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                        <div class="d-md-flex d-none flex-row align-items-center ms-auto">
                            <a href="{{ route('login') }}" class="btn btn-label-primary mx-1 text-truncate">تسجيل الدخول</a>
                            <a href="{{ route('register') }}" class="btn btn-dark mx-1 text-truncate">انشاء حساب</a>
                        </div>
                        <button class="navbar-toggler d-md-none d-inline-block ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        @endguest
                    </div>

                    <div class="collapse navbar-collapse position-absolute top-100 start-0 w-100 pt-2" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 bg-white d-md-none d-inline-block w-100 ps-3">
                            <li class="nav-item me-2 me-xl-0">
                                <a href="{{ route('services') }}" class="nav-link primary">الخدمات</a>
                            </li>

                            <li class="nav-item me-2 me-xl-0">
                                <a href="{{ route('contact') }}" class="nav-link">التواصل</a>
                            </li>

                            <li class="nav-item me-2 me-xl-0">
                                <a href="{{ route('about') }}" class="nav-link">من نحن</a>
                            </li>
                            <li class="nav-item me-2 me-xl-0 mb-3">
                                <a href="{{ route('login') }}" class="btn btn-label-primary text-truncate mt-3 me-3">تسجيل الدخول</a>
                                <a href="{{ route('register') }}" class="btn btn-dark text-truncate mt-3">انشاء حساب</a>
                            </li>
                        </ul>
                    </div>


                </nav>
                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="content-wrapper">

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
                    <footer class="footer bg-dark" style="background-color: #000 !important;">
                        <div class="container-fluid container-p-x pt-5 pb-4">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 mb-4 mb-sm-5">
                                    <h4 class="fw-bolder mb-3 ps-5 ms-5"><a href="" target="_blank" class="footer-text">منصة وصول للخدمات</a></h4>
                                    <div class=" px-5 mx-5">
                                        <img src="{{ asset('img/herooo-img.png') }}" class="mx-3 h-px-100" alt="">
                                    </div>

                                    <p class="text-light mt-4 px-5 mx-5">
                                        منصة وصول ... هي منصة وطنية توفر على المواطن الوصول للخدمة المطلوبة بأسهل الطرق ومعرفة كيفية التعامل مع الخدمة.
                                    </p>
                                    <p class="text-light px-5 mx-5">
                                        جميع الحقوق محفوظة لدى
                                        <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="https://Wusul.com" target="_blank">فريق وصول </a>
                                        <script>
                                            document.write(new Date().getFullYear());

                                        </script> ©
                                    </p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 mb-4 mb-md-0">
                                    <h5 class="footer-text ps-md-0 ms-md-0 ps-5 ms-5">روابط</h5>
                                    <ul class="list-unstyled ps-md-0 ms-md-0 ps-5 ms-5">
                                        <li><a href="{{ route('index') }}" class="footer-link text-light d-block pb-2">الرئيسية</a></li>
                                        <li><a href="{{ route('services') }}" class="footer-link text-light d-block pb-2">الخدمات</a></li>
                                        <li><a href="{{ route('contact') }}" class="footer-link text-light d-block pb-2">التواصل</a></li>
                                        <li><a href="{{ route('about') }}" class="footer-link text-light d-block pb-2">من نحن</a></li>
                                        <li><a href="#" class="footer-link text-light d-block pb-2">الاسئلة الشائعة</a></li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 mb-4 mb-sm-0">
                                    <h5 class="footer-text ps-md-0 ms-md-0 ps-5 ms-5">تواصل</h5>
                                    <ul class="list-unstyled ps-md-0 ms-md-0 ps-5 ms-5">
                                        <li><a href="#" class="footer-link text-light d-block pb-2"><i class="bx bx-mail-send"></i> wusul@gmail.com </a></li>
                                        <li>
                                            <a href="#" class="footer-link text-light d-block pb-2"><i class="bx bx-mobile"></i> 770552517 </a>
                                        </li>
                                        <li><a href="#" class="footer-link text-light d-block pb-2"><i class="bx bx-phone"></i> 05000000 </a></li>
                                        <li><a href="#" class="footer-link text-light d-block pb-2"><i class="bx bxl-github"></i> wusul.github.com </a></li>
                                    </ul>
                                    <h5 class="footer-text px-sm-0 ps-md-0 ms-md-0 ps-5 ms-5">متابعتنا</h5>
                                    <div class="social-icon my-3 ps-md-0 ms-md-0 ps-5 ms-5">
                                        <a href="javascript:void(0)" class="btn btn-icon btn-sm text-white me-2"><i class="bx bxl-facebook"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-icon btn-sm text-white me-2"><i class="bx bxl-twitter"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-icon btn-sm text-white me-2"><i class="bx bxl-linkedin"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-icon btn-sm text-white"><i class="bx bxl-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>


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
    {{-- <script src='/js/app.js'></script> --}}
    <!-- endbuild -->

    <!-- Vendors JS -->

    <livewire:scripts />

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->





    @yield('scripts')


</body>


<!-- layouts-without-menu.html , Sat, 26 Mar 2022 16:50:54 GMT -->
</html>
