<?php
require_once "../../app/Core.php";
require_once "../../app/middleware/AdminMiddleware.php";

$table = 'specialists';

//create data
if (isset($_POST['create'])) {
    $data = [
        'name' => htmlspecialchars($_POST['name']),
        'slug' => Core::slug(htmlspecialchars($_POST['name']))
    ];
    $check = Core::show($table, ['slug' => $data['slug']]);

    if ($check) {
        flash('error', 'Data sudah tersedia');
        redirect(base_url("backoffice/specialists/create"));
    }

    $specialist = Core::insertTo($table, $data);

    if ($data) {

        flash('success', 'Data spesialis berhasil disimpan');
        redirect(base_url("backoffice/specialists"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}



if (isset($_POST['active'])) {
    $data = [
        'enabled' => 1
    ];
    $update = Core::update($table, $data, ['id' => $_POST['id']]);
    if ($update) {

        flash('success', 'Item berhasil diaktifkan');
        redirect(base_url("backoffice/specialists"));
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
        redirect(base_url("backoffice/specialists"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}


if (isset($_POST['update'])) {
    $data = [
        'name' => htmlspecialchars($_POST['name']),
        'slug' => htmlspecialchars($_POST['name']),
    ];

    $update = Core::update($table, $data, ['id' => $_GET['id']]);
    if ($update) {

        flash('success', 'Data berhasil di perbarui');
        redirect(base_url("backoffice/specialists"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}
