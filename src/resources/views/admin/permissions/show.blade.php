@extends('admin.layouts.admin-core')

@section('title', 'Перегляд дозволів')

@section('admin-content')

    <h1>{{ $permission->name }}</h1>
    <div>
        Опис цього дозволу і все. Можливо ще якийсь текст.
    </div>
    <div class="mt-4">
        <h2>
            Ролі з доступом
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
            @foreach($permission->roles as $role)
                <tr>
                    <th scope="row">{{ $role->id }}</th>
                    <td>{{ $role->name }}</td>
                    <td>Можливо опис</td>
                    <td><a href="{{ route('admin.role.show', $role->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Переглянути</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection