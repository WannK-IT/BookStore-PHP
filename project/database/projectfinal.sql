-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 02, 2022 lúc 10:27 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `projectfinal`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
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
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `category_id`) VALUES
(13, 'Xe bus ma', 'Bạn có tin trên đời này có ma không?\r\n\r\nMọi chuyện bắt đầu từ một chiếc xe bus 666 thần bí, ba cô cậu sinh viên trẻ Nguyễn Cao Phong, Nguyễn Ngọc Phương Vy và Trần Khánh Linh bèo nước gặp nhau hay là do định mệnh sắp đặt?\r\n\r\nTai ương nào sẽ đến với ba người bọn họ? \r\n\r\nBọn họ sẽ phải làm gì để chống lại các hồn ma đang nhăm nhe đoạt mạng họ?\r\n\r\nĐừng nhìn về phía sau.\r\n\r\nĐừng đọc đến chương cuối nếu không muốn hối hận.\r\n\r\nCác tổ chức, đoàn thể hay cá nhân trong truyện đều là hư cấu. Mọi sự trùng hợp đều là ngẫu nhiên.', 50000, 'yes', 45, '29757e5d-1389-4740-9c99-36cdc124042a2k1PlRFy.png', '2022-06-30 15:13:13', 'Quang Nguyễn', '2022-06-30 16:16:02', 'Quang Nguyễn', 'active', 4, 34),
(14, 'Oan hồn người vợ trẻ', 'Truyện Oan Hồn Người Vợ Trẻ nói về những cô gái trẻ bị những cường hào ác bá giờ trò làm nhục họ còn làm hại thanh danh của họ nên khi chết các cô gái đó không siêu thoát, hằng đêm cứ quay về quấy phá những kẻ tà ác đó, nếu xã hội hay pháp luật không trừng trị được bọn họ thì hãy để tâm linh các cô gái này trừng phạt.\r\n\r\nNhững cái chết của cô gái khiến kẻ đầu bạc tiễn kẻ đầu xanh, gia đình họ chua xót nhưng cũng không làm gì được bọn chúng, nhưng chính lương tâm của hán sẽ tự dày vò hắn cho đến chết.\r\n\r\nNếu bạn là độc giả yêu thích thể loại truyện ma kinh dị thì không nên bỏ qua tựa truyện hay này nhé.', 90000, 'yes', 45, 'oan-hon-nguoi-vo-treaONg8bRn.jpg', '2022-06-30 15:34:44', 'Quang Nguyễn', '2022-07-01 14:25:28', 'Quang Nguyễn', 'active', 3, 34),
(15, 'Người mẹ quỷ', 'Đây là câu chuyện cả Việt Nam về cương thi, hay gọi bằng cái tên quen thuộc hơn: quỷ nhập tràng.\r\n\r\nCó lẽ nghe tới quỷ, mọi người sẽ nghĩ đây là một bộ truyện ma kinh dị. Nhưng thật ra, khi bạn càng đọc về sau, bạn sẽ càng nhận rõ những tình cảm khác trong truyện: tình cảm gia đình, tình mẫu tử, tình thầy trò,... tất cả sẽ đọng lại trong từng chap truyện của Người Mẹ Quỷ…\r\n\r\nNgoài những yếu tố kinh dị, ly kỳ, hấp dẫn, truyện của tác giả Trường Lê còn mang một thứ gì đó hơi hướng nói về Tình Người.', 100000, 'yes', 30, 'nguoimequymXwh8zNQPWTEA3nC9K.jpg', '2022-06-30 16:09:12', 'Quang Nguyễn', NULL, NULL, 'active', 5, 34),
(16, 'Mao sơn tróc quỷ nhân', 'Diệp Thiếu Dương vốn là một Mao Sơn tróc quỷ nhân, dũng cảm tiến vào đô thị, gặp người đấu người, gặp quỷ đấu quỷ, gặp yêu đấu yêu, gặp hồ đấu hồ...\n\nTương tây Thi vương, Tà Thần bất tử, điệp tiên hung linh, tứ phương quỷ khấu.\n\nNữ minh tinh nuôi tiểu quỷ, công chúa hoàng thất hút máu, nữ giám đốc là hồ yêu,...\n\nThi triển Mao Sơn thần thuật, đánh lui tất cả,...', 120000, 'yes', 40, 'mao-son-troc-quy-nhan83hngfm4.jpg', '2022-06-30 16:11:29', 'Quang Nguyễn', NULL, NULL, 'active', 8, 34),
(17, 'Nhà giả kim', 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người. \r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”\r\n\r\n- Trích Nhà giả kim\r\n\r\nNhận định\r\n\r\n“Sau Garcia Márquez, đây là nhà văn Mỹ Latinh được đọc nhiều nhất thế giới.” - The Economist, London, Anh\r\n\r\n \r\n\r\n“Santiago có khả năng cảm nhận bằng trái tim như Hoàng tử bé của Saint-Exupéry.” - Frankfurter Allgemeine Zeitung, Đức\r\n\r\nMã hàng	8935235226272\r\nTên Nhà Cung Cấp	Nhã Nam\r\nTác giả	Paulo Coelho\r\nNgười Dịch	Lê Chu Cầu\r\nNXB	NXB Hội Nhà Văn\r\nNăm XB	2020\r\nTrọng lượng (gr)	220\r\nKích Thước Bao Bì	20.5 x 13 cm\r\nSố trang	227\r\nHình thức	Bìa Mềm\r\nSản phẩm hiển thị trong	\r\nĐồ Chơi Cho Bé - Giá Cực Tốt\r\nNhã Nam\r\nPNJ\r\nTop sách được phiên dịch nhiều nhất\r\nVNPAY\r\nSản phẩm bán chạy nhất	Top 100 sản phẩm Tiểu thuyết bán chạy của tháng\r\nTất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người. \r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”\r\n\r\n- Trích Nhà giả kim', 55000, 'yes', 30, 'image_195509_1_36793FToQdJyN.jpg', '2022-06-30 16:14:11', 'Quang Nguyễn', NULL, NULL, 'active', 7, 33),
(18, 'Hai số phận', '“Hai số phận” không chỉ đơn thuần là một cuốn tiểu thuyết, đây có thể xem là \"thánh kinh\" cho những người đọc và suy ngẫm, những ai không dễ dãi, không chấp nhận lối mòn.\r\n“Hai số phận” làm rung động mọi trái tim quả cảm, nó có thể làm thay đổi cả cuộc đời bạn. Đọc cuốn sách này, bạn sẽ bị chi phối bởi cá tính của hai nhân vật chính, hoặc bạn là Kane, hoặc sẽ là Abel, không thể nào nhầm lẫn. Và điều đó sẽ khiến bạn thấy được chính mình.\r\nKhi bạn yêu thích tác phẩm này, người ta sẽ nhìn ra cá tính và tâm hồn thú vị của bạn!\r\n“Nếu có giải thưởng Nobel về khả năng kể chuyện, giải thưởng đó chắc chắn sẽ thuộc về Archer.”\r\n - Daily Telegraph-\r\n(“Hai số phận” (Kane & Abel) là câu chuyện về hai người đàn ông đi tìm vinh quang. William Kane là con một triệu phú nổi tiếng trên đất Mỹ, lớn lên trong nhung lụa của thế giới thượng lưu. Wladek Koskiewicz là đứa trẻ không rõ xuất thân, được gia đình người bẫy thú nhặt về nuôi. Một người được ấn định để trở thành chủ ngân hàng khi lớn lên, người kia nhập cư vào Mỹ cùng đoàn người nghèo khổ. \r\nTrải qua hơn sáu mươi năm với biết bao biến động, hai con người giàu hoài bão miệt mài xây dựng vận mệnh của mình . “Hai số phận” nói về nỗi khát khao cháy bỏng, những nghĩa cử, những mối thâm thù, từng bước đường phiêu lưu, hiện thực thế giới và những góc khuất... mê hoặc người đọc bằng ngôn từ cô đọng, hai mạch truyện song song được xây dựng tinh tế từ những chi tiết nhỏ nhất.)', 122000, 'yes', 30, 'image_179484vzkeJ6Ln.jpg', '2022-06-30 16:17:38', 'Quang Nguyễn', NULL, NULL, 'active', 10, 33),
(19, 'Chiến binh cầu vồng', '“Thầy Harfan và cô Mus nghèo khổ đã mang đến cho tôi tuổi thơ đẹp nhất, tình bạn đẹp nhất, và tâm hồn phong phú, một thứ gì đó vô giá, thậm chí còn có giá trị hơn những khao khát mơ ước. Có thể tôi lầm, nhưng theo ý tôi, đây thật sự là hơi thở của giáo dục và linh hồn của một chốn được gọi là trường học.” - (Trích tác phẩm)\r\n\r\n***\r\n\r\nTrong ngày khai giảng, nhờ sự xuất hiện vào phút chót của cậu bé thiểu năng trí tuệ Harun, trường Muhammadiyah may mắn thoát khỏi nguy cơ đóng cửa. Nhưng ước mơ dạy và học trong ngôi trường Hồi giáo ấy liệu sẽ đi về đâu, khi ngôi trường xập xệ dường như sẵn sàng sụp xuống bất cứ lúc nào, khi lời đe dọa đóng cửa từ viên thanh tra giáo dục luôn lơ lửng trên đầu, khi những cỗ máy xúc hung dữ đang chực chờ xới tung ngôi trường để dò mạch thiếc…? Và liệu niềm đam mê học tập của những Chiến binh Cầu vồng đó có đủ sức chinh phục quãng đường ngày ngày đạp xe bốn mươi cây số, rồi đầm cá sấu lúc nhúc bọn ăn thịt người, chưa kể sự mê hoặc từ những chuyến phiêu lưu chết người theo tiếng gọi của ngài pháp sư bí ẩn trên đảo Hải Tặc, cùng sức cám dỗ khôn cưỡng từ những đồng tiền còm kiếm được nhờ công việc cu li toàn thời gian ...?\r\n\r\nChiến binh Cầu vồng có cả tình yêu trong sáng tuổi học trò lẫn những trò đùa tinh quái, cả nước mắt lẫn tiếng cười – một bức tranh chân thực về hố sâu ngăn cách giàu nghèo, một tác phẩm văn học cảm động truyền tải sâu sắc nhất ý nghĩa đích thực của việc làm thầy, việc làm trò và việc học.\r\n\r\nTác phẩm đã bán được trên năm triệu bản, được dịch ra 26 thứ tiếng, là một trong những đại diện xuất sắc nhất của  văn học Indonesia hiện đại.', 92000, 'yes', 30, 'image_195509_1_36366X8Gc0KCT.jpg', '2022-06-30 16:19:08', 'Quang Nguyễn', NULL, NULL, 'active', 50, 33),
(20, 'Hoàng tử bé', 'Hoàng tử bé được viết ở New York trong những ngày tác giả sống lưu vong và được xuất bản lần đầu tiên tại New York vào năm 1943, rồi đến năm 1946 mới được xuất bản tại Pháp. Không nghi ngờ gì, đây là tác phẩm nổi tiếng nhất, được đọc nhiều nhất và cũng được yêu mến nhất của Saint-Exupéry. Cuốn sách được bình chọn là tác phẩm hay nhất thế kỉ 20 ở Pháp, đồng thời cũng là cuốn sách Pháp được dịch và được đọc nhiều nhất trên thế giới. Với 250 ngôn ngữ dịch khác nhau kể cả phương ngữ cùng hơn 200 triệu bản in trên toàn thế giới, Hoàng tử bé được coi là một trong những tác phẩm bán chạy nhất của nhân loại. ', 52000, 'yes', 31, 'image_1870105rj61ysc.jpg', '2022-06-30 16:20:38', 'Quang Nguyễn', NULL, NULL, 'active', 21, 35),
(21, 'Những Câu Chuyện Truyền Cảm Hứng: Con Sẽ Tự Giác', '“Con sẽ tự giác” kể những câu chuyện về tinh thần học tập miệt mài.\r\n\r\nMỗi  nhân  vật  trong  cuốn sách  này  đều  kể  những  câu chuyện rất riêng về quá trình học tập  của mình.  Trên  con đường trưởng thành, nếu biết tự nhận thức bản thân, hiểu rõ  mục  tiêu  phát  triển  của mình,  bồi  đắp  lòng  tự  tin, dám  đối  mặt  với  thử  thách và  kiên  trì  phát  huy  năng lực  bản  thân,  chúng  ta  đều có  thể  thực  hiện  được  ước mơ  và  trở  nên  tốt  đẹp  hơn, thành công hơn.\r\n\r\nBộ sách “Những câu chuyện truyền cảm hứng” được chia thành các chủ đề thiết thực, giúp bạn đọc nhỏ tuổi tìm hiểu và rèn  những  thói  quen,  đức  tính  tốt.  Mỗi  cuốn  gồm  nhiều câu chuyện nhỏ, trong đó có cả những hồi ức đáng nhớ của các nhân vật nổi tiếng trên thế giới... Mong rằng bộ sách sẽ trở thành bạn đồng hành tích cực, cùng các em bước vào tương lai rực rỡ', 45000, 'yes', 10, 'image_195509_1_7128ZBAwIbYc.jpg', '2022-06-30 16:22:12', 'Quang Nguyễn', NULL, NULL, 'active', 36, 35),
(22, 'Giải Thích Ngữ Pháp Tiếng Anh (Tái Bản 2022)', 'Sách Giải Thích Ngữ Pháp Tiếng Anh, tác Mai Lan Hương – Hà Thanh Uyên, là cuốn sách ngữ pháp đã được phát hành và tái bản rất nhiều lần trong những năm qua.\r\n\r\nGiải Thích Ngữ Pháp Tiếng Anh được biên soạn thành 9 chương, đề cập đến những vấn đề ngữ pháp từ cơ bản đến nâng cao, phù hợp với mọi trình độ. Các chủ điểm ngữ pháp trong từng chương được biên soạn chi tiết, giải thích cặn kẽ các cách dùng và quy luật mà người học cần nắm vững. Sau mỗi chủ điểm ngữ pháp là phần bài tập đa dạng nhằm giúp người học củng cố lý thuyết.\r\n\r\nHy vọng Giải Thích Ngữ Pháp Tiếng Anh sẽ là một quyển sách thiết thực, đáp ứng yêu cầu học, ôn tập và nâng cao trình độ ngữ pháp cho người học và là quyển sách tham khảo bổ ích dành cho giáo viên.', 154000, 'yes', 35, 'z3097453775918_7ea22457f168a4de92d0ba8178a2257bDW6h8K9J.jpg', '2022-06-30 16:23:18', 'Quang Nguyễn', NULL, NULL, 'active', 5, 36),
(23, 'Lập trình IoT với Arduino', 'Lập Trình Iot Với Arduino\r\n\r\nARDUINO và lập trình ToT có 3 phần với 10 chương.\r\n\r\nPhần 1: Giới thiệu\r\nChương 1: Tổng quan về hệ thống nhúng, về IoT, về Arduino, Arduino và Raspberry, Serial monitor, các link kiện thực hành.\r\n\r\nPhần 2: ARDUINO và Cảm biến\r\nChương 2: Tổng quan về cảm biến\r\nChương 3: Thực hành với Qrduino\r\n1) Đọc giá trị điện áp ngõ vào Analog\r\n2) Điều khiển tốc độ sáng tắt với biến trở\r\n3) Lập trình với ngõ vào (Input)\r\n4) Mạch sử dụng hai nút nhấn và một Led\r\n5) Mạch sử dụng chiết áp\r\n6) Điều khiển Led RGB\r\n7) Điều khiển Led cầu vòng\r\n8) Điều khiển Led sáng dạng thanh\r\nChương 4: Arduino và cảm biến\r\nArduino và cảm biến Nhiệt độ-Độ ẩm. Cảm biến tiệm cận. Arduino và cảm biến hồng ngoại. Cảm biến quang. Cảm biến khói-đầu dò khói. Arduino và cảm biến dịch chuyển PIR. Đo nhiệt độ,độ ẩm từ xa với bo thu phát cao tần .\r\n\r\nPhần 3: Lập trình IOT với ARDUINO VÀ ESP8266\r\nChương 5: Truyền thông có dây và không dây\r\nChương 6: Cấu hình cho ESP8266\r\nChương 7: Các bài tập cơ bản khác của ESP8266\r\nChương 8: Một số tính năng khác của ESP8266\r\nChương 9: Sử dụng Micro Python trong ESP8266\r\nChương 10: Lập trình với GPS, GSM và GPRS\r\nHệ thống định vị toàn cầu (GPS). Bảng thông báo không dây sử dụng GSM và Arduino. Gủi dữ liệu qua GPRS Sim800I đến Thingspeak. Khắc phục sự cố khi sử dụng Sim800I. Lập trình GPS với STM32', 137500, 'yes', 20, 'image_191567TcsN4tvE.jpg', '2022-06-30 16:27:14', 'Quang Nguyễn', NULL, NULL, 'active', 41, 37),
(24, 'Lập trình với C#', 'Hướng dẫn người học từng bước lập trình với C#. Xây dựng ứng dụng trên Window Form.\r\n\r\nXây dựng ứng dụng, tạo hai trang web quản lý bán hàng và quản lý tuyển sinh với các hướng dẫn từng bước làm cơ sở cho việc thiết kế các trang web phức tạp hơn.\r\n\r\nNội dung chính:\r\n\r\n- Phần 1: Lập Trình Với C# - Ứng dụng Windows form\r\n\r\n- Phần 2: Lập Trình Với C# - Quản lý bán hàng\r\n\r\n- Phần 3: Lập Trình Với C# - Quản lý tuyển sinh', 106000, 'yes', 45, 'image_191566onab1gl8.jpg', '2022-06-30 16:29:11', 'Quang Nguyễn', NULL, NULL, 'active', 34, 37),
(25, 'Hành Trang Lập Trình - Những Kỹ Năng Lập Trình Viên Chuyên Nghiệp Cần Có', 'Cuốn sách gồm 2 nội dung chính:\r\n\r\n• Chương I: Phần này trình bày những suy nghĩ và kĩ năng mềm cần thiết để bạn có thể hòa nhập và tiến xa được trong lĩnh vực công nghệ phần mềm. Nội dung trong phần này lại được chia thành những mục nhỏ hơn tương ứng với từng giai đoạn học tập và làm việc:\r\n\r\no Giai đoạn 1 – Học nghề: Trình bày những thái độ và kĩ năng học tập cần thiết để có thể học tập hiệu quả ở trường, cũng như chuẩn bị hành trang cho quá trình làm việc sau này.\r\n\r\no Giai đoạn 2 – Vào nghề: Cung cấp một vài thông tin hữu ích liên quan tới việc tìm kiếm và ứng tuyển vào những công ty công nghệ, phần này cũng đưa ra vài góc nhìn liên quan tới việc đánh giá và so sánh nơi làm việc để bạn tìm ra được công ty phù hợp.\r\n\r\no Giai đoạn 3 – Phát triển trong nghề: Sau khi đã tìm được nơi làm việc, phần này sẽ trình bày những suy nghĩ và cách tư duy làm việc để giúp bạn có thể tiến bộ hơn trong sự nghiệp lập trình viên.\r\n\r\n• Chương II: Phần này sẽ đi sâu vào một vài kiến thức kĩ thuật nền tảng mình nghĩ là cần thiết cho quá trình phát triển sau này của một lập trình viên.\r\n\r\no Phần 1 – Clean Code (Mã sạch): Những dòng code được viết ra không phải chỉ dành cho máy tính, mà còn là để cho con người (bảo trì, phát triển…), đây là điều cực kì quan trọng nhưng thường ít được dạy kĩ càng khi ở trường. Phần này sẽ hướng dẫn các bạn cách để viết mã sạch.\r\n\r\no Phần 2 – Những nguyên lí lập trình nâng cao (SOLID): Viết code chạy được chỉ là bước đầu tiên, để trở thành lập trình viên giỏi chúng ta cần phải biết cách viết code dễ bảo trì, dễ mở rộng và linh hoạt hơn. Phần này sẽ cùng bạn bàn luận về những nguyên lí lập trình nâng cao mà mọi lập trình viên có kinh nghiệm cần phải biết.\r\n\r\no Phần 3 – Đơn giản hóa các khái niệm kĩ thuật phức tạp: Lập trình không dễ, những cũng không thật sự khó, phần này sẽ cố gắng giải thích những khái niệm và kĩ thuật phức tạp nhằm giúp bạn có thể nhanh chóng nâng cao kĩ năng của bản thân.\r\n\r\nLời khuyên của Biên tập viên dành cho việc đọc cuốn sách\r\n\r\nĐây là một cuốn sách về kĩ thuật, nhưng bạn đừng quá lo lắng nếu như chưa có nhiều kiến thức chuyên môn trong ngành. Cuốn sách này được thiết kế và trình bày đơn giản hóa theo những cách dễ hiểu nhất để các bạn sinh viên hoặc các bạn vừa mới đi làm cũng có thể hiểu một cách dễ dàng. Các bạn cũng có thể tham khảo qua bảng danh sách thuật ngữ ở cuối sách để có thể hiểu những khái niệm được đề cập tới trong sách.\r\n\r\nTác giả Vũ Công Tấn Tài\r\n\r\nTác giả Vũ Công Tấn Tài hiện đang làm việc như một lập trình viên full-stack toàn thời gian trong lĩnh vực phát triển ứng dụng         Web và tham gia vào các dự án triển khai hệ thống CI/CD phục vụ cho các yêu cầu nâng cao chất lượng sản phẩm. Bên cạnh công việc chính, tác giả cũng thường tham gia hướng dẫn các lớp học lập trình cũng như tổ chức các buổi chia sẻ kinh nghiệm làm việc cho các bạn sinh viên.\r\n\r\nTrong suốt quá trình làm việc và tìm kiếm thông tin, tác giả Vũ Công Tấn Tài nhận ra rằng lập trình viên ở Việt Nam khá cô đơn và thiệt thòi: không có nhiều nguồn thông tin bằng tiếng Việt, nếu có thì cũng nằm rải rác ở nhiều nơi, gây ra không ít khó khăn cho nhiều người.\r\n\r\nVới mong muốn chia sẻ thật nhiều kiến thức, trong cuốn sách này, tác giả sẽ đem đến cho các bạn nhiều điều về nghề lập trình cũng như công việc của những nhà phát triển phần mềm – hay chúng ta vẫn hay gọi là nghề “lập trình viên”.', 145000, 'yes', 50, 'image_195509_1_19543h4MRTLVg.jpg', '2022-06-30 16:31:27', 'Quang Nguyễn', NULL, NULL, 'active', 69, 37),
(26, 'Mặt trái của công nghệ', 'Kỹ thuật, công nghệ đóng vai trò quan trọng, tạo nên những bước phát triển đột phá của xã hội loài người, từ hàng nghìn năm trước đây cũng như trong bối cảnh Cách mạng công nghiệp lần thứ tư hiện nay. Những phát minh của con người từ viên đá lửa cho đến các công cụ bằng kim loại, động cơ hơi nước, năng lượng điện, bóng bán dẫn cho đến máy tính điện tử, mạng Internet, trí tuệ nhân tạo,... là nền móng, trụ cột cho sự phát triển của tất cả các ngành và lĩnh vực. Nhờ có tiến bộ khoa học - công nghệ mà năng suất lao động tăng nhanh, người dân ở nhiều quốc gia trở nên giàu có, sung túc, khỏe mạnh và sống lâu hơn. Tuy nhiên, các phát minh, sáng chế có thể có những tác động phụ, tiêu cực đến đời sống con người cũng như môi trường sinh thái tự nhiên.\r\n\r\nĐể giúp bạn đọc có thêm tài liệu tham khảo về những vấn đề trên, Nhà xuất bản Chính trị quốc gia Sự thật và Thái Hà Books tổ chức biên dịch và xuất bản cuốn sách Mặt trái của công nghệ của tác giả Peter Townsend do Nhà xuất bản Oxford ấn hành năm 2016.\r\n\r\nVới 15 chương, nội dung cuốn sách đã đề cập rất cụ thể về những tác động tiêu cực, mặt trái của công nghệ như: việc con người biết sử dụng than đá, phát triển mạnh khai thác khoáng sản, nhưng lại làm thay đổi điều kiện tự nhiên và biến đổi khí hậu, nhiều thiên tai gây ra cho nhân loại; những phát minh, sáng chế liên quan đến chữ viết, giấy, da, thuốc kháng sinh, phim ảnh, mạng xã hội... ngoài những lợi ích vô cùng to lớn mang đến cho con người thì cũng có những ảnh hưởng không tốt đến sức khỏe, sự an toàn, những kỹ năng sống và văn hóa của các thành viên trong xã hội...\r\n\r\nTác giả Peter Townsend cũng cảnh báo, công nghệ có thể đem lại nhiều lợi ích cho sản xuất và đời sống nhưng không nên hoàn toàn phụ thuộc và bị động trước công nghệ, cần dự báo những rủi ro và có biện pháp đề phòng những thách thức, mặt trái mà công nghệ mang lại cả do lòng tham cũng như sự hiểu biết chưa đầy đủ của con người về công nghệ.', 99800, 'yes', 65, 'image_182009xYtQVAn2.jpg', '2022-06-30 16:33:12', 'Quang Nguyễn', NULL, NULL, 'active', 11, 37),
(27, 'FinTech 4.0  - Cách mạng công nghệ tài chính', 'Thế giới đang đứng trước một cơ hội lớn có thể gọi là cuộc Cách mạng công nghiệp lần thứ tư. Đây không chỉ đơn thuần là sự đổi mới về mặt kỹ thuật, mà là sự thay đổi lớn về công nghệ ở mức độ có thể tạo ra một cuộc cách mạng thay đổi cơ bản cấu trúc của xã hội hiện tại. Một trong những đại diện của nó là cuộc cách mạng trong nền công nghiệp Tài chính – FinTech. Có thể coi những công ty FinTech đang đảm nhận vai trò này là những “công ty công nghệ chuyên xử lý dữ liệu lớn liên quan đến tiền.”\r\n\r\nHơi vòng vo một chút, tại Diễn đàn Davos năm 2016 đã diễn ra một cuộc thảo luận khá thú vị. Đó là trả lời câu hỏi “Bạn nghĩ rằng thế giới hiện đang chiến tranh hay hòa bình?” Câu hỏi mới nghe tưởng chừng đơn giản nhưng lại rất khó trả lời.  Theo khái niệm trước đây, chiến tranh được định nghĩa là khi “có sự di chuyển của hệ thống quân đội”. Nhưng ngày nay với công nghệ mới phát triển, không cần phải di chuyển hệ thống quân đội cũng có thể tấn công đối thủ. Đó là chiến tranh dưới hình thức khủng bố và tấn công mạng.\r\n\r\nTrên thực tế, những vấn đề tương tự đang xảy ra ở mọi khía cạnh của nền kinh tế. Nói một cách khái quát, trong cuộc cách mạng công nghiệp lần thứ tư này, các hệ thống và cơ sở hạ tầng xã hội khác nhau mà chúng ta xây dựng từ trước đến nay có thể sẽ trở nên không còn cần thiết nữa', 60000, 'yes', 55, 'image_17519045OJhdHF.jpg', '2022-06-30 16:35:08', 'Quang Nguyễn', NULL, NULL, 'active', 34, 37),
(28, 'Kỳ Lân Công Nghệ - Giấc Mơ, Hiện Thực & Sự Tan Biến...', 'Kỳ Lân Công Nghệ - Giấc Mơ, Hiện Thực & Sự Tan Biến...\r\n\r\nĐây là tuyển tập các bài báo về công nghệ của một cây bút chuyên về công nghệ. Nhưng chúng không phải những bài báo công nghệ mang tính học thuật, chuyên môn mà là viết về thời sự công nghệ, công nghệ giữa dòng đời.\r\n\r\nSức hấp dẫn để đọc của những bài viết về công nghệ của Thẩm Hồng Thụy là sự đan xen, hòa quyện giữa chuyện đời thường và công nghệ. Như chuyện kỳ án về “hợp đồng tình ái” của một cô hoa hậu được dùng để so sánh với vụ người dùng di động ở Việt Nam bị một công ty kinh doanh dịch vụ di động Hongkong “trấn lột” hàng trăm tỷ đồng trong cái mối liên minh đầy dích dắc với nhà mạng, nhà cung cấp nội dung xứ Việt. Như kỳ án “con ruồi Number 1” được dùng để lẩy về những game di động của người Việt có thể hốt bạc toàn cầu.\r\n\r\nCâu chuyện, vấn đề, sự kiện được đề cập trong bài viết có tính thời gian, có thể không còn tính thời sự nhưng còn tính lịch sử, song các kiến thức, những bình luận và xúc cảm mà tác giả truyền tải trong từng bài viết lại có giá trị phi thời gian.\r\n\r\n--- trích lời giới thiệu của Nhà báo Phạm Hồng Phước', 120000, 'yes', 25, '9786043354263nBrsXN30.jpg', '2022-06-30 16:35:58', 'Quang Nguyễn', NULL, NULL, 'active', 83, 37),
(29, 'Công Nghệ Nhận Dạng Bằng Sóng Vô Tuyến RFID', 'Ngày nay với những ứng dụng của khoa học kỹ thuật tiên tiến vào đời sống, thế giới đã và đang ngày một thay đổi, văn minh, hiện đại hơn. Sự phát triển của các công nghệ điện tử mới tạo ra hàng loạt các thiết bị với các đặc điểm nổi bật như: Độ chính xác cao, tốc độ nhanh, gọn nhẹ, khả năng ứng dụng cao góp phần nâng cao năng suất lao động của con người, mang đến sự thỏa mãn, chất lượng cuộc sống chúng ta ngày một tốt hơn.\r\n\r\nSự ra đời của công nghệ RFID (Radio Frequency Identification - công nghệ nhận dạng đối tượng bằng sóng radio) là một ý tưởng độc đáo. Trên thế giới công nghệ RFID đã được áp dụng và phát triển ở rất nhiều lĩnh vực như: An ninh, quân sự, y học, giải trí, thương mại, bưu chính viễn thông… và đem lại nhiều lợi ích to lớn. Nhiều tập đoàn hàng đầu thế giới như: Hãng sản xuất máy bay Airbus, Tập đoàn điện tử Samsung, Sony, Motorola, … cũng như các hệ thống siêu thị, thu phí giao thông cũng áp dụng công nghệ này. Công nghệ RFID được xem như cánh tay phải đắc lực trong lĩnh vực kinh doanh.', 70000, 'yes', 16, '9786046703327vOtqITVH.jpg', '2022-07-02 16:55:12', 'Quang Nguyễn', NULL, NULL, 'active', 54, 37),
(30, 'Thuyết Tiến Hóa Công Nghệ Số', 'Công nghệ số không phải là một thứ, nó là mọi thứ. Thuyết Tiến Hóa Công Nghệ Số chính là tiếng chuông đánh thức để bạn nhận ra rằng sự thay đổi tích lũy về mặt kỹ thuật số là không đủ. Đối mặt với nhiều công nghệ mang tính cạnh tranh, tốc độ thay đổi chưa từng xảy ra trước đây cùng sự trỗi dậy của những công ty siêu hiện đại đầu tiên, công ty bạn sẽ bị bỏ lại phía sau và sẽ tuyệt chủng nếu bạn không chịu hành động. Cuốn sách này có một cái nhìn rất thú vị về ý tưởng phân rã để truyền cảm hứng cho các công ty muốn trở thành người tốt nhất trong phong trào đổi mới về mặt kỹ thuật số và muốn tồn tại được trong những giai đoạn bất ổn định này.\r\n\r\nVới hiện trạng ngày càng có nhiều lựa chọn, quá nhiều dữ liệu để xử lý, Còn công nghệ thì đe dọa gây ra sự phân rã cho ngay cả những mô hình kinh doanh ổn định nhất, các Công ty đang đối mặt với nhiều nguồn lực, nhân tố có thể hủy diệt họ. Nhưng với chiến lược đúng đắn, các nguồn lực này có thể giúp bạn biến công ty mình trở thành người dẫn đầu trên thương trường. Thuyết Tiến Hóa Công Nghệ Số đóng vai trò như cánh tay dẫn dắt bạn vượt qua thời khắc hỗn mang này, cung cấp cho bạn những chiến lược cùng lời kêu gọi hành động giúp thổi bùng lên ngọn lửa thiêu cháy sự tự mãn để tạo ra sự thay đổi đầy sáng tạo.\r\nTom Goodwin đã soi sáng đường đến tương lai bằng cách nghiên cứu về công nghệ, xã hội, cùng nhiều bài học trong quá khứ để giúp bạn biết cách thích nghi như thế nào, nên tận dụng cái gì, bỏ qua cái gì. Để giúp bạn thay đổi tư duy của mình, Goodwin đã chứng minh những giả định, dự đoán mà giới kinh doanh trước đây từng đưa ra về công nghệ số là sai ra sao. Nếu muốn công ty mình thành công trong thời kỳ hậu kỹ thuật số, bạn cần được khai sáng bởi Thuyết Tiến Hóa Công Nghệ Số', 120000, 'yes', 18, 'image_241309EhgBjHay.jpg', '2022-07-02 16:57:27', 'Quang Nguyễn', NULL, NULL, 'active', 34, 37),
(31, 'Chạy Đua Với Robot', 'Nhân loại đang trải qua một cuộc cách mạng khác trong cách loài người làm việc và kiếm sống – và một lần nữa, cuộc cách mạng này lại đốt bỏ những điều tưởng chừng hiển nhiên của quá khứ trong đống tro tàn lịch sử. Một lần nữa, công nghệ mới đã tạo tiền đề cho cách mạng. Nhưng thay vì là hạt giống, là máy dệt, hay là đầu máy hơi nước; động cơ của cuộc cách mạng này là công nghệ kỹ thuật số và robot.\r\n\r\nCuộc cách mạng kỹ thuật số hiện tại rõ ràng khác biệt với các bước nhảy vọt về công nghệ trước đó, bởi giờ đây khả năng xử lý dữ liệu – hay trí thông minh – của máy móc dường như không còn giới hạn. Ở bất cứ công việc đã được lập trình sẵn nào, máy tính cũng có ưu thế về nhận thức hơn con người. Và bởi việc sao chép phần mềm cũng không mấy khó khăn nên bất cứ tiến bộ kỹ thuật số nào cũng có thể được nhân bản ngay lập tức trên khắp toàn cầu. Nếu như đây quả thực là hướng đi của công nghệ trong tương lai gần – và cũng có nhiều lý do để tin vào điều đó – thì sắp tới có khả năng việc trả công cho người lao động sẽ trở thành điều dị thường. Trong một viễn cảnh tương lai ảm đạm, những cỗ máy siêu thông minh sẽ vượt qua khả năng hiểu biết và kiểm soát của con người. Nếu máy tính có thể nắm quyền điều khiển nhiều hệ thống quan trọng, hậu quả sẽ rất tàn khốc. Nhẹ thì loài người sẽ mất đi quyền kiểm soát vận mệnh của mình, còn nặng thì máy sẽ đưa người đến bờ tuyệt chủng.\r\n\r\nTốc độ cải tiến của robot được tính bằng giây, tương lai tăm tối đang lăm le phía trước, vậy con người phải làm gì? Câu trả lời chính là: học, học không ngừng. Học tập giờ đây là một hành trình không ngừng nghỉ, với rất nhiều điểm để ghé qua song không có một điểm dừng nào cả. Hành trình liên tục này có tác động vượt rất xa phạm vi của khuôn viên trường đại học, vào tận nhà, tận chỗ làm, và tận các startup của chúng ta. Những tác động này sẽ định hình các tham vọng hay thậm chí cả luật pháp của chúng ta. Sau cùng, chúng sẽ tác động đến tất cả mọi người, được lan tỏa ra khắp thế giới bằng các mạng lưới đa đại học được xây dựng để vượt qua các giới hạn về mức độ, về thời gian, về địa điểm.\r\n\r\nSự sáng tạo kết hợp với sự linh hoạt trí tuệ khiến chúng ta trở nên đặc biệt và trở thành sinh vật thành công nhất trên hành tinh này. Chúng sẽ tiếp tục là phương cách để mỗi cá nhân tạo nên dấu ấn riêng trong nền kinh tế. Dù trong lĩnh vực hay ngành nghề nào, công việc quan trọng nhất mà con người thực hiện sẽ luôn là công việc sáng tạo. Đó là lý do tại sao hệ thống giáo dục nên dạy chúng ta cách sáng tạo hiệu quả.', 83000, 'yes', 15, 'image_188351CncRbSNg.jpg', '2022-07-02 16:58:22', 'Quang Nguyễn', NULL, NULL, 'active', 39, 37),
(32, 'Luyện Thi Tiếng Pháp Delf - B2', 'Quyển “Luyện thi tiếng Pháp – DELF B2”, tập hợp các bài luyện tập nhằm trang bị cho bạn kiến thức và kỹ năng trước kỳ thi DELF B2 của Bộ Giáo dục Pháp. Bằng DELF B2 xác nhận trình độ tiếng Pháp của bạn ở bậc 4 theo Khung tham chiếu 6 bậc về trình độ ngôn ngữ chung của Châu Âu (CECRL).', 150000, 'yes', 25, 'image_196874Xz2oqJLU.jpg', '2022-07-02 16:59:57', 'Quang Nguyễn', NULL, NULL, 'active', 47, 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
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
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `isShowHome`) VALUES
(33, 'Văn học', 'vanhoc0RTpgco7.jpg', '2022-06-30 15:51:01', 'Quang Nguyễn', '2022-07-01 22:20:37', 'Quang Nguyễn', 'active', 3, 'yes'),
(34, 'Truyện ma', 'truyenma8NZnxm4q.jpg', '2022-06-30 15:52:54', 'Quang Nguyễn', '2022-07-01 21:38:12', 'Quang Nguyễn', 'active', 1, 'yes'),
(35, 'Thiếu nhi', 'thieunhiZ6s5qC2l.png', '2022-06-30 15:54:37', 'Quang Nguyễn', '2022-06-30 17:27:44', 'Quang Nguyễn', 'active', 2, 'yes'),
(36, 'Ngoại ngữ', 'ngoainguDWvZhl6T.jpg', '2022-06-30 15:54:58', 'Quang Nguyễn', NULL, NULL, 'active', 4, 'yes'),
(37, 'Công nghệ', 'laptrinh1vJrGxoR.png', '2022-06-30 15:55:45', 'Quang Nguyễn', NULL, NULL, 'active', 5, 'yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group`
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
-- Đang đổ dữ liệu cho bảng `group`
--

INSERT INTO `group` (`id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'admin', 'active', '2022-05-02 18:59:44', 'admin', '2022-05-21 05:37:33', 'adminnnn', 'active'),
(2, 'manager', 'active', '2022-05-02 18:59:44', 'admin', '2022-05-21 00:54:08', 'admin', 'active'),
(3, 'member', 'inactive', '2022-05-02 18:59:44', 'admin', '2022-05-21 00:47:43', 'admin', 'active'),
(4, 'supervisor', 'active', '2022-05-19 16:49:10', 'admin', '2022-05-21 00:55:15', 'quangng', 'active'),
(208, 'trainer', 'active', '2022-05-21 00:50:16', 'admin', '2022-05-21 00:52:32', 'admin', 'inactive'),
(209, 'adviser', 'active', '2022-05-21 00:50:16', 'admin', '2022-05-21 00:52:32', 'admin', 'inactive');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
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
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `created`, `created_by`, `modified`, `modified_by`, `status`, `group_id`) VALUES
(19, 'quangnguyen', 'n.nquangh2t@gmail.com', 'Nguyễn Văn A', '5f765ce6a2ae0c963cf720a71c13d32a', '2022-05-21 04:02:26', 'Admin', NULL, NULL, 'inactive', 2),
(20, 'quangtest', 'abcdef@gmail.com', 'nguyen van', '2b10351253eed030812674e8aa18a5ab', '2022-05-21 04:04:53', 'Admin', NULL, NULL, 'active', 2),
(21, 'phpquangnguyen', 'php@gmail.com', 'Tran Van A', '21232f297a57a5a743894a0e4a801fc3', '2022-05-21 04:09:34', 'nguyen van', '2022-05-21 16:27:45', 'Nguyễn Nhựt Quang', 'active', 3),
(22, 'testtt', 'tetstt@gmail.com', 'testet', 'da7619474d1f0c28af4da3b5675ae46f', '2022-05-21 04:10:05', 'nguyen van', NULL, NULL, 'inactive', 4),
(23, 'hellllo', 'hello@gmail.com', 'hellooooooooo', '5d41402abc4b2a76b9719d911017c592', '2022-05-21 04:10:47', 'nguyen van', NULL, NULL, 'active', 2),
(24, 'hiiiiiiiiiii', 'hiiiiiiiiiii@gmail.com', 'hehehehhe', 'cce8f4212df1b3e94c76634d21d2361e', '2022-05-21 04:11:16', 'nguyen van', NULL, NULL, 'active', 4),
(26, 'usertest', 'quang@gmail.com', 'Quang Nguyễn', '974e0509eda5affaf61e79d882c9e6ba', '2022-05-21 13:42:06', 'Nguyễn Nhựt Quang', '2022-05-21 13:42:42', 'Nguyễn Nhựt Quang', 'active', 2),
(27, 'usertest', 'quang@gmail.com', 'Quang Nguyễn', '806b2af4633e64af88d33fbe4165a06a', '2022-05-21 13:47:53', 'Nguyễn Nhựt Quang', NULL, NULL, 'active', 2),
(28, 'quangng', 'quangng@gmail.com', 'Quang Nguyen', 'c2a64dabc1b08b02e943e8f101b969a9', '2022-05-21 16:37:27', 'Nguyễn Nhựt Quang', NULL, NULL, 'inactive', 208),
(29, 'admin2', 'admin2@gmail.com', 'admin2', 'c84258e9c39059a89ab77d846ddab909', '2022-05-21 16:38:44', 'Quang Nguyen', NULL, NULL, 'active', 209),
(30, 'admin', 'admin@gmail.com', 'Quang Nguyễn', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, 'active', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
