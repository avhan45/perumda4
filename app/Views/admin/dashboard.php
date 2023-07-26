<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <?php
                // Function to generate random hexadecimal color code
                function generateRandomColor()
                {
                    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                }
                ?>
                <?php
                $totalPasar = count($pasar); // Count the number of data items

                // Calculate the step to change the hue for each card
                $colorStep = 40 / $totalPasar;

                // Initialize the hue value
                $currentHue = 0;
                ?>

                <?php

                foreach ($pasar as $ps) : ?>
                    <?php
                    $randomColor = 'hsl(' . $currentHue . ', 100%, 50%)';

                    // Increment the hue value by the colorStep for the next card
                    $currentHue += $colorStep;
                    ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box" style="background-color: <?= $randomColor ?>">
                            <div class=" inner">
                                <h3 class="text-white"><?= $jumlah_pedagang_per_Pasar[$ps['no_pasar']] ?? 0; ?></h3>

                                <p class="text-white">Jumlah Pedagang</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?= base_url() ?>pedagang/pasar/<?= $ps['no_pasar'] ?>" class="small-box-footer">Pasar <?= $ps['nama_pasar'] ?> <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- ./col -->

                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-8 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Jumlah Data Pedagang
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                                    <canvas id="myChart" height="200"></canvas>
                                </div>
                                <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div> -->
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <section class="col-md-4 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="info-box mb-3 bg-danger">
                        <span class="info-box-icon"><i class="fas fa-calculator"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Pasar</span>
                            <span class="info-box-number"><?= $jumlah ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->

                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?= $this->endSection('content') ?>


<?= $this->section('script') ?>

<script>
    let data = <?= json_encode($pasar); ?>; // Fetch the data from PHP to JavaScript
    let jml = <?= json_encode($jmlpasar); ?>;
    let jumlahPedagangData = <?= json_encode(array_values($jumlah_pedagang_per_Pasar)); ?>;

    // // Extract the required data for the chart
    const labels = data.map(pasar => pasar.nama_pasar);
    // // const jml = data.length;
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Pedagang',
                data: jumlahPedagangData,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                borderWidth: 1
            }]
        },

        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var chart = new Chart(document.getElementById("pasarChart"), {
        type: "doughnut",
        data: {
            labels: labels,
            datasets: [{
                label: "Data Pasar",
                data: jumlahPedagangData
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<?= $this->endSection('script') ?>