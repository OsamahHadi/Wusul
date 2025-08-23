@extends('layouts.dashboard')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tabs.css') }}">
    <link rel="stylesheet" href="../../assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container-xxl flex-grow-1 container-p-y pt-0 px-sm-2 px-0">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">لوحة التحكم / </span>المجالات
            </h4>
            <div class="card position-relative">
                <h5 class="card-header fs-4 fw-bolder">المجالات</h5>
                <button type="button" class="btn btn-lg btn-primary position-absolute top-0 end-0 m-3" data-bs-toggle="modal" data-bs-target="#addCategory">
                    أضافة مجال&nbsp;<span class="tf-icons bx bx-book-add"></span>
                </button>
                <div class="modal fade" id="addCategory" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{route('category.store')}}" id="formAccountSettings" method="POST"
                                class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="name" class="form-label">أسم المجال</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="أسم المجال">
                                        </div>
                                        <div>
                                            <label for="exampleFormControlTextarea1" class="form-label">وصف
                                                المجال</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"
                                                      rows="3" placeholder="الوصف" name='description'></textarea>
                                        </div>


                                    </div>
                                    <div class="mt-2">
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
                <div class="col-12">
                    <div class="nav-align-top">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover mb-5">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>أسم المجال</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>عمليات</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{$loop->index+1 }}</td>

                                        <td>{{$category->name}}</td>
                                        <td>{{\Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td>
                                        <td>
                                            <button type="button" class="btn btn-label-primary me-3"
                                                    data-bs-toggle="modal" data-bs-target="#editeCategory1"
                                                    onclick="edit({{ $category }})" >
                                                <span class="tf-icons bx bx-edit"></span>&nbsp; تعديل
                                            </button>

                                            <form class="d-inline-block" method="get" action="{{ route('category.del',$category->id) }}">
                                                <button type="button" class="btn btn-label-danger confirm">
                                                    <span class="tf-icons bx bx-trash"></span>&nbsp; خذف
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center py-3 text-danger fs-4 position-relative">
                                            <p class="text-center py-3 text-danger fs-4">
                                                لا يوجد مجالات
                                            </p>
                                            <img src="{{ asset('img/noResultFound.png') }}" class="h-px-200 w-auto mx-auto">
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <div class="modal fade" id="editeCategory1" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                             <form action="{{route('category.update')}}"
                                enctype="multipart/form-data"
                                    id="formAccountSettings" method="POST"
                                class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                                >
                                            @csrf
                                            <input type="hidden"  name='id' value=''>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="mb-3 col">
                                                        <label for="name" class="form-label">أسم المجال</label>
                                                        <input type="text" class="form-control" id="name"
                                                               placeholder="أسم المجال" value="" name='name'>
                                                    </div>
                                                    <div>
                                                        <label for="exampleFormControlTextarea1" class="form-label">وصف
                                                            المجال</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                                  rows="3" placeholder="الوصف" name='description'>
                                                        </textarea>
                                                    </div>


                                                </div>
                                                <div class="mt-2">
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
                </div></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="../../assets/js/extended-ui-sweetalert2.js"></script>
    <script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="{{ asset('js/confirm.js') }}"></script>
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
            imgInp.value = "",
                imgView.src = r
        }
    </script>
    <script>
        function edit(category){
            const id =  document.querySelector('input[name=id]');
            const name =  document.querySelector('#editeCategory1 .modal-dialog form input#name[name=name]');
            const description =  document.querySelector('#editeCategory1 .modal-dialog form textarea[name=description]');

            console.log(id);
            id.value=category.id;
            name.value=category.name;
            description.innerText=category.description;

        }
    </script>
@endsection
