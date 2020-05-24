@if($paginator)
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Спеціальність</th>
            <th scope="col">Тип</th>
            <th scope="col">Стан замовлення</th>
            <th scope="col">Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paginator as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->group->specialty }}, {{ $order->group->year }} курс</td>
                <td>{{ $order->type }}</td>
                <td>
                    @include('layouts._orderState', ['stateCode' => $order->state])
                </td>
                <td><a href="{{ route('order:show', $order->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Перегляд</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($paginator->total() > $paginator->count())
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{ $paginator->links() }}
            </div>
        </div>
    @endif

@endif
