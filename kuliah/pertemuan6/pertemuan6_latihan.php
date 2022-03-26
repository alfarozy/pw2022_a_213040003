<?php
// array assosiative
// array yang 
$mahasiswa = [
    [
        'nama'  => 'Muhammad Alfarozi',
        'nrp'   => 213040003,
        'email' => 'mr.alfarozy.a.n@gmail.com',
        'jurusan'      => 'Teknik Informatika'
    ],
    [
        'nama'      => 'Muhammad Daffa Dhiya',
        'nrp'       => 213040006,
        'email'     => 'daffadhiya@gmail.com',
        'jurusan'   => 'Teknik Informatika'
    ],
    [
        'nama'      => 'Faqih Kemal Pangestu',
        'nrp'       => 213040033,
        'email'     => 'faqih@gmail.com',
        'jurusan'   => 'Teknik Informatika'
    ],
    [
        'nama'      => 'Koji Xenpai',
        'nrp'       => 213040000,
        'email'     => 'koji@gmail.com',
        'jurusan'   => 'Teknik Informatika'
    ],
];

// var_dump($mahasiswa[2]['email']);

?>
<h4>Data mahasiswa</h4>
<?php foreach ($mahasiswa as $mhs) : ?>
    <ul>
        <li>Nama : <?= $mhs['nama'] ?> </li>
        <li>NPM : <?= $mhs['nrp'] ?></li>
        <li>Email : <?= $mhs['email'] ?> </li>
        <li>Jurusan : <?= $mhs['jurusan'] ?></li>
    </ul>
<?php endforeach ?>