@extends('admin.layouts.admin-core')

@section('title', 'Перегляд заяви')

@section('admin-content')

    <!-- MAIN COLUMN START -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts._errors')
            <div class="card">
                <div class="card-header">
                    <h2>Замовлення #{{ $order->id }} - @include('layouts._orderState', ['stateCode' => $order->state])</h2>
                </div>
                <!-- CARDBODY START -->
                <div class="card-body">
                    {{-- Деталі замовлення --}}
                    @include('admin.orders.includes.order-info')

                    <hr>

                    @if($order->state == 'in-queue' or $order->state == 'wait-for-issue')
                        <ul class="nav nav-tabs" role="tablist">
                            @if($order->state == 'in-queue')
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#order-ready" role="tab">Замовлення готове</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#order-issued" role="tab">Замовлення видане</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#order-canceled" role="tab">Замовлення відмінене</a>
                            </li>
                        </ul>
                        <br>
                        <div class="tab-content">

                            @if($order->state == 'in-queue')
                                <!-- ORDER-READY TOGGLE START -->
                                <div class="tab-pane" id="order-ready" role="tabpanel">
                                    <form action="{{ route('manager:order_update', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="state" value="wait-for-issue">
                                        <div class="form-group">
                                            <label for="response_message">Інформація для користувача</label>
                                            <textarea name="response_message" id="response_message" rows="8" class="form-control">{{ old('response_message', $order->response_message) }}</textarea>
                                        </div>
                                        <input class="btn btn-warning form-control" type="submit" value='Позначити як "Готове до видачі"'>
                                    </form>
                                </div>
                                <!-- ORDER-READY TOGGLE END -->
                            @endif

                            <!-- ORDER-ISSUED TOGGLE START -->
                            <div class="tab-pane active" id="order-issued" role="tabpanel">
                                <form action="{{ route('manager:order_update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="state" value="issued">
                                    <div class="form-group">
                                        <label for="response_message">Інформація для користувача</label>
                                        <textarea name="response_message" id="response_message" rows="8" class="form-control">{{ old('response_message', $order->response_message) }}</textarea>
                                    </div>
                                    <input class="btn btn-success form-control" type="submit" value='Позначити як "Видане"'>
                                </form>
                            </div>
                            <!-- ORDER-ISSUED TOGGLE END -->

                            <!-- ORDER-CANCELED TOGGLE START -->
                            <div class="tab-pane" id="order-canceled" role="tabpanel">
                                <form action="{{ route('manager:order_update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="state" value="canceled-by-manager">
                                    <div class="form-group">
                                        <label for="response_message">Причина відміни</label>
                                        <textarea name="response_message" id="response_message" rows="8" class="form-control">{{ old('response_message', $order->response_message) }}</textarea>
                                    </div>
                                    <input class="btn btn-danger form-control" type="submit" value='Позначити як "Відмінене"'>
                                </form>
                            </div>
                            <!-- ORDER-CANCELED TOGGLE END -->

                        </div>
                    @endif
                </div>
                <!-- CARDBODY END -->
            </div>
        </div>
    </div>
    <!-- MAIN COLUMN END -->


@endsection
