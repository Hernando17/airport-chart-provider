<?= $this->extend('templates/templates'); ?>
<?= $this->section('content'); ?>


<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Ubah Kata Sandi</h1>
                    <p class="auth-subtitle mb-5">Masukkan Kata Sandi Baru</p>

                    <form action="/Dashboard/updatepassword/<?= $user['id']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="slug" value="<?= $user['slug']; ?>">
                        <input type="hidden" name="fotoLama" value="<?= $user['foto']; ?>">

                        <br>
                        <br>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Kata Sandi" name="password" value="">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>


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