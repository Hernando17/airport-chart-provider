<?php if (allow('master')) : ?>
    <?= $this->extend('templates/templates'); ?>
    <?= $this->section('content'); ?>

    <title><?= $title; ?></title>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mt-2">Detail Pengguna</h2>
                <div class="row g-0">
                    <div class="col-md-2.5 img-fluid">
                        <img src="<?= base_url(); ?>/assets/images/pp/<?= $user['foto']; ?>" width="200px" height="200px" alt="..." style="float:left;" class="my-4 ml-2">
                    </div>
                    <div class="col-md-8 ">
                        <div class="card-body">
                            <h5 class="card-title "><b>Nama : <?= $user['username']; ?></b></h5>
                            <p class="card-text ">Akses : <?= $user['level']; ?></p>
                            <p class="card-text ">Email : <?= $user['email']; ?></p>
                            <p class="card-text "><small class="text-muted">Waktu Bergabung : <?= $user['created_at']; ?></small></p>
                            <p class="card-text "><small class="text-muted">Update Terakhir : <?= $user['updated_at']; ?></small></p>
                            <a href="/dashboard/pengguna" class="btn btn-primary fas fa-chevron-circle-left"> Kembali</a>
                            <a href="/dashboard/detail/edit/<?= $user['slug']; ?>" class="btn btn-success fa fa-edit"> Ubah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>
<?php endif; ?>