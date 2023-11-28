-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 10:43 AM
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
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(11) NOT NULL,
  `Admin_Name` varchar(100) DEFAULT NULL,
  `Admin_Email` varchar(100) DEFAULT NULL,
  `Admin_Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Id`, `Admin_Name`, `Admin_Email`, `Admin_Password`) VALUES
(1, 'Ismail', 'Ismail@nk', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `Product_Name` varchar(100) DEFAULT NULL,
  `Product_Price` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Product_Image` varchar(100) DEFAULT NULL,
  `Product_Qty` varchar(11) DEFAULT NULL,
  `Discount_Price` int(11) NOT NULL,
  `Discount_Date` datetime DEFAULT NULL,
  `Product_Code` varchar(100) DEFAULT NULL,
  `Product_ID` int(11) DEFAULT NULL,
  `User_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(100) DEFAULT NULL,
  `Category_Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_ID`, `Category_Name`, `Category_Image`) VALUES
(18, 'Fish', '1697003307-product3.png'),
(22, 'vegetables', '1697003493-categories6.png'),
(23, 'Juices', '1697003482-categories12.png'),
(24, 'Fruits', '1697003353-big-product3.jpg'),
(25, 'Meat', '1697003384-product9.png');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `total_products` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`, `User_Id`) VALUES
(34, 'asd', '3342', 'asd@e2we', 'paypal', 'sad', 'asd', 'asd', '213', 'Netherlands', 0, 'brush makeup (2) ', '3500', 48),
(35, 'Ismail', '03394345', 'Ismail@123', 'paypal', 'asd', 'dds', 'asd', 'aasd', 'Pakistan', 123, 'face wash for men (1) , Cabbage (3) ', '6000', 48);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(100) DEFAULT NULL,
  `Product_Price` varchar(100) DEFAULT NULL,
  `Product_Qty` int(11) NOT NULL DEFAULT 1,
  `Product_Image` varchar(100) DEFAULT NULL,
  `Product_sub_img` varchar(100) DEFAULT NULL,
  `Product_Des` varchar(250) DEFAULT NULL,
  `Discount_Price` int(11) DEFAULT NULL,
  `Discount_Date` datetime DEFAULT NULL,
  `Product_code` varchar(100) DEFAULT NULL,
  `Category_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Product_Name`, `Product_Price`, `Product_Qty`, `Product_Image`, `Product_sub_img`, `Product_Des`, `Discount_Price`, `Discount_Date`, `Product_code`, `Category_Id`) VALUES
(38, 'Cabbage', '2000', 1, '1696878736-product6.jpg', '1696878736-product14.jpg', '                                                                                                                                                                                                                                                          ', 1000, '2023-11-28 22:22:00', 'P1234', 18),
(39, 'boots shoes', '1500', 1, '1696878995-product9.jpg', '1696878995-product10.jpg', '                                                                                    Lorem Ipsum is simply dummy ', 1000, '0000-00-00 00:00:00', 'P1235', 23),
(40, 'Beans', '1500', 1, '1696880388-product21.jpg', '1696880388-product22.jpg', '\r\nLorem Ipsum is simply dummy text of the ', 1200, '2023-11-27 23:42:00', 'P1236', 22),
(41, 'Grapes', '1400', 1, '1696880472-productbig14.jpg', '1696880472-product29.jpg', '                            Lorem Ipsum is simply dummy text of ', 1100, '2023-11-27 23:45:00', 'P1237', 24),
(42, 'Bottle Gourd', '2500', 24, '1696880528-product18.jpg', '1696880528-productbig9.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 0, '0000-00-00 00:00:00', 'P1238', 22),
(43, 'Apple', '1200', 20, '1696880589-product13.jpg', '1696880589-productbig13.jpg', '                                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1000, '2023-11-27 23:59:00', 'P1239', 18),
(44, 'brush makeup', '1500', 150, '1696880793-product8.jpg', '1696880793-productbig3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 1000, '2023-11-27 23:33:00', 'P1240', 25),
(45, 'face wash for men', '2000', 102, '1696880892-product4.jpg', '1696880892-productbig2.jpg', '                            Lorem Ipsum is simply dummy text of the printing and typesetting industry', 0, '0000-00-00 00:00:00', 'P1241', 18),
(46, 'Face powder', '2800', 190, '1696880942-productbig4.jpg', '1696880942-product7.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 0, '0000-00-00 00:00:00', 'P1242', 25),
(47, 'Makeup Kit', '1800', 200, '1696881007-product1.jpg', '1696881007-product10.jpg', '                            Lorem Ipsum is simply dummy text of the printing and typesetting industry', 0, '0000-00-00 00:00:00', 'P1243', 18),
(49, 'Juice', '1000', 20, '1697003820-categories12.png', '1697003820-categories12.png', '                              Lorem Ipsum is simply dummy text of the printing and typesetting', 0, '0000-00-00 00:00:00', 'P1244', 18),
(50, 'Fish', '200', 10, '1697004074-product3.png', '1697004086-product3.png', '                                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting', 0, '0000-00-00 00:00:00', 'P1245', 18);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `User_Name` varchar(50) DEFAULT NULL,
  `User_Email` varchar(200) DEFAULT NULL,
  `User_Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `User_Name`, `User_Email`, `User_Password`) VALUES
(48, 'Ismail', 'Ismail@123', '111');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `ID` int(11) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Product_Price` varchar(100) NOT NULL,
  `Product_Image` varchar(100) NOT NULL,
  `Product_Qty` int(11) NOT NULL,
  `Discount_Price` int(11) NOT NULL,
  `Discount_Date` datetime DEFAULT NULL,
  `Product_Code` varchar(100) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`),
  ADD KEY `Category_Id` (`Category_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `categories` (`Category_ID`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
