<?php

#ARRAY 
//> array adalah variabel yang dapat menampung nilai lebih dari satu nilai sekaligus



# Membuat Array 

$hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu'];
echo $hari[4];
echo "<hr>";

foreach ($hari as $key => $value) {
    echo "Key : $key, Value : $value";
    echo "<br>";
}
echo "<hr>";

#Manipulasi array
$hari[] = 'Minggu';
foreach ($hari as $hr) {
    echo $hr;
    echo '<br>';
}
echo "<hr>";

#array multidimensi
// latihan 2

#array assosiatif
// latihan 3
