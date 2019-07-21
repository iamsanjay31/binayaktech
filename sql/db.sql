-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 02:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `binayaktech`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(250) NOT NULL,
  `client_detail` text NOT NULL,
  `client_image` varchar(250) NOT NULL,
  `client_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_detail`, `client_image`, `client_url`) VALUES
(1, 'Tip Top ', 'Just test', '19010902353502.png', 'http://allure.com'),
(3, 'Tip Top 1', 'Just test 2', '19010902354503.png', 'http://allure.com'),
(4, 'Test 2', 'Test 2', '19010902360206.png', 'http://allure.com'),
(5, 'Gorkha Brewery Intranet', 'sad', '19010902361405.png', 'http://allure.com'),
(6, 'Gorkha Brewery Intranet', 'sad', '19010902363404.png', 'http://allure.com'),
(7, 'last one', 'last one', '19010902364701.png', 'http://allure.com');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_caption` varchar(250) NOT NULL,
  `gallery_image` varchar(250) NOT NULL,
  `gallery_detail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_caption`, `gallery_image`, `gallery_detail`) VALUES
(1, 'Your Idea Our Methods', '19010802543902.jpg', 'Your Idea Our Methods'),
(2, 'We build Solutions', '19010802540901.jpg', 'Your Idea Our Methods'),
(3, 'The best IT Company in town', '19010802545703.jpg', 'Your Idea Our Methods');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` int(11) NOT NULL,
  `pages_name` varchar(250) NOT NULL,
  `pages_image` varchar(250) NOT NULL,
  `pages_content` text NOT NULL,
  `pages_link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `pages_name`, `pages_image`, `pages_content`, `pages_link`) VALUES
(2, 'About Us', '19011303010701.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et tincidunt nisi. Suspendisse pulvinar lorem in ipsum suscipit dictum. Nunc nec tellus lacus. In sed lectus mattis, sodales orci et, tristique orci. Ut quis sodales est. Integer id odio ullamcorper, tincidunt sem non, iaculis purus. In ipsum massa, porta quis nisl eleifend, euismod tincidunt ipsum. Integer sit amet lacus nec lorem malesuada iaculis id sit amet lorem.\r\n\r\nSed iaculis pulvinar varius. Vestibulum egestas nunc enim, eget rutrum turpis pulvinar ac. Pellentesque mattis, augue quis bibendum convallis, arcu orci viverra quam, sed consequat sem tellus a augue. Curabitur quis ligula bibendum, dictum erat a, dictum magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam hendrerit venenatis sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris vehicula faucibus eros a commodo. Cras quis nunc nibh. Quisque non vestibulum lectus. Nam dictum ipsum non velit hendrerit bibendum. Sed porta massa in mi tincidunt, sit amet auctor est aliquam. Vivamus tincidunt at mauris non gravida.', 'kings.edu.np'),
(3, 'Services', '19011303012501.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et tincidunt nisi. Suspendisse pulvinar lorem in ipsum suscipit dictum. Nunc nec tellus lacus. In sed lectus mattis, sodales orci et, tristique orci. Ut quis sodales est. Integer id odio ullamcorper, tincidunt sem non, iaculis purus. In ipsum massa, porta quis nisl eleifend, euismod tincidunt ipsum. Integer sit amet lacus nec lorem malesuada iaculis id sit amet lorem.\r\n\r\nSed iaculis pulvinar varius. Vestibulum egestas nunc enim, eget rutrum turpis pulvinar ac. Pellentesque mattis, augue quis bibendum convallis, arcu orci viverra quam, sed consequat sem tellus a augue. Curabitur quis ligula bibendum, dictum erat a, dictum magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam hendrerit venenatis sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris vehicula faucibus eros a commodo. Cras quis nunc nibh. Quisque non vestibulum lectus. Nam dictum ipsum non velit hendrerit bibendum. Sed porta massa in mi tincidunt, sit amet auctor est aliquam. Vivamus tincidunt at mauris non gravida.', 'http://nirmancloud.com/');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `portfolio_name` varchar(250) DEFAULT NULL,
  `portfolio_image` varchar(250) DEFAULT NULL,
  `portfolio_detail` text,
  `portfolio_link` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_name`, `portfolio_image`, `portfolio_detail`, `portfolio_link`) VALUES
(7, 'Gorkha Brewery App', '19010902495601.jpg', 'Gorkha Brewery App', 'http://gorkhabrewery2.com'),
(8, 'Kings MIS', '19010902500402.jpg', 'Kings MIS', 'http://kings.edu.np'),
(9, 'Future World', '19010902502703.jpg', 'Future World', 'http://futureworld.com'),
(10, 'Access Himalaya', '19010902503701.jpg', 'Access Himalaya', 'http://accesshimalaya.com'),
(11, 'KSL MIS', '19010902504603.jpg', 'KSL MIS', 'http://ksl.edu.np'),
(12, 'Redmi Note 5', '19011302305601.jpg', 'asd', 'http://futureworld.com'),
(13, 'Redmi Note 5', '', 'asd', 'http://futureworld.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `product_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_details`) VALUES
(2, 'Construction Management System', '19010902222901.jpg', ' Best Building Management Software of 2019'),
(3, 'Courier Management System', '19010902231102.jpg', ' Best System For Supply Chain Management'),
(5, 'Grocery Management System', '19010902285303.jpg', ' Best System for grocery stores in Nepal');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(250) NOT NULL,
  `staff_designation` varchar(250) NOT NULL,
  `staff_image` varchar(250) NOT NULL,
  `linkedin_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `staff_name`, `staff_designation`, `staff_image`, `linkedin_url`) VALUES
(1, 'Sandip Chaudary', 'Web Designer', '19011102355202.jpg', 'http://facebook.com/sondip'),
(2, 'Carla Jones', 'Web Developer', '19011102362901.jpg', 'http://localhost/kslnew/program/llm'),
(3, 'Mary Mcdale', 'Quality Assurance Officer', '19011102365903.jpg', 'http://localhost/kslnew/program/ba-llb');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `testimonial_title` varchar(250) NOT NULL,
  `testimonial_desc` text NOT NULL,
  `testimonial_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `testimonial_title`, `testimonial_desc`, `testimonial_by`) VALUES
(1, 'A very good companys', 'A very good company to work withs', 'Gorkha Brewerys'),
(2, 'Excellent Service Provided by Binayaktech and Team', 'Excellent Service Provided by Binayaktech and Team', 'Kings College');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
