<?php

require "../../app/Core.php";

// use Query;

(int)$secure_id = Core::request($_GET['id']); //secure request
$data = Core::query("SELECT * FROM faskes WHERE `faskes`.id =$secure_id");
$province = Core::show('provinces', ['id' => $data['province_id']]);
$city = Core::show('cities', ['id' => $data['city_id']]);
$district = Core::show('districts', ['id' => $data['district_id']]);
$area = Core::show('areas', ['id' => $data['area_id']]);
$tipe = Core::show('tipe_faskes', ['id' => $data['tipe_faskes_id']]);
$title = $data['name'];
$doctors = Core::get('doctors', ['id_hospital' => $secure_id, 'enabled' => 1]);
$fasilitas_medis = Core::join('fasilitas_faskes', 'fasilitas', '*', "id_fasilitas = fasilitas.id WHERE `id_faskes`={$data['id']}  AND type='medis'");
$fasilitas_umum = Core::join('fasilitas_faskes', 'fasilitas', '*', "id_fasilitas = fasilitas.id WHERE `id_faskes`={$data['id']}  AND type='umum'");
if (!$data) {
    redirect(base_url("errors/404"));
}

?>

<?php include "../../page/layouts/header.php" ?>

<body>

    <?php include "../../page/layouts/navbar.php" ?>

    <!-- ============== SECTION PAGETOP ============== -->
    <section class="bg-primary padding-y-sm">
        <div class="container">

            <ol class="breadcrumb ondark mb-0">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Fasilitas kesehatan</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data['name'] ?></li>
            </ol>

        </div> <!-- container //  -->
    </section>
    <!-- ============== SECTION PAGETOP END// ============== -->

    <section class="pt-5 bg-light">
        <div class="container">
            <!-- =================== COMPONENT 3 ====================== -->
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <main class="col-lg-8">

                            <article class="gallery-wrap">
                                <div class="img-big-wrap" style="height: auto;">
                                    <img class="rounded" height="400" src="<?= assets($data['image']) ?>">
                                </div> <!-- img-big-wrap.// -->
                                <div class="price h5"> <?= $data['name'] ?></div>
                                <h6 class="text-primary"><?= $tipe['name'] ?></h6>
                            </article> <!-- gallery-wrap .end// -->
                        </main> <!-- col.// -->
                        <aside class="col-lg-4">
                            <h5>Alamat <?= $tipe['name'] ?></h5>
                            <hr>
                            <p>
                                <i class="fa fa-map-marker-alt text-muted"></i>
                                <?= $data['address'] ?>,
                                <br><?= $area['name'] ?>, Kec.<?= $district['name'] ?>, Kab.<?= $city['name'] ?> - <?= $province['name'] ?>
                            </p>

                            <!-- <article class="bg-gray overflow-hidden position-relative rounded" style="height: 130px">
                                <img src="../images/misc/map.jpg" class="img-fluid opacity">
                                <a href="#" class="center-xy btn btn-light">Lihat lokasi</a>
                            </article> -->
                            <br>
                            <article class="box">
                                <a href="#" class="btn w-100 btn-lg btn-success mb-2">
                                    <i class="fab fa-whatsapp me-2"></i> +<?= $data['phone'] ?> </a>
                            </article>

                        </aside> <!-- col.// -->
                    </div> <!-- row.// -->

                </div> <!-- card-body.// -->
            </div>
            <!-- =================== COMPONENT 3 .// ================== -->

            <br><br>




        </div> <!-- container .//  -->
    </section>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <header class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a href="#" data-bs-target="#deskripsi" data-bs-toggle="tab" class="nav-link active">Deskripsi</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" data-bs-target="#dokter" data-bs-toggle="tab" class="nav-link">Dokter</a>
                                </li>
                            </ul>
                        </header>
                        <div class="tab-content">
                            <article id="deskripsi" class="tab-pane show active card-body">
                                <h5>Detailed info</h5>

                                <div>
                                    <?= $data['description'] ?>
                                </div>

                                <table class="table table-striped">
                                    <?php if ($fasilitas_umum) : ?>
                                        <tr>
                                            <td width="200">
                                                <i class="fa-fw me-2 text-muted fas fa-hospital-alt"></i>
                                                <b class="text-dark">Fasilitas Umum</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="200">
                                                <?php foreach ($fasilitas_umum as $item) : ?>

                                                    <span class="tag">
                                                        <img width="20px" height="20px" class="mr-3 pr-2" src="<?= assets($item['img']) ?>" alt="" srcset="">
                                                        <span>&nbsp;&nbsp;</span>
                                                        <span class="ml-2"> <?= $item['name'] ?></span>
                                                    </span>
                                                <?php endforeach; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($fasilitas_medis) : ?>

                                        <tr>
                                            <td width="200"> <i class="fa-fw me-2 text-muted fas fa-hand-holding-heart"></i>
                                                <b class="text-dark">Fasilitas Medis</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="200">
                                                <?php foreach ($fasilitas_medis as $item) : ?>

                                                    <span class="tag">
                                                        <img width="20px" height="20px" class="mr-3 pr-2" src="<?= assets($item['img']) ?>" alt="" srcset="">
                                                        <span>&nbsp;&nbsp;</span>
                                                        <span class="ml-2"><?= $item['name'] ?></span>
                                                    </span>
                                                <?php endforeach; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                </table>
                            </article>
                            <article id="dokter" class="tab-pane card-body">
                                <div class="card card-body">
                                    <div class="row g-2">
                                        <div class="col-xl col-lg-6 flex-grow">
                                            <div class="input-group">
                                                <input type="text" placeholder="Cari dokter" class="form-control search-docotors" name="">
                                            </div>
                                        </div> <!-- col.// -->

                                        <div class="col-auto">
                                            <button class="btn w-100 btn-primary btn-doctors"> <i class="fa fa-search"></i>
                                            </button>
                                        </div> <!-- col.// -->
                                    </div> <!-- row.// -->
                                </div>
                                <div class="list-doctors">

                                    <?php foreach ($doctors as $item) : ?>
                                        <?php $specialist_item = Core::show('specialists', ['id' => $item['id_specialist']]); ?>
                                        <article class="card-body shadow rounded my-3">
                                            <div class="row gy-3 ">
                                                <div class="col-md-7">
                                                    <figure class="itemside">
                                                        <a href="<?= base_url('page/doctor/profil?id=' . $item['id']) ?>" class="aside">
                                                            <img src="<?= assets($item['img']) ?>" class="img-md img-thumbnail">
                                                        </a>
                                                        <figcaption class="info">
                                                            <a href="<?= base_url('page/doctor/profil?id=' . $item['id']) ?>" class="title"><b>
                                                                    <?= $item['name'] ?>
                                                                </b></a>
                                                            <div>
                                                                <a href="" class="btn-link"><?= $specialist_item['name'] ?></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </div> <!-- col.// -->
                                                <div class="col-md-5 text-end">
                                                    <a href="<?= base_url('page/doctor/profil?id=' . $item['id']) ?>" class="btn btn-light" type="button">
                                                        Lihat Profile
                                                    </a>
                                                </div> <!-- col.// -->

                                            </div> <!-- row.// -->
                                        </article> <!-- card-group.// -->
                                    <?php endforeach; ?>
                                </div>

                            </article>
                        </div>
                    </div>
                </div>
                <?php
                $nearme = Core::queryGet("SELECT * FROM faskes WHERE `district_id`={$district['id']} AND `faskes`.`enabled` = 1 ORDER BY RAND() LIMIT 4");
                
                if ($nearme) :
                ?>
                    <aside class="col-lg-4">
                        <!-- =================== COMPONENT ADDINGS ====================== -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Faskes Terdekat</h5>

                                <?php foreach ($nearme as $item) :
                                ?>
                                    <?php
                                    $tipe = Core::show('tipe_faskes', ['id' => $item['tipe_faskes_id']]);

                                    ?>
                                    <article class="itemside mb-3">
                                        <a href="#" class="aside">
                                            <img src="<?= assets($item['image']) ?>" width="96" height="96" class="img-md img-thumbnail">
                                        </a>
                                        <div class="info">
                                            <a href="#" class="title mb-1 d-block"> <?= $item['name'] ?> </a>
                                            <a href="#" class="title mb-1 d-block text-primary"> <?= $tipe['name'] ?></a>
                                            <small><i class="fa fa-map-marker-alt "></i> <?= $item['address'] ?></small>
                                        </div>
                                    </article>
                                <?php endforeach; ?>

                            </div> <!-- card-body .// -->
                        </div> <!-- card .// -->
                        <!-- =================== COMPONENT ADDINGS .// ================== -->
                    </aside> <!-- col.// -->
                <?php endif; ?>
            </div>

            <br>
        </div> <!-- container .//  -->
    </section>
    <?php include "../../page/layouts/footer.php" ?>


    <!-- Bootstrap js -->
    <script src="<?= assets("frontoffice/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Custom js -->
    <script src="<?= assets("frontoffice/js/script.js?v=2.0") ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('.search-docotors').on("keyup", function() {

            var search = $(this).val();
            $.ajax({
                url: "<?= base_url('api/doctors') ?>",
                data: {
                    search: search,
                    hospital:<?= $data ['id'] ?>
                },
                success: function(result) {
                    $('.list-doctors').html(result);
                }

            });
        })
    </script>
</body>

</html>