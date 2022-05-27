<?php

require "../../app/Core.php";

// use Query;


if (isset($_GET['search'])) {
    $search = Core::request(htmlspecialchars($_GET['search']));
    $data = Core::query("SELECT * FROM faskes WHERE name LIKE '%$search%' AND enabled = 1");
} else {
    $data = Core::get("faskes", ['enabled' => 1]);
}

$title = "Daftar fasilitas kesehatan";

?>

<?php include "../../page/layouts/header.php" ?>

<body>

    <?php include "../../page/layouts/navbar.php" ?>

    <!-- ============== SECTION PAGETOP ============== -->
    <section class="bg-primary padding-y-sm">
        <div class="container">

            <ol class="breadcrumb ondark mb-0">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fasilitas kesehatan</li>
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
                    $tipe = Core::show('tipe_faskes', ['id' => $item['tipe_faskes_id']]);
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <article class="card mb-4">
                            <div class="img-wrap">
                                <img src="<?= assets($item['image']) ?>" class="card-img-top" height="200" alt="product image">
                                <div class="position-absolute text-start bottom-0 start-0 w-100 p-2">
                                    <span class="badge p-2 bg-dark-50"> <?= $tipe['name'] ?> </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="h5 text-dark"><a class="text-dark" href="<?= base_url('page/faskes/detail?id=' . $item['id']) ?>"><?= $item['name'] ?></a></div>
                                <p> <?= Core::limit(strip_tags($item['description']), 60) ?>
                                    <?php if (strlen(strip_tags($item['description'])) > 60) : ?>
                                        <a href="<?= base_url('page/faskes/detail?id=' . $item['id']) ?>">selengkapnya</a>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </article> <!-- card.// -->

                    </div> <!-- col.// -->
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