@extends('admin.layouts.admin-core')

@section('title', 'Усі заяви')

@section('admin-content')

    <header>
        <h1>Усі користувачі</h1>
    </header>

    @if($paginator)
        @include('layouts._pagination')
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Ім'я студента</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Кількість замовлень</th>
                <th scope="col">Профіль</th>
            </tr>
            </thead>
            <tbody>
            @foreach($paginator as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->orders_count }}</td>
                    <td><a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Перегляд</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('layouts._pagination')
    @endif
    {{-- TODO: Add message in else case in all similar places --}}

@endsection
