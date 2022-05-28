<aside class="main-sidebar sidebar-light-success elevation-1 ">
    <!-- Brand Logo -->
    <a href="<?= base_url("backoffice") ?>" class="brand-link">
        <img src="<?= assets("backoffice/") ?>dist/img/logo/favicon.png" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= assets("backoffice/") ?>dist/img/alfarozy.svg" class="img-circle elevation-2 shadow-none" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Koji Xenpai</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                <li class="nav-item menu-open mt-3">
                    <a href="<?= base_url('backoffice') ?>" class="nav-link <?= active_page($page, "dashboard")  ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>

                <li class="nav-header">Master Data</li>

                <li class="nav-item">
                    <a href="#" class="nav-link <?= active_page($page, "hospital")  ?>">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>
                            Fasilitas kesehatan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('backoffice/hospitals') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Faskes (Rumah sakit)</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('backoffice/fasilitas') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fasilitas & layanan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?= active_page($page, "doctors")  ?>">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            Data dokter
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('backoffice/doctors') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dokter</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('backoffice/specialists') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Spesialist</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backoffice/admin') ?>" class="nav-link <?= active_page($page, "admin")  ?>">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            Data Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backoffice/users') ?>" class="nav-link <?= active_page($page, "users")  ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data pengguna
                        </p>
                    </a>
                </li>

                <li class="nav-item border-top">
                    <a href="<?= base_url("auth/logout") ?>" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>