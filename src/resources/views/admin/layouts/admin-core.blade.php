@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{!! asset('css/admin-style.css') !!}">
@endsection

@section('content')
<div class="d-flex">
    @include('admin.layouts.sidebar')

    <!-- Page Content Wrapper Start -->
    <div id="page-content-wrapper">
        @include('admin.layouts.navbar')

        <!-- Page Content Start -->
        <div class="container-fluid mt-4 mb-2">
            @yield('admin-content')
        </div>
            <!-- Page Content End -->
    </div>
    <!-- Page Content Wrapper End -->
</div>
@endsection
