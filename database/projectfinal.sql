-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2022 at 07:10 AM
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
  `description` text,
  `price` float NOT NULL,
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
(13, 'Xe bus ma', '<p>Bạn c&oacute; tin tr&ecirc;n đời n&agrave;y c&oacute; ma kh&ocirc;ng? Mọi chuyện bắt đầu từ một chiếc xe bus 666 thần b&iacute;, ba c&ocirc; cậu sinh vi&ecirc;n trẻ Nguyễn Cao Phong, Nguyễn Ngọc Phương Vy v&agrave; Trần Kh&aacute;nh Linh b&egrave;o nước gặp nhau hay l&agrave; do định mệnh sắp đặt? Tai ương n&agrave;o sẽ đến với ba người bọn họ?</p>\r\n\r\n<p>Bọn họ sẽ phải l&agrave;m g&igrave; để chống lại c&aacute;c hồn ma đang nhăm nhe đoạt mạng họ? Đừng nh&igrave;n về ph&iacute;a sau. Đừng đọc đến chương cuối nếu kh&ocirc;ng muốn hối hận. C&aacute;c tổ chức, đo&agrave;n thể hay c&aacute; nh&acirc;n trong truyện đều l&agrave; hư cấu. Mọi sự tr&ugrave;ng hợp đều l&agrave; ngẫu nhi&ecirc;n.</p>\r\n', 50000, 'yes', 0, '29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png', '2022-06-30 15:13:13', 'Quang Nguyễn', '2022-07-21 17:24:18', 'Quang Nguyễn', 'active', 5, 34),
(14, 'Oan hồn người vợ trẻ', '<p>Truyện Oan Hồn Người Vợ Trẻ n&oacute;i về những c&ocirc; g&aacute;i trẻ bị những cường h&agrave;o &aacute;c b&aacute; giờ tr&ograve; l&agrave;m nhục họ c&ograve;n l&agrave;m hại thanh danh của họ n&ecirc;n khi chết c&aacute;c c&ocirc; g&aacute;i đ&oacute; kh&ocirc;ng si&ecirc;u tho&aacute;t, hằng đ&ecirc;m cứ quay về quấy ph&aacute; những kẻ t&agrave; &aacute;c đ&oacute;, nếu x&atilde; hội hay ph&aacute;p luật kh&ocirc;ng trừng trị được bọn họ th&igrave; h&atilde;y để t&acirc;m linh c&aacute;c c&ocirc; g&aacute;i n&agrave;y trừng phạt.</p>\r\n\r\n<p>Những c&aacute;i chết của c&ocirc; g&aacute;i khiến kẻ đầu bạc tiễn kẻ đầu xanh, gia đ&igrave;nh họ chua x&oacute;t nhưng cũng kh&ocirc;ng l&agrave;m g&igrave; được bọn ch&uacute;ng, nhưng ch&iacute;nh lương t&acirc;m của h&aacute;n sẽ tự d&agrave;y v&ograve; hắn cho đến chết.</p>\r\n\r\n<p>Nếu bạn l&agrave; độc giả y&ecirc;u th&iacute;ch thể loại truyện ma kinh dị th&igrave; kh&ocirc;ng n&ecirc;n bỏ qua tựa truyện hay n&agrave;y nh&eacute;.</p>\r\n', 90000, 'yes', 15, 'oan-hon-nguoi-vo-treaONg8bRn.jpg', '2022-06-30 15:34:44', 'Quang Nguyễn', '2022-07-21 16:57:20', 'Quang Nguyễn', 'active', 3, 34),
(15, 'Người mẹ quỷ', '<p>Đ&acirc;y l&agrave; c&acirc;u chuyện cả Việt Nam về cương thi, hay gọi bằng c&aacute;i t&ecirc;n quen thuộc hơn: quỷ nhập tr&agrave;ng. C&oacute; lẽ nghe tới quỷ, mọi người sẽ nghĩ đ&acirc;y l&agrave; một bộ truyện ma kinh dị.</p>\r\n\r\n<p>Nhưng thật ra, khi bạn c&agrave;ng đọc về sau, bạn sẽ c&agrave;ng nhận r&otilde; những t&igrave;nh cảm kh&aacute;c trong truyện: t&igrave;nh cảm gia đ&igrave;nh, t&igrave;nh mẫu tử, t&igrave;nh thầy tr&ograve;,... tất cả sẽ đọng lại trong từng chap truyện của Người Mẹ Quỷ&hellip; Ngo&agrave;i những yếu tố kinh dị, ly kỳ, hấp dẫn, truyện của t&aacute;c giả Trường L&ecirc; c&ograve;n mang một thứ g&igrave; đ&oacute; hơi hướng n&oacute;i về T&igrave;nh Người.</p>\r\n', 100000, 'yes', 30, 'nguoimequymXwh8zNQPWTEA3nC9K.jpg', '2022-06-30 16:09:12', 'Quang Nguyễn', '2022-07-21 17:24:22', 'Quang Nguyễn', 'active', 5, 34),
(16, 'Mao sơn tróc quỷ nhân', '<p>Diệp Thiếu Dương vốn l&agrave; một Mao Sơn tr&oacute;c quỷ nh&acirc;n, dũng cảm tiến v&agrave;o đ&ocirc; thị, gặp người đấu người, gặp quỷ đấu quỷ, gặp y&ecirc;u đấu y&ecirc;u, gặp hồ đấu hồ... Tương t&acirc;y Thi vương, T&agrave; Thần bất tử, điệp ti&ecirc;n hung linh, tứ phương quỷ khấu. Nữ minh tinh nu&ocirc;i tiểu quỷ, c&ocirc;ng ch&uacute;a ho&agrave;ng thất h&uacute;t m&aacute;u, nữ gi&aacute;m đốc l&agrave; hồ y&ecirc;u,... Thi triển Mao Sơn thần thuật, đ&aacute;nh lui tất cả,...</p>\r\n', 120000, 'yes', 40, 'mao-son-troc-quy-nhan83hngfm4.jpg', '2022-06-30 16:11:29', 'Quang Nguyễn', '2022-07-21 17:24:39', 'Quang Nguyễn', 'active', 8, 34),
(17, 'Nhà giả kim', '<p>Tất cả những trải nghiệm trong chuyến phi&ecirc;u du theo đuổi vận mệnh của m&igrave;nh đ&atilde; gi&uacute;p Santiago thấu hiểu được &yacute; nghĩa s&acirc;u xa nhất của hạnh ph&uacute;c, h&ograve;a hợp với vũ trụ v&agrave; con người.</p>\r\n\r\n<p>Tiểu thuyết Nh&agrave; giả kim của Paulo Coelho như một c&acirc;u chuyện cổ t&iacute;ch giản dị, nh&acirc;n &aacute;i, gi&agrave;u chất thơ, thấm đẫm những minh triết huyền b&iacute; của phương Đ&ocirc;ng.</p>\r\n\r\n<p>Trong lần xuất bản đầu ti&ecirc;n tại Brazil v&agrave;o năm 1988, s&aacute;ch chỉ b&aacute;n được 900 bản. Nhưng, với số phận đặc biệt của cuốn s&aacute;ch d&agrave;nh cho to&agrave;n nh&acirc;n loại, vượt ra ngo&agrave;i bi&ecirc;n giới quốc gia, Nh&agrave; giả kim đ&atilde; l&agrave;m rung động h&agrave;ng triệu t&acirc;m hồn, trở th&agrave;nh một trong những cuốn s&aacute;ch b&aacute;n chạy nhất mọi thời đại, v&agrave; c&oacute; thể l&agrave;m thay đổi cuộc đời người đọc. &ldquo;Nhưng nh&agrave; luyện kim đan kh&ocirc;ng quan t&acirc;m mấy đến những điều ấy. &Ocirc;ng đ&atilde; từng thấy nhiều người đến rồi đi, trong khi ốc đảo v&agrave; sa mạc vẫn l&agrave; ốc đảo v&agrave; sa mạc.</p>\r\n\r\n<p>&Ocirc;ng đ&atilde; thấy vua ch&uacute;a v&agrave; kẻ ăn xin đi qua biển c&aacute;t n&agrave;y, c&aacute;i biển c&aacute;t thường xuy&ecirc;n thay h&igrave;nh đổi dạng v&igrave; gi&oacute; thổi nhưng vẫn m&atilde;i m&atilde;i l&agrave; biển c&aacute;t m&agrave; &ocirc;ng đ&atilde; biết từ thuở nhỏ. Tuy vậy, tự đ&aacute;y l&ograve;ng m&igrave;nh, &ocirc;ng kh&ocirc;ng thể kh&ocirc;ng cảm thấy vui trước hạnh ph&uacute;c của mỗi người lữ kh&aacute;ch, sau bao ng&agrave;y chỉ c&oacute; c&aacute;t v&agrave;ng với trời xanh nay được thấy ch&agrave; l&agrave; xanh tươi hiện ra trước mắt. &lsquo;C&oacute; thể Thượng đế tạo ra sa mạc chỉ để cho con người biết qu&yacute; trọng c&acirc;y ch&agrave; l&agrave;,&rsquo; &ocirc;ng nghĩ.&rdquo; - Tr&iacute;ch Nh&agrave; giả kim Nhận định &ldquo;Sau Garcia M&aacute;rquez, đ&acirc;y l&agrave; nh&agrave; văn Mỹ Latinh được đọc nhiều nhất thế giới.&rdquo; - The Economist, London, Anh &ldquo;Santiago c&oacute; khả năng cảm nhận bằng tr&aacute;i tim như Ho&agrave;ng tử b&eacute; của Saint-Exup&eacute;ry.&rdquo; - Frankfurter Allgemeine Zeitung, Đức M&atilde; h&agrave;ng 8935235226272 T&ecirc;n Nh&agrave; Cung Cấp Nh&atilde; Nam T&aacute;c giả Paulo Coelho Người Dịch L&ecirc; Chu Cầu NXB NXB Hội Nh&agrave; Văn Năm XB 2020 Trọng lượng (gr) 220 K&iacute;ch Thước Bao B&igrave; 20.5 x 13 cm Số trang 227 H&igrave;nh thức B&igrave;a Mềm Sản phẩm hiển thị trong Đồ Chơi Cho B&eacute; - Gi&aacute; Cực Tốt Nh&atilde; Nam PNJ Top s&aacute;ch được phi&ecirc;n dịch nhiều nhất VNPAY Sản phẩm b&aacute;n chạy nhất Top 100 sản phẩm Tiểu thuyết b&aacute;n chạy của th&aacute;ng Tất cả những trải nghiệm trong chuyến phi&ecirc;u du theo đuổi vận mệnh của m&igrave;nh đ&atilde; gi&uacute;p Santiago thấu hiểu được &yacute; nghĩa s&acirc;u xa nhất của hạnh ph&uacute;c, h&ograve;a hợp với vũ trụ v&agrave; con người. Tiểu thuyết Nh&agrave; giả kim của Paulo Coelho như một c&acirc;u chuyện cổ t&iacute;ch giản dị, nh&acirc;n &aacute;i, gi&agrave;u chất thơ, thấm đẫm những minh triết huyền b&iacute; của phương Đ&ocirc;ng. Trong lần xuất bản đầu ti&ecirc;n tại Brazil v&agrave;o năm 1988, s&aacute;ch chỉ b&aacute;n được 900 bản.</p>\r\n\r\n<p>Nhưng, với số phận đặc biệt của cuốn s&aacute;ch d&agrave;nh cho to&agrave;n nh&acirc;n loại, vượt ra ngo&agrave;i bi&ecirc;n giới quốc gia, Nh&agrave; giả kim đ&atilde; l&agrave;m rung động h&agrave;ng triệu t&acirc;m hồn, trở th&agrave;nh một trong những cuốn s&aacute;ch b&aacute;n chạy nhất mọi thời đại, v&agrave; c&oacute; thể l&agrave;m thay đổi cuộc đời người đọc. &ldquo;Nhưng nh&agrave; luyện kim đan kh&ocirc;ng quan t&acirc;m mấy đến những điều ấy. &Ocirc;ng đ&atilde; từng thấy nhiều người đến rồi đi, trong khi ốc đảo v&agrave; sa mạc vẫn l&agrave; ốc đảo v&agrave; sa mạc. &Ocirc;ng đ&atilde; thấy vua ch&uacute;a v&agrave; kẻ ăn xin đi qua biển c&aacute;t n&agrave;y, c&aacute;i biển c&aacute;t thường xuy&ecirc;n thay h&igrave;nh đổi dạng v&igrave; gi&oacute; thổi nhưng vẫn m&atilde;i m&atilde;i l&agrave; biển c&aacute;t m&agrave; &ocirc;ng đ&atilde; biết từ thuở nhỏ. Tuy vậy, tự đ&aacute;y l&ograve;ng m&igrave;nh, &ocirc;ng kh&ocirc;ng thể kh&ocirc;ng cảm thấy vui trước hạnh ph&uacute;c của mỗi người lữ kh&aacute;ch, sau bao ng&agrave;y chỉ c&oacute; c&aacute;t v&agrave;ng với trời xanh nay được thấy ch&agrave; l&agrave; xanh tươi hiện ra trước mắt. &lsquo;C&oacute; thể Thượng đế tạo ra sa mạc chỉ để cho con người biết qu&yacute; trọng c&acirc;y ch&agrave; l&agrave;,&rsquo; &ocirc;ng nghĩ.&rdquo;</p>\r\n\r\n<p>- Tr&iacute;ch Nh&agrave; giả kim</p>\r\n', 55000, 'yes', 30, 'image_195509_1_36793FToQdJyN.jpg', '2022-06-30 16:14:11', 'Quang Nguyễn', '2022-07-21 17:24:35', 'Quang Nguyễn', 'active', 7, 33),
(18, 'Hai số phận', '<p>&ldquo;Hai số phận&rdquo; kh&ocirc;ng chỉ đơn thuần l&agrave; một cuốn tiểu thuyết, đ&acirc;y c&oacute; thể xem l&agrave; &quot;th&aacute;nh kinh&quot; cho những người đọc v&agrave; suy ngẫm, những ai kh&ocirc;ng dễ d&atilde;i, kh&ocirc;ng chấp nhận lối m&ograve;n. &ldquo;Hai số phận&rdquo; l&agrave;m rung động mọi tr&aacute;i tim quả cảm, n&oacute; c&oacute; thể l&agrave;m thay đổi cả cuộc đời bạn. Đọc cuốn s&aacute;ch n&agrave;y, bạn sẽ bị chi phối bởi c&aacute; t&iacute;nh của hai nh&acirc;n vật ch&iacute;nh, hoặc bạn l&agrave; Kane, hoặc sẽ l&agrave; Abel, kh&ocirc;ng thể n&agrave;o nhầm lẫn. V&agrave; điều đ&oacute; sẽ khiến bạn thấy được ch&iacute;nh m&igrave;nh.</p>\r\n\r\n<p>Khi bạn y&ecirc;u th&iacute;ch t&aacute;c phẩm n&agrave;y, người ta sẽ nh&igrave;n ra c&aacute; t&iacute;nh v&agrave; t&acirc;m hồn th&uacute; vị của bạn! &ldquo;Nếu c&oacute; giải thưởng Nobel về khả năng kể chuyện, giải thưởng đ&oacute; chắc chắn sẽ thuộc về Archer.&rdquo; - Daily Telegraph- (&ldquo;Hai số phận&rdquo; (Kane &amp; Abel) l&agrave; c&acirc;u chuyện về hai người đ&agrave;n &ocirc;ng đi t&igrave;m vinh quang. William Kane l&agrave; con một triệu ph&uacute; nổi tiếng tr&ecirc;n đất Mỹ, lớn l&ecirc;n trong nhung lụa của thế giới thượng lưu.</p>\r\n\r\n<p>Wladek Koskiewicz l&agrave; đứa trẻ kh&ocirc;ng r&otilde; xuất th&acirc;n, được gia đ&igrave;nh người bẫy th&uacute; nhặt về nu&ocirc;i. Một người được ấn định để trở th&agrave;nh chủ ng&acirc;n h&agrave;ng khi lớn l&ecirc;n, người kia nhập cư v&agrave;o Mỹ c&ugrave;ng đo&agrave;n người ngh&egrave;o khổ. Trải qua hơn s&aacute;u mươi năm với biết bao biến động, hai con người gi&agrave;u ho&agrave;i b&atilde;o miệt m&agrave;i x&acirc;y dựng vận mệnh của m&igrave;nh . &ldquo;Hai số phận&rdquo; n&oacute;i về nỗi kh&aacute;t khao ch&aacute;y bỏng, những nghĩa cử, những mối th&acirc;m th&ugrave;, từng bước đường phi&ecirc;u lưu, hiện thực thế giới v&agrave; những g&oacute;c khuất... m&ecirc; hoặc người đọc bằng ng&ocirc;n từ c&ocirc; đọng, hai mạch truyện song song được x&acirc;y dựng tinh tế từ những chi tiết nhỏ nhất.)</p>\r\n', 122000, 'yes', 30, 'image_179484vzkeJ6Ln.jpg', '2022-06-30 16:17:38', 'Quang Nguyễn', '2022-07-21 17:24:46', 'Quang Nguyễn', 'active', 10, 33),
(19, 'Chiến binh cầu vồng', '<p>&ldquo;Thầy Harfan v&agrave; c&ocirc; Mus ngh&egrave;o khổ đ&atilde; mang đến cho t&ocirc;i tuổi thơ đẹp nhất, t&igrave;nh bạn đẹp nhất, v&agrave; t&acirc;m hồn phong ph&uacute;, một thứ g&igrave; đ&oacute; v&ocirc; gi&aacute;, thậm ch&iacute; c&ograve;n c&oacute; gi&aacute; trị hơn những khao kh&aacute;t mơ ước. C&oacute; thể t&ocirc;i lầm, nhưng theo &yacute; t&ocirc;i, đ&acirc;y thật sự l&agrave; hơi thở của gi&aacute;o dục v&agrave; linh hồn của một chốn được gọi l&agrave; trường học.&rdquo;</p>\r\n\r\n<p>- (Tr&iacute;ch t&aacute;c phẩm)</p>\r\n\r\n<p>Trong ng&agrave;y khai giảng, nhờ sự xuất hiện v&agrave;o ph&uacute;t ch&oacute;t của cậu b&eacute; thiểu năng tr&iacute; tuệ Harun, trường Muhammadiyah may mắn tho&aacute;t khỏi nguy cơ đ&oacute;ng cửa. Nhưng ước mơ dạy v&agrave; học trong ng&ocirc;i trường Hồi gi&aacute;o ấy liệu sẽ đi về đ&acirc;u, khi ng&ocirc;i trường xập xệ dường như sẵn s&agrave;ng sụp xuống bất cứ l&uacute;c n&agrave;o, khi lời đe dọa đ&oacute;ng cửa từ vi&ecirc;n thanh tra gi&aacute;o dục lu&ocirc;n lơ lửng tr&ecirc;n đầu, khi những cỗ m&aacute;y x&uacute;c hung dữ đang chực chờ xới tung ng&ocirc;i trường để d&ograve; mạch thiếc&hellip;?</p>\r\n\r\n<p>V&agrave; liệu niềm đam m&ecirc; học tập của những Chiến binh Cầu vồng đ&oacute; c&oacute; đủ sức chinh phục qu&atilde;ng đường ng&agrave;y ng&agrave;y đạp xe bốn mươi c&acirc;y số, rồi đầm c&aacute; sấu l&uacute;c nh&uacute;c bọn ăn thịt người, chưa kể sự m&ecirc; hoặc từ những chuyến phi&ecirc;u lưu chết người theo tiếng gọi của ng&agrave;i ph&aacute;p sư b&iacute; ẩn tr&ecirc;n đảo Hải Tặc, c&ugrave;ng sức c&aacute;m dỗ kh&ocirc;n cưỡng từ những đồng tiền c&ograve;m kiếm được nhờ c&ocirc;ng việc cu li to&agrave;n thời gian ...?</p>\r\n\r\n<p>Chiến binh Cầu vồng c&oacute; cả t&igrave;nh y&ecirc;u trong s&aacute;ng tuổi học tr&ograve; lẫn những tr&ograve; đ&ugrave;a tinh qu&aacute;i, cả nước mắt lẫn tiếng cười &ndash; một bức tranh ch&acirc;n thực về hố s&acirc;u ngăn c&aacute;ch gi&agrave;u ngh&egrave;o, một t&aacute;c phẩm văn học cảm động truyền tải s&acirc;u sắc nhất &yacute; nghĩa đ&iacute;ch thực của việc l&agrave;m thầy, việc l&agrave;m tr&ograve; v&agrave; việc học.</p>\r\n\r\n<p>T&aacute;c phẩm đ&atilde; b&aacute;n được tr&ecirc;n năm triệu bản, được dịch ra 26 thứ tiếng, l&agrave; một trong những đại diện xuất sắc nhất của văn học Indonesia hiện đại.</p>\r\n', 92000, 'yes', 30, 'image_195509_1_36366X8Gc0KCT.jpg', '2022-06-30 16:19:08', 'Quang Nguyễn', '2022-07-21 17:27:23', 'Quang Nguyễn', 'active', 50, 33),
(20, 'Hoàng tử bé', '<p>Ho&agrave;ng tử b&eacute; được viết ở New York trong những ng&agrave;y t&aacute;c giả sống lưu vong v&agrave; được xuất bản lần đầu ti&ecirc;n tại New York v&agrave;o năm 1943, rồi đến năm 1946 mới được xuất bản tại Ph&aacute;p. Kh&ocirc;ng nghi ngờ g&igrave;, đ&acirc;y l&agrave; t&aacute;c phẩm nổi tiếng nhất, được đọc nhiều nhất v&agrave; cũng được y&ecirc;u mến nhất của Saint-Exup&eacute;ry.</p>\r\n\r\n<p>Cuốn s&aacute;ch được b&igrave;nh chọn l&agrave; t&aacute;c phẩm hay nhất thế kỉ 20 ở Ph&aacute;p, đồng thời cũng l&agrave; cuốn s&aacute;ch Ph&aacute;p được dịch v&agrave; được đọc nhiều nhất tr&ecirc;n thế giới. Với 250 ng&ocirc;n ngữ dịch kh&aacute;c nhau kể cả phương ngữ c&ugrave;ng hơn 200 triệu bản in tr&ecirc;n to&agrave;n thế giới, Ho&agrave;ng tử b&eacute; được coi l&agrave; một trong những t&aacute;c phẩm b&aacute;n chạy nhất của nh&acirc;n loại.</p>\r\n', 52000, 'yes', 31, 'image_1870105rj61ysc.jpg', '2022-06-30 16:20:38', 'Quang Nguyễn', '2022-07-21 17:25:09', 'Quang Nguyễn', 'active', 21, 35),
(21, 'Những Câu Chuyện Truyền Cảm Hứng: Con Sẽ Tự Giác', '<p>&ldquo;Con sẽ tự gi&aacute;c&rdquo; kể những c&acirc;u chuyện về tinh thần học tập miệt m&agrave;i. Mỗi nh&acirc;n vật trong cuốn s&aacute;ch n&agrave;y đều kể những c&acirc;u chuyện rất ri&ecirc;ng về qu&aacute; tr&igrave;nh học tập của m&igrave;nh. Tr&ecirc;n con đường trưởng th&agrave;nh, nếu biết tự nhận thức bản th&acirc;n, hiểu r&otilde; mục ti&ecirc;u ph&aacute;t triển của m&igrave;nh, bồi đắp l&ograve;ng tự tin, d&aacute;m đối mặt với thử th&aacute;ch v&agrave; ki&ecirc;n tr&igrave; ph&aacute;t huy năng lực bản th&acirc;n, ch&uacute;ng ta đều c&oacute; thể thực hiện được ước mơ v&agrave; trở n&ecirc;n tốt đẹp hơn, th&agrave;nh c&ocirc;ng hơn.</p>\r\n\r\n<p>Bộ s&aacute;ch &ldquo;Những c&acirc;u chuyện truyền cảm hứng&rdquo; được chia th&agrave;nh c&aacute;c chủ đề thiết thực, gi&uacute;p bạn đọc nhỏ tuổi t&igrave;m hiểu v&agrave; r&egrave;n những th&oacute;i quen, đức t&iacute;nh tốt. Mỗi cuốn gồm nhiều c&acirc;u chuyện nhỏ, trong đ&oacute; c&oacute; cả những hồi ức đ&aacute;ng nhớ của c&aacute;c nh&acirc;n vật nổi tiếng tr&ecirc;n thế giới... Mong rằng bộ s&aacute;ch sẽ trở th&agrave;nh bạn đồng h&agrave;nh t&iacute;ch cực, c&ugrave;ng c&aacute;c em bước v&agrave;o tương lai rực rỡ</p>\r\n', 45000, 'yes', 10, 'image_195509_1_7128ZBAwIbYc.jpg', '2022-06-30 16:22:12', 'Quang Nguyễn', '2022-07-21 17:25:38', 'Quang Nguyễn', 'active', 36, 35),
(22, 'Giải Thích Ngữ Pháp Tiếng Anh (Tái Bản 2022)', '<p>S&aacute;ch Giải Th&iacute;ch Ngữ Ph&aacute;p Tiếng Anh, t&aacute;c Mai Lan Hương &ndash; H&agrave; Thanh Uy&ecirc;n, l&agrave; cuốn s&aacute;ch ngữ ph&aacute;p đ&atilde; được ph&aacute;t h&agrave;nh v&agrave; t&aacute;i bản rất nhiều lần trong những năm qua.</p>\r\n\r\n<p>Giải Th&iacute;ch Ngữ Ph&aacute;p Tiếng Anh được bi&ecirc;n soạn th&agrave;nh 9 chương, đề cập đến những vấn đề ngữ ph&aacute;p từ cơ bản đến n&acirc;ng cao, ph&ugrave; hợp với mọi tr&igrave;nh độ. C&aacute;c chủ điểm ngữ ph&aacute;p trong từng chương được bi&ecirc;n soạn chi tiết, giải th&iacute;ch cặn kẽ c&aacute;c c&aacute;ch d&ugrave;ng v&agrave; quy luật m&agrave; người học cần nắm vững.</p>\r\n\r\n<p>Sau mỗi chủ điểm ngữ ph&aacute;p l&agrave; phần b&agrave;i tập đa dạng nhằm gi&uacute;p người học củng cố l&yacute; thuyết. Hy vọng Giải Th&iacute;ch Ngữ Ph&aacute;p Tiếng Anh sẽ l&agrave; một quyển s&aacute;ch thiết thực, đ&aacute;p ứng y&ecirc;u cầu học, &ocirc;n tập v&agrave; n&acirc;ng cao tr&igrave;nh độ ngữ ph&aacute;p cho người học v&agrave; l&agrave; quyển s&aacute;ch tham khảo bổ &iacute;ch d&agrave;nh cho gi&aacute;o vi&ecirc;n.</p>\r\n', 154000, 'yes', 35, 'z3097453775918_7ea22457f168a4de92d0ba8178a2257bDW6h8K9J.jpg', '2022-06-30 16:23:18', 'Quang Nguyễn', '2022-07-21 17:24:29', 'Quang Nguyễn', 'active', 5, 36),
(23, 'Lập trình IoT với Arduino', '<p>Lập Tr&igrave;nh Iot Với Arduino ARDUINO v&agrave; lập tr&igrave;nh ToT c&oacute; 3 phần với 10 chương.</p>\r\n\r\n<p>Phần 1: Giới thiệu Chương 1: Tổng quan về hệ thống nh&uacute;ng, về IoT, về Arduino, Arduino v&agrave; Raspberry, Serial monitor, c&aacute;c link kiện thực h&agrave;nh.</p>\r\n\r\n<p>Phần 2: ARDUINO v&agrave; Cảm biến Chương 2: Tổng quan về cảm biến Chương 3: Thực h&agrave;nh với Qrduino 1) Đọc gi&aacute; trị điện &aacute;p ng&otilde; v&agrave;o Analog 2) Điều khiển tốc độ s&aacute;ng tắt với biến trở 3) Lập tr&igrave;nh với ng&otilde; v&agrave;o (Input) 4) Mạch sử dụng hai n&uacute;t nhấn v&agrave; một Led 5) Mạch sử dụng chiết &aacute;p 6) Điều khiển Led RGB 7) Điều khiển Led cầu v&ograve;ng 8) Điều khiển Led s&aacute;ng dạng thanh Chương 4: Arduino v&agrave; cảm biến Arduino v&agrave; cảm biến Nhiệt độ-Độ ẩm. Cảm biến tiệm cận. Arduino v&agrave; cảm biến hồng ngoại. Cảm biến quang. Cảm biến kh&oacute;i-đầu d&ograve; kh&oacute;i. Arduino v&agrave; cảm biến dịch chuyển PIR. Đo nhiệt độ,độ ẩm từ xa với bo thu ph&aacute;t cao tần . Phần 3: Lập tr&igrave;nh IOT với ARDUINO V&Agrave; ESP8266 Chương 5: Truyền th&ocirc;ng c&oacute; d&acirc;y v&agrave; kh&ocirc;ng d&acirc;y Chương 6: Cấu h&igrave;nh cho ESP8266 Chương 7: C&aacute;c b&agrave;i tập cơ bản kh&aacute;c của ESP8266 Chương 8: Một số t&iacute;nh năng kh&aacute;c của ESP8266 Chương 9: Sử dụng Micro Python trong ESP8266 Chương 10: Lập tr&igrave;nh với GPS, GSM v&agrave; GPRS Hệ thống định vị to&agrave;n cầu (GPS). Bảng th&ocirc;ng b&aacute;o kh&ocirc;ng d&acirc;y sử dụng GSM v&agrave; Arduino. Gủi dữ liệu qua GPRS Sim800I đến Thingspeak. Khắc phục sự cố khi sử dụng Sim800I. Lập tr&igrave;nh GPS với STM32</p>\r\n', 137500, 'yes', 20, 'image_191567TcsN4tvE.jpg', '2022-06-30 16:27:14', 'Quang Nguyễn', '2022-07-21 17:26:46', 'Quang Nguyễn', 'active', 41, 37),
(24, 'Lập trình với C#', '<p>Hướng dẫn người học từng bước lập tr&igrave;nh với C#. X&acirc;y dựng ứng dụng tr&ecirc;n Window Form. X&acirc;y dựng ứng dụng, tạo hai trang web quản l&yacute; b&aacute;n h&agrave;ng v&agrave; quản l&yacute; tuyển sinh với c&aacute;c hướng dẫn từng bước l&agrave;m cơ sở cho việc thiết kế c&aacute;c trang web phức tạp hơn. Nội dung ch&iacute;nh: - Phần 1: Lập Tr&igrave;nh Với C# - Ứng dụng Windows form- Phần 2: Lập Tr&igrave;nh Với C# - Quản l&yacute; b&aacute;n h&agrave;ng- Phần 3: Lập Tr&igrave;nh Với C# - Quản l&yacute; tuyển sinh</p>\r\n', 106000, 'yes', 45, 'image_191566onab1gl8.jpg', '2022-06-30 16:29:11', 'Quang Nguyễn', '2022-07-21 17:25:03', 'Quang Nguyễn', 'active', 34, 37),
(25, 'Hành Trang Lập Trình - Những Kỹ Năng Lập Trình Viên Chuyên Nghiệp Cần Có', '<p>Cuốn s&aacute;ch gồm 2 nội dung ch&iacute;nh:</p>\r\n\r\n<p>Chương I: Phần n&agrave;y tr&igrave;nh b&agrave;y những suy nghĩ v&agrave; kĩ năng mềm cần thiết để bạn c&oacute; thể h&ograve;a nhập v&agrave; tiến xa được trong lĩnh vực c&ocirc;ng nghệ phần mềm. Nội dung trong phần n&agrave;y lại được chia th&agrave;nh những mục nhỏ hơn tương ứng với từng giai đoạn học tập v&agrave; l&agrave;m việc: o Giai đoạn 1 &ndash; Học nghề: Tr&igrave;nh b&agrave;y những th&aacute;i độ v&agrave; kĩ năng học tập cần thiết để c&oacute; thể học tập hiệu quả ở trường, cũng như chuẩn bị h&agrave;nh trang cho qu&aacute; tr&igrave;nh l&agrave;m việc sau n&agrave;y. o Giai đoạn 2 &ndash; V&agrave;o nghề: Cung cấp một v&agrave;i th&ocirc;ng tin hữu &iacute;ch li&ecirc;n quan tới việc t&igrave;m kiếm v&agrave; ứng tuyển v&agrave;o những c&ocirc;ng ty c&ocirc;ng nghệ, phần n&agrave;y cũng đưa ra v&agrave;i g&oacute;c nh&igrave;n li&ecirc;n quan tới việc đ&aacute;nh gi&aacute; v&agrave; so s&aacute;nh nơi l&agrave;m việc để bạn t&igrave;m ra được c&ocirc;ng ty ph&ugrave; hợp. o Giai đoạn 3 &ndash; Ph&aacute;t triển trong nghề: Sau khi đ&atilde; t&igrave;m được nơi l&agrave;m việc, phần n&agrave;y sẽ tr&igrave;nh b&agrave;y những suy nghĩ v&agrave; c&aacute;ch tư duy l&agrave;m việc để gi&uacute;p bạn c&oacute; thể tiến bộ hơn trong sự nghiệp lập tr&igrave;nh vi&ecirc;n.</p>\r\n\r\n<p>Chương II: Phần n&agrave;y sẽ đi s&acirc;u v&agrave;o một v&agrave;i kiến thức kĩ thuật nền tảng m&igrave;nh nghĩ l&agrave; cần thiết cho qu&aacute; tr&igrave;nh ph&aacute;t triển sau n&agrave;y của một lập tr&igrave;nh vi&ecirc;n. o Phần 1 &ndash; Clean Code (M&atilde; sạch): Những d&ograve;ng code được viết ra kh&ocirc;ng phải chỉ d&agrave;nh cho m&aacute;y t&iacute;nh, m&agrave; c&ograve;n l&agrave; để cho con người (bảo tr&igrave;, ph&aacute;t triển&hellip;), đ&acirc;y l&agrave; điều cực k&igrave; quan trọng nhưng thường &iacute;t được dạy kĩ c&agrave;ng khi ở trường. Phần n&agrave;y sẽ hướng dẫn c&aacute;c bạn c&aacute;ch để viết m&atilde; sạch. o Phần 2 &ndash; Những nguy&ecirc;n l&iacute; lập tr&igrave;nh n&acirc;ng cao (SOLID): Viết code chạy được chỉ l&agrave; bước đầu ti&ecirc;n, để trở th&agrave;nh lập tr&igrave;nh vi&ecirc;n giỏi ch&uacute;ng ta cần phải biết c&aacute;ch viết code dễ bảo tr&igrave;, dễ mở rộng v&agrave; linh hoạt hơn. Phần n&agrave;y sẽ c&ugrave;ng bạn b&agrave;n luận về những nguy&ecirc;n l&iacute; lập tr&igrave;nh n&acirc;ng cao m&agrave; mọi lập tr&igrave;nh vi&ecirc;n c&oacute; kinh nghiệm cần phải biết. o Phần 3 &ndash; Đơn giản h&oacute;a c&aacute;c kh&aacute;i niệm kĩ thuật phức tạp: Lập tr&igrave;nh kh&ocirc;ng dễ, những cũng kh&ocirc;ng thật sự kh&oacute;, phần n&agrave;y sẽ cố gắng giải th&iacute;ch những kh&aacute;i niệm v&agrave; kĩ thuật phức tạp nhằm gi&uacute;p bạn c&oacute; thể nhanh ch&oacute;ng n&acirc;ng cao kĩ năng của bản th&acirc;n. Lời khuy&ecirc;n của Bi&ecirc;n tập vi&ecirc;n d&agrave;nh cho việc đọc cuốn s&aacute;ch Đ&acirc;y l&agrave; một cuốn s&aacute;ch về kĩ thuật, nhưng bạn đừng qu&aacute; lo lắng nếu như chưa c&oacute; nhiều kiến thức chuy&ecirc;n m&ocirc;n trong ng&agrave;nh. Cuốn s&aacute;ch n&agrave;y được thiết kế v&agrave; tr&igrave;nh b&agrave;y đơn giản h&oacute;a theo những c&aacute;ch dễ hiểu nhất để c&aacute;c bạn sinh vi&ecirc;n hoặc c&aacute;c bạn vừa mới đi l&agrave;m cũng c&oacute; thể hiểu một c&aacute;ch dễ d&agrave;ng. C&aacute;c bạn cũng c&oacute; thể tham khảo qua bảng danh s&aacute;ch thuật ngữ ở cuối s&aacute;ch để c&oacute; thể hiểu những kh&aacute;i niệm được đề cập tới trong s&aacute;ch. T&aacute;c giả Vũ C&ocirc;ng Tấn T&agrave;i T&aacute;c giả Vũ C&ocirc;ng Tấn T&agrave;i hiện đang l&agrave;m việc như một lập tr&igrave;nh vi&ecirc;n full-stack to&agrave;n thời gian trong lĩnh vực ph&aacute;t triển ứng dụng Web v&agrave; tham gia v&agrave;o c&aacute;c dự &aacute;n triển khai hệ thống CI/CD phục vụ cho c&aacute;c y&ecirc;u cầu n&acirc;ng cao chất lượng sản phẩm. B&ecirc;n cạnh c&ocirc;ng việc ch&iacute;nh, t&aacute;c giả cũng thường tham gia hướng dẫn c&aacute;c lớp học lập tr&igrave;nh cũng như tổ chức c&aacute;c buổi chia sẻ kinh nghiệm l&agrave;m việc cho c&aacute;c bạn sinh vi&ecirc;n. Trong suốt qu&aacute; tr&igrave;nh l&agrave;m việc v&agrave; t&igrave;m kiếm th&ocirc;ng tin, t&aacute;c giả Vũ C&ocirc;ng Tấn T&agrave;i nhận ra rằng lập tr&igrave;nh vi&ecirc;n ở Việt Nam kh&aacute; c&ocirc; đơn v&agrave; thiệt th&ograve;i: kh&ocirc;ng c&oacute; nhiều nguồn th&ocirc;ng tin bằng tiếng Việt, nếu c&oacute; th&igrave; cũng nằm rải r&aacute;c ở nhiều nơi, g&acirc;y ra kh&ocirc;ng &iacute;t kh&oacute; khăn cho nhiều người. Với mong muốn chia sẻ thật nhiều kiến thức, trong cuốn s&aacute;ch n&agrave;y, t&aacute;c giả sẽ đem đến cho c&aacute;c bạn nhiều điều về nghề lập tr&igrave;nh cũng như c&ocirc;ng việc của những nh&agrave; ph&aacute;t triển phần mềm &ndash; hay ch&uacute;ng ta vẫn hay gọi l&agrave; nghề &ldquo;lập tr&igrave;nh vi&ecirc;n&rdquo;.</p>\r\n', 145000, 'yes', 50, 'image_195509_1_19543h4MRTLVg.jpg', '2022-06-30 16:31:27', 'Quang Nguyễn', '2022-07-21 17:27:46', 'Quang Nguyễn', 'active', 69, 37),
(26, 'Mặt trái của công nghệ', '<p>Kỹ thuật, c&ocirc;ng nghệ đ&oacute;ng vai tr&ograve; quan trọng, tạo n&ecirc;n những bước ph&aacute;t triển đột ph&aacute; của x&atilde; hội lo&agrave;i người, từ h&agrave;ng ngh&igrave;n năm trước đ&acirc;y cũng như trong bối cảnh C&aacute;ch mạng c&ocirc;ng nghiệp lần thứ tư hiện nay. Những ph&aacute;t minh của con người từ vi&ecirc;n đ&aacute; lửa cho đến c&aacute;c c&ocirc;ng cụ bằng kim loại, động cơ hơi nước, năng lượng điện, b&oacute;ng b&aacute;n dẫn cho đến m&aacute;y t&iacute;nh điện tử, mạng Internet, tr&iacute; tuệ nh&acirc;n tạo,... l&agrave; nền m&oacute;ng, trụ cột cho sự ph&aacute;t triển của tất cả c&aacute;c ng&agrave;nh v&agrave; lĩnh vực.</p>\r\n\r\n<p>Nhờ c&oacute; tiến bộ khoa học - c&ocirc;ng nghệ m&agrave; năng suất lao động tăng nhanh, người d&acirc;n ở nhiều quốc gia trở n&ecirc;n gi&agrave;u c&oacute;, sung t&uacute;c, khỏe mạnh v&agrave; sống l&acirc;u hơn. Tuy nhi&ecirc;n, c&aacute;c ph&aacute;t minh, s&aacute;ng chế c&oacute; thể c&oacute; những t&aacute;c động phụ, ti&ecirc;u cực đến đời sống con người cũng như m&ocirc;i trường sinh th&aacute;i tự nhi&ecirc;n. Để gi&uacute;p bạn đọc c&oacute; th&ecirc;m t&agrave;i liệu tham khảo về những vấn đề tr&ecirc;n, Nh&agrave; xuất bản Ch&iacute;nh trị quốc gia Sự thật v&agrave; Th&aacute;i H&agrave; Books tổ chức bi&ecirc;n dịch v&agrave; xuất bản cuốn s&aacute;ch Mặt tr&aacute;i của c&ocirc;ng nghệ của t&aacute;c giả Peter Townsend do Nh&agrave; xuất bản Oxford ấn h&agrave;nh năm 2016. Với 15 chương, nội dung cuốn s&aacute;ch đ&atilde; đề cập rất cụ thể về những t&aacute;c động ti&ecirc;u cực, mặt tr&aacute;i của c&ocirc;ng nghệ như: việc con người biết sử dụng than đ&aacute;, ph&aacute;t triển mạnh khai th&aacute;c kho&aacute;ng sản, nhưng lại l&agrave;m thay đổi điều kiện tự nhi&ecirc;n v&agrave; biến đổi kh&iacute; hậu, nhiều thi&ecirc;n tai g&acirc;y ra cho nh&acirc;n loại; những ph&aacute;t minh, s&aacute;ng chế li&ecirc;n quan đến chữ viết, giấy, da, thuốc kh&aacute;ng sinh, phim ảnh, mạng x&atilde; hội... ngo&agrave;i những lợi &iacute;ch v&ocirc; c&ugrave;ng to lớn mang đến cho con người th&igrave; cũng c&oacute; những ảnh hưởng kh&ocirc;ng tốt đến sức khỏe, sự an to&agrave;n, những kỹ năng sống v&agrave; văn h&oacute;a của c&aacute;c th&agrave;nh vi&ecirc;n trong x&atilde; hội...</p>\r\n\r\n<p>T&aacute;c giả Peter Townsend cũng cảnh b&aacute;o, c&ocirc;ng nghệ c&oacute; thể đem lại nhiều lợi &iacute;ch cho sản xuất v&agrave; đời sống nhưng kh&ocirc;ng n&ecirc;n ho&agrave;n to&agrave;n phụ thuộc v&agrave; bị động trước c&ocirc;ng nghệ, cần dự b&aacute;o những rủi ro v&agrave; c&oacute; biện ph&aacute;p đề ph&ograve;ng những th&aacute;ch thức, mặt tr&aacute;i m&agrave; c&ocirc;ng nghệ mang lại cả do l&ograve;ng tham cũng như sự hiểu biết chưa đầy đủ của con người về c&ocirc;ng nghệ.</p>\r\n', 99800, 'yes', 65, 'image_182009xYtQVAn2.jpg', '2022-06-30 16:33:12', 'Quang Nguyễn', '2022-07-21 17:24:51', 'Quang Nguyễn', 'active', 11, 37),
(27, 'FinTech 4.0  - Cách mạng công nghệ tài chính', '<p>Thế giới đang đứng trước một cơ hội lớn c&oacute; thể gọi l&agrave; cuộc C&aacute;ch mạng c&ocirc;ng nghiệp lần thứ tư. Đ&acirc;y kh&ocirc;ng chỉ đơn thuần l&agrave; sự đổi mới về mặt kỹ thuật, m&agrave; l&agrave; sự thay đổi lớn về c&ocirc;ng nghệ ở mức độ c&oacute; thể tạo ra một cuộc c&aacute;ch mạng thay đổi cơ bản cấu tr&uacute;c của x&atilde; hội hiện tại. Một trong những đại diện của n&oacute; l&agrave; cuộc c&aacute;ch mạng trong nền c&ocirc;ng nghiệp T&agrave;i ch&iacute;nh &ndash; FinTech. C&oacute; thể coi những c&ocirc;ng ty FinTech đang đảm nhận vai tr&ograve; n&agrave;y l&agrave; những &ldquo;c&ocirc;ng ty c&ocirc;ng nghệ chuy&ecirc;n xử l&yacute; dữ liệu lớn li&ecirc;n quan đến tiền.&rdquo; Hơi v&ograve;ng vo một ch&uacute;t, tại Diễn đ&agrave;n Davos năm 2016 đ&atilde; diễn ra một cuộc thảo luận kh&aacute; th&uacute; vị. Đ&oacute; l&agrave; trả lời c&acirc;u hỏi &ldquo;Bạn nghĩ rằng thế giới hiện đang chiến tranh hay h&ograve;a b&igrave;nh?&rdquo; C&acirc;u hỏi mới nghe tưởng chừng đơn giản nhưng lại rất kh&oacute; trả lời. Theo kh&aacute;i niệm trước đ&acirc;y, chiến tranh được định nghĩa l&agrave; khi &ldquo;c&oacute; sự di chuyển của hệ thống qu&acirc;n đội&rdquo;. Nhưng ng&agrave;y nay với c&ocirc;ng nghệ mới ph&aacute;t triển, kh&ocirc;ng cần phải di chuyển hệ thống qu&acirc;n đội cũng c&oacute; thể tấn c&ocirc;ng đối thủ. Đ&oacute; l&agrave; chiến tranh dưới h&igrave;nh thức khủng bố v&agrave; tấn c&ocirc;ng mạng. Tr&ecirc;n thực tế, những vấn đề tương tự đang xảy ra ở mọi kh&iacute;a cạnh của nền kinh tế. N&oacute;i một c&aacute;ch kh&aacute;i qu&aacute;t, trong cuộc c&aacute;ch mạng c&ocirc;ng nghiệp lần thứ tư n&agrave;y, c&aacute;c hệ thống v&agrave; cơ sở hạ tầng x&atilde; hội kh&aacute;c nhau m&agrave; ch&uacute;ng ta x&acirc;y dựng từ trước đến nay c&oacute; thể sẽ trở n&ecirc;n kh&ocirc;ng c&ograve;n cần thiết nữa</p>\r\n', 60000, 'yes', 55, 'image_17519045OJhdHF.jpg', '2022-06-30 16:35:08', 'Quang Nguyễn', '2022-07-21 17:25:15', 'Quang Nguyễn', 'active', 34, 37),
(28, 'Kỳ Lân Công Nghệ - Giấc Mơ, Hiện Thực & Sự Tan Biến...', '<p>Kỳ L&acirc;n C&ocirc;ng Nghệ - Giấc Mơ, Hiện Thực &amp; Sự Tan Biến... Đ&acirc;y l&agrave; tuyển tập c&aacute;c b&agrave;i b&aacute;o về c&ocirc;ng nghệ của một c&acirc;y b&uacute;t chuy&ecirc;n về c&ocirc;ng nghệ. Nhưng ch&uacute;ng kh&ocirc;ng phải những b&agrave;i b&aacute;o c&ocirc;ng nghệ mang t&iacute;nh học thuật, chuy&ecirc;n m&ocirc;n m&agrave; l&agrave; viết về thời sự c&ocirc;ng nghệ, c&ocirc;ng nghệ giữa d&ograve;ng đời.</p>\r\n\r\n<p>Sức hấp dẫn để đọc của những b&agrave;i viết về c&ocirc;ng nghệ của Thẩm Hồng Thụy l&agrave; sự đan xen, h&ograve;a quyện giữa chuyện đời thường v&agrave; c&ocirc;ng nghệ. Như chuyện kỳ &aacute;n về &ldquo;hợp đồng t&igrave;nh &aacute;i&rdquo; của một c&ocirc; hoa hậu được d&ugrave;ng để so s&aacute;nh với vụ người d&ugrave;ng di động ở Việt Nam bị một c&ocirc;ng ty kinh doanh dịch vụ di động Hongkong &ldquo;trấn lột&rdquo; h&agrave;ng trăm tỷ đồng trong c&aacute;i mối li&ecirc;n minh đầy d&iacute;ch dắc với nh&agrave; mạng, nh&agrave; cung cấp nội dung xứ Việt.</p>\r\n\r\n<p>Như kỳ &aacute;n &ldquo;con ruồi Number 1&rdquo; được d&ugrave;ng để lẩy về những game di động của người Việt c&oacute; thể hốt bạc to&agrave;n cầu. C&acirc;u chuyện, vấn đề, sự kiện được đề cập trong b&agrave;i viết c&oacute; t&iacute;nh thời gian, c&oacute; thể kh&ocirc;ng c&ograve;n t&iacute;nh thời sự nhưng c&ograve;n t&iacute;nh lịch sử, song c&aacute;c kiến thức, những b&igrave;nh luận v&agrave; x&uacute;c cảm m&agrave; t&aacute;c giả truyền tải trong từng b&agrave;i viết lại c&oacute; gi&aacute; trị phi thời gian.</p>\r\n\r\n<p>- Tr&iacute;ch lời giới thiệu của Nh&agrave; b&aacute;o Phạm Hồng Phước</p>\r\n', 120000, 'yes', 25, '9786043354263nBrsXN30.jpg', '2022-06-30 16:35:58', 'Quang Nguyễn', '2022-07-21 17:27:50', 'Quang Nguyễn', 'active', 83, 37),
(29, 'Công Nghệ Nhận Dạng Bằng Sóng Vô Tuyến RFID', '<p>Ng&agrave;y nay với những ứng dụng của khoa học kỹ thuật ti&ecirc;n tiến v&agrave;o đời sống, thế giới đ&atilde; v&agrave; đang ng&agrave;y một thay đổi, văn minh, hiện đại hơn.</p>\r\n\r\n<p>Sự ph&aacute;t triển của c&aacute;c c&ocirc;ng nghệ điện tử mới tạo ra h&agrave;ng loạt c&aacute;c thiết bị với c&aacute;c đặc điểm nổi bật như: Độ ch&iacute;nh x&aacute;c cao, tốc độ nhanh, gọn nhẹ, khả năng ứng dụng cao g&oacute;p phần n&acirc;ng cao năng suất lao động của con người, mang đến sự thỏa m&atilde;n, chất lượng cuộc sống ch&uacute;ng ta ng&agrave;y một tốt hơn.</p>\r\n\r\n<p>Sự ra đời của c&ocirc;ng nghệ RFID (Radio Frequency Identification - c&ocirc;ng nghệ nhận dạng đối tượng bằng s&oacute;ng radio) l&agrave; một &yacute; tưởng độc đ&aacute;o. Tr&ecirc;n thế giới c&ocirc;ng nghệ RFID đ&atilde; được &aacute;p dụng v&agrave; ph&aacute;t triển ở rất nhiều lĩnh vực như: An ninh, qu&acirc;n sự, y học, giải tr&iacute;, thương mại, bưu ch&iacute;nh viễn th&ocirc;ng&hellip; v&agrave; đem lại nhiều lợi &iacute;ch to lớn.</p>\r\n\r\n<p>Nhiều tập đo&agrave;n h&agrave;ng đầu thế giới như: H&atilde;ng sản xuất m&aacute;y bay Airbus, Tập đo&agrave;n điện tử Samsung, Sony, Motorola, &hellip; cũng như c&aacute;c hệ thống si&ecirc;u thị, thu ph&iacute; giao th&ocirc;ng cũng &aacute;p dụng c&ocirc;ng nghệ n&agrave;y. C&ocirc;ng nghệ RFID được xem như c&aacute;nh tay phải đắc lực trong lĩnh vực kinh doanh.</p>\r\n', 70000, 'yes', 16, '9786046703327vOtqITVH.jpg', '2022-07-02 16:55:12', 'Quang Nguyễn', '2022-07-21 17:27:27', 'Quang Nguyễn', 'active', 54, 37),
(30, 'Thuyết Tiến Hóa Công Nghệ Số', '<p>C&ocirc;ng nghệ số kh&ocirc;ng phải l&agrave; một thứ, n&oacute; l&agrave; mọi thứ. Thuyết Tiến H&oacute;a C&ocirc;ng Nghệ Số ch&iacute;nh l&agrave; tiếng chu&ocirc;ng đ&aacute;nh thức để bạn nhận ra rằng sự thay đổi t&iacute;ch lũy về mặt kỹ thuật số l&agrave; kh&ocirc;ng đủ. Đối mặt với nhiều c&ocirc;ng nghệ mang t&iacute;nh cạnh tranh, tốc độ thay đổi chưa từng xảy ra trước đ&acirc;y c&ugrave;ng sự trỗi dậy của những c&ocirc;ng ty si&ecirc;u hiện đại đầu ti&ecirc;n, c&ocirc;ng ty bạn sẽ bị bỏ lại ph&iacute;a sau v&agrave; sẽ tuyệt chủng nếu bạn kh&ocirc;ng chịu h&agrave;nh động.</p>\r\n\r\n<p>Cuốn s&aacute;ch n&agrave;y c&oacute; một c&aacute;i nh&igrave;n rất th&uacute; vị về &yacute; tưởng ph&acirc;n r&atilde; để truyền cảm hứng cho c&aacute;c c&ocirc;ng ty muốn trở th&agrave;nh người tốt nhất trong phong tr&agrave;o đổi mới về mặt kỹ thuật số v&agrave; muốn tồn tại được trong những giai đoạn bất ổn định n&agrave;y. Với hiện trạng ng&agrave;y c&agrave;ng c&oacute; nhiều lựa chọn, qu&aacute; nhiều dữ liệu để xử l&yacute;, C&ograve;n c&ocirc;ng nghệ th&igrave; đe dọa g&acirc;y ra sự ph&acirc;n r&atilde; cho ngay cả những m&ocirc; h&igrave;nh kinh doanh ổn định nhất, c&aacute;c C&ocirc;ng ty đang đối mặt với nhiều nguồn lực, nh&acirc;n tố c&oacute; thể hủy diệt họ. Nhưng với chiến lược đ&uacute;ng đắn, c&aacute;c nguồn lực n&agrave;y c&oacute; thể gi&uacute;p bạn biến c&ocirc;ng ty m&igrave;nh trở th&agrave;nh người dẫn đầu tr&ecirc;n thương trường.</p>\r\n\r\n<p>Thuyết Tiến H&oacute;a C&ocirc;ng Nghệ Số đ&oacute;ng vai tr&ograve; như c&aacute;nh tay dẫn dắt bạn vượt qua thời khắc hỗn mang n&agrave;y, cung cấp cho bạn những chiến lược c&ugrave;ng lời k&ecirc;u gọi h&agrave;nh động gi&uacute;p thổi b&ugrave;ng l&ecirc;n ngọn lửa thi&ecirc;u ch&aacute;y sự tự m&atilde;n để tạo ra sự thay đổi đầy s&aacute;ng tạo.</p>\r\n\r\n<p>Tom Goodwin đ&atilde; soi s&aacute;ng đường đến tương lai bằng c&aacute;ch nghi&ecirc;n cứu về c&ocirc;ng nghệ, x&atilde; hội, c&ugrave;ng nhiều b&agrave;i học trong qu&aacute; khứ để gi&uacute;p bạn biết c&aacute;ch th&iacute;ch nghi như thế n&agrave;o, n&ecirc;n tận dụng c&aacute;i g&igrave;, bỏ qua c&aacute;i g&igrave;. Để gi&uacute;p bạn thay đổi tư duy của m&igrave;nh, Goodwin đ&atilde; chứng minh những giả định, dự đo&aacute;n m&agrave; giới kinh doanh trước đ&acirc;y từng đưa ra về c&ocirc;ng nghệ số l&agrave; sai ra sao. Nếu muốn c&ocirc;ng ty m&igrave;nh th&agrave;nh c&ocirc;ng trong thời kỳ hậu kỹ thuật số, bạn cần được khai s&aacute;ng bởi Thuyết Tiến H&oacute;a C&ocirc;ng Nghệ Số</p>\r\n', 120000, 'yes', 18, 'image_241309EhgBjHay.jpg', '2022-07-02 16:57:27', 'Quang Nguyễn', '2022-07-21 17:25:30', 'Quang Nguyễn', 'active', 34, 37),
(31, 'Chạy Đua Với Robot', '<p>Nh&acirc;n loại đang trải qua một cuộc c&aacute;ch mạng kh&aacute;c trong c&aacute;ch lo&agrave;i người l&agrave;m việc v&agrave; kiếm sống &ndash; v&agrave; một lần nữa, cuộc c&aacute;ch mạng n&agrave;y lại đốt bỏ những điều tưởng chừng hiển nhi&ecirc;n của qu&aacute; khứ trong đống tro t&agrave;n lịch sử. Một lần nữa, c&ocirc;ng nghệ mới đ&atilde; tạo tiền đề cho c&aacute;ch mạng. Nhưng thay v&igrave; l&agrave; hạt giống, l&agrave; m&aacute;y dệt, hay l&agrave; đầu m&aacute;y hơi nước; động cơ của cuộc c&aacute;ch mạng n&agrave;y l&agrave; c&ocirc;ng nghệ kỹ thuật số v&agrave; robot.</p>\r\n\r\n<p>Cuộc c&aacute;ch mạng kỹ thuật số hiện tại r&otilde; r&agrave;ng kh&aacute;c biệt với c&aacute;c bước nhảy vọt về c&ocirc;ng nghệ trước đ&oacute;, bởi giờ đ&acirc;y khả năng xử l&yacute; dữ liệu &ndash; hay tr&iacute; th&ocirc;ng minh &ndash; của m&aacute;y m&oacute;c dường như kh&ocirc;ng c&ograve;n giới hạn. Ở bất cứ c&ocirc;ng việc đ&atilde; được lập tr&igrave;nh sẵn n&agrave;o, m&aacute;y t&iacute;nh cũng c&oacute; ưu thế về nhận thức hơn con người. V&agrave; bởi việc sao ch&eacute;p phần mềm cũng kh&ocirc;ng mấy kh&oacute; khăn n&ecirc;n bất cứ tiến bộ kỹ thuật số n&agrave;o cũng c&oacute; thể được nh&acirc;n bản ngay lập tức tr&ecirc;n khắp to&agrave;n cầu. Nếu như đ&acirc;y quả thực l&agrave; hướng đi của c&ocirc;ng nghệ trong tương lai gần &ndash; v&agrave; cũng c&oacute; nhiều l&yacute; do để tin v&agrave;o điều đ&oacute; &ndash; th&igrave; sắp tới c&oacute; khả năng việc trả c&ocirc;ng cho người lao động sẽ trở th&agrave;nh điều dị thường. Trong một viễn cảnh tương lai ảm đạm, những cỗ m&aacute;y si&ecirc;u th&ocirc;ng minh sẽ vượt qua khả năng hiểu biết v&agrave; kiểm so&aacute;t của con người. Nếu m&aacute;y t&iacute;nh c&oacute; thể nắm quyền điều khiển nhiều hệ thống quan trọng, hậu quả sẽ rất t&agrave;n khốc. Nhẹ th&igrave; lo&agrave;i người sẽ mất đi quyền kiểm so&aacute;t vận mệnh của m&igrave;nh, c&ograve;n nặng th&igrave; m&aacute;y sẽ đưa người đến bờ tuyệt chủng.</p>\r\n\r\n<p>Tốc độ cải tiến của robot được t&iacute;nh bằng gi&acirc;y, tương lai tăm tối đang lăm le ph&iacute;a trước, vậy con người phải l&agrave;m g&igrave;? C&acirc;u trả lời ch&iacute;nh l&agrave;: học, học kh&ocirc;ng ngừng. Học tập giờ đ&acirc;y l&agrave; một h&agrave;nh tr&igrave;nh kh&ocirc;ng ngừng nghỉ, với rất nhiều điểm để gh&eacute; qua song kh&ocirc;ng c&oacute; một điểm dừng n&agrave;o cả. H&agrave;nh tr&igrave;nh li&ecirc;n tục n&agrave;y c&oacute; t&aacute;c động vượt rất xa phạm vi của khu&ocirc;n vi&ecirc;n trường đại học, v&agrave;o tận nh&agrave;, tận chỗ l&agrave;m, v&agrave; tận c&aacute;c startup của ch&uacute;ng ta. Những t&aacute;c động n&agrave;y sẽ định h&igrave;nh c&aacute;c tham vọng hay thậm ch&iacute; cả luật ph&aacute;p của ch&uacute;ng ta.</p>\r\n\r\n<p>Sau c&ugrave;ng, ch&uacute;ng sẽ t&aacute;c động đến tất cả mọi người, được lan tỏa ra khắp thế giới bằng c&aacute;c mạng lưới đa đại học được x&acirc;y dựng để vượt qua c&aacute;c giới hạn về mức độ, về thời gian, về địa điểm. Sự s&aacute;ng tạo kết hợp với sự linh hoạt tr&iacute; tuệ khiến ch&uacute;ng ta trở n&ecirc;n đặc biệt v&agrave; trở th&agrave;nh sinh vật th&agrave;nh c&ocirc;ng nhất tr&ecirc;n h&agrave;nh tinh n&agrave;y. Ch&uacute;ng sẽ tiếp tục l&agrave; phương c&aacute;ch để mỗi c&aacute; nh&acirc;n tạo n&ecirc;n dấu ấn ri&ecirc;ng trong nền kinh tế.</p>\r\n\r\n<p>D&ugrave; trong lĩnh vực hay ng&agrave;nh nghề n&agrave;o, c&ocirc;ng việc quan trọng nhất m&agrave; con người thực hiện sẽ lu&ocirc;n l&agrave; c&ocirc;ng việc s&aacute;ng tạo. Đ&oacute; l&agrave; l&yacute; do tại sao hệ thống gi&aacute;o dục n&ecirc;n dạy ch&uacute;ng ta c&aacute;ch s&aacute;ng tạo hiệu quả.</p>\r\n', 83000, 'yes', 15, 'image_188351CncRbSNg.jpg', '2022-07-02 16:58:22', 'Quang Nguyễn', '2022-07-21 17:26:17', 'Quang Nguyễn', 'active', 39, 37),
(32, 'Luyện Thi Tiếng Pháp Delf - B2', '<p>Quyển &ldquo;Luyện thi tiếng Ph&aacute;p &ndash; DELF B2&rdquo;, tập hợp c&aacute;c b&agrave;i luyện tập nhằm trang bị cho bạn kiến thức v&agrave; kỹ năng trước kỳ thi DELF B2 của Bộ Gi&aacute;o dục Ph&aacute;p. Bằng DELF B2 x&aacute;c nhận tr&igrave;nh độ tiếng Ph&aacute;p của bạn ở bậc 4 theo Khung tham chiếu 6 bậc về tr&igrave;nh độ ng&ocirc;n ngữ chung của Ch&acirc;u &Acirc;u (CECRL).</p>\r\n', 150000, 'yes', 25, 'image_196874Xz2oqJLU.jpg', '2022-07-02 16:59:57', 'Quang Nguyễn', '2022-07-21 17:26:54', 'Quang Nguyễn', 'active', 47, 36);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `books` text CHARACTER SET utf8mb4 NOT NULL,
  `prices` text CHARACTER SET utf8mb4 NOT NULL,
  `quantities` text CHARACTER SET utf8mb4 NOT NULL,
  `names` text CHARACTER SET utf8mb4 NOT NULL,
  `pictures` text CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`) VALUES
('0zTdDmwceE', 'nnquanght', '[\"15\"]', '[\"70000\"]', '[\"1\"]', '[\"Người mẹ quỷ\"]', '[\"nguoimequymXwh8zNQPWTEA3nC9K.jpg\"]', 'active', '2022-07-20 22:12:08'),
('3vAHYRqfDo', 'admin', '[\"13\",\"15\",\"22\"]', '[\"50000\",\"70000\",\"100100\"]', '[\"4\",\"3\",\"1\"]', '[\"Xe bus ma\",\"Người mẹ quỷ\",\"Giải Thích Ngữ Pháp Tiếng Anh (Tái Bản 2022)\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\",\"nguoimequymXwh8zNQPWTEA3nC9K.jpg\",\"z3097453775918_7ea22457f168a4de92d0ba8178a2257bDW6h8K9J.jpg\"]', 'active', '2022-07-28 04:27:36'),
('8ndh1oRaOT', 'admin', '[\"27\"]', '[\"27000\"]', '[\"1\"]', '[\"FinTech 4.0  - Cách mạng công nghệ tài chính\"]', '[\"image_17519045OJhdHF.jpg\"]', 'inactive', '2022-07-20 16:54:29'),
('CizdwfQHG0', 'admin', '[\"13\"]', '[\"50000\"]', '[\"1\"]', '[\"Xe bus ma\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\"]', 'active', '2022-07-21 14:44:55'),
('ckzUJsm718', 'admin', '[\"13\",\"21\",\"25\",\"27\",\"28\"]', '[\"50000\",\"40500\",\"72500\",\"27000\",\"90000\"]', '[\"1\",\"1\",\"1\",\"1\",\"1\"]', '[\"Xe bus ma\",\"Những Câu Chuyện Truyền Cảm Hứng: Con Sẽ Tự Giác\",\"Hành Trang Lập Trình - Những Kỹ Năng Lập Trình Viên Chuyên Nghiệp Cần Có\",\"FinTech 4.0  - Cách mạng công nghệ tài chính\",\"Kỳ Lân Công Nghệ - Giấc Mơ, Hiện Thực & Sự Tan Biến...\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\",\"image_195509_1_7128ZBAwIbYc.jpg\",\"image_195509_1_19543h4MRTLVg.jpg\",\"image_17519045OJhdHF.jpg\",\"9786043354263nBrsXN30.jpg\"]', 'active', '2022-07-20 02:29:01'),
('D20RdEqnNV', 'admin', '[\"15\"]', '[\"70000\"]', '[\"2\"]', '[\"Người mẹ quỷ\"]', '[\"nguoimequymXwh8zNQPWTEA3nC9K.jpg\"]', 'active', '2022-07-28 04:08:34'),
('ht0ljXxHO6', 'admin', '[\"13\",\"15\",\"22\"]', '[\"50000\",\"70000\",\"100100\"]', '[\"2\",\"1\",\"1\"]', '[\"Xe bus ma\",\"Người mẹ quỷ\",\"Giải Thích Ngữ Pháp Tiếng Anh (Tái Bản 2022)\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\",\"nguoimequymXwh8zNQPWTEA3nC9K.jpg\",\"z3097453775918_7ea22457f168a4de92d0ba8178a2257bDW6h8K9J.jpg\"]', 'inactive', '2022-07-21 13:08:11'),
('IsiW423SnM', 'admin', '[\"13\",\"15\",\"18\",\"22\"]', '[\"50000\",\"70000\",\"85400\",\"100100\"]', '[\"1\",\"1\",\"2\",\"2\"]', '[\"Xe bus ma\",\"Người mẹ quỷ\",\"Hai số phận\",\"Giải Thích Ngữ Pháp Tiếng Anh (Tái Bản 2022)\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\",\"nguoimequymXwh8zNQPWTEA3nC9K.jpg\",\"image_179484vzkeJ6Ln.jpg\",\"z3097453775918_7ea22457f168a4de92d0ba8178a2257bDW6h8K9J.jpg\"]', 'active', '2022-07-23 23:00:06'),
('IXEh4lng7j', 'admin', '[\"13\",\"14\"]', '[\"50000\",\"76500\"]', '[\"1\",\"1\"]', '[\"Xe bus ma\",\"Oan hồn người vợ trẻ\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\",\"oan-hon-nguoi-vo-treaONg8bRn.jpg\"]', 'active', '2022-07-19 20:10:17'),
('kWcZKejF6E', 'admin', '[\"13\",\"15\"]', '[\"50000\",\"70000\"]', '[\"1\",\"1\"]', '[\"Xe bus ma\",\"Người mẹ quỷ\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\",\"nguoimequymXwh8zNQPWTEA3nC9K.jpg\"]', 'inactive', '2022-07-24 02:54:19'),
('lPpwfqtjiz', 'admin', '[\"13\",\"14\",\"15\"]', '[\"50000\",\"76500\",\"70000\"]', '[\"1\",\"2\",\"3\"]', '[\"Xe bus ma\",\"Oan hồn người vợ trẻ\",\"Người mẹ quỷ\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\",\"oan-hon-nguoi-vo-treaONg8bRn.jpg\",\"nguoimequymXwh8zNQPWTEA3nC9K.jpg\"]', 'active', '2022-07-28 04:03:23'),
('pF9aJqRg6n', 'admin', '[\"13\"]', '[\"50000\"]', '[\"5\"]', '[\"Xe bus ma\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\"]', 'inactive', '2022-07-28 04:04:36'),
('pjBHLcRFdK', 'admin', '[\"13\",\"15\",\"16\"]', '[\"50000\",\"70000\",\"72000\"]', '[\"2\",\"1\",\"1\"]', '[\"Xe bus ma\",\"Người mẹ quỷ\",\"Mao sơn tróc quỷ nhân\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\",\"nguoimequymXwh8zNQPWTEA3nC9K.jpg\",\"mao-son-troc-quy-nhan83hngfm4.jpg\"]', 'active', '2022-07-19 20:06:07'),
('QmD0Y8yIzf', 'admin', '[\"13\"]', '[\"50000\"]', '[\"1\"]', '[\"Xe bus ma\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\"]', 'inactive', '2022-07-28 03:45:09'),
('vYMEhUNAnc', 'admin', '[\"16\",\"18\",\"24\"]', '[\"72000\",\"85400\",\"58300\"]', '[\"10\",\"1\",\"1\"]', '[\"Mao sơn tróc quỷ nhân\",\"Hai số phận\",\"Lập trình với C#\"]', '[\"mao-son-troc-quy-nhan83hngfm4.jpg\",\"image_179484vzkeJ6Ln.jpg\",\"image_191566onab1gl8.jpg\"]', 'inactive', '2022-07-19 22:05:43'),
('Wtnf8NMDSC', 'admin', '[\"15\",\"17\",\"18\",\"19\",\"20\",\"25\",\"27\",\"30\"]', '[\"70000\",\"38500\",\"85400\",\"64400\",\"35880\",\"72500\",\"27000\",\"98400\"]', '[\"1\",\"1\",\"3\",\"3\",\"3\",\"1\",\"2\",\"1\"]', '[\"Người mẹ quỷ\",\"Nhà giả kim\",\"Hai số phận\",\"Chiến binh cầu vồng\",\"Hoàng tử bé\",\"Hành Trang Lập Trình - Những Kỹ Năng Lập Trình Viên Chuyên Nghiệp Cần Có\",\"FinTech 4.0  - Cách mạng công nghệ tài chính\",\"Thuyết Tiến Hóa Công Nghệ Số\"]', '[\"nguoimequymXwh8zNQPWTEA3nC9K.jpg\",\"image_195509_1_36793FToQdJyN.jpg\",\"image_179484vzkeJ6Ln.jpg\",\"image_195509_1_36366X8Gc0KCT.jpg\",\"image_1870105rj61ysc.jpg\",\"image_195509_1_19543h4MRTLVg.jpg\",\"image_17519045OJhdHF.jpg\",\"image_241309EhgBjHay.jpg\"]', 'inactive', '2022-07-20 16:55:04'),
('WV2QhaMvSK', 'nnquanght', '[\"13\",\"14\",\"22\",\"24\",\"27\"]', '[\"50000\",\"76500\",\"100100\",\"58300\",\"27000\"]', '[\"3\",\"2\",\"1\",\"2\",\"1\"]', '[\"Xe bus ma\",\"Oan hồn người vợ trẻ\",\"Giải Thích Ngữ Pháp Tiếng Anh (Tái Bản 2022)\",\"Lập trình với C#\",\"FinTech 4.0  - Cách mạng công nghệ tài chính\"]', '[\"29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png\",\"oan-hon-nguoi-vo-treaONg8bRn.jpg\",\"z3097453775918_7ea22457f168a4de92d0ba8178a2257bDW6h8K9J.jpg\",\"image_191566onab1gl8.jpg\",\"image_17519045OJhdHF.jpg\"]', 'active', '2022-07-20 22:08:00'),
('YS5PXxuyVo', 'admin2', '[\"14\",\"15\"]', '[\"76500\",\"70000\"]', '[\"2\",\"1\"]', '[\"Oan hồn người vợ trẻ\",\"Người mẹ quỷ\"]', '[\"oan-hon-nguoi-vo-treaONg8bRn.jpg\",\"nguoimequymXwh8zNQPWTEA3nC9K.jpg\"]', 'active', '2022-07-28 11:29:40'),
('zabKyYCDWv', 'nnquanght', '[\"26\"]', '[\"34930\"]', '[\"1\"]', '[\"Mặt trái của công nghệ\"]', '[\"image_182009xYtQVAn2.jpg\"]', 'inactive', '2022-07-24 03:00:25');

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
  `ordering` int(11) DEFAULT '1',
  `isShowHome` varchar(10) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `isShowHome`) VALUES
(33, 'Văn học', '2-6tvNIQFkB.jpg', '2022-06-30 15:51:01', 'Quang Nguyễn', '2022-07-02 17:33:24', 'Quang Nguyễn', 'active', 3, 'yes'),
(34, 'Truyện ma', 'truyenma8NZnxm4q.jpg', '2022-06-30 15:52:54', 'Quang Nguyễn', '2022-07-01 21:38:12', 'Quang Nguyễn', 'active', 1, 'no'),
(35, 'Thiếu nhi', 'thieunhiZ6s5qC2l.png', '2022-06-30 15:54:37', 'Quang Nguyễn', '2022-06-30 17:27:44', 'Quang Nguyễn', 'active', 2, 'yes'),
(36, 'Ngoại ngữ', 'ngoainguDWvZhl6T.jpg', '2022-06-30 15:54:58', 'Quang Nguyễn', NULL, NULL, 'active', 4, 'yes'),
(37, 'Công nghệ', 'laptrinh1vJrGxoR.png', '2022-06-30 15:55:45', 'Quang Nguyễn', NULL, NULL, 'active', 5, 'yes'),
(38, 'Tài chính', 'deep-finance-9781637350270_hrIyfkJzlU.jpg', '2022-07-05 13:31:06', 'Quang Nguyễn', NULL, NULL, 'active', 11, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text` text,
  `fullname` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `text`, `fullname`, `status`, `created`, `book_id`) VALUES
(40, 'Sách hay', 'Quang Nguyễn', 'active', '2022-07-25 23:00:27', 17),
(41, 'Truyện hay quá', 'Quang Nguyễn', 'active', '2022-07-25 23:01:14', 14),
(42, 'Quá tuyệt vời !', 'Quang Nguyễn', 'active', '2022-07-25 23:01:28', 14),
(43, 'Tuyệt vời...sách hay quá', 'Nguyễn Nhựt Quang', 'active', '2022-07-25 23:45:33', 22),
(44, 'sách hay', 'Nguyễn Nhựt Quang', 'active', '2022-07-25 23:47:35', 14),
(45, 'truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma truyện ma ', 'Nguyễn Nhựt Quang', 'active', '2022-07-25 23:51:47', 14),
(46, '5 sao luôn 5*', 'Nguyễn Nhựt Quang', 'active', '2022-07-25 23:53:11', 17),
(47, 'sách hay quá ạ', 'Quang Nguyễn', 'active', '2022-07-26 16:49:15', 18),
(48, 'wow', 'Quang Nguyễn', 'active', '2022-07-29 17:12:22', 13),
(49, 'wow', 'Quang Nguyễn', 'active', '2022-07-29 18:33:55', 14),
(50, 'hayyyyy', 'Quang Nguyễn', 'active', '2022-07-29 18:34:21', 14),
(51, 'truyện ghê quá', 'Quang Nguyễn', 'active', '2022-07-29 18:34:31', 14),
(52, 'quá tuyệt !', 'Quang Nguyễn', 'active', '2022-07-29 18:34:40', 14),
(53, 'test comment', 'admin2', 'active', '2022-08-01 12:31:27', 14),
(54, 'testtt', 'admin2', 'active', '2022-08-01 12:31:29', 14);

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
(1, 'admin', 'active', '2022-05-02 18:59:44', 'admin', '2022-07-20 19:26:16', 'Quang Nguyễn', 'active'),
(2, 'manager', 'active', '2022-05-02 18:59:44', 'admin', '2022-05-21 00:54:08', 'admin', 'active'),
(3, 'member', 'active', '2022-05-02 18:59:44', 'admin', '2022-05-21 00:47:43', 'admin', 'active'),
(4, 'user', 'active', '2022-05-19 16:49:10', 'admin', '2022-05-21 00:55:15', 'quangng', 'active'),
(208, 'trainer', 'inactive', '2022-05-21 00:50:16', 'admin', '2022-05-21 00:52:32', 'admin', 'inactive'),
(209, 'adviser', 'inactive', '2022-05-21 00:50:16', 'admin', '2022-05-21 00:52:32', 'admin', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `picture` text,
  `status` varchar(20) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `picture`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(3, 'Tủ sách EHON cho trẻ', '1920x700Vz5oZdu9.png', 'active', 1, '2022-07-24 17:52:58', 'Quang Nguyễn', '2022-07-25 14:28:16', 'Quang Nguyễn'),
(4, 'Ưu đãi hè', 'Bigsale_1920Z3kaRpO6.jpg', 'active', 2, '2022-07-24 17:57:00', 'Quang Nguyễn', NULL, NULL),
(5, 'Tủ sách thiếu nhi', 'quoctethieunhi_1.3_1920I5E2qfA4.jpg', 'active', 3, '2022-07-24 17:57:25', 'Quang Nguyễn', NULL, NULL),
(6, 'Tủ sách siêu ưu đãi', 'Sach_tham_khao_1920x700H1WXRzij.jpg', 'active', 4, '2022-07-24 17:57:49', 'Quang Nguyễn', NULL, NULL),
(7, 'Khuyến mãi sách lịch sử', 'BachViet07_1920XsM80ZNo.jpg', 'active', 8, '2022-07-24 18:35:25', 'Quang Nguyễn', NULL, NULL),
(8, 'Bách khoa tri thức trẻ em', 'bktrithuc_1920yDEqQnz4.jpg', 'active', 9, '2022-07-24 18:35:59', 'Quang Nguyễn', NULL, NULL);

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
  `phone` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
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

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `phone`, `address`, `created`, `created_by`, `modified`, `modified_by`, `status`, `group_id`) VALUES
(26, 'usertest', 'quang@gmail.com', 'Quang Nguyễn', '974e0509eda5affaf61e79d882c9e6ba', NULL, NULL, '2022-05-21 13:42:06', 'Nguyễn Nhựt Quang', '2022-05-21 13:42:42', 'Nguyễn Nhựt Quang', 'active', 2),
(29, 'admin2', 'admin2@gmail.com', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '0123456789', 'TPHCM', '2022-05-21 16:38:44', 'Quang Nguyen', '2022-07-27 16:16:46', 'admin2', 'active', 3),
(30, 'admin', 'admin@gmail.com', 'Quang Nguyễn', '21232f297a57a5a743894a0e4a801fc3', '0356853654', 'LTP TPHCM', NULL, NULL, '2022-07-29 23:19:23', 'Quang Nguyễn', 'active', 1),
(32, 'quangnguyen', 'n.nquangh4t@gmail.com', 'Nguyễn Quang', '5f765ce6a2ae0c963cf720a71c13d32a', NULL, NULL, '2022-07-02 17:39:14', 'Quang Nguyễn', NULL, NULL, 'active', 2),
(35, 'nnquanght', 'n.nquanght@gmail.com', 'Nguyễn Nhựt Quang', '9fafde0a3ab3890eb4ebd593678e5454', '0356809728', 'LTP TPHCM', '2022-07-20 19:15:25', NULL, '2022-07-20 22:07:26', 'Nguyễn Nhựt Quang', 'active', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_ibfk_1` (`category_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_ibfk_1` (`book_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
