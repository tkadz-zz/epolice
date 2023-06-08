-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2023 at 08:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epolice`
--

-- --------------------------------------------------------

--
-- Table structure for table `actionLog`
--

CREATE TABLE `actionLog` (
  `id` int(11) NOT NULL,
  `nameSurname` varchar(225) NOT NULL,
  `action` text NOT NULL,
  `agent` text NOT NULL,
  `dateAdded` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actionLog`
--

INSERT INTO `actionLog` (`id`, `nameSurname`, `action`, `agent`, `dateAdded`) VALUES
(146, 'WIRIRANAI NGWARU', 'Added student account (SHARON CHIMUKA)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:07:01'),
(147, 'WIRIRANAI NGWARU', 'Added student account (VANESSA GURURE)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:09:45'),
(148, 'WIRIRANAI NGWARU', 'Added student account (RUTENDO KARICHI)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:14:30'),
(149, 'WIRIRANAI NGWARU', 'Added student account (ENIFAH MAMBINDE)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:16:28'),
(150, 'WIRIRANAI NGWARU', 'Added student account (TIFFANY VEREMU)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:18:01'),
(151, 'WIRIRANAI NGWARU', 'Recorded CBHC Result for student account (TIFFANY VEREMU)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:24:24'),
(152, 'WIRIRANAI NGWARU', 'Recorded CBHC Result for student account (ENIFAH MAMBINDE)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:24:58'),
(153, 'WIRIRANAI NGWARU', 'Recorded CBHC Result for student account (RUTENDO KARICHI)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:25:08'),
(154, 'WIRIRANAI NGWARU', 'Recorded CBHC Result for student account (VANESSA GURURE)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:25:19'),
(155, 'WIRIRANAI NGWARU', 'Recorded CBHC Result for student account (SHARON CHIMUKA)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:25:34'),
(156, 'WIRIRANAI NGWARU', 'Recorded Certificate Result for student account (TIFFANY VEREMU)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:25:50'),
(157, 'WIRIRANAI NGWARU', 'Recorded Certificate Result for student account (ENIFAH MAMBINDE)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:26:08'),
(158, 'WIRIRANAI NGWARU', 'Recorded Certificate Result for student account (RUTENDO KARICHI)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:26:19'),
(159, 'WIRIRANAI NGWARU', 'Recorded Certificate Result for student account (VANESSA GURURE)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:26:34'),
(160, 'WIRIRANAI NGWARU', 'Created admin account (EDEN-NATASHA MUMVURI)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:35:12'),
(161, 'WIRIRANAI NGWARU', 'Created admin account (EDEN-ASHLEY MUTEDZA)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:35:44'),
(162, 'WIRIRANAI NGWARU', 'Created admin account (TANAKA KADZUNGE)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 11:36:10'),
(163, 'TANAKA KADZUNGE', 'Added student account (USER TEST)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 13:41:58'),
(164, 'WIRIRANAI NGWARU', 'Captured payment for student account (USER TEST)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-24 13:49:06'),
(165, 'WIRIRANAI NGWARU', 'Recorded CBHC Result for student account (USER TEST)', 'Mozilla/5.0 (Linux; Android 7.0; SM-G950U Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.84 Mobile Safari/537.36', '2023-05-24 14:06:46'),
(166, 'TANAKA KADZUNGE', 'Enrolled student account (USER TEST)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-25 07:19:48'),
(167, 'WIRIRANAI NGWARU', 'Created admin account (QWF QFWQ)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-28 22:06:55'),
(168, 'WIRIRANAI NGWARU', 'Deleted admin account (QWF QFWQ)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-28 22:08:41'),
(169, 'WIRIRANAI NGWARU', 'Created admin account (DSVDSVDS VDSVDSVDSV)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-28 22:09:15'),
(170, 'WIRIRANAI NGWARU', 'Created admin account (SACSACSAC SACSACSACSA)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-28 22:12:41'),
(171, 'WIRIRANAI NGWARU', 'Deleted admin account (SACSACSAC SACSACSACSA)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-28 22:12:47'),
(172, 'WIRIRANAI NGWARU', 'Deleted admin account (DSVDSVDS VDSVDSVDSV)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-28 22:12:52'),
(173, 'WIRIRANAI NGWARU', 'Created admin account (TEST ADMIN)', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '2023-05-29 07:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `surname` varchar(225) NOT NULL,
  `nationalID` varchar(225) NOT NULL,
  `avatar` varchar(225) NOT NULL,
  `sex` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `accessLevel` int(11) NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userID`, `name`, `surname`, `nationalID`, `avatar`, `sex`, `address`, `phone`, `email`, `accessLevel`, `lastUpdated`) VALUES
(1, 1, 'WIRIRANAI', 'NGWARU', '', '', 'MALE', 'N/A', '078956402', 'example@example.com', 1, '2023-05-28 14:15:28'),
(25, 131, 'TEST', 'ADMIN', '1234567890', '', '', '', '', '', 1, '2023-05-29 05:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `crimeReports`
--

CREATE TABLE `crimeReports` (
  `id` int(11) NOT NULL,
  `caseID` varchar(225) NOT NULL,
  `addedBy` varchar(225) NOT NULL,
  `compliantName` varchar(225) NOT NULL,
  `compliantSurname` varchar(225) NOT NULL,
  `complaintID` varchar(225) NOT NULL,
  `complaintDob` varchar(225) NOT NULL,
  `complaintGender` varchar(225) NOT NULL,
  `complaintAddress` varchar(225) NOT NULL,
  `suspectName` varchar(225) NOT NULL,
  `suspectSurname` varchar(225) NOT NULL,
  `suspectDob` varchar(225) NOT NULL,
  `suspectGender` varchar(225) NOT NULL,
  `suspectAddress` varchar(225) NOT NULL,
  `incidentCategory` varchar(225) NOT NULL,
  `incidentAddress` varchar(225) NOT NULL,
  `IncidentDateTime` varchar(225) NOT NULL,
  `inceidentDescription` text NOT NULL,
  `solved` int(11) NOT NULL,
  `dateAdded` varchar(225) NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ToFrom` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateAdded` varchar(225) NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mostWanted`
--

CREATE TABLE `mostWanted` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `surname` varchar(225) NOT NULL,
  `source` varchar(225) NOT NULL,
  `dateAdded` varchar(225) NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mostWanted`
--

INSERT INTO `mostWanted` (`id`, `name`, `surname`, `source`, `dateAdded`, `lastUpdated`) VALUES
(2, 'rhrth', 'htrhr', 'image/6473a77c68b872.94646591.jpg', '2023-05-28 21:11:56', '2023-05-28 19:11:56'),
(3, 'KId', 'Lox lux', 'image/6473b0e8de5159.81612331.png', '2023-05-28 21:52:08', '2023-05-28 19:52:08'),
(4, 'fire', 'moto moto', 'image/6473b0fa6bc356.94129340.jpg', '2023-05-28 21:52:26', '2023-05-28 19:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `public`
--

CREATE TABLE `public` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `secondName` varchar(225) NOT NULL,
  `surname` varchar(225) NOT NULL,
  `nationalID` varchar(225) NOT NULL,
  `avatar` varchar(225) NOT NULL,
  `sex` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `public`
--

INSERT INTO `public` (`id`, `userID`, `name`, `secondName`, `surname`, `nationalID`, `avatar`, `sex`, `address`, `phone`, `email`, `lastUpdated`) VALUES
(41, 123, 'PANASHE', '', 'MAPUNZA', 'admin', '', 'MALE', '', '123', '', '2023-05-29 06:22:04'),
(42, 126, 'TEST', '', 'USER1', '1234567890', '', '', '', '', '', '2023-05-28 14:36:38'),
(43, 127, 'dsf', '', 'dfsf', '2345341122', '', '', '', '', '', '2023-05-28 19:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `tipsOff`
--

CREATE TABLE `tipsOff` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `surname` varchar(225) NOT NULL,
  `nationalID` varchar(225) NOT NULL,
  `tipoff` text NOT NULL,
  `readStatus` int(11) NOT NULL,
  `dateAdded` varchar(225) NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipsOff`
--

INSERT INTO `tipsOff` (`id`, `name`, `surname`, `nationalID`, `tipoff`, `readStatus`, `dateAdded`, `lastUpdated`) VALUES
(1, 'vfrewf', 'vfewfew', '1323434t53', 'hgrggtrgtrgtrgtrgrg', 1, '2023-05-28 19:14:43', '2023-05-28 18:26:45'),
(3, 'dsvdsv', 'vdsvdsvds', 'vsdvdsv', 'sdvdsvrwefwefewfewfewf', 0, '2023-05-28 : 19:36:45', '2023-05-28 18:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `userRoles`
--

CREATE TABLE `userRoles` (
  `id` int(11) NOT NULL,
  `viewName` varchar(225) NOT NULL,
  `valueName` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userRoles`
--

INSERT INTO `userRoles` (`id`, `viewName`, `valueName`) VALUES
(1, 'Public', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `loginID` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL,
  `lastLogin` varchar(225) NOT NULL,
  `joined` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `loginID`, `password`, `role`, `lastLogin`, `joined`, `status`, `lastUpdated`) VALUES
(1, 'ADMIN', '$2y$10$l0qigAWpY2xIsxXiZAzgjuFvxkMfI/FfzqutvN8DhgdSdMOHfitbG', 'admin', '2023-05-29 08:22:19', '2022-11-07 05:11:20', 1, '2023-05-29 06:22:19'),
(123, 'PKADZ', '$2y$10$vEVjK4rTqKWd0IkybTdEkexFxEV9lpWdJQKhE7IiThvT6ghm/PV5m', 'public', '2023-05-29 08:23:49', '2023-05-28 15:59:13', 1, '2023-05-29 06:23:49'),
(126, 'USER1', '$2y$10$C3tD2S6nnkAOLlM4X21XfeWNbhBHHcK5Ifonzg2D9jDaYWgoKwyMa', 'public', '2023-05-28 16:34:39', '2023-05-28 16:34:38', 1, '2023-05-28 14:35:02'),
(127, '12345', '$2y$10$.TQGdqa0eTotNa43NPIho.n2IjY9XGA6VURIVXRWwqSwJcM.x89Zq', 'public', '2023-05-28 22:00:23', '2023-05-28 21:56:31', 1, '2023-05-28 20:00:23'),
(131, 'ADMIN2', '$2y$10$42rv.5uyzud/WMcr70weMu0NsDRONt18/Y.BP/8jf3nxklXuwlNbG', 'admin', '2023-05-29 08:14:59', '2023-05-29 07:57:01', 1, '2023-05-29 06:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `webDetails`
--

CREATE TABLE `webDetails` (
  `id` int(11) NOT NULL,
  `webYear` varchar(225) NOT NULL,
  `webNameFull` varchar(225) NOT NULL,
  `webNameShort` varchar(225) NOT NULL,
  `webLogo` varchar(225) NOT NULL,
  `webSlogan` varchar(225) NOT NULL,
  `webFooter` varchar(225) NOT NULL,
  `webDescription` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webDetails`
--

INSERT INTO `webDetails` (`id`, `webYear`, `webNameFull`, `webNameShort`, `webLogo`, `webSlogan`, `webFooter`, `webDescription`, `phone`, `email`) VALUES
(1, '2023', 'ZRP E-POLICE', 'ZRP E-P', 'assets/img/logo.png', '', 'ZRP', 'Zimbabwean Republic Police', '+263782956402', 'zrp@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actionLog`
--
ALTER TABLE `actionLog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimeReports`
--
ALTER TABLE `crimeReports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mostWanted`
--
ALTER TABLE `mostWanted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public`
--
ALTER TABLE `public`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nationalID` (`nationalID`);

--
-- Indexes for table `tipsOff`
--
ALTER TABLE `tipsOff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userRoles`
--
ALTER TABLE `userRoles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webDetails`
--
ALTER TABLE `webDetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actionLog`
--
ALTER TABLE `actionLog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `crimeReports`
--
ALTER TABLE `crimeReports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mostWanted`
--
ALTER TABLE `mostWanted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `public`
--
ALTER TABLE `public`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tipsOff`
--
ALTER TABLE `tipsOff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userRoles`
--
ALTER TABLE `userRoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
