<?php
require_once "../../app/Core.php";

$data = Core::query("SELECT faskes.*, `cities`.`name` as city FROM faskes 
    INNER JOIN cities ON  city_id = `cities`.`id` 
    INNER JOIN tipe_faskes ON tipe_faskes_id = `tipe_faskes`.`id`
    ");
$no = 1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data fasilitas kesehatan</title>
    <style type="text/css">
        .tab1 td {
            border: 1px solid darkgray;
            border-collapse: collapse;
            padding: 0 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .tab2 {
            border: none;
        }
    </style>
</head>

<body>

    <h3>Data fasilitas kesehatan</h3>

    <table border="1" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Fasilitas Kesehatan</th>
            <th>Alamat</th>
            <th>No Telpon</th>
        </tr>
        <?php foreach ($data as $item) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['city'] ?>, <?= $item['address'] ?></td>
                <td><?= $item['phone'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=data_faskes_nhc.xls");
    // if (isset($_GET['type']) && $_GET['type'] == "excel") {

    // }
    ?>
    <?php if (isset($_GET['type']) && $_GET['type'] == "pdf") : ?>
        <script>
            window.print();
        </script>
    <?php endif; ?>
</body>

</html>