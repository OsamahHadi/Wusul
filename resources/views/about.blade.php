@extends('layouts.app')

@section('extra-style')
@endsection

@section('content')
    <div class="container-fluid flex-grow-1 pt-2 py-0 px-0">
        <div class="bg-light">
            <div class="container py-5">
                <div class="row h-100 align-items-center py-5">
                    <div class="col-lg-6 d-none d-lg-block"><img src="{{ asset('img/person5.jpg') }}" alt="" class="img-fluid"></div>
                    <div class="col-lg-6">
                        <h1 class="display-4">منصة وصول</h1>
                        <p class="lead text-muted mb-0">هي منصة كل مواطن وزائر للحصول على خدمات مميزة ومتخصصة في كافة المجالات</p>
                        <p class="lead text-muted">زيارة الصفحة <a href="{{ route('index') }}" class="text-muted">
                                <u>الرئيسية</u></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white py-5">
            <div class="container py-5">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">الحصول على اعمال</h2>
                        <p class="font-italic text-muted mb-4">قم بالتسجيل كموفر خدمة للحصول على فرص عمل من خلال عرض خدمات في منصتنا</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">المزيد</a>
                    </div>
                    <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="{{ asset('img/about1.jpg') }}" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5 px-5 mx-auto"><img src="{{ asset('img/about2.jpg') }}" alt="" class="img-fluid mb-4 mb-lg-0"></div>
                    <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
                        <h2 class="font-weight-light">الحصول على خدمات متنوعة</h2>
                        <p class="font-italic text-muted mb-4">قم بالتسجيل في منصتنا للحصول على خدمات متنوعة ومن مختصين بارعين في كافة المجالات</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-light py-5">
            <div class="container py-5">
                <div class="row mb-4">
                    <div class="col-lg-5">
                        <h2 class="display-4 font-weight-light">فريقنا</h2>
                        <p class="font-italic text-muted">فريق تطوير منصة وصول للخدمات</p>
                    </div>
                </div>

                <div class="row text-center justify-content-center">
                    <div class="col-xl-2 col-sm-6 px-3 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/user.png') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">عبدالله باعبود</h5><span class="small text-uppercase text-muted"></span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/user.png') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">عبدالله الجوهي</h5><span class="small text-uppercase text-muted"></span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/user.png') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">عبدالهادي ديان</h5><span class="small text-uppercase text-muted"></span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/user.png') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">اسامة هادي</h5><span class="small text-uppercase text-muted"></span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-6 mb-5">
                        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('img/user.png') }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                            <h5 class="mb-0">عبدالله الجابري</h5><span class="small text-uppercase text-muted"></span>
                            <ul class="social mb-0 list-inline mt-3">
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
