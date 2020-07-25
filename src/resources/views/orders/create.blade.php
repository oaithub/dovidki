@extends('layouts.user-core')

@section('title', 'Створення заяви')

@section('user-content')

    <header>
        <h1>Створення заяви</h1>
    </header>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Ваше ім'я:</label>
            <input type="text" readonly class="form-control-plaintext" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="group">Ваша група:</label>
            <select class="form-control" name="group" required>
                <option value="" hidden>Виберіть</option>
                @foreach($groups as $id => $groupInfo)
                    <option value="{{ $id }}">{{ $groupInfo->specialty }}, {{ $groupInfo->year }} курс</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="type">Тип довідки:</label>
            <select class="form-control" name="type" required>
                <option value="" hidden>Виберіть</option>
                @foreach($types as $id => $typeName)
                    <option value="{{ $id }}">Довідка про {{ $typeName }}</option>
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
