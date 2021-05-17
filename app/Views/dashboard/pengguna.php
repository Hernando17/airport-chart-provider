<?= $this->extend('templates/templates'); ?>
<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>DataTable</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                    </ol>
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
                            <a href="/Home/create" class="mb-4 btn btn-success" style="float:right; margin-right:20px;margin-top:20px;">+</a>
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>FOTO</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $k) : ?>
                                        <tr>
                                            <td>
                                                <?= $k['id']; ?>
                                            </td>
                                            <td>
                                                <?= $k['foto']; ?>
                                            </td>
                                            <td>
                                                <?= $k['username']; ?>
                                            </td>
                                            <td>
                                                <?= $k['email']; ?>
                                            </td>
                                            <td>
                                                <div class="buttons">
                                                    <a href="#" class="btn btn-success">Edit</a>
                                                    <a href="#" class="btn btn-warning">Reset</a>
                                                    <a href="#" class="btn btn-danger">Delete</a>
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