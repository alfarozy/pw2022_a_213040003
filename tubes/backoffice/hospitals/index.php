<?php

require_once "HospitalController.php";
$title = "Data rumah sakit";
$page = "hospital";

$data = Core::get($table);
?>
<!-- Header -->
<?php include_once('../layouts/header.php') ?>
<!-- Sidebar -->
<?php include_once('../layouts/sidebar.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Semua Data </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data rumah sakit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <div class="col-sm-6 col-lg-6">

                                    <h3 class="card-title mt-2 d-none d-md-block"><?= $title ?></h3>
                                </div>
                                <div class="col-sm-6 col-lg-6 text-center text-md-right ">
                                    <!--<a target="_BLANK" href="<?= base_url('backoffice/laporan/faskes?type=excel') ?>" class="btn btn-outline-success btn-sm m-1"> <i class="fas fa-file-excel"></i>-->
                                    <!--    Export Excel</a>-->
                                    <!--<a target="_BLANK" href="<?= base_url('backoffice/laporan/faskes?type=pdf') ?>" class="btn btn-outline-danger btn-sm m-1"> <i class="fas fa-file-pdf"></i>-->
                                    <!--    Export PDF</a>-->
                                    <a href="./create" class="btn btn-success btn-sm m-1"> <i class="fa fa-plus"></i>
                                        Tambah
                                        Data</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="15%">Kode Rumah Sakit</th>
                                        <th width="50%">Rumah sakit</th>
                                        <th width="10%">Status</th>
                                        <th width="15%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $item) : ?>
                                        <tr>
                                            <td class="text-center align-middle">
                                                FK0<?= $item['id'] ?>
                                            </td>
                                            <td class="align-middle"><?= $item['name'] ?></td>
                                            <td class="align-middle text-center">

                                                <?php if ($item['enabled'] == 1) : ?>
                                                    <button class="btn btn-sm btn-success">Aktif</button>
                                                <?php else : ?>
                                                    <button class="btn btn-sm btn-danger">Tidak Aktif</button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="<?= base_url("backoffice/hospitals/show?id=" . $item['id']) ?>" class="m-1 btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a href="<?= base_url("backoffice/hospitals/edit?id=" . $item['id']) ?>" class="m-1 btn btn-sm btn-secondary"><i class="fa fa-edit "></i></a>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                        <?php if ($item['enabled'] == 0) : ?>
                                                            <button type="submit" name="active" class="m-1 btn btn-sm btn-success"><i class="fa fa-check "></i></button>
                                                        <?php else : ?>
                                                            <button type="submit" name="non-active" class="m-1 btn btn-sm btn-danger"><i class="fa fa-times px-1"></i></button>
                                                        <?php endif; ?>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- footer -->
<?php include_once('../layouts/footer.php') ?>