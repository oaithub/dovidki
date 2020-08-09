@extends('admin.layouts.admin-core')

@section('title', 'Усі дозволи')

@section('admin-content')

    <div class="card">
        <div class="card-header">
            <h2>Усі дозволи</h2>
        </div>

        <div class="card-body">
            @include('admin.permissions.includes._permission-list', ['permissions' => $paginator])
            @include('layouts._pagination')
        </div>
    </div>

@endsection
