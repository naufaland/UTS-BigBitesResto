-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 05:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto_uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin1', 'admin1@gmail.com', '$2a$12$Cw/uAk4cAVV2DaWKHSa1O.RtjXvn60EqG0PnxDcA2k.UQIheWtR8e');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id`, `nama_depan`, `nama_belakang`, `username`, `email`, `password`, `gender`, `tanggal_lahir`) VALUES
(1, 'King', 'Fikri', 'kingfikri', 'kingfikri@gmail.com', '$2y$10$/afbjlwlUy3yIhdRo.hocuuVrJsym3XLALRXJ/Slon/Xs3pSW/NTW', 'op', '2023-10-02'),
(2, 'lego', 'rabbit', 'ninjago', 'lego', '$2y$10$8DOcuIKm4y15tymMeozaoO4A6DQdsYwcWLMawf.yk50re1dBSpsvi', 'op', '2023-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `category` varchar(25) NOT NULL,
  `image` varchar(250) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `category`, `image`, `harga`) VALUES
(1, 'Beef Burger', 'Lunch', 'https://img.freepik.com/free-photo/tasty-burger-isolated-white-background-fresh-hamburger-fastfood-with-beef-cheese_90220-1063.jpg?w=740&t=st=1697979850~exp=1697980450~hmac=b49e3494cc172d22dae30f04e5a231d5c6a6f7bd88e72e8b424a275ec468c79d', '20000'),
(2, 'Mie Goreng', 'Lunch', 'https://img.freepik.com/free-photo/top-view-tasty-composition-noodles-table_23-2148803862.jpg?w=740&t=st=1697981521~exp=1697982121~hmac=0ae6a1f85b4f66f4ca9cbc02f92ed675d8bb74bd88af837cfd49ccb8e8c239b6', '20000'),
(3, 'Miso Ramen', 'Lunch', 'https://img.freepik.com/free-photo/assortment-noodles-bowl_23-2148803809.jpg?w=1060&t=st=1697983698~exp=1697984298~hmac=1156f259f180e868708c907b602f1336a330e1deb13fcb1d10fbc8aae0c4512f', '30000'),
(4, 'Ice Latte', 'Drink', 'https://img.freepik.com/free-photo/iced-coffee-cup_1339-1733.jpg?w=360&t=st=1697984111~exp=1697984711~hmac=ee4c625911a676074376bf48a5216a69c636f035005c59298cf462e073ff10f8', '15000'),
(5, 'Ice Matcha Latte', 'Drink', 'https://img.freepik.com/free-photo/green-tea-fresh-milk-served-with-delicious-snacks_1150-24494.jpg?w=360&t=st=1697984282~exp=1697984882~hmac=17884733dbff945e7ba1d68cd212e4ccfd8c8bcf2f108531f5bf0ef7ff479973', '17000'),
(6, 'Banana Split', 'Dessert', 'https://www.tasteofhome.com/wp-content/uploads/2018/01/All-American-Banana-Split_EXPS_FT20_37953_F_0716_1.jpg?fit=700%2C1024', '20000'),
(7, 'Dimsum', 'Appetizer', 'https://palpres.disway.id/upload/83f167921e5a8d3677aead0797407909.jpeg', '10000'),
(8, 'Pistachio Gelato', 'Dessert', 'https://www.saveur.com/uploads/2019/02/08/RSQCZRUP32T6N4BOZJSCSQHTCI.jpg?auto=webp', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `harga` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
