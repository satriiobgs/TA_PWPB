<body class="hold-transition register-page" >
    <div class="register-box">
        <div class="register-logo">
            <a href="<?= base_url('auth/registration'); ?>"><b>Meteor</b>Cell</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Buat Akun</p>

                <form action="<?= base_url('auth/registration'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input id="username" name="username" type="text" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password1" name="password1" type="password" class="form-control" placeholder="Password">
                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password2" name="password2" type="password" class="form-control" placeholder="Retype password">
                        <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="<?= base_url('auth'); ?>" class="btn btn-block btn-primary">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sudah Memliki Akun?
                    </a>
                </div>
            </div>
        </div>
    </div>