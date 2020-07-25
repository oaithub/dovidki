@extends('layouts.user-core')

@section('title', 'Мій профіль')

@section('user-content')

    <h1>{{ $user["name"] }}</h1>
    <div>
        @if($user->isManager())
            <h4 class="text-warning">Права доступу менеджера</h4>
        @endif
        e-mail: {{ $user->email }}
    </div>

    <div class="mt-2 mb-2">
        <a href="{{ route('order.create') }}"><button type="button" class="btn btn-primary btn-lg">Створити заявку</button></a>
    </div>
    @include('orders.includes._order-list', ['showForStudent' => true])

@endsection
