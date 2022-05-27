<?php

require "../../app/Core.php";

// use Query;

(int)$secure_id = Core::request($_GET['id']); //secure request
$doctor = Core::query("SELECT doctors.*, `specialists`.`name` as specialist FROM doctors 
    INNER JOIN specialists ON id_specialist = `specialists`.`id`
    WHERE `doctors`.`enabled` = 1 AND `doctors`.`id`= $secure_id");

if (!$doctor) {
    redirect(base_url("errors/404"));
}
$title = "Profil " . $doctor['name'];

?>

<?php include "../../page/layouts/header.php" ?>

<body>

    <?php include "../../page/layouts/navbar.php" ?>

    <!-- ============== SECTION PAGETOP ============== -->
    <section class="bg-primary padding-y-sm">
        <div class="container">

            <ol class="breadcrumb ondark mb-0">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Profil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dokter</li>
            </ol>

        </div> <!-- container //  -->
    </section>
    <!-- ============== SECTION PAGETOP END// ============== -->

    <!-- ============== SECTION CONTENT ============== -->
    <section class="padding-y bg-light">
        <div class="container">

            <div class="row">

                <main class="col-lg-12  col-xl-12">
                    <article class="card">
                        <div class="content-body">

                            <figure class="itemside align-items-center">
                                <div class="aside">
                                    <span class="bg-gray icon-md rounded-circle">
                                        <img src="<?= assets($doctor['img']) ?>" class="icon-md rounded-circle">
                                    </span>
                                </div>
                                <figcaption class="info">
                                    <h6 class="title"><?= $doctor['name'] ?> <i class="fa fa-check-circle text-primary"></i></h6>
                                    <p><?= $doctor['email'] ?></p>
                                </figcaption>
                            </figure>

                            <hr>

                            <?php if ($doctor['price_kons']) : ?>
                                <div class="row g-2 mb-3">
                                    <div class="col-md-12">
                                        <article class="box bg-light">
                                            <div class="d-flex">
                                                <div class="col-lg-6 mt-1">
                                                    <b class="mx-2 ">Harga konsultasi mulai dari
                                                        <span class="text-primary"> <?= currency_IDR($doctor['price_kons']) ?></span>
                                                    </b>

                                                </div>
                                                <div class="col-lg-6 text-end">
                                                    <a href="https://wa.me/+<?= $doctor['whatsapp'] ?>" class="btn btn-success btn-sm"> <i class="fab fa-whatsapp"></i> Konsultasi sekarang</a>

                                                </div>
                                            </div>
                                        </article>
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                            <?php endif; ?>

                            <h5 class="card-title mt-4"> Deskripsi</h5>
                            <!--  ======== item order ======== -->
                            <div class="py-2">
                                <?= $doctor['description'] ?>
                            </div>


                        </div> <!-- card-body .// -->
                    </article> <!-- card .// -->
                </main>
            </div> <!-- row.// -->

            <br><br>


        </div> <!-- container .//  -->
    </section>
    <!-- ============== SECTION CONTENT END// ============== -->


    <?php include "../../page/layouts/footer.php" ?>


    <!-- Bootstrap js -->
    <script src="<?= assets("frontoffice/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Custom js -->
    <script src="<?= assets("frontoffice/js/script.js?v=2.0") ?>"></script>

</body>

</html>