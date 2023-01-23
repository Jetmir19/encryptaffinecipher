-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 10:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encryptim`
--

-- --------------------------------------------------------

--
-- Table structure for table `decryptim`
--

CREATE TABLE `decryptim` (
  `d_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `d_text` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `d_celesi1` int(11) NOT NULL,
  `d_celesi2` int(11) NOT NULL,
  `d_modd` int(11) NOT NULL,
  `d_count_letters` int(50) NOT NULL,
  `d_curently_script_memory_usage` int(11) NOT NULL,
  `d_after_script_memory_usage` int(11) NOT NULL,
  `d_total_time` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Dumping data for table `decryptim`
--

INSERT INTO `decryptim` (`d_id`, `user_id`, `d_text`, `d_celesi1`, `d_celesi2`, `d_modd`, `d_count_letters`, `d_curently_script_memory_usage`, `d_after_script_memory_usage`, `d_total_time`) VALUES
(848, 0, 'NEFIGR', 7, 2, 26, 6, 463, 466, 0.0036),
(850, 0, 'SDSD', 5, 1, 26, 4, 464, 468, 0.0051),
(851, 0, 'MSAYIS', 7, 2, 26, 6, 466, 469, 0.0065),
(852, 0, 'MSAYIS', 4, 2, 26, 6, 466, 470, 0.0111);

-- --------------------------------------------------------

--
-- Table structure for table `decrypt_details`
--

CREATE TABLE `decrypt_details` (
  `decrypt_details_id` int(11) NOT NULL,
  `decryptim_ID` int(11) NOT NULL,
  `d_nr_rendor` int(11) NOT NULL,
  `d_shkronjat_pa_encryptim` varchar(1) COLLATE utf32_swedish_ci DEFAULT NULL,
  `d_numrat_pa_encryptim_array` int(11) DEFAULT NULL,
  `d_shkronjat_me_encryptim` varchar(1) COLLATE utf32_swedish_ci DEFAULT NULL,
  `d_numrat_me_encryptim_array` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Dumping data for table `decrypt_details`
--

INSERT INTO `decrypt_details` (`decrypt_details_id`, `decryptim_ID`, `d_nr_rendor`, `d_shkronjat_pa_encryptim`, `d_numrat_pa_encryptim_array`, `d_shkronjat_me_encryptim`, `d_numrat_me_encryptim_array`) VALUES
(14778, 848, 1, 'N', 13, 'J', 9),
(14779, 848, 2, 'E', 4, 'E', 4),
(14780, 848, 3, 'F', 5, 'T', 19),
(14781, 848, 4, 'I', 8, 'M', 12),
(14782, 848, 5, 'G', 6, 'I', 8),
(14783, 848, 6, 'R', 17, 'R', 17),
(14790, 850, 1, 'S', 18, 'T', 19),
(14791, 850, 2, 'D', 3, 'Q', 16),
(14792, 850, 3, 'S', 18, 'T', 19),
(14793, 850, 4, 'D', 3, 'Q', 16),
(14794, 851, 1, 'M', 12, 'U', 20),
(14795, 851, 2, 'S', 18, 'G', 6),
(14796, 851, 3, 'Y', 24, 'S', 18),
(14797, 851, 4, 'I', 8, 'M', 12),
(14798, 851, 5, 'S', 18, 'G', 6),
(14799, 852, 1, 'M', 12, 'A', 0),
(14800, 852, 2, 'S', 18, 'A', 0),
(14801, 852, 3, 'A', 0, 'A', 0),
(14802, 852, 4, 'Y', 24, 'A', 0),
(14803, 852, 5, 'I', 8, 'A', 0),
(14804, 852, 6, 'S', 18, 'A', 0);

-- --------------------------------------------------------

--
-- Table structure for table `encryptim`
--

CREATE TABLE `encryptim` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `celesi1` int(11) NOT NULL,
  `celesi2` int(11) NOT NULL,
  `modd` int(11) NOT NULL,
  `count_letters` int(50) NOT NULL,
  `curently_script_memory_usage` int(11) NOT NULL,
  `after_script_memory_usage` int(11) NOT NULL,
  `total_time` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `encryptim`
--

INSERT INTO `encryptim` (`id`, `user_id`, `text`, `celesi1`, `celesi2`, `modd`, `count_letters`, `curently_script_memory_usage`, `after_script_memory_usage`, `total_time`) VALUES
(810, 0, 'JETMIR', 4, 2, 26, 6, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `encrypt_details`
--

CREATE TABLE `encrypt_details` (
  `encrypt_details_id` int(11) NOT NULL,
  `encryptim_ID` int(11) NOT NULL,
  `nr_rendor` int(11) NOT NULL,
  `shkronjat_pa_encryptim` varchar(1) COLLATE utf32_swedish_ci DEFAULT NULL,
  `numrat_pa_encryptim_array` int(11) DEFAULT NULL,
  `shkronjat_me_encryptim` varchar(1) COLLATE utf32_swedish_ci DEFAULT NULL,
  `numrat_me_encryptim_array` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Dumping data for table `encrypt_details`
--

INSERT INTO `encrypt_details` (`encrypt_details_id`, `encryptim_ID`, `nr_rendor`, `shkronjat_pa_encryptim`, `numrat_pa_encryptim_array`, `shkronjat_me_encryptim`, `numrat_me_encryptim_array`) VALUES
(14621, 810, 1, 'J', 9, 'M', 12),
(14622, 810, 2, 'E', 4, 'S', 18),
(14623, 810, 3, 'T', 19, 'A', 0),
(14624, 810, 4, 'M', 12, 'Y', 24),
(14625, 810, 5, 'I', 8, 'I', 8),
(14626, 810, 6, 'R', 17, 'S', 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf32_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_swedish_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'jetmir', '$2y$10$tRPk/jA/xXpEwSkaYU/gHOZ2/XojgJFuCzC4z3UhQpd8YRaslYN2i', '2023-01-08 02:49:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `decryptim`
--
ALTER TABLE `decryptim`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `decrypt_details`
--
ALTER TABLE `decrypt_details`
  ADD PRIMARY KEY (`decrypt_details_id`);

--
-- Indexes for table `encryptim`
--
ALTER TABLE `encryptim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `encrypt_details`
--
ALTER TABLE `encrypt_details`
  ADD PRIMARY KEY (`encrypt_details_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `decryptim`
--
ALTER TABLE `decryptim`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=853;

--
-- AUTO_INCREMENT for table `decrypt_details`
--
ALTER TABLE `decrypt_details`
  MODIFY `decrypt_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14805;

--
-- AUTO_INCREMENT for table `encryptim`
--
ALTER TABLE `encryptim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=811;

--
-- AUTO_INCREMENT for table `encrypt_details`
--
ALTER TABLE `encrypt_details`
  MODIFY `encrypt_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14627;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
