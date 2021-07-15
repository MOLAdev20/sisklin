<?php $this->load->view("admin/includes/header"); ?>
<?php $this->load->view("admin/includes/sidebar"); ?>
<style type="text/css">
	.img-officer {
		height: 354px;
		overflow: hidden;
	}
</style>
<?php 

foreach($pegawai as $key){
	$id = $key['ID'];
	$nama = $key['Nama'];
	$nik = $key['NIK'];
	$gambar = $key['Gambar'];
	$gender = $key['Gender'];
	$alamat = $key['Alamat'];
	$jabatan = $key['Jabatan'];
	$bidang = $key['Bidang'];
	$catatan = $key['Catatan'];
	$status = $key['Status'];
	$gaji = $key['Gaji'];
	$username = $key['Nama_pengguna'];
}

?>

<?= $this->session->flashdata("msg"); ?>

<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-home icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Detail petugas | Sistem Informasi <?= $this->session->userdata("rs"); ?>
						<div class="page-title-subheading">
							<?= $this->session->userdata("address"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">

			<div class="col-md-5 ">
				<div class="mb-3 card">
					<div class="card-body">

						<div class="img-officer">
							<h6 class="card-title">Gambar pegawai</h6>
							<img src="<?= base_url('upload/Profile/Officer/'.$gambar) ?>" width='100%'>

						</div>

					</div>
				</div>
			</div>

			<div class="col-md-7">
				<div class="mb-3 card">
					<div class="card-body">

						<div class="row">


							<button class="btn m-2 btn-primary" data-toggle="modal" data-target="#modalEdit"><i
									class="fa fa-edit"></i> Edit</button>
							<button class="btn m-2 btn-info" data-toggle="modal" data-target="#modalEditPP"><i
									class="fa fa-camera"></i> Ganti PP</button>
							<button class="btn m-2 btn-danger hapus"><i class="fa fa-trash"></i> Hapus</button>

							<?php if ($status === "Aktif") { ?>
							<a class="btn m-2 btn-outline-danger"
								href="<?= base_url('Pegawai/banned/'.encrypt_url($id)) ?>"> Suspen</a>
							<?php }else{ ?>
							<a class="btn m-2 btn-outline-primary"
								href="<?= base_url('Pegawai/unbanned/'.encrypt_url($id)) ?>"> Aktifkan</a>
							<?php } ?>



						</div>

					</div>
				</div>

				<div class="mb-3 card">
					<div class="card-body">

						<h6 class="card-title">Pasien terdaftar</h6>

						<div class="table-responsive">
							<table class="table table-light table-striped">

								<thead>

									<tr>
										<td>No</td>
										<td>:</td>
										<td><?= $nik ?></td>
									</tr>
									<tr>
										<td>Nama petugas</td>
										<td>:</td>
										<td><?= $nama ?> ( <?= $username ?> )</td>
									</tr>
									<tr>
										<td>Jenis kelamin</td>
										<td>:</td>
										<td><?= $gender ?></td>
									</tr>
									<tr>
										<td>Jabatan</td>
										<td>:</td>
										<td><?= $jabatan ?></td>
									</tr>
									<tr>
										<td>Bidang</td>
										<td>:</td>
										<td><?= $bidang ?></td>
									</tr>
									<tr>
										<td>Gaji</td>
										<td>:</td>
										<td><?= $gaji ?></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td><?= $alamat ?></td>
									</tr>
									<tr>
										<td>Status akun</td>
										<td>:</td>
										<td><?= $status ?></td>
									</tr>


								</thead>
							</table>
						</div>

					</div>
				</div>




			</div>


		</div>
	</div>





	<!-- Modal -->
	<!-- Button trigger modal -->






</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit detail petugas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open("Pegawai/edit/".encrypt_url($id)); ?>
			<div class="modal-body">

			
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama petugas</label>
								<input type="text" class="form-control" name="nama" value="<?= $key['Nama'] ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama pengguna</label>
								<input type='text' name='username' class='form-control'
									value="<?= $key['Nama_pengguna'] ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Jabatan</label>
								<select class="form-control" name="jabatan">
									<option value="">-- Pilih jabatan --</option>

									<option value="Dokter" <?php if ($jabatan == "Dokter"){ ?>
										<?php echo "selected=''"; ?> <?php } ?>>Dokter</option>

									<option value="Dokter umum" <?php if ($jabatan == "Dokter umum"){ ?>
										<?php echo "selected = ''"; ?> <?php } ?>>Dokter umum</option>

									<option value="Dokter kandungan" <?php if ($jabatan == "Dokter kandungan"){ ?>
										<?php echo "selected=''"; ?> <?php } ?>>Dokter kandungan</option>


									<option value="Dokter spesialis" <?php if ($jabatan == "Dokter spesialis"){ ?>
										<?php echo "selected=''"; ?> <?php } ?>>Dokter spesialis</option>


									<option value="Staff" <?php if ($jabatan == "Staff"){ ?>
										<?php echo "selected = ''"; ?> <?php } ?>>Staff</option>
								</select>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Bidang</label>
								<input type="text" class="form-control" name="bidang" value="<?= $key['Bidang'] ?>">
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
								<label>Gaji</label>
								<input type="number" name="gaji" class="form-control" value="<?= $key['Gaji'] ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat"><?= $key['Alamat'] ?></textarea>
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>


<div class="modal fade" id="modalEditPP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ganti Foto profil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart("Pegawai/updatePP/".encrypt_url($id) ) ?>
			<div class="modal-body">

				<input type="file" name="foto">
				<input type="hidden" name="gambar_lama" value="<?= $gambar ?>">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>

<?php $this->load->view("admin/includes/footer"); ?>

<!-- Simple script delete by ajax and sweet alert -->
<script type="text/javascript">
	$(document).ready(function () {
		$(".hapus").on("click", function () {
			let pp = $("[name='gambar_lama']").val();

			// Konfirmasi
			swal({
					title: "Hapus pegawai?",
					text: "Data pegawai ini akan di hapus permanen",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {

						// Lakukan proses ajax jika terkonfirmasi
						$.ajax({
							url: "<?= base_url('Pegawai/delete/'.encrypt_url($id)) ?>",
							method: "POST",
							dataType: "text",
							data: {
								gambar: pp
							},
							success: function (result) {
								swal("Berhasil", "Berhasil menghapus pegawai", "success");
								location.replace("<?= base_url('Pegawai/index') ?>");
							}
						})

					}
				});


		})
	})
</script>