<?php
// data mahasiswa
$mahasiswa = [
    [
        'nama'  => 'Muhammad Alfarozi',
        'nrp'   => 213040003,
        'email' => 'mr.alfarozy.a.n@gmail.com',
        'jurusan'      => 'Teknik Informatika',
        'img'     => 'alfarozy.png'
    ],
    [
        'nama'      => 'Muhammad Daffa Dhiya',
        'nrp'       => 213040006,
        'email'     => 'daffadhiya@gmail.com',
        'jurusan'   => 'Teknik Informatika',
        'img'       => 'daffa.jpeg'
    ],
    [
        'nama'      => 'Faqih Kemal Pangestu',
        'nrp'       => 213040033,
        'email'     => 'faqih@gmail.com',
        'jurusan'   => 'Teknik Informatika',
        'img'       => 'faqih.jpg'
    ],
    [
        'nama'      => 'Koji Xenpai',
        'nrp'       => 213040000,
        'email'     => 'koji@gmail.com',
        'jurusan'   => 'Teknik Informatika',
        'img'       => 'koji.png'
    ],
    [
        "nama" => "Muhammad Ramzy",
        "nrp" => "213010047",
        "email" => "Ramzy@gmail.com",
        "jurusan" => "Teknik Industri",
        "img" => "default.png"
    ],
    [
        "nama" => "Riyan",
        "nrp" => "213040035",
        "email" => "Riyan@gmail.com",
        "jurusan" => "Teknik Informatika",
        "img" => "default.png"
    ],
    [
        "nama" => "yusup",
        "nrp" => "213040043",
        "email" => "yusup@gmail.com",
        "jurusan" => "Teknik Pangan",
        "img" => "default.png"
    ],
    [
        "nama" => "Asep",
        "nrp" => "213040044",
        "email" => "Asep@gmail.com",
        "jurusan" => "Teknik mesin",
        "img" => "default.png"
    ],
    [
        "nama" => "Galang",
        "nrp" => "213040045",
        "email" => "Galang@gmail.com",
        "jurusan" => "Pendidikan indonesia",
        "img" => "default.png"
    ],
    [
        "nama" => "Lutfi",
        "nrp" => "213040046",
        "email" => "lutfhi@gmail.com",
        "jurusan" => "Teknik Informatika",
        "img" => "default.png"
    ]
];

$no = 1;
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
                <a href="#" class="btn btn-primary">Tambah Mahasiswa</a>
            </div>
        </div>

        <hr class="col-2 border border-primary">
        <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success</strong> : Data mahasiswa berhasil di tambah.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> -->
        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">img</th>
                    <th scope="col">Nama</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr class="align-middle">
                        <th scope="row" class="text-center"><?= $no++ ?></th>
                        <td class="text-center">
                            <img class="img-table rounded-circle" src="./img/<?= $mhs['img'] ?>" alt="" srcset="">
                        </td>
                        <td><?= $mhs['nama'] ?></td>
                        <td class="text-center">
                            <a href="./pertemuan7_latihan4.php?nama=<?= $mhs['nama'] ?>&email=<?= $mhs['email'] ?>&nrp=<?= $mhs['nrp'] ?>&jurusan=<?= $mhs['jurusan'] ?>&img=<?= $mhs['img'] ?>" class="btn btn-sm btn-primary">Detail</a> |
                            <a href="#" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete">Hapus</a>
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