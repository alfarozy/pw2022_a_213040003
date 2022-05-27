<?php

require_once "HospitalController.php";
$title = "Detail data";
$page = "hospital";

$data = Core::show($table, ['id' => $_GET['id']]);
$province = Core::show('provinces', ['id' => $data['province_id']]);
$city = Core::show('cities', ['id' => $data['city_id']]);
$district = Core::show('districts', ['id' => $data['district_id']]);
$area = Core::show('areas', ['id' => $data['area_id']]);
$tipe = Core::show('tipe_faskes', ['id' => $data['tipe_faskes_id']]);
?>
<!-- Header -->
<?php include_once('../layouts/header.php') ?>
<!-- Sidebar -->
<style>
    .ck-content {
        height: 480px
    }

    .img-preview {
        object-fit: cover;
        object-position: center;
        height: 200px;
        width: 100%
    }
</style>
<?php include_once('../layouts/sidebar.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-data"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Fasilitas kesehatan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title mt-2"><?= $title ?></h3>
                                <a href="./" class="btn btn-secondary btn-sm m-1"> <i class="fa fa-arrow-left"></i>
                                    Kembali</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="<?= assets($data['image']) ?>" class="col-lg-12" alt="" srcset="">
                            </div>
                            <div class="col-lg-8">
                                <h4 class="mt-3">Informasi <?= $tipe['name'] ?></h4>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Nama <?= $tipe['name'] ?></th>
                                        <td>:</td>
                                        <td><?= $data['name'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>No Telpon</th>
                                        <td>:</td>
                                        <td><?= $data['phone'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Alamat </th>
                                        <td>:</td>
                                        <td>
                                            Desa/Kelurahan <?= $area['name'] ?> , Kec. <?= $district['name'] ?>, Kab. <?= $city['name'] ?> <?= $province['name'] ?>
                                            <br>
                                            <?= $data['address'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">Status </th>
                                        <td>:</td>
                                        <td>
                                            <?php if ($data['enabled'] == 1) : ?>
                                                <button class="btn btn-sm btn-success">Aktif</button>
                                            <?php else : ?>
                                                <button class="btn btn-sm btn-danger">Tidak Aktif</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <div class="container px-4 mt-3">
                                    <h5>Deskripsi</h5>
                                    <?= $data['description'] ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- footer -->
<?php include_once('../layouts/footer.php') ?>