-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 04:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `florist`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `id_bunga` varchar(20) DEFAULT NULL,
  `gb_bunga` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_cart` int(11) DEFAULT NULL COMMENT 'Total Harga cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_bunga`, `gb_bunga`, `jumlah`, `harga_cart`) VALUES
(1, 'UF00000002', 'B00000001', '', 2, 4400000),
(2, 'UF00000002', 'B00000002', '', 3, 8100000),
(6, 'UF00000012', 'B00000003', 'SaphireSkiesBouquet.jpg', 10, 20000000),
(7, 'UF00000012', '', '', 0, 0),
(8, 'UF00000012', '', '', 0, 0),
(15, 'UF00000012', 'B00000019', 'SpringSunshine.jpg', 5, 4750000),
(19, 'UF00000010', 'B00000017', 'OneHundredRomanticRedRoses.jpg', 2, 3000000),
(20, 'UF00000010', '', '', 0, 0),
(21, 'UF00000010', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `custom_order`
--

CREATE TABLE `custom_order` (
  `id_user` char(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `order_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_order`
--

INSERT INTO `custom_order` (`id_user`, `nama_lengkap`, `email`, `phone_number`, `order_message`) VALUES
('', '', 'icha.nugraha@students.amikom.ac.id', 2147483647, '0'),
('UF00000012', 'zz', 'icha.nugraha@students.amikom.ac.id', 2147483647, 'xx'),
('UF00000012', 'zz', 'icha.nugraha@students.amikom.ac.id', 2147483647, 'oke'),
('UF00000013', 'user1', 'icha.nugraha@students.amikom.ac.id', 2147483647, 'ccc');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id_pembayaran` char(20) NOT NULL,
  `id_bunga` char(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id_pembayaran`, `id_bunga`, `jumlah`, `harga`) VALUES
('BY000000002', 'B00000003', 1, 2000000),
('BY000000003', 'B00000003', 2, 4000000),
('BY000000004', 'B00000023', 4, 3800000),
('BY000000004', 'B00000022', 6, 10200000),
('BY000000005', 'B00000001', 5, 11000000),
('BY000000005', 'B00000020', 6, 13200000),
('BY000000006', 'B00000019', 5, 4750000),
('BY000000006', 'B00000018', 3, 4950000),
('BY000000007', 'B00000019', 5, 4750000),
('BY000000007', 'B00000018', 3, 4950000),
('BY000000008', 'B00000018', 3, 4950000),
('BY000000008', 'B00000021', 2, 1900000),
('BY000000009', 'B00000023', 9, 8550000),
('BY000000009', 'B00000022', 5, 8500000);

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale`
--

CREATE TABLE `flash_sale` (
  `id_flash_sale` bigint(20) NOT NULL,
  `flash_start` datetime NOT NULL,
  `flash_end` datetime NOT NULL,
  `default_discount` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flash_sale`
--

INSERT INTO `flash_sale` (`id_flash_sale`, `flash_start`, `flash_end`, `default_discount`) VALUES
(5, '2022-01-10 09:21:00', '2022-01-28 09:21:00', 20),
(6, '2022-01-10 09:33:00', '2022-01-11 09:33:00', 20),
(7, '2022-01-10 23:08:00', '2022-01-29 23:08:00', 30),
(8, '2022-01-11 14:35:00', '2022-01-14 14:36:00', 40);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('K-001', 'Buket'),
('K-002', 'Vas'),
('K-003', 'Blossom Box'),
('K-004', 'Acrylic Blossom Box');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` char(20) NOT NULL,
  `id_user` char(20) NOT NULL,
  `total_harga_pembayaran` int(11) DEFAULT NULL,
  `tgl_pembayaran` datetime DEFAULT NULL,
  `expired` datetime DEFAULT NULL,
  `jenis_pembayaran` enum('bayar ditempat','transfer bank') DEFAULT NULL,
  `status` enum('sudah dibayar','belum dibayar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `total_harga_pembayaran`, `tgl_pembayaran`, `expired`, `jenis_pembayaran`, `status`) VALUES
('BY000000002', 'UF00000002', 2000000, '2022-01-10 18:47:05', '2022-01-11 18:47:05', 'bayar ditempat', 'belum dibayar'),
('BY000000003', 'UF00000012', 4000000, '2022-01-10 22:34:50', '2022-01-11 22:34:50', '', 'belum dibayar'),
('BY000000004', 'UF00000002', 14000000, '2022-01-10 23:43:39', '2022-01-11 23:43:39', 'bayar ditempat', 'belum dibayar'),
('BY000000005', 'UF00000002', 24200000, '2022-01-10 23:47:40', '2022-01-11 23:47:40', 'bayar ditempat', 'belum dibayar'),
('BY000000006', '', 9700000, '2022-01-11 00:32:14', '2022-01-12 00:32:14', 'bayar ditempat', 'belum dibayar'),
('BY000000007', 'UF00000012', 9700000, '2022-01-11 00:33:53', '2022-01-12 00:33:53', 'bayar ditempat', 'belum dibayar'),
('BY000000008', 'UF00000012', 6850000, '2022-01-11 00:35:58', '2022-01-12 00:35:58', 'bayar ditempat', 'belum dibayar'),
('BY000000009', 'UF00000013', 17050000, '2022-01-11 14:41:45', '2022-01-12 14:41:45', '', 'sudah dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `prodak_bunga`
--

CREATE TABLE `prodak_bunga` (
  `id_bunga` varchar(20) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `nama_bunga` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gb_bunga` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodak_bunga`
--

INSERT INTO `prodak_bunga` (`id_bunga`, `id_kategori`, `nama_bunga`, `harga`, `stok`, `gb_bunga`, `created_at`, `deskripsi`) VALUES
('19999', 'K-001', 'cinta', 47000, 30, '0.85034100 1641736481coffe11.jpg', '2022-01-09 20:51:00', ''),
('B00000001', 'K-001', 'Romantic Autumn', 2200000, 45, 'RomanticAutumn.jpg', '2021-12-12 17:11:01', 'Terbuat dari bunga mawar, Baby\'s Breath, Tulip, Bunga Carnation, Bunga Daisy, Bunga Calla Lily, Bunga Gardenia, Bunga Anggrek'),
('B00000002', 'K-001', 'Wonderfull Garden Spirit', 2700000, 50, 'WonderfullGardenSpirit.jpg', '2021-12-12 15:11:28', ''),
('B00000003', 'K-001', 'Saphire Skies Bouquet', 2000000, 48, 'SaphireSkiesBouquet.jpg', '2021-12-12 18:11:52', ''),
('B00000004', 'K-001', 'Kristina Bouquet', 2500000, 50, 'KristinaBouquet.jpg', '2021-12-12 18:12:07', ''),
('B00000005', 'K-002', 'Green Bloom Vase', 1200000, 50, 'GreenBloomVase.jpg', '2021-12-12 18:12:12', ''),
('B00000006', 'K-002', 'Summer Sunshine Luxury Vase', 2800000, 50, 'SummerSunshineLuxuryVase.jpg', '2021-12-12 18:12:13', ''),
('B00000007', 'K-002', 'Josephine Vase', 2500000, 50, 'JosephineVase.jpg', '2021-12-12 18:12:12', ''),
('B00000008', 'K-002', 'Luxury Red Scarlet Vase', 2800000, 50, 'LuxuryRedScarletVase.jpg', '2021-12-12 18:11:27', ''),
('B00000009', 'K-003', 'Sweet Estelle Blooming Basket', 2950000, 50, 'SweetEstelleBloomingBasket.jpg', '2021-12-12 18:13:31', ''),
('B00000010', 'K-003', 'Basket Full Of Sunshine', 1800000, 50, 'BasketFullOfSunshine.jpg', '2021-12-12 18:11:37', ''),
('B00000011', 'K-003', 'Juliet Flower Basket', 2200000, 50, 'JulietFlowerBasket.jpg', '2021-12-12 18:10:43', ''),
('B00000012', 'K-003', 'Blooming Fuchsia Blossom Box', 1800000, 50, 'BloomingFuchsiaBlossomBox.jpg', '2021-12-12 18:11:49', ''),
('B00000013', 'K-004', 'Tulic Lace Festival Acrylic Blossom Box', 1650000, 50, 'tuliplacefestivalacrylicblossombox.jpg', '2021-12-12 13:12:55', ''),
('B00000014', 'K-004', 'Acrylic Blossom Box In Soft Pink', 1200000, 50, 'acrylicblossomboxinsoftpink.jpg', '2021-12-12 12:13:02', ''),
('B00000015', 'K-004', 'Acrylic Blossom Box In Pink', 1200000, 50, 'acrylicblossomboxinpink.jpg', '2021-12-12 18:13:13', ''),
('B00000016', 'K-001', 'Majestic Colorful Baby Breath', 1900000, 50, 'MajesticColorfulBabyBreath.jpg', '2021-12-20 03:28:47', ''),
('B00000017', 'K-001', 'One Hundred Romantic Red Roses', 1500000, 50, 'OneHundredRomanticRedRoses.jpg', '2021-12-20 03:30:16', ''),
('B00000018', 'K-001', 'One Hundred Sweet Pink Roses', 1650000, 47, 'OneHundredSweetPinkRoses.jpg', '2021-12-20 03:31:39', ''),
('B00000019', 'K-001', 'Spring Sunshine', 950000, 50, 'SpringSunshine.jpg', '2021-12-20 03:32:46', ''),
('B00000020', 'K-001', 'Night In Paris', 2200000, 44, 'NightInParis.jpg', '2021-12-20 03:33:49', ''),
('B00000021', 'K-001', 'Calming Lady Liz', 950000, 48, 'CalmingLadyLiz.jpg', '2021-12-20 03:34:58', ''),
('B00000022', 'K-001', 'Autumn Bloom', 1700000, 39, 'AutumnBloom.jpg', '2021-12-20 03:35:40', ''),
('B00000023', 'K-001', 'Romantic Cotton Bouquet', 950000, 37, 'RomanticCottonBouquet.jpg', '2021-12-20 03:37:04', ''),
('B00000024', 'K-003', 'Blue Serenity Blossom Box', 2200000, 50, 'BlueSerenityBlossomBox.jpg', '2021-12-20 03:47:07', ''),
('B00000025', 'K-003', 'Orange Sunshine Blossom Box', 2500000, 50, 'OrangeSunshineBlossomBox.jpg', '2021-12-20 03:48:34', ''),
('B00000026', 'K-003', 'Sweet Peachy Pink Blossom Box', 1700000, 50, 'SweetPeachyPinkBlossomBox.jpg', '2021-12-20 03:49:37', ''),
('B00000027', 'K-003', 'Lilac & Toffee Blossom Box', 2200000, 50, 'Lilac&ToffeeBlossomBox.jpg', '2021-12-20 03:50:31', ''),
('B00000028', 'K-003', 'Pure Love Blossom Box', 2500000, 50, 'PureLoveBlossomBox.jpg', '2021-12-20 03:51:43', ''),
('B00000029', 'K-003', 'Raspberry Sherbet Floral Basket', 1800000, 50, 'RaspberrySherbetFloralBasket.jpg', '2021-12-20 03:54:33', ''),
('B00000030', 'K-003', 'Yellow Paradise Blossom Box', 2200000, 50, 'YellowParadiseBlossomBox.jpg', '2021-12-20 03:56:00', ''),
('B00000031', 'K-003', 'Pastel Clear Sky Blossom Box', 2200000, 50, 'PastelClearSkyBlossomBox.jpg', '2021-12-20 03:56:55', ''),
('B00000100', 'K-001', 'flower', 47000, 60, '0.70245400 1641886735Pinus.jpg', '2022-01-11 14:38:00', ''),
('ye', 'K-001', 'ex bunga', 2525, 2, '0.65586100 1641561717Chimeraland.jpg', '2022-01-07 20:21:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk_flashsale`
--

CREATE TABLE `produk_flashsale` (
  `id_produk_flashsale` bigint(20) UNSIGNED NOT NULL,
  `id_bunga` varchar(20) NOT NULL,
  `id_flash_sale` bigint(20) NOT NULL,
  `diskon` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_flashsale`
--

INSERT INTO `produk_flashsale` (`id_produk_flashsale`, `id_bunga`, `id_flash_sale`, `diskon`) VALUES
(8, 'B00000003', 5, NULL),
(9, 'B00000001', 7, 30),
(10, 'B00000004', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `total_bunga_terjual`
--

CREATE TABLE `total_bunga_terjual` (
  `id_penjualan` varchar(20) NOT NULL,
  `id_bunga` varchar(20) NOT NULL,
  `nama_bunga` varchar(20) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `total_bunga_terjual` int(11) NOT NULL,
  `total_harga_bunga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_bunga_terjual`
--

INSERT INTO `total_bunga_terjual` (`id_penjualan`, `id_bunga`, `nama_bunga`, `tgl_penjualan`, `total_bunga_terjual`, `total_harga_bunga`) VALUES
('pe000001', 'B00000009', 'Sweet Estelle Bloomi', '2021-12-13', 20, 59000000),
('pe000001', 'B00000009', 'Sweet Estelle Bloomi', '2021-12-13', 20, 59000000),
('pe000002', 'B00000003', 'Saphire Skies Bouque', '2021-12-20', 20, 2000000),
('pe000003', 'B00000004', 'Kristina Bouquet', '2021-12-20', 10, 1000000),
('pe000002', 'B00000003', 'Saphire Skies Bouque', '2021-12-20', 20, 2000000),
('pe000003', 'B00000004', 'Kristina Bouquet', '2021-12-20', 10, 1000000),
('pe000003', 'B00000005', 'Green Bloom Vase', '2021-12-19', 5, 15000000),
('pe000005', 'B00000008', 'Luxury Red Scarlet V', '2021-12-12', 100, 10000000),
('pe000006', 'B00000009', 'Sweet Estelle Bloomi', '2021-12-20', 1, 150000),
('pe000006', 'B00000009', 'Sweet Estelle Bloomi', '2021-12-20', 1, 150000),
('pe000007', 'B00000011', 'Juliet Flower Basket', '2021-12-12', 30, 4600000),
('pe000007', 'B00000011', 'Juliet Flower Basket', '2021-12-12', 30, 4600000);

-- --------------------------------------------------------

--
-- Table structure for table `total_penjualan`
--

CREATE TABLE `total_penjualan` (
  `id_penjualan` varchar(20) NOT NULL,
  `tgl_penjualan` datetime NOT NULL,
  `total_harga_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_penjualan`
--

INSERT INTO `total_penjualan` (`id_penjualan`, `tgl_penjualan`, `total_harga_penjualan`) VALUES
('J001', '2021-12-27 00:00:00', 10000),
('J002', '2021-12-27 00:00:00', 10000),
('J003', '2021-12-28 00:00:00', 200000),
('J005', '2021-12-28 00:00:00', 220000),
('J006', '2021-12-16 00:00:00', 290000),
('J007', '2021-12-29 14:39:00', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `alamat`, `status`) VALUES
('', 'farhan', '2e74c2cf88f68a68c84e9509abc7ea56', '', '', ''),
('UF00000001', 'admin', 'admin', 'admin', 'admin', 'admin'),
('UF00000002', 'shin', 'shin', 'Shinta Namas', 'Yogyakarta', 'user'),
('UF00000003', 'ris', 'ris', 'Riski Nimo', 'Sumatra', 'user'),
('UF00000004', 'har', 'har', 'Dihar Wan', 'Jakarta', 'user'),
('UF00000005', 'admin1', 'caf1a3dfb505ffed0d024130f58c5cfa', 'admin1', 'yogyakarta', 'admin'),
('UF00000009', 'farhan', '202cb962ac59075b964b07152d234b70', 'farhan1', 'yogyakarta2', 'user'),
('UF00000010', 'anko', '84d492c3d39d4905aec0e8c8e44890e1', 'ankomashiro', 'yogyakarta concat', 'admin'),
('UF00000011', 'mashiro', '202cb962ac59075b964b07152d234b70', 'mashiro', 'yogyakarta10', 'user'),
('UF00000012', 'usex', '202cb962ac59075b964b07152d234b70', 'zz', 'klaten', 'user'),
('UF00000013', 'user1', '202cb962ac59075b964b07152d234b70', 'user1', 'jogja', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_sp` (`id_bunga`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `custom_order`
--
ALTER TABLE `custom_order`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD KEY `id_pembayaran` (`id_pembayaran`),
  ADD KEY `id_cart` (`id_bunga`);

--
-- Indexes for table `flash_sale`
--
ALTER TABLE `flash_sale`
  ADD PRIMARY KEY (`id_flash_sale`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_sp` (`id_user`);

--
-- Indexes for table `prodak_bunga`
--
ALTER TABLE `prodak_bunga`
  ADD PRIMARY KEY (`id_bunga`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `produk_flashsale`
--
ALTER TABLE `produk_flashsale`
  ADD PRIMARY KEY (`id_produk_flashsale`),
  ADD KEY `id_bunga` (`id_bunga`),
  ADD KEY `id_flash_sale` (`id_flash_sale`);

--
-- Indexes for table `total_bunga_terjual`
--
ALTER TABLE `total_bunga_terjual`
  ADD KEY `id_penjualan` (`id_penjualan`,`id_bunga`);

--
-- Indexes for table `total_penjualan`
--
ALTER TABLE `total_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `flash_sale`
--
ALTER TABLE `flash_sale`
  MODIFY `id_flash_sale` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk_flashsale`
--
ALTER TABLE `produk_flashsale`
  MODIFY `id_produk_flashsale` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
