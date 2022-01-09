-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2019 at 05:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(255) NOT NULL,
  `no_account` int(20) NOT NULL,
  `nama_account` varchar(255) NOT NULL,
  `debit` int(50) NOT NULL,
  `kredit` int(50) NOT NULL,
  `jenis_account` varchar(255) NOT NULL,
  `id_jenis` int(20) NOT NULL,
  `ket_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `no_account`, `nama_account`, `debit`, `kredit`, `jenis_account`, `id_jenis`, `ket_account`) VALUES
(4, 2000, 'Other Assets', 0, 0, 'H', 1, 'debit'),
(5, 1200, 'Inventory', 3587500, 0, 'D', 1, 'debit'),
(6, 1300, 'Perlengkapan', 0, 0, 'D', 1, 'debit'),
(7, 1100, 'Kas', -3487500, 0, 'D', 1, 'debit'),
(8, 1000, 'Utang Usaha', 0, 100000, 'D', 2, 'kredit'),
(9, 1000, 'Modal Awal', 0, 0, 'D', 3, 'kredit'),
(10, 1000, 'Penjualan', 0, 0, 'D', 4, 'debit'),
(11, 1000, 'Pembelian', 0, 0, 'D', 5, 'debit'),
(12, 1000, 'Beban Listrik', 0, 0, 'D', 6, 'debit'),
(13, 2000, 'Beban Telepon', 0, 0, 'D', 6, 'debit');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Kelompok 2', 'ahha', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE `beban` (
  `id_transaksi` int(11) NOT NULL,
  `no_transaksi` int(255) NOT NULL,
  `nama_beban` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beban`
--

INSERT INTO `beban` (`id_transaksi`, `no_transaksi`, `nama_beban`, `keterangan`, `tanggal`, `jumlah`, `harga`) VALUES
(8, 123, 'Beban sewa', 'Beban Sewa', '2019-12-12', NULL, 2000000),
(9, 1234, 'Beban Listrik', 'Beban Listrik', '2019-07-02', NULL, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `harga_awal` int(10) DEFAULT NULL,
  `harga_jual` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_barang`, `nama_barang`, `merk`, `type`, `stok`, `harga_awal`, `harga_jual`) VALUES
(1, 'Kertas A4', 'Papper One', 'tipe01', 50, 43000, 45000),
(2, 'Buku Tulis', 'Papper Line', 'tipe02', 77, 2900, 3500),
(3, 'Pena', 'Standart', 'tipe03', 35, 2500, 3500),
(4, 'Tipe X', 'Kenko', 'tipe04', 20, 5500, 6000),
(5, 'Pensil', 'Faber Castell', 'tipe05', 47, 4000, 5500);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(255) NOT NULL,
  `akun1` varchar(255) NOT NULL,
  `akun2` varchar(255) NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `harga_debit` int(255) NOT NULL,
  `harga_kredit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `no_transaksi` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_awal` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `supplier` varchar(250) NOT NULL,
  `banyaknya` int(250) NOT NULL,
  `debit` varchar(255) NOT NULL,
  `kredit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_transaksi`, `tanggal`, `harga_awal`, `keterangan`, `nama_barang`, `supplier`, `banyaknya`, `debit`, `kredit`) VALUES
(1, '2019-07-01', 258000, 'cash', 'Kertas A4', 'Toko 1SIB', 6, 'Inventory', 'Kas'),
(2, '2019-07-19', 8000, 'cash', 'Pensil', 'Toko 1SIB', 2, 'Inventory', 'Kas'),
(3, '2019-07-23', 129000, 'cash', 'Kertas A4', 'Toko 1SIB', 3, 'Inventory', 'Kas');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_beban` int(10) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nama_beban` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `harga` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_beban`, `keterangan`, `nama_beban`, `tanggal`, `harga`) VALUES
(1, 'cash', 'Beban Sewa', '2000-01-12', 10000000),
(2, 'cash', 'Beban Listrik', '2000-05-22', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_transaksi` int(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(255) NOT NULL,
  `harga_jual` int(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `banyaknya` int(50) NOT NULL,
  `debit` varchar(50) NOT NULL,
  `kredit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_transaksi`, `tanggal`, `jumlah`, `harga_jual`, `keterangan`, `nama_barang`, `banyaknya`, `debit`, `kredit`) VALUES
(1, '2017-10-10', 6, 270000, 'cash', 'Kertas A4', 0, 'Kas', 'Utang Usaha'),
(2, '2019-12-12', 3, 10500, 'Buku', 'Buku Tulis', 0, 'Kas', 'Utang Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(255) NOT NULL,
  `id_barang` int(255) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `id_barang`, `nama`, `alamat`, `email`, `no_hp`) VALUES
(1, 0, 'Toko 1SIB', 'Jl. Umban Sari', '1sib@gmail.com', 18573010),
(2, 0, 'Toko Kel2', 'Jl. Rowo Sari', 'kel2@gmail.com', 17573010);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(5) NOT NULL,
  `nama_type` varchar(20) DEFAULT NULL,
  `jenis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `nama_type`, `jenis`) VALUES
(1, 'Asset', 1),
(2, 'Bank', 1),
(3, 'Other Asset', 1),
(4, 'Accounts Receivable', 1),
(5, 'Liability', 2),
(6, 'Accounts Payable', 2),
(7, 'Other Liability', 2),
(8, 'Equity', 3),
(9, 'Income', 4),
(10, 'Cost of sales', 5),
(11, 'Expense', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_beban`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beban`
--
ALTER TABLE `beban`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_beban` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `no_transaksi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
