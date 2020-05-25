@extends('admin.layouts.admin-core')

@section('title', 'Видані заяви')

@section('admin-content')

    <header class="mb-2">
        <h1 class="text-success">Видані заяви</h1>
    </header>

    @include('layouts._order-list-stateless')

@endsection
