@extends('layouts.app')

@section('content')
    <div class="mt-4">
        <h1>Hello from homepage</h1>
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary btn-block" href="{{ url('/orders') }}">Всі заяви</a>
        <a class="btn btn-primary btn-block" href="{{ url('/orders/create') }}">Створити заяву</a>
    </div>
    @include('layouts._errors')

@endsection