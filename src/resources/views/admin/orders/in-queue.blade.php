@extends('admin.layouts.admin-core')

@section('title', 'В черзі')

@section('admin-content')


    <div class="card">
        <div class="card-header">
            <h2 class="text-primary">В черзі</h2>
        </div>

        <div class="card-body">
            @include('orders.includes._order-list', ['showState' => false])
        </div>
    </div>

@endsection
