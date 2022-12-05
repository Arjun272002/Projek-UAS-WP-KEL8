-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 02:57 PM
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
-- Database: `projek`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `pemesan` varchar(64) NOT NULL,
  `kapster` varchar(128) NOT NULL,
  `tgl_pesan` varchar(45) NOT NULL,
  `jam_pesan` varchar(20) NOT NULL,
  `pembayaran` varchar(64) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `dibooking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kategori`, `pemesan`, `kapster`, `tgl_pesan`, `jam_pesan`, `pembayaran`, `harga`, `dibooking`) VALUES
(61, 'Hair Color', 'Ali', 'Dio ', '04/12/2022', '03:14:26', 'Cash', 'Rp. 100.000', 1),
(62, 'Hair Cut', 'Joko Alex', 'Arjun', '04/12/2022', '12:57:13', 'Debit', 'Rp. 120.000', 1),
(63, 'Hair Color', 'Jabrix', 'Ilham', '04/12/2022', '17:17:07', 'Cash', 'Rp. 100.000', 1),
(65, 'Hair Color', 'Ali', 'Ilham', '05/12/2022', '20:04:40', 'Cash', 'Rp. 100.000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kapster`
--

CREATE TABLE `kapster` (
  `id` int(11) NOT NULL,
  `kapster` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `role_kapster` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapster`
--

INSERT INTO `kapster` (`id`, `kapster`, `tgl_lahir`, `alamat`, `telpon`, `role_kapster`) VALUES
(1, 'Dio ', '2022-11-09', 'Depok', '08123244538', 0),
(2, 'Ferry', '2022-11-12', 'Depok', '08123242346', 0),
(3, 'Arjun', '2022-11-25', 'Depok', '08123244531', 0),
(4, 'Ilham', '1994-10-11', 'Cibinong', '08992222341', 0),
(7, 'Thoriq', '0000-00-00', 'Jakarta', '08123465981', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `kode` varchar(45) NOT NULL,
  `kategori` varchar(45) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `role_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kode`, `kategori`, `harga`, `role_kategori`) VALUES
(12, 'A001', 'Hair Color', 'Rp. 100.000', 0),
(13, 'A002', 'Hair Cut', 'Rp. 120.000', 0),
(14, 'A003', 'Shave', 'Rp. 70.000', 0),
(16, 'A005', 'Krimbat', 'Rp. 90.000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `latihan_autofill`
--

CREATE TABLE `latihan_autofill` (
  `nim` int(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `notelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latihan_autofill`
--

INSERT INTO `latihan_autofill` (`nim`, `nama`, `notelp`) VALUES
(221, 'Thoriq', '0895364300163');

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `id` int(11) NOT NULL,
  `no_pesan` varchar(45) NOT NULL,
  `pemesan` varchar(128) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `telpon` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`id`, `no_pesan`, `pemesan`, `alamat`, `telpon`) VALUES
(1, 'A01', 'Ali', 'Bogor', '0812324453'),
(2, 'A02', 'Jabrix', 'Jakarta', '0812328953'),
(3, 'A03', 'Joko Alex', 'Bekasi', '0812324453');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`) VALUES
(24, 'BR001', 1, '3', '9000', '1 December 2022, 22:01');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `pemesan` varchar(64) NOT NULL,
  `no_pesan` varchar(128) NOT NULL,
  `tgl_penjualan` varchar(20) NOT NULL,
  `jam_penjualan` varchar(20) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(18, 'Thoriq', 'amuhammadthoriq@gmail.com', 'pro1669523248.jpg', '$2y$10$2JyIV6s0BkOQ5zYhKc10M.4PGb2K5IXaMfFSlHfOCaf1xfgW9JGxe', 2, 1, 1667900383),
(20, 'Jali', 'jonokroto@gmail.com', 'pro1668354249.jpg', '$2y$10$P9KdocnZJo.zUyh13k.cg.fyYZ2bt03aKT6wbbMT.mDqCqDaxsoQC', 2, 1, 1668334051),
(21, 'joko', 'joko12@gmail.com', 'default.jpg', '$2y$10$SjIARoeDeRhIbfuD8v8yXORjWnXq/IpFH1Gj/xBLbGSlPC79IWUGu', 2, 1, 1668580189),
(22, 'Ari Untung', 'ariuntung@gmail.com', 'default.jpg', '$2y$10$LKP3MSIni9GiBaF2cxeqIuz.fiaBVXOL8RcRmeN5jL8l4lF2FlbA2', 2, 1, 1670137506);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kapster`
--
ALTER TABLE `kapster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latihan_autofill`
--
ALTER TABLE `latihan_autofill`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `kapster`
--
ALTER TABLE `kapster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `latihan_autofill`
--
ALTER TABLE `latihan_autofill`
  MODIFY `nim` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
