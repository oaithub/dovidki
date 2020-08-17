<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#id</th>
        <th scope="col">Ім'я студента</th>
        <th scope="col">Спеціальність</th>
        <th scope="col">Тип</th>
        <th scope="col">Стан замовлення</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @forelse($orders as $order)
        <tr>
            <th scope="row">{{ $order->id }}</th>
            <td><a href="{{ route('admin.user.show', $order->user->id ) }}">{{ $order->user->getNameInitials() }}</a></td>
            <td>{{ $order->group->specialty }}, {{ $order->group->year }} курс</td>
            <td>{{ $order->type->name }}</td>
            <td>
                @include('orders.includes._order-state', ['stateCode' => $order->state->code])
            </td>
            <td><a href="{{ route('admin.order.'.$order->type->code.'.show', $order->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Перегляд</a></td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">Замовлення відсутні</td>
        </tr>
    @endforelse
    </tbody>
</table>
