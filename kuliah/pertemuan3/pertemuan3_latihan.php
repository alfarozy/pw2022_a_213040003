<?php
#pengulangan 
//for 
//while
//do...while
//foreach - Pengulangan khusus array

echo "<h3>Pengulangan For</h3>";
for ($i = 0; $i < 5; $i++) {
    echo "Hello World!";
    echo "<br>";
}

echo "<h3>Pengulangan While</h3>";
// jika false tidak dijalankan

$x = 0;
while ($x <= 5) {
    echo "Hello World!";
    echo "<br>";
    $x++;
}

echo "<h3>Pengulangan Do While</h3>";
// jika false dijalankan sekali
$a = 0;
do {
    echo "Hello World!";
    echo "<br>";
    $a++;
} while ($a <= 5);
?>
<h3>Navigasi</h3>
<ul>
    <li><a href="./pertemuan3_latihan.php">Latihan 1</a></li>
    <li><a href="./pertemuan3_latihan2.php">Latihan 2 - pengulangan table dengan kondisi</a></li>
    <li><a href="./pertemuan3_latihan3.php">Latihan 3 - Pengkondisian / percabangan</a></li>

</ul>