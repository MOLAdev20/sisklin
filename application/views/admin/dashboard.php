<?php $this->load->view("admin/includes/header"); ?>
<?php $this->load->view("admin/includes/sidebar"); ?>

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
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-arielle-smile">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<h3><i class="pe-7s-note"></i></h3>
								<div class="widget-heading">Jumlah kunjungan pasien</div>
								<div class="widget-subheading">Hari ni</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span id="hariIni"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-grow-early">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<h3><i class="pe-7s-stopwatch"></i></h3>
								<div class="widget-heading">Jumlah Pasien</div>
								<div class="widget-subheading">Dalam antrian hari ini</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span id="dalamAntrian"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-midnight-bloom">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<h3><i class="pe-7s-users"></i></h3>
								<div class="widget-heading">Jumlah pasien</div>
								<div class="widget-subheading">Bulan ini</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span id="bulanIni"></span></div>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="mb-3 card">
                        <div class="card-body">
                        	<h5 class="card-title">Registrasi pasien</h5>

                        	<div class="form-group">
                        		<div class="row">
                        			<div class="col-md-6">
                        				<input type="text" name="pasien" autocomplete="on" class="form-control" placeholder="Nama pasien ...">
                        				<span id="checkmessage"></span>
                        				<textarea class="form-control mt-2" placeholder="Keluhan" name="keluhan"></textarea>
                        				<button class="btn btn-primary mt-2" id="get_antri">Cari</button>
                        			</div>
                        			<div class="col-md-6 text-center">
                        				<p class="card-title">URUTAN ANTRIAN</p>
                        				<h1 id="antrian"></h1>
                        				<h3 id="pasien"></h3>
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
                        	<h5 class="card-title">Daftar Pasien</h5>

                        	<div class="table-responsive">
	                        	<table class="table table-striped ">
	                        		<thead>
		                        		<tr>
		                        			<td>No</td>
		                        			<td>Nama</td>
		                        			<td>Nomor antrian</td>
		                        			<td>Keluhan</td>
		                        			<td>Usia</td>
		                        			<td>Status</td>
		                        			<td>Aksi</td>
		                        			
		                        		</tr>
		                        	</thead>
		                        	<tbody id="getAntrian">
		                        		
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

	<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Registrasi pasien baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama pasien</label>
								<input type="text" name="nama" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Jenis kelamin</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="seks" id="laki" value="Laki-laki">
									<label class="form-check-label" for="laki">
										Laki Laki
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="seks" id="cewe" value="perempuan">
									<label class="form-check-label" for="cewe">
										Perempuan
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Usia</label>
								<input type="number" name="usia" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Nomor telepon</label>
								<input type="number" name="telp" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="simpanData">Simpan</button>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view("admin/includes/footer"); ?>
	<?php $this->load->view("admin/includes/ajax/home_ajax");