<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#id</th>
        <th scope="col">Назва дозволу</th>
        <th scope="col">Опис</th>
        <th scope="col">Перегляд</th>
    </tr>
    </thead>
    <tbody>
    @forelse($permissions as $permission)
        <tr>
            <th scope="row">{{ $permission->id }}</th>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->description }}</td>
            <td><a href="{{ route('admin.permission.show', $permission->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Переглянути</a></td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">Дозволи відсутні</td>
        </tr>
    @endforelse
    </tbody>
</table>
