<?php $this->load->view('admin/includes/header'); ?>
<?php $this->load->view('admin/includes/sidebar'); ?>

<?= $this->session->flashdata("msg"); ?>

<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-wallet icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Pembayaran | Sistem Informasi <?= $this->session->userdata("rs"); ?>
						<div class="page-title-subheading">
						<?= $this->session->userdata("address"); ?>
						</div>
					</div>
				</div>  
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="mb-3 card">
					<div class="card-body">
						
						

							<div class="row">

								<div class="col-md-6">
									<h5 class="card-title">Transaksi</h5>
									
									<div class="row">
										<div class="col-md-12">
											<table class="table table-light">
												<tr>
													<td>Nama</td><td>:</td><td id="namaPasien"></td>
												</tr>
												<tr>
													<td>Usia</td><td>:</td><td id="usiaPasien"></td>
												</tr>
												<tr>
													<td>Jenis kelamin</td><td>:</td><td id="sexPasien"></td>
												</tr>
												<tr>
													<td>Keluhan</td><td>:</td><td id="keluhan"></td>
												</tr>
												<tr>
													<td>Obat</td><td>:</td><td>
														<input type="text" name="namaObat" class="form-control" autocomplete="on">
														<span style="color: red; font-size: 13px" id = "cekObat"></span>
													</td>
												</tr>
											</table>
											<button class="btn btn-primary" id="tambahTagihan">Tambah</button>
										</div>
									</div>
									

								</div>
								<div class="col-md-6 shadow-sm p-2">
									<h5 class="card-title">Jumlah tagihan</h5><br>
									<div class="row ml-1" name="billList"></div>
									<hr>
									<div class="row">
										<div class="col-md-7">
											<h6>Jumlah pembayaran : <span id="jumlahTagihan">0</span></h6>
										</div>
										<div class="col-md-2">
											<button class="btn btn-danger clear">Bersih</button>
										</div>
										<div class="col-md-2">
											<button class="btn btn-primary confirm">Konfirmasi</button>
										</div>
									</div>

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
						<div class="row mb-3">
							<div class="col-md-8">
								<h5 class="card-title">Menunggu proses</h5>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped" id="dataTable-1">
								<thead>
									<tr>
										<td>No</td>
										<td>pasien</td>
										<td>Keluhan</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody id="result">

									<?php $i = 1;foreach($pasien as $key) { ?>
										<tr>
											<td><?= $i++ ?></td>
											<td id="nama<?= $key['ID'] ?>"><?= $key['Nama'] ?></td>
											<td id="keluhan<?= $key['ID'] ?>"><?= $key['Keluhan'] ?></td>
											<td><button class="btn btn-primary" target="tagih<?= $key['ID'] ?>">Tagih</button></td>
										</tr>
									<?php } ?>

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

<?php $this->load->view('admin/includes/footer'); ?>
<?php $this->load->view('admin/includes/ajax/Payment_ajax'); ?>