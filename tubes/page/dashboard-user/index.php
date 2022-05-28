<?php

require "../../app/Core.php";
require "../../app/middleware/UserMiddleware.php";

// use Query;
$email = session('email');
$user = Core::query("SELECT users.* FROM users 
    WHERE `email`= '$email'");
$title = "Profil " . $user['name'];

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
                <aside class="col-lg-3 col-xl-3">
                    <!--  COMPONENT MENU LIST  -->
                    <nav class="nav flex-lg-column nav-pills mb-4">
                        <a class="nav-link active" href="<?= base_url("page/dashboard-user") ?>">Dashboard</a>
                        <a class="nav-link" href="#">Buat artikel (coming soon)</a>
                        <a class="nav-link" href="<?= base_url("page/dashboard-user/update-profil") ?>">Pengaturan akun</a>
                        <a class="nav-link" href="<?= base_url("auth/logout") ?>">Log out</a>
                    </nav>
                    <!--   COMPONENT MENU LIST END .//   -->
                </aside>
                <main class="col-lg-9  col-xl-9">
                    <article class="card">
                        <div class="content-body">

                            <figure class="itemside align-items-center">
                                <div class="aside">
                                    <span class="bg-gray icon-md rounded-circle">
                                        <img src="<?= assets($user['img']) ?>" class="icon-md rounded-circle">
                                    </span>
                                </div>
                                <figcaption class="info">
                                    <h6 class="title"><?= $user['name'] ?></h6>
                                    <p><?= $user['email'] ?>
                                    </p>
                                </figcaption>
                            </figure>

                            <hr>

                            <div class="row g-2 mb-3">
                                <div class="col-md-12">

                                </div> <!-- col.// -->

                            </div> <!-- row.// -->


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