<?php $this->load->view("admin/includes/header"); ?>
<?php $this->load->view("admin/includes/sidebar"); ?>
<?= $this->session->flashdata("msg"); ?>

<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-bandaid icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Obat | Sistem Informasi <?= $this->session->userdata("rs"); ?>
						<div class="page-title-subheading">
						<?= $this->session->userdata("address"); ?>
						</div>
					</div>
				</div>  
			</div>
		</div>            
		<div class="row">
			<div class="col-md-6 col-xl-3">
				<div class="card mb-3 widget-content bg-midnight-bloom">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<h3><i class="pe-7s-bandaid"></i></h3>
							<div class="widget-heading">Obat obatan</div>
							<div class="widget-subheading">Jumlah keseluruhan</div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-white"><span><?= count($obat) ?></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-3">
				<div class="card mb-3 widget-content bg-arielle-smile">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<h3><i class="pe-7s-paperclip"></i></h3>
							<div class="widget-heading">Jenis pil</div>
							<div class="widget-subheading">Jumlah keseluruhan</div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-white"><span><?= count($pil) ?></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-3">
				<div class="card mb-3 widget-content bg-grow-early">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<h3><i class="pe-7s-wine"></i></h3>
							<div class="widget-heading">Jenis sirup</div>
							<div class="widget-subheading">Jumlah keseluruhan</div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-white"><span><?= count($sirup) ?></span></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-3">
				<div class="card mb-3 widget-content bg-dark">
					<div class="widget-content-wrapper text-white">
						<div class="widget-content-left">
							<h3><i class="pe-7s-pin"></i></h3>
							<div class="widget-heading">Jenis injeksi</div>
							<div class="widget-subheading">Jumlah keseluruhan</div>
						</div>
						<div class="widget-content-right">
							<div class="widget-numbers text-white"><span><?= count($injeksi) ?></span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="mb-3 card">
					<div class="card-body">
						
						<?= form_open_multipart("Obat/add") ?>

							<div class="row">

								<div class="col-md-6">
									<h5 class="card-title">Tambah obat</h5>

									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label>Nama obat</label>
												<input type="text" name="obat" class="form-control">
											</div>
										</div>
										<div class="col-md-4">
											<label>Jenis</label>
											<select name="jenis" class="form-control">
												<option>---</option>
												<option value="injeksi">Injeksi/Suntikan</option>
												<option value="Kapsul">Pil/Tablet/Kaplet</option>
												<option value="Sirup">Sirup/minuman</option>
												<option value="Bubuk">Bubuk/serbuk</option>
												<option value="Salep">Salep/krim</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Harga /PCS</label>
												<input type="number" name="harga" class="form-control">
											</div>
										</div>
										<div class="col-md-4">
											<label>Jumlah Stok</label>
											<input type="number" name="stok" class="form-control">
										</div>
										<div class="col-md-4">
											<label>Penyimpanan</label>
											<input type="text" name="penyimpanan" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label>Keterangan</label>
											<textarea class="form-control" name="keterangan"></textarea>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-9">
											<label>Gambar Obat</label>
											<input type="file" name="gambar" class="form-control">
											<div class="form-group form-check mt-1">
												<input type="checkbox" name="cek" class="form-check-input" id="cek" value="none">
												<label class="form-check-label" for="cek">Tanpa gambar</label>
											</div>

										</div>
										<div class="col-md-3">
											<button class="btn btn-primary" type="submit" style="margin-top: 32px;"><i class="pe-7s-pen"></i> Simpan</button>
											<?= form_close(); ?>
										</div>
									</div>
									

								</div>
								<div class="col-md-6 shadow-sm p-2">
									<h5 class="card-title">Notifikasi</h5>

									<?php if ($notifStok == NULL) {
										echo "<h3 class='text-center'>Tidak ada notifikasi</h3>";
									}else{ ?>

									<?php foreach($notifStok as $key){ ?>

										<div class="alert alert-danger fade show" role="alert">
											<h4 class="alert-heading">Stok menipis!!</h4>
											<p>Perhatian, Obat dengan nama <?= $key['Nama_obat'] ?> telah menipis. Segera isi suplai obat tersebut!</p>
											<hr>
											<p class="mb-0">Jika stok kembali tersedia, anda bisa memperbarui data stok obat ini di tabel obat</p>
										</div>

									<?php } }?>

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
								<h5 class="card-title">Daftar obat</h5>
							</div>
							<div class="col-md-4">
								<input type="text" name="cari" class="form-control" placeholder="Cari nama obat">
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped" id="dataTable-obat">
								<thead>
									<tr>
										<td>No</td>
										<td>Nama</td>
										<td>Gambar</td>
										<td>Jenis</td>
										<td>Harga@buah</td>
										<td>Stok</td>
										<td>Keterangan</td>
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody id="result">

									<!-- Looping array lalu tamplkan data obat -->
									<?php for($i = 0; $i < count($obat); $i++){ ?>
										<tr>
											<td><?= $i+1 ?></td>
											<td><?= $obat[$i]["Nama_obat"] ?></td>
											<td>
												<img src="<?= base_url('upload/gbr_obat/'.$obat[$i]['Gambar']) ?>" width="80px">
											</td>
											<td><?= $obat[$i]["Jenis"] ?></td>
											<td><?= $obat[$i]["Harga"] ?></td>
											<td><?= $obat[$i]["Stok"] ?></td>
											<td><?= $obat[$i]["Keterangan"] ?></td>
											<td><a tujuan="<?= base_url('Obat/delete/'.$obat[$i]['Gambar'].'/'.encrypt_url($obat[$i]['ID'])) ?>" href="#" class="hapus"><h5 class="pe-7s-close-circle"></h5></a>
												<a href="#" data-toggle="modal" data-target="#edit<?= $obat[$i]['ID'] ?>" class="edit"><h5 class="pe-7s-note"></h5></a>
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
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>

<?php for($i = 0; $i < count($obat); $i++) { ?>
	<div class="modal fade" tabindex="-1" role="dialog" id="edit<?= $obat[$i]['ID'] ?>">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit data obat</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">

						<div class="col-md-12">
							<h5 class="card-title">Edit obat</h5>
							<?= form_open('Obat/update/'.$obat[$i]['ID']) ?>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label>Nama obat</label>
											<input value="<?= $obat[$i]['Nama_obat'] ?>" type="text" name="obat" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<label>Jenis</label>
										<select name="jenis" class="form-control">
											<option>---</option>
											<?php $tipe = $obat[$i]["Jenis"] ?>
											<option value="injeksi" <?php if($tipe === "injeksi"){echo "selected";} ?> >Injeksi/Suntikan</option>
											<option value="Kapsul" <?php if($tipe === "Kapsul"){echo "selected";} ?>>Pil/Tablet/Kaplet</option>
											<option value="Sirup" <?php if($tipe === "Sirup"){echo "selected";} ?>>Sirup/minuman</option>
											<option value="Bubuk" <?php if($tipe === "Bubuk"){echo "selected";} ?>>Bubuk/serbuk</option>
											<option value="Salep" <?php if($tipe === "Salep"){echo "selected";} ?>>Salep/krim</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Harga /PCS</label>
											<input value="<?= $obat[$i]['Harga'] ?>" type="number" name="harga" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<label>Jumlah Stok</label>
										<input value="<?= $obat[$i]['Stok'] ?>" type="number" name="stok" class="form-control">
									</div>
									<div class="col-md-4">
										<label>Penyimpanan</label>
										<input value="<?= $obat[$i]['Penyimpanan'] ?>" type="text" name="penyimpanan" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label>Keterangan</label>
										<textarea class="form-control" name="keterangan"><?= $obat[$i]['Keterangan'] ?></textarea>
									</div>
								</div>
							


						</div>
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" >Update</button>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php $this->load->view("admin/includes/footer"); ?>
<?php $this->load->view("admin/includes/ajax/Obat_ajax");