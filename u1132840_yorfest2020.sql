-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2020 at 09:46 PM
-- Server version: 10.3.24-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1132840_yorfest2020`
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
(196, '40dcdfd8-cbea-4d51-a93f-24382052bc1e', 'c5dad58f34c98484d7b817cb33034333', 22, 'U2FsdGVkX19f6+K0Cm/jxsIBa2b4V76GHVMrFQ+5y98=', 1, '2020-10-26 11:47:09'),
(197, '8138fd5a-7616-4375-8add-9869e1a0d478', 'c5dad58f34c98484d7b817cb33034333', 21, 'U2FsdGVkX19u+oLdOBU7Y4z4yPAU0Cl1kGf0S9nyRpo=', 0, '2020-10-26 11:51:22'),
(198, '714fda24-e6d4-4e60-b60a-d59aff172905', 'c5dad58f34c98484d7b817cb33034333', 21, 'U2FsdGVkX19kW2mURKXI+C35jU20d9wgMSnlexzHX5Q6O8xbz/N+gHrnV2VKevok', 0, '2020-10-26 11:51:27'),
(199, 'e5c899a2-d7e0-46dc-bd82-46454261d58a', 'c5dad58f34c98484d7b817cb33034333', 21, 'U2FsdGVkX1+g4+kNe7tguyIyl/KUr/FpME+95M6oSuQ=', 0, '2020-10-26 11:51:32'),
(200, '7ef75f27-5036-4078-8ec6-3f829cc0e3f9', 'c5dad58f34c98484d7b817cb33034333', 21, 'U2FsdGVkX18aKl8BY6xWf64GVJOoSUroNnmL/jrJDwU=', 0, '2020-10-26 13:00:22'),
(201, 'cf064c45-daaa-44f6-ab37-e820093404f0', 'c5dad58f34c98484d7b817cb33034333', 21, 'U2FsdGVkX19dgDYecTCK52YZ23AcDVeJDM9sUsPLZAU=', 0, '2020-10-26 13:00:26');

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
('c5dad58f34c98484d7b817cb33034333', '', '2020-10-26 11:47:09');

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
(15, 20, 'U2FsdGVkX1/20BeVYmzw0djGuQ6VQv3bp8vG97pMlGw=', '2020-10-26 11:33:28', '2020-10-26 11:48:13'),
(16, 22, 'U2FsdGVkX1+2sh45Ooc/NMu+KkKCoE0sdEJhdJk8HfA=', '2020-10-26 11:46:38', '2020-10-26 11:48:41');

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
(16, 22, 15, 'U2FsdGVkX19t2+Kt2xzRIqbC7EKHui8n+//amjupSCE=', '2020-10-26 11:46:49'),
(17, 21, 16, 'U2FsdGVkX1/1w5IAW7lGLwQHwTQnHwb/cOhjR+2zY00=', '2020-10-26 11:47:16'),
(18, 21, 15, 'U2FsdGVkX1+ZmZc8VYU9GyItYHzg0fbcDVDhTupwmQA=', '2020-10-26 11:48:13'),
(19, 22, 16, 'U2FsdGVkX1/SV/vYpJLH0DIVcoOfnBeMBBZwgXP/mYU=', '2020-10-26 11:48:41');

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
(29, 15, 20, '2020-10-26 11:33:31'),
(30, 15, 22, '2020-10-26 11:46:33');

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
(20, 'Mardika Reza Setiawan', 'mardika.reza@gmail.com', '085659622363', '1991-08-17', 'Atomicode', 'Organic Agriculture', 'Visitor', 'profilepictures/mardika.reza@gmail.com.jpg', 'businesscard/mardika.reza@gmail.com.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '5f96b3f3d5fb6', 1, '2020-10-26 11:33:16', '5f96dffeb0995', '2020-10-26 11:33:07', '2020-10-26 14:41:45'),
(21, 'Raymond Musthasella sardi', 'raymondmsardi@gmail.com', '081277772103', '1992-03-21', 'SatuPintu', 'Organic Business', 'Visitor', 'profilepictures/raymondmsardi@gmail.com.jpg', 'businesscard/raymondmsardi@gmail.com.jpg', 'fcea920f7412b5da7be0cf42b8c93759', '5f96b680da06e', 1, '2020-10-26 11:44:47', '5f96c814430b3', '2020-10-26 11:44:00', '2020-10-26 13:00:31'),
(22, 'Manuel', 'Nuel678@gmail.com', '081296406706', '1111-11-11', 'PT Teknologi Interaktif Satu Pintu', 'Organic Healthy Life Style', 'Visitor', 'profilepictures/Nuel678@gmail.com.jpeg', 'businesscard/Nuel678@gmail.com.jpeg', 'bcd71d46e8fec57c4ae9ca8736398af0', '5f96b6dd783b8', 1, '2020-10-26 11:46:00', '5f96dfdd9d0fc', '2020-10-26 11:45:33', '2020-10-26 14:42:58'),
(23, 'Nuel', 'manuel@sewaingame.com', '0899999998', '1997-10-26', 'Satu', 'Organic Agriculture', 'Visitor', 'profilepictures/manuel@sewaingame.com.jpg', 'businesscard/manuel@sewaingame.com.jpg', 'cdceed40808bb0c7e419ec35f551c42e', '5f96d777b5f7f', 0, NULL, NULL, '2020-10-26 14:04:39', NULL);

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
(39, 22, 'c5dad58f34c98484d7b817cb33034333', '2020-10-26 11:47:09'),
(40, 21, 'c5dad58f34c98484d7b817cb33034333', '2020-10-26 11:47:09');

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
  MODIFY `counter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `livewall`
--
ALTER TABLE `livewall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `livewall_comment`
--
ALTER TABLE `livewall_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `livewall_like`
--
ALTER TABLE `livewall_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `participant_chat`
--
ALTER TABLE `participant_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
