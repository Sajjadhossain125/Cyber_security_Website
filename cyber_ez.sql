-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 03:05 AM
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
-- Database: `cyber_ez`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`name`, `email`, `subject`, `message`) VALUES
('Md Hasibur Rahman', 'mdhasibur@gmail.com', 'Great service', 'Basic validation is performed to check if all fields are filled and if the email format is correct.\r\n'),
('Md Rakib', 'sdf@gmail.com', 'Anywhere', 'this text'),
('Ashik', 'Ashk05@gmail.com', 'Great journey with you.', 'Lorem Lorem'),
('Md Sajjad Hossen', 'sajjadkhan1647315@gmail.c', 'Great journey with you.', 'Lorem Lorem');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `reviews` varchar(50) DEFAULT NULL,
  `price` varchar(50) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `instructor_img` varchar(20) NOT NULL,
  `instructor` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `subtitle`, `short_desc`, `rating`, `reviews`, `price`, `discount`, `instructor_img`, `instructor`, `image`) VALUES
(4, 'Advance Mobile Hacking', 'Mobile Hacking', 'কোর্সটি পুরোপুরি Learning Purpose এ রিলিজ করা হচ্ছে, কোনো রকম Unethical কাজে ব্যবহার করবেন না। কোনো ক্ষতিকর কার্যকলাপ কিংবা সমস্যার সম্মুখীন হলে কোনোভাবেই কর্তৃপক্ষ দায়ী থাকবে না৷ Must Need a PC ( Desktop / Laptop), Configuration Minimum 4GB Ram, Core i3 processor', 4.2, 'Excellent', '৳720', '৳1200', 'images/hasib.jpg', 'Md Hasibur Rahman', 'images/android.jpg'),
(5, 'Malware Development A to Z', 'Malware', 'কোর্সটি পুরোপুরি Learning Purpose এ রিলিজ করা হচ্ছে, কোনো রকম Unethical কাজে ব্যবহার করবেন না। কোনো ক্ষতিকর কার্যকলাপ কিংবা সমস্যার সম্মুখীন হলে কোনোভাবেই কর্তৃপক্ষ দায়ী থাকবে না৷', 3.9, 'Excellent', '৳8100', '৳13500', 'images/sajjad.jpg', 'Md Sajjad Hossen.', 'images/malware.jpg'),
(6, 'SOC Certification Live Course', 'SOC ', 'A Professional Course on Cyber Security in Bangla by Byte Capsule', 3.2, 'Good', '৳6300', '৳10500', 'images/hasib.jpg', 'Md Hasibur Rahman', 'images/soc.jpg'),
(7, 'Practical PC Hacking Bangla Course', 'PC Hacking ', 'কোর্সটি পুরোপুরি Learning Purpose এ রিলিজ করা হচ্ছে, কোনো রকম Unethical কাজে ব্যবহার করবেন না। কোনো ক্ষতিকর কার্যকলাপ কিংবা সমস্যার সম্মুখীন হলে কোনোভাবেই কর্তৃপক্ষ দায়ী থাকবে না৷', 4.2, 'Excellent', '৳720', '৳1200', 'images/sajjad.jpg', 'Md Sajjad Hossen.', 'images/pchacking.png'),
(8, 'জাভাস্ক্রিপ্ট ফর হ্যাকিং', 'Formal Hacking', 'জাভাস্ক্রিপ্ট ল্যাঙ্গুয়েজ এর মাধ্যমে ইথিক্যাল হ্যাকিং এডভান্স কোর্স', 4.5, 'Excellent', 'FREE', '৳1000', 'images/shoaib.jpg', 'Shoaib Ahmed', 'images/javascript.jpg'),
(10, 'ব্লকচেইন সিকিউরিটি এসেন্শিয়াল্স', 'BlockChain', 'ব্লকচেইন টেকনোলজি এর সিকিউরিটি বিষয়ক বিগিনার লেবেল কোর্স।', 3.6, 'Excellent', '৳720', '৳1200', 'images/hasib.jpg', 'Md Hasibur Rahman', 'images/blockchain.jpg'),
(11, 'ইথিক্যাল হ্যাকিং এসেন্সিয়াল্স', 'Bd Hacker', 'ইথিক্যাল হ্যাকিং বিগিনার লেবেল কোর্স।', 4.9, 'Excellent', '৳500', '৳1000', 'images/shoaib.jpg', 'Md Sajjad Hossen.', 'images/eithical.jpg'),
(12, 'Web Pentesting  Essentials', 'ওয়েব পেন্টেস্টিং এসেন্সিয়াল্স', 'ওয়েব অ্যাপ্লিকেশন পেনিট্রেশন টেস্টিং বিষয়ক বিগিনার লেবেল কোর্স।', 4.2, 'Excellent', '৳480', '৳800', 'images/shoaib.jpg', 'Shoaib Ahmed', 'images/wpe.jpg'),
(13, 'Ethical Hacking For Professional', 'ইথিক্যাল হ্যাকিং ফর প্রফেশনাল্স', 'প্র্যাকটিক্যাল ইথিক্যাল হ্যাকিং এডভান্স কোর্স।', 4.5, 'Excellent', '৳3750', '৳7500', 'images/hasib.jpg', 'Md Hasibur Rahman', 'images/ehp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `intro` text DEFAULT NULL,
  `fundamentals` text DEFAULT NULL,
  `skill` text DEFAULT NULL,
  `course_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `course_title` varchar(150) DEFAULT NULL,
  `course_price` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`course_title`, `course_price`) VALUES
('javascript', 5000),
('ethical hacking', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `facebook_name` varchar(100) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `present_city` varchar(100) DEFAULT NULL,
  `postal_codeC` varchar(10) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `city_name` varchar(100) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(100) DEFAULT NULL,
  `father_cell` varchar(15) DEFAULT NULL,
  `cnic` varchar(15) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `last_degree` varchar(100) DEFAULT NULL,
  `major_subject` varchar(100) DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `degree_passing_year` date DEFAULT NULL,
  `employment_status` varchar(20) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `institution_year` varchar(10) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `student_name`, `mobile_number`, `email_address`, `facebook_name`, `present_address`, `present_city`, `postal_codeC`, `permanent_address`, `city_name`, `postal_code`, `father_name`, `birth_date`, `birth_place`, `father_cell`, `cnic`, `marital_status`, `district`, `gender`, `last_degree`, `major_subject`, `college_name`, `degree_passing_year`, `employment_status`, `institution_name`, `institution_year`, `course`) VALUES
(3, 'Md Hasibur Rahman', '0163569446', 'hasiburraham@gmail.com', 'Md Hasibur Rahman', 'Dhaka,Gulshan', 'Dhaka', '1212', 'Dhaka,Gulshan', 'Dhaka', '1212', 'Mr Ali mia', '2024-06-21', 'Cumilla', '01914149670', '31235', 'single', 'district1', 'male', 'BSc in CSE', 'Computer science', 'GREEN UNIVERSITY OF BANGLADESH', '2024-06-12', 'employed', 'Gazipur', '2020', 'course1'),
(4, 'Md Rakib khan', '0163569446', 'mdrakibkhan04@gmail.com', '', 'Uttora,dhaka', 'Dhaka', '1420', 'Bhola', 'Nothing', '15604', 'None', '2024-06-20', 'Bhola', '46546541', '31235', 'married', 'district1', 'female', 'BSc in CSE', 'Computer science', 'Green', '2024-07-03', 'employed', 'Bhola college', '2018', 'course1'),
(6, 'Md Habib Shah', '01576400074', 'chiggychiggy40@gmail.com', NULL, 'Dhaka,Gulshan', 'Dhaka', '1212', 'Dhaka,Gulshan', 'Dhaka', '1212', 'None', '0000-00-00', 'Cumilla', '01914149670', '31235', 'single', 'comilla', 'male', 'BSc in CSE', 'Computer science', 'Green', '2024-06-13', 'employed', 'Gazipur', 'dsf', 'course1');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `reviews` varchar(50) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `students` varchar(50) DEFAULT NULL,
  `courses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `profession`, `image`, `title`, `reviews`, `rating`, `students`, `courses`) VALUES
(2, 'Md Hasibur Rahman.', 'ML Engineer', 'hasibur.jpg', 'undefine', 'Excellent', 5.6, '450', 10),
(3, 'Md Rakib', 'Jr. Software Development', 'rakib.jpg', 'none', 'Excellent', 6.5, '600', 10),
(4, 'Md Sajjad Hossen', 'Flutter Developer', 'sajjad.jpg', 'Lorem', 'Excellent', 4.5, '540', 12);

-- --------------------------------------------------------

--
-- Table structure for table `learning_things`
--

CREATE TABLE `learning_things` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `facilities1` text DEFAULT NULL,
  `facilities2` text DEFAULT NULL,
  `description2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `requirement` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requirement_desc`
--

CREATE TABLE `requirement_desc` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'sajjad', 'chiggychiggy40@gmail.com', '$2y$10$IodigA7vEXtfBKm4ghLKduB6AC2LD0dhsk4.99Soq0WyFNJg1VB3y', '2024-06-01 14:59:19'),
(4, 'Hasibur Rahman', 'sajjadkhan1647315@gmail.com', '$2y$10$CfXFK4dQ4mNbM92T0qrKdO2sCz1QjUAXMDfTz9kOAYbJc77pgbI/y', '2024-06-01 15:05:09'),
(7, 'Ashik', 'Ashik05@gmail.com', '$2y$10$XLHghcq6LCHKBJPMNrvPJ.QFOX8EvLBMrduksmFvhY.pBI23Agy5e', '2024-06-01 15:10:17'),
(8, 'GreenUnion', 'abcd@gmail.com', '$2y$10$ll5ZAG67jKmS7QnGJj/EiuZ5VqUn0qYV/.c689Ydwhr.t2tak0iqG', '2024-06-02 14:05:40'),
(9, 'sajj', 'sa@gmail.com', '$2y$10$dNVCL1YjqH9bcAuO14Ql3u5dx6bNaBBMfGGbtWQccJf1Qww2w2zIK', '2024-06-04 13:56:46'),
(10, 'Md Sajjad Hossen.', 'sajjadkhan16473154@gmail.com', '$2y$10$Bjwrqcw9FZeQt3J61hFvF.kihkbt4vvDmDvfRTukVqicD/SXvV/yW', '2024-06-13 01:46:00'),
(11, 'rashed', 'rashed@gmail.com', '$2y$10$jvd.M1IfBn0/lu2UyEAoyuJ4m38iXKdzaDTOEbjL38/E3ICIb7v5O', '2024-06-15 00:35:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning_things`
--
ALTER TABLE `learning_things`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `requirement_desc`
--
ALTER TABLE `requirement_desc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `learning_things`
--
ALTER TABLE `learning_things`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requirement_desc`
--
ALTER TABLE `requirement_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `course_content_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `learning_things`
--
ALTER TABLE `learning_things`
  ADD CONSTRAINT `learning_things_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `requirement_desc`
--
ALTER TABLE `requirement_desc`
  ADD CONSTRAINT `requirement_desc_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
