<?= $this->extend('templates/templates'); ?>
<?= $this->section('content'); ?>



<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Admin</h6>
                                    <h6 class="font-extrabold mb-0"><?= $tot_user; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total <br>Chart</h6>
                                    <h6 class="font-extrabold mb-0"><?= $tot_chart; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url(); ?>/assets/images/pp/<?= session()->get('foto'); ?>" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"></h5>
                            <h6 class="text-muted mb-0"><?= session()->get('username'); ?></h6>
                            <p class="text-muted mb-0"><?= session()->get('level'); ?></p>
                            <hr>
                            <a href="/auth/logout" style="margin-right: 50px;" data-toggle="modal" data-target="#logoutModal">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->endSection(); ?>