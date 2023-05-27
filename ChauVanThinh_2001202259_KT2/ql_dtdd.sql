-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2023 lúc 05:06 AM
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
-- Cơ sở dữ liệu: `ql_dtdd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `MaBanner` int(11) NOT NULL,
  `FileName` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`MaBanner`, `FileName`) VALUES
(1, 'Banner1.jpg'),
(2, 'Banner2.jpg'),
(3, 'Banner3.jpg'),
(4, 'Banner4.jpg'),
(5, 'Banner5.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(300) NOT NULL,
  `Note` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`MaLoai`, `TenLoai`, `Note`) VALUES
(1, 'Nokia', 'DT'),
(2, 'SamSung', 'DT'),
(3, 'Motorola', 'DT'),
(4, 'LG', 'DT'),
(5, 'Oppo', 'DT'),
(6, 'Iphone', 'DT'),
(7, 'BPhone', 'DT'),
(8, 'Dell', 'Lap'),
(9, 'HP', 'Lap'),
(10, 'Asus', 'Lap'),
(11, 'Lenovo', 'Lap'),
(12, 'Apple', 'Lap'),
(13, 'Acer', 'Lap'),
(14, 'Loa', 'PK'),
(15, 'Chuột', 'PK'),
(16, 'Tai Nghe', 'PK'),
(17, 'Thẻ nhớ', 'PK'),
(18, 'Cáp Sạc', 'PK'),
(19, 'Sạc dự phòng', 'PK');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `MLTin` int(11) NOT NULL,
  `TLTin` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`MLTin`, `TLTin`) VALUES
(1, 'Tin Mới'),
(2, 'Khuyến Mãi'),
(3, 'Thủ Thuật'),
(4, 'App & Game'),
(5, 'For Game');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(300) NOT NULL,
  `GiaBan` double NOT NULL,
  `MoTa` varchar(2000) NOT NULL,
  `NgayCapNhat` date NOT NULL,
  `Anh` varchar(300) NOT NULL,
  `SLTon` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `Moi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `GiaBan`, `MoTa`, `NgayCapNhat`, `Anh`, `SLTon`, `MaLoai`, `Moi`) VALUES
(1, 'N6200', 3200000, 'Nâng cấp BN, Màu Đen, Xám, \r\nĐỏ, Bạc', '2020-01-01', 'N6200.jpg', 100, 1, NULL),
(2, 'GalaxyA6', 5200000, 'Nâng cấp BN, Màu Đen, Xám, Đỏ, Bạc', '2020-01-02', 'GalaxyA6.jpg', 20, 2, NULL),
(3, 'GalaxyA9', 5500000, 'Nâng cấp BN, Màu Đen, Xám, Đỏ, Bạc', '2020-02-02', 'GalaxyA9.jpg', 30, 2, NULL),
(4, 'GalaxyJ5', 6000000, 'Nâng cấp BN, Màu Đen, Xám, Đỏ, Bạc', '2020-02-02', 'GalaxyJ5.jpg', 55, 2, NULL),
(5, 'MotoE5', 2300000, 'Unlimited Extra', '2020-02-01', 'MotoE5.jpg', 20, 3, NULL),
(6, 'MotoG7', 8000000, 'Unlimited Extra', '2020-10-25', 'MotoG7.jpg', 25, 3, NULL),
(7, 'MotoP30', 7900000, 'Unlimited Extra', '2020-10-20', 'MotoP30.jpg', 22, 3, NULL),
(8, 'LGG7', 3000000, 'Nâng cấp', '2018-01-01', 'LGG7.jpg', 30, 4, NULL),
(9, 'LGQ9', 3200000, 'Nâng cấp', '2019-03-20', 'LGQ9.jpg', 15, 4, NULL),
(10, 'OppoA7', 5000000, 'Nâng cấp', '2019-03-01', 'OppoA7.jpg', 40, 5, NULL),
(11, 'OppoF7', 5200000, 'Nâng cấp', '2019-09-01', 'OppoF7.jpg', 20, 5, NULL),
(12, 'OppoR17', 7000000, 'Unlimited Extra', '2020-03-07', 'OppoR17.jpg', 30, 5, NULL),
(13, 'Iphone4S', 3000000, 'Không nâng cấp', '2018-01-01', 'Iphone4S.jpg', 20, 6, NULL),
(14, 'Iphone5S', 5000000, 'Không nâng cấp', '2019-09-20', 'Iphone5S.jpg', 30, 6, NULL),
(15, 'Iphone6p', 10000000, 'Không nâng cấp ', '0000-00-00', 'Iphone6p.jpg', 25, 6, NULL),
(16, 'Iphone7', 15000000, 'Không nâng cấp', '2020-07-05', 'Iphone7.jpg', 35, 6, NULL),
(17, 'Iphone8p', 20000000, 'Không nâng cấp', '2019-05-05', 'Iphone8p.jpg', 40, 6, NULL),
(18, 'Bphone1', 11000000, 'Nâng cấp', '2019-12-20', 'Bphone1.jpg', 35, 7, NULL),
(19, 'Bphone2', 12000000, 'Nâng cấp', '2019-12-24', 'Bphone2.jpg', 20, 7, NULL),
(20, 'Bphone3', 14000000, 'Nâng cấp', '2020-10-20', 'Bphone3.jpg', 40, 7, NULL),
(21, 'OppoF7', 5200000, 'Nâng cấp', '2019-09-01', 'OppoF7.jpg', 20, 5, NULL),
(22, 'OppoR17', 7000000, 'Unlimited Extra', '2020-03-07', 'OppoR17.jpg', 30, 5, NULL),
(23, 'Iphone4S', 3000000, 'Không nâng cấp', '2018-01-01', 'Iphone4S.jpg', 20, 6, NULL),
(24, 'Iphone5S', 5000000, 'Không nâng cấp', '2019-09-20', 'Iphone5S.jpg', 30, 6, NULL),
(25, 'Iphone6p', 10000000, 'Không nâng cấp ', '2020-02-20', 'Iphone6p.jpg', 25, 6, NULL),
(26, 'Iphone7', 15000000, 'Không nâng cấp', '2020-07-05', 'Iphone7.jpg', 35, 6, NULL),
(27, 'Iphone8p', 20000000, 'Không nâng cấp', '2019-05-05', 'Iphone8p.jpg', 40, 6, NULL),
(28, 'Bphone1', 11000000, 'Nâng cấp', '2019-12-20', 'Bphone1.jpg', 35, 7, NULL),
(29, 'Bphone2', 12000000, 'Nâng cấp', '2019-12-24', 'Bphone2.jpg', 20, 7, NULL),
(30, 'Bphone3', 14000000, 'Nâng cấp', '2020-10-20', 'Bphone3.jpg', 40, 7, NULL),
(31, 'Dell XPS', 61000000, 'Laptop Dell XPS 15 9500 i7 \r\n10750H/16GB/512GB/GTX 1650 Ti \r\n4GB/Win 10', '2020-12-01', 'Dell1.jpg', 30, 8, NULL),
(32, 'Laptop \r\nDell G \r\nGaming', 22500000, 'Laptop Dell G3 15 i5 \r\n10300H/2x4GB/256GB+1TB/GTX \r\n1650 4GB/15.6\"FHD/Win 10 ', '2020-11-30', 'Dell2.jpg ', 25, 8, NULL),
(33, 'Dell \r\nVostro', 15200000, 'Laptop Dell Vostro V3591 i5 \r\n1035G1/8GB/256GB/DVDRW/15.6\"F\r\nHD/Win 10\r\n', '2020-08-20', 'Dell3.jpg ', 30, 8, NULL),
(34, 'Dell \r\nInspiron', 16000000, 'Dell Inspiron N3476B/Core i5-\r\n8250U/4Gb/1Tb/AMD 520 Radeon \r\n2Gb/DVDRW/Win10', '2020-07-20', 'Dell4.jpg', 20, 8, NULL),
(35, 'Dell \r\nInspiron \r\nN7306', 27200000, 'Laptop Dell Inspiron N7306 i5 \r\n1135G7/8Gb/512Gb/13.3\"FHD \r\nTouch/Win 10', '2020-10-30', 'Dell5.jpg', 25, 8, NULL),
(36, 'Dell \r\nV3590', 16000000, 'Laptop Dell V3590 i5 \r\n10210U/8Gb/256Gb/15.6\"FHD/AMD \r\n610 2Gb/DVDSup/Win10', '2019-05-20', 'Dell6.jpg', 20, 8, NULL),
(37, 'HP Envy', 27500000, 'Laptop HP Envy 13 aq1023TU i7 \r\n10510U/8GB/512GB SSD/WIN10', '2020-11-02', 'HP1.jpg', 30, 9, NULL),
(38, 'HP \r\npavilion', 17600000, 'Laptop HP Pavilion 15-eg0069TU i5 \r\n1135G7/8GB/512GB/Win 10-Office \r\nHome& Student', '2019-09-07', 'HP2.jpg', 50, 9, NULL),
(39, 'HP 348', 10600000, 'Laptop HP 348 G7 i3 \r\n8130U/4GB/256GB/14.0\"HD/Intel \r\nHD/FP/Win 10\r\n', '2020-03-20', 'HP3.jpg', 40, 9, NULL),
(40, 'Asus ROC', 29500000, 'Laptop Asus Strix G512 IAL001T i7 \r\n10750H/8GB/512G SSD/15.6 \r\nFHD/WIN10', '2019-01-01', 'Asus1.jpg', 30, 11, NULL),
(41, 'Asus \r\nVivoBook', 10300000, 'Laptop Asus Vivobook X409JAEK237T i3 1005G1/4GB/Win 10', '2018-05-05', 'Asus2.jpg', 40, 11, NULL),
(42, 'Asus \r\nZenBook', 23990000, 'Laptop Asus Zenbook UX434FAC \r\nA6116T i5 \r\n10210U/8GB/512GB/WIN10', '2020-07-15', 'Asus3.jpg', 30, 11, NULL),
(43, 'Asus TUF', 19590000, 'Laptop Asus TUF FX505DT HN478T \r\nR7 3750H/8GB/512GB SSD/Win10', '2020-06-20', 'Asus4.jpg', 25, 11, NULL),
(44, 'Lenovo \r\nideapad', 9290000, 'Laptop Lenovo Ideapad S145 14API \r\nR3 3200U/4GB/25GB SSD/WIN10', '2017-03-01', 'Lenovo1.jpg', 20, 12, NULL),
(45, 'Lenovo \r\nlegion \r\ngaming', 24900000, 'Laptop Lenovo Legion Y540-15IRH i7\r\n9750H/8GB/1TB 128GSSD/WIN10\r\n', '2020-10-31', 'Lenovo2.jpg', 30, 12, NULL),
(46, 'Lenovo \r\nthinkpad', 44000000, 'Laptop Lenovo ThinkPad X1 Carbon 8 \r\ni7 \r\n10510U/16GB/512GB/14”WQHD/Win \r\n10 Pro', '2019-03-20', 'Lenovo3.jpg', 25, 12, 1),
(47, 'Lenovo \r\nThinkbook', 13300000, 'Laptop Lenovo ThinkBook 14 IIL i3 \r\n1005G1/4GB/512GB SSD/14.0 \r\nFHD/WIN10', '2019-03-14', 'Lenovo4.jpg', 25, 12, 1),
(48, 'Macbook \r\npro 16 ', 69900000, 'MacBook Pro 16\" 2019 Touch Bar \r\n2.3GHz Core i9 1TB\r\n', '2020-12-02', 'Apple1.jpg', 30, 13, 1),
(49, 'Macbook \r\npro 13', 45000000, 'MacBook Pro 13\" 2019 Touch Bar \r\n2.4GHz Core i5 256GB', '2020-10-20', 'Apple2.jpg', 20, 13, 1),
(50, 'Macbook \r\nair', 35000000, 'MacBook Air 13\" 2020 1.1GHz Core i5 \r\n512GB', '2019-03-17', 'Apple3.jpg', 30, 13, 1),
(51, 'Acer Nitro', 30000000, 'Laptop Acer Nitro 5 AN515-55-55E3 \r\ni5 10300H/16GB/512GB SSD/Nvidia \r\nRTX2060-6GB/Win10', '2019-10-29', 'Acer1.jpg', 25, 13, 1),
(52, 'Acer Swift', 13500000, '13500000', '2029-08-19', 'Acer2.jpg ', 15, 13, 1),
(53, 'Acer \r\nAspire', 10200000, 'Laptop Acer Aspire 3 A315 34 C38Y \r\nCDC \r\nN4020/4GB/256GB/15.6\"HD/Win 10', '2019-11-25', 'Acer3.jpg ', 20, 13, 1),
(54, 'Loa \r\nBluetooth', 2790000, 'Combo Loa Bluetooth Karaoke i.value \r\nF12-65N Nhựa đen + Mic không dây', '2020-02-22', 'Loa1.jpg', 50, 14, 1),
(55, 'Loa \r\nBluetooth \r\nSONY', 1700000, 'Loa Bluetooth SONY SRS-XB22', '2019-09-09', 'Loa2.jpg', 100, 14, 1),
(56, 'Loa dàn', 1000000, 'Loa MICROLAB M318BT', '2020-10-10', 'Loa3.jpg', 100, 14, 0),
(57, 'Loa \r\nMotion', 1500000, 'Loa Bluetooth Anker SoundCore \r\nMotion Q - A3108 Đen', '2020-05-19', 'Loa3.jpg', 70, 14, 1),
(58, 'Tai nghe 1', 650000, 'Tai nghe choàng đầu có mic Gaming \r\nZadez GT-326P', '2020-02-20', 'TN1.jpg ', 100, 16, 1),
(59, 'Tai nghe 2', 3000000, 'Tai nghe Kingston Hyper Cloud Alpha \r\nS - Blue_HX-HSCAS-BL/WW', '2020-10-10', 'TN2.jpg ', 70, 16, 1),
(60, 'Tai nghe 3', 2000000, 'Tai nghe Bluetooth nhét tai true \r\nwireless JBL T120', '2019-05-05', 'TN3.jpg', 70, 16, 1),
(61, 'Acer Nitro', 30000000, 'Laptop Acer Nitro 5 AN515-55-55E3 \r\ni5 10300H/16GB/512GB SSD/Nvidia \r\nRTX2060-6GB/Win10', '2019-10-29', 'Acer1.jpg', 25, 13, 1),
(62, 'Acer Swift', 13500000, '13500000', '2029-08-19', 'Acer2.jpg ', 15, 13, 1),
(63, 'Acer \r\nAspire', 10200000, 'Laptop Acer Aspire 3 A315 34 C38Y \r\nCDC \r\nN4020/4GB/256GB/15.6\"HD/Win 10', '2019-11-25', 'Acer3.jpg ', 20, 13, 1),
(64, 'Loa \r\nBluetooth', 2790000, 'Combo Loa Bluetooth Karaoke i.value \r\nF12-65N Nhựa đen + Mic không dây', '2020-02-22', 'Loa1.jpg', 50, 14, 1),
(65, 'Loa \r\nBluetooth \r\nSONY', 1700000, 'Loa Bluetooth SONY SRS-XB22', '2019-09-09', 'Loa2.jpg', 100, 14, 1),
(66, 'Loa dàn', 1000000, 'Loa MICROLAB M318BT', '2020-10-10', 'Loa3.jpg', 100, 14, 1),
(67, 'Loa \r\nMotion', 1500000, 'Loa Bluetooth Anker SoundCore \r\nMotion Q - A3108 Đen', '2020-05-19', 'Loa3.jpg', 70, 14, 1),
(68, 'Tai nghe 1', 650000, 'Tai nghe choàng đầu có mic Gaming \r\nZadez GT-326P', '2020-02-20', 'TN1.jpg ', 100, 16, 1),
(69, 'Tai nghe 2', 3000000, 'Tai nghe Kingston Hyper Cloud Alpha \r\nS - Blue_HX-HSCAS-BL/WW', '2020-10-10', 'TN2.jpg ', 70, 16, 1),
(70, 'Tai nghe 3', 2000000, 'Tai nghe Bluetooth nhét tai true \r\nwireless JBL T120', '2019-05-05', 'TN3.jpg', 70, 16, 1),
(71, 'Tai nghe 4', 1000000, 'Tai nghe Samsung Galaxy Buds+', '2020-02-01', 'TN4.jpg', 60, 16, 1),
(72, ' Cáp sạc 1', 400000, 'Adapter Sạc nhanh 20W Powerport III \r\nAnker A2633\r\n', '2020-01-01', 'CS1.jpg', 100, 18, 1),
(73, 'Cáp sạc 2', 500000, 'Cáp USB-C to Lightning 0.9m Anker \r\nPowerLine+ II A8652', '2020-02-05', 'CS2.jpg', 100, 18, 1),
(74, 'Cáp sạc 3 ', 300000, 'Cáp USB-C to USB-C 0.9m Anker\r\nPowerLine+ A8187', '2019-10-09', 'CS3.jpg', 100, 18, 1),
(75, 'Sạc dự \r\nphòng 1 ', 800000, 'Pin sạc dự phòng Quick Charge Lipolymer 10000 mAh UMETRAVEL \r\nSKY10000', '2019-12-12', 'SDP1.jpg', 70, 19, NULL),
(76, ' Sạc dự \r\nphòng 2', 500000, 'Pin sạc dự phòng Wireless Li-polymer \r\n10000mAH UMETRAVEL PW1', '2019-05-05', 'SDP2.jpg', 70, 19, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `MaTin` int(11) NOT NULL,
  `TieuDeTin` varchar(2000) NOT NULL,
  `NoiDung` varchar(2000) NOT NULL,
  `NgayDang` date NOT NULL,
  `AnhMH` varchar(300) NOT NULL,
  `MLTin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`MaTin`, `TieuDeTin`, `NoiDung`, `NgayDang`, `AnhMH`, `MLTin`) VALUES
(1, 'OPPO Find X3 và\r\nNubia Red Magic 6\r\nxác nhận sẽ ra mắt\r\nvới Snapdragon 888', 'Chip kế nhiệm cho Snapdragon 865\r\nđã chính thức ra mắt với tên gọi là\r\nSnapdragon 888 mà không phải\r\nSD875 như nhiều đồn đoán. Ngay\r\nsau đó, một số nhà sản xuất đã xác\r\nnhận các flagship 2021 của họ sẽ ra\r\nmắt với chip mới', '2020-12-02', 'TinMoi/TinMoi1.jpg', 1),
(2, 'Xiaomi Mi 11 sẽ là\r\nchiếc điện thoại đầu\r\ntiên sử dụng\r\nSnapdragon 888 mới', 'Vào sự kiện tối qua, Qualcomm đã\r\nchính thức công bố Snapdragon\r\n888, nền tảng di động hàng đầu thế\r\nhệ tiếp theo của họ. Mới đây, CEO\r\ncủa Xiaomi đã tiết lộ rằng Mi 11 sẽ\r\nlà mẫu điện thoại đầu tiên ra mắt\r\nvới chipset mới nhất này', '2020-11-28', 'TinMoi/TinMoi2.jpg', 1),
(3, 'Mọi thứ chúng ta\r\nbiết về Samsung\r\nGalaxy Buds Pro', 'Trong bài viết này, FPT Shop sẽ\r\ntổng hợp lại các thông tin rò rỉ về\r\nSamsung Galaxy Buds Pro. Đây là\r\nmẫu tai nghe TWS hàng đầu của gã\r\nkhổng lồ Hàn Quốc', '2020-11-25', 'TinMoi/TinMoi3.jpg', 1),
(4, 'Hướng dẫn toàn tập\r\ncách sử dụng máy in\r\ndành cho người mới\r\nbắt đầu', 'Máy in rất dễ cài đặt và sử dụng,\r\ntuy nhiên bạn cũng cần lưu ý một số\r\nđiều trong quá trình sử dụng để đảm\r\nbảo độ bền cho máy.', '2020-11-22', 'TinMoi/TinMoi4.jpg', 1),
(5, 'So sánh chip\r\nHiSilicon Kirin 710\r\nvà Qualcomm\r\nSnapdragon 660:\r\n\"Kẻ tám lạng, người\r\nnửa cân\"', 'Huawei đã ra mắt Hisilicon Kirin\r\n710 cách đây 2 năm, bộ vi xử lý tầm\r\ntrung này sự kế thừa và nâng cấp\r\ncủa chipset Kirin 659 phổ biến.\r\nSnapdragon 660 là một trong những\r\nbộ vi xử lý tầm trung mạnh mẽ và là\r\nmột trong những đối thủ gần', '2020-11-15', 'TinMoi/TinMoi5.jpg', 1),
(6, 'Chỉ trong 30 phút,\r\nFPT Shop ‘cháy’ hơn 500 iPhone 12 Series', 'Lúc 12h00 đêm ngày 26/11/2020,\r\nFPT Shop đã chính thức mở bán và\r\ngiao iPhone 12 Series chính hãng đến tận tay khách hàng, trở thành\r\nchuỗi cửa hàng chính hãng đầu tiên\r\nmở bán siêu phẩm tại Việt Nam.\r\nĐến sáng ngày 27/11, hệ', '2020-11-15', 'KhuyenMai/KM1.jpg', 2),
(7, 'Mua laptop, FPT \r\nShop tặng quà sinh \r\nnhật đến 700.000 \r\nđồng', 'Chọn mua laptop tại FPT Shop, bạn \r\nkhông chỉ được giảm đến 10% mà \r\ncòn được tặng thêm \'quà\' đến \r\n700.000 đồng nếu có ngày sinh \r\ntrong tháng. ', '2020-11-16', 'KhuyenMai/KM2.jpg', 2),
(8, 'FPT Shop ‘cháy’ \r\n2.000 iPhone 12 \r\nSeries chính hãng, \r\ntrung bình mỗi giờ \r\ngiao 500 máy!', 'Tính đến 12h trưa ngày 27/11/2020, \r\nFPT Shop và F.Studio by FPT đã \r\n\'cháy\' 2.000 đơn hàng, trung bình \r\nmỗi giờ giao 500 máy!\r\n', '2020-11-10', 'KhuyenMai/KM3.jpg', 2),
(9, 'FPT Shop giảm đến \r\n50% cho củ sạc \r\nAnker A2633 chính \r\nhãng\r\n', 'Từ ngày 27/11 – 03/12, khách hàng \r\nchọn mua củ sạc Anker PowerPort \r\nIII 20W A2633 tại FPT Shop sẽ \r\nđược hưởng nhiều ưu đãi thiết thực, \r\nbao gồm: giảm đến 50%, bảo hành \r\n12 tháng và giao hàng tận nơi miễn \r\nphí.', '2020-11-25', 'KhuyenMai/KM4.jpg', 2),
(10, 'FPT Shop giảm \r\nthêm 500.000 đồng \r\ncho khách hàng \r\nchọn mua iPhone 12 \r\nSeries và thanh toán', 'Ngày 27/11, FPT Shop chính thức \r\nlên kệ iPhone 12 Series với giá từ \r\n21,99 triệu. Chọn mua sản phẩm từ \r\n27/11-31/12/2020, ngoài những ưu \r\nđãi hiện có của sản phẩm, FPT \r\nShop còn giảm thêm 500.000 đồng \r\ndành cho tất cả khách hàng', '2020-11-30', 'KhuyenMai/KM5.jpg', 2),
(11, 'Hướng dẫn cứu dữ \r\nliệu thẻ nhớ bị \r\nformat', 'Ngoài bộ nhớ trong ra, thẻ nhớ là \r\nnơi chứa dữ liệu của các thiết bị \r\nthông minh như smartphone hoặc \r\ntablet. Nếu gặp phải trường hợp cần \r\ncứu dữ liệu thẻ nhớ bị format thì \r\nphải thực hiện ra sao để đảm bảo \r\nđược độ nguyên vẹn?\r\n', '2020-10-30', 'ThuThuat/TT1.jpg', 3),
(12, 'Hướng dẫn phục hồi \r\nnhanh thẻ nhớ bị \r\nmất dung lượng', 'Lỗi thẻ nhớ bị mất dung lượng \r\nthường không diễn ra nhiều và phổ \r\nbiến như các lỗi khác nhưng một \r\nkhi xuất hiện thì nó cũng gây ảnh \r\nhưởng đến người dùng bằng cách \r\nnày hay cách khác.', '2020-12-01', 'ThuThuat/TT2.jpg', 3),
(13, 'Đây là 4 cách sửa lỗi \r\nthẻ nhớ bị read only \r\nnhanh nhất', 'Khi thẻ nhớ bị read only, điều đó có \r\nnghĩa là bạn không thể làm bất cứ \r\nmột hành động nào khác như chỉnh \r\nsửa – xóa – di chuyển dữ liệu bên \r\ntrong nó ra khu vực khác', '2020-10-10', 'ThuThuat/TT3.jpg', 3),
(14, 'Red Dead Online ra \r\nmắt dưới dạng một \r\ntrò chơi độc lập vào \r\nngày 1/12', 'a \r\nmắt dưới dạng một \r\ntrò chơi độc lập vào \r\nngày 1/12\r\nRed Dead Online sẽ ra mắt dưới \r\ndạng một tựa game độc lập trên \r\nSteam và Epic Games Store từ ngày \r\n1/12 cho đến ngày 15/2 năm sau, \r\nvới giá 4,99 USD.', '2020-12-02', 'App&Game/AG1.jpg', 4),
(15, 'Top 10 ứng dụng \r\nchỉnh màu Hàn Quốc xuất sắc trên \r\nđiện thoại', 'Để sở hữu tấm hình đẹp ngoài việc \r\nchụp đẹp thì các ứng dụng chỉnh \r\nmàu cũng đóng vai trò rất quan trọng. FPTShop sẽ tổng hợp lại 10 \r\nứng dụng chỉnh màu Hàn Quốc phổ \r\nbiến nhất hiện nay để bạn tham \r\nkhảo', '2020-12-01', 'App&Game/AG2.jpg', 4),
(16, 'Lựa chọn laptop văn \r\nphòng nào tốt trong \r\nkhoảng giá 16 triệu \r\nđồng?', 'Trong phân khúc 16 triệu đồng có \r\nkhá nhiều sự lựa chọn laptop hấp \r\ndẫn dành cho đối tượng người dùng \r\nvăn phòng, sinh viên hay người \r\ndùng cơ bản. ', '2020-11-30', 'ForGame/FG1.jpg', 5),
(17, 'Tư vấn chọn mua \r\nlaptop vừa đáp ứng \r\ntốt nhu cầu lại có \r\nthời lượng pin dài', 'Để có thể chọn mua được một chiếc \r\nlaptop vừa đáp ứng tiêu chí đẹp, \r\nmạnh lại pin trâu là điều không quá \r\nkhó khăn. ', '2020-11-29', 'ForGame/FG2.jpg', 5),
(18, 'Máy chơi game \r\nSony PlayStation 5 \r\nchính thức được bán \r\nra từ hôm nay', 'Hôm nay, Sony đã phát hành máy \r\nchơi game rất được mong đợi của \r\nmình - Sony PlayStation 5 (PS5). \r\nThiết bị kế nhiệm của PS4 bảy năm \r\ntuổi, hiện đã có sẵn để mua ở các \r\nkhu vực lớn trên thế giới.', '2020-11-28', 'ForGame/FG3.jpg', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`MaBanner`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`MLTin`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTin`),
  ADD KEY `MLTin` (`MLTin`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `MaBanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `MLTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `MaTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loai` (`MaLoai`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`MLTin`) REFERENCES `loaitin` (`MLTin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
