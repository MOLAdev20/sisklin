-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2021 pada 05.30
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_konsultasi`
--

CREATE TABLE `data_konsultasi` (
  `ID` int(11) NOT NULL,
  `Pasien` varchar(20) NOT NULL,
  `Dokter` varchar(20) NOT NULL,
  `Tanggal` varchar(11) NOT NULL,
  `Pengirim` varchar(11) NOT NULL,
  `Isi` text NOT NULL,
  `Balasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `ID` int(10) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `Gambar` varchar(30) NOT NULL,
  `Nama` varchar(150) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Alamat` text NOT NULL,
  `Jabatan` varchar(30) NOT NULL,
  `Gaji` int(20) NOT NULL,
  `Nama_pengguna` varchar(100) NOT NULL,
  `Bidang` varchar(50) NOT NULL,
  `Catatan` text NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjung_antri`
--

CREATE TABLE `kunjung_antri` (
  `ID` int(10) NOT NULL,
  `ID_pasien` varchar(20) NOT NULL,
  `Antrian` int(20) NOT NULL,
  `Keluhan` text NOT NULL,
  `Waktu` varchar(40) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `ID_pasien` varchar(20) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Usia` int(20) NOT NULL,
  `No_telpon` varchar(30) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `ID` int(10) NOT NULL,
  `config` varchar(100) NOT NULL,
  `config_vall` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`ID`, `config`, `config_vall`) VALUES
(1, 'rs_name', 'Klinik husada'),
(2, 'admin_u', ''),
(3, 'admin_p', ''),
(4, 'rs_addr', 'Jln. Raya malioboro'),
(5, 'rs_logo', 'logo-inverse.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kunjungan`
--

CREATE TABLE `riwayat_kunjungan` (
  `ID` int(100) NOT NULL,
  `ID_pasien` int(30) NOT NULL,
  `Tagihan` text NOT NULL,
  `Hari` varchar(20) NOT NULL,
  `Tanggal` int(20) NOT NULL,
  `Bulan` int(20) NOT NULL,
  `Tahun` int(20) NOT NULL,
  `Total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `ID` int(10) NOT NULL,
  `Nama_obat` varchar(50) NOT NULL,
  `Gambar` varchar(20) NOT NULL,
  `Jenis` varchar(20) NOT NULL,
  `Harga` int(20) NOT NULL,
  `Stok` int(10) NOT NULL,
  `Penyimpanan` varchar(30) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_konsultasi`
--
ALTER TABLE `data_konsultasi`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `kunjung_antri`
--
ALTER TABLE `kunjung_antri`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_pasien`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `riwayat_kunjungan`
--
ALTER TABLE `riwayat_kunjungan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_konsultasi`
--
ALTER TABLE `data_konsultasi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kunjung_antri`
--
ALTER TABLE `kunjung_antri`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `riwayat_kunjungan`
--
ALTER TABLE `riwayat_kunjungan`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
