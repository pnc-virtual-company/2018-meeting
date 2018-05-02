-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 05:06 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pn_booking_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE `tbl_locations` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `place` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`loc_id`, `loc_name`, `description`, `place`) VALUES
(1, 'PNC', 'PNC Cambodia', 'Phnom Penh'),
(2, 'PNV', 'PNV Vietnam', 'VN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_positions`
--

CREATE TABLE `tbl_positions` (
  `pos_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_positions`
--

INSERT INTO `tbl_positions` (`pos_id`, `name`) VALUES
(1, 'Manager'),
(2, 'training'),
(3, 'education manager');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(45) NOT NULL,
  `floor` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`room_id`, `room_name`, `floor`, `description`, `status`, `loc_id`, `user_id`) VALUES
(1, 'B22', 2, 'Lab learning', 'Rejected', 1, 1),
(2, 'B21', 2, 'Lab SNA learning', 'Accepted', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_request`
--

CREATE TABLE `tbl_room_request` (
  `book_id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `sta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_room_request`
--

INSERT INTO `tbl_room_request` (`book_id`, `description`, `startDate`, `endDate`, `user_id`, `room_id`, `sta_id`) VALUES
(5, 'Workshop', '2018-05-09 07:00:00', '2018-05-10 07:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `sta_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`sta_id`, `status`) VALUES
(1, 'Rejected'),
(2, 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userpositions`
--

CREATE TABLE `tbl_userpositions` (
  `user_pos_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_userpositions`
--

INSERT INTO `tbl_userpositions` (`user_pos_id`, `user_id`, `pos_id`) VALUES
(1, 2, 2),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `firstname`, `lastname`, `email`, `user_password`, `gender`, `role_id`) VALUES
(1, 'Rady', 'Y', 'rady.y@passerellesnumeriques.org', '12345', 'male', 1),
(2, 'Channak', 'Chhon', 'channak.chhon@passerellesnumeriques.org', '123', 'female', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `fk_tbl_rooms_tbl_locations1_idx` (`loc_id`),
  ADD KEY `fk_tbl_rooms_tbl_users1_idx` (`user_id`);

--
-- Indexes for table `tbl_room_request`
--
ALTER TABLE `tbl_room_request`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_tbl_room_request_tbl_users1_idx` (`user_id`),
  ADD KEY `fk_tbl_room_request_tbl_rooms1_idx` (`room_id`),
  ADD KEY `fk_tbl_room_request_tbl_status1_idx` (`sta_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`sta_id`);

--
-- Indexes for table `tbl_userpositions`
--
ALTER TABLE `tbl_userpositions`
  ADD PRIMARY KEY (`user_pos_id`),
  ADD KEY `fk_tbl_users_has_tbl_positions_tbl_positions1_idx` (`pos_id`),
  ADD KEY `fk_tbl_users_has_tbl_positions_tbl_users1_idx` (`user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_tbl_users_tbl_roles1_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_room_request`
--
ALTER TABLE `tbl_room_request`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `sta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_userpositions`
--
ALTER TABLE `tbl_userpositions`
  MODIFY `user_pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD CONSTRAINT `fk_tbl_rooms_tbl_locations1` FOREIGN KEY (`loc_id`) REFERENCES `tbl_locations` (`loc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_rooms_tbl_users1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_room_request`
--
ALTER TABLE `tbl_room_request`
  ADD CONSTRAINT `fk_tbl_room_request_tbl_rooms1` FOREIGN KEY (`room_id`) REFERENCES `tbl_rooms` (`room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_room_request_tbl_status1` FOREIGN KEY (`sta_id`) REFERENCES `tbl_status` (`sta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_room_request_tbl_users1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_userpositions`
--
ALTER TABLE `tbl_userpositions`
  ADD CONSTRAINT `fk_tbl_users_has_tbl_positions_tbl_positions1` FOREIGN KEY (`pos_id`) REFERENCES `tbl_positions` (`pos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_users_has_tbl_positions_tbl_users1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `fk_tbl_users_tbl_roles1` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
