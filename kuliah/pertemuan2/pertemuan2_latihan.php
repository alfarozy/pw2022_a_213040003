<?php
    # pertemuan 2. membahas mengenal sintkas PHP
    // nilai: integer, string, boolean
    echo 1; //integer
    echo "<br>";
    echo 'Hellow Word!';//string
    echo "<br>";
    echo false;//boolean
    echo "<br>";
    echo true;//boolean

    echo "<hr>";

    #VARIABLE
    // tempat untuk menyimpan nilai sementara
    // nama nya bebas, tidak boleh diawali angka dan tidak boleh ada spasi
    $nama = 'Alfarozi';
    echo $nama;
    echo "<br>";
    // bisa ditimpa / overwrite
    $nama = 'Muhammad Alfarozi';
    echo $nama;
    echo "<hr>";

    # String
    // '',""
    echo "Jum'at";
    echo "<br>";
    // escaped character
    // \
    echo 'Alfarozi  : "jum\'at"';
    echo "<br>";
    echo "Koji      : \"don't\ touch it!\"";
    echo "<br>";

    // interpolasi
    // Mencetak isi variable
    // Hanya digunakan oleh ""
    $price = 100;
    echo "My name $nama";
    echo "price : $80";
    echo "price : $$price";
    echo "<hr>";

    # OPERATOR Aritmatika
    // +, -, *, / , % (module / modulus / sisa bagi)
    echo (1 + 2) * 3 - 4; // eksekusi yg didalam kurung terlebih dahulu
    echo "<br>";
    $alas = 10;
    $tinggi = 20;
    $luas_segi_tiga = ($alas * $tinggi) / 2;
    echo $luas_segi_tiga;
    echo "<br>";


    // Concat
    // Penggabung String
    // .
    $nama_depan = 'Muhammad';
    $nama_belakang = 'Alfarozi';
    echo $nama_depan . " " . $nama_belakang;
    echo "<hr>";

    // Perbandingan
    // <, >, <=, >=, ==, !=
    echo 1 < 5  . "<br>";
    echo 10 == 10 . "<br>";
    echo 10 <= 11 . "<br>";
    echo 10 != 19 . "<br>";

    // Identitas / Strict Comparison
    // ===, !==
    echo 10 === "10";
    echo 10 !== "10";
    echo "<hr>";

    // increment / Decrement
    // Penambahan / Pengurangan 1
    // ++, --
    $x = 10;
    $i = 5;
    echo ++$x;
    echo "<br>";
    echo $x;
    $i--;
    echo $i;

    echo "<br>";

    // Logika
    // &&, ||, !
    $x = 10;
    // OR
    var_dump($x < 20 || $x % 2 == 0); //jika salah satu bernilai true maka true
    // AND
    var_dump($x < 20 && $x % 2 == 0); //semua nilai harus true



  
?>