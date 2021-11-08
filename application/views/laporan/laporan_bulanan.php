<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <title><?= $title; ?></title>

    <link href="<?= 'assets/logo/logo-sdit.png';?>" rel="shortcut icon" type="image/png">

    <!-- Custom fonts for this template-->
    <link href="<?= 'assets/vendor/fontawesome-free/css/all.min.css';?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
   <link href="<?= 'assets/css/sb-admin-2.min.css'; ?>" rel="stylesheet"> 
    <link href="<?= 'assets/vendor/datatables/dataTables.bootstrap4.min.css';?>" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css"> -->
</head>
<body>

<style type="text/css">
	th{
		text-align: center;
		vertical-align: middle;
	}
	td{
		text-align: center;
		vertical-align: middle;
	}

	.header{
		display: flex;
	}

	.text-kop{
		text-align: center;
		color: black;
	}

	table{
		margin-top: -120px;
	}
	.bwh{
		text-align: right;
	}
</style>

<section>
		<div class="row">
			<div class="col-lg-12">
				<div class="header mb-n5">
					<div class="row">
						<div class="col-md-3 ml-n2">
							 <img src="<?=  'assets/logo/logo-sdit.png'; ?>" alt="logo-image" class="img-circle" width="150px">
						</div>
						<div class="col-md-9 mt-5 text-dark">
							<div class="text-kop">
								<h3 class="ml-4"><b>Laporan Bulanan</b></h3>
								<h4><b>SD Islam Terpadu Al Islamiyah</b></h4>
								<h5><b>Karang Bener Bae Kudus</b></h5>
							</div>
						</div>
					</div>
				</div>

				<div class="table-responsive mt-n5">
					<table class="table table-bordered" border="1">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Siswa</th>
								<th>Bulan</th>
								<th>Tahun</th>
								<th>Jumlah Pembayaran</th>
								<th>Sisa Pembayaran</th>
								<th>Status Bayar</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($laporan_bulanan as $data) { ?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?= $data->nama_siswa ?></td>
								<td>
									<?php
										if($data->bulan_bayar == '01'){
											 $bln = 'Januari';
										} else if($data->bulan_bayar == '02'){
											 $bln = 'Februari';
										} else if($data->bulan_bayar == '03'){
											 $bln = 'Maret';
										} else if($data->bulan_bayar == '04'){
											 $bln = 'April';
										} else if($data->bulan_bayar == '05'){
											 $bln = 'Mei';
										} else if($data->bulan_bayar == '06'){
											 $bln = 'Juni';
										} else if($data->bulan_bayar == '07'){
											 $bln = 'Juli';
										} else if($data->bulan_bayar == '08'){
											 $bln = 'Agustus';
										} else if($data->bulan_bayar == '09'){
											 $bln = 'September';
										} else if($data->bulan_bayar == '10'){
											echo $bln = 'Oktober';
										} else if($data->bulan_bayar == '11'){
											 $bln = 'November';
										} else if($data->bulan_bayar == '12'){
											 $bln = 'Desember';
										}
										echo $bln;
									?>	
								</td>
								<td><?= $data->tahun_bayar ?></td>
								<td>Rp. <?= number_format($data->jmlh_bayar,0,".","." )?></td>
								<td>Rp. <?= number_format($data->sisa,0,".","." )?></td>
								<td><?= $data->status ?></td>
							</tr>
							<?php $no++; } ?>
							<tr>
								<td colspan="4"><b>Total</b></td>
								<td><b>Rp. <?= number_format($jmll['jml_byr'],0,".","." )?></b></td>
								<td><b>Rp. <?= number_format($tgk['tunggak'],0,".","." )?></b></td>
								<td class="text-center">-</td>
							</tr>

						</tbody>
					</table>
				</div>
				<div class="bwh">
					<p><b>Kudus, <?php $hariIni = new DateTime(); echo $hariIni->format('d F Y'); ?></b></p>
				</div>
			</div>
		</div>

</section>


<!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
 <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
</body>
</html>