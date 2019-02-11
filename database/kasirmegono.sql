-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Jan 2019 pada 15.45
-- Versi Server: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kasirmegono`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `status`) VALUES
(11000001, 'Super Admin', 'admin', 'pass', 'admin_pusat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
`id_detail_pemesanan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(30) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail_pemesanan`, `id_pemesanan`, `id_produk`, `jumlah_produk`, `harga`) VALUES
(1, 55000008, 44000002, 2, 10000),
(2, 55000008, 44000004, 1, 3000),
(3, 55000009, 44000002, 2, 10000),
(4, 55000009, 44000004, 1, 3000),
(5, 55000010, 44000002, 2, 10000),
(6, 55000010, 44000004, 1, 3000),
(7, 55000011, 44000002, 2, 10000),
(8, 55000011, 44000004, 1, 3000),
(9, 55000012, 44000003, 1, 7000),
(10, 55000012, 44000004, 2, 3000),
(11, 55000013, 44000003, 1, 7000),
(12, 55000013, 44000004, 1, 3000),
(13, 55000014, 44000004, 2, 3000),
(14, 55000014, 44000002, 1, 10000),
(15, 55000014, 44000001, 1, 2000),
(16, 55000014, 44000003, 2, 7000),
(17, 55000015, 44000001, 1, 2000),
(18, 55000015, 44000002, 1, 10000),
(19, 55000016, 44000001, 1, 2000),
(20, 55000016, 44000003, 1, 7000),
(21, 55000017, 44000002, 1, 10000),
(22, 55000017, 44000004, 1, 3000),
(23, 55000018, 44000002, 1, 10000),
(24, 55000018, 44000004, 1, 3000),
(25, 55000019, 44000002, 1, 10000),
(26, 55000019, 44000004, 1, 3000),
(27, 55000020, 44000002, 2, 10000),
(28, 55000020, 44000004, 1, 3000),
(29, 55000021, 44000002, 1, 10000),
(30, 55000021, 44000004, 1, 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama_kasir` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `handphone` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `email`, `password`, `handphone`, `alamat`) VALUES
(33000001, 'bagio', 'kasir', 'pass', '080012344321', 'Jl kenangan, condong catur, sleman'),
(33000002, 'dev', 'developer', 'pass', 'super admin', 'condong kekiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE IF NOT EXISTS `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama_mitra` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`, `email`, `password`) VALUES
(22000001, 'mitra concat', 'mitra', 'pass'),
(22000002, 'himboss', 'bos@megono.com', 'pass'),
(22000003, 'Bedes', 'bedes', 'pass'),
(22000006, 'dev', 'test cuk', 'pass');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `total_harga` int(50) NOT NULL,
  `bayar` int(50) NOT NULL,
  `kembalian` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `waktu`, `jumlah`, `id_kasir`, `total_harga`, `bayar`, `kembalian`) VALUES
(55000005, '2018-12-04, 1:51', 3, 33000001, 23000, 30000, 7000),
(55000006, '2018-12-04, 1:51', 3, 33000001, 23000, 30000, 7000),
(55000007, '2018-12-04, 1:51', 3, 33000001, 23000, 30000, 7000),
(55000008, '2018-12-04, 1:51', 3, 33000001, 23000, 30000, 7000),
(55000009, '2018-12-04, 1:51', 3, 33000001, 23000, 30000, 7000),
(55000011, '2018-12-06, 6:14', 3, 33000001, 23000, 30000, 7000),
(55000013, '2018-12-06, 6:23', 2, 33000001, 10000, 20000, 10000),
(55000014, '2018-12-10, 14:13', 6, 33000001, 32000, 50000, 18000),
(55000015, '2018-12-15, 10:49', 2, 33000001, 12000, 15000, 3000),
(55000016, '2018-12-16, 19:46', 2, 33000001, 11000, 20000, 9000),
(55000018, '2019-01-09, 20:44', 2, 22000001, 13000, 13000, 0),
(55000019, '2019-01-15, 24:27', 2, 22000001, 13000, 20000, 7000),
(55000020, '2019-01-15, 01:43', 3, 22000001, 23000, 50000, 27000),
(55000021, '2019-01-22, 21:48', 2, 33000001, 13000, 13000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `gambar_produk` varchar(20) NOT NULL,
  `harga` int(30) NOT NULL,
  `harga_gojek` int(30) NOT NULL,
  `harga_grab` int(30) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar_produk`, `harga`, `harga_gojek`, `harga_grab`, `kategori`) VALUES
(44000001, 'Es teh', '44000001.jpg', 2000, 3000, 4000, 'Minuman'),
(44000002, 'Ayam geprek', '44000002.jpg', 10000, 11000, 12000, 'Makanan'),
(44000003, 'Sego megono', '44000003.jpg', 7000, 8000, 9000, 'Makanan'),
(44000004, 'Es jeruk', '44000004.jpg', 3000, 4000, 5000, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
  `id_reward` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `jumlah_poin` varchar(50) NOT NULL,
  `hadiah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reward`
--

INSERT INTO `reward` (`id_reward`, `id_mitra`, `jumlah_poin`, `hadiah`) VALUES
(66000003, 22000006, '200', '100.000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
 ADD PRIMARY KEY (`id_detail_pemesanan`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
 ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
 ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
 ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
 ADD PRIMARY KEY (`id_reward`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
