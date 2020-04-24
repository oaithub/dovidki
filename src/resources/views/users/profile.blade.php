@extends('layouts/app')

@section('content')

    <h1>{{ $user["name"] }}</h1>
    <div>
        Группа: {{ $user->group }}<br/>
        e-mail: {{ $user->email }}
    </div>

    <div>
        @if($orders)
            <ul class="list-group">
            @foreach($orders as $order)
                <li class="list-group-item">
                    Довідка про доходи {{ \Carbon\Carbon::parse($order->preiod_from)->format('m-Y')}} - {{Carbon\Carbon::parse($order->preiod_to)->format('m-Y')}}
                </li>
            @endforeach
            </ul>
        @endif
    </div>

@endsection