<!-- Sidebar Start -->
<div class="border-right bg-dark" id="sidebar-wrapper">
    <div class="sidebar-heading">Довідки ОА</div>
    <div class="list-group list-group-flush">
        <a href="{{ route('manager:orders_all') }}" class="list-group-item bg-dark text-white">Довідки</a>

        <a href="{{ route('manager:orders_in_queue') }}" class="sidebar-subitem list-group-item bg-dark text-white">В черзі</a>
        <a href="{{ route('manager:orders_ready') }}" class="sidebar-subitem list-group-item bg-dark text-white">Очікують на видачу</a>
        <a href="{{ route('manager:orders_issued') }}" class="sidebar-subitem list-group-item bg-dark text-white">Видані</a>

        <a href="{{ route('manager:users_all') }}" class="list-group-item bg-dark text-white">Користувачі</a>
    </div>
</div>
<!-- Sidebar End -->
