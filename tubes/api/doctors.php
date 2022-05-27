<?php
require_once "../app/Core.php";


//> get cities by province
if (isset($_GET['search'])) {
    $search = Core::request($_GET['search']);
    $data = Core::query("SELECT doctors.*, `specialists`.`name` as spesialist FROM doctors 
    INNER JOIN specialists ON id_specialist = `specialists`.`id`
    WHERE `doctors`.`name` LIKE '%$search%' OR `specialists`.`name` LIKE '%$search%'");
    $output = null;
    if ($data) {

        foreach ($data as $item) {
            $output .= '<article class="card-body shadow rounded my-3">';
            $output .= '<div class="row gy-3">';
            $output .= '<div class="col-md-7">';
            $output .= '<figure class="itemside">';
            $output .= '<a href="' . base_url(`page/doctor/profil?id=` . $item['id']) . '" class="aside"><img src="' . assets($item['img']) . '" class="img-md img-thumbnail"></a><figcaption class="info">';

            $output .= '<a href="' . base_url(`page/doctor/profil?id=` . $item['id']) . '" class="title"><b>' . $item['name'] . '</b></a>';
            $output .= '<div> <a href="#" class="btn-link">' . $item['spesialist'] . '</a></div>';
            $output .= '</figcaption> </figure></div> ';

            $output .= '<div class="col-md-5 text-end"><a href="' . base_url(`page/doctor/profil?id=` . $item['id']) . '" class="btn btn-light" type="button">Lihat Profile</a></div>';
            $output .= ' </div> </article> ';
        }
    } else {
        $output .= '<article class="card-body shadow rounded my-3">';
        $output .= '<div class="row gy-3">';
        $output .= '<div class="col-md-7">';
        $output .= '<figure class="itemside text-center ">';

        $output .= '<h4 class="text-center">Dokter tidak ditemukan</h4>';
        $output .= '</figcaption> </div> ';

        $output .= ' </div> </article> ';
    }


    echo $output;
}
