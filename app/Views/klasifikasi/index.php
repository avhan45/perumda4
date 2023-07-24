<?= $this->extend('layout/template') ?>

<?= $this->Section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Klasifikasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Klasifikasi</li>
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
                            <h3 class="card-title">Data Klasifikasi</h3>
                            <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modalTambahKlasifikasi"><i class="fas fa-plus"></i> Tambah Data Klasifikasi</button>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Klasifikasi</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($klasifikasi as $p) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p['klasifikasi'] ?></td>
                                            <td class="d-flex">
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal<?= $p['id_klasifikasi'] ?>"><i class="fas fa-edit"></i></button>
                                                <form action="klasifikasi/delete/<?= $p['id_klasifikasi'] ?>" method="post" class="pl-2">
                                                    <?= csrf_field() ?>
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <div class="fas fa-trash"></div>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal<?= $p['id_klasifikasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="/klasifikasi/update/<?= $p['id_klasifikasi'] ?>" method="post" method="post">
                                                        <?= csrf_field() ?>
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Data Klasifikasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="klasifikasi">Klasifikasi</label>
                                                                <input type="text" class="form-control" id="klasifikasi" name="klasifikasi" value="<?= $p['klasifikasi'] ?>">
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
    <div class="modal fade" id="modalTambahKlasifikasi" tabindex="-1" role="dialog" aria-labelledby="modalTambahKlasifikasiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahKlasifikasiLabel">Tambah Data Klasifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="klasifikasi/store/" method="post">
                    <?= csrf_field() ?>

                    <div class="modal-body">
                        <!-- Isi form tambah data pasar di sini -->
                        <!-- Contoh: -->
                        <div class="form-group">
                            <label for="klasifikasi">Klasifikasi</label>
                            <input type="text" class="form-control" id="klasifikasi" name="klasifikasi">
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