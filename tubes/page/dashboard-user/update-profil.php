<?php

require "../../app/Core.php";
require "../../app/middleware/UserMiddleware.php";

// use Query;
$email = session('email');
$user = Core::query("SELECT users.* FROM users 
    WHERE `email`= '$email'");
$title = "Profil " . $user['name'];

if (isset($_POST['update'])) {

    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
    ];
    if ($_POST['password']) {
        $data['password'] = bcrypt($_POST['password']);
    }
    // update img
    if ($_FILES['img']['error'] != 4) {
        if ($user != "img/users/default.png") {

            $pathFile =  Core::root_path() . "/assets" . "/" . $user['img'];
            unlink($pathFile);
        }
        $img = Core::uploadImage($_FILES['img'], "users");
        $data['img'] = $img['message'];
    }

    $update = Core::update('users', $data, ['id' => $user['id']]);

    if (!$update) {

        flash('error', "Terjadi kesalahan, silahkan periksa data yang diinputkan");
        redirect(base_url('page/dashboard-user/update-profil'));
    }
    flash('success', "Berhasil memperbarui fasilitas");
    redirect(base_url('page/dashboard-user/update-profil'));
}


?>

<?php include "../../page/layouts/header.php" ?>

<body>

    <?php include "../../page/layouts/navbar.php" ?>
    <link rel="stylesheet" href="<?= assets("/backoffice/plugins/select2/css/select2.min.css") ?>">
    <link rel="stylesheet" href="<?= assets("/backoffice/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") ?>">
    <style>
        .ck-content {
            height: 400px
        }
    </style>
    <!-- ============== SECTION PAGETOP ============== -->
    <section class="bg-primary padding-y-sm">
        <div class="container">

            <ol class="breadcrumb ondark mb-0">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Profil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dokter</li>
            </ol>

        </div> <!-- container //  -->
    </section>
    <!-- ============== SECTION PAGETOP END// ============== -->

    <!-- ============== SECTION CONTENT ============== -->
    <section class="padding-y bg-light">
        <div class="container">

            <div class="row">
                <aside class="col-lg-3 col-xl-3">
                    <!--  COMPONENT MENU LIST  -->
                    <nav class="nav flex-lg-column nav-pills mb-4">
                        <a class="nav-link " href="<?= base_url("page/dashboard-user") ?>">Dashboard</a>
                        <a class="nav-link" href="#">Buat artikel (coming soon)</a>
                        <a class="nav-link active" href="<?= base_url("page/dashboard-user/update-profil") ?>">Pengaturan akun</a>
                        <a class="nav-link" href="<?= base_url("auth/logout") ?>">Log out</a>
                    </nav>
                    <!--   COMPONENT MENU LIST END .//   -->
                </aside>
                <main class="col-lg-9  col-xl-9">
                    <article class="card">
                        <div class="content-body">
                            <div class="row g-2 mb-3">
                                <form enctype="multipart/form-data" method="POST">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row gx-3">
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Nama lengkap</label>
                                                    <input class="form-control" name="name" value="<?= $user['name'] ?>" required type="text">
                                                </div> <!-- col .// -->

                                                <div class="col-lg-12 mb-3">
                                                    <label class="form-label">Alamat email</label>
                                                    <input class="form-control" name="email" value="<?= $user['email'] ?>" required type="email">
                                                </div> <!-- col .// -->
                                                <div class="col-lg-12 mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input class="form-control" name="password" type="password">
                                                    <small>Kosongkan jika tidak ingin memperbarui password</small>
                                                </div> <!-- col .// -->


                                            </div> <!-- row.// -->
                                        </div> <!-- col.// -->
                                        <aside class="col-lg-4">
                                            <figure class="text-lg-center mt-3">
                                                <img class="img-lg mb-3 img-avatar image-preview" src="<?= assets($user['img']) ?>" alt="User Photo">
                                                <figcaption>
                                                    <input type="file" class="input-img" hidden name="img">
                                                    <button type="button" class="btn btn-sm btn-light btn-img">
                                                        <i class="fa fa-camera"></i> Upload
                                                    </button>
                                                </figcaption>
                                            </figure>
                                        </aside> <!-- col.// -->
                                    </div> <!-- row.// -->
                                    <br>
                                    <button class="btn btn-primary" name="update" type="submit">Simpan Perubahan</button>
                                </form>

                            </div> <!-- row.// -->


                        </div> <!-- card-body .// -->
                    </article> <!-- card .// -->
                </main>
            </div> <!-- row.// -->

            <br><br>


        </div> <!-- container .//  -->
    </section>
    <!-- ============== SECTION CONTENT END// ============== -->


    <?php include "../../page/layouts/footer.php" ?>


    <!-- Bootstrap js -->
    <script src="<?= assets("frontoffice/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Custom js -->
    <script src="<?= assets("frontoffice/js/script.js?v=2.0") ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?= assets("backoffice/plugins/select2/js/select2.full.min.js") ?>"></script>
    <script src="<?= assets("backoffice/dist/js/ckeditor.js") ?>"></script>
    <script src="<?= assets("backoffice/plugins/toastr/toastr.min.js") ?>"></script>

    <script>
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        ClassicEditor.create(document.querySelector('.editor'), {

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold', 'italic', 'bulletedList', 'numberedList', 'link',
                        '|',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'imageInsert',
                        '|',
                        'code',
                        'codeBlock',
                        'htmlEmbed'
                    ]
                },
                language: 'id',
                licenseKey: '',



            })
            .then(editor => {
                window.editor = editor;




            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
                console.warn('Build id: hosofu6grpb-m75gatu85ah8');
                console.error(error);
            });
        $('.btn-img').click(function() {
            $('.input-img').click();
        });
        $('.input-img').change(function() {
            const file = this.files[0];
            if (file && file.name.match(/\.(jpg|jpeg|png|svg)$/)) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('.image-preview').attr('src', event.target.result)
                }
                reader.readAsDataURL(file);
            } else {
                alert('please upload image file');
            }
        });
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp" + rupiah : "";
        }
        $('.rupiah').on('keyup', function(e) {
            $(this).val(formatRupiah($(this).val(), "Rp"));

        })

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "600",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        <?php if (isset($_SESSION['success'])) : ?>
            toastr['success']("<?= flash('success') ?>", 'Success')
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])) : ?>
            toastr['error']("<?= flash('error') ?>", 'Error')
        <?php endif; ?>

        <?php if (isset($_SESSION['msg'])) : ?>
            toastr['success']("<?= flash('msg') ?>", 'Success')
        <?php endif; ?>
    </script>
</body>

</html>