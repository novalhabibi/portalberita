-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2018 at 05:39 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `materi_portalberita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'noval', '467bae90b19ee6eb379a749cb924f726', 'Noval Habibi');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(30) NOT NULL,
  `aktif` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_lengkap`, `password`, `email`, `aktif`) VALUES
(1, 'Ahmad Firdaus', '202cb962ac59075b964b07152d234b70', 'ahmad@gmail.com', b'1'),
(7, 'Noval H', '202cb962ac59075b964b07152d234b70', 'noval@gmail.com', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `teks_berita` text NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `id_admin` int(11) NOT NULL,
  `dilihat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `id_kategori`, `gambar`, `teks_berita`, `tgl_posting`, `id_admin`, `dilihat`) VALUES
(1, 'Ini Adalah Judul Berita Pertama ', 5, 'olahraga_2.jpg', '<p>Ini Adalah Ini Berita Pertama dll Ini Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dllIni Adalah Ini Berita Pertama dll</p>\r\n', '2018-04-05 14:33:20', 1, 26),
(8, 'Percobaan sekian', 2, 'Screenshot (1).png', '<p>Szfdxgchvjbn</p>\r\n', '2018-04-06 14:50:24', 1, 5),
(13, 'Percobaan sekian', 2, 'Screenshot (2).png', '<p>aefgrhjkhlvyiyl</p>\r\n\r\n<p>vtu</p>\r\n\r\n<p>ivt</p>\r\n\r\n<p>aefgrhjkhlvyiyl</p>\r\n\r\n<p>vtu</p>\r\n\r\n<p>ivt</p>\r\n\r\n<p>aefgrhjkhlvyiyl</p>\r\n\r\n<p>vtu</p>\r\n\r\n<p>ivt</p>\r\n\r\n<p>aefgrhjkhlvyiyl</p>\r\n\r\n<p>vtu</p>\r\n\r\n<p>ivt</p>\r\n\r\n<p>aefgrhjkhlvyiyl</p>\r\n\r\n<p>vtu</p>\r\n\r\n<p>ivt</p>\r\n', '2018-04-02 16:16:35', 1, 5),
(12, 'Percobaan sekian sekian', 2, 'Screenshot (5).png', '<p>zfdxgchvjbknlm;,&#39;olahraga_2olahraga_2olahraga_2</p>\r\n\r\n<p>zfdxgchvjbknlm;,&#39;olahraga_2olahraga_2olahraga_2zfdxgchvjbknlm;,&#39;olahraga_2olahraga_2olahraga_2zfdxgchvjbknlm;,&#39;olahraga_2olahraga_2olahraga_2zfdxgchvjbknlm;,&#39;olahraga_2olahraga_2olahraga_2zfdxgchvjbknlm;,&#39;olahraga_2olahraga_2olahraga_2</p>\r\n', '2018-04-06 16:12:50', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(11) NOT NULL,
  `nm_perusahaan` varchar(100) NOT NULL,
  `isi_iklan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `id_admin` int(11) NOT NULL,
  `hargasewa` double NOT NULL,
  `lamasewa` int(11) NOT NULL,
  `totalharga` double NOT NULL,
  `aktif` bit(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `nm_perusahaan`, `isi_iklan`, `gambar`, `tgl_mulai`, `tgl_akhir`, `id_admin`, `hargasewa`, `lamasewa`, `totalharga`, `aktif`, `email`, `link`) VALUES
(39, 'Persuahaan 12', 'Edit iklan 2', 'Screenshot (1).png', '2018-04-01', '2018-04-01', 1, 200000, 1, 200000, b'0', 'noval7sihabibi@gmail.com', 'http://gg.com');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Politik'),
(2, 'Olahraga'),
(4, 'Pendidikan'),
(5, 'Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_komentar` datetime NOT NULL,
  `isi_komentar` text NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
