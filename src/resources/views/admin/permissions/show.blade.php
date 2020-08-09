@extends('admin.layouts.admin-core')

@section('title', 'Перегляд дозволів')

@section('admin-content')

    <div class="card">
        <div class="card-header">
            <h2>{{ $permission->name }}</h2>
        </div>

        <div class="card-body">
            <div>
                {{ $permission->description }}
            </div>
            <div class="mt-4">
                <h2>
                    Ролі з доступом
                </h2>
                @include('admin.roles.includes._role-list', ['roles' => $permission->roles])
            </div>
        </div>
    </div>
@endsection
