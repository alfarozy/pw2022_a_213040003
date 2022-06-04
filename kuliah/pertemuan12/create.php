<?php

require "Core/Core.php";
$table = "mahasiswa";

if (isset($_POST['create'])) {


    if ($_FILES['gambar']['error'] == 4) { // cek apakah user upload file
        $img = "img/mahasiswa/default.png";
    } else {
        $img = Core::uploadImage($_FILES['gambar'], "mahasiswa");

        if ($img['status'] == 'error') {
            flash('error', "Terjadi kesalahan, " . $img['message']);
            redirect("./create.php");
        } else {

            $img = $img['message'];
        }
    }

    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'npm' => $_POST['npm'],
        'jurusan' => $_POST['jurusan'],
        'gambar' => $img,
    ];

    $create = Core::insertTo($table, $data);
    if ($create) {

        flash('success', "Berhasil menambahkan data mahasiswa");
        redirect("./");
    }
    flash('error', "Terjadi kesalahan, silahkan periksa data yang diinputkan");
    redirect("./create.php");
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data mahasiswa</title>
    <style>
        .img-table {
            width: 50px;
            height: 50px;
            object-fit: cover;
            object-position: center;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-between">
            <div class="col-md-6">

                <h1>Tambah Data mahasiswa</h1>
            </div>
        </div>

        <hr class="col-2 border border-primary">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> : <?= flash('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="rows mt-3">
            <div class="col-6">
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="text" required class="form-control" id="npm" name="npm" require maxlength="9" minlength="9">
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input class="form-control" name="gambar" type="file" id="formFile">
                        </div>
                    </div>


                    <a href="./" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary" name="create">Tambah Data Mahasiswa</button>

                </form>

            </div>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>