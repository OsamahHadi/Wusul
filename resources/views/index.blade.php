@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-help-center.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/swiper/swiper.css">
    <link rel="stylesheet" href="../../assets/vendor/css/pages/ui-carousel.css">
    <link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}">
@endsection

@section('content')
    <div class="container-fluid flex-grow-1 pt-2 py-0 px-0">
        <div class="container-fluid flex-grow-1 container-p-y py-0 px-0 overflow-hidden">
            <section class="banner-area align-middle"
                     style="background-image: url({{ asset('img/back.png') }}); background-color: #8490ff; min-height: 80vh !important;">

                <div class="row fullscreen align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-6 mt-5 pt-5 banner-left text-center">

                        <h1 style="color: #fed01b; font-size: 60px" class="fw-bolder">منصة وصول للخدمات </h1>
                        <h2 class="text-white fs-3">
                            منصة كل مواطن وزائر
                        </h2>
                        <button onclick="window.location='{{ route('services') }}';" type="button" class="mt-3 btn btn-primary fs-5">أكتشف المزيد</button>

                    </div>
                    <div class="col-lg-6 col-md-6 my-lg-5 py-lg-5 my-5 banner-right text-center">
                        <img class="img-fluid" src="img/herooo-img.png" alt="">
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="help-center-popular-articles py-5">
                <div class="container-xl center position-relative">
                    <div class="d-flex justify-content-between">
                        <h4 class="col mb-5 fs-3">تصفح الخدمات المتوفرة</h4>
                        <a href="/services" class="fs-4">
                            <span class="btn px-0 text-primary align-middle me-1 fs-5">تصفح المزيد</span>
                            <i class="bx bx-right-arrow-circle scaleX-n1-rtl fs-5"></i>
                        </a>
                    </div>
                    <div class="row">

                        @forelse($services as $service)

                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-4">
                            <div class="card shadow h-100">
                                <div class="card-header flex-grow-0">
                                    <div class="d-flex">
                                        <div class="avatar flex-shrink-0 me-3">
                                                 @if($service->user->profile->image)
                                                        <img src="{{asset('assets/images/users/'.$service->user->profile->image)}}" alt="" class="w-px-40 h-100 rounded-circle">

                                                    @else

                                                        <img src="{{ asset('img/user1.png') }}" alt="User" class="rounded-circle">
                                                    @endif
                                        </div>
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                            <a href="{{ route('profile.show',$service->user->id) }}" target="_blank" class="me-2">
                                                <h5 class="mb-0">{{$service->user->name}}</h5>
                                                <small class="text-muted"><span class="tf-icons bx bx-calendar-edit"></span> {{\Carbon\Carbon::parse($service->created_at)->diffForHumans()}} </small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                                                            @if($service->image)

                                                <img class="img-fluid h-px-200" src="{{ asset("{$service->path}$service->image ") }}" alt="Card image cap">
                                            @else

                                            <img class="img-fluid h-px-200" src="../../assets/img/backgrounds/event.jpg" alt="Card image cap">
                                            @endif
                                <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center">
                                    <h5 class="mb-0 text-dark"><span class="badge bg-label-primary pb-3 px-3 fs-6">{{$service->category->name}}</span></h5>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-center fs-5 fw-bold mb-4">{{$service->name}}</h5>
                                    <div class="d-flex align-items-center justify-content-center my-1 gap-2">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="{{route('service.details',$service->id)}}">
                                        <button type="button" class="btn btn-primary fs-5 px-3">
                                            <span class="tf-icons bx bx-user-check"></span>&nbsp; وصول
                                        </button>
                                        </a>
                                    </div>
                                    <div class="mt-3 d-flex fs-6 align-items-center justify-content-around">
                                        <a href="#" class="text-muted me-3" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                           data-bs-placement="bottom" data-bs-html="true" title=""
                                           data-bs-original-title="اجمالي الطلبات">
                                            <i class="bx bx-cart me-1 fs-4"></i> {{count($service->orders)}}</a>
                                        <a href="#" class="text-muted" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                           data-bs-placement="bottom" data-bs-html="true" title=""
                                           data-bs-original-title="اجمالي التقييمات"><i class="bx bx-star me-1 fs-4"></i> {{count($service->rating)}}</a>
                                        <a href="#" class="text-muted" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                           data-bs-placement="bottom" data-bs-html="true" title=""
                                           data-bs-original-title="وقت التسليم التقريبي"><i class="bx bx-time me-1 fs-4"></i> {{$service->interval}}</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Keep Learning -->
            <div class="help-center-keep-learning py-5">
                <div class="container-xl">
                    <h4 class="text-center fs-3 mb-5">كيفية استخدام المنصة</h4>
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="row">
                                <div class="col-md-4 mb-md-0 mb-4 text-center">
                                    <img src="../../assets/img/icons/unicons/laptop.png" class="mb-2" height="50"
                                         alt="Help center blog">
                                    <h5 class="my-3">قم بالتسجيل في المنصة</h5>
                                    <p class="mb-1"> قم بأنشاء حساب على المنصة وتعبئة البيانات المطلوبة. </p>
                                    <a href="pages-help-center-categories.html"
                                       class="d-flex align-items-center justify-content-center mt-2">
                                        <span class="align-middle me-1">وصول</span>
                                        <i class="bx bx-right-arrow-circle scaleX-n1-rtl"></i>
                                    </a>
                                </div>
                                <div class="col-md-4 mb-md-0 mb-4 text-center">
                                    <img src="../../assets/img/icons/unicons/bulb.png" class="mb-2" height="50"
                                         alt="Help center inspiration">
                                    <h5 class="my-3">ابحث عن الخدمة المناسبة لك</h5>
                                    <p class="mb-1"> قم بالبحث في المنصة عن الخدمة المناسبة لك وفي المكان المناسب
                                        والوقت المناسب </p>
                                    <a href="pages-help-center-categories.html"
                                       class="d-flex align-items-center justify-content-center mt-2">
                                        <span class="align-middle me-1">وصول</span>
                                        <i class="bx bx-right-arrow-circle scaleX-n1-rtl"></i></a>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="../../assets/img/icons/unicons/community.png" class="mb-2" height="50"
                                         alt="Help center inspiration">
                                    <h5 class="my-3">قم بطلب الخدمة</h5>
                                    <p class="mb-1"> قم بطلب الخدمة من موفر الخدمة الذي يقوم بتوفير هذه الخدمة. </p>
                                    <a href="pages-help-center-categories.html"
                                       class="d-flex align-items-center justify-content-center mt-2">
                                        <span class="align-middle me-1">وصول</span>
                                        <i class="bx bx-right-arrow-circle scaleX-n1-rtl"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Keep Learning -->

            <!-- Help Area -->
            <div class="help-center-contact-us help-center-bg-alt">
                <div class="container-xl">
                    <div class="row justify-content-center py-5 my-3">
                        <div class="col-md-8 col-lg-6 text-center">
                            <h4 class="fs-3 mb-5">هل تحتاج المساعدة</h4>
                            <p class="mb-4"> يمكنك التواصل معنا للاستفسارات وحل الصعوبات التي تواجهكم في منصتنا
                                <br> وسيتم الرد في اسرع وقت
                            </p>
                            <div class="d-flex justify-content-center flex-wrap gap-4">
                                <a href="javascript:void(0);" class="btn btn-label-primary">تعرف عنا</a>
                                <a href="javascript:void(0);" class="btn btn-label-primary">التواصل معنا</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Help Area -->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="../../assets/vendor/libs/swiper/swiper.js"></script>
    <script src="../../assets/js/ui-carousel.js"></script>
    <script>
        //Books Scroll Slider
        const booksize = document.querySelector('.slider .book').clientWidth;
        const buttonRight = document.querySelectorAll('.slideRight');
        const buttonLeft = document.querySelectorAll('.slideLeft');

        buttonRight.forEach(element => {
            element.addEventListener('click', (e) => {
                e.preventDefault();
                element.parentElement.querySelector('.slider').scrollLeft += (booksize);
            });
        });

        buttonLeft.forEach(element => {
            element.addEventListener('click', (e) => {
                e.preventDefault();
                element.parentElement.querySelector('.slider').scrollLeft -= (booksize);
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ele = document.getElementById('drager');
            ele.style.cursor = 'grab';

            let pos = { top: 0, left: 0, x: 0, y: 0 };

            const mouseDownHandler = function (e) {
                ele.style.cursor = 'grabbing';
                ele.style.userSelect = 'none';

                pos = {
                    left: ele.scrollLeft,
                    top: ele.scrollTop,
                    // Get the current mouse position
                    x: e.clientX,
                    y: e.clientY,
                };

                document.addEventListener('mousemove', mouseMoveHandler);
                document.addEventListener('mouseup', mouseUpHandler);
            };

            const mouseMoveHandler = function (e) {
                // How far the mouse has been moved
                const dx = e.clientX - pos.x;
                const dy = e.clientY - pos.y;

                // Scroll the element
                ele.scrollTop = pos.top - dy;
                ele.scrollLeft = pos.left - dx;
            };

            const mouseUpHandler = function () {
                ele.style.cursor = 'grab';
                ele.style.removeProperty('user-select');

                document.removeEventListener('mousemove', mouseMoveHandler);
                document.removeEventListener('mouseup', mouseUpHandler);
            };

            // Attach the handler
            ele.addEventListener('mousedown', mouseDownHandler);
        });
    </script>
@endsection
