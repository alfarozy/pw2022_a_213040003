<?php
require_once "../../app/Core.php";

$data = Core::query("SELECT doctors.*, `specialists`.`name` as specialist,`faskes`.`name` as faskes FROM doctors 
INNER JOIN specialists ON id_specialist = `specialists`.`id`
INNER JOIN faskes ON id_hospital = `faskes`.`id`
");
$no = 1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data dokter</title>
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

    <h3>Data Dokter</h3>

    <table border="1" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Spesialis</th>
            <th>Rumah sakit</th>
            <th>Tanggal</th>
        </tr>
        <?php foreach ($data as $item) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['specialist'] ?></td>
                <td><?= $item['faskes'] ?></td>
                <td><?= format_date("d/m/Y", $item['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
    if (isset($_GET['type']) && $_GET['type'] == "excel") {

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=data_dokter_nhc.xls");
    }
    ?>
    <?php if (isset($_GET['type']) && $_GET['type'] == "pdf") : ?>
        <script>
            window.print();
        </script>
    <?php endif; ?>
</body>

</html>