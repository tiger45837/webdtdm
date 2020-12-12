-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 04:18 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `level` tinyint(4) DEFAULT 1,
  `avatar` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Thai Van Duc', 'Da Nang', 'ongcunonc249@gmail.com', '202cb962ac59075b964b07152d234b70', '0394253841', 1, 1, NULL, '2019-12-20 13:01:15', '2019-12-20 13:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Áo', 'ao', NULL, NULL, 1, 1, '2019-12-20 13:07:20', '2019-12-20 13:07:20'),
(2, 'Quần', 'quan', NULL, NULL, 1, 1, '2019-12-20 13:07:21', '2019-12-20 13:07:21'),
(3, 'Giày', 'giay', NULL, NULL, 1, 1, '2019-12-20 13:07:22', '2019-12-20 13:07:22'),
(4, 'Túi', 'tui', NULL, NULL, 1, 1, '2019-11-13 07:34:42', '2019-11-13 07:34:42'),
(5, 'Váy', 'vay', NULL, NULL, 1, 1, '2019-11-13 07:34:43', '2019-11-13 07:34:43'),
(6, 'Phụ kiện khác', 'phu-kien-khac', NULL, NULL, 1, 1, '2019-11-13 07:34:43', '2019-11-13 07:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `content`) VALUES
(1, 'Thành', '1123123@gmail.com', 'chan 					\r\n            				'),
(2, 'Tuấn', 'tuan160498@gmail.com', 'WEb bán hàng chất lượng quá             				'),
(3, 'name', 'ngochuan199@gmail.com', '          lkkk  				');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 32, 3, 855000, NULL, NULL),
(2, 3, 0, 2, 0, NULL, NULL),
(3, 3, 34, 14, 899999, NULL, NULL),
(4, 3, 39, 1, 599999, NULL, NULL),
(5, 3, 38, 1, 475000, NULL, NULL),
(6, 3, 36, 1, 599999, NULL, NULL),
(7, 4, 34, 1, 899999, NULL, NULL),
(8, 4, 33, 1, 480000, NULL, NULL),
(9, 4, 32, 2, 855000, NULL, NULL),
(10, 5, 39, 1, 599999, NULL, NULL),
(11, 6, 59, 1, 475000, '2019-12-20 23:00:42', '2019-12-20 23:00:42'),
(12, 7, 59, 1, 475000, '2019-12-20 23:03:13', '2019-12-20 23:03:13'),
(13, 8, 56, 1, 1235000, '2019-12-20 23:10:07', '2019-12-20 23:10:07'),
(14, 9, 69, 1, 319200, '2019-12-20 23:10:27', '2019-12-20 23:10:27'),
(15, 10, 59, 1, 475000, '2019-12-25 03:54:49', '2019-12-25 03:54:49'),
(16, 11, 56, 1, 1235000, '2019-12-25 03:55:03', '2019-12-25 03:55:03'),
(17, 12, 48, 1, 380000, '2019-12-25 03:55:30', '2019-12-25 03:55:30'),
(18, 13, 69, 1, 319200, '2019-12-25 03:56:06', '2019-12-25 03:56:06'),
(19, 14, 49, 1, 405000, '2019-12-25 03:58:09', '2019-12-25 03:58:09'),
(20, 15, 65, 1, 147500, '2019-12-25 03:58:35', '2019-12-25 03:58:35'),
(21, 16, 75, 1, 470250, '2019-12-25 07:24:17', '2019-12-25 07:24:17'),
(22, 16, 50, 1, 475000, '2019-12-25 07:24:17', '2019-12-25 07:24:17'),
(23, 17, 48, 1, 380000, '2019-12-25 07:25:03', '2019-12-25 07:25:03'),
(24, 18, 49, 1, 405000, '2019-12-25 07:26:06', '2019-12-25 07:26:06'),
(25, 19, 50, 2, 475000, '2019-12-25 10:33:54', '2019-12-25 10:33:54'),
(26, 20, 69, 1, 319200, '2019-12-25 11:36:02', '2019-12-25 11:36:02'),
(27, 21, 75, 1, 445500, '2019-12-25 11:37:46', '2019-12-25 11:37:46'),
(28, 22, 75, 1, 445500, '2019-12-25 11:39:17', '2019-12-25 11:39:17'),
(29, 23, 75, 19, 445500, '2019-12-25 11:39:57', '2019-12-25 11:39:57'),
(30, 24, 75, 1, 445500, '2019-12-25 11:40:24', '2019-12-25 11:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT 0,
  `thunbar` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 0,
  `head` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `hot` tinyint(4) DEFAULT 0,
  `pay` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `category_id`, `content`, `number`, `head`, `view`, `hot`, `pay`, `status`, `created_at`, `updated_at`) VALUES
(48, 'ÁO SƠ MI THÔ TRẮNG CỔ BẺ', 'ao-so-mi-tho-trang-co-be', 400000, 5, '12.13-555x710.jpg', 1, 'ÁO SƠ MI NỮ ĐẸP 2019 KIỂU CÔNG SỞ HÀN QUỐC\r\nÁo sơ mi thô trắng cổ bẻ 2 túi trước ngực', 199, 0, 0, 0, 1, 1, '2019-12-25 04:14:02', '2019-12-20 20:48:21'),
(49, 'ÁO REN HOA TRẮNG DÀI TAY THẮT NƠ CỔ', 'ao-ren-hoa-trang-dai-tay-that-no-co', 450000, 10, '8.11-1-555x710.jpg', 1, 'ÁO SƠ MI NỮ ĐẸP 2019 KIỂU CÔNG SỞ HÀN QUỐC\r\nÁo ren hoa trắng dài tay thắt nơ cổ\r\n\r\nFree size cho Vòng 1 dưới 92cm', 99, 0, 0, 0, 1, 1, '2019-12-25 04:14:01', '2019-12-20 20:51:18'),
(50, 'ÁO SƠ MI SỌC KẺ DỌC DÁNG DÀI', 'ao-so-mi-soc-ke-doc-dang-dai', 500000, 5, '11.9-555x710.jpg', 1, 'ÁO SƠ MI NỮ ĐẸP 2019 KIỂU CÔNG SỞ HÀN QUỐC\r\nÁo sơ mi sọc kẻ dọc dáng dài HQ dạo phố cá tính', 147, 0, 0, 0, 2, 1, '2019-12-25 11:32:04', '2019-12-20 20:54:20'),
(51, 'ÁO SƠ MI CHIFFON THÊU CÂY DỪA CỔ VEST BẺ', 'ao-so-mi-chiffon-theu-cay-dua-co-vest-be', 400000, 10, '10.3-555x710.jpg', 1, 'ÁO SƠ MI NỮ ĐẸP 2019 KIỂU CÔNG SỞ HÀN QUỐC\r\nÁo sơ mi chiffon thêu cây dừa cổ vest bẻ', 180, 0, 0, 0, 0, 1, '2019-12-20 20:58:27', '2019-12-20 20:58:27'),
(54, 'ÁO KHOÁC DẠ SỌC VẰN XƯƠNG CÁ', 'ao-khoac-da-soc-van-xuong-ca', 1700000, 5, '25.2-555x710.jpg', 1, 'SHOP ÁO KHOÁC NỮ Ở ĐÀ NẴNG - ÁO KHOÁC PHAO NỮ KIỂU HÀN QUỐC\r\nÁo khoác dạ sọc vằn xương cá cổ 2 ve 2 túi HQ', 45, 0, 0, 0, 0, 1, '2019-12-20 21:07:11', '2019-12-20 21:07:11'),
(55, 'ÁO KHOÁC DẠ HÀN QUỐC THÂN DÀI DÀY', 'ao-khoac-da-han-quoc-than-dai-day', 1800000, 5, '21.5-555x643.jpg', 1, 'SHOP ÁO KHOÁC NỮ Ở ĐÀ NẴNG - ÁO KHOÁC PHAO NỮ KIỂU HÀN QUỐC\r\nÁo khoác dạ Hàn Quốc thân dài dày cổ bẻ', 35, 0, 0, 0, 0, 1, '2019-12-20 21:10:37', '2019-12-20 21:10:37'),
(56, 'ÁO KHOÁC DẠ SỌC KẺ CỔ BẺ LÓT LÔNG THỎ', 'ao-khoac-da-soc-ke-co-be-lot-long-tho', 1300000, 5, '13.15.jpg', 1, 'SHOP ÁO KHOÁC NỮ Ở ĐÀ NẴNG - ÁO KHOÁC PHAO NỮ KIỂU HÀN QUỐC\r\nÁo khoác dạ sọc kẻ cổ bẻ lót lông thỏ mịn ấm áp\r\n\r\nForm áo rộng size S,M tương đương size M,L những sản phẩm khác', 48, 0, 0, 0, 2, 1, '2019-12-25 04:14:04', '2019-12-20 21:12:58'),
(57, 'CHÂN VÁY LEN DỆT KIM DÀI XẺ SAU 2 TÚI', 'chan-vay-len-det-kim-dai-xe-sau-2-tui', 500000, 5, '13.3-555x710.jpg', 5, 'Chân váy len dệt kim dài xẻ sau 2 túi', 300, 0, 0, 0, 0, 1, '2019-12-20 21:14:58', '2019-12-20 21:14:58'),
(58, 'CHÂN VÁY DENIM CHỮ A EO CAO', 'chan-vay-denim-chu-a-eo-cao', 400000, 0, '15.5-2-555x710.jpg', 5, 'Chân váy denim chữ A eo cao, xẻ bên\r\n\r\nSize M : Eo 70cm – Mông 88cm – Dài 62cm\r\nSize L : Eo 74cm – Mông 90cm – Dài 63cm\r\n\r\nShip COD toàn quốc từ 3-4 ngày sau khi hoàn tất đặt hàng\r\nFree ship khi mua từ 2 sản phẩm', 20, 0, 0, 0, 0, 1, '2019-12-20 21:18:41', '2019-12-20 21:18:41'),
(59, 'ÁO LEN DỆT KIM DÁNG THỤNG VẠT SO LE', 'ao-len-det-kim-dang-thung-vat-so-le', 500000, 5, '2.1-555x710.jpg', 1, 'Áo len dệt kim dáng thụng vạt so le cổ lọ cao\r\nShip COD toàn quốc từ 3-4 ngày sau khi hoàn tất đặt hàng', 197, 0, 0, 0, 3, 1, '2019-12-25 04:14:08', '2019-12-20 21:20:29'),
(61, 'Quần âu nam Aristino ATR01808', 'quan-au-nam-aristino-atr01808', 1000000, 5, 'img_6759_ecbdb963860347bbbe44d1c983700aa0_large.jpg', 2, 'Quần âu nam Aristino ATR01808\r\nMã sản phẩm: ATR01808-1\r\nTrạng thái: Còn hàng', 100, 0, 0, 0, 0, 1, '2019-12-20 21:28:36', '2019-12-20 21:28:36'),
(62, 'QUẦN TÂY NAZAFU ĐỎ MẬN QT1133', 'quan-tay-nazafu-do-man-qt1133', 550000, 10, 'quan-tay-xanh-den-1132-10608-slide-products-5c36eab4d21c5.jpg', 2, 'QUẦN TÂY NAZAFU ĐỎ MẬN QT1133\r\nShip COD toàn quốc', 50, 0, 0, 0, 0, 1, '2019-12-20 21:31:35', '2019-12-20 21:31:35'),
(63, 'QUẦN TÂY NAZAFU XÁM MUỐI TIÊU QT1131', 'quan-tay-nazafu-xam-muoi-tieu-qt1131', 550000, 10, 'quan-tay-xam-muoi-tieu-1131-10606-slide-products-5c36e9ef6458b.jpg', 2, 'QUẦN TÂY NAZAFU XÁM MUỐI TIÊU QT1131\r\nCÒN HÀNG\r\nShip COD toàn quốc', 60, 0, 0, 0, 0, 1, '2019-12-20 21:33:08', '2019-12-20 21:33:08'),
(64, 'QUẦN TÂY NAZAFU TRẮNG QT1103', 'quan-tay-nazafu-trang-qt1103', 480000, 5, 'quan-tay-trang-kem-1103-10599-slide-products-5c36e65c8bc97.jpg', 2, 'QUẦN TÂY NAZAFU TRẮNG QT1103\r\nCòn Hàng \r\nShip COD toàn quốc', 49, 0, 0, 0, 0, 1, '2019-12-20 21:35:09', '2019-12-20 21:35:09'),
(65, ' GIÀY THỂ THAO TRẮNG', ' GIÀY THỂ THAO TRẮNG', 295000, 50, 'giay-the-thao-trang-g212-10616-slide-products-5c414108e6313.jpg', 3, 'GIÀY THỂ THAO TRẮNG G212\r\nTrọng lượng S/P: 500 Gram\r\n\r\nDanh mục: Giày Thể Thao', 99, 0, 0, 0, 1, 1, '2019-12-25 04:14:00', '2019-12-20 21:43:07'),
(67, 'SỤC GÓT NƠ VIỀN NU 3107', 'suc-got-no-vien-nu-3107', 250000, 10, 'changeshop (1).jpg', 3, 'SỤC GÓT NƠ VIỀN NU 3107\r\nChất liệu: DA LỘN\r\nMàu sắc: MÀU KEM, MÀU ĐEN', 50, 0, 0, 0, 0, 1, '2019-12-20 21:49:34', '2019-12-20 21:49:34'),
(68, ' SỤC GÓT TRƠN NU 3116', ' SỤC GÓT TRƠN NU 3116', 270000, 10, 'changeshop (2).jpg', 3, 'SỤC GÓT TRƠN MỚI VỀ NU 3116\r\nChất liệu: DA TỔNG HỢP\r\nMàu sắc: MÀU VÀNG, MÀU ĐEN, MÀU KEM', 50, 0, 0, 0, 0, 1, '2019-12-20 21:52:37', '2019-12-20 21:52:09'),
(69, 'Túi đeo chéo mini vương miện Micherr', 'tui-deo-cheo-mini-vuong-mien-micherr', 399000, 20, 'XLBz7jdY.jpg', 4, 'Túi đeo chéo mini Micherr style Âu Mỹ vừa cổ điển, quý phái vừa hiện đại, thanh lịch; mặt túi gắn vương miện hợp kim cao cấp; rất thuận tiện sử dụng khi ra ngoài, dạo chơi, shopping hay tới công sở...', 57, 0, 0, 0, 3, 1, '2019-12-25 11:36:08', '2019-12-20 21:56:54'),
(70, 'Túi crossbody quai xích Kamicy', 'tui-crossbody-quai-xich-kamicy', 1049000, 24, 'mjCx1mo2.jpg', 4, 'Túi crossbody quai xích Kamicy, phong cách Âu Mỹ, thiết kế nhỏ gọn, trẻ trung, có thể cầm tay, đeo chéo; thích hợp sử dụng khi đi làm, đi chơi, dạo phố...', 20, 0, 0, 0, 0, 1, '2019-12-20 21:59:12', '2019-12-20 21:59:12'),
(71, 'Túi xách nữ DooDoo Style Âu Mỹ', 'tui-xach-nu-doodoo-style-au-my', 900000, 20, 'Sp8YTk7q.jpg', 4, 'Túi xách nữ DooDoo Style Âu Mỹ, thiết kế đơn giản mà thanh lịch, tinh tế; dung lượng túi lớn, tính ứng dụng cao; mang đến vẻ đẹp cao quý, sang trọng và quyến rũ của phái đẹp dù xuất hiện ở bất cứ nơi đâu', 34, 0, 0, 0, 0, 1, '2019-12-20 22:01:14', '2019-12-20 22:01:14'),
(72, 'XĂNG ĐAN QUAI ĐAN CAO GÓT', 'xang-dan-quai-dan-cao-got', 590000, 10, '1-182.jpg', 3, 'XĂNG ĐAN QUAI ĐAN CAO GÓT\r\nMÃ: G001\r\nDANH MỤC: GIÀY DÉP', 25, 0, 0, 0, 0, 1, '2019-12-20 22:04:41', '2019-12-20 22:04:41'),
(73, 'ĐẦM ÔM HÀN QUỐC NGỰC NƠ LỆCH VAI QUYẾN RŨ', 'dam-om-han-quoc-nguc-no-lech-vai-quyen-ru', 650000, 0, '11.2-555x710.jpg', 6, 'Đầm ôm Hàn Quốc ngực nơ lệch vai quyến rũ\r\nSize M : Vai 35 – Ngực 84 – Eo 70 – Dài 96\r\nSize L : Vai 36 – Ngực 88 – Eo 74 –  Dài 97', 20, 0, 0, 0, 0, 1, '2019-12-20 22:08:11', '2019-12-20 22:08:11'),
(75, '   KHĂN QUÀNG CỔ DẠ LEN CAO CẤP', '   KHĂN QUÀNG CỔ DẠ LEN CAO CẤP', 495000, 10, '3.7-555x710.jpg', 6, 'KHĂN QUÀNG CỔ DẠ LEN CAO CẤP\r\nDANH MỤC: ÁO LEN THU ĐÔNG', -1, 0, 0, 0, 5, 1, '2019-12-25 11:40:27', '2019-12-20 22:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `note`, `status`, `created_at`, `updated_at`) VALUES
(10, 498750, 7, '', 1, '2019-12-25 03:54:49', '2019-12-25 04:14:08'),
(11, 1296750, 7, '', 1, '2019-12-25 03:55:03', '2019-12-25 04:14:04'),
(12, 399000, 12, '', 1, '2019-12-25 03:55:30', '2019-12-25 04:14:02'),
(13, 335160, 14, '', 1, '2019-12-25 03:56:06', '2019-12-25 04:14:01'),
(14, 425250, 15, '', 1, '2019-12-25 03:58:09', '2019-12-25 04:14:01'),
(15, 154875, 11, '', 1, '2019-12-25 03:58:35', '2019-12-25 04:14:00'),
(16, 992513, 12, '', 1, '2019-12-25 07:24:17', '2019-12-25 07:26:35'),
(19, 997500, 7, '', 1, '2019-12-25 10:33:54', '2019-12-25 11:32:04'),
(20, 335160, 7, '', 1, '2019-12-25 11:36:02', '2019-12-25 11:36:08'),
(21, 467775, 7, '', 1, '2019-12-25 11:37:46', '2019-12-25 11:37:53'),
(22, 467775, 7, '', 1, '2019-12-25 11:39:17', '2019-12-25 11:39:21'),
(23, 8887725, 7, '', 1, '2019-12-25 11:39:57', '2019-12-25 11:40:06'),
(24, 467775, 7, '', 1, '2019-12-25 11:40:24', '2019-12-25 11:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `token` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `avatar`, `status`, `token`, `created_at`, `updated_at`) VALUES
(7, 'Thai Van Duc', 'chuppyychuppyy@gmail.com', '202cb962ac59075b964b07152d234b70', '0394253841', 'da nang', NULL, 1, NULL, '2019-12-20 12:53:18', '2019-12-20 12:53:18'),
(11, 'Vo Ngoc Huan', 'ngochuan1999@gmail.com', '202cb962ac59075b964b07152d234b70', '0392539253', 'Binh Dinh', NULL, 1, NULL, '2019-12-25 03:48:04', '2019-12-25 03:48:04'),
(12, 'Cao Thanh Duy', 'duycao4774@gmail.com', '202cb962ac59075b964b07152d234b70', '0336054774', 'KomTom', NULL, 1, NULL, '2019-12-25 03:49:19', '2019-12-25 03:49:19'),
(14, 'Dang Nguyen Huynh', 'devilzz1999@gmaiil.com', '202cb962ac59075b964b07152d234b70', '0965272988', 'Quang Nam', NULL, 1, NULL, '2019-12-25 03:52:07', '2019-12-25 03:52:07'),
(15, 'Chu Duc Viet', 'ducviet1607@gmail.com', '202cb962ac59075b964b07152d234b70', '0364292255', 'DakLak', NULL, 1, NULL, '2019-12-25 03:57:45', '2019-12-25 03:57:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
