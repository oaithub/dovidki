@if($paginator)

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#id</th>
            @if(($showForStudent ?? false) == false)<th scope="col">Ім'я студента</th>@endif
            <th scope="col">Спеціальність</th>
            <th scope="col">Тип</th>
            @if($showState ?? true)<th scope="col">Стан замовлення</th>@endif
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paginator as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td><a href="{{ route('admin.user.show', $order->user->id ) }}">{{ $order->user->getNameInitials() }}</a></td>
                <td>{{ $order->group->specialty }}, {{ $order->group->year }} курс</td>
                <td>{{ $order->type }}</td>
                @if($showState ?? true)
                <td>
                    @include('orders.includes._orderState', ['stateCode' => $order->state])
                </td>
                @endif

                @if($showForStudent ?? false)
                    <td><a href="{{ route('order.show', $order->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Перегляд</a></td>
                @else
                    <td><a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Перегляд</a></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

@include('layouts._pagination')

@endif
