
<div>
                                <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">قم برفع صورة جديدة</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    {{--   --}}
                                    <input type="file" class="account-file-input" id="upload"  wire:model="photo" hidden name='image'
                                           accept="image/png, image/jpeg"/>
                                </label>
                                <button type="button" class="btn btn-label-secondary account-image-reset mb-4" id="reset">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">أعادة تعيين</span>
                                </button>

                                {{--                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>--}}
                                <p class="text-muted mb-0">االصيغ المتاحة JPG, GIF أو PNG. الحد الأقصى 800K</p>
                            </div>
</div>
