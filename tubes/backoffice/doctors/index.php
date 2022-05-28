<?php

require_once "DoctorCntroller.php";
$title = "Data Spesialis";
$page = "doctors";
$no = 1;

// $query = "SELECT * FROM doctors INNER JOIN ON doctors.id_specialist = specialists.id";

$doctors = Core::join('doctors', 'specialists', "doctors.name as doctor_name, doctors.id,doctors.email, doctors.whatsapp, doctors.price_kons,doctors.enabled,doctors.created_at,specialists.name as specialist_name", "doctors.id_specialist = specialists.id");
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
                        <li class="breadcrumb-item active">Dokter</li>
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
                                    <a target="_BLANK" href="<?= base_url('backoffice/laporan/doctors?type=excel') ?>" class="btn btn-outline-success btn-sm m-1"> <i class="fas fa-file-excel"></i>
                                        Export Excel</a>
                                    <a target="_BLANK" href="<?= base_url('backoffice/laporan/doctors?type=pdf') ?>" class="btn btn-outline-danger btn-sm m-1"> <i class="fas fa-file-pdf"></i>
                                        Export pdf</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%" class="text-center align-middle">No</th>
                                        <th width="35%" class="align-middle">Dokter</th>
                                        <th width="10%" class="align-middle">Email</th>
                                        <th width="15%" class="align-middle">Status</th>
                                        <th width="15%">Tanggal bergabung</th>
                                        <th width="15%" class="align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($doctors as $data) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td>
                                                <b><?= $data['doctor_name'] ?></b>
                                                <br>
                                                <p class="text-primary"><?= $data['specialist_name'] ?> </p>
                                            </td>
                                            <td>
                                                <p><?= $data['email'] ?></p>
                                                <p class="text-primary"><?= $data['wahtsapp'] ?? null ?></p>
                                            </td>
                                            <td>

                                                <?php if ($data['enabled'] == 1) : ?>
                                                    <button class="btn btn-sm btn-success">Aktif</button>
                                                <?php else : ?>
                                                    <button class="btn btn-sm btn-danger">Tidak aktif</button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?= format_date('Y-m-d', $data['created_at']) ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="<?= base_url("backoffice/doctors/show?id=" . $data['id']) ?>" class="m-1 btn btn-sm btn-primary"><i class="fa fa-eye "></i></a>

                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                        <?php if ($data['enabled'] == 0) : ?>
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