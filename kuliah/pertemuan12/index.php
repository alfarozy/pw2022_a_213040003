<?php

require "Core/Core.php";
$table = "mahasiswa";
$mahasiswa = Core::get($table);
$no = 1;
$msg = null;

if (isset($_GET['search'])) {
    $search = Core::request($_GET['search']);
    $mahasiswa = Core::queryGet("SELECT * FROM {$table} WHERE nama LIKE '%$search%' OR npm LIKE '%$search%' OR email LIKE '%$search%' OR jurusan LIKE '%$search%' ");
}

if (isset($_POST['delete'])) {

    $where = [
        'id' => $_POST['id'],
    ];
    $data = Core::show($table, $where);

    if ($data['gambar'] != "img/mahasiswa/default.png") { //> cek file dault
        $pathFile =  Core::root_path() . "/assets" . "/" . $data['gambar'];
        unlink($pathFile);
    }

    Core::delete($table, $where);
    flash('success', "Berhasil menghapus data mahasiswa");
    redirect('./');
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

                <h1>Data mahasiswa</h1>
            </div>
            <div class="col-md-6 mt-2 text-end">
                <a href="create.php" class="btn btn-primary">Tambah Mahasiswa</a>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-8">
                <form action="" method="get">

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" autofocus value="<?php if (isset($_GET['search'])) {
                                                                    echo htmlspecialchars($_GET['search']);
                                                                } ?>" class="form-control" name="search" placeholder="Cari mahasiswa" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">

                <?php if (isset($_GET['search'])) : ?>
                    <a href="./" class="btn btn-danger">Batal</a>
                <?php endif; ?>
            </div>
        </div>

        <hr class="col-2 border border-primary">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> : <?= flash('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> : <?= flash('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr class="align-middle">
                        <th scope="row" class="text-center"><?= $no++ ?></th>
                        <td class="text-center">
                            <img class="img-table rounded-circle" src="<?= assets($mhs['gambar']) ?>" alt="" srcset="">
                        </td>
                        <td><?= $mhs["nama"]; ?></td>
                        <td><?= $mhs["npm"]; ?></td>
                        <td><?= $mhs["email"]; ?></td>
                        <td><?= $mhs["jurusan"]; ?></td>
                        <td class="text-center">
                            <!-- <a href="./pertemuan7_latihan4.php?nama=<?= $mhs['nama'] ?>&email=<?= $mhs['email'] ?>&nrp=<?= $mhs['nrp'] ?>&jurusan=<?= $mhs['jurusan'] ?>&img=<?= $mhs['img'] ?>" class="btn btn-sm btn-primary">Detail</a> | -->
                            <a href="./edit.php?id=<?= $mhs['id'] ?>" class="btn btn-sm btn-secondary">Edit</a>

                            <form action="" method="post" class="d-inline">
                                <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
                                <button type="submit" name="delete" class="btn btn-sm btn-danger" onclick="return confirm('hapus item ? ')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


    <!-- modal delete -->
    <!-- Modal -->
    <div class="modal fade" data-backdrop="static" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-white">
                    <h5 class="modal-title" id="deleteLabel">Hapus data mahasiswa ? </h5>
                </div>
                <div class="modal-footer border-white">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger">Hapus Sekarang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>