<?php

require_once "FasilitasController.php";
$title = "Tambah data fasilitas";
$page = "hospital";
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
                    <h1>Tambah data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah data</li>
                        <li class="breadcrumb-item active">Fasilitas</li>
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
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 my-4">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid rounded image-preview" src="<?= assets("img/doctors/default.png") ?>" alt="User profile picture">
                                        </div>
                                        <div class="d-flex justify-content-center">

                                            <div class="form-group mt-5 ">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" required name="img" class="input-img custom-file-input" id="icon">
                                                        <label class="custom-file-label" for="icon">Pilih ikon</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Fasilitas</label>
                                            <input type="text" name="name" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe fasilitas</label>
                                            <select name="type" id="type" required class="form-control">
                                                <option value="umum">Umum</option>
                                                <option value="medis">Medis</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="create" class="btn btn-success col-md-3 mx-2">Submit</button>
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