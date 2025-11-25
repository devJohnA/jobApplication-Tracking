
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2025 at 01:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobtracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `job_role` varchar(250) NOT NULL,
  `date_applied` date NOT NULL DEFAULT current_timestamp(),
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `company_name`, `job_role`, `date_applied`, `link`) VALUES
(22, 'NYGC Services, Inc.', '.NET Developer', '2025-11-22', 'https://ph.jobstreet.com/job/88681462?tracking=TMC-AppConfirmed-asia-6-jobapplied'),
(23, 'CREANSMAERD.PH CORPORATION', 'MOBILE APP DEVELOPER.', '2025-11-19', 'https://ph.jobstreet.com/job/88483736?tracking=TMC-AppViewed-asia-6-jobapplied'),
(24, 'Siegen HR Solutions, Inc.', 'Java EE, Spring Boot & ASP .NET Software Developers', '2025-11-25', 'https://www.mynimo.com/jobs/view/473970'),
(25, 'CopyandPaste Inc', 'Magento Developers', '2025-11-25', 'https://www.mynimo.com/jobs/view/474712');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `date_created`) VALUES
(1, 'johndoe@gmail.com', '$2y$10$FtYnNeRPxzO6Cw634zc2HuVldNsOCFHWtvxeq14o7rSk1HeDdfAqG', '2025-11-23 20:01:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
