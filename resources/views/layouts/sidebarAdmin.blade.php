
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dahsboard') }}">
    <div class="sidebar-brand-icon">
        <img src="{{ asset('images/logo.svg') }}" alt="logo">
        <div class="sidebar-brand-text mx-2">Gudang-IT</div>
    </div>
</a>

<!-- Nav Item - Dashboard -->
<li class="nav-item {{ ($title == "Dashboard Admin") ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center" href="{{ route('dahsboard') }}" title="Dashboard">
        <i class="far fa-chart-bar"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- Heading -->
<div class="sidebar-heading">
    Master Data
</div>

<!-- Nav Item - Kategori -->
<li class="nav-item {{ ($title == "Kategori") ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center" href="{{ route('categories') }}" title="Kategori Barang">
        <i class="fas fa-file-alt"></i>
        <span>Kategori Barang</span></a>
</li>
<!-- Nav Item - Stock -->
<li class="nav-item {{ ($title == "Stok Barang") ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center" href="{{ route('stock') }}" title="Stok Barang">
        <i class="fas fa-boxes"></i>
        <span>Stok Barang</span></a>
</li>
<!-- Nav Item - Barang Masuk -->
<li class="nav-item {{ ($title == "Barang Masuk") ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center" href="{{ route('barang.masuk') }}" title="Barang Masuk">
        <i class="fas fa-dolly-flatbed"></i>
        <span>Barang Masuk</span></a>
</li>
<!-- Nav Item - Barang Keluar -->
<li class="nav-item {{ ($title == "Barang Keluar") ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center" href="{{ route('barang.keluar') }}" title="Barang Keluar">
        <i class="fas fa-dolly-flatbed fa-flip-horizontal"></i>
        <span>Barang Keluar</span></a>
</li>



<!-- Nav Item - Barang -->
<li class="nav-item {{ ($title == "Data Barang") ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center" href="{{ route('log.barang') }}" title="Log Barang">
        <i class="fas fa-stream"></i>
        <span>Log Barang</span></a>
</li>

<!-- Heading -->
<div class="sidebar-heading">
    Pengaturan
</div>

<!-- Nav Item - Manajemen Roles -->
<li class="nav-item {{ ($title == "Manajemen Role") ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center" href="{{ route('manage.role') }}" title="Manajemen Roles">
        <i class="fas fa-user-tie"></i>
        <span>Manajemen Roles</span></a>
</li>

<!-- Nav Item - Manajemen Users -->
<li class="nav-item {{ ($title == "Manajemen Pengguna") ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center" href="{{ route('manage.user') }}" title="Manajemen Karyawan">
        <i class="fas fa-users-cog"></i>
        <span>Manajemen Karyawan</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-md-block">

<!-- Nav Item - Log Out Menu -->
<li class="nav-item {{ ($title == "Logout") ? 'active' : '' }}">
    <a class="nav-link d-flex align-items-center" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal" title="Keluar">
    <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
        <span>Keluar</span></a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

