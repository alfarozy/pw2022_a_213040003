<?php

require "../../app/Core.php";

// use Query;


if (isset($_GET['search'])) {
    $search = Core::request(htmlspecialchars($_GET['search']));
    $data = Core::query("SELECT * FROM doctors WHERE name LIKE '%$search%' AND enabled = 1");
} else {
    $data = Core::get("doctors", ['enabled' => 1]);
}

$title = "Daftar dokter";

?>

<?php include "../../page/layouts/header.php" ?>

<body>

    <?php include "../../page/layouts/navbar.php" ?>

    <!-- ============== SECTION PAGETOP ============== -->
    <section class="bg-primary padding-y-sm">
        <div class="container">

            <ol class="breadcrumb ondark mb-0">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dokter</li>
            </ol>

        </div> <!-- container //  -->
    </section>
    <!-- ============== SECTION PAGETOP END// ============== -->

    <!-- ============== SECTION CONTENT ============== -->

    <section class="padding-y bg-light">
        <div class="container">

            <!-- =================== COMPONENT 1 ====================== -->
            <main class=" bg-light">
                <div class="card-body p-lg-5 bg-cover">
                    <div class="card card-body shadow">
                        <form>
                            <div class="row g-2">
                                <div class="col-xl col-lg-6 flex-grow">
                                    <div class="input-group">
                                        <input type="text" name="search" value="<?php
                                                                                if (isset($_GET['search'])) {
                                                                                    echo htmlspecialchars($_GET['search']);
                                                                                }
                                                                                ?>" placeholder="Rumah sakit atau klinik" class="form-control">
                                    </div>
                                </div> <!-- col.// -->

                                <div class="col-auto">
                                    <button type="submit" class="btn w-100 btn-primary"> <i class="fa fa-search"></i> </button>
                                </div> <!-- col.// -->
                            </div> <!-- row.// -->
                        </form>
                    </div>
                </div> <!-- card-body -->
            </main> <!-- card -->
            <!-- =================== COMPONENT 1 .// ================== -->

            <br><br>

            <!-- =================== COMPONENT 2 ====================== -->
            <div class="row">
                <?php foreach ($data as $item) : ?>
                    <?php
                    $spesialist = Core::show('specialists', ['id' => $item['id_specialist']]);
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card">
                            <article class="p-4 p-xl-5 text-center">
                                <img src="<?= assets($item['img']) ?>" class="img-avatar img-lg">
                                <h6 class="card-title mt-3"><?= $item['name'] ?></h6>
                                <p style="line-height: 0;" class="text-primary"><?= $spesialist['name'] ?></p>
                                <a href="<?= base_url('page/doctor/profil?id=' . $item['id']) ?>" class="btn btn-sm btn-primary-light mt-2">Lihat profil</a>

                            </article>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> <!-- row.// -->
            <!-- =================== COMPONENT 2 .// ================== -->




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