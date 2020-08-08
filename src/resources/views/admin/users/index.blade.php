@extends('admin.layouts.admin-core')

@section('title', 'Усі заяви')

@section('admin-content')

    <div class="card">
        <div class="card-header">
            <h2>Усі користувачі</h2>
        </div>

        <div class="card-body">

            @if($paginator)
                @include('layouts._pagination')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Ім'я студента</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Кількість замовлень</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paginator as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->orders_count }}</td>
                            <td>
                                <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Перегляд</a>
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-secondary btn-sm" role="button" aria-pressed="true">Редагувати</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include('layouts._pagination')
            @endif
            {{-- TODO: Add message in else case in all similar places --}}
        </div>
    </div>

@endsection
