-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2021 at 08:36 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleet-management`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `car_drivers`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `car_drivers`;
CREATE TABLE `car_drivers` (
`photo` varchar(50)
,`full_name` varchar(100)
,`plate_number` varchar(50)
,`status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoice`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `invoice`;
CREATE TABLE `invoice` (
`full_name` varchar(100)
,`department` varchar(50)
,`phone` varchar(50)
,`email` varchar(50)
,`destination` varchar(50)
,`pickup_point` varchar(50)
,`created_at` timestamp
,`return_date` varchar(50)
,`estimated_km` float
,`plate_number` varchar(50)
,`brand` varchar(50)
,`chasis_number` varchar(50)
,`vehicle_type` varchar(50)
,`color` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoices`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `invoices`;
CREATE TABLE `invoices` (
`book_id` int(11)
,`full_name` varchar(100)
,`department` varchar(50)
,`phone` varchar(50)
,`email` varchar(50)
,`destination` varchar(50)
,`pickup_point` varchar(50)
,`created_at` timestamp
,`return_date` varchar(50)
,`estimated_km` float
,`plate_number` varchar(50)
,`brand` varchar(50)
,`chasis_number` varchar(50)
,`vehicle_type` varchar(50)
,`color` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_trip`
--

DROP TABLE IF EXISTS `tbl_book_trip`;
CREATE TABLE `tbl_book_trip` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_id` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `pickup_point` varchar(50) DEFAULT NULL,
  `return_date` varchar(50) NOT NULL,
  `estimated_km` float NOT NULL,
  `cost_km` float NOT NULL DEFAULT 2500,
  `extra_cost` float NOT NULL,
  `paid` tinyint(1) DEFAULT 0,
  `confirm_trip` tinyint(1) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tbl_book_trip`:
--   `user_id`
--       `tbl_users` -> `id`
--   `vehicle_id`
--       `tbl_vehicles` -> `plate_number`
--   `user_id`
--       `tbl_users` -> `id`
--

--
-- Dumping data for table `tbl_book_trip`
--

INSERT INTO `tbl_book_trip` (`id`, `user_id`, `vehicle_id`, `destination`, `pickup_point`, `return_date`, `estimated_km`, `cost_km`, `extra_cost`, `paid`, `confirm_trip`, `status`, `created_at`) VALUES
(10, 2, 'CAA 333 CAD', 'Musanze', 'Kigali', '2021-12-21', 25, 5777, 8700, 1, 1, 1, '2021-12-12 16:34:36'),
(11, 2, 'RAD 754 CA', 'Musanze', 'Nyamata', '2021-12-21', 340, 9000, 12000, 1, 1, 1, '2021-12-13 01:15:04'),
(12, 2, 'COD568AA', 'Musanze', 'Nyamata', '2021-12-14', 340, 70000, 780000, 1, 1, 1, '2021-12-13 16:42:10'),
(14, 3, 'DAR876DD', 'Musanze', 'Kigali', '2021-12-24', 65, 5666, 6666, 1, 1, 1, '2021-12-13 18:27:48'),
(15, 4, 'RAD 754 CA', 'Musanze', 'Nyamata', '2021-12-15', 450, 1200, 2000, 1, 1, 1, '2021-12-13 21:06:31'),
(16, 5, 'RAD 754 CA', 'Musanze', 'Kigali', '2021-12-16', 456, 2345, 1000, 1, 1, 1, '2021-12-13 21:20:06'),
(17, 6, 'RAD 754 CA', 'Musanze', 'Kigali', '2021-12-16', 120, 2600, 5000, 1, 1, 1, '2021-12-14 10:39:13');

--
-- Triggers `tbl_book_trip`
--
DROP TRIGGER IF EXISTS `update_status`;
DELIMITER $$
CREATE TRIGGER `update_status` AFTER UPDATE ON `tbl_book_trip` FOR EACH ROW if new.return_date <= CURRENT_TIMESTAMP THEN 
UPDATE `tbl_book_trip` as trip  set trip.status = 1 WHERE trip.id = new.id;
END IF
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_vehicle`;
DELIMITER $$
CREATE TRIGGER `update_vehicle` AFTER INSERT ON `tbl_book_trip` FOR EACH ROW UPDATE `tbl_vehicles` as ve SET ve.`status` = 0
WHERE ve.`plate_number`=NEW.`vehicle_id`
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update_vehicle_retro`;
DELIMITER $$
CREATE TRIGGER `update_vehicle_retro` AFTER UPDATE ON `tbl_book_trip` FOR EACH ROW if new.`confirm_trip` = 0 THEN 
UPDATE `tbl_vehicles` as ve SET ve.`status` = 1 
WHERE `ve`.`plate_number`=new.`vehicle_id`; 
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

DROP TABLE IF EXISTS `tbl_driver`;
CREATE TABLE `tbl_driver` (
  `id` int(11) NOT NULL,
  `vehicle_id` varchar(50) DEFAULT NULL,
  `national_ID` varchar(50) NOT NULL,
  `driving_license` varchar(50) NOT NULL,
  `license_validity` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tbl_driver`:
--   `vehicle_id`
--       `tbl_vehicles` -> `plate_number`
--

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`id`, `vehicle_id`, `national_ID`, `driving_license`, `license_validity`, `full_name`, `phone`, `email`, `photo`, `address`, `status`, `created_at`) VALUES
(2, 'RAD 754 CA', '4567765', '23F3245D', '2023-10-20', 'Patrick Ngabo', '0784976465', 'patrick@gmail.com', 'd1.jpg', 'KG 203 ST 265', 0, '2021-11-25 15:56:21'),
(3, 'CAA 333 CAD', '2215141343', '23455F9D', '2024-06-09', 'Joe MANZI', '078993563', 'manzi@gmail.com', 'c3.jpg', 'KK 34 AV 453', 1, '2021-11-27 07:21:29'),
(5, 'COD568AA', '345354535', '345254533245', '2023-10-12', 'John Lambert', '07849764654', 'lambert@gmail.com', 'd4.jpg', 'kk 123 str', 1, '2021-12-13 16:24:05'),
(6, 'DAR876DD', '32456', '643f44f', '2025-10-20', 'Dan Melchert', '078497646543', 'dan@gmail.com', 'd3.jpg', 'KN 5 Ave  134', 1, '2021-12-13 16:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_role` tinyint(1) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tbl_users`:
--

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `user_password`, `user_role`, `full_name`, `department`, `phone`, `email`, `status`, `created_at`) VALUES
(1, 'admin', 'admin', 1, 'joe smith', 'BIT', '+250784976465', 'joe@gmail.com', 1, '2021-11-25 14:58:43'),
(2, 'bateyjosh', '0000', 0, 'ben joe', 'BIT', '0995854421', 'josuebatey19@gmail.com', 1, '2021-11-25 19:45:09'),
(3, 'fistonmugabo', 'mugabo', 0, 'fiston mugabo', '', '+2507849764650', 'fiston@gmail.com', 1, '2021-12-13 18:02:01'),
(4, 'hendricks', 'hendricks', 0, 'hendricks', '', '0000000000', 'hendricks@gmail.com', 1, '2021-12-13 21:04:47'),
(5, 'berry', 'berry', 0, 'berry', '', '0999405354', 'berry@gmail.com', 1, '2021-12-13 21:19:03'),
(6, 'teta12', 'teta12', 0, 'teta', '', '07898654783', 'teta@gmail.com', 1, '2021-12-14 10:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicles`
--

DROP TABLE IF EXISTS `tbl_vehicles`;
CREATE TABLE `tbl_vehicles` (
  `plate_number` varchar(50) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `chasis_number` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `vehicle_description` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tbl_vehicles`:
--

--
-- Dumping data for table `tbl_vehicles`
--

INSERT INTO `tbl_vehicles` (`plate_number`, `vehicle_type`, `chasis_number`, `brand`, `color`, `vehicle_description`, `photo`, `status`, `created_at`) VALUES
('CAA 333 CAD', 'Bus', '57567F4325EF', 'Benz', 'black & With', 'hjjlklkkhvfcg', 'b1.jpg', 1, '2021-11-25 15:50:26'),
('COD568AA', 'Bus', '87YDI98', 'Benz', 'White', ' White', 'b1.jpg', 0, '2021-12-13 16:20:14'),
('DAR876DD', 'Bus', '800JDSHJ083', 'Honda', 'Green', ' Green honda bus', 'b2.jpg', 0, '2021-12-13 16:21:38'),
('RAD 754 CA', 'Bus', '98J9850JFD', 'Benz', 'White', ' fdfadvvdsavds agsgsaggare', 'b2.jpg', 0, '2021-11-25 15:44:54');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vehicle_list`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vehicle_list`;
CREATE TABLE `vehicle_list` (
`photo` varchar(50)
,`full_name` varchar(100)
,`plate_number` varchar(50)
,`veh_status` tinyint(1)
,`driver_status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Structure for view `car_drivers`
--
DROP TABLE IF EXISTS `car_drivers`;

DROP VIEW IF EXISTS `car_drivers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `car_drivers`  AS SELECT `tbl_vehicles`.`photo` AS `photo`, `tbl_driver`.`full_name` AS `full_name`, `tbl_vehicles`.`plate_number` AS `plate_number`, `tbl_vehicles`.`status` AS `status` FROM (`tbl_driver` join `tbl_vehicles` on(`tbl_vehicles`.`plate_number` = `tbl_driver`.`vehicle_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `invoice`
--
DROP TABLE IF EXISTS `invoice`;

DROP VIEW IF EXISTS `invoice`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoice`  AS SELECT `us`.`full_name` AS `full_name`, `us`.`department` AS `department`, `us`.`phone` AS `phone`, `us`.`email` AS `email`, `book`.`destination` AS `destination`, `book`.`pickup_point` AS `pickup_point`, `book`.`created_at` AS `created_at`, `book`.`return_date` AS `return_date`, `book`.`estimated_km` AS `estimated_km`, `veh`.`plate_number` AS `plate_number`, `veh`.`brand` AS `brand`, `veh`.`chasis_number` AS `chasis_number`, `veh`.`vehicle_type` AS `vehicle_type`, `veh`.`color` AS `color` FROM ((`tbl_book_trip` `book` join `tbl_users` `us` on(`book`.`user_id` = `us`.`id`)) join `tbl_vehicles` `veh` on(`book`.`vehicle_id` = `veh`.`plate_number`)) ;

-- --------------------------------------------------------

--
-- Structure for view `invoices`
--
DROP TABLE IF EXISTS `invoices`;

DROP VIEW IF EXISTS `invoices`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoices`  AS SELECT `book`.`id` AS `book_id`, `us`.`full_name` AS `full_name`, `us`.`department` AS `department`, `us`.`phone` AS `phone`, `us`.`email` AS `email`, `book`.`destination` AS `destination`, `book`.`pickup_point` AS `pickup_point`, `book`.`created_at` AS `created_at`, `book`.`return_date` AS `return_date`, `book`.`estimated_km` AS `estimated_km`, `veh`.`plate_number` AS `plate_number`, `veh`.`brand` AS `brand`, `veh`.`chasis_number` AS `chasis_number`, `veh`.`vehicle_type` AS `vehicle_type`, `veh`.`color` AS `color` FROM ((`tbl_book_trip` `book` join `tbl_users` `us` on(`book`.`user_id` = `us`.`id`)) join `tbl_vehicles` `veh` on(`book`.`vehicle_id` = `veh`.`plate_number`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vehicle_list`
--
DROP TABLE IF EXISTS `vehicle_list`;

DROP VIEW IF EXISTS `vehicle_list`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vehicle_list`  AS SELECT `tbl_vehicles`.`photo` AS `photo`, `tbl_driver`.`full_name` AS `full_name`, `tbl_vehicles`.`plate_number` AS `plate_number`, `tbl_vehicles`.`status` AS `veh_status`, `tbl_driver`.`status` AS `driver_status` FROM (`tbl_driver` join `tbl_vehicles` on(`tbl_vehicles`.`plate_number` = `tbl_driver`.`vehicle_id`)) WHERE `tbl_vehicles`.`status` = 1 AND `tbl_driver`.`status` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_book_trip`
--
ALTER TABLE `tbl_book_trip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_hev` (`vehicle_id`);

--
-- Indexes for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `national_ID` (`national_ID`),
  ADD UNIQUE KEY `driving_license` (`driving_license`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_id_veh` (`vehicle_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_password` (`user_password`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  ADD PRIMARY KEY (`plate_number`),
  ADD UNIQUE KEY `chasis_number` (`chasis_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_book_trip`
--
ALTER TABLE `tbl_book_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_book_trip`
--
ALTER TABLE `tbl_book_trip`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hev` FOREIGN KEY (`vehicle_id`) REFERENCES `tbl_vehicles` (`plate_number`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_book_trip_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD CONSTRAINT `fk_id_veh` FOREIGN KEY (`vehicle_id`) REFERENCES `tbl_vehicles` (`plate_number`) ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
