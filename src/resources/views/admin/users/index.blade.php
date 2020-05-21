@extends('layouts.app')

@section('title', 'Усі заяви')

@section('content')

    <header>
        <h1>Усі користувачі</h1>
    </header>

    @include('layouts._user-list')

@endsection
