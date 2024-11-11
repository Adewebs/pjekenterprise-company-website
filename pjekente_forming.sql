-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2024 at 09:22 AM
-- Server version: 10.6.20-MariaDB
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pjekente_forming`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'adewebstech@gmail.com', '$2y$10$amUaeTQBZ2yVspHBgM8i2uSueJsIWZgNeESnkgY4JmA08gYf5ed/i', '2024-11-06 14:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'contact us',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `type`, `created_at`) VALUES
(1, 'Adegboye Adebo', 'adewebstech@gmail.com', 'I want to Renew my domain', 'testing', 'contact us', '2024-11-06 14:10:38'),
(2, 'Adegboye Adebo', 'adewebstech@gmail.com', 'I got This Error While Trying To Install WHM/Cpanel License on my server', 'this is also atesting', 'contact us', '2024-11-06 14:21:53'),
(3, 'Adewebs In', 'adegboye.adebo712@gmail.com', 'I want to Renew my domain', 'this is testing', 'contact us', '2024-11-06 14:49:26'),
(4, 'Adegboye Adebo', 'adegboye.adebo712@gmail.com', 'I want to Renew my domain', 'tgj', 'contact us', '2024-11-06 14:52:22'),
(5, 'Adegboye Adebo', 'adewebstech@gmail.com', ';lmds;ibhl', 'thh', 'contact us', '2024-11-06 14:53:59'),
(6, '9MOBILE 2GB', 'adegboye.adebo712@gmail.com', 'Cannot Install \"install_lets_encrypt_autossl_provider\" And Invalid Expiry Date for Cpanel Purchase ', 'Tgg', 'contact us', '2024-11-06 14:55:36'),
(7, 'Alliy Bello', 'alliybello2@gmail.com', 'Deposit ', 'Hi ', 'contact us', '2024-11-07 11:44:56'),
(8, 'Search Engine Index', 'submissions@searchindex.site', 'Add pjekenterprise.com to Google Search Index!', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://SearchRegister.org/\r\n', 'contact us', '2024-11-07 16:02:06'),
(9, 'adesola', 'adegboye.adebo712@gmail.com', 'i am testing career', 'this is career testiong ', 'Career Application', '2024-11-07 18:05:17'),
(10, 'Search Engine Index', 'submissions@searchindex.site', 'Add pjekenterprise.com to Google Search Index!', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://SearchRegister.org/\r\n', 'contact us', '2024-11-08 16:09:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
