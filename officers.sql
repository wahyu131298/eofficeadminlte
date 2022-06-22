-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2022 at 12:15 AM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skahawed_memo`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id_log` int(10) UNSIGNED NOT NULL,
  `tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id_log`, `tindakan`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(25, 'Berhasil Login, Username : 001,010,054Password : 001,010,054', 'http://127.0.0.1:8000/authentication', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 17, '2022-06-20 06:32:52', '2022-06-20 06:32:52'),
(26, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://www.office.skahawedding.online/authentication', 'POST', '103.10.62.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 18:56:14', '2022-06-20 18:56:14'),
(27, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR/VII/2022', 'https://www.office.skahawedding.online/insert/surat', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 44, '2022-06-20 18:59:10', '2022-06-20 18:59:10'),
(28, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 42, '2022-06-20 19:00:07', '2022-06-20 19:00:07'),
(29, 'Berhasil Login, Username : 004,018,202Password : 004,018,202', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 27, '2022-06-20 19:00:25', '2022-06-20 19:00:25'),
(30, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR/VII/2022', 'https://www.office.skahawedding.online/insert/forward', 'POST', '103.10.62.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 19:00:54', '2022-06-20 19:00:54'),
(31, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://office.skahawedding.online/authentication', 'POST', '103.10.62.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 19:03:09', '2022-06-20 19:03:09'),
(32, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR/VII/2022', 'https://office.skahawedding.online/hapus/forward/disposisi/surat/220001', 'GET', '103.10.62.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 19:03:28', '2022-06-20 19:03:28'),
(33, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR/VII/2022', 'https://www.office.skahawedding.online/insert/forward', 'POST', '103.10.62.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 19:04:49', '2022-06-20 19:04:49'),
(34, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR/VII/2022', 'https://office.skahawedding.online/hapus/forward/disposisi/surat/220001', 'GET', '103.10.62.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 19:06:09', '2022-06-20 19:06:09'),
(35, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR/VII/2022', 'https://www.office.skahawedding.online/insert/forward', 'POST', '103.10.62.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 19:06:29', '2022-06-20 19:06:29'),
(36, 'Berhasil Login, Username : 945,314Password : 945,314', 'http://office.skahawedding.online/authentication', 'POST', '160.202.42.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-20 19:41:30', '2022-06-20 19:41:30'),
(37, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'http://office.skahawedding.online/insert/surat', 'POST', '160.202.42.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-20 19:42:28', '2022-06-20 19:42:28'),
(38, 'Berhasil Login, Username : 945,314Password : 945,314', 'https://office.skahawedding.online/authentication', 'POST', '160.202.42.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-20 19:43:09', '2022-06-20 19:43:09'),
(39, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI2', 'https://office.skahawedding.online/insert/surat', 'POST', '160.202.42.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-20 19:44:02', '2022-06-20 19:44:02'),
(40, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 42, '2022-06-20 19:46:55', '2022-06-20 19:46:55'),
(41, 'Berhasil Login, Username : 004,018,202Password : 004,018,202', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 27, '2022-06-20 19:47:14', '2022-06-20 19:47:14'),
(42, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI2', 'https://www.office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 19:48:22', '2022-06-20 19:48:22'),
(43, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI2', 'https://office.skahawedding.online/hapus/forward/disposisi/surat/220002', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 19:49:07', '2022-06-20 19:49:07'),
(44, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI2', 'https://www.office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 19:50:11', '2022-06-20 19:50:11'),
(45, 'Berhasil Login, Username : 004,018,202Password : 004,018,202', 'https://office.skahawedding.online/authentication', 'POST', '160.202.42.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 27, '2022-06-20 19:51:23', '2022-06-20 19:51:23'),
(46, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI2', 'https://office.skahawedding.online/hapus/forward/disposisi/surat/220002', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 19:51:42', '2022-06-20 19:51:42'),
(47, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI2', 'https://www.office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 19:51:58', '2022-06-20 19:51:58'),
(48, 'Berhasil Login, Username : 004,018,202Password : 004,018,202', 'https://office.skahawedding.online/authentication', 'POST', '160.202.42.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 27, '2022-06-20 19:53:46', '2022-06-20 19:53:46'),
(49, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI2', 'https://office.skahawedding.online/hapus/forward/disposisi/surat/220002', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 19:54:41', '2022-06-20 19:54:41'),
(50, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI2', 'https://www.office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 19:55:24', '2022-06-20 19:55:24'),
(51, 'Berhasil Login, Username : 004,018,202Password : 004,018,202', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 27, '2022-06-20 19:55:58', '2022-06-20 19:55:58'),
(52, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://www.office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 19:56:33', '2022-06-20 19:56:33'),
(53, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI2', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220603', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 19:59:44', '2022-06-20 19:59:44'),
(54, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://office.skahawedding.online/hapus/forward/disposisi/surat/220003', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 20:00:30', '2022-06-20 20:00:30'),
(55, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://www.office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 20:00:39', '2022-06-20 20:00:39'),
(56, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://office.skahawedding.online/hapus/forward/disposisi/surat/220002', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 20:03:34', '2022-06-20 20:03:34'),
(57, 'Berhasil Login, Username : 004,018,202Password : 004,018,202', 'https://office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 27, '2022-06-20 20:04:03', '2022-06-20 20:04:03'),
(58, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://www.office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 20:04:17', '2022-06-20 20:04:17'),
(59, 'Berhasil Login, Username : 004,018,202Password : 004,018,202', 'https://office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 27, '2022-06-20 20:06:57', '2022-06-20 20:06:57'),
(60, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://office.skahawedding.online/hapus/forward/disposisi/surat/220002', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 20:07:22', '2022-06-20 20:07:22'),
(61, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR/VII/2022', 'https://office.skahawedding.online/hapus/forward/disposisi/surat/220001', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 20:07:28', '2022-06-20 20:07:28'),
(62, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://www.office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 20:07:59', '2022-06-20 20:07:59'),
(63, 'Berhasil Login, Username : 001,009,044Password : 001,009,044', 'https://office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 16, '2022-06-20 20:09:38', '2022-06-20 20:09:38'),
(64, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://office.skahawedding.online/hapus/forward/disposisi/surat/220001', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-20 20:10:04', '2022-06-20 20:10:04'),
(65, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://www.office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 20:10:25', '2022-06-20 20:10:25'),
(66, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://www.office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 20:10:43', '2022-06-20 20:10:43'),
(67, 'DURROTUN NAFISAH. S. Tr. GZ (Kepala Ruang Gizi)  Membuat Memo Intern 02/MEMOTES/2022', 'https://office.skahawedding.online/insert-memo', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 27, '2022-06-20 20:16:22', '2022-06-20 20:16:22'),
(68, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Menyetujuai Memo 02/MEMOTES/2022', 'https://www.office.skahawedding.online/memo/setuju/220001', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-20 20:17:19', '2022-06-20 20:17:19'),
(69, 'Berhasil Login, Username : 004,018,202Password : 004,018,202', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 27, '2022-06-21 01:32:08', '2022-06-21 01:32:08'),
(70, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 3, '2022-06-21 01:34:30', '2022-06-21 01:34:30'),
(71, 'Gagal Login, Username : 001,009,044Password : 001,009,044', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 1, '2022-06-21 01:38:09', '2022-06-21 01:38:09'),
(72, 'Berhasil Login, Username : 001,009,044Password : ganti', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 16, '2022-06-21 01:38:25', '2022-06-21 01:38:25'),
(73, 'Berhasil Login, Username : 001,009,044Password : ganti', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 16, '2022-06-21 01:38:53', '2022-06-21 01:38:53'),
(74, 'Gagal Login, Username : 001,009,044Password : ganti', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 1, '2022-06-21 01:39:26', '2022-06-21 01:39:26'),
(75, 'Berhasil Login, Username : 001,009,044Password : 001,009,044', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 16, '2022-06-21 01:39:35', '2022-06-21 01:39:35'),
(76, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.59.180', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 3, '2022-06-21 01:40:58', '2022-06-21 01:40:58'),
(77, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://www.office.skahawedding.online/authentication', 'POST', '160.202.42.10', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 3, '2022-06-21 17:37:38', '2022-06-21 17:37:38'),
(78, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://www.office.skahawedding.online/authentication', 'POST', '160.202.42.10', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 3, '2022-06-21 17:41:50', '2022-06-21 17:41:50'),
(79, 'Berhasil Login, Username : 945,314Password : 945,314', 'https://www.office.skahawedding.online/authentication', 'POST', '160.202.42.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 17:43:16', '2022-06-21 17:43:16'),
(80, 'Wahyu Lazzuardy, S.Kom (Administrator)  Membuat Memo Intern 99988', 'https://www.office.skahawedding.online/insert-memo', 'POST', '160.202.42.10', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 3, '2022-06-21 17:43:53', '2022-06-21 17:43:53'),
(81, 'Berhasil Login, Username : 002,001,012Password : 002,001,012', 'https://www.office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Linux; Android 10; M2007J20CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.101 Mobile Safari/537.36', 21, '2022-06-21 17:53:43', '2022-06-21 17:53:43'),
(82, 'Wahyu Lazzuardy, S.Kom (Administrator)  Membuat Memo Intern 999999', 'https://www.office.skahawedding.online/insert-memo', 'POST', '125.164.1.238', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 3, '2022-06-21 17:55:18', '2022-06-21 17:55:18'),
(83, 'Wahyu Lazzuardy, S.Kom (Administrator)  Membuat Memo Intern 999nnv', 'https://www.office.skahawedding.online/insert-memo', 'POST', '125.164.1.238', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 3, '2022-06-21 17:59:27', '2022-06-21 17:59:27'),
(84, 'Berhasil Login, Username : 002,014,107Password : 002,014,107', 'https://www.office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 23, '2022-06-21 17:59:50', '2022-06-21 17:59:50'),
(85, 'IRWAN HABIBI, S. Kep. Ns (Kepala Bidang Keperawatan)  Menyetujuai Memo 999nnv', 'https://www.office.skahawedding.online/memo/setuju/220004', 'GET', '125.164.1.238', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 23, '2022-06-21 18:00:03', '2022-06-21 18:00:03'),
(86, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://www.office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.5 Safari/605.1.15', 42, '2022-06-21 18:03:40', '2022-06-21 18:03:40'),
(87, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit 888/00M/IMM/XII/2021', 'https://www.office.skahawedding.online/insert/surat', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 18:04:03', '2022-06-21 18:04:03'),
(88, 'Berhasil Login, Username : 001,009,044Password : 001,009,044', 'https://www.office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 16, '2022-06-21 18:26:40', '2022-06-21 18:26:40'),
(89, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit 888/2222/XII/2023', 'https://www.office.skahawedding.online/insert/surat', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 18:28:00', '2022-06-21 18:28:00'),
(90, 'Berhasil Login, Username : 001,009,044Password : 001,009,044', 'https://www.office.skahawedding.online/authentication', 'POST', '103.10.62.238', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 16, '2022-06-21 18:28:42', '2022-06-21 18:28:42'),
(91, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit 02/TES DISPOSISI/02/2020', 'https://www.office.skahawedding.online/insert/surat', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 18:29:35', '2022-06-21 18:29:35'),
(92, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit BARU', 'https://www.office.skahawedding.online/insert/surat', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 18:30:47', '2022-06-21 18:30:47'),
(93, 'Gagal Login, Username : 001,009,004Password : 001,009,004', 'https://office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 1, '2022-06-21 18:32:16', '2022-06-21 18:32:16'),
(94, 'Berhasil Login, Username : 001,009,044Password : 001,009,044', 'https://office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 16, '2022-06-21 18:32:29', '2022-06-21 18:32:29'),
(95, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://www.office.skahawedding.online/insert/surat', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 18:33:29', '2022-06-21 18:33:29'),
(96, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 16, '2022-06-21 18:34:37', '2022-06-21 18:34:37'),
(97, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 16, '2022-06-21 18:35:13', '2022-06-21 18:35:13'),
(98, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://www.office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Android 9; Mobile; rv:101.0) Gecko/101.0 Firefox/101.0', 42, '2022-06-21 18:49:37', '2022-06-21 18:49:37'),
(99, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 16, '2022-06-21 18:50:32', '2022-06-21 18:50:32'),
(100, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://www.office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-21 18:53:20', '2022-06-21 18:53:20'),
(101, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://www.office.skahawedding.online/hapus/forward/disposisi/surat/220005', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-21 18:53:38', '2022-06-21 18:53:38'),
(102, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 16, '2022-06-21 18:53:57', '2022-06-21 18:53:57'),
(103, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://www.office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 42, '2022-06-21 18:55:07', '2022-06-21 18:55:07'),
(104, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://www.office.skahawedding.online/hapus/forward/disposisi/surat/220005', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-21 18:55:41', '2022-06-21 18:55:41'),
(105, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 16, '2022-06-21 18:55:53', '2022-06-21 18:55:53'),
(106, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://www.office.skahawedding.online/hapus/forward/disposisi/surat/220005', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-21 18:56:17', '2022-06-21 18:56:17'),
(107, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 16, '2022-06-21 18:57:02', '2022-06-21 18:57:02'),
(108, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://www.office.skahawedding.online/hapus/forward/disposisi/surat/220005', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-21 18:58:00', '2022-06-21 18:58:00'),
(109, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://office.skahawedding.online/insert/forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 16, '2022-06-21 18:58:36', '2022-06-21 18:58:36'),
(110, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://www.office.skahawedding.online/hapus/forward/disposisi/surat/220005', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 3, '2022-06-21 18:59:33', '2022-06-21 18:59:33'),
(111, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Membuat Memo Intern tes', 'https://office.skahawedding.online/insert-memo', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 16, '2022-06-21 19:01:23', '2022-06-21 19:01:23'),
(112, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Memo tes', 'https://www.office.skahawedding.online/insert-disposisi', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 19:02:15', '2022-06-21 19:02:15'),
(113, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Hapus Disposisi Memo Intern tes', 'https://www.office.skahawedding.online/disposisi/hapus/220601', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 19:02:57', '2022-06-21 19:02:57'),
(114, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Memo tes', 'https://www.office.skahawedding.online/insert-disposisi', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 19:04:15', '2022-06-21 19:04:15'),
(115, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Hapus Disposisi Memo Intern tes', 'https://www.office.skahawedding.online/disposisi/hapus/220601', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 19:04:36', '2022-06-21 19:04:36'),
(116, 'Berhasil Login, Username : 001,009,044Password : 001,009,044', 'https://office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-21 19:05:49', '2022-06-21 19:05:49'),
(117, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Memo tes', 'https://www.office.skahawedding.online/insert-disposisi', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-21 19:06:20', '2022-06-21 19:06:20'),
(118, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://www.office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-21 19:06:38', '2022-06-21 19:06:38'),
(119, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Memo Instern tes', 'https://office.skahawedding.online/insert-forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-21 19:07:18', '2022-06-21 19:07:18'),
(120, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://www.office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 3, '2022-06-21 19:08:46', '2022-06-21 19:08:46'),
(121, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Memo Intern tes', 'https://www.office.skahawedding.online/forward/disposisi/hapus/220001', 'GET', '125.164.1.238', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 3, '2022-06-21 19:09:04', '2022-06-21 19:09:04'),
(122, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Memo Instern tes', 'https://office.skahawedding.online/insert-forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-21 19:09:45', '2022-06-21 19:09:45'),
(123, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Memo Intern tes', 'https://www.office.skahawedding.online/forward/disposisi/hapus/220001', 'GET', '125.164.1.238', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 3, '2022-06-21 19:13:02', '2022-06-21 19:13:02'),
(124, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Memo Instern tes', 'https://office.skahawedding.online/insert-forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-21 19:14:12', '2022-06-21 19:14:12'),
(125, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Forward Disposisi Memo Intern tes', 'https://www.office.skahawedding.online/forward/disposisi/hapus/220001', 'GET', '125.164.1.238', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 3, '2022-06-21 19:14:54', '2022-06-21 19:14:54'),
(126, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Memo Instern tes', 'https://office.skahawedding.online/insert-forward', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-21 19:15:09', '2022-06-21 19:15:09'),
(127, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Menolak Memo 999999', 'https://office.skahawedding.online/memo/tolak?_method=PUT&_token=j1qUWLG5UZby33jhCMHAqmcKTy86VH8UxH28riJY&catatan=ll&nomemo=220003', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-21 19:15:37', '2022-06-21 19:15:37'),
(128, 'Berhasil Login, Username : 004,018,202Password : 004,018,202', 'https://office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 27, '2022-06-21 19:16:43', '2022-06-21 19:16:43'),
(129, 'DURROTUN NAFISAH. S. Tr. GZ (Kepala Ruang Gizi)  Membuat Memo Intern 02/MEMOTES/2022', 'https://office.skahawedding.online/insert-memo', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 27, '2022-06-21 19:17:52', '2022-06-21 19:17:52'),
(130, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Menyetujuai Memo 02/MEMOTES/2022', 'https://www.office.skahawedding.online/memo/setuju/220006', 'GET', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-21 19:18:16', '2022-06-21 19:18:16'),
(131, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://www.office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 3, '2022-06-21 20:22:58', '2022-06-21 20:22:58'),
(132, 'Berhasil Login, Username : 004,018,202Password : 004,018,202', 'https://office.skahawedding.online/authentication', 'POST', '125.164.1.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 27, '2022-06-21 20:26:42', '2022-06-21 20:26:42'),
(133, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.57.173', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 3, '2022-06-21 22:43:24', '2022-06-21 22:43:24'),
(134, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.57.173', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 42, '2022-06-21 22:44:11', '2022-06-21 22:44:11'),
(135, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.57.173', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 3, '2022-06-21 22:44:23', '2022-06-21 22:44:23'),
(136, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://office.skahawedding.online/authentication', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 09:44:51', '2022-06-22 09:44:51'),
(137, 'Berhasil Login, Username : 945,314Password : 945,314', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 44, '2022-06-22 09:45:13', '2022-06-22 09:45:13'),
(138, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR2/VII/2022', 'https://www.office.skahawedding.online/insert/surat', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 44, '2022-06-22 09:46:09', '2022-06-22 09:46:09'),
(139, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit 01/M/XII/2019', 'https://www.office.skahawedding.online/insert/surat', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Mobile Safari/537.36', 44, '2022-06-22 09:48:22', '2022-06-22 09:48:22'),
(140, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern TESNOTIF2', 'https://office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 09:50:07', '2022-06-22 09:50:07'),
(141, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern TES ERROR 3', 'https://office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 09:58:37', '2022-06-22 09:58:37'),
(142, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit 01/M/XII/2019', 'https://office.skahawedding.online/insert/forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 09:59:44', '2022-06-22 09:59:44'),
(143, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Memo TES ERROR 3', 'https://www.office.skahawedding.online/insert-disposisi', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 44, '2022-06-22 10:00:56', '2022-06-22 10:00:56'),
(144, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Memo Instern TES ERROR 3', 'https://office.skahawedding.online/insert-forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 10:01:26', '2022-06-22 10:01:26'),
(145, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR2/VII/2022', 'https://office.skahawedding.online/insert/forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 10:02:46', '2022-06-22 10:02:46'),
(146, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit 888/00M/IMM/XII/2021', 'https://office.skahawedding.online/insert/forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 10:13:04', '2022-06-22 10:13:04'),
(147, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit BARU SEKALI', 'https://www.office.skahawedding.online/insert/surat', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 44, '2022-06-22 10:14:24', '2022-06-22 10:14:24'),
(148, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit BARU SEKALI', 'https://office.skahawedding.online/insert/forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 10:15:05', '2022-06-22 10:15:05'),
(149, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit BARUNEW', 'https://www.office.skahawedding.online/insert/surat', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 44, '2022-06-22 10:17:17', '2022-06-22 10:17:17'),
(150, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit BARUNEW', 'https://office.skahawedding.online/insert/forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 10:17:52', '2022-06-22 10:17:52'),
(151, 'Berhasil Login, Username : 170602054Password : 170602054', 'https://office.skahawedding.online/authentication', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:19:09', '2022-06-22 10:19:09'),
(152, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR/VII/2022', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220601', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:19:30', '2022-06-22 10:19:30'),
(153, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit TESDISPOSISI1', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220602', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:19:36', '2022-06-22 10:19:36'),
(154, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit 888/00M/IMM/XII/2021', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220603', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:19:42', '2022-06-22 10:19:42'),
(155, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit 888/2222/XII/2023', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220604', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:19:49', '2022-06-22 10:19:49'),
(156, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit 02/TES DISPOSISI/02/2020', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220605', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:19:56', '2022-06-22 10:19:56'),
(157, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit BARU', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220606', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:20:05', '2022-06-22 10:20:05'),
(158, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit COBA2', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220607', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:20:13', '2022-06-22 10:20:13'),
(159, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit 10/SURATLUAR2/VII/2022', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220608', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:20:21', '2022-06-22 10:20:21'),
(160, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit 01/M/XII/2019', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220609', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:20:27', '2022-06-22 10:20:27'),
(161, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit BARU SEKALI', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220610', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:20:33', '2022-06-22 10:20:33'),
(162, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Disposisi Surat Dari Luar Rumah Sakit BARUNEW', 'https://office.skahawedding.online/hapus/surat/disposisi/terkirim/220611', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:20:39', '2022-06-22 10:20:39'),
(163, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Memo TES ERROR 3', 'https://office.skahawedding.online/memo/hapus/220008', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:21:12', '2022-06-22 10:21:12'),
(164, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Memo TESNOTIF2', 'https://office.skahawedding.online/memo/hapus/220007', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:21:18', '2022-06-22 10:21:18'),
(165, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Memo 02/MEMOTES/2022', 'https://office.skahawedding.online/memo/hapus/220006', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:21:25', '2022-06-22 10:21:25'),
(166, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Memo tes', 'https://office.skahawedding.online/memo/hapus/220005', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:21:34', '2022-06-22 10:21:34'),
(167, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Memo 999nnv', 'https://office.skahawedding.online/memo/hapus/220004', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:21:40', '2022-06-22 10:21:40'),
(168, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Memo 999999', 'https://office.skahawedding.online/memo/hapus/220003', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:21:45', '2022-06-22 10:21:45'),
(169, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Memo 99988', 'https://office.skahawedding.online/memo/hapus/220002', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:21:51', '2022-06-22 10:21:51'),
(170, 'Wahyu Lazzuardy, S.Kom (Administrator)  Hapus Memo 02/MEMOTES/2022', 'https://office.skahawedding.online/memo/hapus/220001', 'GET', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 3, '2022-06-22 10:21:58', '2022-06-22 10:21:58'),
(171, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://office.skahawedding.online/authentication', 'POST', '140.213.57.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-22 10:24:01', '2022-06-22 10:24:01');
INSERT INTO `log_activities` (`id_log`, `tindakan`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(172, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern Hhhh', 'https://office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-22 10:25:11', '2022-06-22 10:25:11'),
(173, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern TES BARU', 'https://office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-22 10:26:33', '2022-06-22 10:26:33'),
(174, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Memo TES BARU', 'https://www.office.skahawedding.online/insert-disposisi', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 44, '2022-06-22 10:27:19', '2022-06-22 10:27:19'),
(175, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Memo Instern TES BARU', 'https://office.skahawedding.online/insert-forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-22 10:28:02', '2022-06-22 10:28:02'),
(176, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Hapus Forward Disposisi Memo Intern TES BARU', 'https://office.skahawedding.online/forward/disposisi/hapus/220001', 'GET', '140.213.57.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-22 10:28:38', '2022-06-22 10:28:38'),
(177, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Memo Instern TES BARU', 'https://office.skahawedding.online/insert-forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-22 10:29:10', '2022-06-22 10:29:10'),
(178, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern Sssss', 'https://office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 42, '2022-06-22 10:30:41', '2022-06-22 10:30:41'),
(179, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit 01/00M/IMM/XII/2019', 'https://www.office.skahawedding.online/insert/surat', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 44, '2022-06-22 10:42:21', '2022-06-22 10:42:21'),
(180, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit 01/IMMGRESIK/XII/2022', 'https://www.office.skahawedding.online/insert/surat', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 44, '2022-06-22 10:43:50', '2022-06-22 10:43:50'),
(181, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit BARU', 'https://www.office.skahawedding.online/insert/surat', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 44, '2022-06-22 10:44:39', '2022-06-22 10:44:39'),
(182, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Forward Disposisi Surat Dari Luar Rumah Sakit BARU', 'https://office.skahawedding.online/insert/forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 10:45:04', '2022-06-22 10:45:04'),
(183, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern TES BARU', 'https://office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; CPH2083) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 42, '2022-06-22 10:46:20', '2022-06-22 10:46:20'),
(184, 'Berhasil Login, Username : 945,314Password : 945,314', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-22 12:09:20', '2022-06-22 12:09:20'),
(185, 'Berhasil Login, Username : 002,098,005Password : 002,098,005', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-22 12:10:00', '2022-06-22 12:10:00'),
(186, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern 02/tesonline', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-22 12:11:13', '2022-06-22 12:11:13'),
(187, 'Berhasil Login, Username : 001,009,044Password : 001,009,044', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-22 12:11:39', '2022-06-22 12:11:39'),
(188, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern TESONLINE2', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-22 12:12:26', '2022-06-22 12:12:26'),
(189, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern TES ONLINE3', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-22 12:13:10', '2022-06-22 12:13:10'),
(190, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern COBA', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-22 12:14:13', '2022-06-22 12:14:13'),
(191, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Memo COBA', 'https://www.office.skahawedding.online/insert-disposisi', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-22 12:15:29', '2022-06-22 12:15:29'),
(192, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Membuat Memo Intern 11/GIZINER/2022', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-22 12:22:45', '2022-06-22 12:22:45'),
(193, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Membuat Memo Intern 09/knkp/VI/2022', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-22 12:23:32', '2022-06-22 12:23:32'),
(194, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Membuat Memo Intern 09/TESNOTIFBARU/VI/2022', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-22 12:24:12', '2022-06-22 12:24:12'),
(195, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Memo 09/TESNOTIFBARU/VI/2022', 'https://www.office.skahawedding.online/insert-disposisi', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-22 12:24:45', '2022-06-22 12:24:45'),
(196, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Memo Instern 09/TESNOTIFBARU/VI/2022', 'https://www.office.skahawedding.online/insert-forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-22 12:25:25', '2022-06-22 12:25:25'),
(197, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit 888/ANAYR/2021', 'https://www.office.skahawedding.online/insert/surat', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-22 12:27:31', '2022-06-22 12:27:31'),
(198, 'drs. HENDRIK STIYAWAN, MMRS (Kepala Bidang Pelayanan Medis)  Forward Disposisi Surat Dari Luar Rumah Sakit 888/ANAYR/2021', 'https://www.office.skahawedding.online/insert/forward', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-22 12:27:56', '2022-06-22 12:27:56'),
(199, 'dr. UMI JULAIKAH, M. Kes (Direktur)  Disposisi Surat Dari Luar Rumah Sakit BARULOGO', 'https://www.office.skahawedding.online/insert/surat', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 44, '2022-06-22 12:43:46', '2022-06-22 12:43:46'),
(200, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern 02/BARU/LOH/2022', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-22 12:44:50', '2022-06-22 12:44:50'),
(201, 'Berhasil Login, Username : 001,009,044Password : 001,009,044', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.57.9', 'Mozilla/5.0 (Linux; Android 9; ASUS_X01BDA) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Mobile Safari/537.36', 16, '2022-06-22 12:45:44', '2022-06-22 12:45:44'),
(202, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern MEMOUNDNAGAN', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-22 12:46:36', '2022-06-22 12:46:36'),
(203, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern UNDANGAN ONLINE', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-22 12:48:16', '2022-06-22 12:48:16'),
(204, 'Berhasil Login, Username : 001,009,044Password : 001,009,044', 'https://www.office.skahawedding.online/authentication', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.44', 16, '2022-06-22 12:49:24', '2022-06-22 12:49:24'),
(205, 'SITI MARSIYAH, S. Kep.,Ns (Kepala Bagian Umum)  Membuat Memo Intern 03/UNDANGAN', 'https://www.office.skahawedding.online/insert-memo', 'POST', '140.213.57.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:101.0) Gecko/20100101 Firefox/101.0', 42, '2022-06-22 12:50:44', '2022-06-22 12:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(36, '2022_01_14_033602_tb_jabatan', 1),
(37, '2022_01_15_014258_tb_user', 1),
(38, '2022_01_19_024723_tb_memo', 1),
(39, '2022_01_26_024940_tb_detail_kepada', 2),
(40, '2022_01_26_030443_tb_detail_cc', 3),
(41, '2022_02_02_003600_tb_disposisi', 4),
(42, '2022_02_02_021225_tb_detail_disposisi', 5),
(43, '2022_02_03_021250_tb_setting', 6),
(44, '2022_02_12_014155_tb_forward', 7),
(45, '2022_02_12_033142_tb_detail_forward', 7),
(46, '2022_02_16_144505_tb_surat', 8),
(47, '2022_02_17_013921_tb_forward_surat', 9),
(48, '2022_02_18_123448_tb_log', 10),
(49, '2022_06_12_054845_add_colom_table_user', 11),
(50, '2022_06_12_075835_add_device_token', 12),
(51, '2022_06_20_104003_create_log_activities', 13);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_disposisi`
--

CREATE TABLE `tb_detail_disposisi` (
  `id_detail_dispo` int(10) UNSIGNED NOT NULL,
  `id_disposisi_detail` int(11) NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepada_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_disposisi_dilihat` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_detail_disposisi`
--

INSERT INTO `tb_detail_disposisi` (`id_detail_dispo`, `id_disposisi_detail`, `no_surat`, `kepada_disposisi`, `tgl_disposisi_dilihat`, `created_at`, `updated_at`) VALUES
(73, 220601, 'TES BARU', 'JAB-000033', NULL, '2022-06-22 10:27:19', '2022-06-22 10:27:19'),
(74, 220602, 'COBA', 'JAB-000006', NULL, '2022-06-22 12:15:29', '2022-06-22 12:15:29'),
(75, 220603, '09/TESNOTIFBARU/VI/2022', 'JAB-000006', NULL, '2022-06-22 12:24:45', '2022-06-22 12:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_kepada`
--

CREATE TABLE `tb_detail_kepada` (
  `id_detail_kepada` int(10) UNSIGNED NOT NULL,
  `id_detail_memo` int(11) NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('belum','sudah') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum',
  `tgl_lihat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_detail_kepada`
--

INSERT INTO `tb_detail_kepada` (`id_detail_kepada`, `id_detail_memo`, `no_surat`, `jabatan_id`, `status`, `tgl_lihat`, `created_at`, `updated_at`) VALUES
(427, 220001, 'Hhhh', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 10:25:11', '2022-06-22 10:25:11'),
(428, 220002, 'TES BARU', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 10:26:33', '2022-06-22 10:26:33'),
(429, 220003, 'Sssss', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 10:30:41', '2022-06-22 10:30:41'),
(430, 220004, 'TES BARU', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 10:46:20', '2022-06-22 10:46:20'),
(431, 220005, '02/tesonline', 'JAB-000006', 'belum', '0000-00-00', '2022-06-22 12:11:13', '2022-06-22 12:11:13'),
(432, 220005, '02/tesonline', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 12:11:13', '2022-06-22 12:11:13'),
(433, 220006, 'TESONLINE2', 'JAB-000006', 'belum', '0000-00-00', '2022-06-22 12:12:26', '2022-06-22 12:12:26'),
(434, 220006, 'TESONLINE2', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 12:12:26', '2022-06-22 12:12:26'),
(435, 220007, 'TES ONLINE3', 'JAB-000006', 'belum', '0000-00-00', '2022-06-22 12:13:10', '2022-06-22 12:13:10'),
(436, 220007, 'TES ONLINE3', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 12:13:10', '2022-06-22 12:13:10'),
(437, 220008, 'COBA', 'JAB-000006', 'belum', '0000-00-00', '2022-06-22 12:14:13', '2022-06-22 12:14:13'),
(438, 220008, 'COBA', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 12:14:13', '2022-06-22 12:14:13'),
(439, 220009, '11/GIZINER/2022', 'JAB-000033', 'belum', '0000-00-00', '2022-06-22 12:22:45', '2022-06-22 12:22:45'),
(440, 220009, '11/GIZINER/2022', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 12:22:45', '2022-06-22 12:22:45'),
(441, 220010, '09/knkp/VI/2022', 'JAB-000033', 'belum', '0000-00-00', '2022-06-22 12:23:32', '2022-06-22 12:23:32'),
(442, 220010, '09/knkp/VI/2022', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 12:23:32', '2022-06-22 12:23:32'),
(443, 220011, '09/TESNOTIFBARU/VI/2022', 'JAB-000033', 'belum', '0000-00-00', '2022-06-22 12:24:12', '2022-06-22 12:24:12'),
(444, 220011, '09/TESNOTIFBARU/VI/2022', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 12:24:12', '2022-06-22 12:24:12'),
(445, 220012, '02/BARU/LOH/2022', 'JAB-000006', 'belum', '0000-00-00', '2022-06-22 12:44:50', '2022-06-22 12:44:50'),
(446, 220012, '02/BARU/LOH/2022', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 12:44:50', '2022-06-22 12:44:50'),
(447, 220013, 'MEMOUNDNAGAN', 'JAB-000006', 'belum', '0000-00-00', '2022-06-22 12:46:36', '2022-06-22 12:46:36'),
(448, 220013, 'MEMOUNDNAGAN', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 12:46:36', '2022-06-22 12:46:36'),
(449, 220014, 'UNDANGAN ONLINE', 'JAB-000006', 'belum', '0000-00-00', '2022-06-22 12:48:16', '2022-06-22 12:48:16'),
(450, 220014, 'UNDANGAN ONLINE', 'JAB-000005', 'belum', '0000-00-00', '2022-06-22 12:48:16', '2022-06-22 12:48:16'),
(451, 220015, '03/UNDANGAN', 'JAB-000006', 'sudah', '2022-06-22', '2022-06-22 12:50:44', '2022-06-22 12:51:59'),
(452, 220015, '03/UNDANGAN', 'JAB-000008', 'belum', '0000-00-00', '2022-06-22 12:50:44', '2022-06-22 12:50:44'),
(453, 220015, '03/UNDANGAN', 'JAB-000015', 'belum', '0000-00-00', '2022-06-22 12:50:44', '2022-06-22 12:50:44'),
(454, 220015, '03/UNDANGAN', 'JAB-000005', 'sudah', '2022-06-22', '2022-06-22 12:50:44', '2022-06-22 12:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_memo_disposisi` int(11) NOT NULL,
  `no_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim_memo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `pengirim_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_disposisi`
--

INSERT INTO `tb_disposisi` (`id_disposisi`, `id_memo_disposisi`, `no_surat`, `sifat`, `perihal`, `pengirim_memo`, `tgl_surat`, `pengirim_disposisi`, `isi`, `tgl_disposisi`, `created_at`, `updated_at`) VALUES
(220601, 220002, 'TES BARU', 'Rahasia', 'Tes motif', 'JAB-000033', '2022-06-22', 'JAB-000005', 'Bhhh', '2022-06-22', '2022-06-22 10:27:19', '2022-06-22 10:27:19'),
(220602, 220008, 'COBA', 'Sangat Segera', 'A', 'JAB-000033', '2022-06-22', 'JAB-000005', 'AAAA', '2022-06-22', '2022-06-22 12:15:29', '2022-06-22 12:15:29'),
(220603, 220011, '09/TESNOTIFBARU/VI/2022', 'Sangat Segera', 'SSSS', 'JAB-000006', '2022-06-22', 'JAB-000005', 'DDD', '2022-06-22', '2022-06-22 12:24:45', '2022-06-22 12:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forward_disposisi`
--

CREATE TABLE `tb_forward_disposisi` (
  `id_forward` int(11) NOT NULL,
  `id_disposisi_frw` int(11) NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `tgl_dibaca` date DEFAULT NULL,
  `isi_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_forward_disposisi`
--

INSERT INTO `tb_forward_disposisi` (`id_forward`, `id_disposisi_frw`, `no_surat`, `pengirim`, `tujuan`, `status`, `tgl_dibaca`, `isi_disposisi`, `created_at`, `updated_at`) VALUES
(220001, 220601, 'TES BARU', 'JAB-000033', 'JAB-000005', '1', NULL, 'Bbbbb', '2022-06-22 10:29:10', '2022-06-22 10:29:10'),
(220002, 220603, '09/TESNOTIFBARU/VI/2022', 'JAB-000006', 'JAB-000033', '2', '2022-06-22', 'GGGG', '2022-06-22 12:25:25', '2022-06-22 12:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forward_surat`
--

CREATE TABLE `tb_forward_surat` (
  `id_forward` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_forward` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dibaca` date DEFAULT NULL,
  `tgl_forward` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_forward_surat`
--

INSERT INTO `tb_forward_surat` (`id_forward`, `id_surat`, `no_surat`, `pengirim`, `penerima`, `isi_forward`, `tgl_dibaca`, `tgl_forward`, `created_at`, `updated_at`) VALUES
(220001, 220603, 'BARU', 'JAB-000033', 'JAB-000005', 'Kjjj', NULL, '2022-06-22', '2022-06-22 10:45:04', '2022-06-22 10:45:04'),
(220002, 220604, '888/ANAYR/2021', 'JAB-000006', 'JAB-000033', 'F', '2022-06-22', '2022-06-22', '2022-06-22 12:27:56', '2022-06-22 12:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `jabatan`, `created_at`, `updated_at`) VALUES
('admin', 'Administrator', '2022-01-21 21:58:14', '2022-02-12 23:32:13'),
('JAB-000005', 'Direktur', '2022-03-07 01:57:12', '2022-03-07 01:57:12'),
('JAB-000006', 'Kepala Bidang Pelayanan Medis', '2022-03-07 01:57:30', '2022-03-07 01:57:30'),
('JAB-000007', 'Ketua KMKP', '2022-03-07 01:57:42', '2022-03-07 01:57:42'),
('JAB-000008', 'Kepala Ruang IGD', '2022-03-07 01:57:52', '2022-03-07 01:57:52'),
('JAB-000009', 'Kepala Ruang IBS', '2022-03-07 01:58:06', '2022-03-07 01:58:06'),
('JAB-000010', 'Kepala Ruang ICU', '2022-03-07 01:58:22', '2022-03-07 01:58:22'),
('JAB-000011', 'Kepala Ruang Bersalin', '2022-03-07 01:58:37', '2022-03-07 01:58:37'),
('JAB-000012', 'Kepala Ruang Rawat Inap', '2022-03-07 01:58:46', '2022-03-07 01:58:46'),
('JAB-000013', 'Kepala Bidang Keperawatan', '2022-03-07 01:58:55', '2022-03-07 01:58:55'),
('JAB-000014', 'Kepala Ruang Laboratorium', '2022-03-07 01:59:05', '2022-03-07 01:59:05'),
('JAB-000015', 'Kepala Ruang Farmasi', '2022-03-07 01:59:13', '2022-03-07 01:59:13'),
('JAB-000016', 'Kepala Ruang Rekam Medis', '2022-03-07 01:59:23', '2022-03-07 01:59:23'),
('JAB-000017', 'Kepala Ruang Gizi', '2022-03-07 01:59:31', '2022-03-07 01:59:31'),
('JAB-000018', 'Kepala Bagian Keuangan', '2022-03-07 01:59:39', '2022-03-07 01:59:39'),
('JAB-000019', 'Bagian Perpajakan', '2022-03-07 01:59:46', '2022-03-07 01:59:46'),
('JAB-000020', 'Bendahara', '2022-03-07 01:59:54', '2022-03-07 01:59:54'),
('JAB-000021', 'Kepala Bidang Penunjang Medis', '2022-03-07 02:00:04', '2022-03-07 02:00:04'),
('JAB-000022', 'Ketua IPCN / PPI', '2022-03-07 02:00:15', '2022-03-07 02:00:15'),
('JAB-000024', 'Kepala Seksi Administrasi', '2022-03-07 02:00:36', '2022-03-07 02:00:36'),
('JAB-000025', 'Diklat dan Marketing', '2022-03-07 02:00:44', '2022-03-07 02:00:44'),
('JAB-000026', 'Sarana dan Prasarana (Sarpras)', '2022-03-07 02:00:53', '2022-03-07 02:00:53'),
('JAB-000027', 'Kepala Unit Kebersihan dan Ma\'la', '2022-03-07 02:01:01', '2022-03-07 02:01:01'),
('JAB-000028', 'Kesling', '2022-03-07 02:01:08', '2022-03-07 02:01:08'),
('JAB-000029', 'Kepala Seksi IT', '2022-03-07 02:01:17', '2022-03-07 02:01:17'),
('JAB-000030', 'Kepala IPS', '2022-03-07 02:02:02', '2022-03-07 02:02:02'),
('JAB-000031', 'PIC  Casemix', '2022-03-07 02:02:09', '2022-03-07 02:02:09'),
('JAB-000032', 'Kepala Ruang Rawat Jalan', '2022-03-07 02:28:39', '2022-03-07 02:28:39'),
('JAB-000033', 'Kepala Bagian Umum', '2022-03-07 03:00:47', '2022-03-07 03:00:47'),
('-', '-', '2022-05-05 11:50:16', '2022-05-05 11:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_memo`
--

CREATE TABLE `tb_memo` (
  `id_memo` int(11) NOT NULL,
  `jns_memo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_pengirim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mengetahui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_konfirm` date DEFAULT NULL,
  `status_konfirm` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `kepada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_memo`
--

INSERT INTO `tb_memo` (`id_memo`, `jns_memo`, `no_surat`, `sifat`, `perihal`, `jabatan_pengirim`, `tgl_surat`, `isi`, `mengetahui`, `tgl_konfirm`, `status_konfirm`, `kepada`, `cc`, `lampiran`, `created_at`, `updated_at`, `catatan`) VALUES
(220001, 'pengajuan', 'Hhhh', 'biasa', 'Bbbb', 'JAB-000033', '2022-06-22', '<p>Bbbbbbb</p>', '-', NULL, '1', 'Direktur', '-', NULL, '2022-06-22 10:25:11', '2022-06-22 10:25:11', NULL),
(220002, 'undangan', 'TES BARU', 'rahasia', 'Tes motif', 'JAB-000033', '2022-06-22', '<p>Hhhhhhh</p>', '-', NULL, '1', 'Direktur', '-', NULL, '2022-06-22 10:26:33', '2022-06-22 10:26:33', NULL),
(220003, 'pengajuan', 'Sssss', 'biasa', 'Dddd', 'JAB-000033', '2022-06-22', '<p>Bbbb</p>', '-', NULL, '1', 'Direktur', '-', NULL, '2022-06-22 10:30:41', '2022-06-22 10:30:41', NULL),
(220004, 'pengajuan', 'TES BARU', 'rahasia', 'Yyy', 'JAB-000033', '2022-06-22', '<p>Bhhh</p>', '-', NULL, '1', 'Direktur', '-', NULL, '2022-06-22 10:46:20', '2022-06-22 10:46:20', NULL),
(220005, 'undangan', '02/tesonline', 'biasa', 'tes online', 'JAB-000033', '2022-06-22', '<p>tes online</p>', '-', NULL, '1', 'Direktur', 'Kepala Bidang Pelayanan Medis', NULL, '2022-06-22 12:11:13', '2022-06-22 12:11:13', NULL),
(220006, 'undangan', 'TESONLINE2', 'biasa', 'TES ONLONE2', 'JAB-000033', '2022-06-22', '<p>AAAAA</p>', '-', NULL, '1', 'Direktur', 'Kepala Bidang Pelayanan Medis', NULL, '2022-06-22 12:12:26', '2022-06-22 12:12:26', NULL),
(220007, 'undangan', 'TES ONLINE3', 'biasa', 'Z', 'JAB-000033', '2022-06-22', '<p>AAAA</p>', '-', NULL, '1', 'Direktur', 'Kepala Bidang Pelayanan Medis', NULL, '2022-06-22 12:13:10', '2022-06-22 12:13:10', NULL),
(220008, 'undangan', 'COBA', 'biasa', 'A', 'JAB-000033', '2022-06-22', '<p>SSSS</p>', '-', NULL, '1', 'Direktur', 'Kepala Bidang Pelayanan Medis', NULL, '2022-06-22 12:14:12', '2022-06-22 12:14:12', NULL),
(220009, 'undangan', '11/GIZINER/2022', 'biasa', 'TES NOTIF', 'JAB-000006', '2022-06-22', '<p>SSSSS</p>', '-', NULL, '1', 'Direktur', 'Kepala Bagian Umum', NULL, '2022-06-22 12:22:45', '2022-06-22 12:22:45', NULL),
(220010, 'pengajuan', '09/knkp/VI/2022', 'biasa', 'TES NOTIF', 'JAB-000006', '2022-06-22', '<p>SSSS</p>', '-', NULL, '1', 'Direktur', 'Kepala Bagian Umum', NULL, '2022-06-22 12:23:32', '2022-06-22 12:23:32', NULL),
(220011, 'undangan', '09/TESNOTIFBARU/VI/2022', 'biasa', 'SSSS', 'JAB-000006', '2022-06-22', '<p>SSSS</p>', '-', NULL, '1', 'Direktur', 'Kepala Bagian Umum', NULL, '2022-06-22 12:24:12', '2022-06-22 12:24:12', NULL),
(220012, 'pengajuan', '02/BARU/LOH/2022', 'biasa', 'TE LOGO', 'JAB-000033', '2022-06-22', '<p>AAAAA</p>', '-', NULL, '1', 'Direktur', 'Kepala Bidang Pelayanan Medis', NULL, '2022-06-22 12:44:50', '2022-06-22 12:44:50', NULL),
(220013, 'undangan', 'MEMOUNDNAGAN', 'biasa', 'UNDANGAN', 'JAB-000033', '2022-06-22', '<p>AAAA</p>', '-', NULL, '1', 'Direktur,Kepala Bidang Pelayanan Medis', '-', NULL, '2022-06-22 12:46:36', '2022-06-22 12:46:36', NULL),
(220014, 'undangan', 'UNDANGAN ONLINE', 'biasa', 'UNDANGAN', 'JAB-000033', '2022-06-22', '<p>AAAA</p>', '-', NULL, '1', 'Direktur,Kepala Bidang Pelayanan Medis', '-', NULL, '2022-06-22 12:48:16', '2022-06-22 12:48:16', NULL),
(220015, 'undangan', '03/UNDANGAN', 'biasa', 'UNDAG', 'JAB-000033', '2022-06-22', '<p>AAAA</p>', '-', NULL, '1', 'Direktur,Kepala Bidang Pelayanan Medis,Kepala Ruang IGD,Kepala Ruang Farmasi', '-', NULL, '2022-06-22 12:50:44', '2022-06-22 12:50:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_notulen`
--

CREATE TABLE `tb_notulen` (
  `id_notulen` int(11) NOT NULL,
  `id_memo_not` int(11) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_setting` int(10) UNSIGNED NOT NULL,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`id_setting`, `nama_instansi`, `motto`, `alamat`, `telepon`, `fax`, `logo`, `created_at`, `updated_at`) VALUES
(3, 'RS PKU MUHAMMADIYAH SEKAPUK', 'CREATIVE, ACTIVE, RESPONSIBILITY, EMPATY(CARE)', 'RW 09 DEsa dodo', '1111111', '082330321572', '1655799604630-logo.png', '2022-02-02 20:26:26', '2022-06-21 19:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date DEFAULT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepada` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim_disposisi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tgl_dilihat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `no_surat`, `sifat`, `pengirim`, `alamat`, `tgl`, `perihal`, `kepada`, `file`, `isi`, `pengirim_disposisi`, `created_at`, `updated_at`, `tgl_dilihat`) VALUES
(220601, '01/00M/IMM/XII/2019', 'biasa', 'IMM GRESIK', 'RW 09 DEsa dodo', '2022-06-22', 'coba log', 'JAB-000033', '1655854941231-logo.png', 'Vcfff', 'JAB-000005', '2022-06-22 10:42:21', '2022-06-22 10:42:21', NULL),
(220602, '01/IMMGRESIK/XII/2022', 'biasa', 'Komisariat Banawa Sekar', 'Doudo Panceng Gresik', '2022-06-22', 'Hh', 'JAB-000033', '1655855030860-logo.png', 'Bbbh', 'JAB-000005', '2022-06-22 10:43:50', '2022-06-22 10:43:50', NULL),
(220603, 'BARU', 'biasa', 'Y', 'B', '2022-06-22', 'pengajuan', 'JAB-000033', '1655855078953-logo.png', 'Ggggg', 'JAB-000005', '2022-06-22 10:44:38', '2022-06-22 10:44:38', NULL),
(220604, '888/ANAYR/2021', 'rahasia', 'Tp. Cross Net Indonesia', 'Jl. Raya Daendles No.21 Sekapuk, Ujungpangkah-Gresik', '2022-06-22', 'COBA LOG', 'JAB-000006', '1655861250570-Picture1.png', 'AAAA', 'JAB-000005', '2022-06-22 12:27:30', '2022-06-22 12:27:30', NULL),
(220605, 'BARULOGO', 'rahasia', 'Tp. Cross Net Indonesia', 'Jl. Raya Daendles No.21 Sekapuk, Ujungpangkah-Gresik', '2022-06-22', 'QURBAN', 'JAB-000033', '1655862226013-Revitalisasi-Keberpihakan-IMM-ditengah-Ancaman-Krisis-Ekonomi-Nasional---Copy.docx', 'AA', 'JAB-000005', '2022-06-22 12:43:46', '2022-06-22 12:43:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `Nama`, `username`, `password`, `jk`, `level`, `jabatan_id`, `qr_code`, `last_seen`, `created_at`, `updated_at`, `device_token`) VALUES
(3, '170602054', 'Wahyu Lazzuardy, S.Kom', '170602054', '$2y$10$TiJ7f3pdIWANShjzLxEdy.wIUwCKrowm9q4Pmep5Iwg2HEHtleJ8S', 'laki', 'admin', 'admin', '170602054wahyu-lazzuardy-skomqrcode.png', '2022-06-22 10:23:47', '2022-01-21 21:59:26', '2022-06-22 10:23:47', 'cgJZgZzYcN77ohUvNvX4_B:APA91bGil08AMZm1yTnad0n6y7GTI-TXtttC-MRMGl8GGvloVRN9ZoWgPo3qZlX1j5dvnXYk7iLbx7xOLwVD1kSU263JvOtk001CA8WyXtqaZX_DZv7I0NwsguD5BkAN9E018M2B5zHi'),
(16, '001,009,044', 'drs. HENDRIK STIYAWAN, MMRS', '001,009,044', '$2y$10$d9aahA71vtFqPuayExSGROGBGCVIInho1DKECd7fmEy2uo80dcAgG', 'laki', 'kabag', 'JAB-000006', '001009044drs-hendrik-stiyawan-mmrsqrcode.png', '2022-06-22 12:51:59', '2022-03-07 02:38:06', '2022-06-22 12:51:59', 'cVxPjS5LMqH4AbeBIc3uJN:APA91bFAW1Z82dLwMTLlNV_cCiJ5qdTOkbmNCbqk2tJgpx1A6BxrJdJv4NlYAruE10uc23cWmSOGnNXVA0R1urUNCDDyoi8BUcoMqZiQn-5yKspcgTYHi770ApWRQ8zd76E909eWNdgb'),
(17, '001,010,054', 'dr. NUAIMATUL HANI\'AH', '001,010,054', '$2y$10$0n.Q16o6S90sJVYN4v0HS.ktNoo7XfLadVVuDVQ7L/M0Yg0GLgPRO', 'perempuan', 'kabag', 'JAB-000007', '001010054dr-nuaimatul-haniahqrcode.png', '2022-06-20 06:32:55', '2022-03-07 02:39:07', '2022-06-20 06:32:55', NULL),
(18, '002,019,245', 'SITI ZAINAB, Amd.Kep', '002,019,245', '$2y$10$QLZBeVxgEPUZNu9/UtAzOOio0Rz4vQEdfg/0EyZCSq9JZHAt0kjIm', 'perempuan', 'karu', 'JAB-000008', '002019245siti-zainab-amdkepqrcode.png', NULL, '2022-03-07 02:41:26', '2022-03-07 02:41:26', NULL),
(19, '002,017,177', 'JUHAINI HAMDAN,S. Kep.,Ns', '002,017,177', '$2y$10$c8JgQjl5oGCKlxVUy/aOQuVYwW06HKOUZBMVefYAvs1EbkaY2kdfu', 'laki', 'karu', 'JAB-000009', '002017177juhaini-hamdans-kepnsqrcode.png', NULL, '2022-03-07 02:42:06', '2022-03-07 02:42:06', NULL),
(20, '002,015,124', 'MUHAMMAD SAIFUL, S. kep. Ns', '002,015,124', '$2y$10$gxZECPHhZ5fBa8.CEPxAB.DYQ6lm9LvUFU8U5rdbQRzxQKWlYbrl6', 'laki', 'karu', 'JAB-000010', '002015124muhammad-saiful-s-kep-nsqrcode.png', '2022-06-12 01:16:41', '2022-03-07 02:43:01', '2022-06-12 01:16:41', NULL),
(21, '002,001,012', 'SITI RUMIYAH, Amd. Keb', '002,001,012', '$2y$10$2rpPW5mz4wexKWsNO63JXeGxcPxE9eDW2K9kYbfki7Rfk2J7TH6F2', 'perempuan', 'karu', 'JAB-000011', '002001012siti-rumiyah-amd-kebqrcode.png', '2022-06-21 18:01:24', '2022-03-07 02:43:39', '2022-06-21 18:01:24', 'fzKX4ORD2hG2r-vOTZYQaN:APA91bGK79tqCq7CbTHwCuIgf1m3dlLHdLHUil4ZDPTATkCJHCj7sBE3bM8hM1LEFFvslEzwp_ccYljAOYacyIEzM5PZ251LFBVryb2giE8ks6pPzuKCV3nk7qJIT-1OIUBF9sxT9jcO'),
(22, '002,010,053', 'KHAS KHASOH, Amd. Kep', '002,010,053', '$2y$10$1dIiIPgOkmG/xGe6RvPqxeyK0x6jYihVu/u631vlP8g3WdqAi9HKK', 'laki', 'karu', 'JAB-000012', '002010053khas-khasoh-amd-kepqrcode.png', NULL, '2022-03-07 02:44:40', '2022-03-07 02:44:40', NULL),
(23, '002,014,107', 'IRWAN HABIBI, S. Kep. Ns', '002,014,107', '$2y$10$ruIUema/budbWY6HIgTx5.fq6QkgiBc4S21vGc2pt1/a/EU4AHf3G', 'laki', 'kabag', 'JAB-000013', '002014107irwan-habibi-s-kep-nsqrcode.png', '2022-06-21 18:00:04', '2022-03-07 02:45:31', '2022-06-21 18:00:04', NULL),
(24, '004,004,023', 'ZUHAILIYAH, Amak', '004,004,023', '$2y$10$nREGKBsdQauhrytKNEI/XO2slrDR2EMEFW0ND/9KOjIQW5PAwaNKy', 'perempuan', 'karu', 'JAB-000014', '004004023zuhailiyah-amakqrcode.png', '2022-06-12 00:25:08', '2022-03-07 02:48:45', '2022-06-12 00:25:08', NULL),
(25, '004,017,181', 'UMATUS SHOLIHAH, S. Farm.,Apt', '004,017,181', '$2y$10$rkrY1TRKjRl49MojBI2Es.QvskrRnWh8wlFl.VauxT63Xwvr7EV2G', 'perempuan', 'karu', 'JAB-000015', '004017181umatus-sholihah-s-farmaptqrcode.png', NULL, '2022-03-07 02:49:15', '2022-03-07 02:49:15', NULL),
(26, '004,013,078', 'SITI ISNIAH, A. Md', '004,013,078', '$2y$10$dNtlMylCGga8BZJrefXSZeTGDngn0QqwRk9JlI5XBBnREMiid7UFO', 'perempuan', 'karu', 'JAB-000016', '004013078siti-isniah-a-mdqrcode.png', NULL, '2022-03-07 02:49:51', '2022-03-07 02:49:51', NULL),
(27, '004,018,202', 'DURROTUN NAFISAH. S. Tr. GZ', '004,018,202', '$2y$10$OzPp8Vsk8nSDZdDKtISRBeHc8oXtrl.6.UDtxxoeAiKEH99AXM7Du', 'perempuan', 'karu', 'JAB-000017', '004018202durrotun-nafisah-s-tr-gzqrcode.png', '2022-06-21 20:26:59', '2022-03-07 02:50:42', '2022-06-21 20:26:59', 'dOkdQZW4x_zaodtmQuW9vO:APA91bFI4BXzCPZVn_qiuPZWhhbRPCFcA_0RP2-hS_aBoH7WYSZ5DtHLh-rSwwp8jK3RJXTOLc00jwkQQRjZWziwFwH4z6VZVu1VgftkM9dXtHv1veQ7_EUURs9x1N17k5A-xtYtQeJw'),
(28, '003,005,026', 'ELIK RIFQIATUL CHILMIAH, Amd', '003,005,026', '$2y$10$Od9WMCf1eXycSIunHIBYM.Do1w/Ul.505HviQTM9kYikLqyD7eC1O', 'perempuan', 'kabag', 'JAB-000018', '003005026elik-rifqiatul-chilmiah-amdqrcode.png', '2022-06-15 14:38:58', '2022-03-07 02:51:13', '2022-06-15 14:38:58', NULL),
(29, '003,006,030', 'NURUL SYOFIYAH, SE', '003,006,030', '$2y$10$DXGZVOUYPu.HZTwc36qQE.x/yLH2AFbkN7j66LKiBt9XvB.H5zTF2', 'perempuan', 'karu', 'JAB-000019', '003006030nurul-syofiyah-seqrcode.png', NULL, '2022-03-07 02:51:51', '2022-03-07 02:51:51', NULL),
(30, '003,009,048', 'RENNY FITRIYAWATI', '003,009,048', '$2y$10$xwHCdEAk0JKrA28h4XFt2.xF016ykGOTDSY6Nj9lQLmg9X2q2HdJy', 'perempuan', 'karu', 'JAB-000020', '003009048renny-fitriyawatiqrcode.png', NULL, '2022-03-07 02:52:25', '2022-03-07 02:52:25', NULL),
(31, '002,004,021', 'HUSNUL KHULUQ, S.Kep.,Ns', '002,004,021', '$2y$10$sNOgpdsgEJb0FulpTQ8K0OVR9FBdDc0tDL.mBBKpX/cGwlFTcOpU2', 'laki', 'kabag', 'JAB-000021', '002004021husnul-khuluq-skepnsqrcode.png', NULL, '2022-03-07 02:53:02', '2022-03-07 02:53:02', NULL),
(32, '002,006,031', 'HANIK ERFATUNNAFI\'AH, S. Kep,Ns', '002,006,031', '$2y$10$O0tqsm/xgiugVlgkWsZeXeN3jqbjBXqQHVJGVBuHS9uJeSyTtPRqK', 'perempuan', 'kabag', 'JAB-000022', '002006031hanik-erfatunnafiah-s-kepnsqrcode.png', NULL, '2022-03-07 02:53:55', '2022-03-07 02:53:55', NULL),
(33, '003,098,010', 'ENI UFTULIAH', '003,098,010', '$2y$10$.nFRanX3wuRw.hrBqE6BvuQLoD3ETjrKKBRJDrwPnibX9UR2y0/sm', 'perempuan', 'karu', 'JAB-000024', '003098010eni-uftuliahqrcode.png', NULL, '2022-03-07 02:55:46', '2022-03-07 02:55:46', NULL),
(34, '002,007,038', 'FETY ROHMAWATI, Amd. Keb', '002,007,038', '$2y$10$MS0FyEyNBs7VcGyspXarmO.Q9kTI46eRAgWw2MHcMnugIQGfpSb6e', 'perempuan', 'karu', 'JAB-000025', '002007038fety-rohmawati-amd-kebqrcode.png', NULL, '2022-03-07 02:56:15', '2022-05-06 13:30:14', NULL),
(35, '003,098,007', 'KHADZIK', '003,098,007', '$2y$10$7v.6tx0xltEQM9gfeFgYvuT1OwGIPq13K9T.GNporzBbuX8OXTOGC', 'laki', 'karu', 'JAB-000026', '003098007khadzikqrcode.png', NULL, '2022-03-07 02:56:49', '2022-03-07 02:56:49', NULL),
(36, '003,004,022', 'SUJARWO', '003,004,022', '$2y$10$74I84d/.xrjApPZzy5np7OOawlKy7bPEPdcUi.HwL2CkvEEDineG6', 'laki', 'karu', 'JAB-000027', '003004022sujarwoqrcode.png', NULL, '2022-03-07 02:57:13', '2022-03-07 02:57:13', NULL),
(37, '004,019,255', 'ILA NUR ANDRIYANI, Amd Kesling', '004,019,255', '$2y$10$CmZXAZqKPwGzhtfj9uMNCO04Jw8lLLgDO23rsUNHn8t7McT576rcG', 'perempuan', 'karu', 'JAB-000028', '004019255ila-nur-andriyani-amd-keslingqrcode.png', NULL, '2022-03-07 02:57:42', '2022-03-07 02:57:42', NULL),
(38, '003,017,180', 'MOH. FERYZAL FAHLEVI, S.Kom.', '003,017,180', '$2y$10$Oc9GnJh5qfGNYNC/naZRVOcdBxwBcDL4rjJYY19hqP5XgVjgo86I2', 'laki', 'karu', 'JAB-000029', '003017180moh-feryzal-fahlevi-skomqrcode.png', '2022-06-15 14:37:37', '2022-03-07 02:58:19', '2022-06-15 14:37:37', NULL),
(39, '004,009,047', 'HEPPY EKO WAHYUDI, amd,TEM', '004,009,047', '$2y$10$RpR19Bah5JVLAVzObSS8puxaCw4YTUmkS1u/nK4g6iDYse6w1ajDi', 'laki', 'karu', 'JAB-000030', '004009047heppy-eko-wahyudi-amdtemqrcode.png', NULL, '2022-03-07 02:58:55', '2022-03-07 02:58:55', NULL),
(40, '001,014,115', 'dr. UMI ZAKIYAH', '001,014,115', '$2y$10$lIEC1X5//62au.1R/e6U5eIwH4kCO5Qw6uTAx3FL6pdKebAifO7xG', 'perempuan', 'kabag', 'JAB-000031', '001014115dr-umi-zakiyahqrcode.png', NULL, '2022-03-07 02:59:50', '2022-03-07 02:59:50', NULL),
(41, '002,013,076', 'FASHIHATUL ULA S. Kep.,Ns', '002,013,076', '$2y$10$rQku8yWPkIanig9FXkwNBuifVX0Tr3t13gbIj0RkoNfOATOR1/O72', 'perempuan', 'karu', 'JAB-000032', '002013076fashihatul-ula-s-kepnsqrcode.png', NULL, '2022-03-07 03:00:20', '2022-03-07 03:00:20', NULL),
(42, '002,098,005', 'SITI MARSIYAH, S. Kep.,Ns', '002,098,005', '$2y$10$srhD0RZjmhiAiRLU0/6xAODlrWWPXYogOAviru8duQ6sEaBogrMfy', 'perempuan', 'kabag', 'JAB-000033', '002098005siti-marsiyah-s-kepnsqrcode.png', '2022-06-22 13:13:36', '2022-03-07 03:01:21', '2022-06-22 13:13:36', 'frtIXNI8kU8Kof3GszSIJE:APA91bGi1-fqAqa2N2Vz7g0BdRtx3_NCHCd2GZZ5rI0yjyp3wcWWLbZNFU_Q5VYOoqnOiMrH0MDLpOpYh9EscI3ftvlQ4VfDSdB4UZyzG-lWldjnm-AB0gG1JfU0BpoeP9HjMHFGn_RF'),
(44, '945,314', 'dr. UMI JULAIKAH, M. Kes', '945,314', '$2y$10$.sxNH9kqXd19apLY2FVSyO45i1DtNNXEvZaXUYGaOj1UsNF82ZXK.', 'perempuan', 'dirut', 'JAB-000005', '945314dr-umi-julaikah-m-kesqrcode.png', '2022-06-22 12:53:37', '2022-03-07 03:13:40', '2022-06-22 12:53:37', 'eUz0OebBz-PAaQU-VAEZzq:APA91bGG3dEn_ofx6LiDDdSv6arKGBX7WBR_L3Y49645CoyajzIquPG61xBkC1QUUc8PmoiqFujXlZz-WiTcaEmzoQ0H6qxKHlB8U8QgQTy5gi9sCvPByQIRugk_c6rKEIFv_TFLneU5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_detail_disposisi`
--
ALTER TABLE `tb_detail_disposisi`
  ADD PRIMARY KEY (`id_detail_dispo`),
  ADD KEY `fkdetail` (`id_disposisi_detail`);

--
-- Indexes for table `tb_detail_kepada`
--
ALTER TABLE `tb_detail_kepada`
  ADD PRIMARY KEY (`id_detail_kepada`) USING BTREE,
  ADD KEY `fk_memo` (`id_detail_memo`),
  ADD KEY `fk_jabatan` (`jabatan_id`);

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `fk_memo_disposisi` (`id_memo_disposisi`);

--
-- Indexes for table `tb_forward_disposisi`
--
ALTER TABLE `tb_forward_disposisi`
  ADD KEY `id_forward` (`id_forward`),
  ADD KEY `fk_disposisi_forward` (`id_disposisi_frw`);

--
-- Indexes for table `tb_forward_surat`
--
ALTER TABLE `tb_forward_surat`
  ADD KEY `fk_surat_forward` (`id_surat`),
  ADD KEY `fk_pengirim_fw` (`pengirim`),
  ADD KEY `fk_penerima_fw` (`penerima`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_memo`
--
ALTER TABLE `tb_memo`
  ADD PRIMARY KEY (`id_memo`) USING BTREE,
  ADD KEY `fk_pengirim` (`jabatan_pengirim`),
  ADD KEY `fk_mengetahui` (`mengetahui`);

--
-- Indexes for table `tb_notulen`
--
ALTER TABLE `tb_notulen`
  ADD PRIMARY KEY (`id_notulen`),
  ADD KEY `fk_notulen_memo` (`id_memo_not`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `fk_pengirim_surat` (`pengirim`),
  ADD KEY `fk_tujuan_surat` (`kepada`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_id_jabatan` (`jabatan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id_log` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detail_disposisi`
--
ALTER TABLE `tb_detail_disposisi`
  MODIFY `id_detail_dispo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tb_detail_kepada`
--
ALTER TABLE `tb_detail_kepada`
  MODIFY `id_detail_kepada` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT for table `tb_notulen`
--
ALTER TABLE `tb_notulen`
  MODIFY `id_notulen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_disposisi`
--
ALTER TABLE `tb_detail_disposisi`
  ADD CONSTRAINT `fkdetail` FOREIGN KEY (`id_disposisi_detail`) REFERENCES `tb_disposisi` (`id_disposisi`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_detail_kepada`
--
ALTER TABLE `tb_detail_kepada`
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_memo` FOREIGN KEY (`id_detail_memo`) REFERENCES `tb_memo` (`id_memo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD CONSTRAINT `fk_memo_disposisi` FOREIGN KEY (`id_memo_disposisi`) REFERENCES `tb_memo` (`id_memo`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_forward_disposisi`
--
ALTER TABLE `tb_forward_disposisi`
  ADD CONSTRAINT `fk_disposisi_forward` FOREIGN KEY (`id_disposisi_frw`) REFERENCES `tb_disposisi` (`id_disposisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_forward_surat`
--
ALTER TABLE `tb_forward_surat`
  ADD CONSTRAINT `fk_penerima_fw` FOREIGN KEY (`penerima`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengirim_fw` FOREIGN KEY (`pengirim`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_surat_forward` FOREIGN KEY (`id_surat`) REFERENCES `tb_surat` (`id_surat`) ON DELETE CASCADE;

--
-- Constraints for table `tb_memo`
--
ALTER TABLE `tb_memo`
  ADD CONSTRAINT `fk_mengetahui` FOREIGN KEY (`mengetahui`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengirim` FOREIGN KEY (`jabatan_pengirim`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_notulen`
--
ALTER TABLE `tb_notulen`
  ADD CONSTRAINT `fk_notulen_memo` FOREIGN KEY (`id_memo_not`) REFERENCES `tb_memo` (`id_memo`) ON DELETE CASCADE;

--
-- Constraints for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD CONSTRAINT `fk_tujuan_surat` FOREIGN KEY (`kepada`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_id_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `tb_jabatan` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
