@if($orders)
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Ім'я студента</th>
            <th scope="col">Спеціальність</th>
            <th scope="col">Тип</th>
            <th scope="col">Стан замовлення</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td><a href="{{ route('profile', ['id' => $order->user->id] ) }}">{{ $order->user->getNameInitials() }}</a></td>
                <td>{{ $order->group->specialty }}, {{ $order->group->year }} курс</td>
                <td>{{ $order->type }}</td>
                <td>{{ $order->state() }}</td>
                <td><a href="{{ route('managerOrder', $order->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Перегляд</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
