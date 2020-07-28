@extends('admin.layouts.admin-core')

@section('title', 'Редагування ролі')

@section('admin-content')

    <form method="POST" action="{{ route('admin.role.update', $role->id) }}" >
        @csrf
        @method('PATCH')
        <div class="card">
            <div class="card-header">
                <h2>Роль: {{ $role->name }}</h2>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Назва ролі:</label>
                    <input type="text" name="name" class="form-control"
                           placeholder="Назва ролі" value="{{ old('name', $role->name) }}">
                </div>

                <h2>Дозволи</h2>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Дозвіл</th>
                        <th scope="col">Опис</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allPermissions as $permission)
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input type="hidden" name="permission[]" value="0">
                                    <input class="form-check-input" {{ $rolePermissions->contains($permission->id) ? 'checked' : '' }}
                                    name="permission[]" type="checkbox" value="{{ $permission->id }}">
                                </div>
                            </th>
                            <td>
                                <a href="{{ route('admin.permission.show', $role->id) }}">{{ $permission->name }}</a>
                            </td>
                            <td>
                                Можливо опис
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </div>
    </form>
@endsection
