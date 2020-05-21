@extends('layouts.app')

@section('title', 'Перегляд заяви')

@section('content')

    <header>
        <h1>Замовлення #{{ $order->id }} - {{ $order->state() }}</h1>
    </header>

    <div>
        @if($order->ready)
            @if(empty($order->issued_at))
                <h4 class="text-warning">Очікує на видачу</h4>
            @else
                <h4 class="text-success">Видана</h4>
            @endif
        @else
            <h4 class="text-danger">Замовлення в розгляді</h4>
        @endif
        <p>
            <a href="{{ route('manager:user_profile', $order->user->id ) }}">{{ $order->user->name }}</a><br>
            {{ $order->group->specialty }}, {{ $order->group->year }} курс<br>
            Тип довідки - {{ $order->type }}<br>
            В період від {{ $order->period_from->format('m-Y') }} до {{ $order->period_to->format('m-Y') }}<br>
            Створена - {{ $order->created_at }}<br>
        </p>
    </div>

@endsection
