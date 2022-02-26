<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muhammad Alfarozi</title>
    <style>
        .baris {
            background-color: #0f0f0f;
            color: white;
        }
    </style>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">

        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <?php if ($i % 2 ==  1) : ?>
                <tr class="baris">
                <?php else : ?>
                <tr>
                <?php endif ?>
                <?php for ($j = 1; $j <= 5; $j++) : ?>
                    <td>
                        <?= "$i,$j" ?>
                    </td>
                <?php endfor ?>
                </tr>

            <?php endfor ?>
    </table>

    <h3>Navigasi</h3>
    <ul>
        <li><a href="./pertemuan3_latihan.php">Latihan 1</a></li>
        <li><a href="./pertemuan3_latihan2.php">Latihan 2 - pengulangan table dengan kondisi</a></li>
        <li><a href="./pertemuan3_latihan3.php">Latihan 3 - Pengkondisian / percabangan</a></li>

    </ul>
</body>

</html>