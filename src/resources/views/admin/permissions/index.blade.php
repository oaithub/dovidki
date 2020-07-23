@extends('admin.layouts.admin-core')

@section('title', 'Усі дозволи')

@section('admin-content')

    <header>
        <h1>Усі дозволи</h1>
    </header>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Назва дозволу</th>
            <th scope="col">Опис</th>
            <th scope="col">Перегляд</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paginator as $permission)
            <tr>
                <th scope="row">{{ $permission->id }}</th>
                <td>{{ $permission->name }}</td>
                <td>Можливо опис</td>
                <td><a href="{{ route('admin.permission.show', $permission->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Переглянути</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
