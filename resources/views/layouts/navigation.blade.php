<nav class="sidebar sidebar-offcanvas"
     id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('dashboard') }}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('dashboard/mahasiswa*') ? 'active' : '' }}">
            <a class="nav-link"
               href="{{ route('dashboard.mahasiswa.index') }}">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">Mahasiswa</span>
            </a>
        </li>
    </ul>
</nav>