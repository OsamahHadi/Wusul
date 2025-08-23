@extends(Auth::user()->type==0?'layouts.app':'layouts.dashboard')

@section('extra-style')
<link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">الطلب /</span> فاتورة
    </h4>
    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                        <div class="mb-xl-0 mb-4">
                            <div class="d-flex svg-illustration mb-3 gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('img/logo.png') }}" class="w-px-40 h-auto p-1" alt="" srcset="">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">منصة وصول</span>
                            </div>
                            <p class="mb-1">www.wusul.com</p>
                            <p class="mb-1">wusul@gmail.com</p>
                            <p class="mb-0">+967-770-552-517</p>
                        </div>
                        <div>
                            <h4>فاتورة #{{$order->id}}</h4>
                            <div class="mb-2">
                                <span class="me-1">تاريخ الأصدار:</span>
                                <span class="fw-semibold">{{\Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</span>

                            </div>
                            @if($order->status > 1)
                            <div>
                                <span class="me-1">تاريخ الاستحقاق:</span>
                                <span class="fw-semibold">
                                    {{\Carbon\Carbon::parse($order->date)->diffForHumans()}}
                                </span>
                            </div>
                            @endif
                            @if($order->status == 7 && $order->service->type==1 && $order->user->id== Auth::id())
                            <div>
                                <span class="me-1"> رمز التأكيد</span>
                                <span class="fw-semibold">
                                    {{$order->payment->code}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <hr class="my-0">
                <div class="card-body my-0 py-0">
                    <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0 my-0 py-0">
                        <div class="my-xl-0 my-md-3 my-sm-0 my-3">
                            <h4>بيانات العميل</h4>
                            <div class="mb-2">
                                <span class="me-1">الأسم:</span>
                                <span class="fw-semibold">{{$order->user->name}}</span>
                            </div>
                            <div>
                                <span class="me-1">المحافظة:</span>
                                <span class="fw-semibold">{{$order->user->address->state->name??'...'}}</span>
                            </div>
                            <div>
                                <span class="me-1">المدينة:</span>
                                <span class="fw-semibold">{{$order->user->address->city->name??'...'}}</span>
                            </div>
                        </div>
                        <div class="my-xl-0 my-md-3 my-sm-0 my-3">
                            <h4>بيانات الخدمة</h4>
                            <div class="mb-2">
                                <span class="me-1">أسم مالك الخدمة:</span>
                                <span class="fw-semibold">{{$order->service->user->name}}</span>
                            </div>
                            <div>
                                <span class="me-1">أسم الخدمة:</span>
                                <span class="fw-semibold">{{$order->service->name}}</span>
                            </div>
                            <div>
                                <span class="me-1">المجال:</span>
                                <span class="fw-semibold">{{$order->service->category->name}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="">

                    <div class="m-0 pt-3">
                <h6 class="text-center">هذا الطلب {{$status}}</h6>
                        <span class="fs-4 pt-3 fw-bolder px-5">وصف الطلب</span>

                        <div class="card-body">
                            <div class="row mx-2">
                                <div class="col-12 bg-label-facebook p-3 fs-6">
                                    <span>
                                        {{$order->description}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <span class="fs-4 fw-bolder px-5">عنوان الطلب</span>

                            <div class="card-body">
                                <div class="row mx-2">
                                    <div class="col-12 bg-label-secondary p-3 fs-6">
                                        <span>
                                            {{$order->address?->state?->name}}-{{$order->address?->city?->name}}-{{$order?->address?->description}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <span class="fs-4 ps-3">الملفات المرفقة</span>

                            <div class="card-body">
                                @if(count($images))
                                <div class="d-flex align-items-center mx-4 mb-3">
                                    @foreach ($images as $image )
                                    <a href="{{ asset("{$order->path}$image") }}" class="d-flex align-items-center">
                                        <img src='{{ asset("{$order->path}$image") }}' alt="Avatar" style='width: 100%' class="rounded">
                                    </a>
                                    @endforeach
                                </div>
                                @else
                                <div class='text-center'>
                                    لم يتم رفع ملفات
                                </div>
                                @endif
                                {{-- <button class="btn btn-label-primary d-grid w-100" data-bs-toggle="offcanvas"

                                            data-bs-target="#addPaymentOffcanvas">
                                        <span class="d-flex justify-content-center fs-5"><i
                                                class="bx bxs-download bx-xs me-3 fs-5 my-auto"></i>تنزيل الملفات</span>
                                    </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice -->

        <!-- Invoice Actions -->
        <div class="col-xl-3 col-md-4 col-12 invoice-actions position-relative">
            <div class="card position-sticky" style="top: 90px">
                <div class="card-body">
                    <button class="btn btn-label-secondary d-grid w-100 mb-3" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-printer bx-xs me-3"></i>طباعة</span>
                    </button>
                    @if($order->status== 7 && Auth::user()->userServiceProvider() )
                    <button type="button" class="btn btn-label-danger d-grid w-100 mb-3" data-bs-toggle="modal" data-bs-target="#editeCategory1" onclick="edit({{$order}})">
                        <span class="tf-icons bx bx-edit"></span>&nbsp; تأكيد
                    </button>
                    @endif
                    @if($order->status== 3 && Auth::user()->type == 0 )
                    <button type="button" class="btn btn-primary d-grid w-100" data-bs-toggle="modal" data-bs-target="#editeCategory1" onclick="edit({{$order}})">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"></span>&nbsp; تقييم الخدمة
                    </button>
                    @endif
                    @if(Auth::id()==$order->user->id)
                    @if($order->status == 2)
                    <form action="{{route('order.cancel',$order->id)}}">
                        <button class="btn btn-label-danger d-grid w-100 mb-3 confirm" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-block bx-xs me-3"></i>الغاء</span>
                        </button>
                    </form>
                    @if( $order->service->type==1)
                    <button class="btn btn-primary d-grid w-100" data-bs-toggle="modal" data-bs-target="#pay">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-dollar bx-xs me-3"></i>دفع</span>
                    </button>
                    @elseif($order->service->type==0)
                    <form action="{{route('order.orderConfirm')}}" method="post">
                        @csrf
                        <input type="hidden" name='order' value="{{$order->id}}">
                        <button class="btn btn-primary d-grid w-100">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-dollar bx-xs me-3"></i>تاكيد الطلب</span>
                        </button>
                    </form>
                    @endif
                    @endif
                    @endif
                </div>
                @if($order->status > 1)

                <div class="">
                    <div class="text-center px-4 py-3 d-flex justify-content-center border-top border-bottom">
                        <p class="mb-0 fs-4 me-3">اجمالي المبلغ:</p>
                        <p class="fw-semibold mb-0 fs-4 text-danger">${{$order->price?:'0'}}</p>
                    </div>
                </div>
                @endif
            </div>
            @if(Auth::id() == $order->service->user->id && $order->status==1 )
            <div class="card position-sticky" style="top: 90px">
                <div class="">
                    <div class="text-center px-4 py-3 d-flex justify-content-center border-top border-bottom">
                        <p class="mb-0 fs-4">تسعير الطلب</p>
                    </div>
                </div>
                <form action="{{route('order.response')}}" method='post' class="card-body mb-0 pb-0">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control col-6" id="salesperson" name='price' placeholder="أدخل السعر">
                        <input type="hidden" name='order' value="{{$order->id}}">

                    </div>
                    <div class="text-center px-4 py-3 d-flex justify-content-center border-top border-bottom">
                        <p class="mb-0 fs-4">تاريخ التسليم</p>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name='date' type="date" value="" id="html5-date-input">
                    </div>
                    <button class="btn btn-primary d-grid w-100 mb-3 confirm" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-check bx-xs me-3"></i>أرسال</span>
                    </button>
                </form>
                    <form action="{{route('order.cancel',$order->id)}}"
                class="card-body mt-0 pt-0">
                    <button class="btn btn-label-danger d-grid w-100 confirm" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-block bx-xs me-3"></i>رفض</span>
                    </button>
                </form>
            </div>
            @endif
        </div>
        <!-- /Invoice Actions -->
    </div>
@if($order->status==2 && $order->service->type==1)


<div class="modal fade" id="pay" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form id="formAccountSettings" action="{{route('order.payment')}}" enctype="multipart/form-data" method="post" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                <hr class="my-0">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fs-5 fw-bolder" id="modalToggleLabel">الدفع</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="card-body">
                    <div class="row align-items-sm-center justify-content-center text-center gap-4 flex-wrap">
                        <img src="{{ asset('img/upload.png') }}" alt="user-avatar" class="d-block rounded img-fluid h-px-200 w-px-400" style="object-fit: contain" id="uploadedImg">
                        <div class="button-wrapper my-auto">
                            <label for="upload" class="btn btn-primary px-5 me-2" tabindex="0">
                                <span class="d-none d-sm-block">أضافة صورة</span>
                                <i class="bx bx-upload"></i>
                                <input type="file" id="upload" class="account-file-input" name='image' hidden="" accept="image/png, image/jpeg">
                            </label>
                        </div>
                        <p class="text-muted my-3">قم برفع صورة سند الدفع الخاص بحساب المنصة التالي: <span class="fs5 fw-bold">xxx-000-xxx-000</span></p>
                    </div>
                    <div class="mt-2 text-center justify-content-center">
                        <button type="submit" class="btn btn-primary me-2 confirm"> أرسال السند</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">إلغاء
                        </button>
                    </div>
                    <div></div>
                    <input type="hidden" name='order' value="{{$order->id}}">
                </div>

            </form>
        </div>
    </div>
</div>
@endif
@if($order->status== 7 && Auth::user()->userServiceProvider() )

<div class="modal fade" id="editeCategory1" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formAccountSettings" method="POST" action="{{route('order.receiveOrder')}}" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                @csrf
                <input type="hidden" name='id' value=''>
                <hr class="my-0">
                <div class="modal-header">
                    <h5 class="modal-title fs-5 fw-bolder" id="modalToggleLabel"> ادخال رمز التأكيد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="name" class="form-label fs-5 fw-bolder">رمز النأكيد</label>
                            <input type="text" class="form-control" id="name" name="code" placeholder=" ادخل رمز التاكيد الذي استلمته من المستخدم">
                        </div>

                    </div>
                    <div class="mt-2 text-center">
                        <button type="submit" class="btn btn-primary me-2">تأكيد الاستلام</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">إلغاء
                        </button>
                    </div>
                    <div></div>
                </div>

            </form>
        </div>
    </div>
</div>
@endif
@if($order->status== 3 && Auth::user()->type==0 )

<div class="modal fade" id="editeCategory1" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            @livewire('rating')
        </div>
    </div>
</div>
@endif

@endsection

@section('scripts')
<script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
<script src="../../assets/js/extended-ui-sweetalert2.js"></script>
<script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script>
    imgInp = document.getElementById('upload');
    imgView = document.getElementById('uploadedImg');
    reset = document.getElementById('reset');
    const r = imgView.src;

    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            imgView.src = URL.createObjectURL(file)
        }
    }

    reset.onclick = evt => {
        imgInp.value = ""
            , imgView.src = r
    }

    function edit(order) {
        const id = document.querySelector('input[name=id]');
        id.value = order.id;

    }

    function rating() {
        const starsClose = document.querySelector('#starts-close');
         setTimeout(()=>{
        starsClose.click();
        },2000);
    }

</script>
        {{-- const inputs = document.querySelectorAll('.div-stars-container input');
        const stars = document.querySelectorAll('.div-stars-container i'); --}}
<script src="{{ asset('js/confirm.js') }}"></script>
@endsection
