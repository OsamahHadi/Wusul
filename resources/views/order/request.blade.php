@extends('layouts.app')

@section('extra-style')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- <h4 class="fw-bold py-3 mb-4"> طلب خدمة</h4>--}}

    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- User Card -->
            <div class="card mb-4 h-100">
                <div class="card-header flex-grow-0">
                    <div class="d-flex">
                        <div class="avatar flex-shrink-0 me-3">

                            <img src="http://127.0.0.1:8000/assets/img/avatars/1.png" alt="User" class="rounded-circle">
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                            <div class="me-2">
                                <h5 class="mb-0"> {{$service->user->name}} </h5>
                                <small class="text-muted"> {{\Carbon\Carbon::parse($service->created_at)->diffForHumans()}} </small>
                            </div>
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
                                        @for($i = 0; $i < 4; $i++) @if($i<$service->stars)
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

            <form method="post" action="{{route('order.send')}}" enctype="multipart/form-data">
                @csrf
                <div class="row fv-plugins-icon-container">
                    <div class="col-md-12">

                        <div class="card mb-4">
                            <h5 class="card-header">طلب خدمة</h5>
                            <hr class="my-0">

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-6 mt-4">
                                        <label for="formFile" class="form-label fs-6">أرفاق ملفات</label>
                                        <div class="col-12">
                                            <input class="form-control" name='images[]' type="file" id="formFile" multiple>
                                        </div>
                                    </div>
                                    @if($service->type==0)

                                    <div class="mt-4">
                                        <label for="work" class="form-label fs-6">أضف العنوان المراد وصول الخدمة إليه </label>
                                        @livewire('address-relation',['state_id'=>'0', 'city_id'=>'0'])

                                        <div class="col-lg-6">
                                            <label for="work" class="form-label fs-6"> العنوان </label>
                                            <input type="text" class="form-control mb-3" id="work" name="address_description" placeholder="العنوان">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div>
                                        <label for="exampleFormControlTextarea1" class="form-label fs-6">وصف توضيحي للطلب</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description" placeholder="وصف الطلب"></textarea>
                                    </div>
                                    <input type="hidden" class="form-control mb-3" value="{{$service->id}}" name='service' placeholder="العنوان">
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary me-2">إرســـال</button>
                                    <button type="reset" class="btn btn-label-secondary">إلغاء</button>
                                </div>
                                <div class="col-12 mb-4">
                                    <p class="fw-semibold mt-5">ملاحظات</p>
                                    <ul class="ps-3 mb-0">
                                        <li class="mb-1">قم بأرفاق اي ملفات توضيحية لتوفير معلومات مفصلة عن الطلب</li>
                                        <li class="mb-1">في حالة طلب خدمة لا تتطلب دفع رقمي قم بادخال العنوان الذي تريد الحصول على الخدمة فيه</li>
                                        <li class="mb-1">قم بكتابة وصف متكامل للخدمة المطلوبة</li>
                                        <li class="mb-1">يفضل وصف الخدمة في نقاط محدد</li>
                                        <li>كتابة وصف واضح ومفهوم</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Account -->
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <!--/ User Content -->
    </div>

</div>
@endsection

@section('scripts')
@endsection
