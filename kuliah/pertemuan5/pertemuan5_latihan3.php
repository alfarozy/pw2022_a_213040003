<?php
#studi kasus

$mahasiswa = [
    ['Muhammad Alfarozi', 213040003, 'mr.alfarozy.a.n@gmail.com', 'Teknik Informatika'],
    ['Muhammad Daffa Dhiya', 213040006, 'daffadhiya@gmail.com', 'Teknik Informatika'],
    ['Faqih Kemal Pangestu', 213040033, 'faqih@gmail.com', 'Teknik Informatika'],
    ['Koji Xenpai', 213040000, 'koji@gmail.com', 'Teknik Informatika'],
];

?>

<?php foreach ($mahasiswa as $mhs) : ?>
    <ul>
        <li>Nama : <?= $mhs[0] ?> </li>
        <li>NPM : <?= $mhs[1] ?></li>
        <li>Email : <?= $mhs[2] ?> </li>
        <li>Jurusan : <?= $mhs[3] ?></li>
    </ul>
<?php endforeach ?>