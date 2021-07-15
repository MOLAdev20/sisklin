<?php $url = $this->uri->segment(2) ?>
<div class="app-main">
	<div class="app-sidebar sidebar-shadow">

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
				<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
					<span class="btn-icon-wrapper">
						<i class="fa fa-ellipsis-v fa-w-6"></i>
					</span>
				</button>
			</span>
		</div>
		<div class="scrollbar-sidebar">
			<div class="app-sidebar__inner">
				<ul class="vertical-nav-menu">
					<li class="app-sidebar__heading">Dashboard</li>
					<li>
						<a href="<?= base_url('Dokter/Home') ?>"
							class="<?php if($url === "Home"){echo 'mm-active';} ?>">
							<i class="metismenu-icon pe-7s-rocket"></i>
							Menu utama
						</a>
					</li>
					<li class="app-sidebar__heading">Pelayanan</li>
					<li>
						<a href="<?= base_url('Dokter/Chat/index') ?>"
							class="<?php if($url === "Chat"){echo 'mm-active';} ?>">
							<i class="metismenu-icon pe-7s-chat"></i>
							Pertanyaan pasien
							<?php 
								if($this->session->userdata("new_notification") !== 0)
								{ ?>
									<div class="badge badge-pill badge-danger">
										<i class="fa fa-bell"></i>
									</div>
								<?php }
							?>
						</a>
					</li>
                    <li class="app-sidebar__heading">LOGOUT</li>
                    <li>
						<a href="<?= base_url('Login/logout') ?>" onclick = "return confirm('Keluar?')">
							<i class="metismenu-icon pe-7s-back"></i>
							Keluar
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>