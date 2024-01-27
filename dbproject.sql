-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 05:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_brand`
--

CREATE TABLE `tb_brand` (
  `brand_id` int(10) NOT NULL COMMENT 'รหัสแบรนด์',
  `brand_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อแบรนด์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลแบรนด์';

--
-- Dumping data for table `tb_brand`
--

INSERT INTO `tb_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Chanel'),
(2, 'Louis Vuitton'),
(3, 'Prada'),
(4, 'Dior'),
(7, 'Gucci'),
(8, 'Hermès'),
(9, 'Fendi'),
(11, ''),
(12, ''),
(13, '25'),
(14, '1213'),
(15, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(10) NOT NULL COMMENT 'รหัสประเภท',
  `category_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลประเภท';

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'กระเป๋าสะพาย'),
(2, 'กระเป๋าสตางค์'),
(3, 'กระเป๋าใส่บัตร'),
(4, 'กระเป๋าถือ'),
(5, 'รองเท้า'),
(6, 'ต่างหู'),
(7, 'สร้อยคอ'),
(8, 'สร้อยข้อมือ'),
(9, 'แหวน'),
(10, 'กำไลข้อมือ'),
(11, 'หมวก'),
(12, 'แว่นตา'),
(13, 'เน็กไท'),
(14, 'ผ้าผูกหูกระเป๋า'),
(16, 'ของตกแต่งกระเป๋า'),
(17, 'กระเป๋าใส่โทรศัพท์'),
(20, 'fg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `contact_id` int(10) NOT NULL COMMENT 'รหัสการติดต่อ',
  `user_id` int(10) DEFAULT NULL COMMENT 'รหัสผู้ใช้งาน',
  `contact_member` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `contact_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อีเมล',
  `contact_comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'แสดงความเห็น',
  `contact_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลการติดต่อ';

-- --------------------------------------------------------

--
-- Table structure for table `tb_img_product`
--

CREATE TABLE `tb_img_product` (
  `img_pro_id` int(10) NOT NULL COMMENT 'รหัสรูปภาพสินค้า',
  `img_product` varchar(150) DEFAULT NULL COMMENT 'รูปภาพสินค้า',
  `product_id` int(10) DEFAULT NULL COMMENT 'รหัสสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลรูปภาพสินค้า';

--
-- Dumping data for table `tb_img_product`
--

INSERT INTO `tb_img_product` (`img_pro_id`, `img_product`, `product_id`) VALUES
(75, '1649805636S__4472968.jpg', 4),
(76, '1651193945S__4472970.jpg', 4),
(77, '1645054293timeline_25650204_132341.jpg', 4),
(78, '1651446744timeline_25650204_132335.jpg', 4),
(79, '1644977566timeline_25650204_132339.jpg', 4),
(120, '1646597362S__4423759.jpg', 10),
(121, '1653728194timeline_25650202_220500.jpg', 10),
(122, '1652445871timeline_25650202_220504.jpg', 10),
(136, '1652786158S__4415601.jpg', 11),
(137, '1646198757timeline_25650202_185133.jpg', 11),
(138, '1650550462timeline_25650202_185135.jpg', 11),
(139, '1645641705timeline_25650202_185144.jpg', 11),
(140, '1648559692S__4415603.jpg', 11),
(141, '1651143461timeline_25650202_185142.jpg', 11),
(142, '1647327263timeline_25650202_185140.jpg', 11),
(143, '1654002853timeline_25650202_185138.jpg', 11),
(153, '1646064099S__4415518.jpg', 13),
(154, '1654132667timeline_25650202_173403.jpg', 13),
(155, '1645685624timeline_25650202_173352.jpg', 13),
(156, '1644977310timeline_25650202_173400.jpg', 13),
(157, '1645037595timeline_25650202_173355.jpg', 13),
(158, '1650280395timeline_25650202_173358.jpg', 13),
(159, '1647291039timeline_25650202_173406.jpg', 13),
(160, '1647261357timeline_25650211_221817.jpg', 14),
(161, '1653850565timeline_25650211_221812.jpg', 14),
(162, '1649331522timeline_25650211_221815.jpg', 14),
(163, '1653828020timeline_25650211_221814.jpg', 14),
(164, '1648641229timeline_25650211_221816.jpg', 14),
(165, '1650239680timeline_25650211_221814_0.jpg', 14),
(166, '1654664505S__3686536.jpg', 15),
(167, '1651633927timeline_25650113_122209.jpg', 15),
(168, '1646652490timeline_25650113_122213.jpg', 15),
(169, '1647988128timeline_25650113_122222.jpg', 15),
(170, '1647204014timeline_25650113_122215.jpg', 15),
(171, '1647433303timeline_25650113_122224.jpg', 15),
(172, '1652144666timeline_25650113_122228.jpg', 15),
(173, '1648515667timeline_25650113_122219.jpg', 15),
(174, '1645158380timeline_25650113_122231.jpg', 15),
(175, '1650699413timeline_25650113_122235.jpg', 15),
(176, '1650655104timeline_25650113_122238.jpg', 15),
(181, '1650646113S__4186115.jpg', 17),
(182, '1652146148S__4186117.jpg', 17),
(183, '1652819911timeline_25650126_165329.jpg', 17),
(184, '1653835316timeline_25650126_165324.jpg', 17),
(185, '1650330418timeline_25650126_165318.jpg', 17),
(186, '1651702842timeline_25650126_165326.jpg', 17),
(187, '1651938467timeline_25650126_165332.jpg', 17),
(188, '1645544516timeline_25650207_115119.jpg', 18),
(189, '1648668345timeline_25650207_115127.jpg', 18),
(190, '1650052050timeline_25650207_115123.jpg', 18),
(191, '1647530553timeline_25650207_115132.jpg', 18),
(192, '1653110755timeline_25650207_115124.jpg', 18),
(193, '1646539939timeline_25650207_115129.jpg', 18),
(194, '1646360129timeline_25650207_115135.jpg', 18),
(195, '1654414168timeline_25650207_115139.jpg', 18),
(196, '1648203345timeline_25650207_115141.jpg', 18),
(197, '1652858927S__4079757.jpg', 19),
(198, '1653265241S__4079759.jpg', 19),
(208, '1647114854S__3686538.jpg', 20),
(209, '1648178571timeline_25650113_122507.jpg', 20),
(210, '1649001148timeline_25650113_122505.jpg', 20),
(211, '1653442477S__3686540.jpg', 20),
(212, '1654786770timeline_25650113_122501.jpg', 20),
(213, '1645807037S__3686540.jpg', 20),
(214, '1647368521timeline_25650205_125021.jpg', 21),
(215, '1651851837S__3489838.jpg', 21),
(216, '1650351488timeline_25650105_170022.jpg', 22),
(217, '1653479781timeline_25650105_170025.jpg', 22),
(218, '1649880258S__3416619.jpg', 22),
(236, '1651879190timeline_25650123_072406.jpg', 25),
(237, '1651566858timeline_25650123_072415.jpg', 25),
(238, '1652697220timeline_25650123_072412.jpg', 25),
(239, '1649312540timeline_25650123_072427.jpg', 25),
(240, '1651122900timeline_25650123_072419.jpg', 25),
(241, '1649275799timeline_25650123_072422.jpg', 25),
(247, '1654749229timeline_25641207_153003.jpg', 26),
(248, '1653963334timeline_25641207_153007.jpg', 26),
(249, '1650129193timeline_25641207_153010.jpg', 26),
(250, '1653180463timeline_25650122_223639.jpg', 26),
(251, '1648162544timeline_25650122_223642.jpg', 26),
(252, '1654280118timeline_25650104_095823.jpg', 24),
(253, '1647122445S__3375122.jpg', 24),
(254, '1646461338timeline_25650104_095825.jpg', 24),
(255, '1651706699timeline_25650104_095826.jpg', 24),
(256, '1645403279timeline_25650104_095829.jpg', 24),
(257, '1650823513timeline_25650104_095827.jpg', 24),
(258, '1653914624timeline_25650104_095828.jpg', 24),
(259, '1653857519timeline_25650104_095830.jpg', 24),
(261, '16484833225512.jpg', 28),
(262, '1647813007timeline_25650112_120725.jpg', 28),
(263, '1650563536timeline_25650112_120727.jpg', 28),
(271, '1653657713timeline_25650106_085402.jpg', 29),
(272, '1646596992timeline_25650106_085409.jpg', 29),
(273, '1647431838timeline_25650106_085412.jpg', 29),
(274, '1652567191timeline_25650106_085423.jpg', 29),
(275, '1645061424timeline_25650106_085418.jpg', 29),
(276, '1654235215timeline_25650106_085426.jpg', 29),
(277, '1645258572timeline_25650106_085421.jpg', 29),
(278, '1646705029S__4833290.jpg', 30),
(279, '1651100663S__4833292.jpg', 30),
(280, '1648223075timeline_25640908_195012.jpg', 31),
(281, '1650386849S__9945135.jpg', 31),
(282, '1645448587timeline_25640908_195014.jpg', 31),
(298, '1648775329timeline_25641216_094207.jpg', 34),
(299, '1649216791S__2654335.jpg', 34),
(300, '1645344108S__2654333.jpg', 34),
(304, '1646098631S__10420450.jpg', 35),
(305, '1654483664S__10420452.jpg', 35),
(311, '1650459875S__41459760.jpg', 38),
(312, '1650394597timeline_25640821_105912.jpg', 38),
(313, '1654193542timeline_25640216_150431.jpg', 38),
(314, '1646220417timeline_25640216_150433.jpg', 38),
(321, '1647933270timeline_25641022_161504.jpg', 39),
(322, '1653128929timeline_25641022_161507.jpg', 39),
(323, '1650842936timeline_25641022_161516.jpg', 39),
(324, '1650135470timeline_25641022_162315.jpg', 39),
(325, '1649883558timeline_25641022_161510.jpg', 39),
(326, '1645756686timeline_25641022_161513.jpg', 39),
(327, '1645034897S__4579339.jpg', 40),
(328, '1648618274S__4579341.jpg', 40),
(329, '1646899578timeline_25650210_085348.jpg', 40),
(330, '1650351625timeline_25650210_085349.jpg', 40),
(331, '1651623754timeline_25650210_085351.jpg', 40),
(332, '1648113106timeline_25650210_085352.jpg', 40),
(333, '1652501311S__93610362.jpg', 41),
(334, '1652930624S__93610364.jpg', 41),
(339, '1647132643S__93692089.jpg', 43),
(340, '1648292966timeline_25650216_124218.jpg', 43),
(341, '1652832912timeline_25650216_124215.jpg', 43),
(342, '1651881456timeline_25650216_124231.jpg', 43),
(343, '1648400751S__93618207.jpg', 44),
(344, '1654328466timeline_25650215_084704.jpg', 44),
(345, '1647636457timeline_25650215_084707.jpg', 44),
(346, '1650965918timeline_25650215_084710.jpg', 44),
(347, '1652299434S__93610434.jpg', 45),
(348, '1645960016S__93610436.jpg', 45),
(349, '1654437754timeline_25650214_215848.jpg', 45),
(350, '1647025397timeline_25650214_215851.jpg', 45),
(370, '1648796432S__93233220.jpg', 51),
(371, '1652473943S__93233218.jpg', 51),
(372, '1654699141S__93233222.jpg', 51),
(373, '1652779752S__93233221.jpg', 51),
(378, '1649971080S__93225003.jpg', 53),
(379, '1654048330S__93225005.jpg', 53),
(380, '1651111420S__93225007.jpg', 53),
(381, '1652102945S__93225006.jpg', 53),
(382, '1652809907S__93126667.jpg', 54),
(383, '1645098797timeline_25650208_174059.jpg', 54),
(384, '1654065718timeline_25650208_174045.jpg', 54),
(385, '1652027971timeline_25650208_174051.jpg', 54),
(386, '1650231608timeline_25650208_174053.jpg', 54),
(387, '1648071370timeline_25650208_174048.jpg', 54),
(388, '1652673052timeline_25650208_174056.jpg', 54),
(393, '1646736973S__93126661.jpg', 55),
(394, '1654879317S__93126663.jpg', 55),
(395, '1649795364S__93126664.jpg', 55),
(396, '1647649742S__93126665.jpg', 55),
(401, '1650770708S__92971067.jpg', 57),
(402, '1648005036S__92971069.jpg', 57),
(403, '1645517754S__92971070.jpg', 57),
(404, '1648450530S__92971071.jpg', 57),
(405, '1654055968S__92979203.jpg', 56),
(406, '1647653038S__92979205.jpg', 56),
(407, '1652558982S__92979206.jpg', 56),
(408, '1646003164S__92979207.jpg', 56),
(409, '1652103515S__92962912.jpg', 58),
(410, '1647222839S__92962914.jpg', 58),
(411, '1654840330S__92962915.jpg', 58),
(412, '1646097853S__92962916.jpg', 58),
(413, '1654789080S__92962906.jpg', 59),
(414, '1646704029S__92962908.jpg', 59),
(415, '1646658566S__92962910.jpg', 59),
(416, '1648090519S__92962909.jpg', 59),
(417, '1645895717S__92962882.jpg', 60),
(418, '1648108324S__92962884.jpg', 60),
(419, '1652334494S__92962885.jpg', 60),
(420, '1654714562S__92962886.jpg', 60),
(421, '1645921250S__92930089.jpg', 61),
(422, '1653166340S__92930091.jpg', 61),
(423, '1652173033S__92930092.jpg', 61),
(424, '1653325031S__92930093.jpg', 61),
(427, '1650044062S__92815979.jpg', 63),
(428, '1652200131S__92815981.jpg', 63),
(460, '1648265322timeline_25640824_172401.jpg', 36),
(461, '1646037499S__8486962.jpg', 36),
(462, '1650295505timeline_25640824_172806.jpg', 36),
(463, '1651812623S__8486959.jpg', 37),
(464, '1653347306timeline_25640824_171829.jpg', 37),
(465, '1646950346S__93610382.jpg', 46),
(466, '1650015668timeline_25650214_205437.jpg', 46),
(467, '1645552719S__2228360.jpg', 23),
(468, '1645991687timeline_25641209_110313.jpg', 23),
(469, '1648643128timeline_25641209_110317.jpg', 23),
(470, '1652916561timeline_25641209_110308.jpg', 23),
(471, '1646246579S__8495107.jpg', 32),
(472, '1651525930timeline_25640824_173517.jpg', 32),
(473, '1654011199timeline_25640824_173518.jpg', 32),
(476, '1653751820S__4415508.jpg', 16),
(477, '1649170283timeline_25650202_170512.jpg', 16),
(478, '1654602363timeline_25650202_170516.jpg', 16),
(479, '1652149146timeline_25650202_170519.jpg', 16),
(480, '1650374874timeline_25650203_102425.jpg', 6),
(481, '1648681749S__4440111.jpg', 6),
(482, '1654523934timeline_25650203_102428.jpg', 6),
(483, '1647510317timeline_25650203_102434.jpg', 6),
(484, '1645123448timeline_25650203_102432.jpg', 6),
(485, '1651276714timeline_25650203_102429.jpg', 6),
(486, '1645504129S__93692081.jpg', 42),
(487, '1654867148timeline_25650216_124251.jpg', 42),
(488, '1650775401timeline_25650216_124254.jpg', 42),
(489, '1649240504timeline_25650216_124257.jpg', 42),
(490, '1645724069S__93610377.jpg', 47),
(491, '1646040618S__93610379.jpg', 47),
(492, '1645234105S__93593647.jpg', 48),
(493, '1646395337S__93593650.jpg', 48),
(494, '1651651002S__93593649.jpg', 48),
(495, '1645417783S__93593651.jpg', 48),
(496, '1655000691S__93528184.jpg', 49),
(497, '1650968899S__93528182.jpg', 49),
(498, '1646313296S__93528185.jpg', 49),
(499, '1645660194S__93528186.jpg', 49),
(500, '1646659025S__93224979.jpg', 52),
(501, '1653800866timeline_25650210_111808.jpg', 52),
(502, '1651453831timeline_25650210_111810.jpg', 52),
(503, '1645951454timeline_25650210_111813.jpg', 52),
(512, '1652168129timeline_25650210_085940.jpg', 2),
(513, '1647703643timeline_25650210_085937.jpg', 2),
(514, '1649521303S__4579343.jpg', 2),
(515, '1654652633timeline_25650210_085943.jpg', 2),
(516, '1648211273timeline_25650210_085932.jpg', 2),
(517, '1648321484timeline_25650210_085930.jpg', 2),
(518, '1646741112timeline_25650210_085935.jpg', 2),
(519, '1652822703S__4472859.jpg', 3),
(520, '1645414724timeline_25650204_113642.jpg', 3),
(521, '1648472586timeline_25650204_113651.jpg', 3),
(522, '1645657755timeline_25650204_113654.jpg', 3),
(523, '1652900900timeline_25650204_113645.jpg', 3),
(524, '1645700370timeline_25650204_113639.jpg', 3),
(525, '1652026702timeline_25650203_103147.jpg', 5),
(526, '1653076582S__4440125.jpg', 5),
(527, '1649330447timeline_25650203_103137.jpg', 5),
(528, '1654737844timeline_25650203_103142.jpg', 5),
(529, '1652778364timeline_25650203_103134.jpg', 5),
(530, '1647655187S__4440127.jpg', 5),
(531, '1647380822timeline_25650203_103139.jpg', 5),
(532, '1652300171timeline_25650203_103150.jpg', 5),
(533, '1649530825timeline_25650203_103144.jpg', 5),
(534, '1653736833S__4440107.jpg', 9),
(535, '1646049885timeline_25650203_102238.jpg', 9),
(536, '1654070547timeline_25650203_102252.jpg', 9),
(537, '1646212905S__4440109.jpg', 9),
(538, '1650834842timeline_25650203_102241.jpg', 9),
(539, '1645795140timeline_25650203_102246.jpg', 9),
(540, '1647179355timeline_25650203_102244.jpg', 9),
(541, '1647681245timeline_25650203_102249.jpg', 9),
(542, '1649215863timeline_25641115_125314.jpg', 27),
(543, '1651909616timeline_25641115_125320.jpg', 27),
(544, '1647413730timeline_25641115_125329.jpg', 27),
(545, '1650487728timeline_25641115_125324.jpg', 27),
(546, '1651057664timeline_25641115_125343.jpg', 27),
(547, '1647861795timeline_25641115_125349.jpg', 27),
(548, '1646118267timeline_25641115_125338.jpg', 27),
(549, '1649955487S__93339651.jpg', 50),
(550, '1646004545S__93339652.jpg', 50),
(551, '1651041168S__92815985.jpg', 62),
(552, '1646245765S__92815987.jpg', 62),
(643, '1652809907S__93126667.jpg', 64),
(672, '1650778018timeline_25650205_163504.jpg', 1),
(673, '1654437024timeline_25650205_163511.jpg', 1),
(674, '1651198163S__4489741.jpg', 1),
(675, '1652404546timeline_25650205_163516.jpg', 1),
(676, '1651611157timeline_25650205_163514.jpg', 1),
(677, '1653096562timeline_25650205_163506.jpg', 1),
(678, '1652736142timeline_25650205_163509.jpg', 1),
(679, '1649430125timeline_25650205_163519.jpg', 1),
(689, '63674cfad4b8f.png', 122),
(690, '63674cfad7056.png', 122),
(692, '63674cfadcc71.png', 122),
(700, '63863d468dbda.png', 131),
(701, '63863d468ec8e.png', 131),
(702, '63863d468f55d.png', 131),
(703, '63863d468fdd3.png', 131),
(704, '638644d835642.jpeg', 133),
(705, '638644d836445.png', 133),
(706, '638783f0612e9.png', 136),
(707, '638783f0624fb.png', 136),
(708, '638783f063064.png', 136),
(709, '638783f063a1a.png', 136),
(710, '638784ac1e118.png', 139),
(711, '63ef973ad7304.jpeg', 142);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` varchar(20) NOT NULL COMMENT 'เลขที่สั่งซื้อ',
  `user_id` int(10) DEFAULT NULL COMMENT 'รหัสผู้ใช้งาน',
  `order_name` text DEFAULT NULL COMMENT 'ชื่อ',
  `order_address` text DEFAULT NULL COMMENT 'ที่อยู่',
  `order_tel` varchar(10) DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `order_email` varchar(30) DEFAULT NULL COMMENT 'อีเมล',
  `order_date` date DEFAULT NULL COMMENT 'วันที่',
  `order_total` varchar(50) DEFAULT NULL COMMENT 'ราคารวม',
  `status_id` int(10) DEFAULT NULL COMMENT 'รหัสสถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลการสั่งซื้อ';

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `user_id`, `order_name`, `order_address`, `order_tel`, `order_email`, `order_date`, `order_total`, `status_id`) VALUES
('OR_20221024_230311', 3, 'ธีริศรา ชาวผ้าขาว', '74 ซ.ท่ากลาง แขวงวังบูรพาภิรมย์ เขตพระนคร กทม.', '0615396436', 'titaporn-c@rmutp.ac.th', '2022-10-24', '47000', 2),
('OR_20221024_234150', 3, 'ฐิตาภรณ์ ชาวผ้าขาว', '1066/5 ถ.พรานนก เขตบางกอกน้อย แขวงบ้านช่างหล่อ กทม. 17000', '0615396436', 'titaporn-c@rmutp.ac.th', '2022-10-24', '12000', 2),
('OR_20230217_231940', 2, 'ธีริศรา ชาวผ้าขาว', '74 ซ.ท่ากลาง แขวงวังบูรพาภิรมย์ เขตพระนคร กทม.', '0961696246', 'terisara-c@rmutp.ac.th', '2023-02-17', '10', 1),
('OR_20230217_233034', 2, 'ธีริศรา ชาวผ้าขาว', '74 ซ.ท่ากลาง แขวงวังบูรพาภิรมย์ เขตพระนคร กทม.', '0961696246', 'terisara-c@rmutp.ac.th', '2023-02-17', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `order_detail_id` int(10) NOT NULL COMMENT 'รหัสรายละเอียดการสั่งซื้อ',
  `order_id` varchar(20) DEFAULT NULL COMMENT 'รหัสการสั่งซื้อ',
  `product_id` int(10) DEFAULT NULL COMMENT 'รหัสสินค้า',
  `order_price` varchar(30) DEFAULT '' COMMENT 'ราคา',
  `order_quantity` varchar(30) DEFAULT '' COMMENT 'จำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลรายละเอียดการสั่งซื้อ';

--
-- Dumping data for table `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`order_detail_id`, `order_id`, `product_id`, `order_price`, `order_quantity`) VALUES
(2, 'OR_20221024_230311', 48, '18500', '1'),
(3, 'OR_20221024_230311', 50, '28500', '1'),
(4, 'OR_20221024_234150', 45, '12000', '1'),
(6, 'OR_20230217_231940', 142, '10', '1'),
(7, 'OR_20230217_233034', 142, '10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `pay_id` int(10) NOT NULL COMMENT 'เลขที่การชำระเงิน',
  `order_id` varchar(20) DEFAULT NULL COMMENT 'รหัสการสั่งซื้อสินค้า',
  `pay_date` date DEFAULT NULL COMMENT 'วันที่ชำระเงิน',
  `pay_total` varchar(10) DEFAULT NULL COMMENT 'ราคารวม',
  `pay_slip` varchar(200) DEFAULT NULL COMMENT 'ชื่อธนาคาร',
  `pay_tel` varchar(10) DEFAULT NULL COMMENT 'เบอร์โทรศัพท์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลการชำระเงิน';

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`pay_id`, `order_id`, `pay_date`, `pay_total`, `pay_slip`, `pay_tel`) VALUES
(84, 'OR_20221024_230311', '2022-10-24', '47000', 'uploads/6356b757cd17a.png', '0615396436'),
(85, 'OR_20221024_234150', '2022-10-24', '12000', 'uploads/6356c05d491a0.png', '0615396436'),
(87, 'OR_20221024_230311', '2023-02-17', '47000', 'fb1b785c72.jpeg', '0961696246');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permission`
--

CREATE TABLE `tb_permission` (
  `permission_id` int(2) NOT NULL COMMENT 'รหัสสิทธิ์การใช้งาน',
  `permission_name` varchar(50) NOT NULL COMMENT 'ชื่อสิทธิ์การใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสิทธิ์การใช้งาน';

--
-- Dumping data for table `tb_permission`
--

INSERT INTO `tb_permission` (`permission_id`, `permission_name`) VALUES
(1, 'A'),
(2, 'S'),
(3, 'U');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(10) NOT NULL COMMENT 'รหัสสินค้า',
  `product_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อสินค้า',
  `brand_id` int(10) DEFAULT NULL COMMENT 'รหัสแบรนด์',
  `category_id` int(10) DEFAULT NULL COMMENT 'รหัสประเภท',
  `product_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_quantity` varchar(30) DEFAULT NULL COMMENT 'จำนวน',
  `product_price` int(10) DEFAULT NULL COMMENT 'ราคา',
  `product_discount` int(3) DEFAULT NULL,
  `product_description` text DEFAULT NULL COMMENT 'รายละเอียด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสินค้า';

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `product_name`, `brand_id`, `category_id`, `product_date`, `product_quantity`, `product_price`, `product_discount`, `product_description`) VALUES
(1, 'Chanel Business Affinity 7.5', 1, 1, '2022-12-23 14:45:30', '10', 175000, 0, '-'),
(2, 'Chanel 19', 1, 1, '2022-03-02 11:38:22', '10', 213000, NULL, 'หนังแกะ โลหะสีทอง โลหะสีเงิน และโลหะเคลือบรูทีเนียม สีดำ 16 × 26 × 9 cm (  in  )'),
(3, 'Chanel Vanity box beige 22C', 1, 1, '2022-03-03 11:38:22', '2', 85000, NULL, 'หนังลูกวัวสีเบจแบบมีลายเคลือบเงา และโลหะสีทอง '),
(4, 'Louis Vuitton Escale size 39', 2, 5, '2022-03-04 11:38:22', '1', 24000, NULL, '-'),
(5, 'Chanel Classic 10 iridescent 22P', 1, 1, '2022-03-05 11:38:22', '2', 335000, NULL, '10″ x 6.3″ x 3″'),
(6, 'Hemes Garden party 30 สี Vert cypress stamp #Z ', 8, 4, '2022-12-23 14:52:48', '1', 163000, 0, ' 12″ x 8.5″ x 5″'),
(9, 'Chanel Coco 9.5 22P', 1, 1, '2022-03-07 11:38:22', '2', 188000, NULL, '11.4″ x 7.1″ x 4.7″'),
(10, 'Louis Vuitton earring ghw ', 2, 6, '2022-03-08 11:38:22', '1', 17900, NULL, '-'),
(11, ' Chanel Card holder Caviar สายเมโลดี้ 22P', 1, 3, '2022-03-09 11:38:22', '1', 88000, NULL, '-'),
(12, 'Chanel Boy 10 light gold hardware 22P', 1, 1, '2022-12-23 14:51:48', '1', 218000, 0, '10 x 7 x 3.5″'),
(13, ' Chanel Woc Shw', 1, 1, '2022-03-11 11:38:22', '5', 115000, NULL, '12 x 19 x 4.5'),
(14, 'Gucci Espradrilles', 7, 5, '2022-04-13 11:38:22', '1', 22500, NULL, 'size 36.5'),
(15, 'Louis Vuitton Croisette azur microship', 2, 1, '2022-04-13 11:38:22', '1', 60500, NULL, ''),
(16, 'Louis Vuitton Pochette nm azur microship', 2, 1, '2022-04-13 11:38:22', '1', 53000, NULL, ''),
(17, 'Chanel 19 22P', 1, 1, '2022-04-13 11:38:22', '1', 205000, NULL, 'size 26 Shw  '),
(18, 'Chanel Vanity box 22P ', 1, 1, '2022-04-13 11:38:22', '1', 178000, NULL, 'size 7.5\" x 5\"  fullset ori rec ใส่มือถือ Iphone plus ได้นะคะ มีกระจกให้'),
(19, 'Chanel Earring 22p ', 1, 6, '2022-04-13 11:38:22', '1', 23500, NULL, ''),
(20, 'Louis Vuitton Mini Pochette emp microship', 2, 4, '2022-04-13 11:38:22', '1', 30500, NULL, ''),
(21, 'Dior Bracelet ', 4, 8, '2022-04-13 11:38:22', '1', 16500, NULL, ''),
(22, 'Hemes espadrille femme ancone nappa size39 ', 8, 5, '2022-04-13 11:38:22', '1', 19000, NULL, 'อปก.ถุงผ้า กล่อง'),
(23, 'Dior sandel ', 1, 5, '2022-04-13 11:38:22', '1', 18000, NULL, 'อปก.ถุงผ้า บุ๊ค กล่อง'),
(24, 'Louis Vuitton Metis Reverse microship  ', 2, 1, '2022-04-13 11:38:22', '1', 73900, NULL, 'fullset copy rec บิลไทย'),
(25, 'Louis Vuitton Pochette nm microship', 2, 1, '2022-04-13 11:38:22', '1', 54500, NULL, 'fullset copy rec '),
(26, 'Louis Vuitton Zippy Coins microship', 2, 2, '2022-04-13 11:38:22', '1', 15500, NULL, ' fullset '),
(27, 'Chanel Vanity mini with chains ', 1, 1, '2022-04-13 11:38:22', '2', 82000, NULL, 'fullset copy rec'),
(28, 'New Hermes Twilly ', 8, 14, '2022-04-13 11:38:22', '1', 8000, NULL, ''),
(29, 'New Chanel Mini 7.5 in pink ', 1, 1, '2022-04-13 11:38:22', '1', 209000, NULL, 'fullset ori rec '),
(30, 'Hermes earrings size ปกติ ', 8, 6, '2022-04-13 11:38:22', '1', 13500, NULL, 'อปก.ริบบิ้น กล่อง'),
(31, 'Hermes radio mm bleu fra/mauve sylv', 8, 16, '2022-04-13 11:38:22', '1', 28000, NULL, 'อปก.กล่อง'),
(32, 'Hermès charm Oran black ', 1, 16, '2022-04-13 11:38:22', '1', 17500, NULL, ' อปก.ริบบิ้น กล่อง'),
(34, 'Chanel Earrings  ', 1, 6, '2022-04-13 11:38:22', '1', 19500, NULL, 'fullset'),
(35, 'Chanel Earrings  ', 1, 6, '2022-04-13 11:38:22', '1', 32000, NULL, ''),
(36, 'New Hermès charm Oran etoupe', 8, 16, '2022-04-13 11:38:22', '1', 18000, NULL, ' อปก.ริบบิ้น กล่อง'),
(37, 'Hermès Charm orange bag ', 8, 16, '2022-04-13 11:38:22', '1', 9999, NULL, ' อปก.ริบบิ้น กล่อง'),
(38, 'Gucci Hosrebit size 39  ', 7, 5, '2022-04-13 11:38:22', '1', 22900, NULL, 'เหมาะกับเท้า 38 อปก.ถุงผ้า การ์ด กล่อง'),
(39, 'Hermes Phone bag with card holder ', 8, 17, '2022-04-13 11:38:22', '1', 35000, NULL, 'อปก.ริบบิ้น กล่อง '),
(40, 'Chanel Woc seasonal 22P', 1, 1, '2022-04-13 11:38:22', '1', 137000, NULL, ' fullset บิลไทย '),
(41, 'Hermes clic clac Maroon GHW', 8, 10, '2022-04-13 11:38:22', '1', 28000, NULL, 'อปก. กล่อง ถุงผ้า ริบบิ้น ถุงกระดาษ '),
(42, 'Chanel zippy boy GHW holo 31', 1, 3, '2022-04-13 11:38:22', '1', 24500, NULL, 'fullset copy rec '),
(43, 'Chanel zippy 19 holo 31', 1, 3, '2022-04-13 11:38:22', '1', 26000, NULL, 'fullset no rec '),
(44, 'Chanel card holder Double zip beige holo31', 1, 3, '2022-04-13 11:38:22', '1', 28500, NULL, 'fullset no rec '),
(45, 'Gucci compact wallet', 7, 2, '2022-10-24 16:41:50', '1', 12000, NULL, 'กล่อง ถุงผ้า การ์ด ถุงกระดาษ'),
(46, 'Chanel bracelet', 1, 8, '2022-04-13 11:38:22', '1', 21500, NULL, 'fullset no rec '),
(47, 'Chanel bracelet', 1, 8, '2022-04-13 11:38:22', '1', 21500, NULL, 'fullset no rec '),
(48, 'Chanel flap card business burgundy', 1, 3, '2022-10-24 16:03:11', '0', 18500, NULL, 'fullset no rec '),
(49, 'Chanel compact wallet  deep blue', 1, 2, '2022-10-24 15:57:13', '0', 335000, NULL, 'fullset no rec '),
(50, 'Hermes clic clac H GM', 1, 10, '2022-10-24 16:03:11', '0', 28500, NULL, 'อปก. กล่อง ถุงผ้า บุ้ค ถุงกระดาษ '),
(51, 'Chanel zippy 19  wallet holo 31', 1, 2, '2022-04-13 11:38:22', '1', 46500, NULL, 'fullset no rec '),
(52, 'Chanel card holder in Green holo31', 1, 3, '2022-10-24 15:09:53', '0', 24000, NULL, 'fullset no rec '),
(53, 'Chanel o case GHW 22C', 1, 3, '2022-04-13 11:38:22', '0', 24500, NULL, 'fullset copy rec '),
(54, 'Chanel backpack', 1, 1, '2022-04-13 11:38:22', '1', 165000, NULL, 'fullset rec บิลนอก'),
(55, 'Chanel card holder flap 19 holo31', 1, 3, '2022-10-24 15:27:15', '9', 26000, NULL, 'fullset no rec '),
(56, 'Chanel o case SHW holo31', 1, 2, '2022-04-13 11:38:22', '0', 24500, NULL, 'fullset no rec '),
(57, 'Chanel zippy wallet SHW holo 31', 1, 2, '2022-04-13 11:38:22', '0', 24000, NULL, 'fullset no paperbag'),
(58, 'Chanel Sarah wallet GHW in blue holo 30', 1, 2, '2022-04-13 11:38:22', '0', 45500, NULL, 'fullset no rec '),
(59, 'Chanel Sarah wallet GHW in grey holo 31', 1, 2, '2022-04-13 11:38:22', '0', 45500, NULL, 'fullset no rec '),
(60, 'Chanel Sarah wallet GHW 22C holo 31', 1, 2, '2022-04-13 11:38:22', '0', 45500, NULL, 'fullset rec '),
(61, 'Chanel o case 8\" holo30', 1, 2, '2022-04-13 11:38:22', '0', 29000, NULL, 'fullset no rec '),
(62, 'Chanel Earrings GHW', 1, 6, '2022-10-24 15:57:13', '1', 15500, NULL, 'แบบกลม cc เส้นผ่าศูนย์กลาง 1.3 cm'),
(63, 'Chanel Earrings GHW', 1, 6, '2022-04-13 11:38:22', '0', 15500, NULL, 'แบบลูกตุ้มกลม '),
(64, 'Chanel Earrings  CC logo SHW', 1, 6, '2022-10-24 15:27:15', '9', 18000, NULL, 'แบบหนีบ 2 cm'),
(122, 'product_name', 2, 2, '2022-11-01 04:55:08', '30', 30, NULL, 'product_description'),
(125, '1', 2, 12, '2022-11-29 17:06:18', '11', 1, NULL, '1'),
(126, '1', 2, 12, '2022-11-29 17:06:25', '11', 1, NULL, '1'),
(127, '1', 2, 12, '2022-11-29 17:06:57', '11', 1, NULL, '1'),
(128, '5', 3, 3, '2022-11-29 17:08:00', '10', 10, NULL, '-'),
(129, '1', 2, 5, '2022-11-29 17:09:34', '10', 10, NULL, '-'),
(130, '1', 2, 4, '2022-11-29 17:10:36', '10', 10, NULL, '-'),
(131, '1', 4, 3, '2022-11-29 17:11:34', '10', 10, NULL, '-'),
(132, '2', 3, 4, '2022-11-29 17:14:25', '10', 10, NULL, '-'),
(133, '4', 2, 2, '2022-11-29 17:43:52', '10', 10, NULL, '-'),
(134, '21', 2, 4, '2022-11-30 04:41:12', '10', 1, NULL, '-'),
(136, '10', 3, 3, '2022-11-30 16:25:20', '10', 10, NULL, '-'),
(137, '10', 3, 2, '2022-11-30 16:26:02', '10', 10, NULL, '-'),
(138, '4', 8, 3, '2022-11-30 16:27:33', '10', 10, NULL, '-'),
(139, '10', 1, 8, '2022-12-10 06:58:09', '10', 1000, 10, '-'),
(140, '10', 3, 5, '2022-11-30 16:28:51', '10', 10, NULL, '-'),
(141, '121', 2, 12, '2023-02-17 15:02:21', '10', 121, 0, '-'),
(142, 'fvd', 2, 4, '2023-02-17 16:30:34', '98', 10, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `status_id` int(2) NOT NULL COMMENT 'รหัสสถานะ',
  `status_name` varchar(255) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลสถานะ';

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`status_id`, `status_name`) VALUES
(1, 'รอการชำระ'),
(2, 'ชำระเงินแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL COMMENT 'รหัสผู้ใช้งาน',
  `user_firstname` varchar(200) DEFAULT NULL COMMENT 'ชื่อ',
  `user_lastname` varchar(200) DEFAULT NULL COMMENT 'นามสกุล',
  `user_address` varchar(255) DEFAULT NULL COMMENT 'ที่อยู่',
  `user_tel` varchar(20) DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `user_email` varchar(30) DEFAULT NULL COMMENT 'อีเมล',
  `user_sex` varchar(4) DEFAULT NULL COMMENT 'เพศ',
  `user_username` varchar(100) DEFAULT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `user_password` varchar(100) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `permission_id` int(2) DEFAULT NULL COMMENT 'รหัสสิทธิ์การใช้งาน',
  `user_datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ข้อมูลผู้ใช้งาน';

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_firstname`, `user_lastname`, `user_address`, `user_tel`, `user_email`, `user_sex`, `user_username`, `user_password`, `permission_id`, `user_datetime`) VALUES
(1, 'Administrator', 'Administrator', '1066/5 ถ.พรานนก เขตบางกอกน้อย แขวงบ้านช่างหล่อ กรุงเทพ 17000', '0999999999', 'admin@gmail.com', 'ชาย', 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', 1, '2021-03-09 18:37:11'),
(2, 'ธีริศรา', 'ชาวผ้าขาว', '74 ซ.ท่ากลาง แขวงวังบูรพาภิรมย์ เขตพระนคร กทม.', '0961696246', 'terisara-c@rmutp.ac.th', 'หญิง', 'namthip', 'e807f1fcf82d132f9bb018ca6738a19f', 3, '2021-12-27 18:18:15'),
(3, 'ฐิตาภรณ์', 'ชาวผ้าขาว', '1066/5 ถ.พรานนก เขตบางกอกน้อย แขวงบ้านช่างหล่อ กรุงเทพมหานคร 17000', '0615396436', 'titaporn-c@rmutp.ac.th', 'หญิง', 'tarn', 'e807f1fcf82d132f9bb018ca6738a19f', 3, '2022-01-23 18:05:19'),
(36, 'Panupong', 'wachum', '149/45, เพอร์เฟค พาร์ค ซอย5, บ้านกลาง, ปทุมธานี', '0982783179', 'panupong-wa@rmutp.ac.th', 'ชาย', 'panupong-wa@rmutp.ac.th', '41c1733503164279e0c89af8a215bdbd', 3, '2022-02-15 19:45:50'),
(37, 'cvc', 'cvc', '151', '545455', 'v@gmail.com', '', 'nffe', '1234567890', 3, '2022-11-06 19:10:52'),
(38, 'cvc', 'cvc', '151', '545455', 'v@gmail.com', '', 'nffe', '1234567890', 3, '2022-11-06 19:11:09'),
(39, 'dsdkd', 'dfd', '242', '8454545544', 'ftt@gmail.com', '', 'btty', '1234567890', 3, '2022-11-06 19:15:09'),
(40, 'fggf', 'ffgf', 'hh', '574445444', 'admin@gmail.com', 'ชาย', 'fdr', '1234567890', 3, '2022-11-06 19:21:13'),
(41, 'fggf', 'ffgf', 'hh', '574445444', 'd@gmail.com', 'ชาย', 'ddfe', '1234567890', 3, '2022-11-06 19:21:53'),
(42, 'fd', 'fff', '25', '865441252', 'test@gmail.com', 'ชาย', 'test', 'e807f1fcf82d132f9bb018ca6738a19f', 3, '2023-02-18 00:38:08'),
(43, 'fd', 'fff', '25', '865441252', 'test@gmail.com', 'ชาย', 'test', 'e807f1fcf82d132f9bb018ca6738a19f', 3, '2023-02-18 00:38:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_img_product`
--
ALTER TABLE `tb_img_product`
  ADD PRIMARY KEY (`img_pro_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `tb_permission`
--
ALTER TABLE `tb_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแบรนด์', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภท', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการติดต่อ', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_img_product`
--
ALTER TABLE `tb_img_product`
  MODIFY `img_pro_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรูปภาพสินค้า', AUTO_INCREMENT=714;

--
-- AUTO_INCREMENT for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `order_detail_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดการสั่งซื้อ', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'เลขที่การชำระเงิน', AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tb_permission`
--
ALTER TABLE `tb_permission`
  MODIFY `permission_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสิทธิ์การใช้งาน', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `status_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสถานะ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้งาน', AUTO_INCREMENT=5515545;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD CONSTRAINT `tb_contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_img_product`
--
ALTER TABLE `tb_img_product`
  ADD CONSTRAINT `tb_img_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tb_product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `tb_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD CONSTRAINT `tb_order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tb_product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD CONSTRAINT `tb_payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tb_order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `tb_product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `tb_brand` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
