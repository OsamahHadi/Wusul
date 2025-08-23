@extends('layouts.dashboard')

@section('extra-style')
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container-xxl flex-grow-1 container-p-y pt-0 px-sm-2 px-0">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">لوحة التحكم /</span> احصائيات النظام
            </h4>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <p class="card-text">المبيعات</p>
                                    <div class="d-flex align-items-end mb-2">
                                        <h4 class="card-title mb-0 me-2">{{$total}}</h4>
                                    </div>
                                </div>
                                <div class="card-icon">
                                    <span class="badge bg-label-primary rounded p-2">
                                      <i class="bx bx-trending-up bx-sm fs-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <p class="card-text">اجمالي الطلبات</p>
                                    <div class="d-flex align-items-end mb-2">
                                        <h4 class="card-title mb-0 me-2">{{$orders}} طلب</h4>
                                    </div>
                                </div>
                                <div class="card-icon">
                                    <span class="badge bg-label-info rounded p-2">
                                      <i class="bx bx-archive bx-sm fs-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <p class="card-text">الطلبات المكتملة</p>
                                    <div class="d-flex align-items-end mb-2">
                                        <h4 class="card-title mb-0 me-2">{{$orders_done}} طلب</h4>
                                    </div>
                                </div>
                                <div class="card-icon">
                                    <span class="badge bg-label-success rounded p-2">
                                      <i class="bx bx-check bx-sm fs-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <p class="card-text">الطلبات المرفوضة</p>
                                    <div class="d-flex align-items-end mb-2">
                                        <h4 class="card-title mb-0 me-2">{{$orders_fail}} طلب</h4>
                                    </div>
                                </div>
                                <div class="card-icon">
                                    <span class="badge bg-label-danger rounded p-2">
                                      <i class="bx bx-block bx-sm fs-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="card-info">
                                    <p class="card-text">الخدمات</p>
                                    <div class="d-flex align-items-end mb-2">
                                        <h4 class="card-title mb-0 me-2">{{$services}} خدمة</h4>
                                    </div>
                                </div>
                                <div class="card-icon">
                                    <span class="badge bg-warning rounded p-2">
                                      <i class="bx bx-grid-alt bx-sm fs-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
