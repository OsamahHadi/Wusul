<div>

    <div class="col-12">
        <div class="nav-align-top">

            <div class="table-responsive text-nowrap">
                <table class="table table-hover mb-5">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الفاتورة</th>
                            <th>العملية</th>
                            <th>الوصف</th>
                            <th>التاريخ</th>
                            <th>المبلغ</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($wallet->transactions as $transaction)
                        <tr>

                            <td>{{$loop->index+1 }}</td>
                            <td>{{$transaction->meta['payment']??''}}</td>
                            @if($transaction->type=='deposit')

                            <td><span class="badge bg-label-success pb-3 fs-6">ايداع</span></td>
                            <td class="text-success">{{$transaction->meta['deposit']??''}}</td>
                            @else
                            <td><span class="badge bg-label-danger pb-3 fs-6">سحب</span></td>
                            <td class="text-danger">{{$transaction->meta['pull']??''}}</td>
                            @endif


                            <td>{{\Carbon\Carbon::parse($transaction->created_at)->diffForHumans()}}</td>
                            <td>{{$transaction->amount}}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination my-5 justify-content-center">
            <li class="page-item first">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
            </li>
            <li class="page-item prev">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="javascript:void(0);">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0);">4</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0);">5</a>
            </li>
            <li class="page-item next">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
            </li>
            <li class="page-item last">
                <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
            </li>
        </ul>
    </nav>
</div>
