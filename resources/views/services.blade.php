@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-help-center.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css">

    <link rel="stylesheet" href="{{ asset('assets/css/tabs.css') }}">
@endsection

@section('content')

<livewire:service-filter>
@endsection

@section('scripts')
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
@endsection
