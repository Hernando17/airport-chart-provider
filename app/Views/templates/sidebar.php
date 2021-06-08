<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="/dashboard/index"><img src="/assets/images/logo/pgic1.png" width="150px" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                    <a href="/dashboard/index" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                <li class="sidebar-title">Basis Data</li>
                <?php if (allow('master')) : ?>
                    <li class="sidebar-item">
                        <a href="/dashboard/pengguna" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>Data Pengguna</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="sidebar-item  ">
                    <a href="/chart/index" class='sidebar-link'>
                        <i class="bi bi-newspaper"></i>
                        <span>Data Chart</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>