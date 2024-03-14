-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2024 at 12:29 PM
-- Server version: 10.5.15-MariaDB-0+deb11u1-log
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thewis_teria`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_date` date NOT NULL DEFAULT current_timestamp(),
  `cart_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `menu_id`, `user_id`, `cart_date`, `cart_status`) VALUES
(295, 28, 9, '2024-03-13', 'ordered'),
(296, 29, 9, '2024-03-13', 'ordered'),
(297, 28, 9, '2024-03-13', 'ordered'),
(298, 29, 9, '2024-03-13', 'ordered'),
(299, 29, 16, '2024-03-14', 'ordered'),
(300, 30, 16, '2024-03-14', 'ordered'),
(301, 32, 18, '2024-03-14', 'ordered'),
(302, 34, 18, '2024-03-14', 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `cart_sp`
--

CREATE TABLE `cart_sp` (
  `cartSp_id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `pt_id` int(11) DEFAULT NULL,
  `addons_id` int(11) DEFAULT NULL,
  `cartSp_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_image` varchar(500) NOT NULL,
  `menu_type` varchar(200) NOT NULL,
  `menu_recipe` varchar(300) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `type_id`, `menu_price`, `menu_image`, `menu_type`, `menu_recipe`, `status`) VALUES
(27, 'กาแฟส้ม', 2, 79, 'กาแฟส้ม_664293.png', 'เย็น', '', 1),
(28, 'เอสเปรสโซ่', 2, 60, 'เอสเปรสโซ่_945077.png', 'เย็น', '-กาแฟ 1 ชอต\r\n-นมเมิจิ 120 ml.\r\n-นมจืด 30 ml.\r\n-นมข้นหวาน 30 ml.\r\nคนให้เข้ากันเติมน้ำแข็งตามด้วยราดฟองนม', 1),
(29, 'กาแฟมะนาวน้ำผึ้ง', 2, 79, 'กาแฟมะนาวน้ำผึ้ง_438662.png', 'เย็น', 'น้ำผึ้ง 40 ml --> น้ำมะนาว 25 ml --> น้ำเปล่า 120 ml --> คนให้เข้ากันเติมน้ำแข็ง ราดด้วยกาแฟ 1 ชอต ( 70 ml. )', 0),
(30, 'คาปูซิโน่', 2, 60, 'คาปูซิโน่_738136.png', 'เย็น', '', 0),
(31, 'คาราเมลมัคคิอาโต้', 2, 79, 'คาราเมลมัคคิอาโต้_690991.png', 'เย็น', '', 0),
(32, 'มอคค่า', 2, 60, 'มอคค่า_269506.png', 'เย็น', '', 0),
(33, 'ลาเต้', 2, 75, 'ลาเต้_808809.png', 'เย็น', '', 0),
(34, 'อเมริกาโน่', 2, 75, 'อเมริกาโน่_598550.png', 'เย็น', 'สกัดกาแฟ 1 ช็อต >> น้ำเย็น 120 ml.>> เต็มน้ำแข็งให้เต็ม', 0),
(35, 'เสาวรสโซดา', 5, 69, 'เสาวรสโซดา_824567.png', 'เย็น', 'ไซรัปเสาวรส 60 ml.>>เมล็ดเสาวรส 1 ช้อน>>ใส่น้ำแข็ง>>เทโซดาให้เต็ม', 0),
(36, 'ชาดำ', 1, 50, 'ชาดำ_494184.png', 'เย็น', 'สกัดชาไทย 120 ml.>>น้ำเชื่อม 70 ml.>>ใส่น้ำแข็งให้เต็ม', 0),
(37, 'น้ำแดงโซดา', 5, 69, 'น้ำแดงโซดา_506139.png', 'เย็น', 'เฮลลูบอล 60 ml.>>เติมน้ำแข็งให้เต็ม>> เติมโซดาให้เต็มแก้ว', 0),
(38, 'น้ำผึ้งมะนาวโซดา', 5, 69, 'น้ำผึ้งมะนาวโซดา_498135.png', 'เย็น', 'น้ำผึ้ง 40 ml.>>น้ำมะนาว 25 ml.>>เติมน้ำแข็งให้เต็ม>> เติมโซดาให้เต็มแก้วท็อปด้วยมะนาวหั่นแว่น', 0),
(39, 'พีชโซดา', 5, 69, 'พีชโซดา_607730.png', 'เย็น', 'ไซรัปพีช 60 ml.>>เติมน้ำแข็งให้เต็ม>> เติมโซดาให้เต็มแก้ว', 0),
(40, 'มิกซ์เบอร์รี่โซดา', 5, 69, 'มิกซ์เบอร์รี่โซดา_375937.png', 'เย็น', 'ไซรัปมิกเบอร์รี่ 60 ml.>>เติมน้ำแข็งให้เต็ม>> เติมโซดาให้เต็มแก้ว', 0),
(41, 'ราสเบอร์รี่โซดา', 5, 69, 'ราสเบอร์รี่โซดา_822709.png', 'เย็น', 'ไซรัปราสเบอร์รี่ 60 ml.>>เติมน้ำแข็งให้เต็ม>> เติมโซดาให้เต็มแก้ว', 0),
(42, 'สตอเบอร์รี่โซดา', 5, 69, 'สตอเบอร์รี่โซดา_496820.png', 'เย็น', 'ไซรัปสตอเบอร์รี่ 60 ml.>>เติมน้ำแข็งให้เต็ม>> เติมโซดาให้เต็มแก้ว', 0),
(43, 'นมชมพู', 1, 55, 'นมชมพู_528738.png', 'เย็น', 'เฮลลูบอล 40 ml.>>นมเมจิ 120 ml.>>นมข้นหวาน 20 ml.>>นมจืด 40 ml.>>คนให้เข้ากันใส่น้ำแข็งให้เต็ม', 0),
(44, 'โกโก้', 1, 85, 'โกโก้_693253.png', 'เย็น', 'โกโก้ 15 ml.>> นมข้นหวาน 20 ml.>> นมจืด 50 ml.>> ใช้เครืองตีฟองตีให้แตก >> ใส่นมเมจิ 90 แล้วใส่น้ำแข็งให้เต็ม', 0),
(45, 'ชาเขียว', 1, 55, 'ชาเขียว_413400.png', 'เย็น', 'สกัดชา 100 ml.>> คอฟฟี่เมต 2 ช้อน >>นมข้นหวาน 30 ml.>> นมจืด 40 ml.', 0),
(46, 'ชาเขียวมะนาว', 1, 55, 'ชาเขียวมะนาว_650886.png', 'เย็น', 'สกัดชาเขียว 100 ml.>> น้ำมะนาว 25 ml.>> น้ำเชื่อมมิตรผล 70 ml.>> ใส่น้ำแข็งให้เต็ม', 0),
(47, 'ชาไทย', 1, 50, 'ชาไทย_826035.png', 'เย็น', 'สกัดชาไทย 100 ml.>>คอฟฟี่เมต 2 ช้อน >>นมข้นหวาน 30 ml.>> นมข้นจืด 4 ml.', 0),
(48, 'ชามะนาว', 1, 50, 'ชามะนาว_364079.png', 'เย็น', 'สกัดชาไทย 120 ml.>>น้ำเชื่อมมิตรผล 70 ml.>> น้ำมะนาว 2 ml.', 0),
(49, 'นมสดคาราเมล', 1, 60, 'นมสดคาราเมล_648650.png', 'เย็น', '', 0),
(50, 'นมสดวนิลา', 1, 60, 'นมสดวนิลา_286066.png', 'เย็น', '', 0),
(51, 'มัทฉะกรีนที', 1, 60, 'มัทฉะกรีนที_304005.png', 'เย็น', '', 0),
(53, 'กาแฟ', 2, 60, 'กาแฟ_244201.png', 'เย็น', '', 0),
(62, 'เอสเปรสโซ่', 2, 60, 'เอสเปรสโซ่_606990.jpg', 'เย็น', '-กาแฟ 1 ชอต (70 ml.)\r\n-นมเมจิ 120 ml.\r\n-นมจืด 30 ml.\r\n-นมข้นหวาน 30 ml.\r\nคนให้เข้ากันเติมน้ำแข็งตามด้วยราดฟองนม', 1),
(63, 'โค้กกระป๋อง', 7, 25, 'โค้กกระป๋อง_801078.jpeg', 'เย็น', '-', 1),
(64, 'คาปูซิโน่', 2, 50, 'คาปูซิโน่_305908.jpg', 'ร้อน', 'กาแฟ 1 ชอต >>นมสดสตรีมร้อน 1 ส่วน >> ราดด้วยฟองนมและโรยเมล็ดกาแฟบด', 0),
(65, 'เอสเปรสโซ่', 2, 45, 'เอสเปรสโซ่_447410.jpg', 'ร้อน', 'กาแฟ 1 ชอต>>น้ำเชื่อม 15  ml. >> น้ำเปล่า 45 ml.', 0),
(66, 'อเมริกาโน่', 2, 45, 'อเมริกาโน่_645402.jpg', 'ร้อน', 'น้ำร้อน 120 ml. >> กาแฟ 1 ชอต', 0),
(67, 'ชาเขียวร้อน', 1, 50, 'ชาเขียวร้อน_538334.jpg', 'ร้อน', 'สกัดชาเขียว 70 ml. >> นมสดสตรีมร้อน 1 ส่วน >> นมข้นหวาน 20 ml. ', 0),
(68, 'ชามะนาว', 1, 45, 'ชามะนาว_614822.jpg', 'ร้อน', 'สกัดชาไทย 100 ml. >> น้ำเชื่อมมิตรผล 50 ml. >> น้ำมะนาว 25 ml. คนให้เข้ากันตามด้วยท็อปมะนาวหั่นแว่น ', 0),
(69, 'โกโก้', 7, 89, 'โกโก้_713064.jpg', 'ปั่น', 'ผงโกโก้ 15 ml.>>น้ำร้อน 55 ml.>>นมข้น 70 ml>>นมจืด 50 ml>>นมเมจิ 90 ml.>> คนให้เข้ากันเทลงโถปั่นพร้อมน้ำแข็ง 1 แก้ว', 1),
(70, 'นมสดคาราเมล', 7, 70, 'นมสดคาราเมล_846420.jpg', 'ปั่น', 'คาราเมล 50 ml.>>นมเมจิ 120 ml.>> นมข้นหวาน 70 ml.>>นมจืด 50 ml.>>คนให้เข้ากันเทลงโถปั่นพร้อมน้ำแข็ง 1 แก้ว', 1),
(71, 'ชาเขียว', 7, 70, 'ชาเขียว_840143.jpg', 'ปั่น', 'สกัดชาเขียว 100 ml>>คอฟฟี่เมต 2 ช้อนตวง >>นมข้นหวาน 70 ml.>>นมข้นจืด 40 ml.>>คนให้เข้ากันเทลงโถปั่นพร้อมน้ำแข็ง 1 แก้ว', 1),
(72, 'นมสดวนิลา', 7, 70, 'นมสดวนิลา_642993.jpg', 'ปั่น', 'วนิลา 50 ml.>>นมเมจิ 120 ml.>> นมข้นหวาน 70 ml.>>นมจืด 50 ml.>>คนให้เข้ากันเทลงโถปั่นพร้อมน้ำแข็ง 1 แก้ว', 1),
(74, 'ชาเขียว', 1, 70, 'ชาเขียว_677641.jpg', 'ปั่น', '-', 0),
(75, 'นมสดวนิลา', 7, 70, 'นมสดวนิลา_339902.jpg', 'ปั่น', '-', 0),
(76, 'โกโก้', 7, 80, 'โกโก้_845453.jpg', 'ปั่น', '-', 0),
(77, 'นมสดคาราเมล', 7, 70, 'นมสดคาราเมล_118684.jpg', 'ปั่น', '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_addons`
--

CREATE TABLE `menu_addons` (
  `addons_id` int(11) NOT NULL,
  `addons_name` varchar(200) NOT NULL,
  `addons_price` int(11) NOT NULL,
  `addons_type` varchar(100) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_addons`
--

INSERT INTO `menu_addons` (`addons_id`, `addons_name`, `addons_price`, `addons_type`, `menu_id`) VALUES
(5, 'เพิ่มอเมริกาโน่ 1 ซ็อต', 10, 'เพิ่มช็อต', 21),
(6, 'เพิ่มอเมริกาโน่ 2 ซ็อต', 20, 'เพิ่มช็อต', 21),
(7, 'ไข่มุก', 20, 'ทอปปิ้ง', 21),
(8, 'ไข่มุก', 20, 'ทอปปิ้ง', 22),
(9, 'เพิ่มโอวัลติน 1 ช้อน', 30, 'เพิ่มช็อต', 22),
(10, 'ไข่มุก', 80, 'ทอปปิ้ง', 23),
(11, 'เพิ่มอเมริกาโน่ 1 ซ็อต', 20, 'เพิ่มช็อต', 23),
(12, 'ชอตกาแฟ', 20, 'เพิ่มช็อต', 24),
(13, 'ชอตกาแฟ', 20, 'เพิ่มช็อต', 26),
(14, 'ช็อตกาแฟ', 20, 'เพิ่มช็อต', 27),
(15, 'ช็อตกาแฟ', 20, 'เพิ่มช็อต', 28),
(16, 'ช็อตกาแฟ', 20, 'เพิ่มช็อต', 29),
(17, 'ช็อตกาแฟ', 20, 'เพิ่มช็อต', 30),
(18, 'ช็อตกาแฟ', 20, 'เพิ่มช็อต', 31),
(19, 'ช็อตกาแฟ', 20, 'เพิ่มช็อต', 32),
(20, 'ช็อตกาแฟ', 20, 'เพิ่มช็อต', 33),
(21, 'ช็อตกาแฟ', 20, 'เพิ่มช็อต', 34),
(22, 'ไข่มุก', 20, 'ทอปปิ้ง', 43),
(23, 'ไข่มุก', 20, 'ทอปปิ้ง', 44),
(24, 'ไข่มุก', 20, 'ทอปปิ้ง', 45),
(25, 'ไข่มุก', 20, 'ทอปปิ้ง', 46),
(26, 'ไข่มุก', 20, 'ทอปปิ้ง', 47),
(27, 'ไข่มุก', 20, 'ทอปปิ้ง', 48),
(28, 'ไข่มุก', 20, 'ทอปปิ้ง', 49),
(29, 'ไข่มุก', 20, 'ทอปปิ้ง', 50),
(30, 'ไข่มุก', 20, 'ทอปปิ้ง', 51),
(31, 'ช็อตกาแฟ', 20, 'เพิ่มช็อต', 52),
(32, 'ช็อตกาแฟ', 20, 'เพิ่มช็อต', 53),
(35, 'tes', 16, 'ทอปปิ้ง', 58);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`type_id`, `type_name`) VALUES
(1, 'ชา'),
(2, 'กาแฟ'),
(3, 'เค้ก'),
(4, 'ขนม'),
(5, 'โซดา'),
(7, 'เครื่องดื่ม');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_slip` varchar(100) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(200) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_price`, `order_slip`, `order_date`, `order_status`, `discount`) VALUES
(89, 9, 124, '89_337821.png', '2024-03-13 15:05:15', 'success', 30),
(90, 9, 112, '90_925748.jpeg', '2024-03-13 18:32:57', 'success', 27),
(91, 16, 139, NULL, '2024-03-14 11:04:30', 'cancel', 0),
(92, 18, 135, '92_651482.jpeg', '2024-03-14 12:18:14', 'success', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_detail_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `cart_id`, `order_id`, `order_detail_price`) VALUES
(135, 295, 89, 75),
(136, 296, 89, 79),
(137, 297, 90, 60),
(138, 298, 90, 79),
(139, 299, 91, 79),
(140, 300, 91, 60),
(141, 301, 92, 60),
(142, 302, 92, 75);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `pt_id` int(11) NOT NULL,
  `pt_name` varchar(200) NOT NULL,
  `pt_discount` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `pt_image` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `item_min` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`pt_id`, `pt_name`, `pt_discount`, `date_start`, `date_end`, `pt_image`, `status`, `item_min`) VALUES
(12, '1ฟรี1', 50, '2024-03-13', '2024-03-13', 'promotion__784039797014.jpg', 0, 2),
(13, '1ฟรี1', 50, '2024-03-13', '2024-03-13', 'promotion__315850633531.jpg', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `raw_material_id` int(11) NOT NULL,
  `raw_material_name` varchar(200) NOT NULL,
  `raw_material_price` int(11) NOT NULL,
  `raw_material_amount` int(11) NOT NULL,
  `raw_material_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`raw_material_id`, `raw_material_name`, `raw_material_price`, `raw_material_amount`, `raw_material_date`, `user`) VALUES
(1, 'น้ำตาลทราย', 60, 35, '2024-01-08 14:08:48', ''),
(2, 'นมข้นหวาน', 80, 15, '2024-03-13 08:40:28', 'พรรณิภา'),
(3, 'นมเมจิ', 50, 5, '2024-03-13 08:53:31', 'พรรณิภา');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_log`
--

CREATE TABLE `raw_material_log` (
  `rml_id` int(11) NOT NULL,
  `rml_amount` int(11) NOT NULL,
  `rml_type` varchar(10) NOT NULL,
  `rml_date` datetime NOT NULL DEFAULT current_timestamp(),
  `raw_material_id` int(11) NOT NULL,
  `rml_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_material_log`
--

INSERT INTO `raw_material_log` (`rml_id`, `rml_amount`, `rml_type`, `rml_date`, `raw_material_id`, `rml_price`) VALUES
(10, 5, 'นำออก', '2024-03-07 02:10:00', 1, 300),
(11, 9, 'นำเข้า', '2024-03-07 03:16:46', 1, 540),
(12, 3, 'นำเข้า', '2024-03-07 03:17:01', 1, 180),
(13, 10, 'นำเข้า', '2024-03-13 15:40:44', 2, 800),
(14, 5, 'นำเข้า', '2024-03-13 15:53:39', 3, 250);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` varchar(10) NOT NULL,
  `user_tel` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `user_name`, `password`, `user_role`, `user_tel`, `name`) VALUES
(4, 'test', '', '098f6bcd4621d373cade4e832627b4f6', 'user', '', ''),
(5, 'admin@admin.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', '2565436354', ''),
(6, '0878478273', '', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', ''),
(7, 'testt', '', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', ''),
(8, 'asdfasd', '', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', ''),
(9, 'tests@tests.com', 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', ''),
(10, 'tests1@tests.com', 'น้ำ', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', ''),
(11, 'gg@gg.com', 'gg', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'adsfads', ''),
(12, 'tt@tt.com', 'tt', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', 'tt'),
(13, 'yy@yy.com', 'yy', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '46346326', 'yy'),
(14, 'uu@uu.com', 'uu', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '3252345', 'uu'),
(15, 'kk@kk.com', 'kk', '81dc9bdb52d04dc20036dbd8313ed055', 'employee', '54335', 'kk'),
(16, 'rat@kkumail.com', 'aaa', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '0985421698', 'aaa'),
(17, 'Nam@gmail.com', 'Nam', '9c1086f9e7a4c4c055c50295c6942824', 'user', '0996240347', 'Pannipa Thammal'),
(18, 'fallon1211@gmail.com', 'Fallon', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '0999290521', 'Fallon carrington');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cart_sp`
--
ALTER TABLE `cart_sp`
  ADD PRIMARY KEY (`cartSp_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_addons`
--
ALTER TABLE `menu_addons`
  ADD PRIMARY KEY (`addons_id`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`raw_material_id`);

--
-- Indexes for table `raw_material_log`
--
ALTER TABLE `raw_material_log`
  ADD PRIMARY KEY (`rml_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `cart_sp`
--
ALTER TABLE `cart_sp`
  MODIFY `cartSp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `menu_addons`
--
ALTER TABLE `menu_addons`
  MODIFY `addons_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `raw_material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `raw_material_log`
--
ALTER TABLE `raw_material_log`
  MODIFY `rml_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
