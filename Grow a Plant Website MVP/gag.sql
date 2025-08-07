-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2025 at 11:51 PM
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
-- Database: `gag`
--

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `id` int(11) NOT NULL,
  `date_entry_added` date DEFAULT NULL,
  `entry_content` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `plant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`id`, `date_entry_added`, `entry_content`, `username`, `plant_id`) VALUES
(1, '2025-07-08', 'first', '202310103', NULL),
(2, '2025-07-08', 'first', '202310103', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `growthstage`
--

CREATE TABLE `growthstage` (
  `id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `stage_no` int(11) NOT NULL,
  `stage_name` varchar(100) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `days_required` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `growthstage`
--

INSERT INTO `growthstage` (`id`, `plant_id`, `stage_no`, `stage_name`, `image_url`, `description`, `days_required`) VALUES
(1, 1, 1, 'Bud', 'Assets/tomato/tomatoStage1.png', 'Grow up soon, little one!', 0),
(2, 1, 2, 'Plantling', 'Assets/tomato/tomatoStage2.png', 'Getting there!', 56),
(3, 1, 3, 'Fully Grown', 'Assets/tomato/tomatoStage3.png', 'Fully grown!', 85),
(4, 2, 1, 'Bud', 'Assets/pechay/pechayStage1.png', 'You’re off to a great start!', 0),
(5, 2, 2, 'Plantling', 'Assets/pechay/pechayStage2.png', 'Almost ready for harvest.', 20),
(6, 2, 3, 'Fully Grown', 'Assets/pechay/pechayStage3.png', 'Pechay is ready to be picked!', 30),
(7, 3, 1, 'Bud', 'Assets/eggplant/eggplantStage1.png', 'Just a tiny sprout!', 0),
(8, 3, 2, 'Plantling', 'Assets/eggplant/eggplantStage2.png', 'Looking healthy and strong!', 66),
(9, 3, 3, 'Fully Grown', 'Assets/eggplant/eggplantStage3.png', 'Eggplant is fully grown!', 100),
(10, 4, 1, 'Bud', 'Assets/garlic/garlicStage1.png', 'A little bulb begins to grow.', 0),
(11, 4, 2, 'Plantling', 'Assets/garlic/garlicStage2.png', 'Garlic is growing strong.', 100),
(12, 4, 3, 'Fully Grown', 'Assets/garlic/garlicStage3.png', 'Garlic is ready for harvest!', 150),
(13, 5, 1, 'Bud', 'Assets/potato/potatoStage1.png', 'A small sprout peeks out.', 0),
(14, 5, 2, 'Plantling', 'Assets/potato/potatoStage2.png', 'The plant is growing well.', 60),
(15, 5, 3, 'Fully Grown', 'Assets/potato/potatoStage3.png', 'Potatoes are ready!', 90),
(16, 6, 1, 'Bud', 'Assets/sunflower/sunflowerStage1.png', 'Starting to reach for the sun.', 0),
(17, 6, 2, 'Plantling', 'Assets/sunflower/sunflowerStage2.png', 'Growing tall and strong!', 54),
(18, 6, 3, 'Fully Grown', 'Assets/sunflower/sunflowerStage3.png', 'Sunflower is blooming beautifully!', 80);

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `common_name` varchar(100) NOT NULL,
  `latin_name` varchar(100) DEFAULT NULL,
  `water_frequency` int(11) DEFAULT NULL,
  `general_info` text DEFAULT NULL,
  `season` varchar(50) DEFAULT NULL,
  `growth_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `common_name`, `latin_name`, `water_frequency`, `general_info`, `season`, `growth_time`) VALUES
(1, 'Tomato', 'Solanum lycopersicum', 3, 'Tomatoes are a popular fruit that are used in many dishes. They are rich in vitamins and antioxidants.', 'Summer', 85),
(2, 'Pechay', 'Brassica rapa subsp. chinensis', 6, 'Pechay, also known as bok choy, is a leafy green vegetable that grows quickly and is widely used in Asian cuisine.', 'Cool', 30),
(3, 'Eggplant', 'Solanum melongena', 3, 'Eggplants are glossy purple vegetables that thrive in warm climates and are used in a variety of dishes worldwide.', 'Summer', 100),
(4, 'Garlic', 'Allium sativum', 2, 'Garlic is a bulbous plant known for its strong flavor and medicinal properties. It grows best in cooler seasons.', 'Fall', 150),
(5, 'Potato', 'Solanum tuberosum', 3, 'Potatoes are starchy tubers that are one of the world’s most important food crops, adaptable to various climates.', 'Spring', 90),
(6, 'Sunflower', 'Helianthus annuus', 3, 'Sunflowers are tall, bright plants known for following the sun. They produce edible seeds and oil.', 'Summer', 80);

-- --------------------------------------------------------

--
-- Table structure for table `statusmessage`
--

CREATE TABLE `statusmessage` (
  `current_status` enum('Healthy','Dry','Overwatered','Rotting') NOT NULL,
  `date_entry_added` date DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusmessage`
--

INSERT INTO `statusmessage` (`current_status`, `date_entry_added`, `message`) VALUES
('Healthy', '2025-07-09', 'Based on previous records, your plant is thriving! Its really living its best life in here with you. Why not give yourself a pat on the back for doing such a good job? You deserve it, king.'),
('Dry', '2025-07-09', 'Oh no, your plant looks a little thirsty. I think its time to switch to the weather channel and pray for a rain forecast! Why dont you help this poor little guy out and give it some nice, alkaline water?'),
('Overwatered', '2025-07-09', 'Your plant looks soaked! Did it go out to play in the rain? I would suggest wiping it dry with a towel but thats a plant, not your kid. That would be kind of weird. Dont water it for a day or two and things should be okay!'),
('Rotting', '2025-07-09', 'Oh no, little planty plant here is rotting. You should ampuate-I mean, perform emergency surgery on your plant and remove all rotting parts!');

-- --------------------------------------------------------

--
-- Table structure for table `userplants`
--

CREATE TABLE `userplants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `date_added` date DEFAULT curdate(),
  `last_watered` date DEFAULT NULL,
  `status` enum('Healthy','Dry','Overwatered','Rotting') DEFAULT 'Healthy',
  `current_stage` int(11) DEFAULT 1,
  `nickname` varchar(50) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT 'assets/defaultPlant.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userplants`
--

INSERT INTO `userplants` (`id`, `user_id`, `plant_id`, `date_added`, `last_watered`, `status`, `current_stage`, `nickname`, `image_path`) VALUES
(8, 1, 3, '2025-07-09', '2025-07-09', 'Healthy', 1, 'eggy', 'assets/eggplant/eggplantStage1.png'),
(9, 1, 4, '2025-07-09', '2025-07-09', 'Healthy', 1, 'gary', 'assets/garlic/garlicStage1.png'),
(10, 1, 1, '2025-07-09', '2025-07-09', 'Healthy', 1, 'tomatomatoma', 'assets/tomato/tomatoStage1.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `last_login` datetime DEFAULT current_timestamp(),
  `account_progress` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`user_id`, `username`, `last_login`, `account_progress`) VALUES
(1, '202310103', '2025-07-10 00:48:58', NULL),
(2, 'aalbert15', '2025-07-09 05:29:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `growthstage`
--
ALTER TABLE `growthstage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `common_name` (`common_name`);

--
-- Indexes for table `statusmessage`
--
ALTER TABLE `statusmessage`
  ADD PRIMARY KEY (`current_status`);

--
-- Indexes for table `userplants`
--
ALTER TABLE `userplants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `growthstage`
--
ALTER TABLE `growthstage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userplants`
--
ALTER TABLE `userplants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `growthstage`
--
ALTER TABLE `growthstage`
  ADD CONSTRAINT `growthstage_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userplants`
--
ALTER TABLE `userplants`
  ADD CONSTRAINT `userplants_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
