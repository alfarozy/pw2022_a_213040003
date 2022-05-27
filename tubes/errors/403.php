<?php

require "../app/Core.php";

// use Query;
$title = "Page not found";


?>

<?php include "../page/layouts/header.php" ?>

<body>

    <?php include "../page/layouts/navbar.php" ?>



    <!-- ============== SECTION CONTENT ============== -->
    <section class="padding-y">
        <div class="container">

            <div class="row justify-content-center my-5">

                <div class="col-lg-12 text-center my-4">
                    <h1 style="font-size:190px;" class="text-muted">403</h1>
                    <h3>Akses forbidden</h3>
                    <a href="<?= base_url() ?>" class="btn btn-primary mt-4"> <i class="fa fa-home"></i> Kembali ke beranda</a>
                </div>
            </div> <!-- row.// -->

            <br><br>


        </div> <!-- container .//  -->
    </section>
    <!-- ============== SECTION CONTENT END// ============== -->




    <!-- Bootstrap js -->
    <script src="<?= assets("frontoffice/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Custom js -->
    <script src="<?= assets("frontoffice/js/script.js?v=2.0") ?>"></script>

</body>

</html>