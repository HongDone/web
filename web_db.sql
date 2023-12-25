-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 24, 2023 lúc 12:00 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_email` varchar(100) NOT NULL,
  `ad_password` varchar(100) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_email`, `ad_password`, `fullname`) VALUES
(1, 'admin1', 'admin1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hong Doann12444'),
(2, 'admin2', 'admin2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hong Doanndd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_price` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `bought` int(11) DEFAULT 0,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `email`, `product_id`, `quantity`, `total_price`, `created_at`, `bought`, `order_id`) VALUES
(65, 'nguyenhongdoan3012@gmail.com', 69, 1, 90000, '2023-12-24 14:51:38', 1, 20),
(66, 'nguyenhongdoan3012@gmail.com', 68, 1, 160000, '2023-12-24 14:52:24', 1, 21),
(67, 'nguyenhongdoan3012@gmail.com', 67, 1, 250000, '2023-12-24 14:52:31', 1, 21),
(68, 'nguyenhongdoan3012@gmail.com', 65, 3, 60000, '2023-12-24 14:56:10', 1, 22),
(69, 'nguyenhongdoan3012@gmail.com', 67, 3, 750000, '2023-12-24 14:56:18', 1, 22),
(70, 'nguyenhongdoan3012@gmail.com', 72, 1, 1000000, '2023-12-24 14:57:31', 1, 23),
(71, 'nguyenhongdoan3012@gmail.com', 68, 3, 480000, '2023-12-24 14:59:42', 1, 24),
(72, 'nguyenhongdoan3012@gmail.com', 70, 3, 360000, '2023-12-24 14:59:49', 1, 24),
(73, 'nguyenhongdoan3012@gmail.com', 63, 1, 1000000, '2023-12-24 15:10:15', 1, 25),
(74, 'nguyenhongdoan3012@gmail.com', 68, 1, 160000, '2023-12-24 15:45:57', 1, 26),
(75, 'nguyenhongdoan3012@gmail.com', 70, 1, 120000, '2023-12-24 15:46:03', 1, 26),
(76, 'nguyenhongdoan3012@gmail.com', 69, 1, 90000, '2023-12-24 15:53:54', 1, 27),
(77, 'nguyenhongdoan3012@gmail.com', 65, 1, 20000, '2023-12-24 15:54:41', 1, 28),
(78, 'nguyenhongdoan3012@gmail.com', 71, 1, 190000, '2023-12-24 15:57:16', 1, 29),
(79, 'nguyenhongdoan3012@gmail.com', 70, 1, 120000, '2023-12-24 15:59:34', 1, 29),
(80, 'nguyenhongdoan3012@gmail.com', 72, 1, 1000000, '2023-12-24 16:36:09', 1, 30),
(81, 'nguyenhongdoan3012@gmail.com', 70, 1, 120000, '2023-12-24 17:51:03', 1, 31),
(82, 'nguyenhongdoan3012@gmail.com', 68, 2, 320000, '2023-12-24 17:51:11', 1, 31),
(83, 'nguyenhongdoan3012@gmail.com', 72, 1, 1000000, '2023-12-24 17:54:45', 1, 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Perfume'),
(2, 'Shampo'),
(3, 'Body Mistee'),
(13, 'Serummm'),
(17, 'Toner'),
(18, 'Perfumer'),
(19, 'Healer'),
(20, 'Lipstick');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `deal`
--

CREATE TABLE `deal` (
  `deal_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `deal`
--

INSERT INTO `deal` (`deal_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 22, 1, 1000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(100) NOT NULL DEFAULT 'unpaid',
  `price` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `payment_status`, `price`) VALUES
(1, 'Ngọc', 'user2@gmail.com', '122222', 'long An', '', '2023-12-21 04:37:30', 'paid', 1000),
(24, 'Nguyễn Hồng Đoan', 'nguyenhongdoan3012@gmail.com', '0937102105', 'Phuof2', '', '2023-12-24 08:00:13', 'paid', 840000),
(25, 'Nguyễn Hồng Đoan', 'nguyenhongdoan3012@gmail.com', '0937102105', 'Phuof2', '', '2023-12-24 08:10:19', 'unpaid', 1000000),
(26, 'Nguyễn Hồng Đoan', 'nguyenhongdoan3012@gmail.com', '0937102105', 'Phuof2', '', '2023-12-24 08:46:08', 'unpaid', 280000),
(27, 'Nguyễn Hồng Đoan', 'nguyenhongdoan3012@gmail.com', '0937102105', 'Phuof2', '', '2023-12-24 08:53:59', 'paid', 90000),
(28, 'Nguyễn Hồng Đoan', 'nguyenhongdoan3012@gmail.com', '0937102105', 'Phuof2', '', '2023-12-24 08:54:48', 'paid', 20000),
(29, 'Nguyễn Hồng Đoan', 'nguyenhongdoan3012@gmail.com', '0937102105', 'Phuof2', '', '2023-12-24 08:59:41', 'paid', 310000),
(30, 'Nguyễn Hồng Đoan', 'nguyenhongdoan3012@gmail.com', '0937102105', 'Phuof2', '', '2023-12-24 09:36:14', 'paid', 1000000),
(31, 'Nguyễn Hồng Đoan', 'nguyenhongdoan3012@gmail.com', '0937102105', 'Phuof2', '', '2023-12-24 10:51:17', 'paid', 440000),
(32, 'Nguyễn Hồng Đoan', 'nguyenhongdoan3012@gmail.com', '0937102105', 'Phuof2', '', '2023-12-24 10:57:37', 'paid', 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `title`, `price`, `image`, `description`, `created_at`) VALUES
(22, 13, 'Nuoc hoa 5', 1000, 'CosmeticsBackground.jpeg', '', '2023-12-23 11:05:35'),
(63, 3, 'Nước hoa Pháp', 1000000, 'tải xuống.jpg', 'Thơm ngất ngây', '2023-12-23 13:31:31'),
(65, 2, 'Dầu gội đầu bồ kết', 20000, 'dau-goi-anan.jpg', 'Dưỡng tóc chắc khỏe\r\nThành phần thiên nhiên', '2023-12-23 13:36:06'),
(66, 1, 'Toner 1', 1000000, 'Cosmetics Wallpaper.jpg', 'Siêu mát', '2023-12-23 13:48:58'),
(67, 18, 'Sữa tắm trắng da', 250000, 'sua-tam-kisetsu-co-tot-khong-review-cac-loai-sua-tam-kisetsu-202010031020289027.jpg', 'Dưỡng ẩm siêu tốt', '2023-12-23 15:10:01'),
(68, 1, 'Sữa tắm dưỡng ẩm', 160000, 'tải xuống (1).jpg', '', '2023-12-23 15:11:21'),
(69, 20, 'Son môi đỏ nâu', 90000, 'top-6-mau-son-moi-cu-nhin-la-thay-mua-he-ma-cac-nang-khong-the-bo-lo-202103241447255469.jpg', '', '2023-12-23 15:11:46'),
(70, 2, 'Son môi đỏ cam', 120000, '61_Y_Vy_Dv6rb_L_3a8be3d357.webp', '', '2023-12-23 15:12:04'),
(71, 17, 'Dưỡng da nha đam', 190000, 'Slider Image 3.jpg', '', '2023-12-23 15:12:32'),
(72, 19, 'Tinh dầu nguyên chất', 1000000, 'dau-goi-bo-ket-thao-duoc-dau-goi-bo-ket-co-dac-boboon.jpg', 'Siêu thơm, thích hợp cho da nhạy cảm', '2023-12-23 15:47:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL DEFAULT 'Nothing yet.',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`email`, `fullname`, `phone_number`, `password`, `address`, `created_at`, `is_deleted`) VALUES
('215207299@gm.uit.edu.vn', 'Hồng Đoanneeew', '+8494102654', '827ccb0eea8a706c4c34a16891f84e7b', 'Long An', '2023-12-22 09:27:57', 0),
('minicircuits@gmail.com', 'Offices', '0937102105', '827ccb0eea8a706c4c34a16891f84e7b', 'Nothing yet.', '2023-12-22 09:30:38', 0),
('nguyenhongdoan3012@gmail.com', 'Nguyễn Hồng Đoan', '0937102105', '827ccb0eea8a706c4c34a16891f84e7b', 'Phuof2', '2023-12-22 10:53:21', 0),
('nguyenhongdoan@gmail.com', 'hồngan', '092444223', '12345', 'Nothing yet.', '2023-12-22 04:41:52', 0),
('user05@gmail.com', 'Hong ', '122112', '827ccb0eea8a706c4c34a16891f84e7b', 'Nothing yet.', '2023-12-22 08:15:44', 0),
('user123@gmail.com', 'Hong Ngoc', '0987888888', '12345', 'Nothing yet.', '2023-12-22 07:55:11', 0),
('user2@gmail.com', 'Ngoc', '12345', '827ccb0eea8a706c4c34a16891f84e7b', 'Nothing yet.', '2023-12-22 04:41:52', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `email` (`email`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`deal_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `deal`
--
ALTER TABLE `deal`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Các ràng buộc cho bảng `deal`
--
ALTER TABLE `deal`
  ADD CONSTRAINT `deal_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `deal_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
