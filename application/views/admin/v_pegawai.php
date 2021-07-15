<?php $this->load->view("admin/includes/header"); ?>
<?php $this->load->view("admin/includes/sidebar"); ?>

<?= $this->session->flashdata("msg"); ?>

<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-id icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Daftar petugas klinik | Sistem Informasi <?= $this->session->userdata("rs"); ?>
						<div class="page-title-subheading">
							<?= $this->session->userdata("address"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="col-md-6 mb-3">
				<div class="card mb-3 widget-content">
					<div class="widget-content-wrapper">
						<div class="widget-content-left">
							<div class="widget-heading">Dokter</div>
							<div class="widget-subheading">Jumlah pegawai dokter</div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-success"><span><?= $dokter ?></span></div>
						</div>
					</div>
				</div>
				<div class="card mb-3 widget-content">
					<div class="widget-content-wrapper">
						<div class="widget-content-left">
							<div class="widget-heading">Staff</div>
							<div class="widget-subheading">Jumlah pegawai staff</div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-primary"><span><?= $staff ?></span></div>
						</div>
					</div>
				</div>
				<div class="card mb-3 widget-content">
					<div class="widget-content-wrapper">
						<div class="widget-content-left">
							<div class="widget-heading">Pria</div>
							<div class="widget-subheading">Jumlah pekerja pria</div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-danger"><span><?= $man ?></span></div>
						</div>
					</div>
				</div>
				<div class="card mb-3 widget-content">
					<div class="widget-content-wrapper">
						<div class="widget-content-left">
							<div class="widget-heading">Wanita</div>
							<div class="widget-subheading">Jumlah pekerja wanita</div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-info"><span><?= $woman ?></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-3">
				<div class="card mb-2">
					<div class="card-body">
						<h6 class="card-title">Tambah petugas</h6>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama petugas</label>
									<input type="text" class="form-control" name="nama">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama pengguna</label>
									<input type="text" name="username" class="form-control">
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Jabatan</label>
									<select class="form-control" name="jabatan">
										<option value="">-- Pilih jabatan --</option>
										<option value="Dokter">Dokter</option>
										<option value="Dokter umum">Dokter umum</option>
										<option value="Dokter kandungan">Dokter kandungan</option>
										<option value="Dokter spesialis">Dokter spesialis</option>
										<option value="Staff">Staff</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Bidang</label>
									<input type="text" class="form-control" name="bidang">
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
									<label for="">Gaji</label>
									<input type="number" name="gaji" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>Alamat</label>
								<textarea class="form-control" name="alamat"></textarea>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-4">
								<span id="tombol">
									<button class="btn btn-primary" id="simpanPetugas">Simpan</button>
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
					<div class="card-body justify-content-end">
						<div class="row mb-3">
							<div class="col-md-8">
								<div class="card-title">Data pegawai</div>
							</div>
							<div class="col-md-4">
								<input type="text" name="query" class="form-control" placeholder="Cari nama">
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-light table-striped">

								<thead>
									<tr>
										<td>No</td>
										<td>Nama petugas</td>
										<td>Jabatan</td>
										<td>Bidang</td>
										<td>Gaji</td>
										<td>Status akun</t>
										<td>Aksi</td>

									</tr>
								</thead>
								<tbody id="getData">
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
<?php $this->load->view("admin/includes/ajax/Pegawai_ajax"); ?>