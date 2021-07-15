<?php $this->load->view("admin/includes/header"); ?>
<?php $this->load->view("admin/includes/sidebar"); ?>

<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-note2 icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Laporan data kunjungan | Sistem Informasi <?= $this->session->userdata("rs"); ?>
						<div class="page-title-subheading">
						<?= $this->session->userdata("address"); ?>
						</div>
					</div>
				</div>  
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Fitur pencarian spesifik</h6>
						<div class="row">
							<div class="col-md">
								<label>Tanggal</label>
								<input type="text" name="tanggal" class="form-control">
							</div>
							<div class="col-md">
								<label>Bulan</label>
								<input type="text" name="bulan" class="form-control">
							</div>
							<div class="col-md">
								<label>Tahun</label>
								<input type="text" name="tahun" class="form-control">
							</div>
						</div>
						<!-- Button -->
						<div class="row mt-2">
							<div class="col">
								<button class="btn btn-primary request" id="daily">Harian</button>
							</div>
							<div class="col">
								<button class="btn btn-primary request" id="monthly">Bulanan</button>
							</div>
							<div class="col">
								<button class="btn btn-primary request" id="yearly">Tahunan</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="mb-3 card">
					<div class="card-body">
						
						<h6 class="card-title">Hasil pencarian</h6>
						<div class="mr-auto" id="report-sections">
							<button class="btn btn-danger report-btn" focus="pdf"><i class="fa fa-file-pdf"></i> Pdf</button>
							<button class="btn btn-success report-btn" focus="excel"><i class="fa fa-file-excel"></i> Excel</button>
						</div>

						<div class="table-responsive" >
							<table class="table table-light table-striped">
								<thead>
									<tr>
										<td>No</td>
										<td>Nama pasien</td>
										<td>Jenis kelamin</td>
										<td>Waktu kunjungan</td>
										<td>Tagihan</td>
										<td>Total biaya</td>
										
									</tr>
								</thead>
								
								<tbody id="tabel">
									
								</tbody>
								
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	

</div>
</div>

<?php $this->load->view("admin/includes/footer"); ?>
<?php $this->load->view("admin/includes/ajax/Laporan_pasien_ajax"); ?>