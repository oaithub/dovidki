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
                    <h2>Замовлення #{{ $order->id }} - @include('layouts._orderState', ['stateCode' => $order->state])</h2>
                </div>
                <!-- CARDBODY START -->
                <div class="card-body">
                    {{-- Деталі замовлення --}}
                    @include('admin.orders.includes.order-info')
                </div>
                <!-- CARDBODY END -->
            </div>
        </div>
    </div>

@endsection
