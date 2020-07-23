@extends('admin.layouts.admin-core')

@section('title', 'Усі ролі')

@section('admin-content')

    <header>
        <h1>Усі ролі</h1>
    </header>

    <form action="{{ route('admin.role.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group mb-2 col-5">
                <label for="name" class="sr-only">Назва ролі</label>
                <input type="text" class="form-control" name="name" placeholder="Назва ролі">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Створити</button>
            </div>
        </div>
    </form>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Назва ролі</th>
            <th scope="col">Опис</th>
            <th scope="col">Перегляд</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paginator as $role)
            <tr>
                <th scope="row">{{ $role->id }}</th>
                <td>{{ $role->name }}</td>
                <td>Можливо опис</td>
                <td><a href="{{ route('admin.role.show', $role->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Переглянути</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
