<?php

require "app/Core.php";

// use Query;
$title = "Beranda";

$faskes = Core::query("SELECT faskes.*, `cities`.`name` as city,`tipe_faskes`.`name` as `tipe_faskes` FROM faskes 
    INNER JOIN cities ON  city_id = `cities`.`id` 
    INNER JOIN tipe_faskes ON tipe_faskes_id = `tipe_faskes`.`id`
    WHERE `faskes`.`enabled` = 1 ORDER BY RAND() LIMIT 9");

$doctors = Core::query("SELECT doctors.*, `specialists`.`name` as specialist FROM doctors 
    INNER JOIN specialists ON id_specialist = `specialists`.`id`
    WHERE `doctors`.`enabled` = 1 ORDER BY RAND() LIMIT 16");

?>

<?php include "./page/layouts/header.php" ?>

<body>

    <?php include "./page/layouts/navbar.php" ?>


    <!-- ================ SECTION INTRO ================ -->

    <section class="section-intro bg-primary padding-y-lg">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">

                    <article class="my-5">
                        <h1 class="display-3 text-white"> Nusantara</h1>
                        <h3 class="display-4 text-white">Hospital Center</h3>
                        <div class="mt-4">
                            <p class="lead text-white">Menyediakan berbagai informasi seputar kesehatan
                                <br>Ayoo!, jaga kesehatan bersama Nusantara Hospital center
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-sm-6 text-end d-none d-md-block">

                    <div class="hero-bg-svg">

                    </div>
                </div>
            </div>
            <div class="row gy-3 mt-3">
                <div class="col-lg-3 col-md-6">
                    <article class="card card-body">
                        <figure class="text-center mx-lg-4">
                            <span class="rounded-circle text-primary icon-md bg-primary-light">
                                <i class="fa fa-capsules"></i>
                            </span>
                            <figcaption class="pt-3">
                                <h6 class="title">Apotek online</h6>
                                <p class="mb-0">
                                    Menyediakan berbagai macam obat obatan
                                </p>
                            </figcaption>
                        </figure> <!-- itemside // -->
                    </article> <!-- card.// -->
                </div><!-- col // -->
                <div class="col-lg-3 col-md-6">
                    <article class="card card-body">
                        <figure class="text-center mx-lg-4">
                            <span class="rounded-circle text-danger icon-md bg-danger-light">
                                <i class="fa fa-stethoscope"></i>
                            </span>
                            <figcaption class="pt-3">
                                <h6 class="title">Informasi kesehatan</h6>
                                <p class="mb-0">Menyediakan informasi kesehatan terbaru</p>
                            </figcaption>
                        </figure> <!-- itemside // -->
                    </article> <!-- card.// -->
                </div> <!-- col // -->
                <div class="col-lg-3 col-md-6">
                    <article class="card card-body">
                        <figure class="text-center mx-lg-4">
                            <span class="rounded-circle text-success icon-md bg-success-light">
                                <i class="fa fa-truck"></i>
                            </span>
                            <figcaption class="pt-3">
                                <h6 class="title">Driver/kurir </h6>
                                <p class="mb-0">Driver dan kurir siap tempur 24 jam</p>
                            </figcaption>
                        </figure> <!-- itemside // -->
                    </article> <!-- card.// -->
                </div> <!-- col // -->
                <div class="col-lg-3 col-md-6">
                    <article class="card card-body">
                        <figure class="text-center mx-lg-4">
                            <span class="rounded-circle text-danger icon-md bg-danger-light">
                                <i class="fa fa-hospital"></i>
                            </span>
                            <figcaption class="pt-3">
                                <h6 class="title">Rumah sakit </h6>
                                <p class="mb-0">Informasi rumah sakit dan apotek terdekat</p>
                            </figcaption>
                        </figure> <!-- itemside // -->
                    </article> <!-- card.// -->
                </div> <!-- col // -->
            </div>
        </div> <!-- container end.// -->
    </section>
    <!-- ================ SECTION INTRO END.// ================ -->

    <!-- ================ SECTION PRODUCTS ================ -->
    <section class="padding-y">
        <div class="container">

            <header class="section-heading">
                <h3 class="section-title">Rekomendasi rumah sakit</h3>
            </header>

            <div class="row">

                <?php foreach ($faskes as $item) : ?>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card card-product-grid">
                            <div class="img-wrap">
                                <a href="<?= base_url('page/faskes/detail?id=' . $item['id']) ?>">
                                    <img src="<?= assets($item['image']) ?>">
                                </a>
                            </div>
                            <div class="info-wrap border-top">
                                <a href="#" class="title"><?= $item['name'] ?></a>
                                <div class="d-flex justify-content-between">

                                    <p class="text-muted small mt-2"> <i class="fa fa-map-marker"></i> <?= $item['city'] ?></p>
                                    <p class="text-primary small mt-2"> <?= $item['tipe_faskes'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div> <!-- row end.// -->

        </div> <!-- container end.// -->
    </section>
    <!-- ================ SECTION PRODUCTS END.// ================ -->
    <!-- ================ SECTION Register dokter.// ================ -->
    <section>
        <div class="container">
            <article class="card p-4" style="background-color: var(--bs-primary)">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="mb-0 text-white">Anda seorang dokter ?</h4>
                        <p class="mb-0 text-white-50">Ayo bergabung dan wujudkan indonesia sehat bersama Nusantara
                            Hospital
                            Center</p>
                    </div>
                    <div class="col-auto"> <a class="btn btn-warning" href="<?= base_url('/auth/register-dokter') ?>">Daftar sekarang</a> </div>
                </div>
            </article>
        </div> <!-- container end.// -->
    </section>
    <!-- ================ SECTION Register dokter.// ================ -->



    <!-- ================ SECTION BLOG ================ -->
    <section class="padding-y">
        <div class="container">

            <header class="section-heading">
                <h3 class="section-title">Dokter terbaik kami</h3>
            </header>

            <div class="row">

                <?php foreach ($doctors as $item) : ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card">
                            <article class="p-4 p-xl-5 text-center">
                                <a href="<?= base_url('page/doctor/profil?id=' . $item['id']) ?>">
                                    <img src="<?= assets($item['img']) ?>" class="img-avatar img-lg">
                                </a>
                                <h6 class="card-title mt-3"><?= $item['name'] ?></h6>
                                <p style="line-height: 0;" class="text-primary"><?= $item['specialist'] ?></p>
                                <a href="<?= base_url('page/doctor/profil?id=' . $item['id']) ?>" class="btn btn-sm btn-primary-light mt-2">Lihat profil</a>
                            </article>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div> <!-- row.// -->

        </div> <!-- container end.// -->
    </section>
    <!-- ================ SECTION BLOG END.// ================ -->

    <?php include "./page/layouts/footer.php" ?>


    <!-- Bootstrap js -->
    <script src="<?= assets("frontoffice/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Custom js -->
    <script src="<?= assets("frontoffice/js/script.js?v=2.0") ?>"></script>

</body>

</html>