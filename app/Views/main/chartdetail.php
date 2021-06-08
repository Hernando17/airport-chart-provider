<?= $this->include('layout/header'); ?>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.jpg" alt="">
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
                                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Services</h4>
                                    <ul>
                                        <li><a href="#">Marketing</a></li>
                                        <li><a href="#"> SEO Service</a></li>
                                        <li><a href="#">Digital market</a></li>
                                        <li><a href="#">Content create</a></li>
                                        <li><a href="#">Find Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Customer Care</h4>
                                    <ul>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">News & Articles</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#"> Terms of Use</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4><span>+564</span> 7885 3222</h4>
                                    <ul>
                                        <li><a href="#">youremail@gmail.com</a></li>
                                    </ul>
                                    <p>123 East 26th Street, Fifth Floor, New York, NY 10011</p>
                                </div>
                                <!-- footer social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fas fa-globe"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
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
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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