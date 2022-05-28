<?php
if (session('role') != 'user' && session('email')) {
    redirect(base_url("errors/403"));
}
