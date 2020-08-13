@extends('layouts.user-core')

@section('title', 'Мій профіль')

@section('user-content')

    <div class="card">
        <div class="card-header">
            <h2>{{ $user->name }}</h2>
            <div class="form-text text-muted">{{ $user->email }}</div>
        </div>
        <div class="card-body">
            <div>
                @if($user->isManager())
                    <h4 class="text-warning">Права доступу менеджера</h4>
                @endif
            </div>

            <div class="mt-2 mb-2">
                <a href="{{ route('order.create') }}"><button type="button" class="btn btn-primary btn-lg">Створити заявку</button></a>
            </div>
            @include('orders.includes._order-list')
            @include('layouts._pagination', ['paginator' => $orders])
        </div>
    </div>

@endsection
