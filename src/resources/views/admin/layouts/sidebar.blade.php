<!-- Sidebar Start -->
<div class="border-right bg-dark" id="sidebar-wrapper">
    <div class="sidebar-heading">Довідки ОА</div>
    <div class="list-group list-group-flush">
        <a href="{{ route('admin.home') }}" class="list-group-item bg-dark text-white">Довідки</a>

        <a href="{{ route('admin.order.study.index') }}" class="sidebar-subitem list-group-item bg-dark text-white">Навчання</a>
        <a href="{{ route('admin.order.income.index') }}" class="sidebar-subitem list-group-item bg-dark text-white">Доходи</a>
        <a href="{{ route('admin.order.debt.index') }}" class="sidebar-subitem list-group-item bg-dark text-white">Заборгованість</a>

        <a href="{{ route('admin.user.index') }}" class="list-group-item bg-dark text-white">Користувачі</a>

        <a href="{{ route('admin.role.index') }}" class="list-group-item bg-dark text-white">Ролі</a>
        <a href="{{ route('admin.permission.index') }}" class="list-group-item bg-dark text-white">Дозволи</a>

    </div>
</div>
<!-- Sidebar End -->
