<?= $this->extend('templates/templates'); ?>
<?= $this->section('content'); ?>


<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Add New Account</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <form action="/Dashboard/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <select name="level" id="">
                            <option value="master">Master</option>
                            <option value="admin">Admin</option>
                        </select></i>

                        <br>
                        <br>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Username" name="username" autofocus value="<?= old('username'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Email" name="email" value="<?= old('email'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password" name="password" value="<?= old('password'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>


                        <i><input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" value="<?= old('foto'); ?>"></i>


                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Create</button>
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