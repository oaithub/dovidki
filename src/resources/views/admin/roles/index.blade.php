@extends('admin.layouts.admin-core')

@section('title', 'Усі ролі')

@section('admin-content')
    <div class="card">
        <div class="card-header">
            <h2>Усі ролі</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.role.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group mb-2 col-5">
                        <label for="name" class="sr-only">Назва ролі</label>
                        <input type="text" class="form-control" name="name" placeholder="Назва ролі" value="{{ old('name') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </div>
                </div>
            </form>
            @include('admin.roles.includes._role-list', ['roles' => $paginator])
        </div>
    </div>

@endsection
