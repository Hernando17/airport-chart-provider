<?= $this->include('layout/header'); ?>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="/assets/images/logo/pilotgamingindo.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <?= $this->include('layout/navbar'); ?>

    <div class="hero-area hero-height2 d-flex align-items-center" data-background="/assets/img/hero/h2_hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <main>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <h2 class="mt-2">Detail Chart</h2>
                                        <div class="card-body">
                                            <img src="/assets/images/chart/<?= $chart['foto']; ?>" width="300px" height="200px">
                                            <br>
                                            <br>
                                            <h5>
                                                <b>ICAO : <?= $chart['icao']; ?></b>
                                            </h5>
                                            <p class="card-text ">Nama Bandara : <?= $chart['bandara']; ?></p>
                                            <p class="card-text ">Keterangan : <?= $chart['keterangan']; ?></p>
                                            <p class="card-text "><small class="text-muted">Waktu Upload : <?= $chart['created_at']; ?></small></p>
                                            <p class="card-text "><small class="text-muted">Update Terakhir : <?= $chart['updated_at']; ?></small></p>
                                            <a href="/chartmenu" class="btn btn-primary fas fa-chevron-circle-left"> Kembali</a>
                                            <a href="<?= base_url(); ?>/assets/file/pdf/<?= $chart['file']; ?>" class="btn btn-primary fas fa-chevron-circle-left"> Unduh</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <!-- Footer Start-->
        <div class="footer-area">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href="index.html"><img src="/assets/images/logo/pgic.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Halaman</h4>
                                    <ul>
                                        <li><a href="/">Beranda</a></li>
                                        <li><a href="#">Tentang</a></li>
                                        <li><a href="#">Livery</a></li>
                                        <li><a href="#">Donasi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Halaman</h4>
                                    <ul>
                                        <li><a href="#">Beranda</a></li>
                                        <li><a href="#">Tentang</a></li>
                                        <li><a href="#">Addon</a></li>
                                        <li><a href="#">Panduan</a></li>
                                        <li><a href="#">Chart</a></li>
                                        <li><a href="#">Flight Simulator</a></li>
                                        <li><a href="#">Donasi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <ul>
                                        <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSDbtzQMgkGsZCfzDXbXFFZFHFdKMNqrSsFdPnpnxPkglcGpVRpLBXsvPwRPLMXQVbKNvxNr">xbrtgaming@gmail.com</a></li>
                                    </ul>
                                </div>
                                <!-- footer social -->
                                <div class="footer-social">
                                    <a href="https://www.youtube.com/channel/UCTEmF5ryohcWr9nYm01uvWA"><i class="fab fa-youtube"></i></a>
                                    <!-- <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fas fa-globe"></i></a> -->
                                    <a href="https://www.instagram.com/theo_valdi/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> Pilot Gaming Indo All rights reserved <br>| This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>


    <!-- JS here -->
    <!-- All JS Custom Plugins Link Here here -->
    <script src="<?= base_url(); ?>/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?= base_url(); ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?= base_url(); ?>/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?= base_url(); ?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="<?= base_url(); ?>/assets/js/wow.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/animated.headline.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="<?= base_url(); ?>/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="<?= base_url(); ?>/assets/js/contact.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.form.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/mail-script.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?= base_url(); ?>/assets/js/plugins.js"></script>
    <script src="<?= base_url(); ?>/assets/js/main.js"></script>

</body>

</html>