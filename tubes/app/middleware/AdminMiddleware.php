<?php
if (session('role') != 'admin' && !session('email')) {

    flash("info", "Silahkan login untuk melanjutkan");
    redirect(base_url("auth/login-admin"));
}
