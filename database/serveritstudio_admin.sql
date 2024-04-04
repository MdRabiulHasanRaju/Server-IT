-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2024 at 12:11 PM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servflzq_serveritstudio_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees_transaction`
--

CREATE TABLE `fees_transaction` (
  `id` int(255) NOT NULL,
  `stdid` varchar(255) NOT NULL,
  `paid` int(255) NOT NULL,
  `submitdate` datetime NOT NULL,
  `transcation_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fees_transaction`
--

INSERT INTO `fees_transaction` (`id`, `stdid`, `paid`, `submitdate`, `transcation_remark`) VALUES
(34, '28', 1500, '2023-06-12 00:00:00', 'Advanced 1500 Paid'),
(35, '29', 1500, '2023-06-12 00:00:00', 'Advanced 1500 Paid.'),
(36, '30', 3000, '2023-06-12 00:00:00', 'Full Paid'),
(37, '31', 3000, '2023-06-14 00:00:00', 'Full Paid.'),
(38, '32', 3000, '2023-06-19 00:00:00', 'Full Paid'),
(39, '33', 2500, '2023-06-19 00:00:00', 'Full Paid'),
(40, '34', 1500, '2023-06-12 00:00:00', 'Advanced 1500 Paid.'),
(41, '35', 2500, '2023-06-20 00:00:00', 'Full Paid.'),
(42, '36', 3000, '2023-06-24 00:00:00', 'Full Paid.'),
(43, '37', 3000, '2023-07-07 00:00:00', 'Full Paid.'),
(44, '38', 1000, '2023-08-17 00:00:00', 'Full Paid.'),
(45, '39', 3000, '2023-07-15 00:00:00', 'Full Paid.'),
(46, '40', 3000, '2023-08-06 00:00:00', 'Full Paid.'),
(47, '41', 3000, '2023-07-08 00:00:00', 'Full Paid.'),
(48, '42', 2500, '2023-06-22 00:00:00', 'Full Paid.'),
(49, '43', 1000, '2023-09-04 00:00:00', 'Advanced 1000 Paid.'),
(50, '44', 2000, '2023-07-08 00:00:00', 'Advanced 2000 Paid.'),
(51, '45', 1500, '2023-07-15 00:00:00', 'Advanced 1500 Paid.'),
(52, '46', 2000, '2023-07-15 00:00:00', 'Advanced 2000 Paid.'),
(53, '47', 1500, '2023-09-01 00:00:00', 'Advanced 1500 Paid.'),
(54, '48', 1000, '2023-09-22 00:00:00', 'Advanced 1000 Paid.'),
(55, '49', 3000, '2023-09-25 00:00:00', 'Full Paid.'),
(56, '50', 0, '2023-07-15 00:00:00', ''),
(57, '51', 1000, '2023-08-06 00:00:00', 'Advanced 1000 Paid.'),
(59, '44', 1000, '2023-10-02 00:00:00', 'Full Paid'),
(60, '53', 2000, '2023-09-25 00:00:00', ''),
(61, '54', 2500, '2023-09-26 00:00:00', 'Full Paid .'),
(62, '55', 2000, '2023-10-09 00:00:00', 'Advanced 2000 Paid.'),
(63, '56', 2000, '2023-10-18 00:00:00', '2000 Paid'),
(64, '43', 2000, '2023-10-30 00:00:00', 'Full paid'),
(65, '57', 2000, '2023-10-25 00:00:00', ''),
(66, '28', 1500, '2023-11-03 00:00:00', 'Full Paid'),
(67, '34', 1500, '2023-11-03 00:00:00', 'Full Paid'),
(68, '50', 3000, '2023-11-04 00:00:00', '3000 advanced'),
(69, '58', 1000, '2023-11-04 00:00:00', '1000 advanced'),
(70, '58', 1000, '2023-11-15 00:00:00', ''),
(71, '59', 1000, '2023-11-20 00:00:00', 'Advanced 1000'),
(72, '60', 2500, '2023-09-20 00:00:00', ''),
(73, '42', 500, '2023-11-28 00:00:00', ''),
(74, '61', 1000, '2023-11-04 00:00:00', ''),
(75, '61', 1000, '2023-12-11 00:00:00', ''),
(76, '58', 1000, '2023-12-11 00:00:00', 'Full Paid'),
(77, '48', 2000, '2023-12-06 00:00:00', 'Full Paid'),
(78, '62', 2000, '2023-12-11 00:00:00', 'Advanced 2000 paid.'),
(79, '60', 500, '2023-12-11 00:00:00', 'Full Paid'),
(80, '47', 1500, '2023-12-13 00:00:00', 'Full Paid.\r\nExtra 500 BDT for National Youth Development Certificate'),
(81, '55', 1000, '2024-01-13 00:00:00', 'Full Paid'),
(82, '63', 2000, '2024-01-15 00:00:00', '2000 advanced'),
(83, '64', 1000, '2024-01-15 00:00:00', '1500 advanced'),
(84, '65', 1000, '2024-01-15 00:00:00', ''),
(85, '50', 3000, '2023-12-30 00:00:00', 'full paid.'),
(86, '66', 1000, '2024-02-01 00:00:00', '1000 Advanced.'),
(87, '67', 1000, '2024-02-05 00:00:00', 'Advanced 1000.'),
(88, '68', 3000, '2024-01-22 00:00:00', 'Full Paid'),
(89, '69', 0, '2024-01-22 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `grade`, `detail`, `delete_status`) VALUES
(13, 'Office Program', 'Computer Fundament,\r\nComputer Hardware,\r\nMS Word\r\nMS Excel,\r\nMS Powerpoint,\r\nBangla Typing,\r\nEnglish Typing,\r\nBasic Photoshop', '0'),
(14, 'Graphic Design', '', '0'),
(15, 'Digital Marketing', '', '0'),
(16, 'Web Design', '', '0'),
(17, 'Web Development', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `joindate` datetime NOT NULL,
  `about` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `fees` int(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `delete_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `emailid`, `sname`, `joindate`, `about`, `contact`, `fees`, `grade`, `balance`, `delete_status`) VALUES
(28, '', 'Aditta  das', '2023-06-12 00:00:00', 'Aditta  das	20/05/2005	Pahartali, Chattorgram	01812863194	01774754686', '01774754686', 3000, '13', 0, '0'),
(29, '', 'Sadia Akter', '2023-06-12 00:00:00', 'Sadia Akter	10/9/2006	Saraipara, Pahartali, Chattogram	01919582371	\r\n', '01919582371', 3000, '13', 1500, '1'),
(30, '', 'Aiman Samir', '2023-06-12 00:00:00', 'Aiman Samir	14/02/2006	Saraipara, Pahartali, Chattogram	01818176719	01791611182', '0179161118', 3000, '13', 0, '0'),
(31, '', 'Aynun Nahan', '2023-06-14 00:00:00', 'Aynun Nahan	17/04/1994	Noapara, Pahartali, Chattogram	01856603020	01917018942', '0191701894', 3000, '13', 0, '0'),
(32, '', 'Md. Tofiqul Islam', '2023-06-19 00:00:00', 'Md. Tofiqul Islam	27/07/2007	Farazi Bazar, Kabirhat, Noakhali	01821384225', '0182138422', 3000, '13', 0, '0'),
(33, '', 'Rosmiah Akter', '2023-06-19 00:00:00', 'Rosmiah Akter	21/08/2007	Noapara, Pahartali, Chattogram	01815600311	01566025555', '0156602555', 2500, '13', 0, '0'),
(34, '', 'Arpon Nath', '2023-06-12 00:00:00', 'Arpon Nath	8/5/2023	South Kattoli, North Nathpara	01829086666', '01829086666', 3000, '13', 0, '0'),
(35, '', 'Nafisa Sultana Rahi', '2023-06-20 00:00:00', 'Nafisa Sultana Rahi	26/06/2007	Sagarika Road, Pahartali, Chattogram.	01825377393', '0182537739', 2500, '13', 0, '0'),
(36, '', 'MD. Zakir Hossen Chowdhury', '2023-06-24 00:00:00', 'MD. Zakir Hossen Chowdhury	13/08/2006	CDA Market, Pahartali, Chattogram	01857533877', '0185753387', 3000, '13', 0, '0'),
(37, '', 'Samin Tarafder', '2023-07-07 00:00:00', 'Samin Tarafder	18/08/2003	Ajuak Mansion, City Gate, Chattogram	01911706488', '0191170648', 3000, '13', 0, '0'),
(38, '', 'Md. Minhazul Islam', '2023-08-17 00:00:00', 'Md. Minhazul Islam	31/01/2023	Alongkar,Abdul Ali Nagar, Chattogram	01886883303', '0188688330', 1000, '13', 0, '0'),
(39, '', 'Eshmamur Rahman Khan', '2023-07-15 00:00:00', 'Eshmamur Rahman Khan	12/12/2005	Hazi Hanif House , 250/A DT Road, Pahartali, Chattogram	01864119229	01891650212', '01891650212', 3000, '13', 0, '0'),
(40, '', 'Arafat Hossain Niloy', '2023-08-06 00:00:00', 'Arafat Hossain Niloy	4/2/2008	Abdul Ali Nager, Pahartali, Chattogram	01689390475,  01777030377', '01777030377', 3000, '13', 0, '0'),
(41, '', 'Jahangir Alam', '2023-07-08 00:00:00', 'Jahangir Alam	9/6/1978     akborsha housing, pahartali, Chattorgram		01711078779', '0171107877', 3000, '13', 0, '0'),
(42, '', 'Kurban Ali Sumon', '2023-06-22 00:00:00', 'Kurban Ali Sumon	10/7/1994	akborsha housing, pahartali, Chattorgram		01835125724', '0183512572', 3000, '13', 0, '0'),
(43, '', 'Md. Zaedbin Sabbir', '2023-09-04 00:00:00', 'Md. Zaedbin Sabbir	1/8/1998	Hazi camp, pahartali, Chattogram	01711281048	01790754542', '01790754542', 3000, '13', 0, '0'),
(44, '', 'Md. Omar Faruque', '2023-07-08 00:00:00', 'Md. Omar Faruque	1/1/1995	CDA Market, Pahartali, Chattogram	01648900360	01647424157', '0164742415', 3000, '13', 0, '0'),
(45, '', 'Ismail Hossain Rifat', '2023-07-15 00:00:00', 'Ismail Hossain Rifat	10/1/2000	Relway Workshop Gate, Khulshi, Chattogram		01313340267', '01313340267', 3000, '13', 1500, '1'),
(46, '', 'Abdur Rahim Munna', '2023-07-15 00:00:00', 'Abdur Rahim Munna	2/10/2000	25 No. Rampor word, Halishahar, Chattogram	01305503601	01744101687', '01744101687', 3000, '13', 1000, '1'),
(47, '', 'Sami Uddin Chowdhury ', '2023-09-01 00:00:00', 'Sami Uddin Chowdhury 	27/07/2001	Nuruzzaman Villa, Abdul Ali Nagar, Chattogram	01837249292	01758755507', '01758755507', 3000, '13', 0, '0'),
(48, '', 'Sajjad Hossain Apon', '2023-09-22 00:00:00', 'Sajjad Hossain Apon	22/11/2003	Vatiyari, Chattogram	01852653826	01580997892', '01580997892', 3000, '13', 0, '0'),
(49, '', 'Bibi Gul Jannat', '2023-09-25 00:00:00', 'Bibi Gul Jannat	17/01/1993	South Salimpur, Shitakunda	01815929964	01824976058', '0182497605', 3000, '13', 0, '0'),
(50, '', 'Eshmamur Rahman Khan', '2023-07-15 00:00:00', 'Eshmamur Rahman Khan	12/12/2005	Hazi Hanif House , 250/A DT Road, Pahartali, Chattogram	01864119229	01891650212', '01891650212', 6000, '14', 0, '0'),
(51, '', 'Arafat Hossain Niloy', '2023-08-06 00:00:00', 'Arafat Hossain Niloy	4/2/2008	Abdul Ali Nager, Pahartali, Chattogram	01689390475	01777030377', '01777030377', 6000, '14', 5000, '0'),
(53, '', 'Bibi Gul Jannat', '2023-09-25 00:00:00', 'Bibi Gul Jannat	17/01/1993	South Salimpur, Shitakunda	01815929964	01824976058', '01824976058', 6000, '14', 4000, '0'),
(54, '', 'Md Ashikul Islam', '2023-09-26 00:00:00', '26/9/2023	Md Ashikul Islam	1/1/2005	Noapara, Pahartali, Chattogram	01857362904	01952265628', '01952265628', 2500, '13', 0, '0'),
(55, '', 'Md Latifur Rahman', '2023-10-09 00:00:00', 'Md Latifur Rahman	12/9/2001	Jhaotola, Pahartali, Chattogram	018917292290	01968380090', '01968380090', 3000, '13', 0, '0'),
(56, '', 'Shown Chowdhury', '2023-10-18 00:00:00', 'Shown Chowdhury	22/10/2007	Uttar Kattali, Chattogram	01814 725127	01825520818\r\n', '01825520818', 3000, '14', 1000, '0'),
(57, '', 'Naim Uddin UL Azam Nehal', '2023-10-25 00:00:00', '25/10/2023	Naim Uddin UL Azam Nehal	30/8/2005	Amanatolla Shorok, Chattogram	01860704444	01886704464', '01886704464', 7000, '14', 5000, '0'),
(58, '', 'Shornaly Akter Srity', '2023-11-04 00:00:00', '4/11/2023	Shornaly Akter Srity	8/8/2002	Kolka CNG, Pahartali, Chattogram	01817762881	01759768067\r\n', '01759768067', 3000, '13', 0, '0'),
(59, '', 'Tanjina Akhter', '2023-11-20 00:00:00', 'Tanjina Akhter	1/1/2006	Laki Hotel, Pahartali, Chattogram	01711971836	01892605606	Office Application	Two Month\r\n', '01892605606', 3000, '13', 2000, '0'),
(60, '', 'Md Mosharaf Hossain', '2023-09-20 00:00:00', '20/11/2023	Md Mosharaf Hossain	17/7/1996	Pahartali Bazar, Chattogram	01765571360	01813151738	Office Application	Two Month', '01765571360', 3000, '13', 0, '0'),
(61, '', 'Salma Akter', '2023-11-04 00:00:00', '4/11/2023	Salma Akter	1/2/1994	Uttar kattoli, City Gate, Chattogram	01777303325	01789429835	Office Application	Two Month\r\n', '01789429835', 2000, '13', 0, '0'),
(62, '', 'Md Mosharaf Hossain', '2023-12-11 00:00:00', '11/12/2023	Md Mosharaf Hossain	17/7/1996	Pahartali Bazar, Chattogram	01765571360	01813151738	Graphic Design	Three Month', '01813151738', 7000, '14', 5000, '0'),
(63, 'fardeen2019adnan@gmail.com', 'Fardeen Adnan', '2024-01-15 00:00:00', 'Hasan vila, B-5, Abdul Ali, Nagar, Pahartali, CTG 01868614779', '01647450687', 3000, '13', 1000, '0'),
(64, 'hridoy53yt@gmail.com', 'Iftekhar Hossain', '2024-01-15 00:00:00', 'Nowapara, alongkar, CTG 01818552952', '01763802182', 2500, '13', 1500, '0'),
(65, 'ashrafulfahim36@gmail.com', 'Ashraful Islam Fahim', '2024-01-15 00:00:00', 'Abdul Ali Markter, Alongkar, CTG', '01771092336', 2500, '13', 1500, '0'),
(66, 'sinthia88285@gmail.com', 'Afrin Farjana Sinthia', '2024-02-01 00:00:00', 'Abdul ali nagor, 01537400885', '01869300155', 2000, '13', 1000, '0'),
(67, 'mdnoman0549@gmail.com', 'Abdulla Al Noman', '2024-02-05 00:00:00', 'CDA Market, pahartali, 01643193716', '01643193716', 3000, '13', 2000, '0'),
(68, 'myshachy86@gmail.com', 'Irin Jahan Chowdhury', '2024-01-22 00:00:00', 'North Kattoli, Biswas Para alim ullah chowdhury bari, 01819063123', '01957723386', 3000, '13', 0, '0'),
(69, 'myshachy86@gmail.com', 'Irin Jahan Chowdhury', '2024-01-22 00:00:00', 'North Kattoli, Biswas Para alim ullah chowdhury bari, 01819063123', '01957723386', 6000, '14', 6000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `emailid`, `lastlogin`) VALUES
(1, 'serveritstudio.admin', '7d77156cf679bdaa149d48dbfc1d36f6', 'Administrator', 'serveritstudio@gmail.com', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
