<?php $this->load->view("pasien/includes/header")  ?>
<?php $this->load->view("pasien/includes/sidebar") ?>

<style type="text/css">
	.filter-link:hover{
		text-decoration-line: none;
	}
</style>

<!-- Content -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
		<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-chat icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Chat & konsultasi | Sistem Informasi <?= $this->session->userdata("rs"); ?>
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
							<div class="col-md-5">
								<div class="card-title">Kategori dokter</div>
								<button class="btn btn-outline-info m-1" id="umum">Dokter umum</button>
								<button class="btn btn-outline-info m-1" id="spesialis">Dokter Spesialis</button>
								<button class="btn btn-outline-info m-1" id="bidan">Bidan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>

		
		
			<div class="row" id="result-filter">
				<?php foreach($dokter as $key){ ?>
					<div class="col-md-6">
						<div class="card m-3">
							<div class="card-body">
								
								<div class="row">
									
									<div style="width: 60px; height: 60px; overflow: hidden;" class="mr-3 ml-3 rounded-circle">
										<a href="#" class="showDetailDoctor" focus="detail_doctor<?= $key['NIK'] ?>">
											<img src="<?= base_url('upload/Profile/Officer/'.$key['Gambar']) ?>" width="60px">
										</a>
									</div>
									<div>
										<a href="#" class="chat-dokter" focus="chat-column<?= $key['ID'] ?>" for="<?= $key['NIK'] ?>">
											<h1 class="card-title" style="margin: 0">
												<?= $key["Nama"] ?>
											</h1>
										</a>
										<p><?= $key["Jabatan"] ?></p>

										<div class="chat-column<?= $key['ID'] ?> chat">

											<div class="kumpulan_pertanyaan" dokter="<?= $key['NIK'] ?>">
												
											</div>

											<textarea class="form-control" name="<?= $key['NIK'] ?>"></textarea>
											
											<button class="btn btn-primary mt-1 send" label="<?= $key['NIK'] ?>">Kirim</button>
										</div>

										<div class="detail_doctor" id="detail_doctor<?= $key['NIK'] ?>">
											<table cellpadding="5px">
												<tr>
													<td>Bidang </td><td>:</td><td><?= $key['Bidang'] ?></td>
												</tr>
												<tr>
													<td>NIK </td><td>:</td><td><?= $key['NIK'] ?></td>
												</tr>
												<tr>
													<td>Nomor telepon </td><td>:</td><td><?= $key['Bidang'] ?></td>
												</tr>
												<tr>
													<td>Alamat </td><td>:</td><td><?= $key['Alamat'] ?></td>
												</tr>
												<tr>
													<td>Catatan </td><td>:</td><td><?= $key['Catatan'] ?></td>
												</tr>
											</table>
										</div>

									</div>

								</div>

							</div>
						</div>
					</div>
					
				<?php } ?>
				
			</div>
		

		


			    
		</div>
			<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		</div>
	</div>




<?php $this->load->view("pasien/includes/footer") ?>
<?php $this->load->view("pasien/includes/ajax/chat_ajax") ?>