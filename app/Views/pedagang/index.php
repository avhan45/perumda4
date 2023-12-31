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
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Pedagang</span>
                            <span class="info-box-number"><?= $jumlah_pedagang_per_Pasar ?></span>
                        </div>

                    </div>

                </div>


            </div>
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
                            <a href="pedagang/laporan/" class="btn btn-sm btn-default ml-auto"><i class="fas fa-print"></i> Cetak</a>
                            <button class="btn btn-sm btn-primary ml-auto" data-toggle="modal" data-target="#modalTambahPedagang"><i class="fas fa-plus"></i> Tambah Data</button>
                        </div>
                        <div class="card-body table-responsive">
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
                                            <td>
                                                <span class="badge badge-info" id="openSert" data-toggle="modal" data-target="#modalSertifikat<?= $p['id_pedagang'] ?>" data-no_pasar="<?= $p['nama_pasar'] ?>" data-no_blok="<?= $p['nama_blok'] ?>" data-id_klasifikasi="<?= $p['klasifikasi'] ?>" data-nama_pedagang="<?= $p['nama_pedagang'] ?>" data-jk="<?= $p['jk'] ?>" data-agama="<?= $p['agama'] ?>" data-no_hp="<?= $p['no_hp'] ?>" data-ukuran="<?= $p['ukuran'] ?>" data-alamat="<?= $p['alamat'] ?>" data-jenis_usaha="<?= $p['jenis_usaha'] ?>" data-sertifikat="<?= $p['no_sertifikat'] ?>" data-keterangan="<?= $p['keterangan'] ?>" style="cursor: pointer;">
                                                    <?= $p['no_sertifikat'] ?>
                                                </span>

                                            </td>
                                            <td><?= $p['keterangan'] ?></td>
                                            <td>
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
                                                        Aksi
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" data-toggle="modal" data-target="#modalDetailPedagang" data-no_pasar="<?= $p['nama_pasar'] ?>" data-no_blok="<?= $p['nama_blok'] ?>" data-id_klasifikasi="<?= $p['klasifikasi'] ?>" data-nama_pedagang="<?= $p['nama_pedagang'] ?>" data-jk="<?= $p['jk'] ?>" data-agama="<?= $p['agama'] ?>" data-no_hp="<?= $p['no_hp'] ?>" data-ukuran="<?= $p['ukuran'] ?>" data-alamat="<?= $p['alamat'] ?>" data-jenis_usaha="<?= $p['jenis_usaha'] ?>" data-sertifikat="<?= $p['no_sertifikat'] ?>" data-keterangan="<?= $p['keterangan'] ?>" id="select">Detail</>
                                                            <button class="dropdown-item" data-toggle="modal" data-target="#modalEditPedagang<?= $p['id_pedagang'] ?>">Edit</button>
                                                            <form action="pedagang/delete/<?= $p['id_pedagang'] ?>" method="post">
                                                                <?= csrf_field() ?>
                                                                <button class="dropdown-item" type="submit">Delete</button>

                                                            </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Edit Data Pedagang Modal -->
                                        <div class="modal fade" id="modalEditPedagang<?= $p['id_pedagang'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditPedagangLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditPedagangLabel">Edit Data Pedagang</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="pedagang/update/<?= $p['id_pedagang'] ?>" method="post" enctype="multipart/form-data">
                                                            <?= csrf_field() ?>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <!-- Form untuk menambah data pedagang -->
                                                                    <div class="form-group">
                                                                        <label for="nama_pasar">Pasar</label>
                                                                        <select class="form-control select2" id="nama_pasar" name="nama_pasar" style="width: 100%;">
                                                                            <!-- Tampilkan pilihan pasar dari database jika ada -->
                                                                            <option value="<?= $p['no_pasar'] ?>"><?= $p['nama_pasar'] ?></option>
                                                                            <?php foreach ($daftar_pasar as $pasar) : ?>
                                                                                <option value="<?= $pasar['no_pasar'] ?>"><?= $pasar['nama_pasar'] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_blok">Blok</label>
                                                                        <select class="form-control select2" id="nama_blok" name="nama_blok" style="width: 100%;">
                                                                            <!-- Tampilkan pilihan pasar dari database jika ada -->
                                                                            <option value="<?= $p['no_blok'] ?>"><?= $p['nama_blok'] . '-' . $p['no_blok'] ?></option>
                                                                            <?php foreach ($daftar_blok as $blok) : ?>
                                                                                <option value="<?= $blok['no_blok'] ?>"><?= $blok['nama_blok'] . '-' . $blok['no_blok'] ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="klasifikasi">Klasifikasi</label>
                                                                        <select class="form-control select2" id="klasifikasi" name="klasifikasi" style="width: 100%;">
                                                                            <!-- Tampilkan pilihan pasar dari database jika ada -->
                                                                            <option value="<?= $p['id_klasifikasi'] ?>"><?= $p['klasifikasi'] ?></option>
                                                                            <?php foreach ($daftar_klasifikasi as $kl) : ?>
                                                                                <option value="<?= $kl['id_klasifikasi'] ?>"><?= $kl['klasifikasi']  ?></option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_pedagang">Nama Pedagang</label>
                                                                        <input type="text" class="form-control" id="nama_pedagang" name="nama_pedagang" value="<?= $p['nama_pedagang'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="ktp">KTP</label>
                                                                        <!-- <input type="file" class="form-control" id="ktp" name="ktp"> -->
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="ktp" name="ktp" value="<?= $p['ktp'] ?>">
                                                                                <label class="custom-file-label" for="ktp">Upload KTP</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jk">Jenis Kelamin</label>
                                                                        <select class="form-control" id="jk" name="jk">
                                                                            <option value="<?= $p['jk'] ?>"><?= $p['jk'] ?></option>
                                                                            <option value="Laki-laki">Laki-laki</option>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="agama">Agama</label>
                                                                        <input type="text" class="form-control" id="agama" name="agama" value="<?= $p['agama'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">

                                                                    <div class="form-group">
                                                                        <label for="no_hp">Telepon</label>
                                                                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $p['no_hp'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jenis_usaha">Jenis Usaha</label>
                                                                        <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" value="<?= $p['jenis_usaha'] ?>">
                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-md-6">

                                                                            <div class="form-group">
                                                                                <label for="sertifikat">Nomor Sertifikat</label>
                                                                                <!-- <input type="file" class="form-control" id="sertifikat" name="sertifikat"> -->
                                                                                <input type="text" class="form-control" id="no_sertifikat" name="no_sertifikat" value="<?= $p['no_sertifikat'] ?>">
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">

                                                                            <div class="form-group">
                                                                                <label for="sertifikat">Sertifikat</label>
                                                                                <!-- <input type="file" class="form-control" id="sertifikat" name="sertifikat"> -->
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" id="sertifikat" name="sertifikat" value="<?= $p['image'] ?>">
                                                                                        <label class="custom-file-label" for="sertifikat">Upload Sertifikat</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="ukuran">Ukuran</label>
                                                                        <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?= $p['ukuran'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $p['alamat'] ?></textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="keterangan">Keterangan</label>
                                                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $p['keterangan'] ?></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Detail Sertifikat -->
                                        <div class="modal fade" id="modalSertifikat<?= $p['id_pedagang'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Isi modal -->
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">

                                                            <div class="card card-widget widget-user shadow">

                                                                <div class="widget-user-header bg-info">
                                                                    <h3 class="widget-user-username" id="nama" style="font-weight: 800;"><?= $p['nama_pedagang'] ?></h3>
                                                                    <!-- <h5 class="widget-user-desc" id="nama">Founder &amp; CEO</h5> -->
                                                                </div>
                                                                <div class="widget-user-image">
                                                                    <a href="<?= base_url() ?>uploads/<?= $p['ktp'] ?>" class="modal-image" target="_blank">
                                                                        <img class="img-circle elevation-2" src="<?= base_url() ?>uploads/<?= $p['ktp'] ?>" alt="KTP" width="120" height="75">
                                                                    </a>
                                                                    <!-- <a target="_blank" href="<?= base_url() ?>uploads/<?= $p['ktp'] ?>">
                                                                    </a> -->
                                                                </div>
                                                                <div class="card-footer">
                                                                    <div class="row">
                                                                        <div class="col-sm-4 border-right">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header"><?= $p['nama_pasar'] ?></h5>
                                                                                <span class="description-text">Pasar</span>
                                                                            </div>

                                                                        </div>

                                                                        <div class="col-sm-4 border-right">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header"><?= $p['no_sertifikat'] ?></h5>
                                                                                <span class="description-text">No. Sertifikat</span>
                                                                            </div>

                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <div class="description-block">
                                                                                <h5 class="description-header"><?= $p['jenis_usaha'] ?></h5>
                                                                                <span class="description-text">Jenis Usaha</span>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer" style="justify-content: center;">
                                                        <div class="text-center">
                                                            <h3 class="text-center" style="font-weight: bold;">SERTIFIKAT</h3>
                                                        </div>
                                                        <a class="modal-image" target="_blank" href="<?= base_url() ?>sertifikat/<?= $p['image'] ?>">
                                                            <img src="<?= base_url() ?>sertifikat/<?= $p['image'] ?>" alt="sertifikat" width="100%" height="200">
                                                        </a>
                                                    </div>

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
                    <form action="pedagang/store/" method="post" enctype="multipart/form-data">
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
                                    <label for="ktp">KTP</label>
                                    <!-- <input type="file" class="form-control" id="ktp" name="ktp"> -->
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="ktp" name="ktp">
                                            <label class="custom-file-label" for="ktp">Upload KTP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="form-control" id="jk" name="jk" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" id="agama" name="agama">
                                </div>
                            </div>
                            <div class="col-md-6">



                                <div class="form-group">
                                    <label for="no_hp">Telepon</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_usaha">Jenis Usaha</label>
                                    <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha">
                                </div>
                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="sertifikat">Nomor Sertifikat</label>
                                            <!-- <input type="file" class="form-control" id="sertifikat" name="sertifikat"> -->
                                            <input type="text" class="form-control" id="no_sertifikat" name="no_sertifikat">
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="sertifikat">Sertifikat</label>
                                            <!-- <input type="file" class="form-control" id="sertifikat" name="sertifikat"> -->
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="sertifikat" name="sertifikat">
                                                    <label class="custom-file-label" for="sertifikat">Upload Sertifikat</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ukuran">Ukuran</label>
                                    <input type="text" class="form-control" id="ukuran" name="ukuran">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
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

    <!-- Detail Data Pedagang Modal -->
    <div class="modal fade" id="modalDetailPedagang" tabindex="-1" role="dialog" aria-labelledby="modalDetailPedagangLabel" aria-hidden="true">
        <div class=" modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailPedagangLabel">Detail Data Pedagang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="myTable">
                        <tbody>
                            <tr>
                                <th>Nama Pasar</th>
                                <td><span id="noPasar"></span></td>
                            </tr>
                            <tr>
                                <th>Nomor Blok</th>
                                <td><span id="noBlok"></span></td>
                            </tr>
                            <tr>
                                <th>klasifikasi</th>
                                <td><span id="idKlasifikasi"></span></td>
                            </tr>
                            <tr>
                                <th>Nama Pedagang</th>
                                <td><span id="namaPedagang"></span></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><span id="jeniskel"></span></td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td><span id="agamaVal"></span></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><span id="hp"></span></td>
                            </tr>
                            <tr>
                                <th>Ukuran</th>
                                <td><span id="ukuranVal"></span></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><span id="valAlamat"></span></td>
                            </tr>
                            <tr>
                                <th>Jenis Usaha</th>
                                <td><span id="usaha"></span></td>
                            </tr>
                            <tr>
                                <th>Sertifikat</th>
                                <td><span id="sertifikatVal"></span></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td><span id="keteranganVal"></span></td>
                            </tr>
                        </tbody>
                    </table>
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

<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var no_pasar = $(this).data('no_pasar');
            var no_blok = $(this).data('no_blok');
            var id_klasifikasi = $(this).data('id_klasifikasi');
            var nama_pedagang = $(this).data('nama_pedagang');
            var jk = $(this).data('jk');
            var agama = $(this).data('agama');
            var no_hp = $(this).data('no_hp');
            var ukuran = $(this).data('ukuran');
            var alamat = $(this).data('alamat');
            var jenis_usaha = $(this).data('jenis_usaha');
            var sertifikat = $(this).data('sertifikat');
            var keterangan = $(this).data('keterangan');

            $("#noPasar").text(no_pasar); // Use .text() instead of .val()
            $("#noBlok").text(no_blok);
            $("#idKlasifikasi").text(id_klasifikasi);
            $("#namaPedagang").text(nama_pedagang);
            $("#jeniskel").text(jk);
            $("#agamaVal").text(agama);
            $("#hp").text(no_hp);
            $("#ukuranVal").text(ukuran);
            $("#valAlamat").text(alamat);
            $("#usaha").text(jenis_usaha);
            $("#sertifikatVal").text(sertifikat);
            $("#keteranganVal").text(keterangan);
            // $("modalDetailPedagang").
        });
        $('#myTable th').css('width', '35%');
        $(document).on('click', '#openSert', function() {
            $('#modalSertifikat').modal('show')

        });
    });
</script>
<?= $this->endSection() ?>