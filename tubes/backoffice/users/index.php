<?php

require_once "UserController.php";
$title = "Data pengguna Nusantara hospital";
$page = "users";
$no = 1;


$users = Core::get('users');
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
                        <li class="breadcrumb-item active">Pengguna</li>
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

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $data) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $data['name'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td>

                                                <?php if ($data['enabled'] == 1) : ?>
                                                    <button class="btn btn-sm btn-success">Aktif</button>
                                                <?php else : ?>
                                                    <button class="btn btn-sm btn-danger">Tidak aktif</button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="<?= base_url("backoffice/admin/edit?id=" . $data['id']) ?>" class="m-1 btn btn-sm btn-secondary"><i class="fa fa-edit "></i></a>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                        <?php if ($data['enabled'] == 0) : ?>
                                                            <button type="submit" name="active" class="m-1 btn btn-sm btn-success"><i class="fa fa-check "></i></button>
                                                        <?php else : ?>
                                                            <button type="submit" name="non-active" class="m-1 btn btn-sm btn-danger"><i class="fa fa-times px-1"></i></button>
                                                        <?php endif; ?>
                                                    </form>
                                                    <form action="" method="post" class="ml-2">
                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                                        <button onclick="confirm('Hapus permanen ?')" type="submit" name="delete" class="m-1 btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
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