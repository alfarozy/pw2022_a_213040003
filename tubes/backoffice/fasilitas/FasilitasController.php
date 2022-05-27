<?php

require_once "../../app/Core.php";
require_once "../../app/middleware/AdminMiddleware.php";

$table = "fasilitas";



if (isset($_POST['create'])) {
    // create fasilitas

    $img = Core::uploadImage($_FILES['img'], "icons");
    $data = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'img'   => $img['message']
    ];

    $fasilitas = Core::insertTo($table, $data);
    if ($fasilitas) {

        flash('success', "Berhasil menambahkan fasilitas");
        redirect(base_url("backoffice/fasilitas"));
    }
    flash('error', "Terjadi kesalahan, silahkan periksa data yang diinputkan");
    redirect(base_url("backoffice/fasilitas"));
}


if (isset($_POST['update'])) {

    $fasilitas = Core::show($table, ['id' => $_GET['id']]);
    $data = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
    ];
    if ($_FILES['img']['error'] != 4) {
        $pathFile =  Core::root_path() . "/assets" . "/" . $fasilitas['img'];
        unlink($pathFile);
        $img = Core::uploadImage($_FILES['img'], "icons");
        $data['img'] = $img['message'];
    }
    $fasilitas = Core::update($table, $data, ['id' => $_GET['id']]);
    if ($fasilitas) {

        flash('success', "Berhasil memperbarui fasilitas");
        redirect(base_url("backoffice/fasilitas"));
    }
    flash('error', "Terjadi kesalahan, silahkan periksa data yang diinputkan");
    redirect(base_url("backoffice/fasilitas"));
}


if (isset($_POST['active'])) {
    $data = [
        'enabled' => 1
    ];
    $data = Core::update($table, $data, ['id' => $_POST['id']]);
    if ($data) {

        flash('success', 'Item berhasil diaktifkan');
        redirect(base_url("backoffice/fasilitas"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}
if (isset($_POST['non-active'])) {
    $data = [
        'enabled' => 0
    ];
    $data = Core::update($table, $data, ['id' => $_POST['id']]);
    if ($data) {

        flash('success', 'Item berhasil di non-aktifkan');
        redirect(base_url("backoffice/fasilitas"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}
