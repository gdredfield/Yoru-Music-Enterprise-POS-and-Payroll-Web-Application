-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 11:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yorumusicdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `payrol_id` int(11) NOT NULL,
  `employee_no` varchar(50) NOT NULL,
  `b_rate_hour` double NOT NULL,
  `b_num_hours` double NOT NULL,
  `b_income` double NOT NULL,
  `h_rate_hour` double NOT NULL,
  `hnum_hours` double NOT NULL,
  `h_income` double NOT NULL,
  `o_rate_hour` double NOT NULL,
  `o_num_hours` double NOT NULL,
  `o_income` double NOT NULL,
  `gross` double NOT NULL,
  `net` double NOT NULL,
  `ssscon` double NOT NULL,
  `philcon` double NOT NULL,
  `pagcon` double NOT NULL,
  `tax` double NOT NULL,
  `sssloan` double NOT NULL,
  `pagloan` double NOT NULL,
  `fs_deposit` double NOT NULL,
  `fs_loan` double NOT NULL,
  `salary_loan` double NOT NULL,
  `other_loan` double NOT NULL,
  `total_deduction` double NOT NULL,
  `dependents` varchar(20) NOT NULL,
  `payroll_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payrol_id`, `employee_no`, `b_rate_hour`, `b_num_hours`, `b_income`, `h_rate_hour`, `hnum_hours`, `h_income`, `o_rate_hour`, `o_num_hours`, `o_income`, `gross`, `net`, `ssscon`, `philcon`, `pagcon`, `tax`, `sssloan`, `pagloan`, `fs_deposit`, `fs_loan`, `salary_loan`, `other_loan`, `total_deduction`, `dependents`, `payroll_date`) VALUES
(1, '000001', 500, 10, 5000, 560, 11, 6160, 530, 10, 5300, 16460, 12203.75, 742.5, 233.75, 100, 1870, 150, 100, 210, 350, 500, 0, 4256.25, 'S1 or ME1', '2021-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `emp_id` int(11) NOT NULL,
  `emp_num` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `suffix` varchar(20) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `nation` varchar(30) NOT NULL,
  `civil` varchar(30) NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `quadep` varchar(10) NOT NULL,
  `empstatus` varchar(20) NOT NULL,
  `pdate` date NOT NULL,
  `contactnum` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `othsoc` varchar(100) NOT NULL,
  `idnum` varchar(100) NOT NULL,
  `addline1` text NOT NULL,
  `addline2` text NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `sprovince` varchar(100) NOT NULL,
  `zip` int(11) NOT NULL,
  `picpath` text NOT NULL,
  `picfilename` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`emp_id`, `emp_num`, `fname`, `mname`, `lname`, `suffix`, `bday`, `gender`, `nation`, `civil`, `department`, `designation`, `quadep`, `empstatus`, `pdate`, `contactnum`, `email`, `othsoc`, `idnum`, `addline1`, `addline2`, `municipality`, `country`, `sprovince`, `zip`, `picpath`, `picfilename`) VALUES
(1, '000001', 'Gabriel', 'D.', 'Red', 'Jr.', '2000-01-05', 'M', 'Filipino', 'Single', 'Computer Science', 'Researcher', 'S1 or ME1', 'Part Time', '2021-05-18', '6395668235123', 'malnoid22@gmail.com', 'Facebook_messenger', 'gabby.red.750', 'Las Pinas', 'BF Resort ', 'Imus', 'Palestine', 'Baguio', 4013, 'uploads/PicsArt_08-11-04.26.00.jpg', ''),
(3, '000002', 'Reika ', 'Kanagawa', 'Sakurai', '', '1994-05-16', 'F', 'Japanese', 'Single', 'Computer Science', 'Software Engineer', 'S2 or ME2', 'Fulltime', '2021-04-05', '009-223-556', 'sakuraireika046@gmail.com', 'Facebook_messenger', 'Sakurai Reika', 'Kanagawa, Japan', 'Yokohama, Japan', 'Shibuya', 'Japan', 'Tokyo', 163, 'uploads/4199d41d-70b9-439a-a157-5035d09b210f.jpg', ''),
(4, '000003', 'Reika', 'S.', 'Sakurai', 'Chan', '2021-05-15', 'F', 'Filipino', 'Single', 'Computer Studies', 'Researcher', 'S or ME', 'Fulltime', '2021-04-12', '20202020', 'reika@gmail.com', 'Telegram', 'gabby.red.750', 'Manila', 'Cavite', 'Bacoor', 'Philippines', 'Imus', 4013, 'uploads/reiks.jpg', ''),
(8, '000007', 'Yumi', 'Waka', 'Tsuki', 'Sama', '2021-05-01', 'F', 'Japanese', 'Single', 'Nogizaka', 'Actress', 'S4 or ME4', 'Contractual', '2021-05-19', '020202', 'waka@gmail.com', 'Wechat', 'WakatsukiYumi@nanagogo.jp', 'Shizuoka', 'Shibuya', 'Metropolitan', 'Japan', 'Tokyo', 88988, 'uploads/1bb7b55b-4114-417b-8969-a00b7f85ca62.jpg', '1bb7b55b-4114-417b-8969-a00b7f85ca62.jpg'),
(9, '000008', 'Sayaka', 'Kake', 'Hashi', '', '2021-05-06', 'F', 'Filipino', 'Single', '4th Generation', 'Nogizaka46', 'S2 or ME2', 'Contractual', '2021-05-20', '020202020', 'saachan@gmail.com', 'Facebook_messenger', 'saachanzu', 'Manila', 'Cavite', 'Bacoor', 'Japan', 'Imus', 4013, 'uploads/sad.jpg', ''),
(12, '000009', 'Yumi', 'Waka', 'Tsuki', 'Sama', '2021-05-01', 'F', 'Japanese', 'Single', 'Nogizaka', 'Actress', 'S4 or ME4', 'Contractual', '2021-05-19', '020202', 'waka@gmail.com', 'Wechat', 'WakatsukiYumi@nanagogo.jp', 'Shizuoka', 'Shibuya', 'Metropolitan', 'Japan', 'Tokyo', 88988, 'uploads/1bb7b55b-4114-417b-8969-a00b7f85ca62.jpg', '1bb7b55b-4114-417b-8969-a00b7f85ca62.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pos1`
--

CREATE TABLE `pos1` (
  `pos1_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_amount` double NOT NULL,
  `discounted_amount` double NOT NULL,
  `total_bill` double NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `cash` double NOT NULL,
  `change1` double NOT NULL,
  `order_summary` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos1`
--

INSERT INTO `pos1` (`pos1_id`, `price`, `quantity`, `discount_amount`, `discounted_amount`, `total_bill`, `total_quantity`, `cash`, `change1`, `order_summary`) VALUES
(1, 5000, 2, 2500, 7500, 7500, 2, 0, 0, 'Gibson\r\n'),
(2, 12350, 2, 6175, 18525, 18525, 2, 20000, 1475, 'Global Guitar\r\nGuitar Strap\r\nAmplifier\r\nCord\r\nGeneric Pedals\r\n'),
(3, 7000, 3, 5250, 15750, 15750, 3, 16000, 250, 'Ahamay\r\n'),
(4, 11000, 10, 27500, 82500, 82500, 10, 85000, 2500, 'Hofner\r\n'),
(5, 9000, 1, 2250, 6750, 6750, 1, 7000, 250, 'Ibañez\r\n'),
(6, 5000, 2, 2500, 7500, 7500, 2, 7000, -500, 'Gibson\r\n'),
(7, 5000, 2, 2500, 7500, 7500, 2, 8000, 500, 'Gibson\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pos2`
--

CREATE TABLE `pos2` (
  `pos2_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `discount_amount` double NOT NULL,
  `discounted_amount` double NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_discount` double NOT NULL,
  `total_discounted` double NOT NULL,
  `cash` double NOT NULL,
  `change2` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos2`
--

INSERT INTO `pos2` (`pos2_id`, `item_name`, `quantity`, `price`, `discount_amount`, `discounted_amount`, `total_quantity`, `total_discount`, `total_discounted`, `cash`, `change2`) VALUES
(3, 'Gibson', 3, 5000, 3000, 12000, 3, 3000, 12000, 15000, 0),
(4, 'Takamine', 2, 6000, 3600, 8400, 2, 3600, 8400, 10000, 1600),
(5, 'Ahamay', 1, 7000, 1400, 5600, 1, 1400, 5600, 6000, 400);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `empl_id` varchar(50) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `user_status` varchar(30) NOT NULL,
  `cpass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `empl_id`, `user`, `pass`, `user_type`, `user_status`, `cpass`) VALUES
(1, '000001', 'cashier1', '12345', 'Cashier1', 'Active', '12345'),
(2, '000002', 'accounting_staff', '12345', 'Accounting_Staff', 'Active', '12345'),
(3, '000003', 'administrator', '12345', 'Administrator', 'Active', '12345'),
(5, '000008', 'cashier2', '12345', 'Cashier2', 'Active', '12345'),
(6, '000000', 'ADMIN', 'ADMIN123', 'Administrator', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`payrol_id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_num` (`emp_num`);

--
-- Indexes for table `pos1`
--
ALTER TABLE `pos1`
  ADD PRIMARY KEY (`pos1_id`);

--
-- Indexes for table `pos2`
--
ALTER TABLE `pos2`
  ADD PRIMARY KEY (`pos2_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `empl_id` (`empl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `payrol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pos1`
--
ALTER TABLE `pos1`
  MODIFY `pos1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pos2`
--
ALTER TABLE `pos2`
  MODIFY `pos2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
