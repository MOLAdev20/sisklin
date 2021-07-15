<?php $url = $this->uri->segment(1) ?>
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
                    <a href="<?= base_url('Home/index') ?>" class="<?php if($url === "Home"){echo 'mm-active';} ?>">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Menu utama
                    </a>
                </li>
                <li class="app-sidebar__heading">Obat dan alat medis</li>
                <li>
                    <a href="<?= base_url('Obat/index') ?>" class="<?php if($url === "Obat"){echo 'mm-active';} ?>">
                        <i class="metismenu-icon pe-7s-bandaid"></i>
                        Obat Obatan
                    </a>
                </li>
        <li class="app-sidebar__heading">Pasien</li>
        <li>
            <a href="<?= base_url('Payment/index') ?>" class="<?php if($url === "Payment"){echo 'mm-active';} ?>">
                <i class="metismenu-icon pe-7s-wallet"></i>
                Menunggu pembayaran
            </a>
            <a href="<?= base_url('Pasien/index') ?>" class="<?php if($url === "Pasien"){echo 'mm-active';} ?>">
                <i class="metismenu-icon pe-7s-users"></i>
                Daftar pasien
            </a>
        </li>
        <li>
            <a href="<?= base_url('Pengunjung/index') ?>" class="<?php if($url === "Pengunjung"){echo 'mm-active';} ?>">
                <i class="metismenu-icon pe-7s-note2" >
                </i>Data pengunjung
            </a>
        </li>
        <li class="app-sidebar__heading">PETUGAS</li>
        <li>
            <a href="<?= base_url('Pegawai/index') ?>" class="<?php if($url === "Pegawai"){echo 'mm-active';} ?>">
                <i class="metismenu-icon pe-7s-id">
                </i>Daftar pegawai
            </a>
        </li>
        
        <li>
            <a href="<?= base_url('Setting/index') ?>" class="<?php if($url === "Setting"){echo 'mm-active';} ?>">
                <i class="metismenu-icon pe-7s-tools">
                </i>Pengaturan aplikasi
            </a>
        </li>
        <li class="app-sidebar__heading">Logout</li>
        <li>
             <a href="<?= base_url('Login/logout') ?>" onclick="return confirm('Yakin ingin Keluar?')">
                <i class="metismenu-icon pe-7s-back">
                </i>
                Keluar
            </a>
        </li>
    </ul>
</div>
</div>
</div>