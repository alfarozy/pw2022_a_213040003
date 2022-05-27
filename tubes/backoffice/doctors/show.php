<?php

require_once "DoctorCntroller.php";
$title = "Detail data";
$page = "doctors";

$data = Core::show($table, ['id' => $_GET['id']]);
$spesialis = Core::show('specialists', ['id' => $data['id_specialist']]);
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
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="col-lg-2">
                                    <img src="<?= assets($data['img']) ?>" class="profile-user-img img-fluid rounded image-preview col-lg-12" alt="" srcset="">
                                </div>
                                <div class="col-lg-9">
                                    <table class="table table-borderless table-sm">
                                        <tr>
                                            <th width="20%">Nama </th>
                                            <td width="4%">:</td>
                                            <td width="76%"><?= $data['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th width="20%">Spesialis </th>
                                            <td width="4%">:</td>
                                            <td width="76%"><?= $spesialis['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>No Telpon / Whatsapp</th>
                                            <td>:</td>
                                            <td><?= $data['whatsapp'] ?? '-' ?></td>
                                        </tr>

                                        <tr>
                                            <th>Harga konsultasi mulai dari</th>
                                            <td>:</td>
                                            <td><?= currency_IDR($data['price_kons'])  ?></td>
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

                            </div>
                            <div class="container px-4 mt-3">
                                <h5>Deskripsi</h5>
                                <?= $data['description'] ?? '-' ?>
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