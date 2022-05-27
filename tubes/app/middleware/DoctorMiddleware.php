<?php
if (session('role') == 'doctor') {
    redirect(base_url());
}
