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
                            <?php if ($namapasar != null) { ?>
                                <h3 class="card-title">Data Pedagang - <b>Pasar <?= $namapasar ?></b></h3>
                            <?php } else { ?>
                                <h3 class="card-title">Data Pedagang - <b>Pasar Tidak Di Temukan</b></h3>
                            <?php } ?>
                            <button class="btn btn-sm btn-secondary ml-auto" onclick="history.back()">Kembali</button>
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
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>