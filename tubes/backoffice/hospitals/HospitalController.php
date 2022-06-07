<?php

require_once "../../app/Core.php";
require_once "../../app/middleware/AdminMiddleware.php";
$table = "faskes";
$no = 1;
if (isset($_POST['create'])) {



    try {
        $img = Core::uploadImage($_FILES['img'], "faskes");
        $data = [
            'province_id' => $_POST['province_id'],
            'city_id' => $_POST['city_id'],
            'district_id' => $_POST['district_id'],
            'area_id' => $_POST['area_id'],
            'tipe_faskes_id' => $_POST['type_faskes_id'],
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'description' => $_POST['description'],
            'slug'  => Core::slug($_POST['name']),
            'image' => $img['message']
        ];
        $faskes = Core::insert('faskes', $data);
        foreach ($_POST['fasilitas'] as $item) {
            Core::insertTo('fasilitas_faskes', [
                'id_fasilitas' => $item,
                'id_faskes'    => $faskes['id']
            ]);
        }
        flash('success', 'Berhasil menambahkan fasilitas kesehatan');
        redirect(base_url("backoffice/hospitals"));
    } catch (\Throwable $th) {
        //throw $th;
        flash('error', 'Terjadi kesalahan : ' . $th->getMessage());
        redirect(base_url("backoffice/hospitals/create"));
    }
}

if (isset($_POST['active'])) {
    $data = [
        'enabled' => 1
    ];
    $update = Core::update($table, $data, ['id' => $_POST['id']]);
    if ($update) {

        flash('success', 'Item berhasil diaktifkan');
        redirect(base_url("backoffice/hospitals"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}

if (isset($_POST['non-active'])) {
    $data = [
        'enabled' => 0
    ];
    $update = Core::update($table, $data, ['id' => $_POST['id']]);
    if ($update) {

        flash('success', 'Item berhasil di non-aktifkan');
        redirect(base_url("backoffice/hospitals"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}
