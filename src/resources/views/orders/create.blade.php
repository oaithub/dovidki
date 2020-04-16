@extends('layouts.app')

@section('title', 'Створення заяви')

@section('content')

    <header>
        <h1>Створення заяви</h1>
    </header>

    <form action="/orders" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Ваше ім'я:</label>
            <input class="form-control" name="user_name" type="text" required>
        </div>

        <div class="form-group">
            <label for="group">Ваша група:</label>
            <select class="form-control" name="user_group" required>
                <option value="" hidden>Виберіть</option>
                @foreach($groups as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-row">
            <div class="form-group col">
                <label for="period_from">Початок періоду</label>
                <input class="form-control" name="period_from" type="date" value="{{ Carbon\Carbon::now()->subMonth()->format('Y-m-d') }}" required>
            </div>
            <div class="form-group col">
                <label for="period_to">Кінець періоду</label>
                <input class="form-control" name="period_to" type="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
            </div>
        </div>
        <input class="btn btn-primary form-control" type="submit" value="Відправити">
    </form>
@endsection