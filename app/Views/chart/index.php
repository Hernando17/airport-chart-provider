<?= $this->extend('templates/templates'); ?>
<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Chart</h3>
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
                            <a href="/Chart/create" class="mb-4 btn btn-success fas fa-user-plus" style="float:right; margin-right:20px;margin-top:20px;"></a>
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>FOTO</th>
                                        <th>ICAO</th>
                                        <th>BANDARA</th>
                                        <th>PERINTAH</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($chart as $k) : ?>
                                        <tr>
                                            <td>
                                                <?= $k['id']; ?>
                                            </td>
                                            <td>
                                                <img style="margin-left:10px;" src="/assets/images/chart/<?= $k['foto']; ?>" width="50px">
                                            </td>
                                            <td>
                                                <?= $k['icao']; ?>
                                            </td>
                                            <td>
                                                <?= $k['bandara']; ?>
                                            </td>
                                            <td>
                                                <div class="buttons">
                                                    <a href="/chart/detail/<?= $k['slug']; ?>" class="btn btn-primary fa fa-user"></a>
                                                    <form action="/chart/<?= $k['id']; ?>" method="post" class="d-inline">
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