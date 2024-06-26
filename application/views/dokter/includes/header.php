<!doctype html>
<html lang="en">

<head>
<link rel="icon" href="<?= base_url('assets/images/logo-inverse.png') ?>">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $this->uri->segment(2) ?> | Sistem informasi <?= $this->session->userdata('rs') ?></title>
	<meta name="viewport"
		content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">
	<!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
	<link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
</head>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/dataTables/dataTables.bootstrap.css') ?>">
<script type="text/javascript" src="<?= base_url('assets/js/sweetalert/sweetalert.min.js') ?>"></script>

<body>

	<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
		<div class="app-header header-shadow">
			<div class="app-header__logo">
				<div class="logo-src"><img src="<?= base_url('assets/images/').$this->session->userdata('logo')?>"
						width="100%"></div>
				<div class="header__pane ml-auto">
					<div>
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
							data-class="closed-sidebar">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<div class="app-header__mobile-menu">
				<div>
					<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
			<div class="app-header__menu">
				<span>
					<button type="button"
						class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
						<span class="btn-icon-wrapper">
							<i class="fa fa-ellipsis-v fa-w-6"></i>
						</span>
					</button>
				</span>
			</div>
			<div class="app-header__content">
				<div class="app-header-right">
					<div class="header-btn-lg pr-0">
						<div class="widget-content p-0">
							<div class="widget-content-wrapper">
								<div class="widget-content-left  ml-3 header-user-info">
									<div class="widget-heading">
										<?= $this->session->userdata('nama') ?>
									</div>
									<div class="widget-subheading">
										<?= $this->session->userdata('nik') ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>