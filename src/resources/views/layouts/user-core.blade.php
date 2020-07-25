@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{!! asset('css/user-style.css') !!}">
@endsection

@section('content')

    @include('layouts.user-navbar')

    <div class="container mt-4">
        @include('layouts._notifications')

        @yield('user-content')
    </div>
@endsection
