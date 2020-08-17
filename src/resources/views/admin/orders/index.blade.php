@extends('admin.layouts.admin-core')

@section('title', 'Усі заяви')

@section('admin-content')

    <div class="card">
        <div class="card-header">
            <h2>Усі заяви</h2>
            {{-- TODO: Show type attribute --}}
        </div>

        <div class="card-body">
            @include('admin.orders.includes._order-list')
            @include('layouts._pagination', ['paginator' => $orders])
        </div>
    </div>

@endsection
