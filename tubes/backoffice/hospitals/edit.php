<?php

require_once "HospitalController.php";
$title = "Update data fasilitas kesehatan";
$page = "hospital";

$provinces = Core::get('provinces');
$type = Core::get('tipe_faskes');
$fasilitas = Core::get('fasilitas', ['enabled' => 1]);
$data = Core::show($table, ['id' => $_GET['id']]);
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
                    <h1>Update data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update data</li>
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
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label>Nama fasilitas kesehatan</label>
                                        <input type="text" name="name" value="<?= $data['name']; ?>" required class="form-control">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Tipe fasilitas kesehatan</label>
                                        <select name="type_faskes_id" id="type" width="100%" required class=" select2bs4 form-control">
                                            <option value="">-- Pilih fasilitas kesehatan --</option>
                                            <?php foreach ($type as $item) : ?>
                                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="">Fasilitas / layanan</label>

                                        <select class="select2bs4" name="fasilitas[]" multiple="multiple" data-placeholder="Pilih fasilitas" style="width: 100%;">
                                            <?php foreach ($fasilitas as $item) : ?>

                                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Nomor telpon</label>
                                        <input type="text" name="phone" required value="<?= $data['phone'] ?>" class="form-control">
                                    </div>
                                    <!-- new line -->
                                    <div class="form-group col-lg-3">
                                        <label>Provinsi</label>
                                        <select name="province_id" id="type" width="100%" required class="province select2bs4 form-control">
                                            <?php foreach ($provinces as $province) : ?>
                                                <option value="<?= $province['id'] ?>" <?php if ($data['province_id'] == $province['id']) {
                                                                                            echo "selected";
                                                                                        } ?>><?= $province['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Kabupaten / kota</label>
                                        <select name="city_id" id="type" width="100%" required class="select2bs4 form-control cities">
                                            <option value="" selected disabled> Pilih provinsi terlebih dahulu</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Kecamatan</label>
                                        <select name="district_id" id="type" width="100%" required class="select2bs4 form-control district">
                                            <option value="" selected disabled> Pilih kabupaten terlebih dahulu</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>Kecamatan</label>
                                        <select name="area_id" id="type" width="100%" required class="select2bs4 form-control areas">
                                            <option value="" selected disabled> Pilih kecamatan terlebih dahulu</option>
                                        </select>
                                    </div>
                                    <!-- new line -->
                                    <div class="form-group col-lg-8">
                                        <label>Alamat lengkap</label>
                                        <textarea name="address" class="form-control" rows="1"><?= $data['address'] ?></textarea>
                                    </div>

                                    <div class="form-group col-lg-4 ">
                                        <label for="">Pilih foto fasilitas kesehatan</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" required name="img" class="input-img custom-file-input" id="icon">
                                                <label class="custom-file-label" for="icon">Pilih gambar</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- new line -->
                                    <div class="form-group col-lg-8">
                                        <label>Deskripsi</label>
                                        <textarea name="description" class="editor form-control" rows="2"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="form-group col-lg-4 mt-4">
                                        <div class="text-center mt-2">
                                            <img class="img-fluid rounded image-preview" src="<?= assets($data['image']) ?>" alt="User profile picture">
                                        </div>
                                    </div>
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