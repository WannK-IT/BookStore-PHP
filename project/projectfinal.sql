-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2022 at 07:47 AM
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
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `special` varchar(10) NOT NULL,
  `sale_off` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'active',
  `ordering` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `category_id`) VALUES
(11, 'Dốc Quỷ Ám', '\"Dốc quỷ ám\" - là tác phẩm được hàng triệu độc giả tìm kiếm.\r\n', '100000', 'no', 10, '51y3g75bCJLQu5BN8MJ.jpg', '2022-05-28 02:35:23', NULL, '2022-05-28 15:10:06', NULL, 'active', 4, 33),
(12, 'Dốc Quỷ Ám', '\"Dốc quỷ ám\" - là tác phẩm được hàng triệu độc giả tìm kiếm.\r\n', '100000', 'yes', 10, 'doc-quy-amYIvDZlod.jpg', '2022-05-28 02:35:23', NULL, '2022-05-28 15:10:06', NULL, 'inactive', 4, 32),
(13, 'Dốc Quỷ Ám', '\"Dốc quỷ ám\" - là tác phẩm được hàng triệu độc giả tìm kiếm.\r\n', '100000', 'yes', 10, '51y3g75bCJLQu5BN8MJ.jpg', '2022-05-28 02:35:23', NULL, '2022-05-28 15:10:06', NULL, 'active', 4, 33),
(14, 'Dốc Quỷ Ám', '\"Dốc quỷ ám\" - là tác phẩm được hàng triệu độc giả tìm kiếm.\r\n', '100000', 'yes', 10, 'doc-quy-amYIvDZlod.jpg', '2022-05-28 02:35:23', NULL, '2022-05-28 15:10:06', NULL, 'active', 4, 32);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'inactive',
  `ordering` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`) VALUES
(29, 'Tiểu thuyết', 'it-9781501175466_hrsywPqWmG.jpg', '2022-05-27 03:02:23', 'Quang Nguyễn', '2022-05-27 03:28:41', 'Quang Nguyễn', 'inactive', 7),
(30, 'Giáo dục', 'dc265d0727aa32589294e3b2b24fc14fY6vkxIeW.jpg', '2022-05-27 03:30:15', 'Quang Nguyễn', NULL, NULL, 'active', 5),
(31, 'Truyện tranh', '710YhEiTiTLMNLsYPil.jpg', '2022-05-27 03:53:24', 'Quang Nguyễn', NULL, NULL, 'active', 1),
(32, 'Lập trình', 'sach-day-lap-trinh-co-banH2A91hyL.jpg', '2022-05-27 03:54:44', 'Quang Nguyễn', '2022-05-27 03:54:54', 'Quang Nguyễn', 'active', 6),
(33, 'Truyện ma', '51y3g75bCJLLo2lu4xt.jpg', '2022-05-28 00:51:26', 'Quang Nguyễn', NULL, NULL, 'active', 2);

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
(1, 'admin', 'inactive', '2022-05-02 18:59:44', 'admin', '2022-05-21 05:37:33', 'adminnnn', 'inactive'),
(2, 'manager', 'active', '2022-05-02 18:59:44', 'admin', '2022-05-21 00:54:08', 'admin', 'active'),
(3, 'member', 'inactive', '2022-05-02 18:59:44', 'admin', '2022-05-21 00:47:43', 'admin', 'active'),
(4, 'supervisor', 'active', '2022-05-19 16:49:10', 'admin', '2022-05-21 00:55:15', 'quangng', 'active'),
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
(19, 'quangnguyen', 'n.nquangh2t@gmail.com', 'Nguyễn Văn A', '4prwbiil51', '2022-05-21 04:02:26', 'Admin', NULL, NULL, 'inactive', 3),
(20, 'quangtest', 'abcdef@gmail.com', 'nguyen van', '2b10351253eed030812674e8aa18a5ab', '2022-05-21 04:04:53', 'Admin', NULL, NULL, 'active', 208),
(21, 'phpquangnguyen', 'php@gmail.com', 'Tran Van A', '21232f297a57a5a743894a0e4a801fc3', '2022-05-21 04:09:34', 'nguyen van', '2022-05-21 16:27:45', 'Nguyễn Nhựt Quang', 'active', 2),
(22, 'testtt', 'tetstt@gmail.com', 'testet', 'da7619474d1f0c28af4da3b5675ae46f', '2022-05-21 04:10:05', 'nguyen van', NULL, NULL, 'inactive', 208),
(23, 'hellllo', 'hello@gmail.com', 'hellooooooooo', '5d41402abc4b2a76b9719d911017c592', '2022-05-21 04:10:47', 'nguyen van', NULL, NULL, 'active', 209),
(24, 'hiiiiiiiiiii', 'hiiiiiiiiiii@gmail.com', 'hehehehhe', 'cce8f4212df1b3e94c76634d21d2361e', '2022-05-21 04:11:16', 'nguyen van', NULL, NULL, 'active', 4),
(26, 'usertest', 'quang@gmail.com', 'Quang Nguyễn', '974e0509eda5affaf61e79d882c9e6ba', '2022-05-21 13:42:06', 'Nguyễn Nhựt Quang', '2022-05-21 13:42:42', 'Nguyễn Nhựt Quang', 'active', 2),
(27, 'usertest', 'quang@gmail.com', 'Quang Nguyễn', '806b2af4633e64af88d33fbe4165a06a', '2022-05-21 13:47:53', 'Nguyễn Nhựt Quang', NULL, NULL, 'active', 2),
(28, 'quangng', 'quangng@gmail.com', 'Quang Nguyen', 'c2a64dabc1b08b02e943e8f101b969a9', '2022-05-21 16:37:27', 'Nguyễn Nhựt Quang', NULL, NULL, 'inactive', 208),
(29, 'admin2', 'admin2@gmail.com', 'admin2', 'c84258e9c39059a89ab77d846ddab909', '2022-05-21 16:38:44', 'Quang Nguyen', NULL, NULL, 'active', 209),
(30, 'admin', 'admin@gmail.com', 'Quang Nguyễn', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, 'active', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
