@extends('admin.layouts.admin-core')

@section('title', 'Редагування користувача')

@section('admin-content')

    <form method="POST" action="{{ route('admin.user.update', $user->id) }}" >
        @csrf
        @method('PATCH')
        <div class="card">
            <div class="card-header">
                <h2>{{ $user->name }}</h2>
                <div class="form-text text-muted">{{ $user->email }}</div>
            </div>

            <div class="card-body">
                <h2>Ролі</h2>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Роль</th>
                        <th scope="col">Опис</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allRoles as $role)
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" {{ $userRoles->contains($role->id) ? 'checked' : '' }}
                                    name="role[]" type="checkbox" value="{{ $role->id }}">
                                </div>
                            </th>
                            <td>
                                <a href="{{ route('admin.role.show', $role->id) }}">{{ $role->name }}</a>
                            </td>
                            <td>
                                {{ $role->description }}
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
