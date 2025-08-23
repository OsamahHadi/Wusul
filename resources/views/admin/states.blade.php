@extends('layouts.dashboard')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
    <link rel="stylesheet" href="../../assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endsection

@section('content')

    <div class="container-xxl flex-grow-1">
        <div class="container-xxl flex-grow-1">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">لوحة التحكم / </span>المحافظات
            </h4>
            <div class="card position-relative">
                <h5 class="card-header fs-4 fw-bolder">المحافظات</h5>
                <button type="button" class="btn btn-lg btn-primary position-absolute top-0 end-0 m-3" data-bs-toggle="modal" data-bs-target="#addCategory">
                    أضافة محافظة&nbsp;<span class="tf-icons bx bx-book-add"></span>
                </button>

                <div class="modal fade" id="addCategory" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form id="formAccountSettings" method="POST" action="{{route('states.add')}}"
                                  class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                <hr class="my-0">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title fs-5 fw-bolder" id="modalToggleLabel">أضافة محافظة</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="name" class="form-label">أسم المحافظة</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="أسم المحافظة">
                                        </div>
                                    </div>
                                    <div class="mt-2 text-center">
                                        <button type="submit" class="btn btn-primary me-2"> حفظ</button>
                                        <button type="button" class="btn btn-label-secondary"
                                                data-bs-dismiss="modal">إلغاء
                                        </button>
                                    </div>
                                    <div></div>
                                    <input type="hidden">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover mb-5">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>أسم المحافظة</th>
                            <th>تاريخ التسجيل</th>
                            <th>الحالة</th>
                            <th>تنشيط</th>
                            <th>عمليات</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @forelse($states as $state)
                        <tr>
                            <td>{{$loop->index+1 }}</td>
                            <td> {{$state->name}}</td>
                            <td>{{\Carbon\Carbon::parse($state->created_at)->diffForHumans()}}</td>
                            <td>
                                @if($state->is_active)
                                    <span class="badge bg-success pb-3 fs-6">مفعل</span>
                                @else
                                    <span class="badge bg-danger pb-3 fs-6">غير مفعل</span>
                                @endif
                            </td>
                            <td>
                                <form method="get" action="{{ route('admin.state.active',$state->id) }}">
                                        @if($state->is_active)
                                            <button type="submit" class="btn btn-label-danger mx-2">
                                                <span class="tf-icons bx bx-block me-2"></span>ايقاف
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-label-primary mx-2">
                                                <span class="tf-icons bx bx-check me-2"></span>تفعيل
                                            </button>
                                        @endif
                                </form>
                            </td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-label-primary mx-2"
                                onclick="edit({{ $state }})"
                                 data-bs-toggle="modal" data-bs-target="#editeCategory1">
                                    <span class="tf-icons bx bx-edit"></span>&nbsp; تعديل
                                </button>

                                <form method="get" action="{{ route('states.delete',$state->id) }}">
                                    <button type="submit" class="btn btn-label-danger confirm" id="confirm">
                                        <span class="tf-icons bx bx-trash"></span>&nbsp; خذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-3 text-danger fs-4 position-relative">
                                    <p class="text-center py-3 text-danger fs-4">
                                        لا يوجد نتائج
                                    </p>
                                    <img src="{{ asset('img/noResultFound.png') }}" class="h-px-200 w-auto mx-auto">
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    <div class="modal fade" id="editeCategory1" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form id="formAccountSettings" method="POST"
                            action="{{route('states.update')}}"
                                  class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                                @csrf
                                <input type="hidden"  name='id' value=''>

                                <hr class="my-0">
                                <div class="modal-header">
                                    <h5 class="modal-title fs-5 fw-bolder" id="modalToggleLabel">أضافة محافظة</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="name" class="form-label">أسم المحافظة</label>
                                            <input type="text" class="form-control" id="name" name="name" value=''
                                                   placeholder="أسم المحافظة">
                                        </div>
                                    </div>
                                    <div class="mt-2 text-center">
                                        <button type="submit" class="btn btn-primary me-2"> حفظ</button>
                                        <button type="button" class="btn btn-label-secondary"
                                                data-bs-dismiss="modal">إلغاء
                                        </button>
                                    </div>
                                    <div></div>
                                    <input type="hidden">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
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

            function edit(state){
            const id =  document.querySelector('input[name=id]');
            const name =  document.querySelector('#editeCategory1 form input[name=name]');

            id.value=state.id;
            name.value=state.name;

        }

    </script>
@endsection
