-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2022 lúc 04:07 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data_sql`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`idCategory`, `CategoryName`) VALUES
(1, 'Máy chạy bộ'),
(2, 'Xe đạp thể dục'),
(3, 'Thiết bị tập vai và ngực'),
(4, 'Thiết bị tập bụng'),
(5, 'Các loại tạ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `equipment`
--

CREATE TABLE `equipment` (
  `idEquipment` int(11) NOT NULL,
  `EquipmentName` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `equipment`
--

INSERT INTO `equipment` (`idEquipment`, `EquipmentName`, `Status`, `idCategory`) VALUES
(1, 'Máy chạy bộ 1', 'still active', 1),
(2, 'Máy chạy bộ 2', 'still active', 1),
(3, 'Xe đạp thể dục 1', 'still active', 2),
(4, 'Xe đạp thể dục 2', 'still active', 2),
(5, 'Xe đạp thể dục 3', 'still active', 2),
(6, 'Máy tập bụng 1', 'no active', 4),
(7, 'Máy tập bụng 2', 'still active', 4),
(8, 'Thiết bị tập vai và ngực 1', 'still active', 3),
(9, 'Thiết bị tập vai và ngực 2', 'still active', 3),
(10, 'các quả tạ', 'still active', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gymcard`
--

CREATE TABLE `gymcard` (
  `idCard` int(11) NOT NULL,
  `CardName` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `Promotional` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gymcard`
--

INSERT INTO `gymcard` (`idCard`, `CardName`, `price`, `Promotional`) VALUES
(1, 'Thẻ tập 1 ngày', 10000, ''),
(2, 'Thẻ tập 1 tháng', 250000, ''),
(3, 'Thẻ tập 1 năm', 2500000, 'Thêm 1 tháng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `members`
--

CREATE TABLE `members` (
  `idMembers` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `NumberPhone` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `idCard` int(11) NOT NULL,
  `timeStart` date NOT NULL,
  `timeEnd` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `members`
--

INSERT INTO `members` (`idMembers`, `Name`, `birthday`, `NumberPhone`, `gender`, `picture`, `idCard`, `timeStart`, `timeEnd`, `Status`) VALUES
(7, 'Thái Hoàng Sang', '2000-01-06', '0818940765', 'Nam', 'https://c2quantoanhp.edu.vn/wp-content/uploads/99-Hinh-Anh-MEO-CUTE-De-Thuong-CUNG-MUON-XIU.jpg', 1, '2022-12-13', '2022-12-14', 1),
(11, 'Nguyễn Ngọc Khánh', '2000-02-27', '0818940765', 'Nam', 'https://i.pinimg.com/736x/74/b1/10/74b110781d66cd3b501bc85c469f93be.jpg', 2, '2022-12-22', '2023-01-22', 2),
(18, 'Phạm Hoàng Gia Hân', '1998-08-03', '0818940765', 'Nữ', 'https://catscanman.net/wp-content/uploads/2021/09/anh-meo-cute-trai-tim-3.jpg', 3, '2022-12-22', '2023-12-22', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personaltrainer`
--

CREATE TABLE `personaltrainer` (
  `idPT` int(11) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `NamePT` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `NumberPhone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `personaltrainer`
--

INSERT INTO `personaltrainer` (`idPT`, `picture`, `NamePT`, `birthday`, `NumberPhone`, `Email`, `Gender`) VALUES
(2, 'https://toigingiuvedep.vn/wp-content/uploads/2022/01/avatar-anh-meo-cute-600x600.jpg', 'Ngọc Khánh', '2000-11-20', '0818940765', 'a@gmail.com', 'nam'),
(3, 'https://kynguyenlamdep.com/wp-content/uploads/2022/06/avatar-cute-meo-con-than-chet.jpg', 'Gia Hân', '1998-08-03', '0818940765', 'a@gmail.com', 'nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rent`
--

CREATE TABLE `rent` (
  `idRent` int(11) NOT NULL,
  `RentName` varchar(50) NOT NULL,
  `pricedv` float NOT NULL,
  `idPT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `rent`
--

INSERT INTO `rent` (`idRent`, `RentName`, `pricedv`, `idPT`) VALUES
(6, 'Thuê PT thường', 100000, 2),
(7, 'Thuê PT Vip', 200000, 3),
(9, 'Giặt là', 30000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `revenue`
--

CREATE TABLE `revenue` (
  `idRevenue` int(11) NOT NULL,
  `idMembers` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Time` date NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `revenue`
--

INSERT INTO `revenue` (`idRevenue`, `idMembers`, `id`, `Time`, `total`) VALUES
(61, 7, 1, '2023-12-22', 340000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userent`
--

CREATE TABLE `userent` (
  `id` int(11) NOT NULL,
  `idMembers` int(11) DEFAULT NULL,
  `idRent` int(11) DEFAULT NULL,
  `KH` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `userent`
--

INSERT INTO `userent` (`id`, `idMembers`, `idRent`, `KH`) VALUES
(1, 7, 7, 'KH1'),
(4, NULL, NULL, 'không đăng ký dịch vụ'),
(5, 7, 9, NULL),
(6, 7, 6, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `DisplayName` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `UserName`, `Password`, `DisplayName`, `Status`) VALUES
(1, 'admin', 'admin', 'Hoàng Sang', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Chỉ mục cho bảng `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`idEquipment`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Chỉ mục cho bảng `gymcard`
--
ALTER TABLE `gymcard`
  ADD PRIMARY KEY (`idCard`);

--
-- Chỉ mục cho bảng `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`idMembers`),
  ADD KEY `idCard` (`idCard`);

--
-- Chỉ mục cho bảng `personaltrainer`
--
ALTER TABLE `personaltrainer`
  ADD PRIMARY KEY (`idPT`);

--
-- Chỉ mục cho bảng `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`idRent`);

--
-- Chỉ mục cho bảng `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`idRevenue`),
  ADD KEY `idMembers` (`idMembers`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `userent`
--
ALTER TABLE `userent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMembers` (`idMembers`),
  ADD KEY `idRent` (`idRent`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `equipment`
--
ALTER TABLE `equipment`
  MODIFY `idEquipment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `gymcard`
--
ALTER TABLE `gymcard`
  MODIFY `idCard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `members`
--
ALTER TABLE `members`
  MODIFY `idMembers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `personaltrainer`
--
ALTER TABLE `personaltrainer`
  MODIFY `idPT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `rent`
--
ALTER TABLE `rent`
  MODIFY `idRent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `revenue`
--
ALTER TABLE `revenue`
  MODIFY `idRevenue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `userent`
--
ALTER TABLE `userent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Các ràng buộc cho bảng `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`idCard`) REFERENCES `gymcard` (`idCard`);

--
-- Các ràng buộc cho bảng `revenue`
--
ALTER TABLE `revenue`
  ADD CONSTRAINT `revenue_ibfk_1` FOREIGN KEY (`idMembers`) REFERENCES `members` (`idMembers`),
  ADD CONSTRAINT `revenue_ibfk_2` FOREIGN KEY (`id`) REFERENCES `userent` (`id`);

--
-- Các ràng buộc cho bảng `userent`
--
ALTER TABLE `userent`
  ADD CONSTRAINT `userent_ibfk_1` FOREIGN KEY (`idMembers`) REFERENCES `members` (`idMembers`),
  ADD CONSTRAINT `userent_ibfk_2` FOREIGN KEY (`idRent`) REFERENCES `rent` (`idRent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
