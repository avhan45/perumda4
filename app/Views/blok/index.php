<?= $this->extend('layout/template') ?>

<?= $this->Section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Blok</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Blok</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->


    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h3 class="card-title">Data Blok</h3>
                            <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modalTambahBlok"><i class="fas fa-plus"></i> Tambah Data Blok</button>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Blok</th>
                                        <th>Blok</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($blok as $p) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p['no_blok'] ?></td>
                                            <td><?= $p['nama_blok'] ?></td>
                                            <td>
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <!-- <a class="dropdown-item" href="#">Edit</a> -->
                                                        <button class="dropdown-item" data-toggle="modal" data-target="#editModal<?= $p['no_blok'] ?>">Edit</button>
                                                        <form action="blok/delete/<?= $p['no_blok'] ?>" method="post">
                                                            <button class="dropdown-item" type="submit">Delete</button>
                                                            <!-- <a class="dropdown-item" href="#">Delete</a> -->
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal<?= $p['no_blok'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="/blok/update/<?= $p['no_blok'] ?>" method="post" method="post">
                                                        <?= csrf_field() ?>
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Data Blok</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="no_blok">No Blok</label>
                                                                <input type="text" class="form-control" id="no_blok" name="no_blok" value="<?= $p['no_blok'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_blok">Nama Blok</label>
                                                                <input type="text" class="form-control" id="nama_blok" name="nama_blok" value="<?= $p['nama_blok'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal Tambah Data Pasar -->
    <div class="modal fade" id="modalTambahBlok" tabindex="-1" role="dialog" aria-labelledby="modalTambahBlokLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahBlokLabel">Tambah Data Blok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="blok/store/" method="post">
                    <?= csrf_field() ?>

                    <div class="modal-body">
                        <!-- Isi form tambah data pasar di sini -->
                        <!-- Contoh: -->
                        <div class="form-group">
                            <label for="nomor_blok">Nomor Blok</label>
                            <input type="text" class="form-control" id="nomor_blok" name="no_blok">
                        </div>
                        <div class="form-group">
                            <label for="nama_blok">Nama Blok</label>
                            <input type="text" class="form-control" id="nama_blok" name="nama_blok">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnSimpanBlok">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?php if (session()->getFlashdata('success')) : ?>
    <script>
        var errorToast = '<?= session()->getFlashdata("success") ?>';
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'success',
            title: errorToast
        });
    </script>
<?php elseif ((session()->getFlashdata('error'))) : ?>
    <script>
        var errorToast = '<?= session()->getFlashdata("error") ?>';
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'error',
            title: errorToast
        });
    </script>
<?php endif; ?>
<?= $this->endSection() ?>