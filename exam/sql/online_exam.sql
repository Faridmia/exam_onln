-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2018 at 03:26 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_user` varchar(64) NOT NULL,
  `a_pass` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_user`, `a_pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

CREATE TABLE `tbl_answer` (
  `ans_id` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `rightans` int(11) NOT NULL DEFAULT '0',
  `answer` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_answer`
--

INSERT INTO `tbl_answer` (`ans_id`, `q_no`, `rightans`, `answer`) VALUES
(60, 2, 0, 'Microsoft'),
(61, 2, 0, 'Mozilla'),
(62, 2, 1, 'The World Wide Web Consortium'),
(63, 2, 0, 'Google'),
(64, 3, 0, '&lt;heading&gt;'),
(65, 3, 1, '&lt;h1&gt;'),
(66, 3, 0, '&lt;head&gt;'),
(67, 3, 0, '&lt;h6&gt;'),
(59, 1, 0, 'Hyper Text Markup Language'),
(58, 1, 0, 'Hyperlinks and Text Markup Language'),
(57, 1, 1, 'Home Tool Markup Language');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `q_id` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`q_id`, `q_no`, `question`) VALUES
(17, 1, 'What does HTML stand for?'),
(18, 2, 'Who is making the Web standards?'),
(19, 3, 'Choose the correct HTML element for the largest heading:');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_username` varchar(60) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_password` varchar(64) NOT NULL,
  `u_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_name`, `u_username`, `u_email`, `u_password`, `u_status`) VALUES
(2, 'foysal', 'foysal khan', 'foysal@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(3, 'farid arfin', 'arfin', 'mdfarid7830@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(4, 'alamgir', 'hossain', 'alamgir@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(5, 'alamgir2', 'hossain', 'alamgir123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(6, 'hamim', 'akram', 'hamim@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
