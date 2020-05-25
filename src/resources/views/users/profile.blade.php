@extends('layouts.user-core')

@section('title', 'Мій профіль')

@section('user-content')

    @if (session('success'))
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    @endif

    <h1>{{ $user["name"] }}</h1>
    <div>
        @if($user->isManager())
            <h4 class="text-warning">Права доступу менеджера</h4>
        @endif
        e-mail: {{ $user->email }}
    </div>

    <div class="mt-2 mb-2">
        <a href="{{ route('order:create') }}"><button type="button" class="btn btn-primary btn-lg">Створити заявку</button></a>
    </div>
    @include('layouts._user-order-list')

@endsection
