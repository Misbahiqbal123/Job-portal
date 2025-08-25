-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 05:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Misbah', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `certification`
--

CREATE TABLE `certification` (
  `id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `title` varchar(160) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `certification`
--

INSERT INTO `certification` (`id`, `job_seeker_id`, `title`, `year`) VALUES
(1, 1, 'Web Designing and Development from King IT Center Lahore', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(80) NOT NULL,
  `tagline` varchar(80) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `location` varchar(80) NOT NULL,
  `logo` varchar(80) NOT NULL,
  `image` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `tagline`, `email`, `password`, `contact`, `city`, `location`, `logo`, `image`) VALUES
(1, 'Systems Limited', 'Enabling a Digital Tomorrow', 'talent@systemsltd.com', 'asdf0000', '+92 (42) 111-797-836', 'Lahore', 'E-1, Sehjpal Near DHA Phase-VIII (Ex-Air Avenue), Lahore Cantt, Pakistan', 'system_logo.jpg', 'system_limited logo.jpg'),
(2, 'Techlogix', 'Crafting the digital future.', 'info@techlogix.com', '12345678', '+92 42 111 859 859', 'Lahore', '39 Empress Road,  Lahore, Pakistan', 'Techlogix_logo.jpg', 'Techlogix banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `founded` int(11) NOT NULL,
  `headquarter` varchar(80) NOT NULL,
  `size` varchar(80) NOT NULL,
  `industory` varchar(80) NOT NULL,
  `website` varchar(80) NOT NULL,
  `specialties` varchar(280) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `company_id`, `founded`, `headquarter`, `size`, `industory`, `website`, `specialties`, `about`) VALUES
(1, 1, 1977, 'Lahore , Punjab', '5,001-10,000 employees', 'IT Services and IT Consulting', 'https://www.systemsltd.com', 'Enterprise Resource Planning, System Integration, Business Intelligence, Staff Augmentation, Business Process Outsourcing, Cloud Services, Business Application Development, Digital Commerce', 'Systems Limited is a globally recognized IT software solution company offering state-of-the-art professional services and BPO offerings in the technology landscape.  \r\n\r\nUp and running since 1977, the company has positioned itself as the top IT company in Pakistan and provides computing strategies and solutions to Government and Private Organizations. \r\n\r\nSystems Limited is a global leader in delivering the finest business applications to a comprehensive list of clients from diverse industries that includes several names from the Fortune 500.'),
(2, 2, 1996, 'Woburn, MA', '201-500 employees', 'IT Services and IT Consulting', 'http://www.techlogix.com', 'IT Services, Consulting, Business Solutions, Enterprise Product Development, Innovation and Software Product Engineering, Digital Transformation, Financial Industry Solutions, Core Banking, Compliance, Risk Management, Remittance Plateform, Application Services, Business Process ', 'Techlogix is a global IT Services, Consulting, and Business Solutions company that helps its clients achieve enterprise transformation by harmonizing people, business processes, and technology. Our globally distributed development teams build high performance solutions leveraging our practice-specific delivery methodologies. Our people combine the spirit of engineering excellence with a strong commitment to deliver a delightful end-to-end customer experience.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `degree` varchar(40) NOT NULL,
  `institute` varchar(40) NOT NULL,
  `marks_obtained` varchar(30) NOT NULL,
  `total_marks` varchar(30) NOT NULL,
  `passing_year` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `job_seeker_id`, `degree`, `institute`, `marks_obtained`, `total_marks`, `passing_year`) VALUES
(1, 1, 'Matric', 'Lahore Board', '820', '1100', '2015'),
(2, 1, 'Intermediate (ICS)', 'Pubjab College of Science', '740', '1100', '2017'),
(3, 1, 'BCS', 'Punjab University', '3.63', '4.00', '2019'),
(4, 2, 'MCS', 'Virutal University of Pakistan', '3.40', '4.00', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `duration` varchar(80) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `job_seeker_id`, `title`, `duration`, `description`) VALUES
(1, 1, 'PHP/ Laravel Developer', '2018-2021', 'I am working as a backend developer with PHP/ Laravel having four years of experience in this field.'),
(2, 2, 'Front End Developer', '2020', 'This is the description of the experience.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `date` date NOT NULL,
  `sent_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `company_id`, `job_seeker_id`, `rating`, `review`, `date`, `sent_by`) VALUES
(1, 1, 4, 5, 'Very good company.', '2024-06-08', 'job-seeker'),
(2, 1, 1, 4, 'Very good candidate.', '2024-06-09', 'company');

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

CREATE TABLE `hobby` (
  `id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `hobby_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hobby`
--

INSERT INTO `hobby` (`id`, `job_seeker_id`, `hobby_name`) VALUES
(1, 1, 'Walking'),
(2, 1, 'Gardening'),
(3, 2, 'Reading');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `contact` varchar(80) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`id`, `vacancy_id`, `date`, `time`, `contact`, `address`) VALUES
(1, 1, '2024-06-11', '10:00:00', '03087328789', 'Golf Road Gor-1 Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `job_listing`
--

CREATE TABLE `job_listing` (
  `id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `job_listing`
--

INSERT INTO `job_listing` (`id`, `job_seeker_id`, `vacancy_id`) VALUES
(1, 2, 2),
(2, 1, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker`
--

CREATE TABLE `job_seeker` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` varchar(80) NOT NULL,
  `profile_img` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`id`, `name`, `contact`, `email`, `city`, `password`, `address`, `profile_img`) VALUES
(1, 'Rehan Aslam', '03084817638', 'rahan@gmail.com', 'Lahore', '12345', 'Gulshan e Iqbal Town Lahore', 'male vector icon.jpg'),
(2, 'Ume Kulsoom ', '03008719871', 'umekulsoom@gmail.com', 'Lahore', '12345', 'Johar Town Lahore', 'female 2.png'),
(3, 'Ali khan', '03001861791', 'ali.khan@gmail.com', 'Lahore', '12345', 'ABC', 'black user icon.png'),
(4, 'Khalid Mahmood', '03457873909', 'khalid728@gmail.com', 'Lahore', '123', 'Gita Bhavan Building 18/3 , Lakshmi Chowk،, McLeod Rd, Royal Park, Lahore', 'team-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_seeker_profile`
--

CREATE TABLE `job_seeker_profile` (
  `id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `cnic` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(40) NOT NULL,
  `resume` varchar(80) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_seeker_profile`
--

INSERT INTO `job_seeker_profile` (`id`, `job_seeker_id`, `cnic`, `dob`, `gender`, `resume`, `about`) VALUES
(1, 1, '8130276487643', '1996-03-06', 'Male', 'boast.pdf', 'Seeking a career opportunity in a reputed organization where I canharness myself and gain experience in order to take a significant contribution to the growth and development of organization and thereby developing myself.'),
(2, 2, '82762893483782', '1999-12-08', 'Female', 'boast.pdf', 'Some text about me.');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `language` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `job_seeker_id`, `language`) VALUES
(1, 1, 'English'),
(3, 2, 'Urdu'),
(4, 2, 'English'),
(5, 1, 'Urdu');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `employer_id`, `job_seeker_id`, `message`, `reply`) VALUES
(1, 1, 2, 'Please send your CV at: talent@systemsltd.com', 'Ok alright, I have sent please check your email.');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `city` varchar(80) NOT NULL,
  `location` varchar(200) NOT NULL,
  `telephone` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `company_id`, `city`, `location`, `telephone`) VALUES
(1, 1, 'Lahore Head Office', 'E-1, Sehjpal Near DHA Phase-VIII (Ex-Air Avenue), Lahore Cantt, Pakistan', '+92 (42) 111-797-836'),
(2, 1, 'Karachi', 'E-5, Central Commercial Area, Shaheed-e-Millat Road, Karachi, Pakistan', '+92 (21) 3-454-9385-87'),
(3, 1, 'Islamabad', 'Plot No. 21, 1st Floor Fazeelat Arcade, Sector G-11 Markaz, Islamabad, Pakistan', '+ 92 51 5495630'),
(4, 1, 'Faisalabad', '1st floor Main East Canal Road, Ali Fatima, Science College, Faisalabad', '+971 (4) 369-3525');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` varchar(280) NOT NULL,
  `image` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `company_id`, `title`, `image`, `description`, `added_on`) VALUES
(1, 1, 'System limited is now a Certified AWS Select Tier Services Partner', 'Certified AWS select tier Services partner.jpg', 'We are pleased to announce that Systems Limited is now a certified AWS Select Tier Services Partner in the Amazon Web Services (AWS) Partner Network (APN). Systems Limited completed a comprehensive process for this achievement, including training and certification of employees, along with a proven record in deploying successful AWS solutions. ', '2022-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `post_applied`
--

CREATE TABLE `post_applied` (
  `id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `apply_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `shortlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_applied`
--

INSERT INTO `post_applied` (`id`, `job_seeker_id`, `vacancy_id`, `apply_date`, `status`, `shortlist`) VALUES
(1, 2, 1, '2022-12-11', 1, 1),
(2, 1, 1, '2022-12-11', 1, 1),
(3, 1, 2, '2022-12-11', 0, 0),
(4, 2, 2, '2023-11-09', 0, 0),
(5, 1, 2, '2024-04-29', 0, 0),
(6, 1, 1, '2024-11-10', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE `search_history` (
  `id` int(11) NOT NULL,
  `keyword` varchar(80) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `search_history`
--

INSERT INTO `search_history` (`id`, `keyword`, `datetime`) VALUES
(1, 'Php developer', '2025-05-15 19:17:52'),
(2, 'dds', '2025-05-15 19:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `job_seeker_id` int(11) NOT NULL,
  `skill_name` varchar(80) NOT NULL,
  `expert_knowledge` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `job_seeker_id`, `skill_name`, `expert_knowledge`) VALUES
(1, 1, 'HTML 5', 'Expert'),
(2, 1, 'CSS 3', 'Expert'),
(3, 1, 'JQuery', 'Beginner'),
(4, 1, 'Bootstrap', 'Expert'),
(5, 1, 'PHP', 'Expert'),
(6, 2, 'HTML', 'Expert'),
(7, 2, 'CSS', 'Expert'),
(8, 2, 'Bootstrap', 'Intermediate'),
(9, 2, 'JavaScript', 'Expert');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `job_type` varchar(80) NOT NULL,
  `position` varchar(40) NOT NULL,
  `qualification` varchar(80) NOT NULL,
  `skills` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `location` varchar(80) NOT NULL,
  `salary` varchar(40) NOT NULL,
  `last_date` date NOT NULL,
  `description` text NOT NULL,
  `added_on` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `company_id`, `title`, `job_type`, `position`, `qualification`, `skills`, `experience`, `location`, `salary`, `last_date`, `description`, `added_on`, `status`) VALUES
(1, 1, 'Frontend Developer', 'Part Time', '8', 'Bachelor degree or equivalent in Computer Science', 'Good understanding of advanced JavaScript libraries and frameworks, such as AngularJS, ReactJS, KnockoutJS', '3 to 5 years of post-degree experience in front-end development.', '(Islamabad/Karachi/Lahore) , Pakistan', '60000', '2022-12-30', 'The incumbent will be collaborating with cross-functional teams to deliver high-quality and efficient products. Collaborate with a multidisciplinary team of Web Designers, Back-end Developers, Project Managers, and System Analysts to complete projects', '2022-12-10', 1),
(2, 2, 'Lead Dotnet Developer', 'Full Time', '4', 'A Bachelor or Master Degree in Computer Science/Information Technology/Software ', 'Expert in .NET technologies, including ASP.NET API development using LINQ', 'Experience of application development using core network concepts of HTTP, REST, SOAP, Authentication, Authorization and security protocols.', 'Lahore, Karachi & Islamabad', '80000', '2022-12-22', 'Expert in .NET technologies, including ASP.NET API development using LINQ and ideally having experience of working in scalable and secure financials systems integration Experienced in database using Microsoft SQL Server with strong relational concepts along with skills in query writing, stored procedure development, optimization and relational schema designing.Experience of application development using core network concepts of HTTP, REST, SOAP, Authentication, Authorization and security protocols.\r\nUnderstanding of message queues and brokered application architectures.\r\nCollaborate with Stakeholders including Customer, Business Analysts, Application Developers, QA Analysts\r\nQualification:\r\nâ€¢ A Bachelor or Master Degree in Computer Science/Information Technology/Software Engineering is required with minimum 4 years of industry experience', '2022-12-11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_listing`
--
ALTER TABLE `job_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_seeker`
--
ALTER TABLE `job_seeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_seeker_profile`
--
ALTER TABLE `job_seeker_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_applied`
--
ALTER TABLE `post_applied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_history`
--
ALTER TABLE `search_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certification`
--
ALTER TABLE `certification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hobby`
--
ALTER TABLE `hobby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_listing`
--
ALTER TABLE `job_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_seeker_profile`
--
ALTER TABLE `job_seeker_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_applied`
--
ALTER TABLE `post_applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `search_history`
--
ALTER TABLE `search_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
