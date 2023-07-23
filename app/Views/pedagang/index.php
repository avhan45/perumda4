<?= $this->extend('layout/template') ?>

<?= $this->Section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pedagang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pedagang</li>
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
                            <h3 class="card-title ">Data Pedagang</h3>
                            <button class="btn btn-sm btn-primary ml-auto" data-toggle="modal" data-target="#modalTambahPedagang"><i class="fas fa-plus"></i> Tambah Data</button>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pasar</th>
                                        <th>Nama Pedagang</th>
                                        <th>Jk</th>
                                        <th>Agama</th>
                                        <th>Telepon</th>
                                        <th>Usaha</th>
                                        <th>Sertifikat</th>
                                        <th>Keterangan</th>
                                        <th>#</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pedagang as $p) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $p['nama_pasar'] ?></td>
                                            <td><?= $p['nama_pedagang'] ?></td>
                                            <td><?= $p['jk'] ?></td>
                                            <td><?= $p['agama'] ?></td>
                                            <td><?= $p['no_hp'] ?></td>
                                            <td><?= $p['jenis_usaha'] ?></td>
                                            <td><?= $p['sertifikat'] ?></td>
                                            <td><?= $p['keterangan'] ?></td>
                                            <td>
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Detail</a>
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <form action="pedagang/delete/<?= $p['id_pedagang'] ?>" method="post">
                                                            <?= csrf_field() ?>
                                                            <button class="dropdown-item" type="submit">Delete</button>

                                                        </form>
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

    <!-- Tambah Data Pedagang Modal -->
    <div class="modal fade" id="modalTambahPedagang" tabindex="-1" role="dialog" aria-labelledby="modalTambahPedagangLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahPedagangLabel">Tambah Data Pedagang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="pedagang/store/" method="post">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Form untuk menambah data pedagang -->
                                <div class="form-group">
                                    <label for="nama_pasar">Pasar</label>
                                    <select class="form-control select2" id="nama_pasar" name="nama_pasar" style="width: 100%;">
                                        <!-- Tampilkan pilihan pasar dari database jika ada -->
                                        <?php foreach ($daftar_pasar as $pasar) : ?>
                                            <option value="<?= $pasar['no_pasar'] ?>"><?= $pasar['nama_pasar'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_blok">Blok</label>
                                    <select class="form-control select2" id="nama_blok" name="nama_blok" style="width: 100%;">
                                        <!-- Tampilkan pilihan pasar dari database jika ada -->
                                        <?php foreach ($daftar_blok as $blok) : ?>
                                            <option value="<?= $blok['no_blok'] ?>"><?= $blok['nama_blok'] . '-' . $blok['no_blok'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="klasifikasi">Klasifikasi</label>
                                    <select class="form-control select2" id="klasifikasi" name="klasifikasi" style="width: 100%;">
                                        <!-- Tampilkan pilihan pasar dari database jika ada -->
                                        <?php foreach ($daftar_klasifikasi as $kl) : ?>
                                            <option value="<?= $kl['id_klasifikasi'] ?>"><?= $kl['klasifikasi']  ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pedagang">Nama Pedagang</label>
                                    <input type="text" class="form-control" id="nama_pedagang" name="nama_pedagang" required>
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="form-control" id="jk" name="jk" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">


                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" id="agama" name="agama" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Telepon</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_usaha">Jenis Usaha</label>
                                    <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" required>
                                </div>
                                <div class="form-group">
                                    <label for="sertifikat">Sertifikat</label>
                                    <input type="text" class="form-control" id="sertifikat" name="sertifikat" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </div>
                        </div>
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