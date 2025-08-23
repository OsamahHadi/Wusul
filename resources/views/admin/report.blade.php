@extends('layouts.dashboard')

@section('extra-style')
<link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"> لوحة التحكم /</span> المشكله
    </h4>
    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-10 col-md-9 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                            <table class="table table-hover mb-5">
                    <thead>
                        <tr>
                            <th>أسم المستخدم</th>
                            <th>نوع المستخدم</th>
                            <th>تاريخ كتاية المشكله</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>{{$report->user->name}}</td>
                            <td><span class="badge bg-label-primary fs-6 pb-3">{{$report->user->type?'موفر خدمه':'مستخدم'}}</span></td>
                            <td>{{\Carbon\Carbon::parse($report->created_at)->diffForHumans()}}</td>
                        </tr>
                    </tbody>
                </table>
                <hr class="my-0">
                <div class="">
                    <div class="m-0 pt-3">
                        <span class="fs-4 pt-3 fw-bolder px-5">وصف المشكله </span>

                        <div class="card-body">
                            <div class="row mx-2">
                                <div class="col-12 bg-label-facebook p-3 fs-6">
                                    <span>
                                        {{$report->message}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice -->

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
        },1000);
    }

</script>
        {{-- const inputs = document.querySelectorAll('.div-stars-container input');
        const stars = document.querySelectorAll('.div-stars-container i'); --}}
<script src="{{ asset('js/confirm.js') }}"></script>
@endsection
