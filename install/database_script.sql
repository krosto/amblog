-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2020 at 08:55 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `slug`, `content`, `created_at`, `status`) VALUES
(1, 2, 'Post one', 'post_one', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent imperdiet nisi elit. Aenean sit amet posuere augue, at rutrum nisi. Vivamus semper tortor eget justo semper, sed pulvinar velit fringilla. Ut aliquam purus orci, a pharetra metus molestie eget. Sed at dui a turpis eleifend placerat. Aenean at diam in orci lobortis scelerisque. Nullam tellus justo, laoreet volutpat ante et, cursus vestibulum arcu. Proin sed est tincidunt, tincidunt justo ut, dapibus felis.', '2020-02-03 21:02:23', 1),
(2, 2, 'Post two', 'post_two', 'Nullam nunc mi, malesuada nec volutpat nec, ornare eget purus. Fusce mi velit, suscipit nec augue sed, ultricies tincidunt dui. Vivamus vulputate suscipit enim, ac faucibus nunc venenatis non. Sed eget tempus felis, non vulputate ligula. Donec in vehicula enim. Nam iaculis, neque ut gravida finibus, lectus leo euismod mauris, interdum ullamcorper est risus id elit. Curabitur at tortor id diam feugiat auctor pharetra maximus dui. Sed eu blandit mi. Cras non consequat nibh. Proin feugiat magna quam, ut tincidunt quam auctor non. Vestibulum consectetur, ipsum ac ornare interdum, urna est posuere ex, ac maximus diam lacus a elit.', '2020-02-03 21:12:23', 1),
(6, 2, 'Post six', 'post_six', 'Sed eu blandit mi. Cras non consequat nibh. Proin feugiat magna quam, ut tincidunt quam auctor non. Vestibulum consectetur, ipsum ac ornare interdum, urna est posuere ex, ac maximus diam lacus a elit. Curabitur at tortor id diam feugiat auctor pharetra maximus dui. ', '2020-02-04 02:22:21', 1),
(7, 2, 'Post seven re-edited', 'Post-seven-re-edited', 'Vestibulum consectetur, ipsum ac ornare interdum, urna est posuere ex, ac maximus diam lacus a elit.\r\nCurabitur at tortor id diam feugiat auctor pharetra maximus dui. Sed eu blandit mi. Cras non consequat nibh. Proin feugiat magna quam, ut tincidunt quam auctor non. Vestibulum consectetur, ipsum ac ornare interdum, urna est posuere ex, ac maximus diam lacus a elit.', '2020-02-04 02:35:17', 1),
(11, 4, 'Xavi\'s post re-edited', 'Xavis-post-re-edited', ' In at ex blandit, malesuada lacus malesuada, euismod sem. Maecenas tincidunt, urna efficitur auctor ultricies, libero diam aliquet mi, a ultricies odio sapien et odio. Nullam euismod gravida orci eu vehicula. Ut faucibus vitae erat eleifend posuere. Aenean justo nisl, tempus vel orci convallis, fringilla vulputate massa. Maecenas vehicula viverra purus ac lacinia. Pellentesque sit amet massa ac quam porttitor dignissim ac ut ipsum. Nunc vitae metus mauris. Sed tempor nisi a auctor molestie. Donec scelerisque enim felis, a varius tortor posuere id. Ut placerat dapibus arcu eu placerat. Fusce molestie diam in dui convallis, nec sagittis massa semper. Integer sed condimentum urna, non blandit mauris. Mauris ut magna nec enim condimentum auctor. Cras ligula orci, venenatis eget ornare vel, egestas vitae massa. ', '2020-02-05 00:44:36', 1),
(12, 4, 'Xavi\'s second post', 'Xavis-second-post', ' Vivamus finibus leo in pretium dictum. Quisque accumsan velit ultricies elit scelerisque, eget pulvinar nibh porttitor. Maecenas quis iaculis urna. Ut dapibus diam at urna fermentum venenatis vitae non neque. Nullam sit amet semper nisl, sed feugiat leo. Sed lorem metus, maximus ac nisi vel, tincidunt pharetra odio. Sed a efficitur orci, sed ornare libero. Sed non pretium ante, nec placerat arcu. Donec tincidunt ultricies nisi, finibus tincidunt est porttitor ut. ', '2020-02-05 03:49:27', 1),
(13, 2, 'Post eight', 'Post-eight', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent imperdiet nisi elit. Aenean sit amet posuere augue, at rutrum nisi. Vivamus semper tortor eget justo semper, sed pulvinar velit fringilla. Ut aliquam purus orci, a pharetra metus molestie eget. Sed at dui a turpis eleifend placerat. Aenean at diam in orci lobortis scelerisque. Nullam tellus justo, laoreet volutpat ante et, cursus vestibulum arcu. Proin sed est tincidunt, tincidunt justo ut, dapibus felis. ', '2020-02-05 04:22:11', 1),
(14, 4, 'Xavi\'s third post edited', 'Xavis-third-post-edited', ' Vivamus finibus leo in pretium dictum. Quisque accumsan velit ultricies elit scelerisque, eget pulvinar nibh porttitor. Maecenas quis iaculis urna. Ut dapibus diam at urna fermentum venenatis vitae non neque. Nullam sit amet semper nisl, sed feugiat leo. Sed lorem metus, maximus ac nisi vel, tincidunt pharetra odio. Sed a efficitur orci, sed ornare libero. Sed non pretium ante, nec placerat arcu. Donec tincidunt ultricies nisi, finibus tincidunt est porttitor ut. ', '2020-02-05 13:48:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `twits`
--

CREATE TABLE `twits` (
  `twit_id` int(11) NOT NULL,
  `assigned_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `twits`
--

INSERT INTO `twits` (`twit_id`, `assigned_id`, `status`) VALUES
(1, '20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `twitter`, `status`) VALUES
(2, 'John Paul Jones', 'JohnPaulJones', 'jpjones@hotmail.com', '$2y$10$0UEd0KnuL2HqyGELxCVs5OiDc6qnSbu.V60qSqh0lnurtJhQpgNZS', '@jpjones', 1),
(4, 'Xavier Paez', 'xepaez', 'xepaez@yahoo.com', '$2y$10$koyJiNFC.q4KlS31bpdQ5O6kIRGfiyVBwpWdp.wgz9AU1rbGex1Ym', '@xepaez', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `twits`
--
ALTER TABLE `twits`
  ADD PRIMARY KEY (`twit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `twits`
--
ALTER TABLE `twits`
  MODIFY `twit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
