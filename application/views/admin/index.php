<!-- Begin Page Content  -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
       <!--  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak laporan</a> -->
    </div>
<?php 
// $hariIni = new DateTime();
// echo $hariIni->format('F Y');
 ?>
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly) <small><b><?php 
                            $hariIni = new DateTime();
                            echo $hariIni->format('F Y');
                             ?></b></small></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">IDR <?= number_format($bln['jml_byr'],0,".",".") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual) - <b><?= date('Y'); ?></b></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">IDR <?= number_format($jml['jml_byr'],0,".",".") ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pay Status</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">70%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pay Status Tahun <?= date("Y") ?></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    <span class="badge badge-success">Lunas : <?= $lns ?> &nbsp; Transaksi</span>
                                    <br>
                                    <span class="badge badge-danger">Belum Lunas : <?= $bl ?> &nbsp; Transaksi</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-success text-white">
            <h6 class="text-center"><b>Cetak Laporan Bulanan dan Tahunan</b></h6>
        </div>
        <div class="card-body">
            <div id="flashdata" onload="clearme();">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <span class="badge badge-info">Cetak Laporan Bulanan</span>
                                    <br>
                                    <form action="<?= base_url('cetak_laporan_bulanan'); ?>" method="post" target="blank_">
                                        <div class="form-group">
                                            <label>Pilih Bulan : </label>
                                            <select name="bulan" class="form-control" required> 
                                                <option selected disabled>- PILIH BULAN -</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                        <?= form_error('bulan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <div class="form-group">
                                            <label>Pilih Tahun : </label>
                                            <select name="tahun" class="form-control" required>
                                                <option selected disabled>- PILIH Tahun -</option>
                                                <?php
                                                    for($i=date('Y'); $i>=date('Y')-20; $i-=1){
                                                    echo"<option value='$i'> $i </option>";
                                                    }
                                                ?>
                                            </select>
                                        </div><?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>

                                        <button class="btn btn-primary btn-sm"><i class="fas fa-print"></i>&nbsp;Cetak Laporan Bulanan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <span class="badge badge-info">Cetak Laporan Tahunan</span>
                                    <br>
                                    <form action="<?= base_url('cetak_laporan_tahunan'); ?>" method="post" target="blank_">
                                        <div class="form-group">
                                            <label>Pilih Tahun : </label>
                                            <select name="tahun" class="form-control">
                                                <option selected disabled>- PILIH Tahun -</option>
                                                <?php
                                                    for($i=date('Y'); $i>=date('Y')-20; $i-=1){
                                                    echo"<option value='$i'> $i </option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-print"></i>&nbsp;Cetak Laporan Tahunan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
      <!--   <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
         
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Pie Chart -->
        <!-- <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
     
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Lunas
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Bayar Setengah
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Belum Lunas
                        </span>
                    </div>
                </div> -->
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content