<?= $this->extend('templates/templates'); ?>
<?= $this->section('content'); ?>


<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Tambah Pengguna Baru</h1>
                    <p class="auth-subtitle mb-5">Masukkan Data</p>

                    <form action="/Chart/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <br>
                        <br>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl <?= ($validation->hasError('icao')) ? 'is-invalid' : ''; ?>" placeholder="ICAO" name="icao" autofocus value="<?= old('icao'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl <?= ($validation->hasError('bandara')) ? 'is-invalid' : ''; ?>" placeholder="Bandara" name="bandara" value="<?= old('bandara'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" placeholder="Keterangan" name="keterangan" value="<?= old('keterangan'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <i>Foto<input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" value="<?= old('foto'); ?>"></i>
                        <i>File <input class="form-control <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" type="file" id="file" name="file" value="<?= old('file'); ?>"></i>


                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Tambah</button>
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