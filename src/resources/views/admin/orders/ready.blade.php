@extends('layouts.app')

@section('title', 'Не видані заяви')

@section('content')

    <header>
        <h1>Очікують на видачу</h1>
    </header>

    @include('layouts._order-list-stateless')

@endsection
