<?php
if (session('email') && session('role')) {
    if (session('role') == 'doctor') {
        $login = base_url("page/dashboard-dokter");
    } elseif (session('role') == 'admin') {
        $login = base_url("backoffice");
    } else {
        $login = base_url("page/dashboard-user");
    }

    redirect($login);
}
