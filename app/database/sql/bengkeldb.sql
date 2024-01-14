-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 02:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkeldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_user` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.jfif',
  `user_level` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_user`, `userEmail`, `username`, `nama`, `password`, `photo`, `user_level`) VALUES
(2, 'konsumen@gmail.com', 'caca_konsumen', 'caca', 'konsumen', 'default.jfif', 'konsumen'),
(3, 'konsumen@yahoo.com', 'indra_konsumen', 'indra', 'konsumen123', 'default.jfif', 'konsumen'),
(4, 'laurenza@gmail.com', 'Lauren', 'Laurenza', '1234', 'default.jfif', 'konsumen');

-- --------------------------------------------------------

--
-- Table structure for table `account_admin`
--

CREATE TABLE `account_admin` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.jfif',
  `user_level` varchar(255) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_admin`
--

INSERT INTO `account_admin` (`id`, `userEmail`, `username`, `password`, `photo`, `user_level`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin1234', 'default.jfif', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_barcode` varchar(64) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `harga_jual` varchar(100) NOT NULL,
  `stok` varchar(100) NOT NULL,
  `satuan_barang` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `tgl_input` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_barcode`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `stok`, `satuan_barang`, `photo`, `tgl_input`) VALUES
(1, 1, 'BRG0001', 'Oli Top One HP Plus 10W - 40 Synthetic', 'Oli Top One', '445000', '445000', '12', 'PCS', 'oli_top_1.jpg', '24 December 2023, 7:40'),
(2, 1, 'BRG0002', 'Oli Mobil Motul MULTIGRADE D-TURBO 10W30 4L', 'Motul', '341310', '341310', '10', 'PCS', 'motul.jpg', '24 December 2023, 9:03'),
(3, 1, 'BRG0003', 'klkl', 'klkl', '700000', '800000', '10', 'PCS', 'WhatsApp Image 2023-11-12 at 19.24.56 (1).jpeg', '6 January 2024, 15:05');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_konsumen`
--

CREATE TABLE `jadwal_konsumen` (
  `id` int(11) NOT NULL,
  `tanggal_input` varchar(64) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `plat_no` varchar(64) DEFAULT NULL,
  `merk_mobil` varchar(125) DEFAULT NULL,
  `reservasi` varchar(100) DEFAULT NULL,
  `nama_voucher` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_konsumen`
--

INSERT INTO `jadwal_konsumen` (`id`, `tanggal_input`, `nama`, `plat_no`, `merk_mobil`, `reservasi`, `nama_voucher`) VALUES
(1, '2024-01-10T14:30', 'indra', 'BA 3425 JOT', 'Suzuki', 'Tune Up', 'Voucher 20 %'),
(2, '2024-01-02T13:30', 'caca', 'B 3455 A', 'Suzuki', 'Servis Rem', ''),
(12, '2024-01-06T13:33', 'caca', 'B67910', 'honda', 'Spooring Balancing', ''),
(13, '2024-01-06T14:35', 'Laurenza', 'B67910', 'honda', 'Tune Up', 'Voucher 50 %');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `tgl_input` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori_nama`, `tgl_input`) VALUES
(1, 'oli', '24 December 2023, 7:36');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `tanggal_input` varchar(100) NOT NULL,
  `periode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nota_backup`
--

CREATE TABLE `nota_backup` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `tanggal_input` varchar(100) NOT NULL,
  `periode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_backup`
--

INSERT INTO `nota_backup` (`id_nota`, `id_barang`, `jumlah`, `total`, `tanggal_input`, `periode`) VALUES
(1, '1', '2', '890000', '4 January 2024, 15:17', '01-2024'),
(2, '2', '2', '682620', '4 January 2024, 15:20', '01-2024'),
(3, '1', '1', '445000', '4 January 2024, 15:52', '01-2024'),
(4, '2', '1', '341310', '4 January 2024, 15:52', '01-2024'),
(5, '1', '1', '445000', '6 January 2024, 14:20', '01-2024'),
(17, '1', '1', '445000', '6 January 2024, 14:26', '01-2024'),
(18, '2', '1', '341310', '6 January 2024, 14:26', '01-2024'),
(19, '2', '1', '341310', '6 January 2024, 14:51', '01-2024'),
(20, '2', '1', '341310', '6 January 2024, 14:51', '01-2024');

-- --------------------------------------------------------

--
-- Table structure for table `nota_pelanggan`
--

CREATE TABLE `nota_pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `total` varchar(100) NOT NULL,
  `tanggal_input` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(200) NOT NULL,
  `jumlah` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `tanggal_input` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp_kon` varchar(16) NOT NULL,
  `alamat_kon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama`, `telp_kon`, `alamat_kon`) VALUES
(2, 'caca', '123456780', 'jl. gagak no.11'),
(3, 'indra', '123456789', 'jl. merpati putih sulo No. 7A'),
(4, 'Laurenza', '0896676769', 'taman wisma asri 2 blok dd 25 no. 18 rt 05 rw 028 bekasi utara');

-- --------------------------------------------------------

--
-- Table structure for table `sistem`
--

CREATE TABLE `sistem` (
  `id` int(11) NOT NULL,
  `informasi` varchar(100) NOT NULL,
  `beranda` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sistem`
--

INSERT INTO `sistem` (`id`, `informasi`, `beranda`) VALUES
(1, '<p class=\'fs-5\'>Voucher Discount Sistem Bengkel</p>', '<ul class=\"fs-5\">\n<ol type=\"1\">\n<li>Voucher Tidak Tersedia</li>\n<br>\n<li>Voucher 10%</li>\n<br>\n<li>Voucher 15%</li>\n<br>\n<li>Voucher 20%</li>\n<br>\n<li>Voucher 25%</li>\n<br>\n<li>Voucher 50%</li>\n</ol>\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `nama_voucher` varchar(180) NOT NULL,
  `discount` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `nama_voucher`, `discount`) VALUES
(1, 'Voucher Tidak Tersedia', '0'),
(2, 'Voucher 10%', '0.1'),
(3, 'Voucher 15%', '0.15'),
(4, 'Voucher 20 %', '0.2'),
(5, 'Voucher 25 %', '0.25'),
(6, 'Voucher 50 %', '0.5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `jadwal_konsumen`
--
ALTER TABLE `jadwal_konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `nota_backup`
--
ALTER TABLE `nota_backup`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `nota_pelanggan`
--
ALTER TABLE `nota_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `sistem`
--
ALTER TABLE `sistem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `account_admin`
--
ALTER TABLE `account_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_konsumen`
--
ALTER TABLE `jadwal_konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `nota_backup`
--
ALTER TABLE `nota_backup`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nota_pelanggan`
--
ALTER TABLE `nota_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sistem`
--
ALTER TABLE `sistem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
