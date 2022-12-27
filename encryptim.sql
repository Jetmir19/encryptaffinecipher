-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 02:41 AM
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
-- Table structure for table `encryptim`
--

CREATE TABLE `encryptim` (
  `id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `textarray` varchar(50) NOT NULL,
  `celesi1` int(11) NOT NULL,
  `celesi2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `encryptim`
--

INSERT INTO `encryptim` (`id`, `text`, `textarray`, `celesi1`, `celesi2`) VALUES
(87, 'JETMIR', '', 7, 2),
(88, 'JETO', '', 4, 2),
(89, 'sfsdf', '', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `encrypt_details`
--

CREATE TABLE `encrypt_details` (
  `encrypt_details_id` int(11) NOT NULL,
  `encryptim_ID` int(11) NOT NULL,
  `nr_rendor` int(11) NOT NULL,
  `modd` int(11) NOT NULL,
  `decc` decimal(10,2) NOT NULL,
  `split1` int(11) NOT NULL,
  `split2` int(11) NOT NULL,
  `shkronjat_pa_encryptim` varchar(1) COLLATE utf32_swedish_ci NOT NULL,
  `numrat_pa_encryptim_array` int(11) NOT NULL,
  `shkronjat_me_encryptim` varchar(1) COLLATE utf32_swedish_ci NOT NULL,
  `numrat_me_encryptim_array` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Dumping data for table `encrypt_details`
--

INSERT INTO `encrypt_details` (`encrypt_details_id`, `encryptim_ID`, `nr_rendor`, `modd`, `decc`, `split1`, `split2`, `shkronjat_pa_encryptim`, `numrat_pa_encryptim_array`, `shkronjat_me_encryptim`, `numrat_me_encryptim_array`) VALUES
(335, 87, 1, 65, '2.50', 2, 50, 'J', 9, 'N', 13),
(336, 87, 2, 30, '1.15', 1, 15, 'E', 4, 'E', 4),
(337, 87, 3, 135, '5.19', 5, 19, 'T', 19, 'F', 5),
(338, 87, 4, 86, '3.31', 3, 31, 'M', 12, 'I', 8),
(339, 87, 5, 58, '2.23', 2, 23, 'I', 8, 'G', 6),
(340, 87, 6, 121, '4.65', 4, 65, 'R', 17, 'R', 17),
(341, 88, 1, 38, '1.46', 1, 46, 'J', 9, 'M', 12),
(342, 88, 2, 18, '0.69', 0, 69, 'E', 4, 'S', 18),
(343, 88, 3, 78, '3.00', 3, 0, 'T', 19, 'A', 0),
(344, 88, 4, 58, '2.23', 2, 23, 'O', 14, 'G', 6);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `encryptim`
--
ALTER TABLE `encryptim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `encrypt_details`
--
ALTER TABLE `encrypt_details`
  MODIFY `encrypt_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
