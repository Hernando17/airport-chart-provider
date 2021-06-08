<?= $this->include('layout/header'); ?>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/images/logo/pilotgamingindo.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <?= $this->include('layout/navbar'); ?>
    <main>
        <!-- slider Area Start-->
        <div class="slider-area  slider-height" data-background="assets/img/hero/out.png">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider">
                    <div class="slider-cap-wrapper">
                        <div class="hero__img">
                            <img src="assets/img/hero/chart.jpg" alt="" data-animation="fadeInRight" data-transition-duration="5s">
                        </div>
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay=".4s">Chart</h1>
                            <p data-animation="fadeInLeft" data-delay=".6s">Berikut merupakan Chart yang kami sediakan</p>
                            <!-- Hero Btn -->
                        </div>
                    </div>
                </div>
                <!-- Single Slider -->
            </div>
        </div>
        <table class="table table-borderless table-dark mb-0">
            <thead>
                <th>
                    <br>
                    <br>
                    <br>
                    <br>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th>
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="" placeholder="Cari Bandara" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <?php if (session()->getFlashdata('alert')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('alert'); ?>
                        </div>
                    <?php endif; ?>
                </th>
                <th>
                    <br>
                    <br>
                    <br>
                </th>
            </thead>
            <?php foreach ($chartmenu as $key => $value) { ?>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><img src="/assets/images/chart/<?= $value['foto']; ?>" class="img-fluid" width="200px" height="100px"><br><br></td>
                    <td><?= $value['icao']; ?></td>
                    <td><?= $value['bandara']; ?></td>
                    <td><a href="/chartdetail/<?= $value['slug']; ?>" type="button" class="btn btn-primary">Detail</a></td>
                </tbody>
            <?php } ?>
        </table>
    </main>
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
                                        <a href="index.html"><img src="assets/images/logo/pgic.png" alt=""></a>
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
                                        <li><a href="#">Addon</a></li>
                                        <li><a href="#">Panduan</a></li>
                                        <li><a href="/chartmenu">Chart</a></li>
                                        <li><a href="#">Flight Simulator</a></li>
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
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>