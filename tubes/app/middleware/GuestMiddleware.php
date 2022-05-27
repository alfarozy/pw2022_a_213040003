<?php
if (session('email') && session('role')) {
    if (session('role') == 'doctor') {
        $login = base_url("page/doctor");
    } elseif (session('role') == 'admin') {
        $login = base_url("backoffice");
    } else {
        $login = base_url("page/user");
    }

    redirect($login);
}
