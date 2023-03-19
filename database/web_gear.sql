-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 19, 2023 lúc 08:19 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_gear`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(0, 'hoangadmin', '25f9e794323b453885f5181f1b624d0b', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `id` int(11) NOT NULL,
  `tenbaiviet` varchar(200) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `noidung` longtext NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`id`, `tenbaiviet`, `tomtat`, `noidung`, `id_danhmuc`, `tinhtrang`, `hinhanh`) VALUES
(7, 'tin ngày mai', 'ádasdasd', 'àasfsadassad', 4, 1, '1677264383_screenshot_1672161374.png'),
(8, 'tin hot  trong ngày', 'dddd', 'dd', 2, 1, '1677264394_screenshot_1676187198.png'),
(9, 'tin ngày mốt', 'ádsadasdas', 'đâsdasdsad', 3, 1, '1677264980_WIN_20210315_13_08_16_Pro.jpg'),
(13, 'tin ngày mai 3', '<p>Sau đ&oacute;, phim đặt điểm nh&igrave;n v&agrave;o Joel v&agrave; con g&aacute;i Sarah (Nico Parker). Cả hai sống hạnh ph&uacute;c c&ugrave;ng Tommy (Gabriel Luna)</p>\r\n', '<p>Nội t&acirc;m cũng như mối quan hệ giữa c&aacute;c nh&acirc;n vật được khai th&aacute;c s&acirc;u, mỗi tuyến truyện đều tạo n&ecirc;n m&agrave;u sắc ri&ecirc;ng. Qua từng tập phim, l&yacute; tưởng v&agrave; mục đ&iacute;ch của mỗi người dần được b&oacute;c t&aacute;ch, g&oacute;p phần thổi hồn v&agrave;o ch&acirc;n dung nh&acirc;n vật. Trong đ&oacute;, c&acirc;u chuyện của Joel v&agrave; Ellie l&agrave; trung t&acirc;m.</p>\r\n\r\n<p>Niềm hạnh ph&uacute;c của Joel biến mất kể từ ng&agrave;y con g&aacute;i chết trong v&ograve;ng tay anh. Nhiều năm sau bi kịch, anh trở th&agrave;nh tay bu&ocirc;n lậu lạnh l&ugrave;ng v&agrave; t&agrave;n nhẫn. Lần đầu gặp Ellie, Joel chỉ coi c&ocirc; b&eacute; như một m&oacute;n h&agrave;ng. C&ugrave;ng nhau trải qua nhiều thăng trầm, mối quan hệ của họ dần thay đổi v&agrave; khăng kh&iacute;t.</p>\r\n\r\n<p>Từ hai người xa lạ đồng h&agrave;nh để thực hiện nhiệm vụ, giờ đ&acirc;y Joel v&agrave; Ellie bảo vệ, y&ecirc;u thương nhau như cha con. Ở cạnh Ellie, Joel mới c&oacute; thể nở nụ cười m&agrave; anh đ&atilde; đ&aacute;nh mất suốt bao năm. C&ocirc; b&eacute; gi&uacute;p Joel t&igrave;m thấy &yacute; nghĩa sống, khiến anh c&oacute; thể cảm nhận lại những cảm x&uacute;c tươi đẹp.</p>\r\n', 4, 1, '1677526697_The-Last-of-Us.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_date` varchar(50) NOT NULL,
  `cart_payment` varchar(200) NOT NULL,
  `cart_shipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_date`, `cart_payment`, `cart_shipping`) VALUES
(26, 14, '4997', 1, '2023-03-19 03:30:01', 'tien mat', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(47, '9475', 6, 4),
(48, '9475', 5, 2),
(49, '4997', 6, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(200) NOT NULL,
  `dienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(3, 'Thanh Hoàng', 'hoangv12@gmail.com', '111 Hoàng Hoa Thấm', '629e8d70e993322601ea565b7cfb4d0c', '0121243432'),
(9, 'Thanh Huy', 'huy111@gmail.com', '12 Lê Văn Sỹ', '629e8d70e993322601ea565b7cfb4d0c', '0123123213'),
(10, '', 'hoangadmin', '', '629e8d70e993322601ea565b7cfb4d0c', ''),
(11, '', 'hoangadmin', '', '629e8d70e993322601ea565b7cfb4d0c', ''),
(12, '', 'hoangadmin', '', '629e8d70e993322601ea565b7cfb4d0c', ''),
(13, 'Trần Thu Trang', 'trang1@gmail.com', '12 Đường 17C ', '629e8d70e993322601ea565b7cfb4d0c', '012121212'),
(14, 'Trần Nguyên Bảo Khánh', 'khanh1@gmail.com', '111 Đường số 25', '629e8d70e993322601ea565b7cfb4d0c', '01212333354'),
(15, 'Khánh', 'khanh2@gmail.com', '12 Lê Văn Sỹ', '629e8d70e993322601ea565b7cfb4d0c', '01231232133'),
(16, 'Khánh', 'khanh2@gmail.com', '12 Lê Văn Sỹ', '629e8d70e993322601ea565b7cfb4d0c', '01231232133'),
(17, 'Hoàng Huy Trần', 'huy111@gmail.com', 'Lê Đình Cẩn', '629e8d70e993322601ea565b7cfb4d0c', '03343322'),
(18, 'tài', 'tai2@gmail.com', 'Lê Đình Cẩn', '629e8d70e993322601ea565b7cfb4d0c', '01231232133'),
(19, 'Khánh Trần', 'khanh33@gmail.com', 'Biên Hòa', '629e8d70e993322601ea565b7cfb4d0c', '06958473565');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(1, 'Tai Nghe', 1),
(3, 'Màn Hình', 3),
(4, 'Test', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmucbaiviet`
--

CREATE TABLE `tbl_danhmucbaiviet` (
  `id_baiviet` int(11) NOT NULL,
  `tendanhmucbaiviet` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmucbaiviet`
--

INSERT INTO `tbl_danhmucbaiviet` (`id_baiviet`, `tendanhmucbaiviet`, `thutu`) VALUES
(2, 'tin mới mua', 2),
(3, 'tin game', 2),
(4, 'tin nóng bỏng', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `tomtat` tinytext NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) VALUES
(1, 'Head Phone 2', '1', '3000000', 1, '1676788112_tainghe2.png', '111', '111', 1, 1),
(2, 'Head Phone', '12', '11111111', 1, '1676788086_Tai Nghe 1.jpg', '111', '1111', 1, 1),
(3, 'Màn Hình 1', '12', '3000000', 1, '1676749293_Tai Nghe 1.jpg', '2342134', '234234', 1, 3),
(4, 'Màn Hình Dell', '112', '111111111', 1, '1676797696_tainghe2.png', 'sss', 'sssss', 1, 3),
(5, 'Head Phone 3', '111', '324234324', 1, '1676798001_tainghe2.png', 'drfdsrfdsw', 'ểwrwer', 1, 1),
(6, 'Head Phone 4', '113', '3000000', 1, '1676798027_Tai Nghe 1.jpg', '<p>Logitech G735 với phối m&agrave;u Off White được đ&aacute;nh gi&aacute; l&agrave; d&ograve;ng sản phẩm nổi bật nhất trong bộ sưu tập Aurora từ nh&agrave; Logitech. Với t&ocirc;ng m&agrave;u nhẹ nh&agrave;ng kết hợp v&l', '<p>Kh&ocirc;ng thể phủ nhận được sự cuốn h&uacute;t từ c&aacute;c d&ograve;ng sản phẩm từ&nbsp;<a href=\"https://gearvn.com/collections/ban-phim-may-tinh\" target=\"_blank\">b&agrave;n ph&iacute;m</a>,&nbsp;<a href=\"https://gearvn.com/pages/chuot-may-tinh\" target=\"_blank\">chuột m&aacute;y t&iacute;nh</a>&nbsp;v&agrave; cả tai nghe trong bộ sưu tập Aurora. Người chơi ho&agrave;n to&agrave;n c&oacute; thể cảm nhận điều đ&oacute; qua tai nghe Logitech G735 Off White.&nbsp;Với t&ocirc;ng m&agrave;u trắng chủ đạo kết hợp với hệ thống LED RGB độc đ&aacute;o tăng th&ecirc;m phần độc đ&aacute;o v&agrave; ấn tượng. Logitech đ&atilde; mang n&acirc;ng tầm thiết kế v&agrave; m&agrave;u sắc của c&aacute;c thiết bị&nbsp;<a href=\"https://gearvn.com/collections/gaming-gear\" target=\"_blank\">Gaming Gear</a>&nbsp;l&ecirc;n một tầm cao mới, thay v&igrave; phải sở hữu thiết kế hầm hố c&aacute;c d&ograve;ng sản phẩm Logitech Aurora lại mang tr&ecirc;n m&igrave;nh thiết kế v&ocirc; c&ugrave;ng mềm mại v&agrave; ngọt ng&agrave;o.&nbsp;<img alt=\"\" src=\"https://file.hstatic.net/1000026716/file/gearvn-tai-nghe-logitech-g735-off-white_477cf83977ae4f83bcdc349a5741bbdb_grande.png\" style=\"height:100px; width:100px\" /></p>\r\n', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(255) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `name`, `phone`, `address`, `note`, `id_dangky`) VALUES
(2, 'Lý Thanh Hoàng', '02342342', '117 Đường 17A', 'giao nhanh giúp', 13),
(3, 'Lý Thanh Hoàng', '02342342', '117 Đường 17A', 'giao nhanh giúp', 13),
(4, 'Trần Nguyên Bảo Khánh', '0121233322', '111 Đường Số 25', 'giao nhanh giúp nha', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydat` varchar(30) NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(100) NOT NULL,
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban`) VALUES
(14, '2023-03-17', 1, '3000000', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_danhmucbaiviet`
--
ALTER TABLE `tbl_danhmucbaiviet`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmucbaiviet`
--
ALTER TABLE `tbl_danhmucbaiviet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
