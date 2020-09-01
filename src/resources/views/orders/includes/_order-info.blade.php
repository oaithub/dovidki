<div class="container">
    <div class="row mx-auto">
        <div class="col-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h6>{{ $order->user->name }}</h6></li>
                <li class="list-group-item"><h6>{{ $order->group->specialty }}, {{ $order->group->year }} курс</h6></li>
            </ul>
        </div>

        <div class="col-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h6>Тип довідки - {{ $order->type->name }}</h6></li>
                <li class="list-group-item"><h6>В період від {{ $order->period_from->format('m-Y') }} до {{ $order->period_to->format('m-Y') }}</h6></li>
            </ul>
        </div>
    </div>
</div>
