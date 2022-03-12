<?php
$mahasiswa = [
    'nama'      => "Muhammad Alfarozi",
    'nrp'       => 213040003,
    'email'     => "mr.alfarozy.a.n@gmail.com"
];

var_dump($mahasiswa);
echo "<br>";

$students = [
    [
        'nama'  => "Muhammad Alfarozi",
        'nrp'   => 213040003,
        'hobi' => [
            'Bermain Video game',
            'Mendengarkan Musik',
            'Ngoding'
        ],

    ],
    [
        'nama'  => "Muhammad Daffa Dhiya",
        'nrp'   => 213040006,
        'hobi' => [
            'Bermain Video game',
            'Ngoding'
        ],

    ],

];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahsiswa</title>
</head>

<body>
    <ul>

        <?php foreach ($students as $student) : ?>
            <li>Nama : <?= $student['nama'] ?></li>
            <li>NRP : <?= $student['nrp'] ?></li>
            <br>
        <?php endforeach ?>
    </ul>
</body>

</html>