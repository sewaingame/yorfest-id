-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 09:31 AM
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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `counter` int(11) NOT NULL,
  `id` varchar(200) NOT NULL,
  `chatid` varchar(500) NOT NULL,
  `participantid` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`counter`, `id`, `chatid`, `participantid`, `message`, `status`, `time`) VALUES
(171, 'f24dda1e-2ec2-4612-b9cc-6475ed16a729', '13cee27a2bd93915479f049378cffdd3', 3, 'U2FsdGVkX19x+Xt7ZrYkoCwvHJxIoTRK8PJPtjAdQWY=', 1, '2020-10-25 07:52:52'),
(172, 'eb86040b-ec1c-41b5-9004-39665b74634f', '13cee27a2bd93915479f049378cffdd3', 3, 'U2FsdGVkX18/SlCu/RRVmRfB8h54m++hxdb0MKC6oKk=', 1, '2020-10-25 07:55:32'),
(173, '944b8d04-5203-4964-ba43-4c8b6d823563', '13cee27a2bd93915479f049378cffdd3', 3, 'U2FsdGVkX19QZsEb4UEsCFpva//LLwtPwUHNCd23dDk=', 1, '2020-10-25 07:55:54'),
(174, 'c423299b-7368-4566-bb8e-cf539e931993', '13cee27a2bd93915479f049378cffdd3', 3, 'U2FsdGVkX1/GAyZPFbwot3hPh62M3GLW29CUTLquU9w=', 1, '2020-10-25 07:56:42'),
(175, '0340ba31-376b-4dfb-886c-479cde928a78', '13cee27a2bd93915479f049378cffdd3', 1, 'U2FsdGVkX1+b20F0+TAt/LdxENPAa+usw7X372zCM3M=', 1, '2020-10-25 07:56:52'),
(176, '6b2ea44e-8f88-40dc-911b-cb7b2cf1fb36', '13cee27a2bd93915479f049378cffdd3', 3, 'U2FsdGVkX1+s1bF0NWnsWh+pXNReI8c+aD/uh8EH0ZU=', 1, '2020-10-25 08:00:15'),
(177, '33f45a11-1a50-4efb-8d42-4621c9ec2a40', '13cee27a2bd93915479f049378cffdd3', 3, 'U2FsdGVkX1+RazAbtc8H1ErYSzYTfMhm4iAGXHfUQrU=', 1, '2020-10-25 08:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `chatid`
--

CREATE TABLE `chatid` (
  `id` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatid`
--

INSERT INTO `chatid` (`id`, `name`, `time`) VALUES
('13cee27a2bd93915479f049378cffdd3', '', '2020-10-25 07:23:25'),
('98c6f2c2287f4c73cea3d40ae7ec3ff2', '', '2020-10-25 07:26:47');

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
(3, 1, 'U2FsdGVkX1/W70087FlQmETg4i81PP9Sjp/okJpWf0g=', '2020-10-23 03:31:05', '2020-10-24 21:49:53'),
(4, 1, 'U2FsdGVkX19oW8+vSgqPWuXJncT4X2W2+Em9cgZCZr8=', '2020-10-23 23:18:22', '2020-10-23 23:18:22'),
(5, 1, 'U2FsdGVkX18CRyf4/Q/AxIoDNBDSjnYu0JYgvhKqtxE=', '2020-10-24 01:18:41', '2020-10-24 01:18:45'),
(6, 1, 'U2FsdGVkX1+VYwsyMZO8iDsrMTqj1JiP5CvtZ1Jjx0Q=', '2020-10-24 21:50:41', '2020-10-24 23:15:39');

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
(4, 1, 5, 'U2FsdGVkX1/moWkAGMr/vw9zG3HoNon28eL/Q/A/7SI=', '2020-10-24 01:18:45'),
(5, 1, 3, 'U2FsdGVkX193fKR5a+U+dnEd0fKN02Guyf4yOa4dx5I=', '2020-10-24 21:49:53'),
(6, 1, 6, 'U2FsdGVkX1/uGPG0pzauUeonpqtzKIt5PrW0G5TLtA/gvrLx5tSZBRoxwAfdb+lW', '2020-10-24 23:15:39');

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
(1, 'Mardika Reza Setiawan', 'mardika.reza@gmail.com', '085659622363', '1991-08-17', 'Atomicode', 'Organic Healthy Life Style', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '5f9242a35dc42', 1, '2020-10-23 02:45:09', '5f94f43aa4a9b', '2020-10-23 02:40:35', '2020-10-25 08:31:09'),
(2, 'Reza', 'bukan.mardika@gmail.com', '085720025982', '1991-08-17', 'MServerID', 'Organic Agriculture', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '5f94a2939f731', 1, '2020-10-24 21:54:53', '5f950fdac1970', '2020-10-24 21:54:27', '2020-10-25 06:07:05'),
(3, 'Indah Permatasari', 'indahpermtasari@gmail.com', '085695632544', '1991-08-14', 'Sharp', 'Organic Healthy Life Style', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '5f94a2eae4530', 1, '2020-10-24 21:57:29', '5f95360267215', '2020-10-24 21:55:54', '2020-10-25 08:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `participant_chat`
--

CREATE TABLE `participant_chat` (
  `id` int(11) NOT NULL,
  `participantid` int(11) NOT NULL,
  `chatid` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant_chat`
--

INSERT INTO `participant_chat` (`id`, `participantid`, `chatid`, `time`) VALUES
(23, 1, '13cee27a2bd93915479f049378cffdd3', '2020-10-25 07:23:25'),
(24, 3, '13cee27a2bd93915479f049378cffdd3', '2020-10-25 07:23:25'),
(25, 1, '98c6f2c2287f4c73cea3d40ae7ec3ff2', '2020-10-25 07:26:47'),
(26, 2, '98c6f2c2287f4c73cea3d40ae7ec3ff2', '2020-10-25 07:26:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`counter`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `participantid` (`participantid`),
  ADD KEY `chatid` (`chatid`);

--
-- Indexes for table `chatid`
--
ALTER TABLE `chatid`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `participant_chat`
--
ALTER TABLE `participant_chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chatid` (`chatid`),
  ADD KEY `participantid` (`participantid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `livewall`
--
ALTER TABLE `livewall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `livewall_comment`
--
ALTER TABLE `livewall_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `livewall_like`
--
ALTER TABLE `livewall_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `participant_chat`
--
ALTER TABLE `participant_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_chatid` FOREIGN KEY (`chatid`) REFERENCES `chatid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_participant` FOREIGN KEY (`participantid`) REFERENCES `participant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `participant_chat`
--
ALTER TABLE `participant_chat`
  ADD CONSTRAINT `participant_chat_chatid` FOREIGN KEY (`chatid`) REFERENCES `chatid` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participant_participant` FOREIGN KEY (`participantid`) REFERENCES `participant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
