-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2022 pada 08.54
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_siswa` (IN `nama` VARCHAR(50))  NO SQL
SELECT * FROM siswa WHERE nama_siswa LIKE concat('%',nama,'%')$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `daftar_siswa` (`nama` VARCHAR(50)) RETURNS INT(11) NO SQL
BEGIN
set @count = (SELECT count(8) from siswa WHERE nama_siswa like concat('%',nama,'%'));
RETURN @count;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(3) NOT NULL,
  `kode_admin` int(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id_admin`, `kode_admin`, `password`) VALUES
(1, 123, '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(18) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `jk`, `alamat`, `password`) VALUES
('101010', 'Mochamad Farhan', 'L', 'BOGOR', 'farhan'),
('1919', 'hikmat', 'P', 'BOGOR', 'hikmat');

--
-- Trigger `guru`
--
DELIMITER $$
CREATE TRIGGER `hapus` AFTER DELETE ON `guru` FOR EACH ROW BEGIN
INSERT INTO log
SET log_nama = 'hapus data guru',
nama = old.nama_guru,
waktu = now();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_guru` AFTER INSERT ON `guru` FOR EACH ROW BEGIN
INSERT INTO log
SET log_nama = 'tambah data guru',
nama = new.nama_guru,
waktu = now();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(3) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'RPL'),
(3, 'MM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(3) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `id_jurusan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_jurusan`) VALUES
(1, 'XII RPL 2', 1),
(2, 'XI RPL 1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(8) NOT NULL,
  `log_nama` char(100) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `log_nama`, `nama`, `waktu`) VALUES
(1, 'tambah data guru', 'FARHAN', '2022-03-21 10:12:39'),
(2, 'tambah data guru', 'fani', '2022-03-21 10:20:49'),
(3, 'hapus data guru', 'fani', '2022-03-21 10:20:52'),
(4, 'tambah data guru', 'FANI', '2022-03-21 13:38:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(3) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(2, 'BINDO'),
(3, 'PBO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar`
--

CREATE TABLE `mengajar` (
  `id_mengajar` int(3) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_mapel` int(3) NOT NULL,
  `id_kelas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mengajar`
--

INSERT INTO `mengajar` (`id_mengajar`, `nip`, `id_mapel`, `id_kelas`) VALUES
(2, '101010', 3, 2),
(3, '1919', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(3) NOT NULL,
  `id_mengajar` int(3) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `uh` double NOT NULL,
  `uts` double NOT NULL,
  `uas` double NOT NULL,
  `na` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_mengajar`, `nis`, `uh`, `uts`, `uas`, `na`) VALUES
(1, 2, '1019009099', 60, 80, 50, 63),
(2, 3, '1019009097', 80, 80, 80, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `id_kelas` int(3) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `jk`, `alamat`, `id_kelas`, `password`) VALUES
('1019009097', 'MOCHAMAD FARHAN', 'L', 'BOGOR', 1, 'farhan'),
('1019009099', 'DAMAR RAMADIANSYAH', 'L', 'BOGOR', 2, 'damar');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vnilai`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vnilai` (
`nama_siswa` varchar(100)
,`nama_guru` varchar(100)
,`nama_kelas` varchar(100)
,`nama_mapel` varchar(100)
,`nama_jurusan` varchar(100)
,`uh` double
,`uts` double
,`uas` double
,`na` double
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vnilai`
--
DROP TABLE IF EXISTS `vnilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vnilai`  AS SELECT `g`.`nama_siswa` AS `nama_siswa`, `c`.`nama_guru` AS `nama_guru`, `e`.`nama_kelas` AS `nama_kelas`, `d`.`nama_mapel` AS `nama_mapel`, `f`.`nama_jurusan` AS `nama_jurusan`, `a`.`uh` AS `uh`, `a`.`uts` AS `uts`, `a`.`uas` AS `uas`, `a`.`na` AS `na` FROM ((((((`nilai` `a` left join `mengajar` `b` on(`a`.`id_mengajar` = `b`.`id_mengajar`)) left join `guru` `c` on(`b`.`nip` = `c`.`nip`)) left join `mapel` `d` on(`b`.`id_mapel` = `d`.`id_mapel`)) left join `kelas` `e` on(`b`.`id_kelas` = `e`.`id_kelas`)) left join `jurusan` `f` on(`e`.`id_jurusan` = `f`.`id_jurusan`)) left join `siswa` `g` on(`a`.`nis` = `g`.`nis`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_mengajar` (`id_mengajar`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_mengajar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
