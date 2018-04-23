-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 10:27 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcih`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `assignmentname` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `assignment_file` varchar(255) NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `assignmentname`, `deadline`, `assignment_file`, `instructor_id`) VALUES
(5, 'Assignment 1', '04-05-2018', 'uploads/assignments/Assignment 1.png', 2),
(10, 'Assignment 2', '26-04-2018', 'uploads/assignments/Assignment 2.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `instructorname` varchar(255) NOT NULL,
  `instructoremail` varchar(255) NOT NULL,
  `instructorpassword` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `instructorname`, `instructoremail`, `instructorpassword`, `userid`) VALUES
(2, 'Hazem Khaled', 'hazem@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 15),
(3, 'Mohamed Ahmed', 'mohamed@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 18),
(4, 'Enas Ahmed', 'enas@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 19),
(5, 'Mourad Mohamed', 'mourad@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 20),
(6, 'Yasser Abdelhamed ', 'yaseer@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 21),
(7, 'Mahmoud Anas', 'mahmoud@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 22),
(8, 'Mai Sameh ', 'mai@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 23),
(9, 'Yara El-said', 'yara@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 24),
(10, 'Asmahan Ahmed', 'asma@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 25),
(11, 'Doha Mohamed', 'doha@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 26);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `subject_id`, `grade`, `status`) VALUES
(18, 8, 2, 20, 'Failed'),
(19, 9, 3, 50, 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `stagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `stagename`) VALUES
(1, 'Level One'),
(2, 'Level Two'),
(3, 'Level Three'),
(4, 'Level Four');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `studentemail` varchar(255) NOT NULL,
  `studentpassword` varchar(255) NOT NULL,
  `studentphone` varchar(255) NOT NULL,
  `studentstage` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentname`, `studentemail`, `studentpassword`, `studentphone`, `studentstage`, `userid`) VALUES
(8, 'Sawy mohamed', 'sawy@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0110123456', 1, 14),
(9, 'Mirna Mohamed ', 'mirna@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '01123456789', 1, 17),
(10, 'Ahmed Abdelrhman ', 'ahmed_abd@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0100234567', 2, 27),
(11, 'Asmaa Sliem ', 'asmaa@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0123456789', 2, 28),
(12, 'Bassant Hussien', 'bassant@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0101234567', 3, 29),
(13, 'Omar Ahmed ', 'omar@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0100346790', 3, 30),
(14, 'Bassem Hassan ', 'bassem@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0100098766', 4, 31),
(15, 'Salah Mohamed ', 'salah@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0198765432', 4, 32);

-- --------------------------------------------------------

--
-- Table structure for table `students_subjects`
--

CREATE TABLE `students_subjects` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `pay_or_not` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_subjects`
--

INSERT INTO `students_subjects` (`id`, `student_id`, `subject_id`, `pay_or_not`) VALUES
(9, 8, 2, 0),
(10, 8, 2, 0),
(11, 8, 3, 0),
(12, 8, 4, 0),
(13, 9, 2, 0),
(14, 9, 5, 0),
(15, 9, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subjectname` varchar(255) NOT NULL,
  `subjectmingrade` double NOT NULL,
  `subjectmaxgrade` double NOT NULL,
  `subjectprice` decimal(10,0) NOT NULL,
  `maxstudents` int(11) NOT NULL,
  `instructor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectname`, `subjectmingrade`, `subjectmaxgrade`, `subjectprice`, `maxstudents`, `instructor`) VALUES
(2, 'programming language -1', 50, 100, '300', 100, 2),
(3, 'Algorithms', 50, 100, '300', 100, 2),
(4, ' Internet Technology', 50, 100, '300', 100, 3),
(5, ' Computer Networks – 1 ', 50, 100, '300', 100, 3),
(6, 'Mathematics – 1', 50, 100, '200', 100, 4),
(7, 'Mathematics – 2', 50, 100, '200', 100, 4),
(8, 'Database Systems 1', 50, 100, '300', 100, 5),
(9, 'Logic Design', 50, 100, '300', 100, 5),
(10, 'English 1', 50, 100, '200', 100, 6),
(11, ' Operations Research ', 50, 100, '300', 100, 6),
(12, 'Software Engineering – 1', 50, 100, '300', 100, 7),
(13, 'Operating Systems – 1', 50, 100, '300', 100, 7),
(14, 'Data Structures', 50, 100, '300', 100, 8),
(15, 'Introduction to Computers', 50, 100, '300', 100, 8),
(16, 'Human Rights', 50, 100, '200', 100, 9),
(17, ' Communication & Negotiation Skills', 50, 100, '300', 100, 9),
(18, 'Signals and Systems', 50, 100, '300', 100, 10),
(19, 'Project Management', 50, 100, '300', 100, 10),
(20, 'Simulation Languages', 50, 100, '300', 100, 11),
(21, 'Computer Maintenance', 50, 100, '300', 100, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(11) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `emailaddress`, `password`, `usertype`, `auth_key`, `password_reset_token`) VALUES
(14, 'sawy@fcih.com', 'sawy', 'sawy@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '', ''),
(15, 'hazem@fcih.com', 'hazem', 'hazem@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', ''),
(16, 'ahmed@fcih.com', 'ahmed', 'ahmed@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '', ''),
(17, 'mirna@fcih.com', 'mirna', 'mirna@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '', ''),
(18, 'mohamed@fcih.com', 'Mohamed', 'mohamed@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', ''),
(19, 'enas@fcih.com', 'Enas Ahmed', 'enas@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', ''),
(20, 'mourad@fcih.com', 'Mourad Mohamed', 'mourad@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', ''),
(21, 'yaseer@fcih.com', 'Yasser Abdelhamed ', 'yaseer@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', ''),
(22, 'mahmoud', 'Mahmoud Anas', 'mahmoud', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', ''),
(23, 'mai@fcih.com', 'Mai Sameh ', 'mai@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', ''),
(24, 'yara@fcih.com', 'Yara El-said', 'yara@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', ''),
(25, 'asma@fcih.com', 'Asmahan Ahmed', 'asma@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', ''),
(26, 'doha@fcih.com', 'Doha Mohamed', 'doha@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '', ''),
(27, 'ahmed_abd@fcih.com', 'Ahmed Abdelrhman ', 'ahmed_abd@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '', ''),
(28, 'asmaa@fcih.com', 'Asmaa Sliem ', 'asmaa@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '', ''),
(29, 'bassant@fcih.com', 'Bassant Hussien', 'bassant@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '', ''),
(30, 'omar@fcih.com', 'Omar Ahmed ', 'omar@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '', ''),
(31, 'bassem@fcih.com', 'Bassem Hassan ', 'bassem@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '', ''),
(32, 'salah@fcih.com', 'Salah Mohamed ', 'salah@fcih.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL,
  `usertypename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `usertypename`) VALUES
(1, 'Admin'),
(2, 'Student'),
(3, 'Instructor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asinstructor` (`instructor_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userinstructorid` (`userid`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentgrade` (`student_id`),
  ADD KEY `subjectgrade` (`subject_id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stagefk` (`studentstage`),
  ADD KEY `userstudentid` (`userid`);

--
-- Indexes for table `students_subjects`
--
ALTER TABLE `students_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentfk` (`student_id`),
  ADD KEY `subjectfk` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sbinstructor` (`instructor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertypefk` (`usertype`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students_subjects`
--
ALTER TABLE `students_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `asinstructor` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `userinstructorid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `studentgrade` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectgrade` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `stagefk` FOREIGN KEY (`studentstage`) REFERENCES `stages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userstudentid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_subjects`
--
ALTER TABLE `students_subjects`
  ADD CONSTRAINT `studentfk` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectfk` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `sbinstructor` FOREIGN KEY (`instructor`) REFERENCES `instructors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `usertypefk` FOREIGN KEY (`usertype`) REFERENCES `usertypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
