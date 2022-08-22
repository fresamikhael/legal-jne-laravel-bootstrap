-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 08:34 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legal_jne_bs`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `body`, `maps`, `created_at`, `updated_at`) VALUES
(1, '<p>klajsldkfja;jksdf;asd</p>', 'hkjhajksdhflajksd', '2022-06-27 11:54:34', '2022-06-27 11:54:34'),
(2, '<h1><strong>Legal Service Department</strong></h1><p>&nbsp;</p><p>asdfasdflkAKSDFJALKSDFJKALSJDFA</p><p>asdfas</p><p>afsdfa</p><p>sdfasd</p><p>fasdfas</p><p>dfas</p>', 'kjlksjfasd', '2022-06-27 12:00:48', '2022-06-27 12:00:48'),
(3, '<h1>Legal JNE</h1><p>LOREMAKNFAKSNDFASasdfasdfasdfasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</p><p>asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfassssssssssssssssssssssssssssssssssssss</p><p>asdf</p><p>asd</p><p>fas</p><p>dfa</p><p>sdfasdf</p>', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6454598771684!2d106.79569501458849!3d-6.178190795527154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f68a667e053f%3A0xf24216fdf1ede06d!2sJNE%20Learning%20Center!5e0!3m2!1sid!2sid!4v1656331293961!5m2!1sid!2sid', '2022-06-27 12:03:09', '2022-06-27 12:03:09'),
(4, '<h1>Legal JNE Department</h1><p>Jl. Tomang Raya No.9, RT.2/RW.1, Tomang, Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11440</p><p>Kontak :</p><p>081928129230 (Admin)</p>', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6454598771684!2d106.79569501458849!3d-6.178190795527154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f68a667e053f%3A0xf24216fdf1ede06d!2sJNE%20Learning%20Center!5e0!3m2!1sid!2sid!4v1656331293961!5m2!1sid!2sid', '2022-06-28 06:12:45', '2022-06-28 06:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE `cs` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_consumer_dispute_case_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_operational_delivery_chronology` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_cs_handling_chronology` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pod_evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_receipt_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_proof_of_documentation1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_proof_of_documentation2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_proof_of_documentation3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_other_supporting_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal_indemnity_offer` int(11) DEFAULT NULL,
  `file_response_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_subpoena_responese_draft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `case_analysis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_proof_shipment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_acceptance_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_case_report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_peace_agreement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_somasi_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_customer_response_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_case_progress_report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_court_lawsuit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_court_bpsk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_case_temporary_close` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_supporting_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compensation_offer_nominal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addendum_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `other_point` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_mom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_agreement_draft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_claim_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_deed_of_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_nib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_business_permit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_oss_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_director_id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_other` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_internal_memo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cb_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_agreement_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_disputes`
--

CREATE TABLE `customer_disputes` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_date` date NOT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `causative_factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `causative_factor_others` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_loss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connote` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assurance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assurance_nominal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incident_chronology` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_shipping_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_connote` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_orion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_pod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_customer_case_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_destination_chronology` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_orion_chronology` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_cs_chronology` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_subpoena` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_procuration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `databases`
--

CREATE TABLE `databases` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `set_date` date NOT NULL,
  `bn_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tbn_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promulgated_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `privilege` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `historical_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `databases`
--

INSERT INTO `databases` (`id`, `name`, `type`, `entity`, `number`, `year`, `about`, `set_date`, `bn_number`, `tbn_number`, `promulgated_date`, `status`, `created_at`, `updated_at`, `privilege`, `historical_id`) VALUES
('c140b22e-62c2-4fa2-8f43-561ce9688839', 'BRIN NO. 9 TAHUN 2022', 'Undang Undang', 'Badan Riset dan Inovasi Nasional', '9', '2022', 'TUGAS, FUNGSI, DAN STRUKTUR ORGANISASI RISET HAYATI DAN LINGKUNGAN', '2022-06-28', '308', NULL, '2022-06-28', 'Aktif', '2022-06-28 05:56:07', '2022-06-29 03:44:39', 'ALL', NULL),
('c8d5f369-7297-474c-8659-44ee93560760', 'KEMENDIKBUDRISTEK NO. 9 TAHUN 2022', 'Undang Undang', 'KEMENDIKBUDRISTEK NO. 9 TAHUN 2022', '6', '2022', 'EVALUASI SISTEM PENDIDIKAN OLEH PEMERINTAH PUSAT DAN PEMERINTAH DAERAH TERHADAP PENDIDIKAN ANAK USIA DINI, PENDIDIKAN DASAR, DAN PENDIDIKAN MENENGAH', '2022-06-29', '308', NULL, '2022-06-28', 'Aktif', '2022-06-28 05:57:22', '2022-06-29 03:43:02', 'RESTRICTED', NULL),
('c97dd128-eb7e-40a3-845b-6143db0e6ea5', 'PERPRES NO. 92 TAHUN 2022', 'Peraturan Presiden', 'Presiden', '92', '2022', 'JENIS DAN BESARAN HAK KEUANGAN DAN FASILITAS LAINNYA BAGI MANAJEMEN EKSEKUTIF KOMITE NASIONAL EKONOMI DAN KEUANGAN SYARIAH', '2022-08-22', NULL, NULL, '2022-08-22', 'Aktif', '2022-08-21 22:25:02', '2022-08-21 22:25:02', 'ALL', 'c140b22e-62c2-4fa2-8f43-561ce9688839'),
('da4f9640-05ff-4783-8e4d-16fcfc6d7db0', 'PERPRES NO. 92 TAHUN 2022', 'Peraturan Presiden', 'Presiden', '92', '2022', 'PERUBAHAN ATAS PERATURAN MENTERI KEUANGAN NOMOR 56/PMK.010/2022 TENTANG PENETAPAN TARIF BEA MASUK DALAM RANGKA PERSETUJUAN KEMITRAAN EKONOMI KOMPREHENSIF ANTARA REPUBLIK INDONESIA DAN NEGARA-NEGARA EFTA (COMPREHENSIVE ECONOMIC PARTNERSHIP AGREEMENT BETWEEN THE REPUBLIC OF INDONESIA AND THE EFTA STATES)', '2022-08-22', NULL, NULL, '2022-08-22', 'Aktif', '2022-08-21 22:26:24', '2022-08-21 22:26:24', 'RESTRICTED', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `database_files`
--

CREATE TABLE `database_files` (
  `database_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `database_files`
--

INSERT INTO `database_files` (`database_id`, `name`, `created_at`, `updated_at`) VALUES
('c140b22e-62c2-4fa2-8f43-561ce9688839', 'database/uDpsrkhQ687SXG4TqWwLTMg6Ebc66pJCTRwueOdG-.pdf', '2022-06-28 05:56:07', '2022-06-29 03:44:39'),
('c8d5f369-7297-474c-8659-44ee93560760', 'database/pXt2kiB24obbbjvDZkIDtA1xub5hpJRS4b7KF6zT-.pdf', '2022-06-28 05:57:22', '2022-06-29 03:43:02'),
('c97dd128-eb7e-40a3-845b-6143db0e6ea5', 'database/OADs0AQcQlY9bqJasF2ljCaIJyTJiKNIC4cYctBF-.pdf', '2022-08-21 22:25:02', '2022-08-21 22:25:02'),
('c97dd128-eb7e-40a3-845b-6143db0e6ea5', 'database/wF6Gcd7hF7UgfAfK3djNIwP4UFeknRdbQZVnLkhh-.pdf', '2022-08-21 22:25:02', '2022-08-21 22:25:02'),
('da4f9640-05ff-4783-8e4d-16fcfc6d7db0', 'database/WTXclNyXq6rDJW9yzP1P6jGimIMaXs1ZMLr437mx-.pdf', '2022-08-21 22:26:24', '2022-08-21 22:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `database_public_requests`
--

CREATE TABLE `database_public_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `database_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `database_public_requests`
--

INSERT INTO `database_public_requests` (`id`, `database_id`, `name`, `nik`, `location`, `created_at`, `updated_at`) VALUES
(30, 'REG001', 'asd', 'asd', 'asd', '2022-08-21 22:39:35', '2022-08-21 22:39:35'),
(31, 'REG001', 'qwer', 'qwer', 'qwer', '2022-08-21 22:40:30', '2022-08-21 22:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `database_requests`
--

CREATE TABLE `database_requests` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_document_reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `database_requests`
--

INSERT INTO `database_requests` (`id`, `user_id`, `request_document_reason`, `status`, `note`, `created_at`, `updated_at`) VALUES
('DTR001', 'USR002', 'fasdfasdfasd', 'FINISH', NULL, '2022-06-25 05:51:54', '2022-06-28 05:52:47'),
('DTR002', 'USR002', 'asdfsdfads', 'IN PROGRESS', NULL, '2022-06-30 06:25:28', '2022-06-28 06:25:28'),
('DTR003', 'USR002', 'etwertwert', 'PENDING', NULL, '2022-06-26 06:26:04', '2022-06-28 06:26:04'),
('DTR004', 'USR002', 'pinjam', 'PENDING', NULL, '2022-08-20 05:14:20', '2022-08-20 05:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `database_request_files`
--

CREATE TABLE `database_request_files` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_out` datetime DEFAULT NULL,
  `doc_in` datetime DEFAULT NULL,
  `file_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `database_request_files`
--

INSERT INTO `database_request_files` (`id`, `document_id`, `document_name`, `document_type`, `document_code`, `file_number`, `doc_out`, `doc_in`, `file_id`, `note`, `status`, `created_at`, `updated_at`) VALUES
('FDR002', 'DTR002', 'UU NO. 1 TAHUN 2022', 'Soft Copy', NULL, NULL, NULL, NULL, NULL, NULL, 'PENDING', '2022-06-28 06:25:28', '2022-06-28 06:25:28'),
('FDR003', 'DTR003', 'KEMENPERIN NO. 9 TAHUN 2022', 'Soft Copy', NULL, NULL, NULL, NULL, NULL, NULL, 'PENDING', '2022-06-28 06:26:04', '2022-06-28 06:26:04'),
('FDR004', 'DTR004', 'BRIN NO. 9 TAHUN 2022', 'Soft Copy', NULL, NULL, NULL, NULL, NULL, NULL, 'PENDING', '2022-08-20 05:14:20', '2022-08-20 05:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `database_types`
--

CREATE TABLE `database_types` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `database_types`
--

INSERT INTO `database_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
('DBT001', 'Undang Undang', '2022-06-23 05:59:07', '2022-06-23 05:59:07'),
('DBT002', 'Peraturan Perusahaan', '2022-06-28 05:57:53', '2022-06-28 05:57:53'),
('DBT003', 'Peraturan Presiden', '2022-08-21 22:21:09', '2022-08-21 22:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regency_id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_request`
--

CREATE TABLE `document_request` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_document_reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
('FAQ123', 'Cara membuat akun', 'tesst\r\n', NULL, NULL),
('FAQ124', 'tutor', '<p>tutor</p>', '2022-08-19 07:39:17', '2022-08-19 07:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `file_document_request`
--

CREATE TABLE `file_document_request` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_out` datetime DEFAULT NULL,
  `doc_in` datetime DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frauds`
--

CREATE TABLE `frauds` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `causative_factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perpetrator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_loss` int(11) NOT NULL,
  `incident_date` date NOT NULL,
  `incident_scane` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incident_chronology` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fraud_classification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witness1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witness1_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witness2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witness2_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_document_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_perpetrator_statement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_witness_statement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_evidence_documentation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_investigation_document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_other_evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_below`
--

CREATE TABLE `home_below` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `t1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_below`
--

INSERT INTO `home_below` (`id`, `t1`, `t2`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'asdf', 'asdfasd', 'asdf', '2022-07-07 02:33:57', '2022-07-07 02:33:57'),
(2, 'Test', 'setse', 'home/cSdl66xMqD5Dsg7qO52At7vhOtq4W99EeggUv8Eh.jpg', '2022-07-07 02:59:58', '2022-07-07 02:59:58'),
(3, 'Track Your Case & Document Realtime', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, aut? Adipisci accusamus, cum ipsa atque, eius, mollitia architecto culpa placeat dolorum vitae repudiandae voluptas. Distinctio et alias accusantium odit itaque.', 'home/jEm06NZpTMPDwYBnDePPbc1K6gMs8bjAyVY0hPbt.png', '2022-07-07 03:06:21', '2022-07-07 03:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `home_foot`
--

CREATE TABLE `home_foot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `t1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_foot`
--

INSERT INTO `home_foot` (`id`, `t1`, `p1`, `t2`, `p2`, `t3`, `p3`, `t4`, `p4`, `t5`, `p5`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', 'asdf', 'asd', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '2022-07-07 02:33:40', '2022-07-07 02:33:40'),
(2, 'Test', 'home/Q9wfWVlV1ugtP5Xs35BStaQvw3KI9Ec2AJpbYPAt.jpg', 'setse', 'home/ofGaA16DGlrjxyHsEHD19M6dhspHFVTotaBfujmk.jpg', 'asdfasd', 'home/guu32NRIUft4OioDnx5dkLB9VLHAhQWwA24GRvCg.jpg', 'ewrqwe', 'home/c8pNK492tduVBYj6fkYekqJAcU4xxVkMmyaRyiMD.jpg', 'qwerqwe', 'home/tg1QBKdX7mJxJzLNXmUmC4m250vNcVZrABtssCgS.jpg', NULL, '2022-07-07 03:01:18', '2022-07-07 03:01:18'),
(3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, aut? Adipisci accusamus, cum ipsa atque, eius, mollitia architecto culpa placeat dolorum vitae repudiandae voluptas. Distinctio et alias accusantium odit itaque.', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, aut? Adipisci accusamus, cum ipsa atque, eius, mollitia architecto culpa placeat dolorum vitae repudiandae voluptas. Distinctio et alias accusantium odit itaque.', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, aut? Adipisci accusamus, cum ipsa atque, eius, mollitia architecto culpa placeat dolorum vitae repudiandae voluptas. Distinctio et alias accusantium odit itaque.', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, aut? Adipisci accusamus, cum ipsa atque, eius, mollitia architecto culpa placeat dolorum vitae repudiandae voluptas. Distinctio et alias accusantium odit itaque.', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, aut? Adipisci accusamus, cum ipsa atque, eius, mollitia architecto culpa placeat dolorum vitae repudiandae voluptas. Distinctio et alias accusantium odit itaque.', NULL, NULL, '2022-07-07 03:07:25', '2022-07-07 03:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `home_middle`
--

CREATE TABLE `home_middle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `t1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_middle`
--

INSERT INTO `home_middle` (`id`, `t1`, `p1`, `t2`, `p2`, `t3`, `p3`, `t4`, `p4`, `t5`, `p5`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'asdfasd', 'asdf', 'asdfasd', 'asdf', 'asdfasd', 'asdf', 'asdfads', 'asdf', 'asdfas', 'asdf', 'asdf', '2022-07-07 02:33:02', '2022-07-07 02:33:02'),
(2, 'Test', 'home/q6PkENveDF6XFLLV8DeQOxCOzaL0NUethrnx2RBo.jpg', 'setse', 'home/qzOR9wgd9Y0nWLYMkgmQKcu3bAtaFpySrv1ZG9fl.jpg', 'seest', 'home/mlJAs4pw4iN5HQcvoJLR47iUueGOwNplZ6GA6Azl.jpg', 'ewrqwe', 'home/RoE7KcewPkV9MZJkWwtwwfZPeHZwmX5rjxuTe1Uu.jpg', 'qwerqwe', 'home/tjMkAohlU03hskHeNW6sK7SEgTWU3Sgr27DuDKLz.jpg', 'home/3fFiRRJxBJb7ef8e7Qs0Ddbve4A9LaiHuRm2dtgD.jpg', '2022-07-07 02:57:29', '2022-07-07 02:57:29'),
(3, 'Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter', 'home/HjdZvogpwYWUZhlYwYxxSyeE6ENKBzfwGMjlFGmf.png', 'Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter', 'home/lbTDty3su761msokWCFZmlC3uYiJi4UhdUTVJQgd.png', 'Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter', 'home/OFu3l0nwtU6C9tthZLRFbOb24oIrJBZNB9L4Os2j.png', 'Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter', 'home/pUVIWGoaT9TbuZPJj5LUb3Rvz1zA1Di4EbU4OyzF.png', 'Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter', 'home/AyI9QpAs9rkIG4LkM1c1JeyMfyS0oiqRB3M4n0wE.png', 'home/fnNQvAIaBmNw6VH79T769kHB10F6x9MfrTBV6r5b.png', '2022-07-07 03:05:55', '2022-07-07 03:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `home_top`
--

CREATE TABLE `home_top` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `t1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_top`
--

INSERT INTO `home_top` (`id`, `t1`, `t2`, `t3`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'WELCOME TO LEGAL ACCESS JN', 'Connecting Your Happiness', 'ipsum dolor sit amet consectetur adipisicing elit. Incidunt accusamus inventore fugiat illo corporis consequatur cupiditate tenetur tempore corrupti. Facilis fugiat nulla ut quia eum asperiores, iusto natus pariatur deleniti!\r\n\r\n', 'jhoni.jpg', '2022-07-07 02:23:25', '2022-07-07 02:23:25'),
(3, 'Test', 'setse', 'seest', 'home/SdOt1UM18VxHSUxdCzK3QfhVrKSUSnnB88bvfldS.jpg', '2022-07-07 02:43:39', '2022-07-07 02:43:39'),
(4, 'WELCOME TO LEGAL ACCESS JNE', 'We Connecting Your Happiness', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt accusamus inventore fugiat illo corporis consequatur cupiditate tenetur tempore corrupti. Facilis fugiat nulla ut quia eum asperiores, iusto natus pariatur deleniti!', 'home/m2AV03yaumZadIa5x0HzIN85jNtEjvEZTaFIIzI7.png', '2022-07-07 03:02:57', '2022-07-07 03:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expertise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `name`, `email`, `position`, `expertise`, `location`, `description`, `photo`, `phone`, `created_at`, `updated_at`) VALUES
('INF001', 'Bissett Normano', 'normano@jne.co.id', 'Partneers', 'Tax &amp; Legal', 'asdf', '<p>asdfasdfasdfasd</p>', 'legalPhoto/tM9OeZQrJOgbmZjeoOTMi5rOd0RloNXcLI9C9wHR.jpg', '082932712843', '2022-07-06 14:05:51', '2022-07-06 14:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `land_sells`
--

CREATE TABLE `land_sells` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownership_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownership_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement_nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notaris_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_advice_planning` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_kjjp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_bca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_disposition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_ownership_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_imb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sppt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_im` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_marriage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_bpjs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_death_statement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_legal_heir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_heir_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_heir_npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_legal_corp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_director_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_legal_npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_nib` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_business_permit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pb_umku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_location_permit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_npwp_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cb_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sale_agreement_draft_` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leases`
--

CREATE TABLE `leases` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landlord_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landlord_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landlord_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landlord_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landlord_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landlord_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landlord_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addendum_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rental_value` int(11) NOT NULL,
  `rental_object_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rental_object_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rental_object_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rental_object_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rental_object_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rental_object_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_landlord_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_landlord_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_landlord_regency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_landlord_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_landlord_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_landlord_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_landlord_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_of_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee_nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_point` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `landlord_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_director_disposition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_internal_memo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_lease_application_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_right_owner_id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_npwp_individual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_family_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_marriage_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_death_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_heir_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_director_id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_deed_of_incorporation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sk_menkumham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_siup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_tdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_npwp_legal_entity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_skd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_skdu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_imb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sppt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_dp_receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_payment_imb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_procuration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_previous_agreement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_director_procuration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_lease_application` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_lease_eligibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cb_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_02_140432_create_provinces_tables', 1),
(4, '2017_05_02_140444_create_regencies_tables', 1),
(5, '2017_05_02_142019_create_districts_tables', 1),
(6, '2017_05_02_143454_create_villages_tables', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_04_16_110712_create_customer_disputes_table', 1),
(10, '2022_04_18_114014_create_permits_table', 1),
(11, '2022_04_19_105637_create_databases_table', 1),
(12, '2022_04_19_105706_create_database_files_table', 1),
(13, '2022_04_19_112628_create_regulations_table', 1),
(14, '2022_04_19_131659_create_customers_table', 1),
(15, '2022_04_19_131710_create_vendors_table', 1),
(16, '2022_04_19_131720_create_leases_table', 1),
(17, '2022_04_19_142255_create_regulations_type_table', 1),
(18, '2022_04_20_123107_create_cs_table', 1),
(19, '2022_04_20_144329_create_frauds_table', 1),
(20, '2022_04_20_145116_create_outstandings_table', 1),
(21, '2022_04_20_145636_create_other_litigations_table', 1),
(22, '2022_04_22_173634_add_subpoena_response_draft_to_cs_table', 1),
(23, '2022_04_26_111819_add_file_response_letter_to_cs_table', 1),
(24, '2022_04_27_100650_create_others_table', 1),
(25, '2022_04_28_100945_create_document_request_table', 1),
(26, '2022_05_09_112244_create_land_sells_table', 1),
(27, '2022_05_09_112402_create_power_attorneys_table', 1),
(28, '2022_05_09_120308_add_foreignkey_legal_id_to_permit_table', 1),
(29, '2022_05_19_093419_add_status_to_outstading_table', 1),
(30, '2022_05_19_093555_add_status_to_other_litigations_table', 1),
(31, '2022_05_20_105827_create_file_document_request_table', 1),
(32, '2022_05_25_051452_add_column_to_cs_table', 1),
(33, '2022_05_31_165802_add_file_subpoena_draft_to_outstanding_table', 1),
(34, '2022_05_31_173922_add_legal_manager_advice_to_outstandings_table', 1),
(35, '2022_06_02_103448_add_file_subpoena_signature_to_outstandings_table', 1),
(36, '2022_06_02_110848_add_file_delivery_proof_to_outstandings_table', 1),
(37, '2022_06_02_121102_add_file_subpoena_agent_response_to_outstandings_table', 1),
(38, '2022_06_02_121356_add_user_update_to_outstandings_table', 1),
(39, '2022_06_02_131200_add_file_subpoena_2_to_outstandings_table', 1),
(40, '2022_06_02_141750_add_file_court_lawsuit_to_outstandings_table', 1),
(41, '2022_06_11_113003_create_information_table', 1),
(42, '2022_06_15_163509_create_database_requests_table', 1),
(43, '2022_06_15_163610_create_database_request_files_table', 1),
(44, '2022_06_23_125137_create_database_types_table', 1),
(45, '2022_06_27_180844_create_contact_us_table', 2),
(46, '2022_07_05_164239_create_database_public_request', 3),
(51, '2022_07_06_111043_create_regulation_requests_access_table', 4),
(52, '2022_07_07_091822_create_home_top_table', 5),
(53, '2022_07_07_092834_create_home_middle_table', 6),
(54, '2022_07_07_092846_create_home_below_table', 6),
(55, '2022_07_07_092858_create_home_foot_table', 6),
(56, '2022_08_15_140524_create_faq_table', 7),
(57, '2022_08_18_124355_add_privilege_to_databases_table', 8),
(58, '2022_08_18_151009_add_unit_to_regulations_table', 9),
(59, '2022_08_22_043644_create_regulation_files_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_party_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addendum_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `other_point` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `landlord_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_director_disposition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_internal_memo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_lease_application_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_right_owner_id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_npwp_individual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_family_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_marriage_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_death_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_heir_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_director_id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_deed_of_incorporation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sk_menkumham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_siup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_tdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_npwp_legal_entity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_skd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_skdu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_imb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sppt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_dp_receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_payment_imb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_procuration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_previous_agreement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_director_procuration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_lease_application` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_lease_eligibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cb_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_litigations`
--

CREATE TABLE `other_litigations` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_loss` int(11) NOT NULL,
  `incident_chronology` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outstandings`
--

CREATE TABLE `outstandings` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_responsible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_outstanding` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outstanding_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outstanding_types` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outstanding_sales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outstanding_cod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outstanding_start` date NOT NULL,
  `outstanding_end` date NOT NULL,
  `incident_chronology` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_management_disposition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_deed_of_incoporation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_sk_menkumham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_director_id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_nib` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_business_permit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_location_permit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_outstanding_recap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_billing_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_internal_memo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `outstanding_packing_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_subpoena_draft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_subpoena_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_delivery_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_subpoena_agent_response` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_update` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_subpoena_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_agreement_draft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_court_lawsuit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legal_advice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legal_manager_advice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permits`
--

CREATE TABLE `permits` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `legal_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_disposition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_document1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_document2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_document3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latest_skpd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_of_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_control` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FALSE',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `check_expired` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FALSE',
  `expired` date DEFAULT NULL,
  `extend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `power_attorneys`
--

CREATE TABLE `power_attorneys` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attorney_purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_internal_memo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_supporting_document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_endorsee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cb_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_scan_power_attorneys` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regulations`
--

CREATE TABLE `regulations` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_date` date DEFAULT NULL,
  `agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privilege` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regulations`
--

INSERT INTO `regulations` (`id`, `name`, `type`, `file`, `number`, `date`, `about`, `set_date`, `agency`, `status`, `privilege`, `created_at`, `updated_at`, `unit`) VALUES
('REG001', 'KEMENKEU NO. 92/PMK.010/2022', 'Kementrian Perhubungan', NULL, '92', '2022-08-22', 'PERUBAHAN ATAS PERATURAN MENTERI KEUANGAN NOMOR 47/PMK.010/2022 TENTANG PENETAPAN TARIF BEA MASUK DALAM RANGKA PERSETUJUAN MENGENAI PERDAGANGAN BARANG DALAM PERSETUJUAN KERANGKA KERJA MENGENAI KERJA SAMA EKONOMI MENYELURUH ANTARA PERHIMPUNAN BANGSA-BANGSA ASIA TENGGARA DAN REPUBLIK INDIA (ASEAN-INDIA FREE TRADE AREA)', '2022-08-22', 'Kementerian Perhubungan', 'Aktif', 'ALL', '2022-08-21 22:12:51', '2022-08-21 22:12:51', 'Litigation');

-- --------------------------------------------------------

--
-- Table structure for table `regulation_files`
--

CREATE TABLE `regulation_files` (
  `regulation_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regulation_files`
--

INSERT INTO `regulation_files` (`regulation_id`, `name`, `created_at`, `updated_at`) VALUES
('REG001', 'regulation/1LTi283AnH3bKL91CCNKVTYocIWbrTlZazAsfjxq-.pdf', '2022-08-21 22:12:51', '2022-08-21 22:12:51'),
('REG001', 'regulation/bTSNCIMen124VYjLX6ZA9FEN02XeKeP9j8dFU1kv-.pdf', '2022-08-21 22:12:51', '2022-08-21 22:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `regulation_requests_access`
--

CREATE TABLE `regulation_requests_access` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `database_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regulation_requests_access`
--

INSERT INTO `regulation_requests_access` (`id`, `database_id`, `name`, `nik`, `location`, `created_at`, `updated_at`) VALUES
(1, 'c8d5f369-7297-474c-8659-44ee93560760', 'asdfas', 'asdf', 'asdf', '2022-07-06 04:33:05', '2022-07-06 04:33:05'),
(2, 'c8d5f369-7297-474c-8659-44ee93560760', 'asdfas', 'asdfa', 'asdfas', '2022-07-06 04:35:01', '2022-07-06 04:35:01'),
(3, 'c140b22e-62c2-4fa2-8f43-561ce9688839', 'werwerwr', 'asdfa', 'werwer', '2022-07-06 06:00:29', '2022-07-06 06:00:29'),
(4, 'c140b22e-62c2-4fa2-8f43-561ce9688839', 'Mikael', 'Indonesia', 'asd', '2022-07-06 09:31:53', '2022-07-06 09:31:53'),
(5, 'c140b22e-62c2-4fa2-8f43-561ce9688839', 'Mikael', 'Indonesia', 'Test', '2022-08-09 03:21:26', '2022-08-09 03:21:26'),
(6, 'c97dd128-eb7e-40a3-845b-6143db0e6ea5', 'Mikael', 'Indonesia', 'asd', '2022-08-21 22:35:17', '2022-08-21 22:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `regulation_types`
--

CREATE TABLE `regulation_types` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regulation_types`
--

INSERT INTO `regulation_types` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
('RET003', 'Peraturan Perusahaan', 'Khusus', '2022-06-23 13:09:51', '2022-06-23 13:09:51'),
('RET004', 'Kementrian Perhubungan', 'Umum', '2022-06-28 05:21:23', '2022-06-28 05:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('USR002', 'Joko', '1234', 'USER', 'joko@jne.co.id', NULL, '$2y$10$oNkUJsY1uhiDjCpqWi3a7.CC/cpDnkPcIJb184h59AQSPad8OiLRa', NULL, '2022-06-23 05:56:47', '2022-06-23 05:56:47'),
('USR003', 'Nanang', '12345', 'LEGAL', 'nanang@jne.co.id', NULL, '$2y$10$bShjHyItONs8FW5tLMZM3Obnf818ZWkH340MzDAdAcSqTC8yPIu8y', NULL, '2022-06-23 05:56:47', '2022-06-23 05:56:47'),
('USR004', 'Udin', '123456', 'CS', 'udin@jne.co.id', NULL, '$2y$10$HzovAxso4AxeCQiayAVvwOI.TDzXC5nxIvxpeaFqMy6D1tl535COS', NULL, '2022-06-23 05:56:47', '2022-06-23 05:56:47'),
('USR005', 'Samson', '1234567', 'LITI1', 'samson@jne.co.id', NULL, '$2y$10$AciOleIpqBMTj5MxY7UTJeV72nb.HU1XwWZWTCfJC6506UjaEEFsq', NULL, '2022-06-23 05:56:47', '2022-06-23 05:56:47'),
('USR006', 'Jafar', '12345678', 'LITI2', 'jafar@jne.co.id', NULL, '$2y$10$HInDBr4KK8PmHFzaOdTN.ORslci5mdtPldlQ/MEWgLvqZdkFeFmAW', NULL, '2022-06-23 05:56:47', '2022-06-23 05:56:47'),
('USR007', 'Riri', '123456789', 'LITIMANAGER', 'riri@jne.co.id', NULL, '$2y$10$si81ZRfNCqudwI149Atn..SbUGHsQOjZFljCA00/mFpDd5PEBz/6q', NULL, '2022-06-23 05:56:47', '2022-06-23 05:56:47'),
('USR008', 'Vani', '12345632', 'CD', 'vani@jne.co.id', NULL, '$2y$10$aIasvVW2xYNsMpduZQ5wOeU1DUWqJJhVrzWnywLN/cWTTCkrnzmYG', NULL, '2022-06-23 05:56:47', '2022-06-23 05:56:47'),
('USR009', 'Sana', '1779', 'HEADLEGAL', 'sana@jne.co.id', NULL, '$2y$10$FWWBUyDM8WXacgDMZdqF5ecI4jTh7lMsalANisQn93n3nzkf7cKuu', NULL, '2022-06-23 05:56:47', '2022-06-23 05:56:47'),
('USR012', 'Linling', '123412341', 'LEGAL', 'linling@jne.co.id', NULL, '$2y$10$5A.pqBy365WWrNAN/26BAewdJ0N6Ax662ZW7aUhkmAHXDlA0g8Frq', NULL, '2022-07-05 03:59:04', '2022-07-05 03:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement_nominal` int(11) NOT NULL,
  `vendor_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_form_vendor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_supporting_attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_party_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_party_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_party_regency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_party_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_party_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_party_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional_party_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addendum_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_guarantee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_guarantee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_point` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_deed_of_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_nib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_business_permit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_oss_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_director_id_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correspondence_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correspondence_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_vendor_offer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_mom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_dispotition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_agreement_draft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cb_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_director_procuration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs`
--
ALTER TABLE `cs`
  ADD UNIQUE KEY `cs_id_unique` (`id`),
  ADD KEY `cs_user_id_foreign` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD UNIQUE KEY `customers_id_unique` (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `customer_disputes`
--
ALTER TABLE `customer_disputes`
  ADD UNIQUE KEY `customer_disputes_id_unique` (`id`),
  ADD KEY `customer_disputes_user_id_foreign` (`user_id`);

--
-- Indexes for table `databases`
--
ALTER TABLE `databases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `database_files`
--
ALTER TABLE `database_files`
  ADD KEY `database_files_database_id_foreign` (`database_id`);

--
-- Indexes for table `database_public_requests`
--
ALTER TABLE `database_public_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `database_public_requests_database_id_foreign` (`database_id`);

--
-- Indexes for table `database_requests`
--
ALTER TABLE `database_requests`
  ADD UNIQUE KEY `database_requests_id_unique` (`id`),
  ADD KEY `database_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `database_request_files`
--
ALTER TABLE `database_request_files`
  ADD UNIQUE KEY `database_request_files_id_unique` (`id`),
  ADD KEY `database_request_files_document_id_foreign` (`document_id`),
  ADD KEY `database_request_files_file_id_foreign` (`file_id`);

--
-- Indexes for table `database_types`
--
ALTER TABLE `database_types`
  ADD UNIQUE KEY `database_types_id_unique` (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD KEY `districts_regency_id_foreign` (`regency_id`),
  ADD KEY `districts_id_index` (`id`);

--
-- Indexes for table `document_request`
--
ALTER TABLE `document_request`
  ADD UNIQUE KEY `document_request_id_unique` (`id`),
  ADD KEY `document_request_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD UNIQUE KEY `faq_id_unique` (`id`);

--
-- Indexes for table `file_document_request`
--
ALTER TABLE `file_document_request`
  ADD UNIQUE KEY `file_document_request_id_unique` (`id`),
  ADD KEY `file_document_request_document_id_foreign` (`document_id`);

--
-- Indexes for table `frauds`
--
ALTER TABLE `frauds`
  ADD UNIQUE KEY `frauds_id_unique` (`id`),
  ADD KEY `frauds_user_id_foreign` (`user_id`);

--
-- Indexes for table `home_below`
--
ALTER TABLE `home_below`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_foot`
--
ALTER TABLE `home_foot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_middle`
--
ALTER TABLE `home_middle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_top`
--
ALTER TABLE `home_top`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD UNIQUE KEY `information_id_unique` (`id`);

--
-- Indexes for table `land_sells`
--
ALTER TABLE `land_sells`
  ADD UNIQUE KEY `land_sells_id_unique` (`id`),
  ADD KEY `land_sells_user_id_foreign` (`user_id`);

--
-- Indexes for table `leases`
--
ALTER TABLE `leases`
  ADD UNIQUE KEY `leases_id_unique` (`id`),
  ADD KEY `leases_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD UNIQUE KEY `others_id_unique` (`id`);

--
-- Indexes for table `other_litigations`
--
ALTER TABLE `other_litigations`
  ADD UNIQUE KEY `other_litigations_id_unique` (`id`),
  ADD KEY `other_litigations_user_id_foreign` (`user_id`);

--
-- Indexes for table `outstandings`
--
ALTER TABLE `outstandings`
  ADD UNIQUE KEY `outstandings_id_unique` (`id`),
  ADD KEY `outstandings_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permits`
--
ALTER TABLE `permits`
  ADD UNIQUE KEY `permits_id_unique` (`id`),
  ADD KEY `permits_user_id_foreign` (`user_id`),
  ADD KEY `permits_legal_id_foreign` (`legal_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `power_attorneys`
--
ALTER TABLE `power_attorneys`
  ADD UNIQUE KEY `power_attorneys_id_unique` (`id`),
  ADD KEY `power_attorneys_user_id_foreign` (`user_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD KEY `provinces_id_index` (`id`);

--
-- Indexes for table `regencies`
--
ALTER TABLE `regencies`
  ADD KEY `regencies_province_id_foreign` (`province_id`),
  ADD KEY `regencies_id_index` (`id`);

--
-- Indexes for table `regulations`
--
ALTER TABLE `regulations`
  ADD UNIQUE KEY `regulations_id_unique` (`id`);

--
-- Indexes for table `regulation_files`
--
ALTER TABLE `regulation_files`
  ADD KEY `regulation_files_regulation_id_foreign` (`regulation_id`);

--
-- Indexes for table `regulation_requests_access`
--
ALTER TABLE `regulation_requests_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regulation_requests_access_database_id_foreign` (`database_id`);

--
-- Indexes for table `regulation_types`
--
ALTER TABLE `regulation_types`
  ADD UNIQUE KEY `regulation_types_id_unique` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_id_unique` (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD UNIQUE KEY `vendors_id_unique` (`id`),
  ADD KEY `vendors_user_id_foreign` (`user_id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD KEY `villages_district_id_foreign` (`district_id`),
  ADD KEY `villages_id_index` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `database_public_requests`
--
ALTER TABLE `database_public_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_below`
--
ALTER TABLE `home_below`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_foot`
--
ALTER TABLE `home_foot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_middle`
--
ALTER TABLE `home_middle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_top`
--
ALTER TABLE `home_top`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regulation_requests_access`
--
ALTER TABLE `regulation_requests_access`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cs`
--
ALTER TABLE `cs`
  ADD CONSTRAINT `cs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_disputes`
--
ALTER TABLE `customer_disputes`
  ADD CONSTRAINT `customer_disputes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `database_files`
--
ALTER TABLE `database_files`
  ADD CONSTRAINT `database_files_database_id_foreign` FOREIGN KEY (`database_id`) REFERENCES `databases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `database_public_requests`
--
ALTER TABLE `database_public_requests`
  ADD CONSTRAINT `database_public_requests_database_id_foreign` FOREIGN KEY (`database_id`) REFERENCES `regulations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `database_requests`
--
ALTER TABLE `database_requests`
  ADD CONSTRAINT `database_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `database_request_files`
--
ALTER TABLE `database_request_files`
  ADD CONSTRAINT `database_request_files_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `database_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `database_request_files_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `regulations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `regencies` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `document_request`
--
ALTER TABLE `document_request`
  ADD CONSTRAINT `document_request_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file_document_request`
--
ALTER TABLE `file_document_request`
  ADD CONSTRAINT `file_document_request_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `document_request` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `frauds`
--
ALTER TABLE `frauds`
  ADD CONSTRAINT `frauds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `land_sells`
--
ALTER TABLE `land_sells`
  ADD CONSTRAINT `land_sells_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leases`
--
ALTER TABLE `leases`
  ADD CONSTRAINT `leases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_litigations`
--
ALTER TABLE `other_litigations`
  ADD CONSTRAINT `other_litigations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `outstandings`
--
ALTER TABLE `outstandings`
  ADD CONSTRAINT `outstandings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permits`
--
ALTER TABLE `permits`
  ADD CONSTRAINT `permits_legal_id_foreign` FOREIGN KEY (`legal_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `power_attorneys`
--
ALTER TABLE `power_attorneys`
  ADD CONSTRAINT `power_attorneys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regencies`
--
ALTER TABLE `regencies`
  ADD CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `regulation_files`
--
ALTER TABLE `regulation_files`
  ADD CONSTRAINT `regulation_files_regulation_id_foreign` FOREIGN KEY (`regulation_id`) REFERENCES `regulations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regulation_requests_access`
--
ALTER TABLE `regulation_requests_access`
  ADD CONSTRAINT `regulation_requests_access_database_id_foreign` FOREIGN KEY (`database_id`) REFERENCES `databases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
