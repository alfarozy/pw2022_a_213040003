<?php

require_once "SpecialistController.php";
$title = "Update data spesialis";
$page = "doctors";

$data = Core::show($table, ['id' => $_GET['id']])
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
                    <h1>Update data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $page ?></li>
                        <li class="breadcrumb-item active">Spesialist</li>
                        <li class="breadcrumb-item active"><?= $data['name'] ?></li>
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
                        <form method="POST" action="">
                            <div class="card-body">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Spesialis</label>
                                    <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="update" class="btn btn-success col-md-3 mx-2">Submit</button>
                            </div>
                        </form>
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