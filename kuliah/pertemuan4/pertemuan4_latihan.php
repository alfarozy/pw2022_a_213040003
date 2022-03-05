<?php
// FUNCTION
// UNIX Timestamp / Epoch Time
// Detik yang berlalu sejak 1970

echo date('l, d F Y H:i:s');
echo "<hr>";


// Menambahkan tanggal
$nextWeek = time() + (60 * 60 * 24 * 7);
echo date('l, d F Y H:i:s', $nextWeek);
echo "<hr>";


// mktime(0,0,0,0,0,0);  
// Menambahkan detik pada tanggal tertentu
// jam, menit , detik , bulan , tanggal , tahun

echo mktime(8);
echo "<hr>";
// menentukan hari lahir 
echo date('l', mktime(0, 0, 0, 3, 25, 2003));

//MATH
echo '<hr>';
echo rand(1, 10);
echo "<br>";
// Pembulatan
// round -> terdekat
// ceil() -> keatas
// floor() -> kebawah

echo  round(pi(), 2);

echo "<hr>";
