<?php $this->load->view("pasien/includes/header")  ?>
<?php $this->load->view("pasien/includes/sidebar") ?>

<!-- Content -->
<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="pe-7s-bell icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div>Notifikasi | Sistem Informasi <?= $this->session->userdata("rs"); ?>
						<div class="page-title-subheading">
							<?= $this->session->userdata("address"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-xs-12 col-xl-12">
				<div class="card mb-3 widget-content">
					<div class="widget-content-outer">
						<div class="widget-content-wrapper">
							<div class="widget-content-left">
								<div class="widget-heading">Total Kunjungan</div>
								<div class="widget-subheading">Jumlah seluruh riwayat kunjungan</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-success"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-xs-12 col-xl-12">
				<div class="card mb-3 notif widget-content">

					<div class="table-responsive" style="height: 400px; overflow: scroll;">
						<table class="table">
							<?php $i = 1; foreach($user_notif as $key){ ?>
							<tr>
								<td><?= $i++ ?></td>
								<td>Anda berhasil melakukan riwayat pembayaran...</td>
								<td><?= $key['Waktu'] ?></td>
								<td>
									<button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
										data-target="#detail<?= $key['ID'] ?>">Detail
									</button>
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>



	</div>
</div>
</div>

<?php foreach($user_notif as $key) { ?>
<!-- Modal -->
<div class="modal fade" id="detail<?= $key['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5>Kepada pelanggan atas nama <?= $this->session->userdata("nama") ?></h5>
				<br>
				<p>Kami mengucapkan terimakasih atas kunjungan anda. Kami berharap dan senantiasa mendoakan semoga anda
					lekas sembuh dan diberikan semangat serta ketabahan
					dalam menjalani ujian ini.
				</p>
				<table class="table">
					<tr>
						<td>Nama pasien</td>
						<td>:</td>
						<td><?= $this->session->userdata("nama") ?></td>
					</tr>
					<tr>
						<td>Keluhan</td>
						<td>:</td>
						<td><?= $key['Keluhan'] ?></td>
					</tr>
					<tr>
						<td>Tanggal pemeriksaan</td>
						<td>:</td>
						<td><?= $key['Waktu'] ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td class="text-success">Pembayaran diselesaikan</td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<?php } ?>










<?php $this->load->view("pasien/includes/footer") ?>
