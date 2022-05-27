<?php
require_once "../../app/Core.php";
require_once "../../app/middleware/AdminMiddleware.php";

$table = 'doctors';


if (isset($_POST['active'])) {
    $data = [
        'enabled' => 1
    ];
    $update = Core::update($table, $data, ['id' => $_POST['id']]);
    if ($update) {

        flash('success', 'Item berhasil diaktifkan');
        redirect(base_url("backoffice/doctors"));
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
        redirect(base_url("backoffice/doctors"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}
