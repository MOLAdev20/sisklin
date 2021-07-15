<?php $this->load->view("dokter/includes/header")  ?>
<?php $this->load->view("dokter/includes/sidebar") ?>
<style type="text/css">
	.filter-link:hover{text-decoration-line: none;}
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
					<div>Konsultasi pasien | Sistem Informasi <?= $this->session->userdata("rs"); ?>
						<div class="page-title-subheading">
							<?= $this->session->userdata("address"); ?>
						</div>
					</div>
				</div>  
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<a href="#" class="filter-link" focus="showAll">
					<div class="card mb-3 widget-content bg-midnight-bloom">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Jumlah konsultasi</div>
								<div class="widget-subheading">Pada bulan ini</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span id="showAll"></span></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="#" class="filter-link" focus="answered">
					<div class="card mb-3 widget-content bg-grow-early">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Konsultasi terjawab</div>
								<div class="widget-subheading">Pada bulan ini</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span id="answered"></span></div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="#" class="filter-link" focus="unanswered">
					<div class="card mb-3 widget-content bg-arielle-smile">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Konsultasi tidak terjawab</div>
								<div class="widget-subheading">Pada bulan ini</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span id="unanswered"></span></div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>

		<hr>

		
				<div class="row" id="resultFilter">
					
					<?php foreach($chat as $key) { ?>
						<div class="col-md-6">
							<div class="mb-3 card">
								<div class="card-body">
									<a href="#" class="dropdown" focus="reply-column<?= $key['ID'] ?>" ><h2 class="card-title"><?= $key['Nama'] ?></h2> <i class="fa fa-arrow-bottom"></i></a>
									
									<div style="margin-top: -18px">
										<p><b>Pertanyaan</b> :<?= $key['Isi'] ?></p>
										<p id="<?= $key['ID'] ?>"><b>Balasan</b> :<?= $key['Balasan'] ?></p>
									</div>

									<div class="reply-column<?= $key['ID'] ?> reply">
										<textarea class="form-control" name="<?= $key['ID'] ?>"></textarea>
										<button class="btn btn-primary send mt-1" key = "<?= $key['ID'] ?>">Kirim</button>
									</div>

								</div>
							</div>
						</div>
					<?php } ?>

				</div>
			</a>
		


			    
		</div>
			<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		</div>
	</div>




<?php $this->load->view("dokter/includes/footer") ?>
<?php $this->load->view("dokter/includes/ajax/chat_ajax");