<?php $this->load->view("admin/includes/header"); ?>
<?php $this->load->view("admin/includes/sidebar"); ?>

<?= $this->session->flashdata("msg"); ?>

<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-users icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Daftar pasien | Sistem Informasi <?= $this->session->userdata("rs"); ?>
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
						<h6 class="card-title">Tambah pasien</h6>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama pasien</label>
									<input type="text" class="form-control" name="nama">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Usia</label>
									<input type="text" class="form-control" name="usia">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Jenis kelamin</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="seks" id="laki"
											value="Laki-laki">
										<label class="form-check-label" for="laki">
											Laki Laki
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="seks" id="cewe"
											value="perempuan">
										<label class="form-check-label" for="cewe">
											Perempuan
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>No Telepon</label>
									<input type="text" class="form-control" name="telepon">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<textarea class="form-control" name="alamat"></textarea>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-4">
								<span id="kembali"></span>
								<span id="tombol">

									<button class="btn btn-primary" id="simpanPasien">Simpan</button>
								</span>
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

						<h6 class="card-title">Pasien terdaftar</h6>

						<div class="table-responsive">
							<table class="table table-light table-striped" id="dataTable-1">
								<thead>
									<tr>
										<td>No</td>
										<td>ID Pasien</td>
										<td>Nama pasien</td>
										<td>Jenis kelamin</td>
										<td>Usia</td>
										<td>Telepon</td>
										<td>Alamat</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach($pasien as $key) { ?>
									<tr>
										<td><?= $i++ ?></td>
										<td><?= $key['ID_pasien'] ?></td>
										<td><?= $key["Nama"] ?></td>
										<td><?= $key["Gender"] ?></td>
										<td><?= $key["Usia"] ?></td>
										<td><?= $key["No_telpon"] ?></td>
										<td><?= $key["Alamat"] ?></td>
										<td>
											<a href='#'
												goTo="<?= base_url('Pasien/delete/'.encrypt_url($key['ID_pasien'])) ?>"
												class='hapusPasien'>Hapus</a>
											<a href="#" data-target="<?= $key['Nama'] ?>" class="edit">Edit</a>
										</td>
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



</div>
</div>

<?php $this->load->view("admin/includes/footer"); ?>
<?php $this->load->view("admin/includes/ajax/Pasien_ajax"); ?>