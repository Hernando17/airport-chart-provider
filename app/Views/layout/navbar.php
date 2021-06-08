<header>
    <!-- Header Start -->
    <div class="header-area header_area header-transparent">
        <div class="main-header">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-1 col-md-1">
                            <div class="logo">
                                <a href="index.html"><img src="<?= base_url(); ?>/assets/images/logo/pgic.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="/">Beranda</a></li>
                                        <li><a href="#">Tentang</a></li>
                                        <li><a href="#">Addon</a></li>
                                        <li><a href="#">Panduan</a></li>
                                        <li><a href="/chartmenu">Chart</a></li>
                                        <li><a href="#">Flight Simulator</a>
                                            <ul class="submenu">
                                                <li><a href="#">X-Plane 11</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Donasi</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <?php if (allow('master')) : ?>

                            <div class="col-xl-2 col-lg-3 col-md-3">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <a href="/dashboard/index" class="btn header-btn">Dasbor</a>
                                </div>
                            </div>

                        <?php endif; ?>
                        <?php if (allow('admin')) : ?>

                            <div class="col-xl-2 col-lg-3 col-md-3">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <a href="/dashboard/index" class="btn header-btn">Dasbor</a>
                                </div>
                            </div>

                        <?php endif; ?>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>