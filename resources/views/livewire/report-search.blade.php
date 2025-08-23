<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container-xxl flex-grow-1 container-p-y pt-0 px-sm-2 px-0">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">لوحة التحكم / </span>الشكاوي
            </h4>

            <div class="card position-relative">
                <h5 class="card-header fs-4 fw-bolder">الشكاوي</h5>

                <div class="row mx-2">
                    <div class="row d-sm-inline-flex mx-2">
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">بحث</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                                <input wire:model='search' type="text" class="form-control" placeholder="بحث ..." aria-label="Search..." aria-describedby="basic-addon-search31">
                                <span class="input-group-text btn btn-primary" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">ترتيب حسب</label>
                            <select class="form-select w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" wire:model='sortFile'>
                                <option data-icon="bx bx-rename" value='id'>رقم المشكله</option>
                                <option data-icon="bx bxs-watch" value='created_at'>تاريخ التسجيل</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-3">
                            <label for="selectpickerIcons" class="form-label fs-6 fw-bolder">الحالة </label>
                            <select class="form-select w-100 show-tick" id="selectpickerIcons" data-icon-base="bx" data-tick-icon="bx-check" data-style="btn-default" wire:model='status'>
                                <option data-icon="bx bx-list-check" value='0'>الكل</option>
                                <option data-icon="bx bx-check" value='2'>جديد</option>
                                <option data-icon="bx bx-block" value='1'>تم الاطلاع عليه</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover mb-5">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>أسم المستخدم</th>
                                    <th>نوع المستخدم</th>
                                    <th>الحالة</th>
                                    <th>تاريخ التسجيل</th>
                                    <th> العمليات</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($reports as $report)
                                <tr>

                                    <td>{{$loop->index+1 }}</td>
                                    <td>{{$report->user->name}}</td>
                                    <td><span class="badge bg-label-primary fs-6 pb-3">{{$report->user->type?'موفر خدمه':'مستخدم'}}</span></td>
                                    <td>
                                        {{$report->show?'تم الاطلاع عليه':'جديد'}}
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($report->created_at)->diffForHumans()}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('report.show',$report->id)}}">
                                            <button type="button" class="btn btn-label-primary">
                                                <span class=""></span>&nbsp; عرض
                                            </button>
                                        </a>
                                    </td>
                                    @empty
                                    <p class="text-center py-3 text-danger fs-4">
                                        لا يوجد نتائج
                                    </p>
                                    <img src="{{ asset('img/noResultFound.png') }}" class="h-px-200 w-auto mx-auto">

                                    @endforelse
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination my-5 justify-content-center">
                        {{ $reports->links('pagination::bootstrap-5')   }}


                    </ul>
                </nav>
        </div>
    </div>
</div>
