-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2026 at 06:22 AM
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
-- Database: `elearning_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `description`, `created_at`) VALUES
(1, 'HTML Basics', 'Learn HTML from beginner to advanced level.', '2026-10-03 12:27:24'),
(2, 'PHP Basics', 'Learn PHP from beginner to advanced level', '2026-10-03 12:43:32'),
(4, 'CSS Fundamentals', 'Learn how to style web pages using colors, fonts, spacing, layouts, and responsive design techniques.', '2026-10-06 16:16:13'),
(5, 'JavaScript Essentials', 'Learn the basics of JavaScript to create interactive and dynamic web pages.', '2026-10-06 16:34:48'),
(6, 'MySQL Database Basics', 'Learn database concepts and how to store, retrieve, update, and manage data using MySQL.', '2026-10-06 16:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `enrolled_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lesson_title` varchar(200) NOT NULL,
  `lesson_content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `course_id`, `lesson_title`, `lesson_content`, `created_at`) VALUES
(1, 2, 'Introduction to PHP', 'PHP is an open-source, interpreted, and object-oriented scripting language that can be executed at the server-side. It stands for Hypertext Preprocessor. PHP is well suited for web development. Therefore, it is used to develop web applications that executes on the server and generates the dynamic page.\r\n\r\nPHP was created by Rasmus Lerdorf in 1994 but appeared in the market in 1995. PHP 8.4.5 is the latest version of PHP, which was released on 13 March 2025. Some important points need to be noticed about PHP are as follows:\r\n\r\nPHP stands for Hypertext Preprocessor.\r\nIt is an interpreted language, i.e., there is no need for compilation.\r\nIt is faster than other scripting languages, for example, ASP and JSP.\r\nIt is a server-side scripting language, which is used to manage the dynamic content of the website.\r\nIt supports object-oriented programming.\r\nIt is an open-source scripting language.', '2026-10-03 12:46:39'),
(2, 1, 'Introduction to HTML', 'HTML stands for HyperText Markup Language. It is a standard markup language used to create and design web pages by structuring and organizing content on the web. It uses elements and tags to define headings, paragraphs, links, images, tables, forms, and other parts of a web page, allowing browsers to display content correctly. It forms the basic foundation of every website and works together with CSS for styling and JavaScript for interactivity.', '2026-10-06 16:09:59'),
(5, 1, 'HTML Elements and Tags', 'HTML tags are like keywords which defines that how web browser will format and display the content. With the help of tags, a web browser can distinguish between an HTML content and a simple content.An HTML document is composed of elements. These elements are responsible for creating web pages and defining content on that webpage. An element in HTML usually consists of a start tag <tag name>, a close tag </tag name>, and content inserted between them. Technically, an element is a collection of start tags, attributes, end tags, and content between them.', '2026-10-06 16:15:18'),
(6, 4, 'Introduction to CSS', 'CSS stands for Cascading style sheets. It describes to the user how to display HTML elements on the screen in a proper format. CSS is the language that is used to style HTML documents. In simple words, cascading style sheets are a language used to simplify the process of making a webpage.', '2026-10-06 16:16:55'),
(7, 4, 'Colors and Fonts', 'The color property in CSS is used to set the color of HTML elements. Typically, this property is used to set the background color or the font color of an element. CSS Font property is used to control the look of texts. By the use of CSS font property you can change the text size, color, style and more. You have already studied how to make text bold or underlined. Here, you will also know how to resize your font using percentage.', '2026-10-06 16:18:14'),
(8, 4, 'Box Model', 'A CSS box model is a compartment that includes numerous assets, such as edge, border, padding and material. It is used to develop the design and structure of a web page. It can be used as a set of tools to personalize the layout of different components. According to the CSS box model, the web browser supplies each element as a square prism.', '2026-10-06 16:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','student') DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `created_at`, `profile_image`) VALUES
(1, 'Admin', 'admin@elearning.com', 'admin#123', 'admin', '2026-10-03 11:38:30', NULL),
(2, 'Dia', 'dia123@gmail.com', 'dia#123', 'student', '2026-10-03 12:11:16', '1791036897_ham2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
