<?= $this->extend('templates/templates'); ?>
<?= $this->section('content'); ?>


<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Ubah Data</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <form action="/Chart/update/<?= $chart['id']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="slug" value="<?= $chart['slug']; ?>">
                        <input type="hidden" name="fotoLama" value="<?= $chart['foto']; ?>">
                        <input type="hidden" name="fileLama" value="<?= $chart['file']; ?>">

                        <br>
                        <br>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl <?= ($validation->hasError('icao')) ? 'is-invalid' : ''; ?>" id="icao placeholder=" ICAO" name="icao" value="<?= (old('icao')) ? old('icao') : $chart['icao']; ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl <?= ($validation->hasError('bandara')) ? 'is-invalid' : ''; ?>" id="bandara" placeholder="Bandara" name="bandara" value="<?= (old('bandara')) ? old('bandara') : $chart['bandara']; ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" placeholder="Keterangan" name="keterangan" value="<?= (old('keterangan')) ? old('keterangan') : $chart['keterangan']; ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <i>Foto<input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto"></i>
                        <i>File<input class="form-control <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" type="file" id="file" name="file"></i>

                        <button type=" submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Ubah</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>
</body>
<?= $this->endSection(); ?>