@extends('layouts/app')

@section('content')

    <h1>{{ $user["name"] }}</h1>
    <div>
        @if($user->isManager())
            <h4 class="text-warning">Права доступу менеджера</h4>
        @else
            <h4 class="text-danger">Права менеджера недоступні</h4>
        @endif
        e-mail: {{ $user->email }}
    </div>

    <a href="{{ route('createOrder') }}"><button type="button" class="btn btn-primary btn-lg">Створити заявку</button></a>


    <div>
        @if($orders)
            <ul class="list-group">
            @foreach($orders as $order)
                <li class="list-group-item">
                    Довідка про доходи {{ $order->period_from->format('m-Y') }} - {{ $order->period_to->format('m-Y') }}
                </li>
            @endforeach
            </ul>
        @endif
    </div>

@endsection