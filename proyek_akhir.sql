-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 12:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(25) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_author` int(25) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `id_author`, `gambar`, `caption`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Tabrakan di samping jalan 1', 1, 'hutan_1.jpg', 'Tabrakan', '<p>trabrakan terjadi pukul 10.00 WIB</p>\r\n\r\n<p>dijalan singdanglaya</p>\r\n', '2022-07-22 10:03:00', '2022-07-22 10:03:15');

--
-- Triggers `berita`
--
DELIMITER $$
CREATE TRIGGER `after_berita_delete` AFTER DELETE ON `berita` FOR EACH ROW begin
insert into history_berita
set status = "Dihapus",
id = old.id,
id_author = old.id_author,
judul = old.judul,
isi = old.isi,
caption = old.caption,
tgl_hapus = now();
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_kartu_keluarga`
--

CREATE TABLE `detail_kartu_keluarga` (
  `No_kk` varchar(255) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `scan_kk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_kartu_keluarga`
--

INSERT INTO `detail_kartu_keluarga` (`No_kk`, `rt`, `rw`, `scan_kk`) VALUES
('20001', '01', '02', 'ERD (1)_1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `detail_ktp`
--

CREATE TABLE `detail_ktp` (
  `NIK` varchar(255) NOT NULL,
  `scan_ktp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_ktp`
--

INSERT INTO `detail_ktp` (`NIK`, `scan_ktp`) VALUES
('3273203001010000', 'Buku PA - 6701190098_Muhamad Ichsan Dwi Farhana_E-Lurah_Modul RT,RW dan Masyarakat ttd.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(10) NOT NULL,
  `nama_dokumen` varchar(1000) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_petugas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `nama_dokumen`, `file`, `status`, `created_at`, `updated_at`, `id_petugas`) VALUES
(2, 'test', '1666267564RW.xlsx', 'Approved', '2022-10-20 14:06:04', '2022-10-21 09:26:55', 1),
(3, 'test', '1666307435RT.xlsx', 'Rejected', '2022-10-21 01:10:35', '2022-10-21 09:27:07', 1),
(5, 'test', '1666307547RT.xlsx', 'Approved', '2022-10-21 01:12:27', '2022-10-22 13:50:39', 1),
(9, 'dsa', '1666439987Data warga (14).xlsx', 'Rejected', '2022-10-22 13:59:47', '2022-10-22 14:07:05', 1),
(10, 'dsasa', '1666440025contoh (8).Xlsx', 'Approved', '2022-10-22 14:00:25', '2022-10-22 14:07:12', 1),
(11, 'user test', '1666440602vaksin (2).Xlsx', 'Pending', '2022-10-22 14:10:02', '2022-10-22 14:10:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `history_berita`
--

CREATE TABLE `history_berita` (
  `id` int(11) NOT NULL,
  `id_author` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `caption` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_hapus` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id` int(15) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id`, `nama`) VALUES
(1, 'Surat Pengantar SKCK'),
(2, 'Surat Pengantar Izin Keramaian'),
(3, 'Surat Keterangan Kematian'),
(4, 'Surat Kelahiran'),
(5, 'SKTM Pendidikan'),
(6, 'SKTM Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `NIK` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Jenis_kelamin` varchar(255) NOT NULL,
  `Hubungan_kepala_keluarga` varchar(255) NOT NULL,
  `Tanggal_kelahiran` date NOT NULL,
  `Tempat_lahir` varchar(255) NOT NULL,
  `Provinsi` varchar(255) NOT NULL,
  `Status_perkawinan` varchar(255) NOT NULL,
  `Agama` varchar(255) NOT NULL,
  `No_SBKRI` varchar(255) DEFAULT NULL,
  `Tanggal_SBKRI` date DEFAULT NULL,
  `Pendidikan_terakhir` varchar(255) NOT NULL,
  `Kemampuan_bahasa` varchar(255) NOT NULL,
  `Pekerjaan` varchar(255) NOT NULL,
  `Tanggal_mulai_tinggal` date NOT NULL,
  `Tanggal_kepindahan` date DEFAULT NULL,
  `Nama_bapak` varchar(255) NOT NULL,
  `Nama_ibu` varchar(255) NOT NULL,
  `Golongan_darah` varchar(10) NOT NULL,
  `Akseptor_KB` varchar(255) DEFAULT NULL,
  `Catat_menurut_jenis` varchar(255) DEFAULT NULL,
  `Keterangan_lain-lain` text DEFAULT NULL,
  `No_kk` varchar(255) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`NIK`, `Nama`, `Jenis_kelamin`, `Hubungan_kepala_keluarga`, `Tanggal_kelahiran`, `Tempat_lahir`, `Provinsi`, `Status_perkawinan`, `Agama`, `No_SBKRI`, `Tanggal_SBKRI`, `Pendidikan_terakhir`, `Kemampuan_bahasa`, `Pekerjaan`, `Tanggal_mulai_tinggal`, `Tanggal_kepindahan`, `Nama_bapak`, `Nama_ibu`, `Golongan_darah`, `Akseptor_KB`, `Catat_menurut_jenis`, `Keterangan_lain-lain`, `No_kk`, `Alamat`) VALUES
('3273203001010000', 'Ihsan', 'Laki-laki', 'Anak', '2001-03-11', 'Bandung', 'Jawa Barat', 'Belum Menikah', 'Islam', NULL, '1970-01-01', 'D3', 'Indonesia, arab, inggris', 'Pelajar', '2001-03-12', '1970-01-01', 'farhana', 'sri', 'A', 'Tidak', NULL, NULL, '20001', 'sukaasih');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(10) NOT NULL,
  `jenis_surat` varchar(255) NOT NULL,
  `surat_pengantar` varchar(255) NOT NULL,
  `surat_pendukung` varchar(255) DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `alasan` text DEFAULT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `id_pemohon` int(10) NOT NULL,
  `NIK` varchar(255) NOT NULL,
  `id_petugas` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `jenis_surat`, `surat_pengantar`, `surat_pendukung`, `tanggal_selesai`, `status`, `alasan`, `file_surat`, `created_at`, `updated_at`, `id_pemohon`, `NIK`, `id_petugas`) VALUES
(1, 'Surat Pengantar Izin Keramaian', 'ERD (1) (1).pdf', NULL, '2022-07-23', 'Selesai', NULL, 'Form Revisi Sidang M Ichsan.pdf', '2022-07-22', '2022-07-22', 1, '3273203001010000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_petugas` int(15) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `rt` varchar(25) NOT NULL,
  `rw` varchar(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_petugas`, `nama_petugas`, `no_hp`, `roles`, `jabatan`, `rt`, `rw`, `username`, `password`, `deleted_at`) VALUES
(1, 'Supratman', '123', 'Petugas', 'RT', '01', '02', 'rt1', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(2, 'Budiman', '1234', 'Petugas', 'RT', '10', '02', 'rt10', '81dc9bdb52d04dc20036dbd8313ed055', '2022-10-22 14:08:08'),
(3, 'Mandiri2', '082129249584', 'Admin', 'Admin', '03', '05', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(4, 'ihsan', '0987', 'Petugas', 'RT', '2', '3', 'ihsan', '81dc9bdb52d04dc20036dbd8313ed055', '2022-10-22 13:52:39'),
(5, 'testing', '082129', 'Petugas', 'RW', '3', '2', 'test', '81dc9bdb52d04dc20036dbd8313ed055', '2022-10-14 10:22:14'),
(6, 'testing', '3211', 'Petugas', 'RT', '31', '31', '123', '81dc9bdb52d04dc20036dbd8313ed055', '2022-10-19 14:45:55'),
(7, 'test1', '321', 'Petugas', 'RW', '2', '3', '759', '81dc9bdb52d04dc20036dbd8313ed055', '2022-10-19 11:18:45'),
(8, 'superman', '321', 'Petugas', 'RT', '32', '2', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '2022-10-19 11:17:38'),
(9, 'test', '12132', 'Petugas', 'RT', '321', '321', '5432', '81dc9bdb52d04dc20036dbd8313ed055', '2022-10-14 05:27:36'),
(10, 'testing', '21321', 'Petugas', 'RW', '23', '21', 'testing759', '81dc9bdb52d04dc20036dbd8313ed055', '2022-10-19 11:11:25'),
(11, 'testing2', '7422', 'Petugas', 'RW', '1', '2', 'cek', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(12, 'testing20', '082129242384', 'Petugas', 'RT', '1', '1', 'usertest', '81dc9bdb52d04dc20036dbd8313ed055', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `NIK` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_petugas` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`NIK`, `password`, `id_petugas`, `status`, `created_at`, `updated_at`) VALUES
('3273203001010000', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'Aktif', '2022-07-22 09:56:10', '2022-09-21 18:31:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_author` (`id_author`);

--
-- Indexes for table `detail_kartu_keluarga`
--
ALTER TABLE `detail_kartu_keluarga`
  ADD PRIMARY KEY (`No_kk`);

--
-- Indexes for table `detail_ktp`
--
ALTER TABLE `detail_ktp`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dokumen` (`id_petugas`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`NIK`),
  ADD KEY `fk_keluarga` (`No_kk`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_warga` (`NIK`),
  ADD KEY `fk_pemohon` (`id_pemohon`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`NIK`),
  ADD KEY `fk_id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_petugas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_id_author` FOREIGN KEY (`id_author`) REFERENCES `user` (`id_petugas`);

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `fk_dokumen` FOREIGN KEY (`id_petugas`) REFERENCES `user` (`id_petugas`);

--
-- Constraints for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD CONSTRAINT `fk_keluarga` FOREIGN KEY (`No_kk`) REFERENCES `detail_kartu_keluarga` (`No_kk`),
  ADD CONSTRAINT `fk_ktp` FOREIGN KEY (`NIK`) REFERENCES `detail_ktp` (`NIK`);

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `fk_pemohon` FOREIGN KEY (`id_pemohon`) REFERENCES `user` (`id_petugas`),
  ADD CONSTRAINT `fk_warga` FOREIGN KEY (`NIK`) REFERENCES `kartu_keluarga` (`NIK`);

--
-- Constraints for table `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `fk_id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `user` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
