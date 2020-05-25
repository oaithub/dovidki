@extends('admin.layouts.admin-core')

@section('title', 'Профіль користувача')

@section('admin-content')

    <h1>{{ $user->name }}</h1>
    <div>
        @if($user->isManager())
            <h4 class="text-warning">Права доступу менеджера</h4>
        @else
            <h4 class="text-danger">Права менеджера недоступні</h4>
        @endif
        e-mail: {{ $user->email }}
    </div>

    <div class="mt-4">
        <h2>
            Усі заяви студента
        </h2>

        @include('layouts._order-list')
    </div>
@endsection
