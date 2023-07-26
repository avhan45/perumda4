<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('asset') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <marquee class="brand-text font-weight-light">PERUMDA Pasar Kota Kendari</marquee>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('asset') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= strtoupper($username) ?></a>
                <span class="badge badge-success">Administrator</span>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item <?php echo current_url() === base_url('/admin/dashboard') ? 'menu-open' : ''; ?>">
                    <a href="/" class="nav-link <?php echo current_url() === base_url('/admin/dashboard') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php echo current_url() === base_url('/pasar') ? 'menu-open' : ''; ?>">
                    <a href="/pasar" class="nav-link <?php echo current_url() === base_url('/pasar') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Pasar
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php echo current_url() === base_url('/pedagang') ? 'menu-open' : ''; ?>">
                    <a href="/pedagang" class="nav-link <?php echo current_url() === base_url('/pedagang') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pedagang
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php echo current_url() === base_url('/blok') ? 'menu-open' : ''; ?>">
                    <a href="/blok" class="nav-link <?php echo current_url() === base_url('/blok') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-thumbtack"></i>
                        <p>
                            Blok
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php echo current_url() === base_url('/klasifikasi') ? 'menu-open' : ''; ?>">
                    <a href="/klasifikasi" class="nav-link <?php echo current_url() === base_url('/klasifikasi') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-filter"></i>
                        <p>
                            Klasifikasi
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php echo current_url() === base_url('pedagang/laporan') ? 'menu-open' : ''; ?>">
                    <a href="pedagang/laporan" class="nav-link <?php echo current_url() === base_url('pedagang/laporan') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>