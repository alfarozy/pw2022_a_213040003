<?php
require_once "../app/Core.php";


//> get cities by province
if (isset($_GET['province'])) {
    $data = Core::get('cities', ['prov_id' => $_GET['province']]);
    $output = '<option value="">Pilih kabupaten / kota</option>';
    foreach ($data as $item) {
        $output .= '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
    }
    echo $output;
}
//> get district by city
if (isset($_GET['city'])) {
    $data = Core::get('districts', ['city_id' => $_GET['city']]);
    $output = '<option value="">Pilih Kecamatan</option>';
    foreach ($data as $item) {
        $output .= '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
    }
    echo $output;
}
//> get area by district
if (isset($_GET['district'])) {
    $data = Core::get('areas', ['dis_id' => $_GET['district']]);
    $output = '<option value="">Pilih desa / kelurahan</option>';
    foreach ($data as $item) {
        $output .= '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
    }
    echo $output;
}


return "404 Halaman tidak ditemukan";
