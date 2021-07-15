<script type="text/javascript">
	window.print();
</script>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/main.css") ?>">
	<style type="text/css">
		h1, h4{
			font-family: serif;
		}
		.tabel td{
			padding: 10px;
		}
		.date td{
			padding-right: 20px
		}
		@media print {
			.noPrint {
				display :none;
			}
			@page {
				margin : 0;
			}
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-9">
				<h1 class="text-center">Data kunjungan pasien</h1>
				<h4 class="text-center"><?= $this->session->userdata('rs') ?></h4>
				<p class="text-center"><?= $this->session->userdata('address') ?></p>
				<hr>
				<table class="mt-5 date mb-3">
					
						<td>Tanggal </td><td> : </td><td> <?= $_GET['day'] ?></td></tr>
						<tr><td>Bulan </td><td> : </td><td> <?= $_GET['month'] ?></td></tr>
						<tr><td>Tahun </td><td> : </td><td> <?= $_GET['year'] ?></td></tr>
					
				</table>
				<table class="tabel" border="1px solid black">
					<tr>
						<td>No</td>
						<td>Nama pasien</td>
						<td>Jenis kelamin</td>
						<td>Waktu kunjungan</td>
						<td>Tagihan</td>
						<td>Total biaya</td>
					</tr>
					<?php $no = 1;foreach ($kunjungan as $key) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $key['Nama'] ?></td>
							<td><?= $key['Gender'] ?></td>
							<td><?= $key['Hari'] ?> <?= $key['Tanggal'] ?>/<?= $key['Bulan'] ?>/<?= $key['Tahun'] ?></td>
							<td><?= $key['Tagihan'] ?></td>
							<td><?= $key['Total'] ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

</body>
</html>