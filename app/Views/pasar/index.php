<?= $this->extend('layout/template') ?>

<?= $this->Section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pasar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pasar</li>
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
                            <h3 class="card-title">Data Pasar</h3>
                            <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modalTambahPasar"><i class="fas fa-plus"></i> Tambah Data Pasar</button>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Pasar</th>
                                        <th>Nama Pasar</th>
                                        <th>Alamat Pasar</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pasar as $p) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><a href="/pedagang/pasar/<?= $p['no_pasar'] ?>"><?= $p['no_pasar'] ?></a></td>
                                            <td><a href="/pedagang/pasar/<?= $p['no_pasar'] ?>"><?= $p['nama_pasar'] ?></a></td>
                                            <td><?= $p['alamat_pasar'] ?></td>
                                            <td>
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


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
    <div class="modal fade" id="modalTambahPasar" tabindex="-1" role="dialog" aria-labelledby="modalTambahPasarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahPasarLabel">Tambah Data Pasar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="pasar/store/" method="post">
                    <div class="modal-body">
                        <!-- Isi form tambah data pasar di sini -->
                        <!-- Contoh: -->
                        <div class="form-group">
                            <label for="nomor_pasar">Nomor Pasar</label>
                            <input type="text" class="form-control" id="nomor_pasar">
                        </div>
                        <div class="form-group">
                            <label for="nama_pasar">Nama Pasar</label>
                            <input type="text" class="form-control" id="nama_pasar">
                        </div>
                        <div class="form-group">
                            <label for="alamat_pasar">Alamat Pasar</label>
                            <input type="text" class="form-control" id="alamat_pasar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnSimpanPasar">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?php if (session()->getFlashdata('error')) : ?>
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