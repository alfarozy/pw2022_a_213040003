<?php
require_once "../app/Core.php";

require_once "../app/middleware/GuestMiddleware.php";
$table = 'users';
$title = "Login";

if (isset($_POST['login'])) {

    $user = Core::show($table, ['email' => $_POST['email']]);
    if ($user) {
        if (Core::check($_POST['password'], $user['password'])) {

            // login sekarang
            session('role', 'user');
            session('email', $user['email']);
            redirect(base_url());
        } else {
            flash("error", 'Password yang anda masukkan salah');
        }
    } else {
        flash("error", 'Email belum terdaftar, ayo daftar sekarang');
    }
}
?>

<?php include "layouts/header.php"; ?>

<!-- step 1 -->
<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url() ?>">Login </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <div class="text-center my-5 mb-4">
                <img class="col-8" src="<?= assets("backoffice/dist/img/logo/logo.png") ?>" alt="logo" srcset="">
            </div>

            <form action="" method="post">

                <div class="input-group mb-3">
                    <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" class="form-control" placeholder="Email" require>
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
                    <button type="submit" name="login" class="btn btn-block btn-success"> Login
                    </button>
                </div>
            </form>

            <!-- /.social-auth-links -->

        </div>
    </div>
</div>
<?php include_once "layouts/footer.php"; ?>