@extends('admin.layouts.admin-core')

@section('title', 'Усі заяви')

@section('admin-content')

    <header class="mb-2">
        <h1>Усі заяви</h1>
    </header>

    @include('orders.includes._order-list')

@endsection
