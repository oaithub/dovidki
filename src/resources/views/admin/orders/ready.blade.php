@extends('admin.layouts.admin-core')

@section('title', 'Очікують на видачу')

@section('admin-content')

    <header class="mb-2">
        <h1 class="text-warning">Очікують на видачу</h1>
    </header>

    @include('orders.includes._order-list', ['showState' => false])

@endsection
