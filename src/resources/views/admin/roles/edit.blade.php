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
                <div class="form-group">
                    <label for="exampleInputEmail1">Опис ролі:</label>
                    <textarea name="description" rows="4"
                              class="form-control">{{ old('description', $role->description) }}</textarea>
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
                    @forelse($allPermissions as $permission)
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" {{ $rolePermissions->contains($permission->id) ? 'checked' : '' }}
                                    name="permission[]" type="checkbox" value="{{ $permission->id }}">
                                </div>
                            </th>
                            <td>
                                <a href="{{ route('admin.permission.show', $permission->id) }}">{{ $permission->name }}</a>
                            </td>
                            <td>
                                {{ $permission->description }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Дозволи відсутні</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Зберегти</button>
            </div>
        </div>
    </form>
@endsection
