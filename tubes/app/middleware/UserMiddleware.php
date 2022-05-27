<?php
if (session('role') == 'user' && session('email')) {
    redirect(base_url());
} else {
    flash("info", "Silahkan login terlebih dahulu");
    redirect(base_url("auth/login"));
}
