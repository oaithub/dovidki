@extends('layouts.app')

@section('title', 'Усі заяви')

@section('content')

    <header>
        <h1>Усі заяви</h1>
    </header>

    @foreach($orders as $order)

        <div>
            <a href="{{ route('order', ['id' => $order->id]) }}">
                <h2>Замовлення {{ $order->id }}</h2>
            </a>
            <p>
                Довідка про доходи<br/>
                {{-- TODO: Create function for formating dates --}}
                В період від {{ \Carbon\Carbon::parse($order->preiod_from)->format('m-Y')}} до {{Carbon\Carbon::parse($order->preiod_to)->format('m-Y')}}<br/>
                Студент {{ $order->user_name }} спеціальності {{ $order->user_group }}
            </p>
        </div>

    @endforeach

@endsection