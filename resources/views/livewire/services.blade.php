<div>
    <div class="container-xxl flex-grow-1">
        <div class="container-xxl flex-grow-1 pt-0 px-sm-2 px-0">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">لوحة التحكم / </span>الخدمات
            </h4>
            <div class="card">
                <h5 class="card-header fs-4 fw-bolder">الخدمات</h5>
                <div class="row d-sm-inline-flex mx-2">
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">بحث</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input wire:model='search' type="text" name='search' class="form-control" placeholder="بحث..." aria-label="Search..." aria-describedby="basic-addon-search31">
                            <span class="input-group-text btn btn-primary" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">نوع الخدمة</label>
                        <select class="form-select w-100 " wire:model='category'>
                            <option data-icon="bx bx-list-check" value='0'>الكل</option>
                            @forelse($categories as $category)
                            <option data-icon="bx bx-list-check" value="{{$category->id}}"> {{$category->name}}</option>
                            @empty

                            @endforelse

                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">ترتيب حسب</label>
                        <select class="form-select w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" wire:model='sortFile'>
                            <option data-icon="bx bx-rename" value='name'>الاسم</option>
                            <option data-icon="bx bxs-watch" value='created_at'>تاريخ التسجيل</option>
                            <option data-icon="bx bx-star" value='stars'>اجمالي التقييمات</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">حالة الخدمة</label>
                        <select class="form-select w-100 " wire:model='active'>
                            <option data-icon="bx bx-list-check" value=0>الكل</option>
                            <option data-icon="bx bx-list-check" value="1">مفعلة</option>
                            <option data-icon="bx bx-list-check" value="2">متوقفة</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="nav-align-top">
                        <ul class="nav nav-tabs border-bottom border-light mx-3 mb-3" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active fas fa-th-list fs-4" role="tab" data-bs-toggle="tab" data-bs-target="#navs-list" aria-controls="navs-top-home" aria-selected="true">
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link fas fa-th-large fs-4" role="tab" data-bs-toggle="tab" data-bs-target="#navs-card" aria-controls="navs-top-profile" aria-selected="false"></button>
                            </li>
                        </ul>
                        <div class="tab-content shadow-none pt-0">
                            {{-- List View --}}
                            <div class="tab-pane fade active show" id="navs-list" role="tabpanel">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-hover mb-5">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>أسم الخدمة</th>
                                                <th>نوع الخدمة</th>
                                                @if(Auth::user()->userServiceProvider())
                                                <th>نوع الدفع</th>
                                                @else
                                                <th>موفر الخدمة</th>
                                                @endif
                                                <th>تاريخ التسجيل</th>
                                                <th>الحالة</th>
                                                <th>عمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @forelse($services as $service)
                                            <tr>

                                                <td>{{$loop->index+1 }}</td>
                                                <td>{{$service->name}}</td>
                                                <td><span class="badge bg-label-primary fs-6 me-1">{{$service->category->name}}</span></td>
                                                @if(Auth::user()->userServiceProvider())
                                                <td>
                                                    {{$service->type?'رقمي':'عند التسليم'}}
                                                </td>

                                                @else
                                                <td>{{$service->user->name}}</td>
                                                @endif

                                                <td>{{\Carbon\Carbon::parse($service->created_at)->diffForHumans()}}</td>
                                                <td>
                                                    @if($service->is_active)
                                                    <span class="badge bg-success fs-6 pb-3 me-1">مفعل</span>
                                                    @else
                                                    <span class="badge bg-danger fs-6 pb-3 me-1">غير مفعل</span>
                                                    @endif
                                                </td>
                                                <td class='d-flex'>
                                                    @if(Auth::user()->userServiceProvider())
                                                    <a href="{{ route('service.edit',$service->id) }}">
                                                        <button type="button" class="btn btn-label-primary ">
                                                            <span class="tf-icons bx bxs-eyedropper"></span>&nbsp; تعديل
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('service.delete',$service->id) }}" method='get'>
                                                        <button type="button" class="btn btn-label-danger confirm mx-2">
                                                            <span class="tf-icons bx bx-block"></span>&nbsp; حذف
                                                        </button>
                                                    </form>
                                                    @else
                                                    <a href="{{ route('index') }}">
                                                        <button type="button" class="btn btn-label-danger confirm">
                                                            <span class="tf-icons bx bx-block"></span>&nbsp; ايقاف
                                                        </button>
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- Card View --}}
                            <div class="tab-pane fade" id="navs-card" role="tabpanel">
                                <div class="row g-4">
                                    @forelse($services as $service)

                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="card h-100">
                                            <div class="card-header flex-grow-0">
                                                <div class="d-flex">
                                                    <div class="avatar flex-shrink-0 me-3">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="User" class="rounded-circle">
                                                    </div>
                                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-1">
                                                        <div class="me-2">
                                                            <h5 class="mb-0">{{$service->user->name}}</h5>
                                                            <small class="text-muted">{{\Carbon\Carbon::parse($service->created_at)->diffForHumans()}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($service->image)
                                                <img class="img-fluid h-px-200" src="{{ asset("{$service->path}$service->image ") }}" alt="Card image cap">
                                            @else

                                            <img class="img-fluid" src="../../assets/img/backgrounds/event.jpg" alt="Card image cap">
                                            @endif
                                            <div class="featured-date mt-n4 ms-4 bg-white rounded w-px-50 shadow text-center">
                                                <h5 class="mb-0 text-dark"><span class="badge bg-label-primary p-3 border-light">{{$service->category->name}}</span></h5>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="text-center fw-bolder mb-4">{{$service->name}}</h5>
                                                <div class="d-flex align-items-center justify-content-center my-4 gap-2">
                                                    @if($service->is_active)
                                                    <span class="badge bg-label-success fs-6 pb-3 me-1">مفعل</span>
                                                    @else
                                                    <span class="badge bg-label-success fs-6 pb-3 me-1">غير مفعل</span>
                                                    @endif
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center mt-4">
                                                    @if(Auth::user()->userServiceProvider())
                                                    <a href="{{ route('service.edit',$service->id) }}">
                                                        <button type="button" class="btn btn-label-primary ">
                                                            <span class="tf-icons bx bxs-eyedropper"></span>&nbsp; تعديل
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('service.delete',$service->id) }}" method='get'>
                                                        <button type="button" class="btn btn-label-danger confirm mx-2">
                                                            <span class="tf-icons bx bx-block"></span>&nbsp; حذف
                                                        </button>
                                                    </form>
                                                    @else
                                                    <a href="{{ route('index') }}">
                                                        <button type="button" class="btn btn-label-danger confirm">
                                                            <span class="tf-icons bx bx-block"></span>&nbsp; ايقاف
                                                        </button>
                                                    </a>
                                                    @endif
                                                </div>
                                                <div class="mt-5 d-flex fs-6 align-items-center justify-content-around">
                                                    <a href="#" class="text-muted me-3" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true" title="" data-bs-original-title="اجمالي الطلبات">
                                                        <i class="bx bx-cart me-1 fs-4"></i>0</a>
                                                    <a href="#" class="text-muted" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true" title="" data-bs-original-title="اجمالي التقييمات"><i class="bx bx-star me-1 fs-4"></i> {{$service->stars}}</a>
                                                    <a href="#" class="text-muted" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true" title="" data-bs-original-title="وقت التسليم التقريبي"><i class="bx bx-time me-1 fs-4"></i> {{$service->interval}} </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                        <p class="text-center py-3 text-danger fs-4">
                                            لا يوجد نتائج
                                        </p>
                                        <img src="{{ asset('img/noResultFound.png') }}" class="h-px-200 w-auto mx-auto">
                                @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation my-5 px-2 justify-content-center text-center">

                    {{ $services->links('pagination::bootstrap-5')   }}

                </nav>
            </div>
        </div>
    </div>
</div>
