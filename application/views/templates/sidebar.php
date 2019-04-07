    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SIVA Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">




        <!-- QUERY MENU -->


        <!-- Heading -->
        <div class="sidebar-heading">
            Administrator
        </div>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="./">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data Management
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/datel');?>">
                <i class="fas fa-fw fa-building"></i>
                <span>Datel</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/sto');?>">
                <i class="fas fa-fw fa-gopuram"></i>
                <span>STO</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/teknisi'); ?>">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>Teknisi</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-map-marker-alt"></i>
                <span>Lokasi Properti</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/layanan'); ?>">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Layanan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/pelanggan'); ?>">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>Pelanggan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Denda</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Transaksi
        </div>

        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-plug"></i>
                <span>Pemasangan Indihome</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-plug"></i>
                <span>Pemasangan Datin</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-stream"></i>
                <span>Pencabutan Indihome</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-stream"></i>
                <span>Pencabutan Datin</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            User
        </div>

        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>My Profile</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Users</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar --> 