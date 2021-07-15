<?php $this->load->view("dokter/includes/header")  ?>
<?php $this->load->view("dokter/includes/sidebar") ?>

<?php 
	
	foreach($pegawai as $key){
	$id = $key['ID'];
	$nama = $key['Nama'];
	$username = $key['Nama_pengguna'];
	$nik = $key['NIK'];
	$PP = $key['Gambar'];
	$gender = $key['Gender'];
	$alamat = $key['Alamat'];
	$jabatan = $key['Jabatan'];
	$bidang = $key['Bidang'];
	$catatan = $key['Catatan'];
	$status = $key['Status'];
	$gaji = $key['Gaji'];
}

?>

<!-- Content -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
		<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-rocket icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Dashboard | Sistem Informasi <?= $this->session->userdata("rs"); ?>
						<div class="page-title-subheading">
							<?= $this->session->userdata("address"); ?>
						</div>
					</div>
				</div>  
			</div>
		</div>            
		<div class="row">
			<div class="col-md-4">
				<div class="mb-3 card">
					<div class="card-body">
						<h5 class="card-title">Selamat datang</h5>

						<img src="<?= base_url('upload/Profile/Officer/'.$PP) ?>" width = "100%">

					</div>
				</div>
			</div>

			<div class="col-md">
				<div class="row">
					<div class="col-md-12">
						<div class="mb-2 card">
							<div class="card-body">
								<h1 class="card-title">Informasi pribadi</h1>

							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="mb-2 card">
							<div class="card-body">
								
								<div class="table-responsive">
							<table class="table table-light table-striped">
								
								<thead>
					
										<tr>
											<td>ID Dokter</td>
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

		</div>


			    
		</div>
			<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		</div>
	</div>




<?php $this->load->view("dokter/includes/footer") ?>