<?php
require_once "../../app/Core.php";
require_once "../../app/middleware/AdminMiddleware.php";

// create 
if (isset($_POST['create'])) {
    $data = [
        'name' => htmlspecialchars($_POST['name']),
        'email' => htmlspecialchars($_POST['email']),
        'password' => bcrypt($_POST['password']),
    ];
    $check = Core::show('admin', ['email' => $_POST['email']]);
    if ($check) {
        flash('error', 'Email sudah terdaftar');
        redirect(base_url("backoffice/admin/create"));
    }
    $admin = Core::insertTo('admin', $data);

    if ($admin) {

        flash('success', 'Data admin berhasil disimpan');
        redirect(base_url("backoffice/admin"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}

if (isset($_POST['active'])) {
    $data = [
        'enabled' => 1
    ];
    $admin = Core::update('admin', $data, ['id' => $_POST['id']]);
    if ($admin) {

        flash('success', 'Admin berhasil diaktifkan');
        redirect(base_url("backoffice/admin"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}
if (isset($_POST['non-active'])) {
    $data = [
        'enabled' => 0
    ];
    $admin = Core::update('admin', $data, ['id' => $_POST['id']]);
    if ($admin) {

        flash('success', 'Admin berhasil di non-aktifkan');
        redirect(base_url("backoffice/admin"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}
if (isset($_POST['delete'])) {

    $delete = Core::delete('admin', ['id' => $_POST['id']]);
    if ($delete) {

        flash('success', 'Admin berhasil di hapus');
        redirect(base_url("backoffice/admin"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}

if (isset($_POST['update'])) {
    $data = [
        'name' => htmlspecialchars($_POST['name']),
        'email' => htmlspecialchars($_POST['email']),
    ];
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $data['password'] = bcrypt($_POST['password']);
    }
    $admin = Core::update('admin', $data, ['id' => $_GET['id']]);
    if ($admin) {

        flash('success', 'Admin berhasil di perbarui');
        redirect(base_url("backoffice/admin"));
    }
    return flash('error', 'Terjadi kesalahan!, silahkan reload halaman dan coba lagi');
}
