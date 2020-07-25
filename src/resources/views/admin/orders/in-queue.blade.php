@extends('admin.layouts.admin-core')

@section('title', 'В черзі')

@section('admin-content')

    <header class="mb-2">
        <h1 class="text-primary">В черзі</h1>
    </header>

    @include('orders.includes._order-list', ['showState' => false])

@endsection
