@extends('layouts.dashboard')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
    <style>
        .active {
            color: #696cff !important;
        }
        .nav-tabs .nav-item .nav-link {
            border: #ddd 1px solid !important;
            background-color: #eee !important;
            box-shadow: 1px 1px #ccc !important;
        }

        .nav-tabs .nav-item .active {
            border: 0px !important;
            background-color: #fff !important;
            box-shadow: none !important;
        }
    </style>
    <link rel="stylesheet" href="../../assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container-xxl flex-grow-1 container-p-y pt-0 px-sm-2 px-0">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">لوحة التحكم / </span>الشكاوي
            </h4>

            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-4">
                    <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">بحث</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="بحث..." aria-label="Search..." aria-describedby="basic-addon-search31">
                        <span class="input-group-text btn btn-primary" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                    </div>
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
                    <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">المجال</label>
                    <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx"
                            data-tick-icon="bx-check" data-style="btn-default">
                        <option data-icon="bx bx-list-check">الكل</option>
                        <option data-icon="bx bx-user">كهرباء</option>
                        <option data-icon="bx bx-user-pin">تقنية</option>
                        <option data-icon="bx bxs-user-account">صحة</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-6 mb-3">
                    <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">الحالة</label>
                    <select class="selectpicker w-100 show-tick" id="selectpickerIcons" data-icon-base="bx"
                            data-tick-icon="bx-check" data-style="btn-default">
                        <option data-icon="bx bx-list-check">الكل</option>
                        <option data-icon="bx bx-check">مقبول</option>
                        <option data-icon="bx bx-block">مرفوض</option>
                    </select>
                </div>
            </div>
            <div class="card position-relative">
                <h5 class="card-header fs-4 fw-bolder">الشكاوي</h5>

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover mb-5">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>أسم المبلغ</th>
                            <th>أسم المبلغ عنه</th>
                            <th>الخدمة</th>
                            <th>الحالة</th>
                            <th>تاريخ التسجيل</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <tr>
                            <td>1</td>
                            <td>عبدالهادي ديان</td>
                            <td>أسامة هادي</td>
                            <td>برمجة تطبيقات الموبايل</td>
                            <td><span class="badge bg-label-danger fs-6 pb-3">مرفوض</span></td>
                            <td>2022-05-12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
            <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
            <script src="../../assets/js/extended-ui-sweetalert2.js"></script>
            <script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
            <script>
                $('.confirm').on('click',function(e){
                    e.preventDefault();
                    var form = $(this).parents('form');
                    Swal.fire({
                        title: "هل انت متأكد من المتابعة",
                        text: "لن يمكنك التراجع عن هذا !",
                        icon: "warning",
                        showCancelButton: !0,
                        confirmButtonText: "نعم, قم بالحذف",
                        customClass: {confirmButton: "btn btn-primary me-3", cancelButton: "btn btn-label-secondary"},
                        buttonsStyling: !1
                    }).then(function (t) {
                        t.value ? Swal.fire({
                                icon: "success",
                                title: "محذوف!",
                                text: "لقد تم الحذف بنجاخ.",
                                customClass: {confirmButton: "btn btn-success"}
                            }, setTimeout(function(){

                                form.submit()
                            }, 1000)
                        ) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                            title: "تم الالغاء",
                            text: "تم الغاء العملية :)",
                            icon: "error",
                            customClass: {confirmButton: "btn btn-success"}
                        })
                    })
                });
            </script>
@endsection
