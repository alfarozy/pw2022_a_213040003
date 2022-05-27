<footer class="section-footer bg-white shadow">
    <div class="container">
        <section class="footer-main padding-y">
            <div class="row">
                <aside class="col-lg-4">
                    <article class="me-lg-4 mb-4">
                        <img src="<?= assets("frontoffice/images/logo.png") ?>" class="logo-footer mr-2" height="80px">
                        <span class="mx-1">|</span>
                        <img src="<?= assets("frontoffice/images/kementrian-kesehatan.png") ?>" class="logo-footer ml-2" height="80px">
                        <p class="mt-3">Menyediakan informasi kesehatan Lorem ipsum, dolor sit amet consectetur
                            adipisicing elit. </p>
                        <nav>
                            <a class="btn btn-icon btn-light" title="Facebook" target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-icon btn-light" title="Instagram" target="_blank" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-icon btn-light" title="Youtube" target="_blank" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-icon btn-light" title="Twitter" target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                        </nav>
                    </article>
                </aside>
                <aside class="col-6 col-sm-3 col-lg-2">
                    <h6 class="title">Layanan</h6>
                    <ul class="list-menu mb-4">
                        <li> <a href="#">Konsultasi kesehatan</a></li>
                        <li> <a href="#">Cari rumah sakit</a></li>
                        <li> <a href="#">Cari dokter</a></li>
                        <li> <a href="#"></a></li>
                    </ul>
                </aside>
                <aside class="col-6 col-sm-3 col-lg-2">
                    <h6 class="title">Informasi</h6>
                    <ul class="list-menu mb-4">
                        <li> <a href="#">Tentang kami</a></li>
                        <li> <a href="#">Kebijakan layanan</a></li>
                        <li> <a href="#">Butuh bantuan</a></li>
                    </ul>
                </aside>
                <aside class="col-6 col-sm-3 col-lg-2">
                    <h6 class="title">Pengguna</h6>
                    <ul class="list-menu mb-4">
                        <li> <a href="<?= base_url("auth/login") ?>"> Login pengguna</a></li>
                        <li> <a href="<?= base_url("auth/login-dokter") ?>"> Login Dokter</a></li>
                        <li> <a href="<?= base_url("auth/register") ?>"> Registrasi pengguna </a></li>
                        <li> <a href="<?= base_url("auth/register-dokter") ?>"> Registrasi dokter</a></li>
                    </ul>
                </aside>
                <aside class="col-6 col-sm-2 col-lg-2">
                    <h6 class="title"></h6>
                    <a href="#" class="d-block mb-2"><img src="<?= assets("frontoffice/images/misc/btn-appstore.png") ?>" height="40"></a>
                    <a href="#" class="d-block mb-2"><img src="<?= assets("frontoffice/images/misc/btn-market.png") ?>" height="40"></a>
                </aside>
            </div> <!-- row.// -->
        </section> <!-- footer-top.// -->

        <section class="footer-bottom d-flex justify-content-lg-between border-top">
            <p class="text-muted mb-0"> &copy; 2022 Nusantara Hospital Center. All rights reserved. </p>
            <nav>
                <a href="https://alfarozy.id" class="px-2 text-success">Alfarozy.id</a>
            </nav>
        </section>
    </div> <!-- container end.// -->
</footer>