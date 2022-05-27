<?php
require_once "../app/Core.php";

if (session('role') === 'doctor') {
    $login = "./login-dokter";
} elseif (session('role') === 'admin') {
    $login = "./login-admin";
} else {
    $login = "./login";
}
session_destroy();
redirect($login);
