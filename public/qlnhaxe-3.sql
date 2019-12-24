-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2019 lúc 01:44 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlnhaxe`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `drop_all_tables_from` (IN `schema_target` VARCHAR(128))  BEGIN
    DECLARE table_list TEXT;

    SELECT
        GROUP_CONCAT(`TABLE_NAME`)
    INTO
        table_list

    FROM `information_schema`.`TABLES`
    WHERE
          `TABLE_SCHEMA` = schema_target;

    IF table_list IS NOT NULL THEN
        SET @drop_tables = CONCAT("DROP TABLE ", table_list);

        PREPARE stmt FROM @drop_tables;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;
    END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banphukien`
--

CREATE TABLE `banphukien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngayban` date NOT NULL,
  `somay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `tenphukien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banphukien`
--

INSERT INTO `banphukien` (`id`, `ngayban`, `somay`, `soluong`, `gia`, `tongtien`, `tenphukien`, `created_at`, `updated_at`) VALUES
(1, '2019-12-12', 'Bán lẻ', 21, 23321312, 489747552, 'thuan', '2019-12-08 08:35:03', '2019-12-08 08:35:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banxe`
--

CREATE TABLE `banxe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sohd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BANLE',
  `giaban` int(11) NOT NULL,
  `duatruoc` int(11) NOT NULL,
  `conlai` int(11) NOT NULL,
  `tinhtrang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khachhang_id` bigint(20) UNSIGNED NOT NULL,
  `ngaymua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baohiem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uyquyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lamvang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `muabh` int(11) NOT NULL,
  `aomua` int(11) NOT NULL,
  `mockhoa` int(11) NOT NULL,
  `aotrumxe` int(11) NOT NULL,
  `balo` int(11) NOT NULL,
  `tiengop` int(11) DEFAULT NULL,
  `tongthu` int(11) DEFAULT NULL,
  `thongtinxe_id` bigint(20) UNSIGNED NOT NULL,
  `kho_id` bigint(20) UNSIGNED NOT NULL,
  `tragop_id` bigint(20) UNSIGNED NOT NULL,
  `nhanvien_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banxe`
--

INSERT INTO `banxe` (`id`, `sohd`, `giaban`, `duatruoc`, `conlai`, `tinhtrang`, `khachhang_id`, `ngaymua`, `baohiem`, `uyquyen`, `lamvang`, `muabh`, `aomua`, `mockhoa`, `aotrumxe`, `balo`, `tiengop`, `tongthu`, `thongtinxe_id`, `kho_id`, `tragop_id`, `nhanvien_id`, `created_at`, `updated_at`) VALUES
(1, '3432fds', 230000, 12, 76767, 'bán được', 3, '2019-11-15', '3434', '4234', '321', 1, 1, 2, 0, 0, 1232, NULL, 6, 1, 1, 2, '2019-11-28 07:39:26', '2019-11-28 07:39:26'),
(2, '3432', 2, 1, 1, 'bán được', 3, '2019-11-22', '0', '1', '0', 1, 2, 0, 0, 0, 0, 1, 1, 1, 1, 2, '2019-11-29 09:42:08', '2019-11-30 01:58:39'),
(3, '324d', 343434, 12, 343422, '0', 3, '2019-11-14', '0', '0', '0', 0, 0, 0, 0, 0, 0, 343422, 1, 1, 1, 2, '2019-11-30 02:13:13', '2019-11-30 02:13:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banxi`
--

CREATE TABLE `banxi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `soHD` int(11) NOT NULL,
  `gianhap` int(11) NOT NULL,
  `tinhtrang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaban` int(11) NOT NULL,
  `noixuat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayxuat` datetime NOT NULL,
  `kho_id` bigint(20) UNSIGNED NOT NULL,
  `thongtinxe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi`
--

CREATE TABLE `chi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loaichi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaychi` date NOT NULL,
  `sotien` int(11) NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chitheu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chibienso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `somay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congno`
--

CREATE TABLE `congno` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngaymua` date NOT NULL,
  `giaban` int(11) NOT NULL,
  `tienno` int(11) NOT NULL,
  `tratruoc` int(11) NOT NULL,
  `date1` date DEFAULT NULL,
  `tralan1` int(11) DEFAULT NULL,
  `conlai` int(11) NOT NULL,
  `date2` date DEFAULT NULL,
  `tralan2` int(11) DEFAULT NULL,
  `thongtinxe_id` bigint(20) UNSIGNED NOT NULL,
  `khachhang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `congno`
--

INSERT INTO `congno` (`id`, `ngaymua`, `giaban`, `tienno`, `tratruoc`, `date1`, `tralan1`, `conlai`, `date2`, `tralan2`, `thongtinxe_id`, `khachhang_id`, `created_at`, `updated_at`) VALUES
(5, '2019-11-15', 3434343, 343179, 12, NULL, 243, 343422, NULL, 0, 1, 3, '2019-11-25 07:54:27', '2019-11-25 07:58:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phuong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanhpho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `name`, `ngaysinh`, `sdt`, `diachi`, `phuong`, `thanhpho`, `tinh`, `created_at`, `updated_at`) VALUES
(3, 'hoang ', '10/2/1996', '704614408', '52 tran hung dao', 'ninh phuoc', 'ninh thuan', 'phan rang', '2019-11-20 10:05:34', '2019-11-20 10:05:34'),
(5, 'Quãng Hoàng Thoại1', '2019-11-15', '01204614408', 'khánh hòa1', 'vĩnh hải', 'nha trang', 'khánh hòa', '2019-11-20 10:11:02', '2019-11-20 10:11:02'),
(7, 'yen', '2019-12-12', '0339467546', 'khánh hòa1', 'vĩnh hải', 'nha trang', 'khánh hòa1', '2019-12-01 17:46:17', '2019-12-01 17:46:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dia_diem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`id`, `dia_diem`, `name`, `created_at`, `updated_at`) VALUES
(1, 'cam ranh', 'thoai', '2019-11-11 07:30:56', '2019-11-11 07:30:56'),
(2, 'khanh vinh', 'SB3', '2019-11-18 00:00:08', '2019-11-18 00:00:08'),
(3, 'nha trang', 'TH1', '2019-11-18 00:00:20', '2019-11-18 00:00:20'),
(4, 'quảng hoàng thoại', 'nhân viên kiểm tra', '2019-11-19 00:40:07', '2019-11-19 00:40:07'),
(5, 'đặng anh tiến', 'nhân viên bảo hiểm', '2019-11-19 00:40:07', '2019-11-19 00:40:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khophukien`
--

CREATE TABLE `khophukien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenkho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_diem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluongton` int(11) NOT NULL,
  `nhap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaynhap` date NOT NULL,
  `conlai` int(11) NOT NULL,
  `banphukien_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ktquatang`
--

CREATE TABLE `ktquatang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khachhang_id` bigint(20) UNSIGNED NOT NULL,
  `banxe_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `thongtinxe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ktquatang`
--

INSERT INTO `ktquatang` (`id`, `khachhang_id`, `banxe_id`, `date`, `thongtinxe_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2019-11-15', 1, '2019-11-30 03:39:22', '2019-11-30 05:05:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_10_02_060652_create_kho_table', 1),
(7, '2019_10_02_060915_create_quatang_table', 1),
(8, '2019_10_02_060940_create_tragop_table', 1),
(13, '2019_10_02_061218_create_xuatnoibo_table', 1),
(14, '2019_10_02_061304_create_banxi_table', 1),
(15, '2019_10_03_030534_create_users_role_table', 1),
(16, '2019_11_08_014810_create_role_user_table', 1),
(23, '2019_10_02_060624_create_nhaxe_table', 6),
(24, '2014_10_12_000000_create_users_table', 7),
(26, '2019_10_02_061036_create_khachhang_table', 8),
(27, '2019_10_02_060721_create_nhanvien_table', 9),
(29, '2019_10_02_061109_create_congno_table', 9),
(32, '2019_11_22_144209_create_phukien_table', 9),
(33, '2019_10_02_061008_create_banxe_table', 10),
(35, '2019_10_02_061146_create__k_tquatang_table', 11),
(36, '2019_10_02_060836_create_thongtinxe_table', 12),
(37, '2019_11_22_144028_create_chi_table', 13),
(38, '2019_11_22_143828_create_thungoai_table', 14),
(43, '2019_12_04_153733_create_banphukien_table', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucvu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `name`, `chucvu`, `sdt`, `created_at`, `updated_at`) VALUES
(2, 'thoai', 'banhanf', '07071231', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhapxe`
--

CREATE TABLE `nhapxe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nhacc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaynhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahd` int(255) NOT NULL,
  `ngayhd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maID` int(11) NOT NULL,
  `gianhap` int(11) NOT NULL,
  `loaixe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenxe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doixe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mauxe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sokhung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `somay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dangkiem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoinhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khonhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhapxe`
--

INSERT INTO `nhapxe` (`id`, `nhacc`, `ngaynhan`, `mahd`, `ngayhd`, `maID`, `gianhap`, `loaixe`, `tenxe`, `doixe`, `mauxe`, `sokhung`, `somay`, `dangkiem`, `nguoinhan`, `khonhan`, `created_at`, `updated_at`) VALUES
(1, 'hon da', '2019-11-13', 23, '2019-11-21', 2, 23000000, 'HONDA', 'SH MODE', '2019', 'ĐỎ NÂU', 'RLHJF5158KZ03356323', 'JF87E-5083866', 'coa', 'thoai', 'hô', '2019-11-20 07:49:11', '2019-11-20 07:49:11'),
(2, 'hon da', '10/2/1996', 3, '21/11/2019', 4, 23000, 'hon da', 'sh', '2019', 'xanh', 'zfw635dcđw', '134xcfrss', 'co', 'thoai', 'tu2', '2019-11-21 06:05:31', '2019-11-21 06:05:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phukien`
--

CREATE TABLE `phukien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenphukien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaban` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quatang`
--

CREATE TABLE `quatang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenquatang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quatang`
--

INSERT INTO `quatang` (`id`, `tenquatang`, `created_at`, `updated_at`) VALUES
(1, 'mu bảo hiểm', '2019-11-11 08:18:14', '2019-11-11 08:18:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'employee', 'A Employee User', NULL, NULL),
(2, 'admin', 'Admin User', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinxe`
--

CREATE TABLE `thongtinxe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loaixe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenxe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doixe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mauxe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sokhung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `somay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dongxe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhacc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dangkiem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khonhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khocuoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baohanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ngayquet` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thungoai`
--

CREATE TABLE `thungoai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngaythu` date NOT NULL,
  `loaithu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tienthu` int(11) NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thungoai`
--

INSERT INTO `thungoai` (`id`, `ngaythu`, `loaithu`, `tienthu`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, '2019-12-19', 'Tiền khác', 1231231, 'thsadasd', '2019-12-04 07:30:03', '2019-12-04 07:30:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tragop`
--

CREATE TABLE `tragop` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loaitragop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tragop`
--

INSERT INTO `tragop` (`id`, `loaitragop`, `created_at`, `updated_at`) VALUES
(1, 'BTM1', '2019-11-11 08:18:38', '2019-11-11 08:18:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nhanvien',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quãng Hoàng Thoại1', 'quanghoangthoai@gmail.com', NULL, '$2y$10$LhGifT8rGvsEXM1RPRQOzuhmh9U4eAKKdMSd2LX4RnGtRc4L14nzC', 'admin', 'zgRfbvDQDC0afHzGh3wfRZgp1F3gm9ZuNSZr7vhDR1nYjhlqmhICGSzQhdra', '2019-11-18 16:27:48', '2019-11-18 16:27:48'),
(2, 'dao thuan', 'thuan@gmail.com', NULL, '$2y$10$ZzkGtwOiUm83GHKK552es.dUCWFPtLGqF/iO7m89F9enM5bR3kgsu', 'nhanvien', NULL, '2019-11-26 05:56:23', '2019-11-26 05:56:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatnoibo`
--

CREATE TABLE `xuatnoibo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tinhtrang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayxuat` datetime NOT NULL,
  `thongtinxe_id` bigint(20) UNSIGNED NOT NULL,
  `kho_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `xuatnoibo`
--

INSERT INTO `xuatnoibo` (`id`, `tinhtrang`, `ngayxuat`, `thongtinxe_id`, `kho_id`, `created_at`, `updated_at`) VALUES
(1, 'adad', '2019-11-16 00:00:00', 1, 1, '2019-11-11 08:38:24', '2019-11-11 08:38:24');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banphukien`
--
ALTER TABLE `banphukien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banxe`
--
ALTER TABLE `banxe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kho3_id` (`kho_id`),
  ADD KEY `fk_thongtinxe_id` (`thongtinxe_id`),
  ADD KEY `fk_nhanvien1_id` (`nhanvien_id`),
  ADD KEY `fk_tragop_id` (`tragop_id`),
  ADD KEY `fk_khachhang2_id` (`khachhang_id`);

--
-- Chỉ mục cho bảng `banxi`
--
ALTER TABLE `banxi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi`
--
ALTER TABLE `chi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `congno`
--
ALTER TABLE `congno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_khachhang1_id` (`khachhang_id`),
  ADD KEY `fk_thongtinxe7_id` (`thongtinxe_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khophukien`
--
ALTER TABLE `khophukien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_khophukien_id` (`banphukien_id`);

--
-- Chỉ mục cho bảng `ktquatang`
--
ALTER TABLE `ktquatang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_banxe_id` (`banxe_id`),
  ADD KEY `fk_khachhang_id` (`khachhang_id`),
  ADD KEY `fk_thongtinxe121_id` (`thongtinxe_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhapxe`
--
ALTER TABLE `nhapxe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `phukien`
--
ALTER TABLE `phukien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quatang`
--
ALTER TABLE `quatang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_id` (`role_id`),
  ADD KEY `fk_users_id` (`user_id`);

--
-- Chỉ mục cho bảng `thongtinxe`
--
ALTER TABLE `thongtinxe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thungoai`
--
ALTER TABLE `thungoai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tragop`
--
ALTER TABLE `tragop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `xuatnoibo`
--
ALTER TABLE `xuatnoibo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banphukien`
--
ALTER TABLE `banphukien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `banxe`
--
ALTER TABLE `banxe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `banxi`
--
ALTER TABLE `banxi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chi`
--
ALTER TABLE `chi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `congno`
--
ALTER TABLE `congno`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khophukien`
--
ALTER TABLE `khophukien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ktquatang`
--
ALTER TABLE `ktquatang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhapxe`
--
ALTER TABLE `nhapxe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phukien`
--
ALTER TABLE `phukien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `quatang`
--
ALTER TABLE `quatang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thongtinxe`
--
ALTER TABLE `thongtinxe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thungoai`
--
ALTER TABLE `thungoai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tragop`
--
ALTER TABLE `tragop`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `xuatnoibo`
--
ALTER TABLE `xuatnoibo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banxe`
--
ALTER TABLE `banxe`
  ADD CONSTRAINT `fk_khachhang2_id` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kho3_id` FOREIGN KEY (`kho_id`) REFERENCES `kho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nhanvien1_id` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_thongtinxe_id` FOREIGN KEY (`thongtinxe_id`) REFERENCES `thongtinxe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tragop_id` FOREIGN KEY (`tragop_id`) REFERENCES `tragop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `congno`
--
ALTER TABLE `congno`
  ADD CONSTRAINT `fk_khachhang1_id` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_thongtinxe7_id` FOREIGN KEY (`thongtinxe_id`) REFERENCES `thongtinxe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khophukien`
--
ALTER TABLE `khophukien`
  ADD CONSTRAINT `fk_khophukien_id` FOREIGN KEY (`banphukien_id`) REFERENCES `banphukien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ktquatang`
--
ALTER TABLE `ktquatang`
  ADD CONSTRAINT `fk_banxe_id` FOREIGN KEY (`banxe_id`) REFERENCES `banxe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_khachhang_id` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_thongtinxe121_id` FOREIGN KEY (`thongtinxe_id`) REFERENCES `thongtinxe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
