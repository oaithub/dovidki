@extends('layouts.user-core')

@section('title', 'Створення замовлення')

@section('user-content')

    <header>
        <h1>Перегляд заяви</h1>
    </header>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Замовлення #{{ $order->id }} - @include('orders.includes._order-state', ['stateCode' => $order->state->code])</h2>
                </div>
                <!-- CARDBODY START -->
                <div class="card-body">
                    {{-- Деталі замовлення TODO: Add order-info file for user--}}
                    @include('admin.orders.includes.order-info')
                </div>
                <!-- CARDBODY END -->
            </div>
        </div>
    </div>

@endsection
