@extends('admin.layouts.admin-core')

@section('title', 'Перегляд ролі')

@section('admin-content')

    <div class="card">
        <div class="card-header">
            <h2>{{ $role->name }}</h2>
        </div>

        <div class="card-body">
            <div>
                {{ $role->description }}
            </div>
            <div class="mt-4">
                <h2>
                    Активні дозволи
                </h2>

                @include('admin.permissions.includes._permission-list', ['permissions' => $role->permissions])
            </div>
        </div>
    </div>
@endsection
