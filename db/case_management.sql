-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 07:37 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `title`, `description`, `status`, `add_date`) VALUES
(1, 'Bail Branch', '', 1, '2021-12-20'),
(2, 'CR Appeal', '', 1, '2021-12-20'),
(3, 'Supreme Court', '', 1, '2021-12-20'),
(4, 'Writ Petition Branch', '', 1, '2021-12-21'),
(12, 'CR Appeal', 'sd', 1, '2022-01-11');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case_categories`
--

INSERT INTO `case_categories` (`id`, `title`, `branch_id`, `description`, `status`, `add_date`) VALUES
(1, 'Application 12(2) Case', 4, ' eee', 1, '2021-12-21'),
(2, 'COC Case', 4, ' 55', 1, '2021-12-20'),
(3, 'Review Case', 4, '', 1, '2021-12-20'),
(4, 'WP Case', 4, '44', 1, '2021-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `case_department`
--

CREATE TABLE `case_department` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case_department`
--

INSERT INTO `case_department` (`id`, `case_id`, `department_id`, `department_name`) VALUES
(1, 10, 5, 'Halal Food Authority'),
(2, 0, 5, 'Halal Food Authority'),
(4, 1, 2, 'Sports Department'),
(5, 1, 1, 'Home Department'),
(6, 1, 5, 'Halal Food Authority'),
(7, 1, 2, 'Sports Department'),
(15, 2, 2, 'Peshawar Session Court '),
(16, 2, 1, 'Home Department'),
(17, 3, 2, 'Peshawar Session Court '),
(18, 3, 1, 'Home Department'),
(19, 4, 5, 'Halal Food Authority'),
(20, 5, 6, 'Halal Food Authority  eee'),
(21, 5, 5, 'Halal Food Authority'),
(22, 7, 6, 'Halal Food Authority  eee'),
(23, 7, 2, 'Peshawar Session Court '),
(24, 8, 6, 'Halal Food Authority  eee'),
(25, 8, 5, 'Halal Food Authority'),
(26, 9, 5, 'Halal Food Authority'),
(27, 9, 1, 'Home Department'),
(28, 10, 5, 'Halal Food Authority'),
(29, 10, 1, 'Home Department'),
(35, 11, 2, 'Peshawar Session Court ');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`id`, `title`, `description`, `add_date`, `status`) VALUES
(1, 'Peshawar High Court', '', '2021-12-20', 1),
(2, 'Peshawar Session Court ', '', '2021-12-20', 1),
(3, 'Civil', 'civil', '2022-01-11', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `title`, `description`, `add_date`, `status`) VALUES
(1, 'Home Department', 'some descritpion is here', '2021-11-29', 1),
(2, 'Peshawar Session Court ', '', '2021-11-29', 1),
(5, 'Halal Food Authority', '', '2021-12-20', 1),
(6, 'Halal Food Authority  eee', '', '2022-01-04', 1),
(7, 'Excise Department', 'Excise ', '2022-01-11', 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hearing_lawofficers`
--

INSERT INTO `hearing_lawofficers` (`id`, `case_id`, `hearing_id`, `law_officer_id`, `officer_name`, `add_date`) VALUES
(16, 5, 6, 7, 'Junaid Ullah', '2021-12-29'),
(15, 5, 6, 9, 'Jameel Khan', '2021-12-29'),
(14, 5, 11, 7, 'Junaid Ullah', '2021-12-28'),
(13, 5, 11, 9, 'Jameel Khan', '2021-12-28'),
(17, 11, 10, 9, 'Jameel Khan', '2021-12-29'),
(18, 11, 10, 7, 'Junaid Ullah', '2021-12-29'),
(29, 2, 27, 7, 'Junaid Ullah', '2022-01-06'),
(20, 1, 15, 9, 'Jameel Khan', '2021-12-29'),
(21, 1, 15, 7, 'Junaid Ullah', '2021-12-29'),
(22, 2, 18, 7, 'Junaid Ullah', '2022-01-06'),
(23, 2, 19, 7, 'Junaid Ullah', '2022-01-06'),
(24, 2, 21, 7, 'Junaid Ullah', '2022-01-06'),
(25, 2, 22, 7, 'Junaid Ullah', '2022-01-06'),
(26, 2, 23, 7, 'Junaid Ullah', '2022-01-06'),
(28, 2, 14, 7, 'Junaid Ullah', '2022-01-06'),
(31, 5, 31, 7, 'Junaid Ullah', '2022-01-07'),
(32, 9, 35, 7, 'Junaid Ullah', '2022-01-10'),
(33, 9, 36, 7, 'Junaid Ullah', '2022-01-10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_cases`
--

INSERT INTO `manage_cases` (`id`, `title`, `stateorgovt`, `states`, `case_no`, `petitioner_advocate`, `department_id`, `case_cateid`, `court_id`, `focalperson`, `respondent`, `advocate_respondent`, `branch_id`, `Filling_date`, `year`, `government_petitioner`, `status`, `decision_status`, `linked_case_id`, `add_date`, `added_by`, `role_type`) VALUES
(1, 'Azmat Private Ltd', 'Government', '', '3221', 'amir khan', 0, 3, 2, 'nazim khan', 'wali khan', 'abbas khan', 1, '2021-12-29', 2021, 'Yes', 1, 1, 0, '2021-12-29', 17, '1'),
(2, 'Durshal Code for Pakistan 33', 'Government', '', '342 333', 'amir khan 33', 0, 4, 2, 'nazim khan 33', 'wali khan 33', 'abbas khan 33', 1, '2021-12-29', 2022, 'Yes', 1, 0, 2, '2021-12-29', 17, '1'),
(3, 'salman', 'Government', '', '28743521', 'Saleem Khan', 0, 4, 1, 'Iqtidar', 'Kaleem', 'Adv SanaUllh', 4, '2022-01-06', 2022, 'Yes', 1, 1, 2, '2022-01-06', 1, '1'),
(4, 'rehan', 'State', '', '28743521', 'Saleem Khan', 0, 4, 1, 'Iqtidar', 'Kaleem', 'Adv SanaUllh', 2, '2022-01-06', 2022, 'Yes', 1, 0, 2, '2022-01-06', 11, '3'),
(5, 'sohail', 'Government', '', '223', 'amir khan', 0, 4, 2, 'nazim khan', 'wali khan', 'abbas khan', 4, '2022-01-07', 2022, 'Yes', 1, 1, 0, '2022-01-07', 1, '1'),
(6, 'dsdfdsf', 'Government', '', '342', '', 0, 4, 2, '', '', '', 4, '2022-01-10', 2021, 'No', 1, 0, 0, '2022-01-10', 1, '1'),
(7, 'Sohail khan', 'Government', '', '3221', 'hamza khan', 0, 4, 2, 'nazim khan', 'wali khan', 'abbas khan', 4, '2022-01-10', 2021, 'No', 1, 0, 0, '2022-01-10', 1, '1'),
(8, 'saleeem case ', 'Government', '', '32233', 'amir khan', 0, 4, 1, 'nazim khan', 'wali khan', 'abbas khan', 4, '2022-01-10', 2020, 'No', 1, 0, 0, '2022-01-10', 12, '3'),
(9, 'salmee case 22', 'State', '', '2322', 'amir khan', 0, 3, 2, 'nazim khan', 'wali khan', 'abbas khan', 4, '2022-01-10', 2021, 'Yes', 1, 1, 8, '2022-01-10', 12, '3'),
(10, 'sj', 'Government', '', '56', 'sitar khan', 0, 4, 2, 'Iqtidar', 'Kaleem', 'khan', 4, '2022-01-11', 2021, 'No', 1, 0, 0, '2022-01-11', 1, '1'),
(11, 'saleem', 'State', '', '123', 'sitar khan', 0, 2, 3, 'Iqtidar', 'Kaleem', 'khan', 4, '2022-01-11', 2022, 'No', 1, 0, 10, '2022-01-11', 1, '1');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_cases_docs`
--

INSERT INTO `manage_cases_docs` (`id`, `case_id`, `docstype`, `docsname`, `docs_filename`, `docsext`, `hearing_date`, `next_hearing_date`, `case_decision`, `decision_date`, `docs_date`, `remarks`, `status`, `add_date`) VALUES
(15, 1, 'hearing_documents', 'Order Sheet', '2112292025900111.jpeg', 'jpeg', '2021-12-29', '2021-12-29', '', '0000-00-00', '2021-12-29', 'some text is here for testing', 1, '2021-12-29'),
(12, 1, 'decision_documents', 'Judgment', '2112291013458111.jpeg', 'jpeg', '0000-00-00', '0000-00-00', 'Disposed Case', '2021-12-29', '0000-00-00', 'some text is here for testing', 1, '2021-12-29'),
(27, 2, 'hearing_documents', 'Order Sheet', '2201064040051AG_Logo.jpg', 'jpg', '2022-01-06', '2022-01-15', '', '0000-00-00', '2022-01-06', 'The case will be heared on next date.', 1, '2022-01-06'),
(13, 1, 'case_documents', 'Comments / Reply', '2112292020300222.jpg', 'jpg', '0000-00-00', '0000-00-00', '', '0000-00-00', '2021-12-29', '', 1, '2021-12-29'),
(25, 3, 'decision_documents', 'Judgment', '2201064043357myPic.jpeg', 'jpeg', '0000-00-00', '0000-00-00', 'Sine-Die', '2021-01-06', '0000-00-00', 'The case has been solved. 656666', 1, '2022-01-06'),
(28, 3, 'hearing_documents', 'Order Sheet', '2201064042156AG_Logo.jpg', 'jpg', '2022-01-06', '2022-01-06', '', '0000-00-00', '2022-01-06', 'The case has been solved. 5555', 1, '2022-01-06'),
(29, 5, 'case_documents', 'CMs/Rejoinder', '22010710103159111.jpeg', 'jpeg', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-07', '', 1, '2022-01-07'),
(30, 5, 'case_documents', 'Comments / Reply', '22010711113600222.jpg', 'jpg', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-07', '', 1, '2022-01-07'),
(31, 5, 'hearing_documents', 'Order Sheet', '22010711111801222.jpg', 'jpg', '2022-01-07', '2022-01-07', '', '0000-00-00', '2022-01-07', 'hgjhgj', 1, '2022-01-07'),
(32, 5, 'decision_documents', 'Judgment', '22010711111102222.jpg', 'jpg', '0000-00-00', '0000-00-00', 'Disposed Case ', '2022-01-07', '0000-00-00', 'tewtdsfdsf', 1, '2022-01-07'),
(33, 9, 'case_documents', 'Judgement', '2201101013644111.jpeg', 'jpeg', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-10', '', 1, '2022-01-10'),
(34, 9, 'case_documents', 'Comments / Reply', '2201101014844222.jpg', 'jpg', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-10', '', 1, '2022-01-10'),
(35, 9, 'hearing_documents', 'Order Sheet', '2201101011845222.jpg', 'jpg', '2022-01-10', '2022-01-10', '', '0000-00-00', '2022-01-10', 'tewtdsfdsf', 1, '2022-01-10'),
(36, 9, 'hearing_documents', 'Order Sheet', '2201101013745222.jpg', 'jpg', '2022-01-10', '2022-01-10', '', '0000-00-00', '2022-01-10', 'tewtdsfd3333', 1, '2022-01-10'),
(37, 9, 'decision_documents', 'Judgment', '2201101015645111.jpeg', 'jpeg', '0000-00-00', '0000-00-00', 'Disposed Case ', '2022-01-10', '0000-00-00', 'tewtdsfdsf', 1, '2022-01-10'),
(38, 2, 'case_documents', 'Judgement', 'case_management (1).sql', 'sql', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-11', '', 1, '2022-01-11'),
(39, 2, 'case_documents', 'Order Sheet', '22011110100753AG_Logo.jpg', 'jpg', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-11', '', 1, '2022-01-11'),
(40, 10, 'case_documents', 'Order Sheet', '22011112124414myPic.jpeg', 'jpeg', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-11', '', 1, '2022-01-11'),
(41, 10, 'case_documents', 'Judgement', '22011112125916Experience.pdf', 'pdf', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-01-11', '', 1, '2022-01-11');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `branch_id`, `role_id`, `password`, `status`, `add_date`) VALUES
(1, 'Khan Wali', 'khan@gmail.com', 0, 1, '21232f297a57a5a743894a0e4a801fc3', 1, '2021-11-01'),
(2, 'Syed Zakria', 'syedzakria899@gmail.com', 1, 2, '827ccb0eea8a706c4c34a16891f84e7b', 1, '2021-11-29'),
(5, 'Zabi Ullah', 'zabiullahkhan@gmail.com', 2, 3, '827ccb0eea8a706c4c34a16891f84e7b', 1, '2021-12-07'),
(7, 'Junaid Ullah', 'junaidullah@gmail.com', 3, 4, '827ccb0eea8a706c4c34a16891f84e7b', 1, '2021-12-20'),
(8, 'Shahrum', 'Shahrum@gmail.com', 4, 3, '21232f297a57a5a743894a0e4a801fc3', 1, '2021-12-21'),
(9, 'Jameel Khan 22', 'jameelkhan22@gmail.com', 4, 2, 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-12-28'),
(10, 'Rukhsar Ali', 'staff@gmail.com', 1, 3, 'd41d8cd98f00b204e9800998ecf8427e', 1, '2021-12-29'),
(11, 'Jameel', 'jameel@gmail.com', 2, 3, '21232f297a57a5a743894a0e4a801fc3', 1, '2022-01-06'),
(12, 'Saleem ullah', 'saleem@gmail.com', 4, 3, '827ccb0eea8a706c4c34a16891f84e7b', 1, '2022-01-07'),
(13, 'Nazim', 'nazim@gmail.com', 4, 3, 'e2fc714c4727ee9395f324cd2e7f331f', 1, '2022-01-11');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_department`
--
ALTER TABLE `case_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_log`
--
ALTER TABLE `case_log`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_cases_docs`
--
ALTER TABLE `manage_cases_docs`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `case_department`
--
ALTER TABLE `case_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hearing_lawofficers`
--
ALTER TABLE `hearing_lawofficers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `manage_cases`
--
ALTER TABLE `manage_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manage_cases_docs`
--
ALTER TABLE `manage_cases_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
