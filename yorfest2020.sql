-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 03:55 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `chatid`
--

CREATE TABLE `chatid` (
  `id` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 8, 'U2FsdGVkX18Rz/gIXsMTUVInEfTJVQJsHLI1zqdy4M4=', '2020-10-26 01:57:10', '2020-10-26 01:57:10');

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
  `conference` varchar(200) NOT NULL,
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

INSERT INTO `participant` (`id`, `name`, `email`, `phone`, `birth`, `company`, `interest`, `conference`, `photourl`, `cardurl`, `password`, `verifiedkey`, `verified`, `verifiedtime`, `api_key`, `registertime`, `last_update`) VALUES
(8, 'Mardika Reza Setiawan', 'mardika.reza@gmail.com', '085659622363', '1991-08-17', 'Atomicode', 'Organic Business', '0', 'profilepictures/mardika.reza@gmail.com.jpg', 'businesscard/mardika.reza@gmail.com.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '5f962cce5ce31', 1, '2020-10-26 01:56:53', '5f96343744dd1', '2020-10-26 01:56:30', '2020-10-26 02:47:13');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `livewall`
--
ALTER TABLE `livewall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
