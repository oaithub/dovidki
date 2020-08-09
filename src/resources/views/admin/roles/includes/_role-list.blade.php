<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Назва</th>
            <th scope="col">Опис</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @forelse($roles as $role)
        <tr>
            <th scope="row">{{ $role->id }}</th>
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <a href="{{ route('admin.role.show', $role->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Переглянути</a>
                <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-secondary btn-sm" role="button" aria-pressed="true">Редагувати</a>
            </td>
        </tr>

    @empty
        <tr>
            <td colspan="4" class="text-center">Ролі відсутні</td>
        </tr>
    @endforelse

    @if($userIdForEdit ?? false)
        <tr>
            <td colspan="4" class="text-center"><a href="{{ route('admin.user.edit', $userIdForEdit) }}">Редагувати список</a></td>
            {{-- TODO: Change style --}}
        </tr>
    @endif
    </tbody>
</table>
