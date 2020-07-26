@extends('admin.layouts.admin-core')

@section('title', 'Перегляд ролі')

@section('admin-content')

    <div class="card">
        <div class="card-header">
            <h2>{{ $role->name }}</h2>
        </div>

        <div class="card-body">
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($role->permissions as $permission)
                        <tr>
                            <th scope="row">{{ $permission->id }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>Можливо опис</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
