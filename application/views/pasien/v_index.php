<?php $this->load->view("pasien/includes/header")  ?>
<?php $this->load->view("pasien/includes/sidebar") ?>


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
			<div class="col-md-4"><a href="<?= base_url('User/Kunjungan') ?>">
				<div class="card mb-3 widget-content">
					<div class="widget-content-outer">
						<div class="widget-content-wrapper">
							<div class="widget-content-left">
								<div class="widget-heading">Riwayat kunjungan</div>
								<div class="widget-subheading">Lihat menu riwayat kunjungan</div>
							</div>
						</div>
					</div>
				</div>
			</div></a>
			<div class="col-md-4"><a href="<?= base_url("User/Konsultasi") ?>">
				<div class="card mb-3 widget-content">
					<div class="widget-content-outer">
						<div class="widget-content-wrapper">
							<div class="widget-content-left">
								<div class="widget-heading">Konsultasi</div>
								<div class="widget-subheading">Konsultasi dengan dokter</div>
							</div>
						</div>
					</div>
				</div>
			</div></a>
			<a href="<?= base_url('User/Notification') ?>"
			<div class="col-md-4">
				<div class="card mb-3 widget-content">
					<div class="widget-content-outer">
						<div class="widget-content-wrapper">
							<div class="widget-content-left">
								<div class="widget-heading">Notifikasi</div>
								<div class="widget-subheading">Lihat notifikasi pengguna</div>
							</div>
						</div>
					</div>
				</div></a>
			</div>
		</div>





	</div>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>




<?php $this->load->view("pasien/includes/footer") ?>
