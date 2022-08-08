-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220807.d85cb55ddf
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 08, 2022 lúc 09:22 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `account`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accesscontrol`
--

CREATE TABLE `accesscontrol` (
  `ID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `TimeIn` datetime NOT NULL,
  `TimeOut` datetime NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `accesscontrol`
--

INSERT INTO `accesscontrol` (`ID`, `ClientID`, `TimeIn`, `TimeOut`, `Description`) VALUES
(1, 1, '2022-05-31 05:17:19', '2022-05-31 06:17:19', ''),
(2, 2, '2022-04-01 17:00:00', '2022-04-01 08:00:00', ''),
(3, 3, '2022-05-30 05:22:09', '2022-05-30 07:22:09', ''),
(4, 2, '2022-08-01 08:54:37', '2022-08-01 09:54:37', ''),
(5, 2, '2022-08-01 10:54:37', '2022-08-01 08:54:37', ''),
(6, 3, '2022-08-02 08:55:36', '2022-08-02 08:55:36', ''),
(7, 1, '2022-08-02 11:55:36', '2022-08-02 14:55:36', ''),
(8, 5, '2022-08-02 18:56:11', '2022-08-02 19:56:11', ''),
(9, 6, '2022-08-02 18:56:11', '2022-08-02 20:56:11', ''),
(10, 7, '2022-08-03 03:16:28', '2022-08-03 03:16:28', ''),
(11, 8, '2022-08-03 03:16:28', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL COMMENT 'mã của tài khoản',
  `name` varchar(256) NOT NULL COMMENT 'tên tài khoản',
  `code` varchar(50) NOT NULL COMMENT 'số tài khoản',
  `bank` int(11) NOT NULL COMMENT 'id bảng bank chỉ của ng.hàng nào',
  `currency` int(11) NOT NULL COMMENT 'id bảng currency chỉ loại tiền của tk',
  `amount` double NOT NULL COMMENT 'số tiền ban đầu của TK',
  `ship` int(11) NOT NULL COMMENT 'id của tàu, =0 nếu ko phải tàu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `name`, `code`, `bank`, `currency`, `amount`, `ship`) VALUES
(1, 'Dinh Thi Xoan', '108000618150', 1, 1, 1360202750, 0),
(2, 'Đinh Thị Bích', '107873683569', 2, 1, 326496870, 0),
(8, 'Vietinbank Hải Hậu', '112000078024', 1, 1, 490634439, 0),
(9, 'Vietinbank Hải Phòng', '118002880621', 1, 1, 321852975, 0),
(10, 'Agribank Hải Hậu (USD)', '3207201005105', 3, 2, 65452.39, 0),
(12, 'Agribank Hải Hậu (VNĐ)', '3207201003008', 3, 1, 63469318, 0),
(13, 'Agribank Hải Hậu (VNĐ)', '3207201003008', 1, 1, 63, 0),
(14, 'VCB Hải Hậu (VNĐ)', '0831000024718', 4, 1, 6175375, 0),
(15, 'VCB Hải Hậu (USD)', '0831370024719', 4, 2, 2779.12, 0),
(16, 'DInh Thi XOan (TK VCB cá nhân)', '1016023314', 4, 1, 5671585, 0),
(17, 'Vietinbank Hải Hậu (USD)', '116000204659', 1, 2, 2103.74, 0),
(18, 'Vietinbank Hải Phòng (USD)', '117002880622', 1, 2, 2320.93, 0),
(19, 'Sổ thu chi tiền mặt', '01', 1, 1, 81207024, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL COMMENT 'mã của n.hàng',
  `name` varchar(256) NOT NULL COMMENT 'tên ngân hàng',
  `address` varchar(500) NOT NULL COMMENT 'địa chỉ phòng giao dịch làm việc',
  `des` text NOT NULL COMMENT 'mô tả thêm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `banks`
--

INSERT INTO `banks` (`id`, `name`, `address`, `des`) VALUES
(1, 'Vietinbank', 'Hải Hậu', 'Ngân hàng TMCP Công Thương Việt Nam'),
(2, 'Vietinbank', 'Hải Phòng', 'Ngân hàng TMCP Công Thương Việt Nam'),
(3, 'Agribank', 'Hải Hậu', 'Ngân hàng No&PTNT Việt Nam'),
(4, 'VCB', 'Nam Định', 'Ngân hàng TMCP Ngoại Thương VN'),
(5, 'Sổ Tiền mặt', 'Hải Hậu', 'Sổ thu chi tiền mặt hàng ngày');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `card`
--

CREATE TABLE `card` (
  `ID` int(11) NOT NULL,
  `CardNumber` int(11) NOT NULL,
  `LicensePlates` text NOT NULL,
  `Color` text NOT NULL,
  `Brand` text NOT NULL,
  `DateSignCard` date NOT NULL,
  `DateSignCar` date NOT NULL,
  `CarModel` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `card`
--

INSERT INTO `card` (`ID`, `CardNumber`, `LicensePlates`, `Color`, `Brand`, `DateSignCard`, `DateSignCar`, `CarModel`, `Description`) VALUES
(1, 378432456, 'HD-999996', 'Red', 'Mercedes Benz', '2020-10-26', '2016-07-21', '', ''),
(2, 657564588, '34A-868686', 'Black', 'McLaren', '2020-10-26', '2016-07-21', '', ''),
(3, 658971235, '29B-282828', 'Gray', 'Huyndai', '2019-12-12', '2015-03-24', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'mã',
  `name` varchar(256) NOT NULL COMMENT 'tên loại thu chi',
  `rev` int(11) NOT NULL COMMENT '0: thu, 1: chi',
  `des` text NOT NULL COMMENT 'mô tả thêm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `rev`, `des`) VALUES
(1, 'Thu cước bán USD', 0, 'Thu tiền bán USD cho ngân hàng'),
(2, 'Chi tiền lương', 1, 'Lương cứng'),
(3, 'Mua thiết bị', 1, 'Mua vật tư tàu'),
(4, 'Thu cước', 0, 'Thu USD tiền phí cảng, dầu chuyển đổi'),
(5, 'Thu cước VNĐ', 0, 'Thu cước vc '),
(6, 'Thu khác', 0, 'Các khoản thu khác'),
(7, 'Chi dầu', 1, 'Chi tiền mua dầu Do, Fo'),
(8, 'Chi dầu nhờn', 1, 'Chi tiền mua dầu nhờn'),
(9, 'Chi quỹ tàu', 1, 'Chuyển tiền cho quỹ tàu'),
(10, 'Chi lãi tiền vay', 1, 'Chi tiền trả lãi vay'),
(11, 'Trả gốc vay', 1, 'Chi tiền trả gốc tiền vay'),
(12, 'Phí bảo hiểm', 1, 'Chi tiền phí bảo hiểm thân tàu, TNDS'),
(13, 'Phí cảng', 1, 'Chi tiền phí cảng'),
(14, 'Phí VAT', 1, 'Chi tiền phí VAT'),
(15, 'Chi sx khác', 1, 'Chi tiền chi phí khác'),
(16, 'Chi ấn phẩm hàng hải', 1, 'Chi tiền mua ấn phẩm, hải đồ hàng hải'),
(17, 'Chi lương VP Hải Phòng', 1, 'Chi tiền lương VP Hải Phòng'),
(18, 'Chi BHXH', 1, 'Chi tiền phí BHXH'),
(20, 'Chi khác', 1, 'Các khoản chi phí khác'),
(22, 'Chia lãi', 1, 'Chia lãi (hoặc tạm chia lãi)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `client`
--

CREATE TABLE `client` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Age` int(11) NOT NULL,
  `Sex` text NOT NULL,
  `CitizenID` int(20) NOT NULL,
  `CardID` int(11) NOT NULL,
  `FaceID` int(11) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `client`
--

INSERT INTO `client` (`ID`, `Name`, `Age`, `Sex`, `CitizenID`, `CardID`, `FaceID`, `IsActive`, `Description`) VALUES
(1, 'Nguyễn Đình Việt', 23, 'Nam', 123456, 1, 1, 1, ''),
(2, 'Nguyễn Thế Nhật', 23, 'Nam', 345567, 1, 2, 1, ''),
(3, 'Nguyễn Thị Ế', 20, 'Nữ', 234789, 1, 3, 1, ''),
(4, 'Phạm Ngọc Biên', 26, 'Nam', 235678, 2, 4, 1, ''),
(5, 'Trần Thị Hậu', 23, 'Nữ', 567890, 2, 5, 1, ''),
(6, 'Nguyễn Văn Tiến', 23, 'Nam', 126787, 3, 6, 1, ''),
(7, 'Nguyễn Trâm Anh', 23, 'Nữ', 489034, 3, 7, 1, ''),
(9, 'Ô là lá', 45, 'Nữ', 67676767, 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL COMMENT 'mã tiền tệ',
  `name` varchar(50) NOT NULL COMMENT 'tên tiền tệ',
  `des` text NOT NULL COMMENT 'mô tả thêm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `currency`
--

INSERT INTO `currency` (`id`, `name`, `des`) VALUES
(1, 'VND', 'Việt Nam đồng'),
(2, '$', 'USD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `holdership`
--

CREATE TABLE `holdership` (
  `idShip` int(11) NOT NULL COMMENT 'id của tàu',
  `idHolder` int(11) NOT NULL COMMENT 'id cổ dông',
  `ratio` float NOT NULL COMMENT 'tỷ lệ sở hữu tàu của cổ đông',
  `info` text NOT NULL COMMENT 'mô tả thêm về sở hữu này'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `holdership`
--

INSERT INTO `holdership` (`idShip`, `idHolder`, `ratio`, `info`) VALUES
(1, 7, 17, 'ok'),
(1, 8, 14, 'ok luoon'),
(2, 7, 15, 'cổ phiếu'),
(2, 6, 20, 'Cổ phiếu'),
(2, 8, 40, 'Cổ phiếu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ledgers`
--

CREATE TABLE `ledgers` (
  `id` int(11) NOT NULL COMMENT 'mã của dòng trong sổ',
  `date` date NOT NULL COMMENT 'ngày',
  `des` varchar(256) NOT NULL COMMENT 'diễn giải',
  `account` int(11) NOT NULL COMMENT 'tài khoản nào (id bảng account)',
  `cat_id` int(11) NOT NULL COMMENT 'id bảng category (loại thu chi)',
  `money` double NOT NULL,
  `spend` int(1) NOT NULL COMMENT 'chi:1, thu:0',
  `idShip` int(11) NOT NULL COMMENT '0: ko liên quan đến tàu, ><0 nghĩa là id tàu',
  `idHolder` int(11) NOT NULL COMMENT '0; ko của cổ đông nào, ><0 nghĩa là liên quan đến cổ đông cụ thể'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ledgers`
--

INSERT INTO `ledgers` (`id`, `date`, `des`, `account`, `cat_id`, `money`, `spend`, `idShip`, `idHolder`) VALUES
(3, '2021-09-18', 'Chi tiền lương tháng 9 cho Tuyết', 2, 2, 10000, 1, 2, 7),
(4, '2021-09-18', 'Thu tiền lãi cho vay doanh nghiệp C', 2, 1, 2100000, 0, 0, 0),
(18, '2020-02-13', 'Chi tiền lương năm 2020', 2, 2, 200000, 1, 0, 0),
(19, '2020-03-13', 'Thu tiền vận chuyển', 1, 1, 3000000, 0, 0, 0),
(25, '2021-09-24', 'Chi 500l dầu', 1, 7, 2350000, 1, 1, 7),
(26, '2021-09-26', 'Thu tiền vận chuyển', 1, 1, 4200000, 0, 1, 7),
(27, '2021-10-01', 'Chi tiền lương tháng 9 ', 10, 2, 60000, 1, 1, 7),
(75, '2021-10-14', 'Chi tiền ăn', 1, 20, 4304444, 1, 2, 0),
(83, '2021-11-16', 'Chi tiền lương tháng 9', 1, 2, 2160000, 1, 1, 7),
(84, '2021-11-10', 'Chi tiền ăn', 1, 20, 4304444, 1, 2, 0),
(85, '2021-11-09', 'Chi tiền lương tháng 8', 2, 2, 2200000, 1, 1, 7),
(86, '2021-11-10', 'Chi tiền ăn', 2, 20, 1402222, 1, 2, 0),
(87, '2021-10-13', 'Chia tiền lãi', 1, 10, 4000000, 1, 1, 7),
(88, '2021-10-29', 'Chia tiền lãi', 15, 10, 6000, 1, 2, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ships`
--

CREATE TABLE `ships` (
  `id` int(11) NOT NULL COMMENT 'mã của tàu',
  `name` varchar(256) NOT NULL COMMENT 'tên tàu',
  `des` text NOT NULL COMMENT 'mô tả thông tin thêm về tàu',
  `dateStart` date NOT NULL COMMENT 'ngày bắt đầu đăng ký',
  `number` varchar(100) NOT NULL COMMENT 'mã hiệu của tàu',
  `volume` int(11) NOT NULL COMMENT 'trọng tải toàn phần (đơn vị đo tấn)',
  `type` varchar(256) NOT NULL COMMENT 'loại tàu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ships`
--

INSERT INTO `ships` (`id`, `name`, `des`, `dateStart`, `number`, `volume`, `type`) VALUES
(1, 'Tàu MP17', 'Sổ thu chi tàu Minh Phú 17', '2021-09-01', 'QN09231', 10, 'Tàu vận tải'),
(2, 'Tàu MP18', 'Sổ thu chi tàu Minh Phú 17', '2021-09-01', 'QN09242', 25, 'Tàu vận tải'),
(3, 'Tàu MP88', 'Sổ thu chi tàu Minh Phú 88', '2021-09-01', '', 0, ''),
(4, 'Tàu MP89', 'Sổ thu chi tàu Minh Phú 89', '2021-09-01', '', 0, ''),
(5, 'Tàu MP99', 'Sổ thu chi tàu Minh Phú 99', '2021-09-01', '', 0, ''),
(6, 'Tàu MP Pacific', 'Sổ thu chi tàu MP PACIFIC', '2021-09-01', '', 0, ''),
(7, 'Tàu MP Star', 'Sổ thu chi tàu MP STAR', '2021-09-01', '', 0, ''),
(8, 'Tàu MP Atlantic', 'Sổ thu chi tàu MP ATLANTIC', '2021-09-01', '', 0, ''),
(9, 'O.Hùng', 'Sổ thu chi nội bộ A.Hùng', '2021-09-01', '', 0, ''),
(10, 'O.Ban', 'Sổ thu chi nội bộ Ô.Ban', '2021-09-01', '', 0, ''),
(11, 'O.Biên', 'Sổ thu chi nội bộ Ô.Biên', '2021-09-01', '', 0, ''),
(12, 'O.Hiệu', 'Sổ thu chi nội bộ Ô.Hiệu', '2021-09-01', '', 0, ''),
(13, 'O.Biên CTy', 'Sổ chi quỹ A.Biên để chi CTy', '2021-09-01', '', 0, ''),
(14, 'O.Phan ', 'Sổ thu chi nội bộ Ô.Phan cá nhân', '2021-09-01', '', 0, ''),
(15, 'O.Hưng', 'Sổ thu chi nội bộ Ô.Hưng', '2021-09-01', '', 0, ''),
(16, 'O.Linh', 'Sổ thu chi nội bộ cá nhân Ô.Linh', '2021-09-01', '', 0, ''),
(17, 'O.Hạnh', 'Sổ thu chi nội bộ cá nhân Ô.Hạnh', '2021-09-01', '', 0, ''),
(18, 'B.Xoan', 'Sổ thu chi nội bộ cá nhân Xoan', '2021-09-01', '', 0, ''),
(19, 'Công ty ', 'Sổ thu chi nội bộ Công ty', '2021-09-01', '', 0, ''),
(20, 'VP.Hải Phòng', 'Sổ thu chi văn phòng Hải Phòng', '2021-09-01', '', 0, ''),
(21, 'Lãi Tkiem', 'Sổ thu chi lãi TKiem', '2021-09-01', '', 0, ''),
(22, 'Tàu ATN GLory', 'Sổ thu chi tàu ATN Golry', '2021-09-01', '', 0, ''),
(23, 'CTy ATN', 'Sổ thu chi Cty ATN', '2021-09-01', '', 0, ''),
(24, 'Chia lãi tàu MP Atlantic', 'Chia lãi tàu MP Atlantic', '2021-09-01', '', 0, ''),
(25, 'Cty Minh Tiến', 'Giao dịch với Cty Minh Tiến', '2021-09-01', '', 0, ''),
(26, 'Cty Minh Phát', 'Giao dịch với Cty Minh Phát', '2021-09-01', '', 0, ''),
(27, 'Chị Phượng', 'Giao dịch với Chị Phượng', '2021-09-01', '', 0, ''),
(28, 'Mã 01', 'Bù trừ các khoản tiền lưu chuyển từ ngân hàng này sang ngân hàng khác', '2021-09-01', '', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transport`
--

CREATE TABLE `transport` (
  `id` int(11) NOT NULL COMMENT 'mã',
  `date` date NOT NULL COMMENT 'Ngày tháng',
  `idShip` int(11) NOT NULL COMMENT 'mã tàu',
  `fromPort` varchar(100) NOT NULL COMMENT 'cảng đi',
  `toPort` varchar(100) NOT NULL COMMENT 'cảng đến',
  `transportCompany` varchar(100) NOT NULL COMMENT 'công ty vận chuyển',
  `goods` varchar(50) NOT NULL COMMENT 'hàng hóa',
  `quantity` varchar(50) NOT NULL COMMENT 'số lượng',
  `price` float NOT NULL COMMENT 'đơn giá',
  `currency_id` int(11) NOT NULL,
  `money` float NOT NULL COMMENT 'thành tiền',
  `note` varchar(200) NOT NULL COMMENT 'ghi chú'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `transport`
--

INSERT INTO `transport` (`id`, `date`, `idShip`, `fromPort`, `toPort`, `transportCompany`, `goods`, `quantity`, `price`, `currency_id`, `money`, `note`) VALUES
(1, '2021-11-04', 2, 'ss', 'aaa', 'aaaaaa', 'assd', '12', 10000, 2, 120000, 'sdsadsa'),
(3, '2021-11-04', 2, 'ss', 'aaa', 'aaaaaa', 'assd', 'chiếc', 0, 1, 10000000, ''),
(6, '2021-11-04', 1, 'ddas', 'asasdas', 'asasd', 'sdasd', '1', 10000, 1, 10000, 'dsdsd'),
(7, '2021-11-12', 12, 'sadasd', 'sdasd', 'sasd', 'sdasd', '12', 13000, 2, 156000, 'dsdsd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_contact` varchar(15) CHARACTER SET latin1 NOT NULL COMMENT 'số đthoai của ng dùng',
  `user_email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `activate` int(11) NOT NULL DEFAULT 0,
  `gender` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `taxcode` varchar(20) NOT NULL COMMENT 'Mã số thuế',
  `addr` varchar(100) NOT NULL COMMENT 'địa chỉ nơi ở'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_fname`, `user_mname`, `user_lname`, `user_contact`, `user_email`, `user_password`, `user_role_id`, `activate`, `gender`, `taxcode`, `addr`) VALUES
(1, 'Hoàng', 'Văn', 'Đỗ', '0981088307', 'blackholetest01@gmail.com', '37a926f86b62309b115efab8f6260cf8', 1, 1, 'Nam', '', ''),
(2, 'Tuyết', 'Thị', 'Nguyễn', '0981088308', 'blackhole01@gmail.com', 'b67a0cf0b88b27a9fe8b210beb6095d0', 2, 1, 'Nữ', '', '0'),
(3, 'Hiền', 'Thị', 'Nguyễn', '0999999999', 'hienngong2910@gmail.com', '0c6d69f7a8df663f6dde0c79653bf6db', 1, 1, 'Nữ', '', '0'),
(4, 'Ban', 'Văn', 'Đinh', '0987232332', 'dinhvanban@gmail.com', 'b4ea56d5cc7e8900d36e3e0fbbbe0a79', 1, 1, 'Nam', '', '0'),
(5, 'Xoan', 'Thị', 'Đinh', '0982732123', 'dinhthixoan@gmail.com', '76de6dd22f9168528703261debe15d1b', 1, 1, 'Nữ', '', '0'),
(6, 'Linh', 'Ngọc ', 'Đỗ ', '0982731323', 'ngoclinh91@gmail.com', '56cecd3fcbf18b59dc8954d415722603', 2, 1, 'Nam', '082632632', '0'),
(7, 'Mạnh', 'Văn', 'Đỗ', '0987981440', 'manh1968@gmail.com', '1e790c25969bdc07489e1ab082357cf5', 2, 1, 'Nam', '2838213213', '0'),
(8, 'Huê', 'Thị ', 'Nguyễn', '0988231234', 'hue1970@gmail.com', 'bef388fa5120be1bc8daa6003fd54c71', 2, 1, 'Nữ', '0982321313', 'Bình Minh Khoái Châu'),
(9, 'Đạt', 'Tiến', 'Nguyễn', '0982123131', 'dat1999@gmail.com', 'd80bbf96957676303bb3e67988d9a813', 2, 1, 'Nam', '0908223332', '920 Tô Thành'),
(10, 'viet', 'dinh', 'nguyen', '0123456789', 'dinhviet99hdhd@gmail.com', 'b48ef5a0134fc1852cc8c9256f2dead6', 1, 1, 'Nam', '34343434', 'Cộng Hòa - Kim Thành - Hải Dương');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accesscontrol`
--
ALTER TABLE `accesscontrol`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ships`
--
ALTER TABLE `ships`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_fk` (`user_role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accesscontrol`
--
ALTER TABLE `accesscontrol`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã của tài khoản', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã của n.hàng', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `card`
--
ALTER TABLE `card`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã tiền tệ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã của dòng trong sổ', AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `ships`
--
ALTER TABLE `ships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã của tàu', AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
