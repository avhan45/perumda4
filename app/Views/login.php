<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perumda Pasar | Kota Kendari</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('asset') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('asset') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h2"><b>Perumda Pasar</b><br><span>Kota Kendari</span></a>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('error')) : ?>
                    <p class="login-box-msg" style="color: red;"><?= session()->getFlashdata('error') ?></p>
                <?php endif; ?>

                <?php if (!session()->get('user_id') || !session()->get('role')) : ?>
                    <form action="/login" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="username" name="username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-users"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <button type="button" id="lihat" class="btn btn-default btn-xs "><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">

                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                <?php else : ?>
                    <p>Anda Telah Login Sebagai <?= session()->get('role') ?>.</p>
                <?php endif; ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- jQuery -->
        <script src="<?= base_url('asset') ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('asset') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('asset') ?>/dist/js/adminlte.min.js"></script>

        <script>
            const lihatButton = document.getElementById("lihat");
            const passwordInput = document.getElementById("password");

            lihatButton.addEventListener("click", () => {
                passwordInput.type = passwordInput.type === "password" ? "text" : "password";
            });
        </script>
</body>

</html>