<!-- Sidebar Start -->
<div class="border-right bg-dark" id="sidebar-wrapper">
    <div class="sidebar-heading">Довідки ОА</div>
    <div class="list-group list-group-flush">
        <a href="{{ route('admin.order.index') }}" class="list-group-item bg-dark text-white">Довідки</a>

        <a href="{{ route('admin.order.inQueue') }}" class="sidebar-subitem list-group-item bg-dark text-white">В черзі</a>
        <a href="{{ route('admin.order.ready') }}" class="sidebar-subitem list-group-item bg-dark text-white">Очікують на видачу</a>
        <a href="{{ route('admin.order.issued') }}" class="sidebar-subitem list-group-item bg-dark text-white">Видані</a>

        <a href="{{ route('admin.user.index') }}" class="list-group-item bg-dark text-white">Користувачі</a>

        <a href="{{ route('admin.role.index') }}" class="list-group-item bg-dark text-white">Ролі</a>
        <a href="{{ route('admin.permission.index') }}" class="list-group-item bg-dark text-white">Дозволи</a>

    </div>
</div>
<!-- Sidebar End -->
