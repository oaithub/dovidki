@extends('admin.layouts.admin-core')

@section('title', 'Усі заяви')

@section('admin-content')

    <div class="card">
        <div class="card-header">
            <h2>Усі заяви</h2>
        </div>

        <div class="card-body">
            @include('orders.includes._order-list')
        </div>
    </div>

@endsection
