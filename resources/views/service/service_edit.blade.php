@extends('layouts.dashboard')
@section('extra-style')
    <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endsection
@section('content')
    <div class="container-xxl flex-grow-1">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">لوحة التحكم / الخدمات /</span> تعديل خدمة
        </h4>
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-md-6">
                <!-- User Card -->
            <form   novalidate="novalidate" action="{{route('service.update',$service->id)}}"
                    enctype="multipart/form-data" method='post'>
                    @csrf
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="user-avatar-section">
                                <div class=" d-flex align-items-center flex-column">
                                    <div class="user-avatar-section">
                                        <div class=" d-flex align-items-center flex-column">
                                          @if($service->image)

                                                <img class="img-fluid" src="{{ asset("{$service->path}$service->image ") }}" id='uploadedImg' alt="Card image cap">
                                            @else

                                                <img class="img-fluid" src="../../assets/img/backgrounds/event.jpg" id='uploadedImg' alt="Card image cap">
                                            @endif
                                        </div>
                                    </div>
                                    <label for="upload" class="btn btn-primary my-4" tabindex="0">
                                        <span class="d-none d-sm-block">تعديل الصورة</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" hidden
                                               accept="image/png, image/jpeg" name='image'/>
                                    </label>
                                </div>
                            </div>
                            <hr class="my-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="name" class="form-label">أسم الخدمة</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="أسم الخدمة" value="{{$service->name}}">
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="timeZones" class="form-label">المجال</label>
                                        <select id="selectpickerBasic" class=" category form-select  w-100" data-style="btn-default" name='category'>
                                            <option value="" data-select2-id="2">أختر</option>
                                            @forelse($categories as $category)
                                                <option data-icon="bx bx-list-check" value="{{$category->id}}" {{$category->id==$service->service_cat_id?'selected':''}}>
                                                {{$category->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="timeZones" class="form-label">نوع الدفع</label>
                                        <select id="selectpickerBasic" class="form-select  w-100" data-style="btn-default" name='type'>
                                            <option value="" data-select2-id="2">أختر</option>
                                            <option {{$service->type==0?'selected':''}} value="0">دفع عند الاستلام</option>
                                            <option {{$service->type?'selected':''}} value="1">رقمي</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-sm-12">
                                        <label for="interval" class="form-label">مدة التسليم</label>
                                        <input type="text" class="form-control" id="interval" name="interval"
                                               placeholder="مدة التسليم" value="{{$service->interval}}">
                                    </div>
                                    <div>
                                        <label for="exampleFormControlTextarea1" class="form-label">وصف
                                            الخدمة</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                  rows="3" placeholder="الوصف" name='description'>{{$service->description}}</textarea>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary mt-3 w-100"> حفظ التعديل</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--/ User Sidebar -->
            <!-- User Content -->
            <div class="col-md-6 bg-white">
                <div class="col-12 py-3 position-relative">
                    <div class="d-flex align-items-center mx-4 mb-3 justify-content-between flex-wrap">
                        <a href="#" class="d-flex align-items-center flex-wrap">
                            <div class="avatar avatar-sm me-2">
                                <img src="http://127.0.0.1:8000/assets/img/icons/unicons/laptop.png" alt="Avatar" class="rounded-circle">
                            </div>
                            <div class="me-2 text-body h5 mb-0">
                                نماذج اعمال
                            </div>
                        </a>
                        <button type="button" class="btn btn-lg btn-primary m-3" data-bs-toggle="modal"
                                data-bs-target="#addService">
                            أضافة نموذج عمل&nbsp;<span class="tf-icons bx bx-book-add"></span>
                        </button>
                    </div>

                    <div class="modal fade" id="addService" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">

                            <div class="modal-content">
                                 <form   novalidate="novalidate" action="{{route('work.store')}}"
                                        enctype="multipart/form-data" method='post'>
                                    @csrf
                                    <div class="user-avatar-section mt-5">
                                        <div class=" d-flex align-items-center flex-column">
                                            <div class="user-avatar-section">
                                                <div class=" d-flex align-items-center flex-column">
                                                    <img id="cardUploadImg" class="img-fluid rounded mx-4 w-75" src="" alt="">
                                                </div>
                                            </div>
                                            <label for="cardUpload" class="btn btn-primary mt-3" tabindex="0">
                                                <span class="d-none d-sm-block bx bx-upload"> أضافة صورة</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="cardUpload" name='image' class="account-file-input" hidden="" accept="image/png, image/jpeg">
                                            </label>
                                            <div class="mb-4 col-md-10 px-5">
                                                <label for="name" class="form-label">أسم النموذج</label>
                                                <input type="text" class="form-control" id="name" name="title" placeholder="أسم النموذج">
                                                <input type="hidden" class="form-control" value="{{$service->id}}" name="service_id" >
                                                <button type="submit" class="btn btn-primary mt-3 w-100"> حفظ</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                @if(count($service->works))
                @foreach ($service->works as $work )
                    <div class="col-lg-6 col-md-12 col-sm-6 col-12">
                        <div class="card mb-3 shadow">

                            <img class="card-img-top" src='{{ asset("{$work->path}$work->image ") }}' alt="Card image cap">
                            <div class="card-body d-flex justify-content-between">
                                <h5 class="card-title">{{$work->title}}</h5>
                            </div>
                            <form action="{{ route('work.delete',$work->id) }}" method='get' class="mb-3">
                                <button type="submit" class="btn btn-label-danger  mx-2">
                                    <span class="tf-icons bx bx-block"></span>&nbsp; حذف
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

                @else
                        <div class='text-center'>
                                لم يتم رفع اعمال
                </div>
                @endif



                </div>
                <!-- Invoice table -->

                <!-- /Invoice table -->
            </div>
            <!--/ User Content -->
        </div>

    </div>
@endsection

@section('scripts')
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>

    <script>
        imgInp = document.getElementById('upload');
        imgView = document.getElementById('uploadedImg');
        imgInp2 = document.getElementById('cardUpload');
        imgView2 = document.getElementById('cardUploadImg');
        reset = document.getElementById('reset');
        const r = imgView.src;

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgView.src = URL.createObjectURL(file)
            }
        }

        imgInp2.onchange = evt => {
            const [file] = imgInp2.files
            if (file) {
                imgView2.src = URL.createObjectURL(file)
            }
        }

        reset.onclick = evt => {
            imgInp.value = "",
                imgView.src = r
        }


    </script>
@endsection
