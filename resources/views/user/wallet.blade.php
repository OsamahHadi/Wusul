@extends(Auth::user()->type==0?'layouts.app':'layouts.dashboard')

@section('extra-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
<link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endsection

@section('content')

<div class="container-xxl flex-grow-1 mt-5">
    <div class="container-xxl flex-grow-1 pt-0 px-sm-2 px-0">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">الملف الشخصي / </span>المحفظة
        </h4>

        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                    <li class="nav-item"><a class="nav-link" @if(Auth::id()==$user->id)
                            href="{{ route('profile') }}"
                            @else
                            href="{{ route('profile.show',$user->id) }}"
                            @endif
                            ><i class='bx bx-user'></i> البيانات الشخصية</a>
                    </li>

                    @if($user->type == 2)
                    <li class="nav-item"><a class="nav-link" @if(Auth::id()==$user->id)
                            href="{{ route('profile.service') }}"
                            @else
                            href="{{ route('profile.service.show', $user->id) }}"
                            @endif
                            ><i class='bx bx-group'></i> الخدمات</a></li>
                    @endif
                    @if($user->type == 0 && Auth::id() == $user->id)
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile.orders') }}"><i class='bx bx-grid-alt'></i> الطلبات</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('wallet') }}"><i class='bx bx-wallet'></i> المحفظة</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <!--/ Navbar pills -->

        <div class="row">
            <div class="col-xxl-12 col-md-6 my-3">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title fs-5 fw-bolder">الرصيد الحالي</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center mx-3" style="font-size: 32px;width: 64px;height: 64px;color: #2eca6a;background: #e0f8e9;">
                                <i class="bx bx-money fs-3"></i>
                            </div>
                            <div class="ps-3">
                                <span class="fs-3">${{$wallet->balance}}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-6 col-md-6 mb-3">

                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title fs-5 fw-bolder">الايداع</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon bg-label-primary rounded-circle d-flex align-items-center justify-content-center bg-info-light mx-3" style="font-size: 32px;width: 64px;height: 64px;">
                                <i class="bx bx-plus-circle text-primary fs-2"></i>
                            </div>
                            <div class="ps-3">
                                <p class="fs-3">${{$deposition}}</p>
                                <span class="text-success fw-bold">{{count($wallet->transactions->where('type','deposit'))}}</span>
                                <span class="text-muted">عملية ايداع</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-xxl-6 col-md-6 mb-3">

                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title fs-5 fw-bolder">السحب</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-danger-light mx-3" style="font-size: 32px;width: 64px;height: 64px;color: #ff771d;background: #ffecdf;">
                                <i class="bx bx-minus-circle text-danger fs-2"></i>
                            </div>
                            <div class="ps-3">
                                <p class="fs-3">${{$pull}}</p>
                                <span class="text-danger fw-bold">{{count($wallet->transactions->where('type','withdraw'))}}</span>
                                <span class="text-muted">عملية سحب</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <h5 class="card-header fs-4 fw-bolder">العمليات</h5>
        <livewire:search-transaction :wallet="$wallet"/>
        {{-- <livewire:category-posts :category="$category"> --}}

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script>
    $('.confirm').on('click', function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        Swal.fire({
            title: "هل انت متأكد من المتابعة"
            , text: "لن يمكنك التراجع عن هذا !"
            , icon: "warning"
            , showCancelButton: !0
            , confirmButtonText: "نعم, قم بالحذف"
            , customClass: {
                confirmButton: "btn btn-primary me-3"
                , cancelButton: "btn btn-label-secondary"
            }
            , buttonsStyling: !1
        }).then(function(t) {
            t.value ? Swal.fire({
                icon: "success"
                , title: "محذوف!"
                , text: "لقد تم الحذف بنجاخ."
                , customClass: {
                    confirmButton: "btn btn-success"
                }
            }, setTimeout(function() {

                form.submit()
            }, 1000)) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                title: "تم الالغاء"
                , text: "تم الغاء العملية :)"
                , icon: "error"
                , customClass: {
                    confirmButton: "btn btn-success"
                }
            })
        })
    });

</script>
@endsection
