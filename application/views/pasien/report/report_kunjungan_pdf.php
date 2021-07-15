<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan kunjungan</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css') ?>">
	<style type="text/css">
		td{
			padding: 10px
		}
		.header{
			font-family: serif;
			text-align: center;
			margin-bottom: 50px;
		}
	</style>
</head>
<body>
	
	<div class="container">
		<h1 class="header">
			Daftar Riwayat kunjungan pasien
		</h1>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<table>
					<tr>
						<td>Tanggal </td><td>: </td><td><?= $_GET['day'] ?></td>
					</tr>
					<tr>
						<td>Bulan </td><td>: </td><td><?= $_GET['month'] ?></td>
					</tr>
					<tr>
						<td>Tahun </td><td>: </td><td><?= $_GET['year'] ?></td>
					</tr>

				</table>
			</div>
		</div>
		<div class="row justify-content-center">
			

			<div class="col-md-10">
				<table border="1px solid black">
					<tr>
						<td>NO</td>
						<td>Hari</td>
						<td>Tanggal</td>
						<td>Bulan</td>
						<td>Tahun</td>
						<td>Rincian biaya</td>
						<td>Total</td>
					</tr>
					<?php $i = 1; foreach($pdf as $key) { ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $key["Hari"] ?></td>
							<td><?= $key["Tanggal"] ?></td>
							<td><?= $key["Bulan"] ?></td>
							<td><?= $key["Tahun"] ?></td>
							<td><?= $key["Tagihan"] ?></td>
							<td><?= $key["Total"] ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>