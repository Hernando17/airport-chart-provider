<?= $this->extend('templates/templates'); ?>
<?= $this->section('content'); ?>

<title><?= $title; ?></title>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Chart</h2>
            <div class="row g-0">
                <div class="col-md-2.5 img-fluid">
                    <img src="<?= base_url(); ?>/assets/images/chart/<?= $chart['foto']; ?>" width="200px" height="200px" alt="..." style="float:left;" class="my-4 ml-2">
                </div>
                <div class="col-md-8 ">
                    <div class="card-body">
                        <h5 class="card-title "><b>ICAO : <?= $chart['icao']; ?></b></h5>
                        <p class="card-text ">Nama Bandara : <?= $chart['bandara']; ?></p>
                        <p class="card-text ">Keterangan : <?= $chart['keterangan']; ?></p>
                        <p class="card-text "><small class="text-muted">Waktu Upload : <?= $chart['created_at']; ?></small></p>
                        <p class="card-text "><small class="text-muted">Update Terakhir : <?= $chart['updated_at']; ?></small></p>
                        <a href="/chart/index" class="btn btn-primary fas fa-chevron-circle-left"> Kembali</a>
                        <a href="/chart/detail/edit/<?= $chart['slug']; ?>" class="btn btn-success fa fa-edit"> Ubah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>