@if($paginator)
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Ім'я студента</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Кількість замовлень</th>
            <th scope="col">Профіль</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paginator as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->orders_count }}</td>
                <td><a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Перегляд</a></td>
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
