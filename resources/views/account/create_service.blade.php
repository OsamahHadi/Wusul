@extends('layouts.app')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">User / View /</span> Create Service
        </h4>

        <div class="card mb-4">
            <h5 class="card-header">بيانات الخدمة</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="../../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">أختر صورة</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden name='photo' accept="image/png, image/jpeg">
                        </label>


                        <p class="text-muted mb-0"> JPG, GIF or PNG. اكبر حجم 800K</p>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <form id="formAccountSettings" method="POST" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">أسم الخدمة</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="أسم الخدمة">
                        </div>
                        <div class="mb-3 col-md-6" data-select2-id="5">
                            <label for="apiAccess" class="form-label">المجال</label>
                            <div class="position-relative" data-select2-id="4"><select id="apiAccess" class="select2 form-select select2-hidden-accessible" data-select2-id="apiAccess" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="2">أختر</option>
                                    <option value="Turkey">الكهرباء</option>
                                    <option value="Ukraine">التصميم</option>
                                    <option value="United Arab Emirates">البرمجة</option>
                                    <option value="United Kingdom">النجارة</option>
                                    <option value="United States">الرياضة</option>
                                </select><span class="select2 select2-container select2-container--default select2-container--above select2-container--focus" dir="rtl" data-select2-id="1" style="width: 442.25px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-apiAccess-container"><span class="select2-selection__rendered" id="select2-apiAccess-container" role="textbox" aria-readonly="true" title="Choose Key Type">Choose Key Type</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">عنوان الخدمة</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="عنوان الخدمة">
                        </div>
                        <div class="mb-3 col-md-6" data-select2-id="5">
                                     <div class="mb-3 col-sm-12">
                                        <label for="interval" class="form-label">مدة التسليم</label>
                                        <input type="text" class="form-control" id="interval" name="interval"
                                               placeholder="مدة التسليم">
                                    </div>           
                         </div>
                        <div>
                            <label for="exampleFormControlTextarea1" class="form-label">وصف الخدمة</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="الوصف"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple="">
                        </div>


                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">حفظ</button>
                        <button type="reset" class="btn btn-label-secondary">إلغاء</button>
                    </div>
                    <div></div><input type="hidden"></form>
            </div>
            <!-- /Account -->
        </div>


    </div>
@endsection
