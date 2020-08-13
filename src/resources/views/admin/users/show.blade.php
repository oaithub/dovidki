@extends('admin.layouts.admin-core')

@section('title', 'Профіль користувача')

@section('admin-content')

    <div class="card">
        <div class="card-header">
            <h2>{{ $user->name }}</h2>
            <div class="form-text text-muted">{{ $user->email }}</div>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <h3>Активні ролі:</h3>
                @include('admin.roles.includes._role-list', ['roles' => $roles, 'userIdForEdit' => $user->id])
            </div>

            <hr>

            <div class="mt-4">
                <h2>
                    Усі заяви студента
                </h2>

                @include('admin.orders.includes._order-list')
                @include('layouts._pagination', ['paginator' => $orders])
            </div>
        </div>
    </div>
@endsection
