-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 01:54 PM
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
(1, 'Beef Burger', 'Lunch', 'https://img.freepik.com/free-photo/tasty-burger-isolated-white-background-fresh-hamburger-fastfood-with-beef-cheese_90220-1063.jpg?t=st=1697979846~exp=1697980446~hmac=ccd6c6fc82261e51ac100156635a6cc30346a2f1ab2aa4ecb4cadb27e7936078', '23000'),
(2, 'Mie Goreng', 'Lunch', 'https://img.freepik.com/free-photo/top-view-tasty-composition-noodles-table_23-2148803862.jpg?w=740&t=st=1697981521~exp=1697982121~hmac=0ae6a1f85b4f66f4ca9cbc02f92ed675d8bb74bd88af837cfd49ccb8e8c239b6', '20000'),
(3, 'Miso Ramen', 'Lunch', 'https://img.freepik.com/free-photo/assortment-noodles-bowl_23-2148803809.jpg?w=1060&t=st=1697983698~exp=1697984298~hmac=1156f259f180e868708c907b602f1336a330e1deb13fcb1d10fbc8aae0c4512f', '30000'),
(4, 'Ice Latte', 'Drink', 'https://img.freepik.com/free-photo/iced-coffee-cup_1339-1733.jpg?w=360&t=st=1697984111~exp=1697984711~hmac=ee4c625911a676074376bf48a5216a69c636f035005c59298cf462e073ff10f8', '15000'),
(5, 'Ice Matcha Latte', 'Drink', 'https://img.freepik.com/free-photo/green-tea-fresh-milk-served-with-delicious-snacks_1150-24494.jpg?w=360&t=st=1697984282~exp=1697984882~hmac=17884733dbff945e7ba1d68cd212e4ccfd8c8bcf2f108531f5bf0ef7ff479973', '17000'),
(6, 'Banana Split', 'Dessert', 'https://www.tasteofhome.com/wp-content/uploads/2018/01/All-American-Banana-Split_EXPS_FT20_37953_F_0716_1.jpg?fit=700%2C1024', '20000'),
(7, 'Nasi Ayam Geprek', 'Lunch', 'https://assets-a1.kompasiana.com/items/album/2023/08/10/ayam-geprek-removebg-64d50389633ebc267a30bde3.png?t=o&v=780', '23000'),
(8, 'Pistachio Gelato', 'Dessert', 'https://www.saveur.com/uploads/2019/02/08/RSQCZRUP32T6N4BOZJSCSQHTCI.jpg?auto=webp', '15000'),
(9, 'Ice Tea', 'Drink', 'https://magfood-amazy.com/wp-content/uploads/2017/12/ice-lemon-tea.jpg', '10000'),
(10, 'California Roll', 'Appetizer', 'https://www.sidechef.com/recipe/8f379697-7d39-4f61-a336-fd4134eeee18.jpg?d=1408x1120', '20000'),
(11, 'Caesar Salad', 'Appetizer', 'https://www.noracooks.com/wp-content/uploads/2022/06/vegan-caesar-salad-4.jpg', '15000'),
(12, 'Chocolatte Lava Cake', 'Dessert', 'https://www.melskitchencafe.com/wp-content/uploads/2023/01/updated-lava-cakes7.jpg', '17500'),
(13, 'Alpukat Kocok', 'Dessert', 'https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2022/07/29/3524045949.png', '12000'),
(18, 'Dimsum', 'Appetizer', 'https://imgx.parapuan.co/crop/0x0:0x0/x/photo/2022/05/21/istock-626007330jpg-20220521084248.jpg', '17000'),
(19, 'Hot Tea', 'Drink', 'https://assets-a1.kompasiana.com/items/album/2019/09/16/tea-5d7f4e0c0d823044bd67f8e2.jpg', '10000'),
(20, 'Nasi Goreng Ayam', 'Lunch', 'https://asset.kompas.com/crops/N0sk4nA9PHwFZWLQmKOgXOzmWLo=/4x0:1000x664/750x500/data/photo/2022/05/04/627208b727a09.jpg', '20000'),
(21, 'Pepperoni Pizza', 'Lunch', 'https://www.cobsbread.com/us/wp-content//uploads/2022/09/Pepperoni-pizza-850x630-1.png', '45000'),
(22, 'Air Mineral (AQUA)', 'Drink', 'https://bebekbkb.com/wp-content/uploads/2023/08/AIR-MINERAL-600ML.jpg', '5000');

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
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `nama`, `image`, `harga`) VALUES
(16, 1, 'Alpukat Kocok', 'https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2022/07/29/3524045949.png', '12000'),
(17, 1, 'Alpukat Kocok', 'https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2022/07/29/3524045949.png', '12000'),
(18, 1, 'Ice Tea', 'https://magfood-amazy.com/wp-content/uploads/2017/12/ice-lemon-tea.jpg', '10000'),
(19, 1, 'Ice Matcha Latte', 'https://img.freepik.com/free-photo/green-tea-fresh-milk-served-with-delicious-snacks_1150-24494.jpg?w=360&t=st=1697984282~exp=1697984882~hmac=17884733dbff945e7ba1d68cd212e4ccfd8c8bcf2f108531f5bf0ef7ff479973', '17000'),
(20, 1, 'Mie Goreng', 'https://img.freepik.com/free-photo/top-view-tasty-composition-noodles-table_23-2148803862.jpg?w=740&t=st=1697981521~exp=1697982121~hmac=0ae6a1f85b4f66f4ca9cbc02f92ed675d8bb74bd88af837cfd49ccb8e8c239b6', '20000'),
(21, 1, 'Miso Ramen', 'https://img.freepik.com/free-photo/assortment-noodles-bowl_23-2148803809.jpg?w=1060&t=st=1697983698~exp=1697984298~hmac=1156f259f180e868708c907b602f1336a330e1deb13fcb1d10fbc8aae0c4512f', '30000'),
(22, 1, 'Bakso Malang', 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/08/02034124/ini-resep-bakso-malang-lezat-yang-menggugah-selera-halodoc.jpg.webp', '21000'),
(23, 1, 'California Roll', 'https://www.sidechef.com/recipe/8f379697-7d39-4f61-a336-fd4134eeee18.jpg?d=1408x1120', '20000'),
(24, 1, 'Dimsum', 'https://palpres.disway.id/upload/83f167921e5a8d3677aead0797407909.jpeg', '10000'),
(25, 2, 'Banana Split', 'https://www.tasteofhome.com/wp-content/uploads/2018/01/All-American-Banana-Split_EXPS_FT20_37953_F_0716_1.jpg?fit=700%2C1024', '20000'),
(26, 1, 'Ice Latte', 'https://img.freepik.com/free-photo/iced-coffee-cup_1339-1733.jpg?w=360&t=st=1697984111~exp=1697984711~hmac=ee4c625911a676074376bf48a5216a69c636f035005c59298cf462e073ff10f8', '15000');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
