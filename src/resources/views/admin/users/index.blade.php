@extends('admin.layouts.admin-core')

@section('title', 'Усі заяви')

@section('admin-content')

    <header>
        <h1>Усі користувачі</h1>
    </header>

    @include('layouts._user-list')

@endsection
