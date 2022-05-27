<header class="section-header">

    <section class="header-main fixed-top">
        <div class="container">
            <div class="row gy-3 align-items-center">
                <div class="col-lg-2 col-sm-4 col-4">
                    <a href="<?= base_url() ?>" class="navbar-brand">
                        <img class="logo" height="40" src="<?= assets('frontoffice/images/logo.png') ?>">
                    </a> <!-- brand end.// -->
                </div>
                <div class="order-lg-last col-lg-4 col-sm-8 col-8">
                    <div class="float-end">
                        <?php if (auth('name')) : ?>
                            <a href="<?= base_url("auth") ?>" class="btn btn-light">
                                <i class="fa fa-user"></i> <span class="ms-1 d-none d-sm-inline-block">Dashboard</span>
                            </a>
                            <a href="<?= base_url("auth/logout") ?>" class="btn btn-light">
                                <i class="fas fa-sign-out-alt"></i> <span class="ms-1 d-none d-sm-inline-block">Logout</span>
                            </a>
                        <?php else : ?>
                            <a href="<?= base_url("auth") ?>" class="btn btn-light">
                                <i class="fas fa-sign-in-alt"></i> <span class="ms-1 d-none d-sm-inline-block">Sign in </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div> <!-- col end.// -->
                <div class="col-lg-6 col-md-12 col-12">

                </div> <!-- col end.// -->

            </div> <!-- row end.// -->
        </div> <!-- container end.// -->
    </section> <!-- header-main end.// -->

    <nav class="navbar navbar-light bg-white border-top navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler border" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar_main">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2 dropdown">
                        <a class="dropdown-toggle no-arrow nav-link" href="#" data-bs-toggle="dropdown">
                            Artikel kesehatan (Coming soon)
                        </a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="#">Kesehatan pria</a> </li>
                            <li> <a class="dropdown-item" href="#">Kesehatan wanita</a> </li>
                            <li> <a class="dropdown-item" href="#">PENYAKIT A-Z</a> </li>
                            <li> <a class="dropdown-item" href="#">OBAT A-Z</a> </li>
                            <li> <a class="dropdown-item" href="#">HERBAL A-Z</a> </li>
                            <li> <a class="dropdown-item" href="#">FOBIA A-Z</a> </li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link ps-0" href="<?= base_url('page/faskes') ?>">Rumah sakit </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="<?= base_url('page/doctor') ?>">Dokter</a>
                    </li>

                </ul>
            </div> <!-- collapse end.// -->
        </div> <!-- container end.// -->
    </nav> <!-- navbar end.// -->
</header> <!-- section-header end.// -->