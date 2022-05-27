<?php
require_once "../app/Core.php";
$table = 'users';
$title = "Daftar pengguna baru";

if (isset($_POST['register'])) {
    $doctors = Core::show($table, ['email' => $_POST['email']]);
    if ($doctors) {
        flash('error', 'Email sudah terdaftar, silahkan login');
        redirect(base_url("auth/register"));
    }

    $data = [
        'name' => htmlspecialchars($_POST['name']),
        'email' => htmlspecialchars($_POST['email']),
        'password' => bcrypt(htmlspecialchars($_POST['password'])),
        'created_at' => created_at()
    ];

    $doctors =  Core::insertTo($table, $data);
    if ($doctors) {

        flash('success', 'Akun anda berhasil terdaftar, silahkan login');
        redirect(base_url("auth/login"));
    }
}

?>
<?php include_once "layouts/header.php" ?>

<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url() ?>">Registrasi pengguna baru</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <div class="text-center my-5 mb-4">
                <img class="col-8" src="<?= assets("backoffice/dist/img/logo/logo.png") ?>" alt="logo" srcset="">
            </div>

            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nama lengkap">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" require>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" require>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="social-auth-links text-center mb-3">
                    <button type="submit" name="register" class="btn btn-block btn-success"> Daftar sekarang
                    </button>
                </div>
            </form>

            <!-- /.social-auth-links -->

        </div>
    </div>
</div>
<?php include_once "layouts/footer.php" ?>