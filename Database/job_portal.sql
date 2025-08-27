-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2025 at 06:11 PM
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
(1, 1, 'Web Designing and Development from King IT Center Lahore', 2020),
(2, 3, 'Frontend Development freeCodeCamp', 2023),
(3, 7, 'Software Engineering FreeCodeCamp ', 2023),
(4, 8, 'Web Development Freecode Camp', 2023);

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
(2, 'Techlogix', 'Crafting the digital future.', 'info@techlogix.com', '12345678', '+92 42 111 859 859', 'Lahore', '39 Empress Road,  Lahore, Pakistan', 'Techlogix_logo.jpg', 'Techlogix banner.jpg'),
(3, 'Cubix Inc', 'Rise and shine', 'cubix@gmail.com', '09876', '920848559948', 'Karachi', '54C, Kashmir Road, Block 2, PECHS, Karachi, Sindh – 75400, Pakista', 'images.png', 'download (1).jpg'),
(4, 'Ovex Technologies', 'Smart Solutions, Real Results', 'ovex@gmail.com', '1234', '97496740684', ' Lahore', '2nd Floor, 37-Civic Center, Block M, Model Town Extension, Lahore, Punjab, Pakis', 'ovex_technologies_logo.jpg', 'download (2).jpg'),
(5, 'Nextbridge ', 'Your Vision, Our Technology', 'nextbridge123@gamil.com', '09876', '+92 42 12345678 ', 'Lahore', '427/428, G-IV Block, M.A. Johar Town, Lahore, Pakistan ', 'NExtbridge.jpg', 'next.jpg');

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
(2, 2, 1996, 'Woburn, MA', '201-500 employees', 'IT Services and IT Consulting', 'http://www.techlogix.com', 'IT Services, Consulting, Business Solutions, Enterprise Product Development, Innovation and Software Product Engineering, Digital Transformation, Financial Industry Solutions, Core Banking, Compliance, Risk Management, Remittance Plateform, Application Services, Business Process ', 'Techlogix is a global IT Services, Consulting, and Business Solutions company that helps its clients achieve enterprise transformation by harmonizing people, business processes, and technology. Our globally distributed development teams build high performance solutions leveraging our practice-specific delivery methodologies. Our people combine the spirit of engineering excellence with a strong commitment to deliver a delightful end-to-end customer experience.'),
(3, 3, 2008, 'Florida, USA', '100-500', ' Information Technology & Software Development', 'https://www.cubix.com', 'Mobile App Development (iOS, Android, cross-platform)\r\n\r\nWeb Application Development\r\n\r\nEnterprise Software Solutions\r\n\r\nGame Development (2D, 3D, AR/VR games)\r\n\r\nBlockchain Development (smart contracts, NFTs, DeFi)\r\n\r\nArtificial Intelligence & Machine Learning\r\n\r\nAugmented Reali', 'Cubix is a full-cycle software development firm founded in 2008 by Salman Lakhani, who hails from Karachi. Headquartered in Florida, USA, Cubix also operates offices in Karachi (Pakistan) and Dubai (UAE)'),
(4, 4, 2003, 'Islamabad', '200-1000', 'resource Management', 'http://www.ovex.com', 'Business Process Outsourcing (BPO),IT Outsourcing, Software Development and Finance & Accounting Outsourcing', 'Ovex Technologies (Pvt.) Ltd. stands as one of Pakistan’s largest providers of Business Process Outsourcing (BPO) and IT solutions. Established initially in 2003 as a BPO entity and later incorporated formally in 2009 as a distinct entity—Ovex has grown to serve both domestic and international clients'),
(5, 5, 1996, 'Islamabad', '2000-4000', 'Solving problem', 'http://nextbridge.com', 'Offers offshore development services including AI, robotics, app development, and maintenance with expertise in PHP, .NET, Python, and Ruby on Rails', 'Nextbridge (Pvt) Ltd is a leading IT solutions and software development company in Pakistan, with offices in Lahore, Islamabad, and Multan. Since its establishment in 1996, Nextbridge has been delivering innovative, high-quality web, mobile, and enterprise software solutions to clients worldwide. The company specializes in PHP, Laravel, .NET, Python, Ruby on Rails, mobile app development, AI, and cloud-based services. With a strong focus on teamwork, creativity, and continuous learning, Nextbridge provides an environment where professionals can grow and contribute to cutting-edge projects for global markets.\r\n\r\n');

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

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ayesha', 'ayesha345@gmail.com', 'Excellent Website Experience', 'Your website is very easy to use and well-designed. I found exactly what I needed in just a few clicks');

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
(4, 2, 'MCS', 'Virutal University of Pakistan', '3.40', '4.00', '2021'),
(5, 3, 'Matric', 'Punjab college', '874', '1100', '2017'),
(6, 3, 'intermediate', 'Punjab college', '956', '1100', '2019'),
(7, 3, 'BS ', 'virtual University', '3.67', '4', '2023'),
(8, 7, 'BS Software Enginnering', 'Gift University', '3.78', '4', '2024'),
(9, 8, 'BS Information Technology', 'Punjab University', '3.67', '4', '2022');

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
(2, 2, 'Front End Developer', '2020', 'This is the description of the experience.'),
(3, 3, 'Fronted Developer', '2023-2024', 'Skilled in creating responsive, user-friendly websites using HTML, CSS, JavaScript, and Bootstrap. Experienced in UI/UX design, API integration, and optimizing site performance.'),
(5, 7, 'Software Engineer', '2023-2024', 'Develops, tests, and maintains software solutions using modern programming languages and best practices. Skilled in problem-solving, coding, and collaborating with teams to deliver high-quality applications.'),
(6, 8, 'Web Development', '2022-2023', 'I am a passionate and detail-oriented Web Developer with experience in creating responsive, user-friendly, and visually appealing websites. Skilled in HTML, CSS, JavaScript, Bootstrap, PHP, and MySQL, I enjoy turning ideas into functional digital solutions.');

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
(2, 1, 1, 4, 'Very good candidate.', '2024-06-09', 'company'),
(4, 1, 1, 4, 'good', '2025-08-21', 'company');

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
(3, 2, 'Reading'),
(4, 7, 'Reading'),
(5, 7, 'Gardening'),
(6, 8, 'Walking');

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
(1, 1, '2024-06-11', '10:00:00', '03087328789', 'Golf Road Gor-1 Lahore'),
(2, 5, '2025-11-20', '18:00:00', '90683754969', '2nd Floor, 37-Civic Center, Block M, Model Town Extension, Lahore, Punjab	');

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
  `profile_img` varchar(80) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_seeker`
--

INSERT INTO `job_seeker` (`id`, `name`, `contact`, `email`, `city`, `password`, `address`, `profile_img`, `status`) VALUES
(1, 'Rehan Aslam', '03084817638', 'rahan@gmail.com', 'Lahore', '12345', 'Gulshan e Iqbal Town Lahore', 'male vector icon.jpg', 0),
(2, 'Ume Kulsoom ', '03008719871', 'umekulsoom@gmail.com', 'Lahore', '12345', 'Johar Town Lahore', 'female 2.png', 0),
(3, 'Ali khan', '03001861791', 'ali.khan@gmail.com', 'Lahore', '12345', 'ABC', 'black user icon.png', 0),
(4, 'Khalid Mahmood', '03457873909', 'khalid728@gmail.com', 'Lahore', '123', 'Gita Bhavan Building 18/3 , Lakshmi Chowk،, McLeod Rd, Royal Park, Lahore', 'team-1.jpg', 0),
(7, 'sana', '03053937910', 'sana123@gmail.com', 'Multan', '123456', 'Main GT Road', 'girl2.png', 0),
(8, 'Ayesha', '03053637420', 'ayesha345@gmail.com', 'Karachi', '12345', 'Main Bazar near by HBL bank', 'girl4.png', 0),
(9, 'Mubashir ', '03153422948', 'mubashir1234@gmail.com', 'Rawalpindi', '23456', 'Main Bazar near  by Alfalah bank', 'boy1.png', 0),
(10, 'Hamza', '03053935802', 'hamza567@gmail.com', 'Karachi', '64485', 'abcd', 'black user icon.png', 0),
(11, 'Shakeel Ahmad', '03087328789', 'shakeel13471@gmail.com', 'Sargodha', '12345', 'House No 30 Street 1 New Satellite Town Sargodha', 'black user icon.png', 1);

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
(2, 2, '82762893483782', '1999-12-08', 'Female', 'boast.pdf', 'Some text about me.'),
(3, 7, '12345-6789012-3', '2002-12-12', 'Female', 'boast.pdf', 'I am a passionate and dedicated software developer with a Bachelor’s degree in Computer Science from Punjab University. I have hands-on experience in designing and developing applications using HTML, CSS, Bootstrap, PHP, MySQL, and other modern technologies'),
(4, 8, '35202-1234567-1', '2001-10-01', 'Female', 'boast.pdf', 'I am a hard working, honest, and detail-oriented person who works well in a team and can solve problem quickly.'),
(5, 9, '35201-5566778-6', '2002-02-23', 'Male', 'boast.pdf', 'I am a motivated Web Developer with hands-on experience in designing, developing, and maintaining dynamic websites. Proficient in front-end and back-end technologies including HTML5, CSS3, JavaScript, Bootstrap, PHP, and MySQL. I am committed to delivering high-quality, scalable, and user-friendly solutions that meet client needs.\r\n\r\n');

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
(5, 1, 'Urdu'),
(6, 3, 'English'),
(7, 3, 'Urdu'),
(8, 7, 'English'),
(9, 7, 'Urdu'),
(10, 8, 'English');

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
(1, 1, 2, 'Please send your CV at: talent@systemsltd.com', 'Ok alright, I have sent please check your email.'),
(2, 1, 1, 'Send me your CV', 'ok');

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
(4, 1, 'Faisalabad', '1st floor Main East Canal Road, Ali Fatima, Science College, Faisalabad', '+971 (4) 369-3525'),
(5, 3, 'Karachi', '54C, Kashmir Road, Block 2, PECHS, Karachi, Sindh – 75400, Pakista', '920848559948'),
(6, 4, 'Lahore', '2nd Floor, 37-Civic Center, Block M, Model Town Extension, Lahore, Punjab', '90683754969'),
(7, 4, 'Islamabad', '	Plot # 11, UCC Building, Sector I-11/3 and/or 2nd Floor, Evacuee Trust Complex, F-5/1', '96582357296'),
(8, 4, 'Karachi', '	4th Floor, Cavish Court, A/35, Block 7 & 8, KCHSU, Shahrah-e-Faisal, Karachi', '99475349673407'),
(9, 5, 'Lahore', '427/428, G-IV Block, M.A. Johar Town, Lahore, Pakistan ', '+92 42 12345678 ');

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
(1, 1, 'System limited is now a Certified AWS Select Tier Services Partner', 'Certified AWS select tier Services partner.jpg', 'We are pleased to announce that Systems Limited is now a certified AWS Select Tier Services Partner in the Amazon Web Services (AWS) Partner Network (APN). Systems Limited completed a comprehensive process for this achievement, including training and certification of employees, along with a proven record in deploying successful AWS solutions. ', '2022-12-10'),
(2, 3, 'Cubix Inc', 'images.png', 'Design and develop both frontend and backend of web applications.\r\nCreate responsive UIs using HTML, CSS, JavaScript, and frameworks.\r\nBuild and manage server-side logic and databases.\r\nIntegrate APIs and ensure application performance and security.\r\nCollaborate with teams to deliver high-quality software solutions.', '2025-08-10'),
(3, 4, 'Ovex Technologies', 'download (2).jpg', 'Ovex Technologies (Pvt.) Ltd. stands as one of Pakistan’s largest providers of Business Process Outsourcing (BPO) and IT solutions. Established initially in 2003 as a BPO entity and later incorporated formally in 2009 as a distinct entity—Ovex has grown to serve both domestic and international clients', '2025-08-11'),
(4, 5, 'NeXT Bridge', 'NExtbridge.jpg', 'Nextbridge (Pvt) Ltd is searching for a skilled and enthusiastic person who can work as a Web Developer, and they want this person to become part of their energetic and active team.\r\n\r\n', '2025-08-13');

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
(3, 1, 2, '2022-12-11', 1, 0),
(4, 2, 2, '2023-11-09', 1, 0),
(5, 1, 2, '2024-04-29', 1, 0),
(6, 1, 1, '2024-11-10', 1, 0),
(7, 7, 6, '2025-08-13', 1, -1),
(8, 7, 5, '2025-08-13', 1, 1),
(9, 8, 5, '2025-08-15', 1, 1);

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
(9, 2, 'JavaScript', 'Expert'),
(10, 3, 'Html', 'Expert'),
(11, 3, 'CSS', 'Expert'),
(12, 3, 'Bootstrap', 'Expert'),
(13, 3, 'Java', 'Intermediate'),
(14, 7, 'HTML', 'Expert'),
(15, 7, 'CSS ', 'Expert'),
(16, 7, 'Bootstrap', 'Expert'),
(17, 7, 'MySQL', 'Intermediate'),
(18, 7, 'Debugging & Testing', 'Expert'),
(19, 8, 'HTML', 'Expert'),
(20, 8, 'CSS', 'Expert'),
(21, 8, 'Bootstrap', 'Intermediate'),
(22, 8, 'PHP', 'Intermediate'),
(23, 8, 'MySQL', 'Expert');

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
(2, 2, 'Lead Dotnet Developer', 'Full Time', '4', 'A Bachelor or Master Degree in Computer Science/Information Technology/Software ', 'Expert in .NET technologies, including ASP.NET API development using LINQ', 'Experience of application development using core network concepts of HTTP, REST, SOAP, Authentication, Authorization and security protocols.', 'Lahore, Karachi & Islamabad', '80000', '2022-12-22', 'Expert in .NET technologies, including ASP.NET API development using LINQ and ideally having experience of working in scalable and secure financials systems integration Experienced in database using Microsoft SQL Server with strong relational concepts along with skills in query writing, stored procedure development, optimization and relational schema designing.Experience of application development using core network concepts of HTTP, REST, SOAP, Authentication, Authorization and security protocols.\r\nUnderstanding of message queues and brokered application architectures.\r\nCollaborate with Stakeholders including Customer, Business Analysts, Application Developers, QA Analysts\r\nQualification:\r\nâ€¢ A Bachelor or Master Degree in Computer Science/Information Technology/Software Engineering is required with minimum 4 years of industry experience', '2022-12-11', 1),
(3, 3, 'Full stack Developer', 'Full Time', '9', 'Bachelors', 'HTML CSS Bootstrap PHP', '3 years', 'karachi', '150k', '2025-12-12', 'Design and develop both frontend and backend of web applications.\r\nCreate responsive UIs using HTML, CSS, JavaScript, and frameworks.\r\nBuild and manage server-side logic and databases', '2025-08-11', 1),
(5, 4, 'Software Development', 'Full Time', '10', 'MS Degree', 'Programming language, Database Management, version control   ', '2 years', 'Lahore', '120000', '2025-12-24', 'A software developer designs, builds, tests, and maintains software applications. They write clean and efficient code, fix bugs, and improve performance. They collaborate with teams to understand requirements and deliver solutions. They stay updated with new technologies and follow best practices in development.\r\n', '2025-08-11', 1),
(6, 5, 'Web Developer', 'Permanent', '20', 'Bachelors', 'programming language , database management and testing and debugging ', '3 years', 'Lahore', '200000', '2025-12-30', 'We are seeking a skilled and creative Web Developer to design, build, and maintain responsive and user-friendly websites and web applications. The ideal candidate should have a strong command of web technologies, attention to detail, and the ability to work in a collaborative environment.\r\n\r\n', '2025-08-13', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hobby`
--
ALTER TABLE `hobby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_listing`
--
ALTER TABLE `job_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_seeker`
--
ALTER TABLE `job_seeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_seeker_profile`
--
ALTER TABLE `job_seeker_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_applied`
--
ALTER TABLE `post_applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `search_history`
--
ALTER TABLE `search_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
