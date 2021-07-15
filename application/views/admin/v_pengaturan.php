<?php $this->load->view("admin/includes/header");
$this->load->view("admin/includes/sidebar"); 
echo $this->session->flashdata("msg");
?>

<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-tools icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Pengaturan aplikasi | Sistem Informasi <?= $this->session->userdata("rs"); ?>
						<div class="page-title-subheading">
							<?= $this->session->userdata("address"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row">

							<div class="col-md-6">
							<h5 class="card-title">Ganti informasi instansi</h5>
								<?= form_open('Setting/change') ?>
								<div class="form-group">
									<label for="">Nama instansi</label>
									<input type="text" name="rs_name" value="<?= $this->session->userdata('rs') ?>" id="" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Alamat</label>
									<textarea name="address" class='form-control'><?= $this->session->userdata('address') ?></textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-primary" type="submit">Ubah</button>
								</div>
								<?= form_close(); ?>
							</div>


							<div class="col-md-6">
							<h5 class="card-title">Ganti logo instansi</h5>
								<?= form_open_multipart('Setting/changePict') ?>
								<div class="form-group">
									<label for="">Logo</label>
									<input type="file" name="rs_logo" id="" class="form-control">
								</div>
								<div class="form-group">
									<button class="btn btn-primary" type="submit">Ubah</button>
								</div>
								<?= form_close(); ?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md">
				<div class="card mt-3">
					<div class="card-body">
						<div class="row">
							<div class="col-md">
							<h5 class="card-title">Ganti informasi admin</h5>
							<?= form_open("Setting/changeRoot") ?>
								<div class="form-group">
									<label>Username baru</label>
									<input type="text" name="new_user" class="form-control">
								</div>
								<div class="form-group">
									<label">Password baru</label">
									<input type="password" name="new_pass" class="form-control">
								</div>
								<div class="form-group">
									<label">Konfirmasi password</label">
									<input type="password" name="confirm_pass" class="form-control">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							<?= form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>



</div>

<?php $this->load->view("admin/includes/footer"); ?>
