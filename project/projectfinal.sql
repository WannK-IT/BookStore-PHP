-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2022 at 09:13 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_acp` varchar(10) DEFAULT 'active',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'admin', 'active', '2022-05-02 18:59:44', 'admin', '2022-05-21 01:36:13', 'Admin', 'inactive'),
(2, 'manager', 'active', '2022-05-02 18:59:44', 'admin', '2022-05-21 00:54:08', 'admin', 'active'),
(3, 'member', 'inactive', '2022-05-02 18:59:44', 'admin', '2022-05-21 00:47:43', 'admin', 'active'),
(4, 'supervisor', 'active', '2022-05-19 16:49:10', 'admin', '2022-05-21 00:55:15', 'quangng', 'inactive'),
(208, 'trainer', 'active', '2022-05-21 00:50:16', 'admin', '2022-05-21 00:52:32', 'admin', 'inactive'),
(209, 'adviser', 'active', '2022-05-21 00:50:16', 'admin', '2022-05-21 00:52:32', 'admin', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'inactive',
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `created`, `created_by`, `modified`, `modified_by`, `status`, `group_id`) VALUES
(18, 'admin', 'n.nquanght@gmail.com', 'Nguyễn Nhựt Quang', 'admin', '2022-05-21 03:59:16', 'Admin', NULL, NULL, 'active', 1),
(19, 'quangnguyen', 'n.nquangh2t@gmail.com', 'Nguyễn Văn A', '5f765ce6a2ae0c963cf720a71c13d32a', '2022-05-21 04:02:26', 'Admin', NULL, NULL, 'inactive', 208),
(20, 'quangtest', 'abcdef@gmail.com', 'nguyen van', '2b10351253eed030812674e8aa18a5ab', '2022-05-21 04:04:53', 'Admin', NULL, NULL, 'active', 4),
(21, 'phpquangnguyen', 'php@gmail.com', 'Tran Van A', '21232f297a57a5a743894a0e4a801fc3', '2022-05-21 04:09:34', 'nguyen van', NULL, NULL, 'active', 3),
(22, 'testtt', 'tetstt@gmail.com', 'testet', 'da7619474d1f0c28af4da3b5675ae46f', '2022-05-21 04:10:05', 'nguyen van', NULL, NULL, 'inactive', 2),
(23, 'hellllo', 'hello@gmail.com', 'hellooooooooo', '5d41402abc4b2a76b9719d911017c592', '2022-05-21 04:10:47', 'nguyen van', NULL, NULL, 'active', 209),
(24, 'hiiiiiiiiiii', 'hiiiiiiiiiii@gmail.com', 'hehehehhe', 'cce8f4212df1b3e94c76634d21d2361e', '2022-05-21 04:11:16', 'nguyen van', NULL, NULL, 'active', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
