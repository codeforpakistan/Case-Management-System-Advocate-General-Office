-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 06:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `case_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `title`, `description`, `status`, `add_date`) VALUES
(1, 'Bail Branch', '', 1, '2021-12-20'),
(2, 'CR Appeal', '', 1, '2021-12-20'),
(3, 'Supreme Court', '', 1, '2021-12-20'),
(4, 'Writ Petition Branch', '', 1, '2022-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `case_categories`
--

CREATE TABLE `case_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_categories`
--

INSERT INTO `case_categories` (`id`, `title`, `branch_id`, `description`, `status`, `add_date`) VALUES
(1, 'Application 12(2) Case', 4, ' eee', 1, '2021-12-21'),
(2, 'COC Case', 4, ' 55', 1, '2021-12-20'),
(3, 'Review Case', 4, '', 1, '2021-12-20'),
(4, 'WP Case', 4, '44', 1, '2021-12-20'),
(18, 'CMs case', 3, '', 1, '2022-01-21'),
(19, 'Cr Appeal', 2, 'This categories deals with ar appeals', 1, '2022-02-03'),
(20, 'Cr revision', 2, 'This categories deals with Cr revisions', 1, '2022-02-03'),
(21, 'Bail Application', 1, '', 1, '2022-02-03'),
(22, 'Bail Cancellation Application', 1, '', 1, '2022-02-03'),
(23, 'Quashment Petition', 1, '', 1, '2022-02-03'),
(24, 'Transfer application', 1, '', 1, '2022-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `case_department`
--

CREATE TABLE `case_department` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case_department`
--

INSERT INTO `case_department` (`id`, `case_id`, `department_id`, `department_name`) VALUES
(34, 13, 5, 'Administration Department'),
(35, 14, 4, 'KPIT Board'),
(36, 14, 3, 'Halal Food Authority');

-- --------------------------------------------------------

--
-- Table structure for table `case_log`
--

CREATE TABLE `case_log` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `law_officer_id` int(11) NOT NULL,
  `hearing_date` date NOT NULL,
  `next_date` date NOT NULL,
  `date_of_disposal` date NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `order_sheet` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `cms/rejoinder` varchar(100) NOT NULL,
  `judgment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`id`, `title`, `description`, `add_date`, `status`) VALUES
(1, 'Peshawar High Court', '', '2021-12-20', 1),
(2, 'Supreme Court Of Pakistan', '', '2021-12-20', 1),
(3, 'Federal Shariah Court', '', '2022-01-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `decision_types`
--

CREATE TABLE `decision_types` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `decision_types`
--

INSERT INTO `decision_types` (`id`, `title`, `description`, `status`, `add_date`) VALUES
(4, 'Sine-Die', '', 1, '2021-12-20'),
(5, 'Withdrawn Case', '', 1, '2021-12-20'),
(7, 'Allowed Case', '', 1, '2021-12-20'),
(8, 'Disposed Case ', '', 1, '2021-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL,
  `add_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `title`, `description`, `add_date`, `status`) VALUES
(1, 'Home Department', 'some descritpion is here', '2021-11-29', 1),
(2, 'Peshawar Session Court ', '', '2021-11-29', 1),
(3, 'Halal Food Authority', '', '2021-12-20', 1),
(4, 'KPIT Board', '', '2022-01-20', 1),
(5, 'Administration Department', '', '2022-01-20', 1),
(6, 'Health Department', '', '2022-01-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hearing_lawofficers`
--

CREATE TABLE `hearing_lawofficers` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `hearing_id` int(11) NOT NULL,
  `law_officer_id` int(11) NOT NULL,
  `officer_name` varchar(255) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hearing_lawofficers`
--

INSERT INTO `hearing_lawofficers` (`id`, `case_id`, `hearing_id`, `law_officer_id`, `officer_name`, `add_date`) VALUES
(37, 13, 48, 17, 'Aitzaz Ahsan', '2022-01-20'),
(38, 13, 50, 17, 'Aitzaz Ahsan', '2022-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `manage_cases`
--

CREATE TABLE `manage_cases` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `stateorgovt` varchar(15) NOT NULL,
  `states` text NOT NULL,
  `case_no` varchar(50) NOT NULL,
  `petitioner_advocate` varchar(250) NOT NULL,
  `department_id` int(11) NOT NULL,
  `case_cateid` int(11) NOT NULL,
  `court_id` int(11) NOT NULL,
  `focalperson` varchar(255) NOT NULL,
  `respondent` varchar(255) NOT NULL,
  `advocate_respondent` text NOT NULL,
  `branch_id` int(11) NOT NULL,
  `Filling_date` date NOT NULL,
  `year` int(11) NOT NULL,
  `government_petitioner` varchar(5) NOT NULL DEFAULT 'No',
  `status` int(11) NOT NULL,
  `decision_status` int(11) NOT NULL DEFAULT 0,
  `linked_case_id` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `added_by` int(11) NOT NULL,
  `role_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_cases`
--

INSERT INTO `manage_cases` (`id`, `title`, `stateorgovt`, `states`, `case_no`, `petitioner_advocate`, `department_id`, `case_cateid`, `court_id`, `focalperson`, `respondent`, `advocate_respondent`, `branch_id`, `Filling_date`, `year`, `government_petitioner`, `status`, `decision_status`, `linked_case_id`, `add_date`, `added_by`, `role_type`) VALUES
(13, 'Rukhsar', 'Government', '', '342', 'Adv. Sattar khan', 0, 4, 1, 'nazim khan', 'Ahmad Khan', 'Barister Masood', 4, '2022-01-20', 2022, 'Yes', 1, 1, 0, '2022-01-20', 15, '1'),
(14, 'Ayyan', 'Government', '', '1234', 'Zalan', 0, 4, 2, 'Furqan', 'Hamid,Rizwan', 'Junaid  Khan', 4, '2019-06-25', 2019, 'No', 1, 1, 0, '2022-01-31', 15, '1');

-- --------------------------------------------------------

--
-- Table structure for table `manage_cases_docs`
--

CREATE TABLE `manage_cases_docs` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `docstype` varchar(100) NOT NULL,
  `docsname` varchar(100) NOT NULL,
  `docs_filename` text NOT NULL,
  `docsext` varchar(10) NOT NULL,
  `hearing_date` date NOT NULL,
  `next_hearing_date` date NOT NULL,
  `case_decision` text NOT NULL,
  `decision_date` date NOT NULL,
  `docs_date` date NOT NULL,
  `remarks` text NOT NULL,
  `status` int(11) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_cases_docs`
--

INSERT INTO `manage_cases_docs` (`id`, `case_id`, `docstype`, `docsname`, `docs_filename`, `docsext`, `hearing_date`, `next_hearing_date`, `case_decision`, `decision_date`, `docs_date`, `remarks`, `status`, `add_date`) VALUES
(47, 13, 'case_documents', 'Comments / Reply', '2201205055208comments.pdf', 'pdf', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-20', '', 1, '2022-01-20'),
(48, 13, 'hearing_documents', 'Order Sheet', '2201205053909order_sheet.pdf', 'pdf', '2022-01-20', '2022-01-31', '', '0000-00-00', '2022-01-20', 'First hearing of the case was canceled', 1, '2022-01-20'),
(49, 13, 'decision_documents', 'Judgment', '2201244042029Cnic.pdf', 'pdf', '0000-00-00', '0000-00-00', 'Disposed Case ', '2022-01-24', '0000-00-00', 'The case has been disposed.', 1, '2022-01-24'),
(50, 13, 'hearing_documents', 'Order Sheet', '22013111115227', '', '2022-01-31', '0000-00-00', '', '0000-00-00', '2022-01-31', 'The case has been solved.', 1, '2022-01-31'),
(51, 13, 'case_documents', 'Other Documents', '2201311111493030921-ETEA-MS-PhD-TEst-Result.pdf', 'pdf', '0000-00-00', '0000-00-00', '', '0000-00-00', '2021-01-31', '', 1, '2022-01-31'),
(52, 14, 'decision_documents', 'Judgment', '2201311111144230921-ETEA-MS-PhD-TEst-Result.pdf', 'pdf', '0000-00-00', '0000-00-00', 'Sine-Die', '2022-01-31', '0000-00-00', 'This is Edited Hearing', 1, '2022-01-31'),
(53, 14, 'case_documents', 'CMs/Rejoinder', '22013111114353Kppsc_Lecturer_slip.pdf', 'pdf', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-31', '', 1, '2022-01-31'),
(54, 14, 'case_documents', 'WP File', '22013111112358Oil_Gas_fee_slip.pdf', 'pdf', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-31', '', 1, '2022-01-31'),
(55, 14, 'case_documents', 'WP File', '22013112123600Kppsc_Lecturer_slip.pdf', 'pdf', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-31', '', 1, '2022-01-31'),
(56, 14, 'case_documents', 'WP File', '22013112121803Domicile.pdf', 'pdf', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-31', '', 1, '2022-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `manage_linked_cases`
--

CREATE TABLE `manage_linked_cases` (
  `id` int(11) NOT NULL,
  `coc_case_id` int(11) NOT NULL,
  `previous_case_id` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `role_type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_linked_cases`
--

INSERT INTO `manage_linked_cases` (`id`, `coc_case_id`, `previous_case_id`, `add_date`, `status`, `added_by`, `role_type`) VALUES
(1, 2, 3, '2021-12-20', 1, 1, 1),
(2, 3, 1, '2021-12-20', 1, 1, 1),
(3, 3, 2, '2021-12-23', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Super Admin'),
(2, 'Advocate General'),
(3, 'IT Staff'),
(4, 'Law Officer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `branch_id`, `role_id`, `password`, `status`, `add_date`) VALUES
(15, 'Super Admin', 'superadmin@gmail.com', 0, 1, '25d55ad283aa400af464c76d713c07ad', 1, '2022-01-20'),
(16, 'IT Staff WP', 'itstaffwp@gmail.com', 4, 3, '25d55ad283aa400af464c76d713c07ad', 1, '2022-01-20'),
(17, 'Aitzaz Ahsan', 'lawofficerwp@gmail.com', 4, 4, '25d55ad283aa400af464c76d713c07ad', 1, '2022-01-20'),
(25, 'Salman', 'itstaffbb@gmail.com', 1, 3, '25d55ad283aa400af464c76d713c07ad', 1, '2022-02-04'),
(26, 'CR Branch', 'itstaffcrappeal@gmail.com', 2, 3, '25d55ad283aa400af464c76d713c07ad', 1, '2022-02-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_categories`
--
ALTER TABLE `case_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `case_department`
--
ALTER TABLE `case_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `case_id` (`case_id`);

--
-- Indexes for table `case_log`
--
ALTER TABLE `case_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_id` (`case_id`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decision_types`
--
ALTER TABLE `decision_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hearing_lawofficers`
--
ALTER TABLE `hearing_lawofficers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_cases`
--
ALTER TABLE `manage_cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_cateid` (`case_cateid`);

--
-- Indexes for table `manage_cases_docs`
--
ALTER TABLE `manage_cases_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foriegn Key` (`case_id`);

--
-- Indexes for table `manage_linked_cases`
--
ALTER TABLE `manage_linked_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
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
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `case_categories`
--
ALTER TABLE `case_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `case_department`
--
ALTER TABLE `case_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `case_log`
--
ALTER TABLE `case_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `decision_types`
--
ALTER TABLE `decision_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hearing_lawofficers`
--
ALTER TABLE `hearing_lawofficers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `manage_cases`
--
ALTER TABLE `manage_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `manage_cases_docs`
--
ALTER TABLE `manage_cases_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `manage_linked_cases`
--
ALTER TABLE `manage_linked_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_categories`
--
ALTER TABLE `case_categories`
  ADD CONSTRAINT `case_categories_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `case_department`
--
ALTER TABLE `case_department`
  ADD CONSTRAINT `case_department_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `case_department_ibfk_2` FOREIGN KEY (`case_id`) REFERENCES `manage_cases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `case_log`
--
ALTER TABLE `case_log`
  ADD CONSTRAINT `case_log_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `manage_cases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manage_cases`
--
ALTER TABLE `manage_cases`
  ADD CONSTRAINT `manage_cases_ibfk_1` FOREIGN KEY (`case_cateid`) REFERENCES `case_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `manage_cases_docs`
--
ALTER TABLE `manage_cases_docs`
  ADD CONSTRAINT `Foriegn Key` FOREIGN KEY (`case_id`) REFERENCES `manage_cases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
