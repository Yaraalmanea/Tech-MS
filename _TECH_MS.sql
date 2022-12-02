-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2022 at 01:14 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `_TECH_MS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `id` int(13) NOT NULL,
  `emp_number` int(13) NOT NULL,
  `first_name` varchar(24) NOT NULL,
  `last_name` varchar(24) NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`id`, `emp_number`, `first_name`, `last_name`, `job_title`, `password`) VALUES
(1, 132622, 'Razan', 'AlDhafian', 'Data Analysis ', '$2y$10$9YBuamnLtbunfeU7eHK7j.xOAoFscXk8L7aD3HOIhUkIKRHooEmn6'),
(2, 132627, 'Yara', 'AlManea', 'Cyber Security Engineer', '$2y$10$3ZlVaflWteOAwZ8umF3k3eGEdauG4UhWw7s3OOaU2tGR6MRYLMWt.'),
(3, 132625, 'Shaden', 'AlHumaidan', 'Technical IoT Engineer', '$2y$10$9ho3QRhBLIHIVTHu36nez.maPwCAwoNuOZyUTmredaYOwAOOqXLb6'),
(4, 13622, 'Sarah', 'Ahmed', 'IT Support', '$2y$10$6ZKDmJWhpT/cGum3l/ynhOmK6mG/dnftyWfsZ5ynKnOPSjy3KeYtu'),
(5, 13278, 'Reem', 'Alotaibi', 'Developer', '$2y$10$9UR/3wkdNzWN7.75Tneq8u9N0UsDQM4yFzWFJ3baEZZjvOI7zlsNS');

-- --------------------------------------------------------

--
-- Table structure for table `Manager`
--

CREATE TABLE `Manager` (
  `id` int(13) NOT NULL,
  `first_name` varchar(24) NOT NULL,
  `last_name` varchar(24) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Manager`
--

INSERT INTO `Manager` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(132629, 'May', 'AlSalama', 'MayAlSalama', 'May123');

-- --------------------------------------------------------

--
-- Table structure for table `Request`
--

CREATE TABLE `Request` (
  `id` int(13) NOT NULL,
  `emp_id` int(13) NOT NULL,
  `service_id` int(13) NOT NULL,
  `description` varchar(200) NOT NULL,
  `attachment1` varchar(200) DEFAULT NULL,
  `attachment2` varchar(200) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Request`
--

INSERT INTO `Request` (`id`, `emp_id`, `service_id`, `description`, `attachment1`, `attachment2`, `status`) VALUES
(1, 1, 1, 'Kindly requesting a promotion for my hard work. ', 'uploads/624f1251132351.38941659promotion_request_letter_(1).pdf', '', 'Approved'),
(2, 4, 5, 'request for providing me with the medical insurance card, as I suffer from a disease.', 'uploads/624ec426d11df5.18697685tawuniya-logo.png', 'uploads/624ec426d129d5.66411709tawuniya-health-insurance.jpeg', 'Approved'),
(3, 3, 2, 'Requesting an allowance after an accident on work premises. ', 'uploads/624e46cf408380.97909951allownce_request_letter_(1).pdf', 'uploads/624e46cf40a181.44879359allowance_request.png', 'Declined'),
(4, 2, 4, 'I am writing this request to ask for a 3-week leave. ', 'uploads/624f13703a4779.59398876leave-request_.png', 'uploads/624f13703a5cb4.17925625leave_letter_from_work.pdf', 'Declined'),
(5, 4, 3, 'I have an urgent condition,  kindly requesting to resign from my position .', 'uploads/624ec4a81df6a9.99866472resegnation_request_letter_(1).pdf', '', 'In Progress'),
(6, 2, 3, 'Due to some urgent family matters, I will have to resign from my position, if you could look into my request.', 'uploads/624f44c02033b2.04650132resegnation_request_letter_(1).pdf', '', 'Apprroved'),
(7, 1, 4, 'A family member passed away, therefore I am asking for a 3-day leave.', 'uploads/624f12c42185c5.58089010leave-request_.png', '', 'Approved'),
(8, 2, 5, 'my health condition is critical , I am in utmost need of an insurance card to handle my situation.', 'uploads/624f13eeb82a46.03975750tawuniya-logo.png', '', 'In Progress'),
(9, 1, 5, 'Due to my recent work injury, I have requested to have a health insurance to cover for its fees.', 'uploads/624f3beb46f243.79921940medical-insurance-card-service-concept-vector-23726741.png', '', 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `id` int(13) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Service`
--

INSERT INTO `Service` (`id`, `type`) VALUES
(1, 'Promotion'),
(2, 'Allowance'),
(3, 'Resignation'),
(4, 'Leave'),
(5, 'Health Insurance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Manager`
--
ALTER TABLE `Manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Request`
--
ALTER TABLE `Request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Manager`
--
ALTER TABLE `Manager`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132630;

--
-- AUTO_INCREMENT for table `Request`
--
ALTER TABLE `Request`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Request`
--
ALTER TABLE `Request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `Employee` (`id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `Service` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
