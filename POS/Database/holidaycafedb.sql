-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 05:24 PM
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
-- Database: `holidaycafedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_form`
--

CREATE TABLE `order_form` (
  `ID` int(10) NOT NULL,
  `ORDER_DATE` text NOT NULL,
  `ITEM_TYPE` text NOT NULL,
  `ITEM_NAME` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `ORDER_QUANTITY` int(30) NOT NULL,
  `amount` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_form`
--

INSERT INTO `order_form` (`ID`, `ORDER_DATE`, `ITEM_TYPE`, `ITEM_NAME`, `description`, `ORDER_QUANTITY`, `amount`) VALUES
(29, '2022-10-24', 'bike', 'shimano', '', 5, 0),
(30, '2022-10-24', 'parts', 'bmx', '', 6, 0),
(31, '2022-10-26', 'bike', 'bmx', '', 3, 0),
(32, '2022-11-04', 'parts', 'shimano', '', 2, 0),
(33, '2022-11-04', 'bike', 'shimano', '', 10, 0),
(34, '2022-11-05', 'bike', 'bmx', '', 10, 0),
(35, '2022-11-05', 'parts', 'shimano', '', 3, 0),
(36, '2022-11-05', 'parts', 'shimano', '', 9, 0),
(37, '', 'itemtypes', 'itemnames', '', 1, 0),
(38, '', 'itemtypes', 'itemnames', '', 1, 0),
(39, '', 'bike', 'bmx', '', 3, 0),
(40, '2022-11-06', 'bike', 'bmx', '', 3, 0),
(41, '2022-11-06', 'parts', 'shimano', 'afafqf', 2, 0),
(42, '2022-11-06', 'parts', 'bmx', 'Bikekingshop', 3, 0),
(43, '2022-11-06', 'bike', 'shimano', 'biket o', 2, 0),
(44, '2022-11-06', 'bike', 'shimano', 'safs gsegsgesg', 2, 0),
(45, '', 'itemtypes', 'itemnames', 'description', 2, 0),
(46, '2022-11-07', 'parts', 'bmx', 'dgfbdfhdrthdtfh', 3, 0),
(47, '2022-11-07', 'parts', 'bmx', 'description', 2, 0),
(48, '', 'itemtypes', 'itemnames', 'description', 1, 0),
(49, '2022-12-02', 'parts', 'shimano', 'hgjfhjfghjgfgfhj', 2, 0),
(50, '2022-12-11', 'Parts', 'Breaks', '', 2, 4000),
(51, '2022-12-11', 'Parts', 'Tsunami Frame', '', 1, 6000),
(52, '2022-12-14', 'Parts', 'Breaks', '', 1, 2000),
(53, '2022-12-14', 'Parts', 'Breaks', '', 1, 2000),
(54, '2022-12-14', 'Parts', 'Test', '', 1, 200),
(55, '2022-12-14', 'Parts', 'Breaks', '', 1, 2000),
(56, '2022-12-16', 'Parts', 'Tsunami Frame', '', 4, 1777776),
(57, '2022-12-16', 'Parts', 'Tsunami Frame', '', 4, 1777776),
(58, '2022-12-16', 'Parts', 'Tsunami Frame', '', 3, 1333332),
(59, '2022-12-16', 'Parts', 'Breaks', '', 13, 26000),
(60, '2022-12-16', 'Parts', 'Breaks', '', 13, 26000),
(61, '2022-12-16', 'Parts', 'Breaks', '', 13, 26000),
(62, '2023-03-07', 'Parts', 'Tsunami Frame', '', 1, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `item_id` int(10) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`item_id`, `item_name`, `quantity`, `price`, `image`, `description`, `status`) VALUES
(11, 'Espresso', 50, 125, '../inventory/img/hkz1AIW6/Iced Espresso.jpg', 'Espresso', 'active'),
(12, 'Cafe Americano', 50, 160, '../inventory/img/Kzy5cFeP/Iced Americano.jpg', 'Cafe Americano', 'active'),
(13, 'Iced Coffee', 50, 175, '../inventory/img/KyCfy5m1/Iced Americano.jpg', 'Iced Coffee', 'active'),
(14, 'Latte ', 50, 200, '../inventory/img/JnVRsa0k/Masala Chai Latte.jpg', 'Latte ', 'active'),
(15, 'Macchiato ', 50, 175, '../inventory/img/dbclI02A/Iced Caramel Macchiato.jpg', 'Macchiato ', 'active'),
(16, 'Mocha ', 50, 255, '../inventory/img/EZc5Zigy/Mocha Latte.jpg', 'Mocha ', 'active'),
(17, 'Flat White', 50, 200, '../inventory/img/57p9rlkN/Iced Caramel Macchiato.jpg', 'Flat White', 'active'),
(18, 'Affogato', 48, 250, '../inventory/img/PZAZ0T20/Java Chip Frappuccino.jpg', 'Affogato', 'active'),
(19, 'Cold Brew', 50, 175, '../inventory/img/C5Y3zXGe/Iced Americano.jpg', 'Cold Brew', 'active'),
(20, 'Frappucino ', 97, 250, '../inventory/img/SFZxR3mg/Frappuccino.jpg', 'Frappucino ', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `User_id` int(255) NOT NULL,
  `USERNAME` text NOT NULL,
  `PASSWORD` text NOT NULL,
  `Roles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`User_id`, `USERNAME`, `PASSWORD`, `Roles`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'cashier', 'cashier123', 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderconfirm`
--

CREATE TABLE `tbl_orderconfirm` (
  `cart_id` int(11) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_id` int(50) NOT NULL,
  `amount` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(50) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `total_quantity` int(50) NOT NULL,
  `total_amount` int(50) NOT NULL,
  `inventory_ids` varchar(2000) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `cash` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `order_date`, `total_quantity`, `total_amount`, `inventory_ids`, `serial_number`, `cash`) VALUES
(14, '2024-05-13', 3, 675, '[[\"18\",\"1\"],[\"19\",\"1\"],[\"20\",\"1\"]]', 'MLISF5AD', 675),
(15, '2024-05-13', 3, 675, '[[\"18\",\"1\"],[\"19\",\"1\"],[\"20\",\"1\"]]', 'GE6KPT1V', 675),
(16, '2024-05-13', 3, 675, '[[\"18\",\"2\"],[\"19\",\"1\"]]', 'NOZNJ2QD', 675),
(17, '2024-05-14', 2, 350, '[[19,2]]', 'DBDNVHWV', 400),
(18, '2024-05-21', 2, 500, '[[20,2]]', 'MZW0QLG9', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass_word` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass_word`, `first_name`, `last_name`, `email`) VALUES
(1, 'jojo', '$2y$12$EWTU5RcnBrSBLHbJOtsHMuDHDPg5M3IJVBZXw3x2EzjVSfB0Qc9kG', 'Jonathan', 'Dela Serna', 'jonathandelaserna04@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_form`
--
ALTER TABLE `order_form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `tbl_orderconfirm`
--
ALTER TABLE `tbl_orderconfirm`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_form`
--
ALTER TABLE `order_form`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `User_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_orderconfirm`
--
ALTER TABLE `tbl_orderconfirm`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
