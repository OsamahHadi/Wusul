@extends('layouts.dashboard')
@section('extra-style')
    <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endsection
@section('content')
    <div class="container-xxl flex-grow-1">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">لوحة التحكم / الخدمات /</span> أنشاء خدمة
        </h4>
        <div class="row justify-content-center">
            <!-- User Sidebar -->
            <div class="col-md-8">
                <!-- User Card -->
                <form   novalidate="novalidate" action="{{route('service.store')}}"
                enctype="multipart/form-data" method='post'>
                @csrf
                    <div class="card mb-4">
                        <div class="card-body p-0 mt-3">
                            <div class="user-avatar-section">
                                <div class=" d-flex align-items-center flex-column">
                                    <div class="user-avatar-section col-sm-6 col-10">
                                        <div class=" d-flex align-items-center flex-column">
                                            <img id="uploadedImg" class="img-fluid rounded mx-4 w-75" src="{{ asset('img/upload_img.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <label for="upload" class="btn btn-primary my-4" tabindex="0">
                                        <span class="d-none d-sm-block bx bx-upload"> أضافة صورة</span>
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
                                               placeholder="أسم الخدمة">
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="timeZones" class="form-label">المجال</label>
                                        <select id="selectpickerBasic" class=" category form-select selectpicker w-100" data-style="btn-default" name='category'>
                                            <option value="" data-select2-id="2">أختر</option>
                                            @forelse($categories as $category)
                                                <option data-icon="bx bx-list-check" value="{{$category->id}}" > {{$category->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label for="timeZones" class="form-label">نوع الدفع</label>
                                        <select id="selectpickerBasic" class="form-select selectpicker w-100" data-style="btn-default" name='type'>
                                            <option value="" data-select2-id="2">أختر</option>
                                            <option value="0">دفع عند الاستلام</option>
                                            <option value="1">رقمي</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-sm-12">
                                        <label for="interval" class="form-label">مدة التسليم</label>
                                        <input type="text" class="form-control" id="interval" name="interval"
                                               placeholder="مدة التسليم">
                                    </div>
                                    <div>
                                        <label for="exampleFormControlTextarea1" class="form-label">وصف
                                            الخدمة</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                  rows="3" placeholder="الوصف" name='description'></textarea>
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
        </div>

    </div>
@endsection

@section('scripts')

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
    <script>
        imgInp = document.getElementById('upload');
        imgView = document.getElementById('uploadedImg');
        imgInp2 = document.getElementById('cardUpload');
        imgView2 = document.getElementById('cardUploadImg');
        let c=document.querySelector('.category');

        const r = imgView.src;

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                imgView.src = URL.createObjectURL(file)
            }
        }
        c.onchange = ()=>{
            console.log(imgInp.value);
        }

        // imgInp2.onchange = evt => {
        //    const [file] = imgInp2.files
          //  if (file) {
            //    imgView2.src = URL.createObjectURL(file)
            //}
        //}


    </script>
@endsection
