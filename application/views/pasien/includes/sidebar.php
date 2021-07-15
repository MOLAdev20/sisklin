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
                    <a href="<?= base_url('User/Home') ?>" class="<?php if($url === "Home"){echo 'mm-active';} ?>">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Menu utama
                    </a>
                </li>
                <li class="app-sidebar__heading">Konsultasi</li>
                <li>
                    <a href="<?= base_url('User/Konsultasi/index') ?>" class="<?php if($url === "Konsultasi"){echo 'mm-active';} ?>">
                        <i class="metismenu-icon pe-7s-chat"></i>
                        Konsultasi
                    </a>
                </li>
        <li class="app-sidebar__heading">Riwayat dan laporan</li>
        <li>
            <a href="<?= base_url('User/Kunjungan/index') ?>" class="<?php if($url === "Kunjungan"){echo 'mm-active';} ?>">
                <i class="metismenu-icon pe-7s-display1"></i>
                Riwayat kunjungan
            </a>
        </li>
        <li>
            <a href="<?= base_url('User/Notifikasi/index') ?>" class="<?php if($url === "Notifikasi"){echo 'mm-active';} ?>">
                <i class="metismenu-icon pe-7s-bell"></i>
                Notifikasi
            </a>
        </li>
        <li class="app-sidebar__heading">Logout</li>
        <li>
        <a href="<?= base_url('Login/logOut') ?>" onclick="return confirm('Keluar?')">
            <i class="metismenu-icon pe-7s-back"></i> Keluar
        </a>
        </li>
    </ul>
</div>
</div>
</div>