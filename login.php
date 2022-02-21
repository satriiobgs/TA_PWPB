<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url('auth'); ?>"><b>Meteor</b>Cell</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Counter</p>

                <?= $this->session->flashdata('message'); ?>

                <form action="<?= base_url('auth'); ?>" method="post">
                    <div class="input-group mb-3 ">
                        <input id="username" name="username" type="text" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block navbar-red">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- ATAU -</p>
                        <a href="<?= base_url('auth/registration'); ?> " class="btn btn-block btn-primary navbar-red">
                            <i class="fas fa-user-plus mr-2 "></i> Daftar
                        </a>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->