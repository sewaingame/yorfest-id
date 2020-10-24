-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 04:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yorfest2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `livewall`
--

CREATE TABLE `livewall` (
  `id` int(11) NOT NULL,
  `participantid` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livewall`
--

INSERT INTO `livewall` (`id`, `participantid`, `message`, `time`, `updated`) VALUES
(1, 1, 'U2FsdGVkX1+1Akwqyrm/Y5JuLsvShFMRosK0lSTjUAM=', '2020-10-23 03:00:46', '2020-10-23 03:05:41'),
(2, 1, 'U2FsdGVkX18YIEfqnrcmigCgRpEi3im3VPOxhlxJLTk=', '2020-10-23 03:05:29', '2020-10-23 03:05:42'),
(3, 1, 'U2FsdGVkX1/W70087FlQmETg4i81PP9Sjp/okJpWf0g=', '2020-10-23 03:31:05', '2020-10-23 03:32:39'),
(4, 1, 'U2FsdGVkX19oW8+vSgqPWuXJncT4X2W2+Em9cgZCZr8=', '2020-10-23 23:18:22', '2020-10-23 23:18:22'),
(5, 1, 'U2FsdGVkX18CRyf4/Q/AxIoDNBDSjnYu0JYgvhKqtxE=', '2020-10-24 01:18:41', '2020-10-24 01:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `livewall_comment`
--

CREATE TABLE `livewall_comment` (
  `id` int(11) NOT NULL,
  `participantid` int(11) NOT NULL,
  `livewallid` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livewall_comment`
--

INSERT INTO `livewall_comment` (`id`, `participantid`, `livewallid`, `message`, `time`) VALUES
(1, 1, 1, 'U2FsdGVkX18m9Mv8QoiweiXB53MBNx6goSJLL9jtaMQ=', '2020-10-23 03:05:41'),
(2, 1, 2, 'U2FsdGVkX19Q11rY1I3xxPKXab/fwz2/J1Gf3uHiS2Y=', '2020-10-23 03:05:42'),
(3, 1, 3, 'U2FsdGVkX18kKCmVo4Gn4XzHxh9ozS3Z4WmO6X69fp4=', '2020-10-23 03:32:39'),
(4, 1, 5, 'U2FsdGVkX1/moWkAGMr/vw9zG3HoNon28eL/Q/A/7SI=', '2020-10-24 01:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `livewall_like`
--

CREATE TABLE `livewall_like` (
  `id` int(11) NOT NULL,
  `livewallid` int(11) NOT NULL,
  `participantid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livewall_like`
--

INSERT INTO `livewall_like` (`id`, `livewallid`, `participantid`, `time`) VALUES
(1, 2, 1, '2020-10-23 03:05:32'),
(2, 1, 1, '2020-10-23 03:05:34'),
(5, 5, 1, '2020-10-24 01:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `birth` varchar(500) NOT NULL,
  `company` varchar(500) NOT NULL,
  `interest` varchar(500) NOT NULL,
  `photourl` varchar(200) NOT NULL,
  `cardurl` varchar(200) NOT NULL,
  `password` longtext NOT NULL,
  `verifiedkey` varchar(500) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `verifiedtime` timestamp NULL DEFAULT NULL,
  `api_key` varchar(500) DEFAULT NULL,
  `registertime` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `name`, `email`, `phone`, `birth`, `company`, `interest`, `photourl`, `cardurl`, `password`, `verifiedkey`, `verified`, `verifiedtime`, `api_key`, `registertime`, `last_update`) VALUES
(1, 'Mardika Reza Setiawan', 'mardika.reza@gmail.com', '085659622363', '1991-08-17', 'Atomicode', 'Organic Healthy Life Style', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '5f9242a35dc42', 1, '2020-10-23 02:45:09', '5f938d279d173', '2020-10-23 02:40:35', '2020-10-24 02:12:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `livewall`
--
ALTER TABLE `livewall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participantid` (`participantid`);

--
-- Indexes for table `livewall_comment`
--
ALTER TABLE `livewall_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participantid` (`participantid`),
  ADD KEY `livewallid` (`livewallid`);

--
-- Indexes for table `livewall_like`
--
ALTER TABLE `livewall_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participantid` (`participantid`),
  ADD KEY `livewallid` (`livewallid`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `livewall`
--
ALTER TABLE `livewall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `livewall_comment`
--
ALTER TABLE `livewall_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `livewall_like`
--
ALTER TABLE `livewall_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `livewall`
--
ALTER TABLE `livewall`
  ADD CONSTRAINT `livewall_participant` FOREIGN KEY (`participantid`) REFERENCES `participant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `livewall_comment`
--
ALTER TABLE `livewall_comment`
  ADD CONSTRAINT `livewall_comment_livewall` FOREIGN KEY (`livewallid`) REFERENCES `livewall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livewall_comment_participant` FOREIGN KEY (`participantid`) REFERENCES `participant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `livewall_like`
--
ALTER TABLE `livewall_like`
  ADD CONSTRAINT `livewall_like_livewallid` FOREIGN KEY (`livewallid`) REFERENCES `livewall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livewall_like_participant` FOREIGN KEY (`participantid`) REFERENCES `participant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
