<?php
// function 
// function yang baik adalah function yang hanya mengerjakan 1 hal
// argumen ilai yang kia masukkan saat di panggil
// paratmeter nilai saat di bikin
//manual
$a = 9;
$b = 4;
$luas_a = $a * $a * $a;
$luas_b = $b * $b * $b;

$total = $luas_a + $luas_b;

echo "Total Luas dari kubus A dengan sisi $a dan Kubus B dengan sisi $b adalah $total";
echo "<hr>";

// with function
function luasKubus($sisi)
{
    return $sisi * $sisi * $sisi;
}

function luasDuaKubus($kubus1, $kubus2)
{
    $total = luasKubus($kubus1) + luasKubus($kubus2);
    return "Total Luas dari kubus A dengan sisi $kubus1 dan Kubus B dengan sisi $kubus2 adalah $total";
}

$luas_kubus1 = luasKubus(2);
$luas_kubus2 = luasKubus(3);
echo $luas_kubus1;
echo "<br>";
echo $luas_kubus2;
echo "<br>";

echo luasDuaKubus(2, 3);
echo "<br>";
