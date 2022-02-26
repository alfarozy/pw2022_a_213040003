<?php
#pengkondisian 
//if else
//if elseif else
//ternary
//switch

$x = 10;
if ($x < 20) {
    echo "Benar";
} elseif ($x == 20) {
    echo "bingo!";
} else {
    echo "Salah";
}
echo "<h3>Ternary</h3>";
$bilangan = 10;
$hasil = ($bilangan % 2) == 0 ? "Bilangan bulat" : "Bilangan Ganjil";

echo "$bilangan <br>";
echo $hasil;


echo "<h3>Switch</h3>";
$nilai = "B";
echo "You got " . $nilai;
echo "<br>";
switch ($nilai) {
    case 'A':
        echo "Good jobs!";
        break;
    case "B":
        echo "Nice Try";
        break;
    case "C":
        echo "Not Bed";
        break;
    case "D":
        echo "Try Again";
        break;
    default:
        echo "Nilai yang anda inputkan salah";
        break;
}
?>

<h3>Navigasi</h3>
<ul>
    <li><a href="./pertemuan3_latihan.php">Latihan 1</a></li>
    <li><a href="./pertemuan3_latihan2.php">Latihan 2 - pengulangan table dengan kondisi</a></li>
    <li><a href="./pertemuan3_latihan3.php">Latihan 3 - Pengkondisian / percabangan</a></li>
</ul>