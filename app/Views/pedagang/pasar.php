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
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-map-marked"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Pasar</span>
                            <span class="info-box-number"><?= $namapasar ?></span>
                        </div>

                    </div>

                </div>
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
                                                        <button class="dropdown-item" data-toggle="modal" data-target="#modalDetailPedagang" data-no_pasar="<?= $p['nama_pasar'] ?>" data-no_blok="<?= $p['nama_blok'] ?>" data-id_klasifikasi="<?= $p['klasifikasi'] ?>" data-nama_pedagang="<?= $p['nama_pedagang'] ?>" data-jk="<?= $p['jk'] ?>" data-agama="<?= $p['agama'] ?>" data-no_hp="<?= $p['no_hp'] ?>" data-ukuran="<?= $p['ukuran'] ?>" data-alamat="<?= $p['alamat'] ?>" data-jenis_usaha="<?= $p['jenis_usaha'] ?>" data-sertifikat="<?= $p['sertifikat'] ?>" data-keterangan="<?= $p['keterangan'] ?>" id="select">Detail</>
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
                                                        <form action="<?= base_url() ?>/pedagang/update/<?= $p['id_pedagang'] ?>" method="post">
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
                                                                        <label for="jk">Jenis Kelamin</label>
                                                                        <select class="form-control" id="jk" name="jk">
                                                                            <option value="<?= $p['jk'] ?>"><?= $p['jk'] ?></option>
                                                                            <option value="Laki-laki">Laki-laki</option>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $p['alamat'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">


                                                                    <div class="form-group">
                                                                        <label for="agama">Agama</label>
                                                                        <input type="text" class="form-control" id="agama" name="agama" value="<?= $p['agama'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_hp">Telepon</label>
                                                                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $p['no_hp'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jenis_usaha">Jenis Usaha</label>
                                                                        <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" value="<?= $p['jenis_usaha'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="sertifikat">Sertifikat</label>
                                                                        <input type="text" class="form-control" id="sertifikat" name="sertifikat" value="<?= $p['sertifikat'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="ukuran">Ukuran</label>
                                                                        <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?= $p['ukuran'] ?>">
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
    });
</script>
<?= $this->endSection() ?>