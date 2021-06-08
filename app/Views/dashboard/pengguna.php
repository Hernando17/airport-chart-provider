<?php if (allow('master')) : ?>
    <?= $this->extend('templates/templates'); ?>
    <?= $this->section('content'); ?>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Pengguna</h3>
                    <p class="text-subtitle text-muted">Database MySQL</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="table-responsive">
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('alert')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('alert'); ?>
                                    </div>
                                <?php endif; ?>
                                <a href="/Dashboard/create" class="mb-4 btn btn-success fas fa-user-plus" style="float:right; margin-right:20px;margin-top:20px;"></a>
                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" class="" placeholder="Cari Pengguna" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" style="margin-left:20px;">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>FOTO</th>
                                            <th>AKSES</th>
                                            <th>NAMA</th>
                                            <th>EMAIL</th>
                                            <th>PERINTAH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user as $k) : ?>
                                            <tr>
                                                <td>
                                                    <?= $k['id']; ?>
                                                </td>
                                                <td>
                                                    <img class="rounded-circle" style="margin-left:10px;" src="/assets/images/pp/<?= $k['foto']; ?>" width="50px">
                                                </td>
                                                <td>
                                                    <?= $k['level']; ?>
                                                </td>
                                                <td>
                                                    <?= $k['username']; ?>
                                                </td>
                                                <td>
                                                    <?= $k['email']; ?>
                                                </td>
                                                <td>
                                                    <div class="buttons">
                                                        <a href="/dashboard/detail/<?= $k['slug']; ?>" class="btn btn-primary fa fa-user"></a>
                                                        <a href="/dashboard/editpassword/<?= $k['slug']; ?>" class="btn btn-warning fas fa-key"></a>
                                                        <form action="/dashboard/<?= $k['id']; ?>" method="post" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger  fas fa-trash" onclick="return confirm('Apakah anda yakin?');"></button>
                                                        </form>
                                                </td>
                            </div>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <?= $this->endSection(); ?>
<?php endif; ?>