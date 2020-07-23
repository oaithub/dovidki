@extends('admin.layouts.admin-core')

@section('title', 'Перегляд ролі')

@section('admin-content')

    <h1>{{ $role->name }}</h1>
    <div>
        Опис цієї ролі і все. Можливо ще якийсь текст.
    </div>
    <div class="mt-4">
        <h2>
            Активні дозволи
        </h2>

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
            @foreach($role->permissions as $permission)
                <tr>
                    <th scope="row">{{ $permission->id }}</th>
                    <td>{{ $permission->name }}</td>
                    <td>Можливо опис</td>
                    <td><a href="{{ route('admin.permission.show', $role->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Переглянути</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
