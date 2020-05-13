@extends('layouts.app')

@section('title', 'Перегляд заяви')

@section('content')

    <header>
        <h1>Перегляд заяви</h1>
    </header>

        <div>
            <h2>Замовлення {{ $order->id }}</h2>
            <p>
                Довідка про доходи<br/>
                В період від {{ $order->period_from->format('m-Y') }} до {{ $order->period_to->format('m-Y') }}<br/>
                Студент {{ $order->user_name }} спеціальності {{ $order->user_group }}
            </p>
        </div>

@endsection