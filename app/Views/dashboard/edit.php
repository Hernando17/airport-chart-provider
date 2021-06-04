<?= $this->extend('templates/templates'); ?>
<?= $this->section('content'); ?>


<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Ubah Data Pengguna</h1>
                    <p class="auth-subtitle mb-5">Masukkan Data Pengguna Baru</p>

                    <form action="/Dashboard/update/<?= $user['id']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="slug" value="<?= $user['slug']; ?>">
                        <input type="hidden" name="fotoLama" value="<?= $user['foto']; ?>">

                        <select name="level" id="">
                            <option hidden value="<?= (old('level')) ? old('level') : $user['level']; ?>"><?= $user['level']; ?></option>
                            <option value="master">Master</option>
                            <option value="admin">Admin</option>
                        </select></i>
                        <br>
                        <br>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" placeholder="Nama" name="username" value="<?= (old('username')) ? old('username') : $user['username']; ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email" name="email" value="<?= (old('email')) ? old('email') : $user['email']; ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>

                        <i><input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto"></i>

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