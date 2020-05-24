@extends('layouts/app')

@section('content')

    <h1>{{ $user["name"] }}</h1>
    <div>
        @if($user->isManager())
            <h4 class="text-warning">Права доступу менеджера</h4>
        @else
            <h4 class="text-danger">Права менеджера недоступні</h4>
        @endif
        e-mail: {{ $user->email }}
    </div>

    <div class="mt-2 mb-2">
        <a href="{{ route('order:create') }}"><button type="button" class="btn btn-primary btn-lg">Створити заявку</button></a>
    </div>
    @include('layouts._user-order-list')

@endsection
