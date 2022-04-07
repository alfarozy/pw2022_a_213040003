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
        .nice-img {
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: center;
        }

        p {
            line-height: 10px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-between">
            <div class="col-md-6">

                <h1>Detail mahasiswa</h1>
            </div>
        </div>

        <hr class="col-2 border border-primary mb-5">

        <div class="card mb-3 border-white rounded" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="./img/<?= $_GET['img'] ?>" class="nice-img img-fluid rounded-circle" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $_GET['nama'] ?></h5>
                        <p class="card-text text-muted"><?= $_GET['email'] ?></p>
                        <p class="card-text text-muted"><?= $_GET['nrp'] ?></p>
                        <p class="card-text text-muted"><?= $_GET['jurusan'] ?></p>
                        <div class="d-flex justify-content-end">
                            <a href="./pertemuan7_latihan3.php" class="btn btn-sm btn-secondary">kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>