@extends('admin.layouts.admin-core')

@section('title', 'Домашня сторінка')

@section('admin-content')
    <div class="container">
        <div class="row mx-auto">

            @foreach($typeList as $type)
                <div class="col-md">
                    <div class="card bg-light mb-3 text-center">
                        <h4 class="card-header">{{ $type->name }}</h4>
                        <div class="card-body">
                            <div class="col-md">
                                <div class="card border-primary mb-3 text-center">
                                    <div class="card-body text-primary">
                                        <h1 class="card-title">
                                            {{ $ordersCount[$type->id][\App\Models\OrderState::STATE_IN_QUEUE] ?? 0 }}
                                        </h1>
                                        <p class="card-text">В черзі</p>
                                    </div>
                                </div>

                                <div class="card border-warning mb-3 text-center">
                                    <div class="card-body text-warning">
                                        <h1 class="card-title">
                                            {{ $ordersCount[$type->id][\App\Models\OrderState::STATE_WAIT_FOR_ISSUE] ?? 0 }}
                                        </h1>
                                        <p class="card-text">Очікують на видачу</p>
                                    </div>
                                </div>

                                <div class="card border-success mb-3 text-center">
                                    <div class="card-body text-success">
                                        <h1 class="card-title">
                                            {{ $ordersCount[$type->id][\App\Models\OrderState::STATE_CANCELED_BY_MANAGER] ?? 0 }}
                                        </h1>
                                        <p class="card-text">Видані</p>
                                    </div>
                                </div>

                                <div class="card border-danger mb-3 text-center">
                                    <div class="card-body text-danger">
                                        <h1 class="card-title">
                                            {{ $ordersCount[$type->id][\App\Models\OrderState::STATE_CANCELED_BY_MANAGER] ?? 0 }}
                                        </h1>
                                        <p class="card-text">Відмінені</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            </div>
        </div>
@endsection
