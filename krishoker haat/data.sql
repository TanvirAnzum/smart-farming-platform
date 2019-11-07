-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 04:00 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `division` text NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `image_address` varchar(255) NOT NULL,
  `availability` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `title`, `description`, `price`, `location`, `division`, `phone_number`, `image_address`, `availability`, `user_id`) VALUES
(1, 'Solar Pump', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 50, 'masterpara,kotowali,nilphamari,rangpur', 'Rangpur', '01762865786', './images/equipments/1', 1, 1),
(2, 'Crop Cutter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 250, 'boro dorga,sadar,nilphamari,rangpur', 'Rangpur', '0187805179', './images/equipments/2', 1, 1),
(3, 'new equipment', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 122, 'lokkhir par,kotowali,rangpur,rangpur', 'Rangpur', '01762865786', './images/equipments/3', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `preservation_centers`
--

CREATE TABLE `preservation_centers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `contact` text NOT NULL,
  `website` text NOT NULL,
  `ob` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preservation_centers`
--

INSERT INTO `preservation_centers` (`id`, `name`, `location`, `description`, `contact`, `website`, `ob`) VALUES
(1, 'Jahanara Cold Storage', 'Suihari, Dinajpur sadar, Dinajpur.', 'All type of crops.\r\nRate: Negotiable\r\nOpening time: Everyday,24 hours', '+8801XXX XXXXXX', 'N/A', 0),
(2, 'Bangibecha Cold Storage', 'Dinajpur Sadar Upazila, Dinajpur 5100, Bangladesh', 'All type of crops\r\nRate: Negotiable\r\nOpening time: Every day, 24 hours', '+8801XXX XXXXXXX', 'Not available', 0),
(3, 'New Cold Storage ', 'Dinajpur sadar, Dinajpur', 'All type of crops.\r\nRate: Negotiable\r\nOpening time: Everyday,24 hours', '+8801XXX XXXXXX', 'www.newcoldstorage.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` varchar(20) NOT NULL,
  `price` text NOT NULL,
  `phone_number` text NOT NULL,
  `location` text NOT NULL,
  `negotiable` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `division` varchar(20) NOT NULL,
  `availability` int(11) NOT NULL,
  `image_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `phone_number`, `location`, `negotiable`, `category`, `division`, `availability`, `image_address`) VALUES
(1, 'Strawberry', 'Lorem ipsum dolor si', '400', '01762865786', 'ghashi para,sadar,dinajpur,rangpur', 'yes', '2', 'Rangpur', 1, './images/products/1'),
(2, 'Strawberry Seeds', 'Strawberry Seeds', '600', '01762865786', 'lokkhir par,sadar,lalmonirhat,rangpur', 'no', '3', 'Rangpur', 1, './images/products/2'),
(3, 'à¦•à§‹à§Ÿà§‡à¦²à§‡à¦° à¦¡à¦¿à¦®', 'à¦•à§‹à§Ÿà§‡à¦²à§‡à¦', 'à§ªà§¦', '01762865786', 'Chourasta,sadar,Gazipur,Dhaka', 'no', '4', 'Dhaka', 1, './images/products/3'),
(4, 'Mini tractor', 'Lorem ipsum dolor si', '12342', '01762865786', 'boro dorga,kotowali,rangpur,rangpur', 'yes', '1', 'Rangpur', 1, './images/products/4'),
(5, 'Ghee', 'Lorem ipsum dolor si', '250', '01762865786', 'ghashi para,sadar,dinajpur,rangpur', 'no', '4', 'Rangpur', 1, './images/products/5'),
(6, 'Tomato Plants ', 'Lorem ipsum dolor si', '560', '01762865786', 'Chourasta,sadar,lalmonirhat,rangpur', 'no', '3', 'Rangpur', 1, './images/products/6'),
(7, 'Capsicum', 'Lorem ipsum dolor si', '900', '01762865786', 'ghashi para,sadar,chottogram,Rajshahi', 'yes', '2', 'Rajshahi', 1, './images/products/7'),
(8, 'Maize', 'Lorem ipsum dolor si', '50', '01762865786', 'Chourasta,sadar,sylhet,Sylhet', 'yes', '2', 'Sylhet', 1, './images/products/8'),
(9, 'peas', 'Lorem ipsum dolor si', '100', '01762865786', 'masterpara,kotowali,khulna,Khulna', 'no', '2', 'Khulna', 1, './images/products/9'),
(10, 'Rice', 'Lorem ipsum dolor si', '45', '01762865786', 'boro dorga,kotowali,asd,5', 'no', '4', '', 1, './images/products/10'),
(11, 'test 2 ', 'Lorem ipsum dolor si', '12342', '1245', 'boro dorga,sadar,dinajpur,Rangpur', 'no', '3', 'Rangpur', 1, './images/products/11'),
(12, 'test 2 ', 'Lorem ipsum dolor si', '12342', '1245', 'boro dorga,sadar,dinajpur,Rangpur', 'no', '3', 'Rangpur', 1, './images/products/12'),
(13, 'Rice', 'Lorem ipsum dolor si', '45', '01762865786', 'boro dorga,kotowali,asd,Barishal', 'no', '4', 'Barishal', 1, './images/products/13');

-- --------------------------------------------------------

--
-- Table structure for table `qa`
--

CREATE TABLE `qa` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qa`
--

INSERT INTO `qa` (`id`, `question`, `answer`, `user_id`) VALUES
(1, 'first question here ?', 'Answer of the first question here.', 2),
(2, 'Second Question here ?', 'Answer of the second question here.', 0),
(3, 'asd', '', 0),
(4, 'hello', 'hunny bunny', 0),
(5, 'fgdfg', '', 0),
(6, 'asdasd', '', 0),
(7, 'asdas', '', 2),
(8, 'asd', '', 0),
(9, 'is this the real life? is this just fantasy ? ', 'no escape ', 9),
(10, 'any question 10? ', 'anser', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adminship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preservation_centers`
--
ALTER TABLE `preservation_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa`
--
ALTER TABLE `qa`
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
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `preservation_centers`
--
ALTER TABLE `preservation_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `qa`
--
ALTER TABLE `qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
