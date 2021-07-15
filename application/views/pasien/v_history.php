<?php $this->load->view("pasien/includes/header")  ?>
<?php $this->load->view("pasien/includes/sidebar") ?>

<!-- Content -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
		<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-display1 icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Riwayat kunjungan | Sistem Informasi <?= $this->session->userdata("rs"); ?>
						<div class="page-title-subheading">
							<?= $this->session->userdata("address"); ?>
						</div>
					</div>
				</div>  
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-xs-6 col-xl-6">
				<div class="card mb-3 widget-content">
					<div class="widget-content-outer">
						<div class="widget-content-wrapper">
							<div class="widget-content-left">
								<div class="widget-heading">Total Kunjungan</div>
								<div class="widget-subheading">Jumlah seluruh riwayat kunjungan</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-success"><?= count($totalKunjungan) ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xs-6 col-xl-6">
				<div class="card mb-3 widget-content">
					<div class="widget-content-outer">
						<div class="widget-content-wrapper">
							<div class="widget-content-left">
								<div class="widget-heading">Bulan ini</div>
								<div class="widget-subheading">Jumlah kunjungan bulan ini</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-success"><?= count($totalBulanIni) ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">

				<div class="card mb-3 widget-chart widget-chart2 text-left w-100">
					<div class="widget-chat-wrapper-outer">
						<div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
							<canvas id="canvas"></canvas>
						</div>
					</div>
				</div>

			</div>

			<div class="col-md-6">
				<div class="card mb-3">

					<div class="card-body">
						<div class="card-title">Filter data</div>
						<div class="row" id="search">
							<div class="col-md queryDate">
								<input type="number" name="valueTanggal" class="form-control m-1" style="width: 100%">
							</div>
							<div class="col-md queryMonth">
								<input type="number" max="32" name="valueBulan" placeholder="cth:januari=1"
									class="form-control m-1" style="width: 100%">
							</div>
							<div class="col-md queryYears">
								<input type="number" max="32" name="valueTahun" class="form-control m-1"
									placeholder="cth:2021" style="width: 100%">
							</div>


							<div class="col-md">
								<button class="btn btn-primary m-1" id="searchAction">Cari</button>
							</div>

						</div>
						<button class="btn filter btn-outline-info m-1" label="daily">Hari tertentu</button>
						<button class="btn filter btn-outline-info m-1" label="yearly">Pertahun</button>
						<button class="btn filter btn-outline-info m-1" label="monthly">Perbulan</button>
						<button class="btn filter-all btn-outline-info m-1" label="all">Semua</button>
					</div>
					<div class="card-body" style="margin-top: -30px">
						<div class="card-title">Unduh laporan</div>
						<center>
							<a href="link" class="btn btn-outline-success m-1" type="submit" id="reportExcel"><i
									class="fa fa-file-excel"></i> Excel</a>
							<button class="btn btn-outline-danger m-1" id="reportPdf"><i class="fa fa-file-pdf"></i>
								Pdf</button>
						</center>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="mb-3 card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-stripped">
								<thead>
									<tr>
										<td>NO</td>
										<td>Tanggal kunjungan</td>
										<td>Daftar tagihan</td>
										<td>Total</td>
									</tr>
								</thead>
								<tbody id="dataShow">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>




<?php $this->load->view("pasien/includes/footer") ?>
<?php $this->load->view("pasien/includes/ajax/history_ajax") ?>