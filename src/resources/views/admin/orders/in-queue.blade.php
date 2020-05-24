@extends('layouts.app')

@section('title', 'В черзі')

@section('content')

    <header>
        <h1>В черзі</h1>
    </header>

    @include('layouts._order-list-stateless')

@endsection
