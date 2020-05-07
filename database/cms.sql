-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: מאי 07, 2020 בזמן 11:18 AM
-- גרסת שרת: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(31, 'Javascript'),
(32, 'C#'),
(33, 'C');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_date`, `comment_author`, `comment_email`, `comment_content`, `comment_status`) VALUES
(39, 55, '2020-04-25', 'ayava2142', 'Chang@gmail.com', 'WOW', 'approved'),
(40, 58, '2020-04-25', 'ayava2142', 'Chang@gmail.com', 'C# IS 1', 'approved'),
(41, 55, '2020-04-25', 'Marshall', 'Kajetan@gmail.com', 'NOTBAD', 'approved'),
(42, 58, '2020-04-25', 'Marshall', 'Kajetan@gmail.com', 'NAH', 'approved'),
(43, 58, '2020-04-25', 'Forster', 'Forster@gmail.com', 'NICW', 'approved'),
(44, 55, '2020-04-25', 'shadi', 'shadibadria@gmail.com', 'صضثضصث', 'approved'),
(47, 55, '2020-05-02', 'shadi', 'shadibadria@gmail.com', '', 'pending'),
(48, 55, '2020-05-02', 'shadi', 'shadibadria@gmail.com', '', 'pending'),
(49, 55, '2020-05-02', 'shadi', 'shadibadria@gmail.com', '', 'pending'),
(50, 55, '2020-05-02', 'shadi', 'shadibadria@gmail.com', '', 'pending'),
(51, 55, '2020-05-02', 'shadi', 'shadibadria@gmail.com', '', 'pending'),
(52, 55, '2020-05-02', 'shadi', 'shadibadria@gmail.com', 'a', 'pending'),
(53, 55, '2020-05-02', 'shadi', 'shadibadria@gmail.com', '', 'pending');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` varchar(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `posts_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `posts_tags`, `post_comment_count`, `post_status`) VALUES
(55, '31', 'Javascript 2020', 'shadi', '2020-04-25', 'ferenc-almasi-L8KQIPCODV8-unsplash.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecaLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'javascript', 2, ''),
(58, '32', 'c#', 'shadi', '2020-04-25', 'ashkan-forouzani-zSy6SuVZXFo-unsplash.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'c#,Microsoft', 3, ''),
(59, '32', 'senior', 'shadi', '2020-05-01', 'mohammad-rezaie-prMpu-5zxwg-unsplash.jpg', '123', 'a,b,c,d,e', 0, ''),
(60, '33', 'senior', 'shadi', '2020-05-01', 'ferenc-almasi-L8KQIPCODV8-unsplash.jpg', '123', 'sad', 0, ''),
(61, '31', 'dsa', 'shadi', '2020-05-02', 'mohammad-rezaie-prMpu-5zxwg-unsplash.jpg', '123', 'a,b,c,d,e', 0, '');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randsalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `users`
--

INSERT INTO `users` (`user_id`, `user_password`, `user_username`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randsalt`) VALUES
(24, '$2y$10$LL6zsWUdYIjPN4uW7KNup.Em1mwebmAb7FpISXwXA2NEoNMyEfREC', 'admin', 'admin', 'aa', 'admin@gmail.com', '', 'admin', ''),
(25, '$2y$10$y4TsrKMOL/H/Psem6ko1OuOpL8u6qbMpU.JVmhIV.pPw00NyRIBlK', 'ayava2142', 'Alayna ', 'Chang', 'Chang@gmail.com', '', 'subscriber', ''),
(26, '$2y$10$vi3U6hf/gVIoRTUcDy9VCuVRqfPPd3FDcMA320v5F5jF4tQz8hLZq', 'Marshall', 'Kajetan', 'Marshall', 'Kajetan@gmail.com', '', 'subscriber', ''),
(27, '$2y$10$ViFpmOB0G5bGJ.61zIEI5e2nOMwz77SSIL9CtM2Y8xWtPANU9IMD6', 'Kavanagh', 'Victor ', 'Kavanagh', 'Kavanagh@gmail.com', '', 'subscriber', ''),
(28, '$2y$10$77Q/KuYgVigj8BSyisZHbeXySQG6mxzsHV4xiG9KGE0RzS/Wc7C1W', 'Forster', 'Jaden ', 'Forster', 'Forster@gmail.com', '', 'subscriber', ''),
(29, '$2y$10$w8KgvUUxYL.E.hD5b8hZeeMbAdWP6l6JFKnHaWSuGEE80Muh1n2Ri', 'Ferguson', 'Anushka', 'Ferguson', 'subscriber@gmail.com', '', 'subscriber', ''),
(30, '$2y$10$c76AwqKqsbo0MjDbF2xB2.su2/xgakW7s1HI2Kd3vZQz.eCIBnAdS', 'shadi badr', 'shadi', 'badria', 'shadi5@gmail.com', '', 'subscriber', '');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- אינדקסים לטבלה `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- אינדקסים לטבלה `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- אינדקסים לטבלה `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
