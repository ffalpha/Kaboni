-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2019 at 12:09 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaboni`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `privacy` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `privacy`, `user`, `name`, `date`) VALUES
(5, 'public', 'user1', 'asd', '2019-04-27'),
(7, '', 'saf', 'Toys', '2019-05-22'),
(8, '', 'kalanam214@gmail.com', 'Nature', '2019-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `asd`
--

CREATE TABLE `asd` (
  `id` int(6) UNSIGNED NOT NULL,
  `imagename` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asd`
--

INSERT INTO `asd` (`id`, `imagename`, `date`) VALUES
(1, 'image5.jpg', '2019-04-27'),
(2, 'image6.jpeg', '2019-04-27'),
(3, 'image7.jpg', '2019-04-27'),
(4, 'image8.jpg', '2019-04-27'),
(5, 'image10.jpg', '2019-04-27'),
(6, 'image11.jpg', '2019-04-27'),
(7, 'image12.jpg', '2019-04-27'),
(8, 'D5iXd9cW4AEhuKG.jpg', '2019-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(4) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(3, 'Event'),
(6, 'Models'),
(7, 'Birthdays'),
(8, 'Products');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `sender_userid` int(11) NOT NULL,
  `reciever_userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_login_details`
--

CREATE TABLE `chat_login_details` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_typing` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comid` int(5) NOT NULL,
  `compid` int(5) NOT NULL,
  `comauthor` varchar(255) NOT NULL,
  `comemail` varchar(255) NOT NULL,
  `comcontent` varchar(255) NOT NULL,
  `comstatus` varchar(255) NOT NULL,
  `comdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comid`, `compid`, `comauthor`, `comemail`, `comcontent`, `comstatus`, `comdate`) VALUES
(1, 2, 'Ediwd', 'Temp@gmail.com', 'THis is a test', 'Disapproved', '2019-04-24'),
(3, 1, 'fssaffsa', 'saffsa', 'safsaf', 'Approved', '2019-04-24'),
(4, 1, '2', 'saf', 'sfasfafsafsafsasfa', 'Disapproved', '2019-04-24'),
(5, 3, 'Rohan', 'test@gmail.com', 'This is a good post', 'Approved', '2019-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `Id` int(11) NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`Id`, `Image`) VALUES
(12, '23783539_1762745480698297_7358073540278092408_o.jpg'),
(13, '25587203_1775663896073122_4217272743926621280_o.jpg'),
(14, '32857199_1840039969635514_4902942710140239872_o.jpg'),
(15, '34174705_1845331335773044_5448147739890155520_o.jpg'),
(16, '41454229_1945461692426674_6042152192352190464_o.jpg'),
(17, '22426179_1747034835602695_8942583651243851580_o.jpg'),
(18, '23000151_1754808384825340_8966018968737211874_o.jpg'),
(19, '25626811_1776073629365482_5861069611614722174_o.jpg'),
(20, '44519328_1965561737083336_4644393706214916096_o.jpg'),
(21, '44731902_1965563853749791_2792957377924562944_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nature`
--

CREATE TABLE `nature` (
  `id` int(6) UNSIGNED NOT NULL,
  `imagename` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nature`
--

INSERT INTO `nature` (`id`, `imagename`, `date`) VALUES
(1, 'photo-1540206395-68808572332f.', '2019-06-19'),
(2, 'photo-1542811969-30d50b1dc39b.', '2019-06-19'),
(3, 'photo-1543277669-34136c4c2a1a.', '2019-06-19'),
(4, 'photo-1543488737-a2024914a221.', '2019-06-19'),
(5, 'photo-1543542849-dfa396b541c8.', '2019-06-19'),
(6, 'photo-1546436441-a583a4b1539b.', '2019-06-19'),
(7, 'photo-1549075342-4d72e5c85b02.', '2019-06-19'),
(8, 'photo-1549652077-205d6aea340f.', '2019-06-19'),
(9, 'photo-1550059654-c27c9347e417.', '2019-06-19'),
(10, 'photo-1551636271-ab92202b2f8d.', '2019-06-19'),
(11, 'photo-1552414003-9cb8808424b6.', '2019-06-19'),
(12, 'photo-1552414003-d0a26cf878e9.', '2019-06-19'),
(13, 'photo-1552684773-8ca1121aa0a8.', '2019-06-19'),
(14, 'photo-1553187328-9e956f390ecb.', '2019-06-19'),
(15, 'photo-1553922112-b2cf275e7e3f.', '2019-06-19'),
(16, 'photo-1558551563-ff1ad99adc92.', '2019-06-19'),
(17, 'photo-1560612162-87be8d8df316.', '2019-06-19'),
(18, 'photo-1433086966358-54859d0ed7', '2019-06-19'),
(19, 'photo-1513836279014-a89f7a76ae', '2019-06-19'),
(20, 'photo-1541535267011-2fad2b4b9f', '2019-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pac_id` int(11) NOT NULL,
  `pac_name` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'Draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pac_id`, `pac_name`, `price`, `description`, `date`, `status`) VALUES
(1, 'Basic', 2000, '3 Photo albums,Drone photgraphy,Dress', '2019-06-19', 'Published'),
(3, ' Professional ', 50000, '3 Photo albums,\r\nDrone photgraphy,\r\nDress,\r\nMakeup,Preeshoot', '2019-06-19', 'Published'),
(4, ' Professional ', 50000, '3 Photo albums,\r\nDrone photgraphy,\r\nDress,\r\nMakeup,Preeshoot', '2019-06-19', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` int(3) NOT NULL,
  `pcatid` int(4) NOT NULL,
  `ptitle` varchar(255) NOT NULL,
  `pauthor` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `pimage` text NOT NULL,
  `pcontent` text NOT NULL,
  `ptag` varchar(255) NOT NULL,
  `pstatus` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `pcatid`, `ptitle`, `pauthor`, `pdate`, `pimage`, `pcontent`, `ptag`, `pstatus`) VALUES
(1, 6, 'Thambapanni 19', 'Dilshan', '2019-06-19', 'test.jpg', 'Thambapanni Wedding Fair 2019, The annual wedding fair organized by the Team Thambapanni, concluded successfully on 13th January 2019. Thambapanni Wedding Fair 2019 All images appearing with sign of the Kaboni Photography are the exclusive property of kaboni.lk are protected under the International Copyright laws. The images may not be reproduced, copied, transmitted or manipulated without the legal permission. Use of any image as the basis for another photographic concept or illustration is a violation of the International Copyright laws. ', 'wedding,events', 'Published'),
(2, 3, 'Horizen Of Blues 2018', 'Dilshan', '2019-04-23', 'test2.jpg', 'Horizon Of Blues 2018, The annual batch party organized by the, 2013 O/L Batch, Walisinghe Harishchandra College Anuradhapura concluded successfully on 16th September 2018. ï¿½ Copyrights protected. KABONIï¿½ KABONI.lk Kaboni Photography KALON Pictures', 'products', 'Draft'),
(3, 3, 'Wild Life', 'RA', '2019-04-24', 'test3.jpg', 'wfafass', 'wild,event', 'Draft'),
(4, 3, 'abc', 'saf', '2019-04-24', '35748_6798877.jpg', 'saffsa', 'fsasaf', 'Draft'),
(5, 6, 'saffs', 'saf', '2019-04-24', '0015180_vosper-mtb379.jpg', 'safsa', 'safasf', 'Draft'),
(8, 3, 'saf', 'safsfa', '2019-04-24', 'user-02.jpg', 'sfa', 'asf', 'Draft'),
(9, 6, 'sfa', 'saf', '2019-04-24', 'guitarist-400.jpg', 'sfa', 'fsa', 'Draft'),
(10, 7, 'fsa', 'fsa', '2019-04-25', 's1.jpg', 'asfs', 'fsafs', 'Published'),
(11, 8, 'abc', 'asf', '2019-04-25', 'image7.jpg', 'wafssa', 'safsa', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `pid` int(3) NOT NULL,
  `imgcaption` varchar(225) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`pid`, `imgcaption`, `img`) VALUES
(1, 'A wedding is a ceremony where two people are united in marriages', '1.jpg'),
(2, 'Party', '2.jpg'),
(4, '1234', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `Id` int(3) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Message` varchar(225) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`Id`, `Name`, `Email`, `Message`, `Date`) VALUES
(1, 'Oshande', 'osa@gmail.com', 'this is test message', '0000-00-00'),
(2, 'Oshande', 'osa@gmail.com', 'this is test message', '0000-00-00'),
(3, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(4, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(5, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(6, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(7, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(8, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(9, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(10, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(11, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(12, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(13, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(14, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(15, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(16, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-05-22'),
(17, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-06-05'),
(18, 'Oshande', 'osa@gmail.com', 'this is test message', '2019-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

CREATE TABLE `toys` (
  `id` int(6) UNSIGNED NOT NULL,
  `imagename` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`id`, `imagename`, `date`) VALUES
(1, '912WBhjwrJL._SX466_.jpg', '2019-05-22'),
(2, '73202__71939.1516553431.jpg', '2019-05-22'),
(3, 'download (1).jpg', '2019-05-22'),
(4, 'download (2).jpg', '2019-05-22'),
(5, 'download.jpg', '2019-05-22'),
(6, 'LOS05014T1_a21.jpg', '2019-05-22'),
(7, 'LOS05014T1_a22.jpg', '2019-05-22'),
(8, 'LOS05014T1_b0.jpg', '2019-05-22'),
(9, 'tra64077-3-blk_1.jpg', '2019-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(5) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `ufirstname` varchar(255) NOT NULL,
  `ulastname` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `uimage` text NOT NULL,
  `utnumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `active` int(1) DEFAULT '0',
  `current_session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `upassword`, `ufirstname`, `ulastname`, `urole`, `uemail`, `uimage`, `utnumber`, `address`, `date`, `active`, `current_session`) VALUES
(1, '$2y$10$cxe6dyA0Vf7b7JymLF8Equ8y3qu10SpFB92YkM.1K122ktWqNaKK6', 'Kalana', 'Mihirangas', 'Admin', 'kalana@gmail.com', '123.jpg', '07835451', 'No 2752,Stage 3 ,Anuradhapura', '2019-04-03', 0, 0),
(2, '$2y$10$6Cz190iUocVMstY9Rd7WROQcl1urmj4yFAbhVOlHjeiBVbDkpbxJe', 'Kalana', 'Mihiranga', 'Customer', 'kalanam214@gmail.com', 'test2.jpg', '0252235451', 'No 2752,Stage 3,Anuradhapura', '2019-04-04', 1, 0),
(9, '$2y$10$jq5z.J9BX.Z6x23dHaxd4uqrTvYl2gLfnS6behT76rZQrtvac9ATm', 'Kalana', 'Mihiranga', 'Admin', 'kalanam217@gmail.com', '', '07180254221', '', '2019-06-04', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asd`
--
ALTER TABLE `asd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chat_login_details`
--
ALTER TABLE `chat_login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nature`
--
ALTER TABLE `nature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pac_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `toys`
--
ALTER TABLE `toys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `asd`
--
ALTER TABLE `asd`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_login_details`
--
ALTER TABLE `chat_login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nature`
--
ALTER TABLE `nature`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `pid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `toys`
--
ALTER TABLE `toys`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
