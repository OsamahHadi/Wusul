@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/ui-carousel.css') }}">
    <link rel="stylesheet" href="../../assets/vendor/libs/leaflet/leaflet.css">
    <script src="../../assets/vendor/js/helpers.js"></script>
    <style>
        .swiper-wrapper .swiper-slide {
            background-size: contain !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- User Card -->
                <div class="card mb-4 h-100">
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
                                    <small class="text-muted"> {{\Carbon\Carbon::parse($service->created_at)->diffForHumans()}} </small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class=" d-flex align-items-center flex-column">
                                  @if($service->image)

                                                <img class="img-fluid" src="{{ asset("{$service->path}$service->image ") }}" alt="Card image cap">
                                            @else

                                            <img class="img-fluid" src="../../assets/img/backgrounds/event.jpg" alt="Card image cap">
                                            @endif
                                <div class="user-info text-center mt-3">
                                    <h4 class="mb-2">{{$service->name}}</h4>
                                    <span class="badge bg-label-primary mt-3 pb-3 px-3 fs-6">{{$service->category->name}}</span>
                                </div>
                            </div>
                        </div>
                        @guest()
                        <div class="row justify-content-around flex-wrap my-4 mx-5">
                            <a href="{{route('order.create',$service->id)}}" class="btn btn-primary suspend-user">طلب الخدمة</a>
                        </div>
                        @endguest
                        @auth()
                            @if(Auth::id() == $service->user->id)
                            <div class="row justify-content-around flex-wrap my-4 mx-5">
                                <a href="{{route('service.edit',$service->id)}}" class="btn btn-primary suspend-user">تعديل الخدمة</a>
                            </div>
                            @elseif(Auth::user()->type == 0)
                                <div class="row justify-content-around flex-wrap my-4 mx-5">
                                    <a href="{{route('order.create',$service->id)}}" class="btn btn-primary suspend-user">طلب الخدمة</a>
                                </div>
                            @endif
                        @endauth

                        <div class="info-container">
                            <div class="row d-flex justify-content-around flex-wrap ms-lg-4 ms-md-0 ms-4">
                                <div class="col-md-12 col-sm-6 col-12 d-flex align-items-start mt-3 px-4 gap-3">
                                    <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-current-location fs-2"></i></span>
                                    <div>
                                        <span>الموقع </span>
                                        <h5 class="mb-0 text-primary">{{$service->address->state->name??''}} - {{$service->address->city->name??''}}-{{$service->address->description}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 col-12 d-flex align-items-start mt-4 px-4 gap-3">
                                    <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-customize fs-2"></i></span>
                                    <div class="row">
                                        <span>أجمالي الطلبات المنجزة</span>
                                        <h5 class="mb-0 text-primary">{{count($service->rating)}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 col-12 d-flex align-items-start mt-4 px-4 gap-3">
                                    <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-time fs-2"></i></span>
                                    <div>
                                        <span>وقت التسليم التقريبي</span>
                                        <h5 class="mb-0 text-primary">{{$service->interval}} </h5>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-6 col-12 d-flex align-items-start mt-4 px-4 gap-3">
                                    <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-star fs-2"></i></span>
                                    <div>
                                        <span>متوسط التقييمات</span>
                                        <h5 class="mb-0 text-center text-warning">
                                        @for($i = 0; $i < 4; $i++)
                                            @if($i<$service->stars)
                                            <i class="bx bxs-star bx-sm"></i>
                                            @else
                                            <i class="bx bx-star bx-sm"></i>

                                            @endif
                                        @endfor
                                        </h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!--/ User Sidebar -->


            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 mt-lg-0 mt-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <a href="#" class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-2">
                                    <img src="{{ asset('assets/img/icons/unicons/bulb.png') }}" alt="Avatar" class="rounded-circle">
                                </div>
                                <div class="me-2 text-body h5 mb-0">
                                    وصف الخدمة
                                </div>
                            </a>
                        </div>
                        <p>
                        {{$service->description}}
                        </p>
                    </div>
                </div>

                <div class="col-12 bg-white py-3">
                @if(count($service->works))
                    <div class="d-flex align-items-center mx-4 mb-3">
                        <a href="#" class="d-flex align-items-center">
                            <div class="avatar avatar-sm me-2">
                                <img src='{{ asset("{$service->works[0]->path}{$service->works[0]->image} ") }}' alt="Avatar" class="rounded-circle">
                            </div>
                            <div class="me-2 text-body h5 mb-0">
                                نماذج اعمال
                            </div>
                        </a>
                    </div>
                    <div id="swiper-gallery">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                            @foreach ($service->works as $work )
                                <div class="swiper-slide" style='background-image:url({{ asset("{$work->path}$work->image ") }});'><span class="bg-primary text-white py-1 px-3">{{ $work->title }}</span></div>
                            @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white bg-primary"></div>
                            <div class="swiper-button-prev swiper-button-white bg-primary"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                               @foreach ($service->works as $work )
                                <div class="swiper-slide" style='background-image:url({{ asset("{$work->path}$work->image") }});background-size: cover !important;'></div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                @else
                <div class='text-center'>
                                لم يتم رفع اعمال
                </div>
                @endif
                </div>

            </div>
            <!--/ User Content -->
        </div>

    </div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/ui-carousel.js') }}"></script>
    <script src="../../assets/vendor/libs/leaflet/leaflet.js"></script>
    <script src="../../assets/js/maps-leaflet.js"></script>
@endsection
