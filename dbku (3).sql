-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jul 2021 pada 21.51
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(5) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(1, 'ANGGI WIDIASTUTI'),
(2, 'ASRI SULASTRI'),
(3, 'DIAN ADI SAPUTRA'),
(4, 'DIANA KAREN'),
(5, 'NOVI MARSKHA'),
(6, 'SINDI AMELIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` decimal(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(1, 1, '0.963'),
(2, 2, '0.933'),
(3, 3, '0.765'),
(4, 4, '0.803'),
(5, 5, '0.755'),
(6, 6, '0.745');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `kode_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` varchar(5) NOT NULL,
  `tipe` enum('cost','benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`, `tipe`) VALUES
(1, 'CI', 'Sikap Spiritual', '0.15', 'benefit'),
(2, 'C2', 'Sikap Sosial', '0.15', 'benefit'),
(3, 'C3', 'Raport', '0.25', 'benefit'),
(4, 'C4', 'Exstrakulikuler', '0.15', 'benefit'),
(5, 'C5', 'Absensi', '0.10', 'benefit'),
(6, 'C6', 'Prestasi', '0.20', 'benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opt_alternatif`
--

CREATE TABLE `opt_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `id_subkriteria` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel ini digunakan agar kriteria nya bisa dinamis';

--
-- Dumping data untuk tabel `opt_alternatif`
--

INSERT INTO `opt_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `id_subkriteria`) VALUES
(1, 1, 1, 13),
(2, 1, 2, 20),
(3, 1, 3, 24),
(4, 1, 4, 30),
(5, 1, 5, 35),
(6, 1, 6, 43),
(7, 2, 1, 12),
(8, 2, 2, 19),
(9, 2, 3, 24),
(10, 2, 4, 31),
(11, 2, 5, 35),
(12, 2, 6, 45),
(13, 3, 1, 12),
(14, 3, 2, 19),
(15, 3, 3, 25),
(16, 3, 4, 30),
(17, 3, 5, 36),
(18, 3, 6, 46),
(19, 4, 1, 12),
(21, 4, 2, 19),
(22, 4, 3, 24),
(23, 4, 4, 30),
(24, 4, 5, 35),
(25, 4, 6, 46),
(26, 5, 1, 12),
(27, 5, 2, 19),
(28, 5, 3, 25),
(29, 5, 4, 30),
(30, 5, 5, 37),
(31, 5, 6, 46),
(32, 6, 1, 12),
(33, 6, 2, 19),
(34, 6, 3, 25),
(35, 6, 4, 30),
(36, 6, 5, 38),
(37, 6, 6, 46);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `bobot` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `bobot`) VALUES
(10, 1, 'Istimewa', '100'),
(11, 1, 'Baik Sekali', '90'),
(12, 1, 'Baik', '80'),
(13, 1, 'Cukup', '70'),
(14, 1, 'Kurang', '60'),
(15, 1, 'Sangat Kurang', '50'),
(17, 2, 'Istimewa', '100'),
(18, 2, 'Baik Sekali', '90'),
(19, 2, 'Baik', '80'),
(20, 2, 'Cukup', '70'),
(21, 2, 'Kurang', '60'),
(22, 2, 'Sangat Kurang', '50'),
(23, 3, 'Istimewa', '100'),
(24, 3, 'Baik Sekali', '90'),
(25, 3, 'Baik', '80'),
(26, 3, 'Cukup', '70'),
(27, 3, 'Kurang', '60'),
(28, 3, 'Sangat Kurang', '50'),
(29, 4, 'Istimewa', '100'),
(30, 4, 'Baik Sekali', '90'),
(31, 4, 'Baik', '80'),
(32, 4, 'Cukup', '70'),
(33, 4, 'Kurang', '60'),
(34, 4, 'Sangat Kurang', '50'),
(35, 5, 'Istimewa', '100'),
(36, 5, 'Baik Sekali', '90'),
(37, 5, 'Baik', '80'),
(38, 5, 'Cukup', '70'),
(39, 5, 'Kurang', '60'),
(40, 5, 'Sangat Kurang', '1'),
(41, 6, 'Istimewa', '100'),
(42, 6, 'Baik Sekali', '90'),
(43, 6, 'Baik', '80'),
(44, 6, 'Cukup', '70'),
(45, 6, 'Kurang', '60'),
(46, 6, 'Sangat Kurang', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb-kehadiran`
--

CREATE TABLE `tb-kehadiran` (
  `id` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jumlah_absen` varchar(5) NOT NULL,
  `keterangan_absen` text NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb-kehadiran`
--

INSERT INTO `tb-kehadiran` (`id`, `nis`, `nama_siswa`, `jumlah_absen`, `keterangan_absen`, `nilai`) VALUES
(1, 35252844, 'ANGGI WIDIASTUTI', '1', 'sakit', '30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbereport`
--

CREATE TABLE `tbereport` (
  `id` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `ket_laporan` text NOT NULL,
  `pelapor` varchar(50) NOT NULL,
  `sanksi` varchar(100) NOT NULL,
  `level` varchar(1) NOT NULL COMMENT '1:sosial, 2:spiritual, 3:raport, 4:exstrakulikuler, 5:kehadiran, 6:prestasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbereport`
--

INSERT INTO `tbereport` (`id`, `nis`, `nama_siswa`, `tanggal`, `kelas`, `ket_laporan`, `pelapor`, `sanksi`, `level`) VALUES
(3, 12345678, 'KIKI ', '2006-08-02', 'XIipa2', 'Telat 20 menit masuk jam pelajaran dan tidak mengikuti jadwal piket kelas', 'Koko', 'potong point 10', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbguru`
--

CREATE TABLE `tbguru` (
  `id` int(11) NOT NULL,
  `nip` int(16) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_telp` int(16) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbguru`
--

INSERT INTO `tbguru` (`id`, `nip`, `nama_guru`, `jabatan`, `no_telp`, `alamat`, `foto`) VALUES
(1, 34567886, 'Budiman', 'Wali murid ', 912345678, 'Jauh disanaa', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsiswa`
--

CREATE TABLE `tbsiswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nisn` int(16) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kel` enum('laki-laki','perempuan') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbsiswa`
--

INSERT INTO `tbsiswa` (`id`, `nama_siswa`, `nisn`, `jurusan`, `tanggal_lahir`, `jenis_kel`, `agama`, `nama_ayah`, `alamat`, `foto`) VALUES
(1, 'Anggi Widiasturi', 35252844, 'TKJ', '2002-02-08', 'laki-laki', 'Islam', 'Toniar', 'Unit 1 kecamtan banyak margo kabupaten tulang bawang Jl.Lintas TImur', 'Blank_diagram.png'),
(6, 'loli', 12114343, 'TKJ', '1999-02-03', 'perempuan', 'Hindu', 'cofee', 'jauuhh', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:guru, 3:siswa, 4:wali',
  `Foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`user_id`, `username`, `password`, `nama`, `email`, `level`, `Foto`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'koko', 'koko@gmail.com', 1, ''),
(3, 'niko', '4cc33a8ae3d9bb448f90bf63a1d4018698b1fb94', 'Niko Saputra', 'niko@gmail.com', 2, ''),
(4, 'putri', 'e328dd94fe3c1a738abfc36279a21010b6bb2bf9', 'Putri Andini', 'putri@gmail.com', 3, ''),
(5, 'slamet', 'f46d744dcb9889ae489b975af44b0f6436619185', 'Slamet Wijaya', 'Slamet@gmail.com', 4, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`user`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ahp`
--

CREATE TABLE `tb_ahp` (
  `id` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nilai_spiritual` varchar(5) NOT NULL,
  `nilai_sosial` varchar(5) NOT NULL,
  `niali_raport` varchar(5) NOT NULL,
  `nilai_exstra` varchar(5) NOT NULL,
  `nilai_kehadiran` varchar(5) NOT NULL,
  `nilai_prestasi` varchar(5) NOT NULL,
  `total` varchar(5) NOT NULL,
  `nilai_EVN` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alkri`
--

CREATE TABLE `tb_alkri` (
  `id` int(11) NOT NULL,
  `alternatif` varchar(50) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `nama_alternatif`) VALUES
('A03', 'Lokasi 3'),
('A02', 'Lokasi 2'),
('A01', 'Lokasi 1'),
('A04', 'ANGGI WIDIASTUTI'),
('A05', 'dfdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ekstrakulikuler`
--

CREATE TABLE `tb_ekstrakulikuler` (
  `id` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jumblah_exstra` varchar(5) NOT NULL,
  `nama exstra` varchar(50) NOT NULL,
  `nilai_exstra` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ekstrakulikuler`
--

INSERT INTO `tb_ekstrakulikuler` (`id`, `nis`, `nama_siswa`, `jumblah_exstra`, `nama exstra`, `nilai_exstra`) VALUES
(1, 35252844, 'ANGGI WIDIASTUTI', '2', 'pendidikan pramuka, pramuka', '90');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasilahp`
--

CREATE TABLE `tb_hasilahp` (
  `id` int(11) NOT NULL,
  `alternatif` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `evn` int(11) NOT NULL,
  `e-max` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `cr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`) VALUES
('C02', 'SIKAP SOSIAL'),
('C01', 'SIKAP SPIRITUAL'),
('C03', 'RAPORT'),
('C04', 'EXSTRAKULIKULER'),
('C05', 'KEHADIRAN'),
('C06', 'PRESTASI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perbandinganalternatif`
--

CREATE TABLE `tb_perbandinganalternatif` (
  `id` int(11) NOT NULL,
  `alternatif` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perbandingankriteria`
--

CREATE TABLE `tb_perbandingankriteria` (
  `id` int(11) NOT NULL,
  `kriteria` int(11) NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nama_lomba` text NOT NULL,
  `tingkat_lomba` varchar(30) NOT NULL,
  `status_lomba` varchar(30) NOT NULL,
  `nilai_prestasi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prosessaw`
--

CREATE TABLE `tb_prosessaw` (
  `id` int(11) NOT NULL,
  `alternatif` varchar(100) NOT NULL,
  `nilai_c1` int(11) NOT NULL,
  `nilai_c2` int(11) NOT NULL,
  `nilai_c3` int(11) NOT NULL,
  `nilai_c4` int(11) NOT NULL,
  `nilai_c5` int(11) NOT NULL,
  `nilai_c6` int(11) NOT NULL,
  `Hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_raport`
--

CREATE TABLE `tb_raport` (
  `id_r` int(11) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `nis` int(16) NOT NULL,
  `kkm` varchar(5) NOT NULL,
  `nilai_ketrampilan` varchar(5) NOT NULL,
  `nilai_pengetahuan` varchar(5) NOT NULL,
  `nilai_raport` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rel_alternatif`
--

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL,
  `kode1` varchar(16) DEFAULT NULL,
  `kode2` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rel_alternatif`
--

INSERT INTO `tb_rel_alternatif` (`ID`, `kode1`, `kode2`, `kode_kriteria`, `nilai`) VALUES
(382, 'A03', 'A02', 'C05', 0.5),
(381, 'A03', 'A01', 'C05', 1),
(378, 'A02', 'A03', 'C05', 2),
(303, 'A02', 'A03', 'C02', 3),
(302, 'A02', 'A02', 'C02', 1),
(301, 'A02', 'A01', 'C02', 0.5),
(323, 'A01', 'A03', 'C03', 1),
(322, 'A01', 'A02', 'C03', 2),
(347, 'A01', 'A02', 'C04', 2),
(346, 'A01', 'A01', 'C04', 1),
(377, 'A02', 'A02', 'C05', 1),
(376, 'A02', 'A01', 'C05', 0.25),
(298, 'A01', 'A03', 'C02', 4),
(297, 'A01', 'A02', 'C02', 2),
(296, 'A01', 'A01', 'C02', 1),
(321, 'A01', 'A01', 'C03', 1),
(358, 'A03', 'A03', 'C04', 1),
(373, 'A01', 'A03', 'C05', 1),
(372, 'A01', 'A02', 'C05', 4),
(357, 'A03', 'A02', 'C04', 0.16666666666666666),
(283, 'A03', 'A03', 'C01', 1),
(282, 'A03', 'A02', 'C01', 0.5),
(281, 'A03', 'A01', 'C01', 0.3333333333333333),
(371, 'A01', 'A01', 'C05', 1),
(356, 'A03', 'A01', 'C04', 0.3333333333333333),
(353, 'A02', 'A03', 'C04', 6),
(352, 'A02', 'A02', 'C04', 1),
(351, 'A02', 'A01', 'C04', 0.5),
(348, 'A01', 'A03', 'C04', 3),
(333, 'A03', 'A03', 'C03', 1),
(332, 'A03', 'A02', 'C03', 0.5),
(331, 'A03', 'A01', 'C03', 1),
(328, 'A02', 'A03', 'C03', 2),
(327, 'A02', 'A02', 'C03', 1),
(326, 'A02', 'A01', 'C03', 0.5),
(308, 'A03', 'A03', 'C02', 1),
(307, 'A03', 'A02', 'C02', 0.3333333333333333),
(306, 'A03', 'A01', 'C02', 0.25),
(278, 'A02', 'A03', 'C01', 2),
(277, 'A02', 'A02', 'C01', 1),
(276, 'A02', 'A01', 'C01', 0.3333333333333333),
(273, 'A01', 'A03', 'C01', 3),
(272, 'A01', 'A02', 'C01', 3),
(271, 'A01', 'A01', 'C01', 1),
(383, 'A03', 'A03', 'C05', 1),
(396, 'A04', 'A01', 'C01', 0.16666666666666666),
(397, 'A04', 'A02', 'C01', 1),
(398, 'A04', 'A03', 'C01', 1),
(399, 'A04', 'A04', 'C01', 1),
(400, 'A01', 'A04', 'C01', 6),
(401, 'A02', 'A04', 'C01', 1),
(402, 'A03', 'A04', 'C01', 1),
(403, 'A04', 'A01', 'C02', 1),
(404, 'A04', 'A02', 'C02', 1),
(405, 'A04', 'A03', 'C02', 0.25),
(406, 'A04', 'A04', 'C02', 1),
(407, 'A01', 'A04', 'C02', 1),
(408, 'A02', 'A04', 'C02', 1),
(409, 'A03', 'A04', 'C02', 4),
(410, 'A04', 'A01', 'C03', 1),
(411, 'A04', 'A02', 'C03', 1),
(412, 'A04', 'A03', 'C03', 1),
(413, 'A04', 'A04', 'C03', 1),
(414, 'A01', 'A04', 'C03', 1),
(415, 'A02', 'A04', 'C03', 1),
(416, 'A03', 'A04', 'C03', 1),
(417, 'A04', 'A01', 'C04', 1),
(418, 'A04', 'A02', 'C04', 1),
(419, 'A04', 'A03', 'C04', 1),
(420, 'A04', 'A04', 'C04', 1),
(421, 'A01', 'A04', 'C04', 1),
(422, 'A02', 'A04', 'C04', 1),
(423, 'A03', 'A04', 'C04', 1),
(424, 'A04', 'A01', 'C05', 1),
(425, 'A04', 'A02', 'C05', 1),
(426, 'A04', 'A03', 'C05', 1),
(427, 'A04', 'A04', 'C05', 1),
(428, 'A01', 'A04', 'C05', 1),
(429, 'A02', 'A04', 'C05', 1),
(430, 'A03', 'A04', 'C05', 1),
(447, 'A01', 'A01', 'C06', 1),
(448, 'A01', 'A02', 'C06', 1),
(449, 'A01', 'A03', 'C06', 1),
(450, 'A01', 'A04', 'C06', 1),
(451, 'A02', 'A01', 'C06', 1),
(452, 'A02', 'A02', 'C06', 1),
(453, 'A02', 'A03', 'C06', 1),
(454, 'A02', 'A04', 'C06', 1),
(455, 'A03', 'A01', 'C06', 1),
(456, 'A03', 'A02', 'C06', 1),
(457, 'A03', 'A03', 'C06', 1),
(458, 'A03', 'A04', 'C06', 1),
(459, 'A04', 'A01', 'C06', 1),
(460, 'A04', 'A02', 'C06', 1),
(461, 'A04', 'A03', 'C06', 1),
(462, 'A04', 'A04', 'C06', 1),
(727, 'A05', 'A04', 'C06', 1),
(726, 'A05', 'A03', 'C06', 1),
(725, 'A05', 'A02', 'C06', 1),
(724, 'A05', 'A01', 'C06', 1),
(718, 'A05', 'A04', 'C05', 1),
(719, 'A05', 'A05', 'C05', 1),
(720, 'A01', 'A05', 'C05', 1),
(721, 'A02', 'A05', 'C05', 1),
(722, 'A03', 'A05', 'C05', 1),
(723, 'A04', 'A05', 'C05', 1),
(717, 'A05', 'A03', 'C05', 1),
(716, 'A05', 'A02', 'C05', 1),
(715, 'A05', 'A01', 'C05', 1),
(713, 'A03', 'A05', 'C04', 1),
(714, 'A04', 'A05', 'C04', 1),
(712, 'A02', 'A05', 'C04', 1),
(708, 'A05', 'A03', 'C04', 1),
(709, 'A05', 'A04', 'C04', 1),
(710, 'A05', 'A05', 'C04', 1),
(711, 'A01', 'A05', 'C04', 1),
(707, 'A05', 'A02', 'C04', 1),
(706, 'A05', 'A01', 'C04', 1),
(705, 'A04', 'A05', 'C03', 1),
(704, 'A03', 'A05', 'C03', 1),
(703, 'A02', 'A05', 'C03', 1),
(702, 'A01', 'A05', 'C03', 1),
(701, 'A05', 'A05', 'C03', 1),
(700, 'A05', 'A04', 'C03', 1),
(697, 'A05', 'A01', 'C03', 1),
(698, 'A05', 'A02', 'C03', 1),
(699, 'A05', 'A03', 'C03', 1),
(696, 'A04', 'A05', 'C02', 1),
(690, 'A05', 'A03', 'C02', 1),
(691, 'A05', 'A04', 'C02', 1),
(692, 'A05', 'A05', 'C02', 1),
(693, 'A01', 'A05', 'C02', 1),
(694, 'A02', 'A05', 'C02', 1),
(695, 'A03', 'A05', 'C02', 1),
(689, 'A05', 'A02', 'C02', 1),
(688, 'A05', 'A01', 'C02', 1),
(687, 'A04', 'A05', 'C01', 1),
(686, 'A03', 'A05', 'C01', 1),
(682, 'A05', 'A04', 'C01', 1),
(683, 'A05', 'A05', 'C01', 1),
(684, 'A01', 'A05', 'C01', 1),
(685, 'A02', 'A05', 'C01', 1),
(681, 'A05', 'A03', 'C01', 1),
(680, 'A05', 'A02', 'C01', 1),
(679, 'A05', 'A01', 'C01', 1),
(732, 'A04', 'A05', 'C06', 1),
(731, 'A03', 'A05', 'C06', 1),
(730, 'A02', 'A05', 'C06', 1),
(729, 'A01', 'A05', 'C06', 1),
(728, 'A05', 'A05', 'C06', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rel_kriteria`
--

CREATE TABLE `tb_rel_kriteria` (
  `ID` int(11) NOT NULL,
  `ID1` varchar(16) DEFAULT NULL,
  `ID2` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rel_kriteria`
--

INSERT INTO `tb_rel_kriteria` (`ID`, `ID1`, `ID2`, `nilai`) VALUES
(91, 'C05', 'C01', 0.333333333),
(87, 'C04', 'C04', 1),
(88, 'C01', 'C04', 1),
(89, 'C02', 'C04', 1),
(90, 'C03', 'C04', 5),
(75, 'C01', 'C01', 1),
(77, 'C02', 'C02', 1),
(78, 'C01', 'C02', 1),
(79, 'C03', 'C01', 5),
(80, 'C03', 'C02', 5),
(81, 'C03', 'C03', 1),
(82, 'C01', 'C03', 0.2),
(83, 'C02', 'C03', 0.2),
(84, 'C04', 'C01', 1),
(85, 'C04', 'C02', 1),
(86, 'C04', 'C03', 0.2),
(76, 'C02', 'C01', 1),
(99, 'C04', 'C05', 3),
(98, 'C03', 'C05', 7),
(97, 'C02', 'C05', 3),
(96, 'C01', 'C05', 3),
(95, 'C05', 'C05', 1),
(94, 'C05', 'C04', 0.333333333),
(93, 'C05', 'C03', 0.142857142),
(92, 'C05', 'C02', 0.333333333),
(111, 'C06', 'C01', 3),
(112, 'C06', 'C02', 3),
(113, 'C06', 'C03', 0.333333333),
(114, 'C06', 'C04', 3),
(115, 'C06', 'C05', 5),
(116, 'C06', 'C06', 1),
(117, 'C01', 'C06', 0.333333333),
(118, 'C02', 'C06', 0.333333333),
(119, 'C03', 'C06', 3),
(120, 'C04', 'C06', 0.333333333),
(121, 'C05', 'C06', 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saw`
--

CREATE TABLE `tb_saw` (
  `id` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nilai_spiritual` varchar(5) NOT NULL,
  `nilai_sosial` varchar(5) NOT NULL,
  `niali_raport` varchar(5) NOT NULL,
  `nilai_exstra` varchar(5) NOT NULL,
  `nilai_kehadiran` varchar(5) NOT NULL,
  `nilai_prestasi` varchar(5) NOT NULL,
  `hasil` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sosial`
--

CREATE TABLE `tb_sosial` (
  `id` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `indikator1` text NOT NULL,
  `indikator2` text NOT NULL,
  `nilai_sosial` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spiritual`
--

CREATE TABLE `tb_spiritual` (
  `id` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `indikator` text NOT NULL,
  `nilai_spiritual` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ternormalisasi`
--

CREATE TABLE `tb_ternormalisasi` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `ri` int(11) NOT NULL,
  `alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `tb-kehadiran`
--
ALTER TABLE `tb-kehadiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tbereport`
--
ALTER TABLE `tbereport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbguru`
--
ALTER TABLE `tbguru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_ahp`
--
ALTER TABLE `tb_ahp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_alkri`
--
ALTER TABLE `tb_alkri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `tb_ekstrakulikuler`
--
ALTER TABLE `tb_ekstrakulikuler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_hasilahp`
--
ALTER TABLE `tb_hasilahp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_perbandinganalternatif`
--
ALTER TABLE `tb_perbandinganalternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_perbandingankriteria`
--
ALTER TABLE `tb_perbandingankriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_prosessaw`
--
ALTER TABLE `tb_prosessaw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_raport`
--
ALTER TABLE `tb_raport`
  ADD PRIMARY KEY (`id_r`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_rel_kriteria`
--
ALTER TABLE `tb_rel_kriteria`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_saw`
--
ALTER TABLE `tb_saw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_sosial`
--
ALTER TABLE `tb_sosial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_spiritual`
--
ALTER TABLE `tb_spiritual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_ternormalisasi`
--
ALTER TABLE `tb_ternormalisasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `opt_alternatif`
--
ALTER TABLE `opt_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tb-kehadiran`
--
ALTER TABLE `tb-kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbereport`
--
ALTER TABLE `tbereport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbguru`
--
ALTER TABLE `tbguru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbsiswa`
--
ALTER TABLE `tbsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_ahp`
--
ALTER TABLE `tb_ahp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_alkri`
--
ALTER TABLE `tb_alkri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_ekstrakulikuler`
--
ALTER TABLE `tb_ekstrakulikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_hasilahp`
--
ALTER TABLE `tb_hasilahp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_perbandinganalternatif`
--
ALTER TABLE `tb_perbandinganalternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_perbandingankriteria`
--
ALTER TABLE `tb_perbandingankriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_prosessaw`
--
ALTER TABLE `tb_prosessaw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_raport`
--
ALTER TABLE `tb_raport`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=733;
--
-- AUTO_INCREMENT for table `tb_rel_kriteria`
--
ALTER TABLE `tb_rel_kriteria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `tb_saw`
--
ALTER TABLE `tb_saw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_sosial`
--
ALTER TABLE `tb_sosial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_spiritual`
--
ALTER TABLE `tb_spiritual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_ternormalisasi`
--
ALTER TABLE `tb_ternormalisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
