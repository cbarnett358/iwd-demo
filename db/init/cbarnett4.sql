-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220331.b9ddf0b305
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2023 at 10:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbarnett4`
--

-- --------------------------------------------------------

--
-- Table structure for table `levelup__itemplace`
--

CREATE TABLE `levelup__itemplace` (
  `ItemPlaceID` int(10) UNSIGNED NOT NULL,
  `ItemID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Rating` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levelup__orders`
--

CREATE TABLE `levelup__orders` (
  `GameOrderID` int(10) UNSIGNED NOT NULL,
  `GameShopperID` varchar(5) DEFAULT NULL,
  `DatePurchased` datetime DEFAULT NULL,
  `DateShipped` datetime DEFAULT NULL,
  `OrderAddress` varchar(60) DEFAULT NULL,
  `OrderCity` varchar(15) DEFAULT NULL,
  `OrderZip` varchar(10) DEFAULT NULL,
  `OrderState` varchar(15) DEFAULT NULL,
  `CustomerName` varchar(40) DEFAULT NULL,
  `ItemID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `levelup__orders`
--

INSERT INTO `levelup__orders` (`GameOrderID`, `GameShopperID`, `DatePurchased`, `DateShipped`, `OrderAddress`, `OrderCity`, `OrderZip`, `OrderState`, `CustomerName`, `ItemID`) VALUES
(1, '1', '2022-04-06 02:20:17', '2022-04-09 02:20:17', '2350 Grass Valley Hwy', 'Auburn', '95603', 'California', 'Chris Barnett', 1),
(2, '2', '2022-05-09 07:21:57', '2022-05-10 07:21:57', '2541 Fittro Street', 'Harrison', '72601', 'Arkansas', 'Jenny Wilko', 2),
(3, '3', '2022-05-01 07:21:57', '2022-05-03 07:21:57', '1408 Andy Street', 'Huron', '57350', 'South Dakota', 'Justin Misko', 3),
(4, '4', '2022-04-15 07:24:33', '2022-04-18 07:24:33', '1976 West Fork Street', 'Helena', '44990', 'Montana', 'Brande Garry', 4),
(6, '6', '2022-05-04 07:24:33', '2022-05-07 07:24:33', '3360 Holly Street', 'Augusta', '30907', 'Georgia', 'Phillip Powell', 6),
(7, '7', '2022-04-07 07:24:33', '2022-04-11 07:24:33', '769 Shinn Avenue', 'East Brady', '16028', 'Pennsylvania', 'Margaret Howard', 7),
(8, '8', '2022-03-12 07:24:33', '2022-03-10 07:24:33', '1794 Henery Street', 'Andover', '67002', 'Kansas', 'Doris Alexander', 8),
(9, '5', '2022-02-16 07:42:01', '2022-02-17 07:42:01', '3591 Leisure Lane', 'Moorpark', '93021', 'California', 'Jennifer Roberts', 5);

-- --------------------------------------------------------

--
-- Table structure for table `levelup__products`
--

CREATE TABLE `levelup__products` (
  `ItemID` int(10) UNSIGNED NOT NULL,
  `ItemName` varchar(40) NOT NULL,
  `ItemPrice` decimal(10,2) DEFAULT 0.00,
  `ItemsInStock` smallint(3) NOT NULL,
  `ItemDescription` text NOT NULL,
  `ItemRating` tinyint(4) NOT NULL,
  `ItemsOnOrder` smallint(6) DEFAULT NULL,
  `ItemConsole` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `levelup__products`
--

INSERT INTO `levelup__products` (`ItemID`, `ItemName`, `ItemPrice`, `ItemsInStock`, `ItemDescription`, `ItemRating`, `ItemsOnOrder`, `ItemConsole`) VALUES
(1, 'Legend Of Zelda: Ocarina of Time', '39.99', 5, 'The Legend of Zelda: Ocarina of Time is a fantasy action-adventure game set in an expansive environment. The player controls the series protagonist Link from a third-person perspective in a three-dimensional world.', 5, 4, 'N64'),
(2, 'Pokémon  Red', '49.99', 20, 'While Red advances through Kanto, collecting Pokémon and defeating Gym Leaders to compete in the Pokémon League against the Elite Four, his rival Blue seems to be always one step ahead. The main conflict Red must face is Team Rocket, a group of criminals who want to steal Pokémon and related objects to cause trouble.', 5, 0, 'GBA'),
(3, 'Punch-Out!!', '29.99', 5, 'Punch-Out!!, originally titled Mike Tyson\'s Punch-Out!!, is a 1987 boxing sports video game developed and published by Nintendo for the Nintendo Entertainment System (NES). Part of the Punch-Out!! series, it is an adaptation of the 1983 arcade game of the same name and its 1984 sequel Super Punch-Out!!', 4, 1, 'NES'),
(4, 'Crash Bandicoot: The Wrath of Cortex', '24.99', 8, 'The Wrath of Cortex is a platform game in which the player controls Crash and Coco Bandicoot, who must gather 25 Crystals and defeat the main antagonists of the story: Doctor Neo Cortex, his new superweapon Crunch Bandicoot, and Crunch\'s power sources, the renegade Elementals.', 3, 3, 'GCN'),
(6, 'GoldenEye 007', '40.99', 13, 'GoldenEye 007 is a 1997 first-person shooter developed by Rare and published by Nintendo for the Nintendo 64. Based on the 1995 James Bond film GoldenEye, it features a single-player campaign in which the player controls Secret Intelligence Service agent James Bond through a series of levels to prevent a criminal syndicate from using a satellite weapon against London to cause a global financial meltdown. ', 5, 3, 'N64'),
(7, 'Metal Gear Solid', '34.99', 20, 'Metal Gear (Japanese: メタルギア, Hepburn: Metaru Gia) is a series of techno-thriller stealth games created by Hideo Kojima. Developed and published by Konami, the first game, Metal Gear, was released in 1987 for MSX home computers. The player often takes control of a special forces operative (usually Solid Snake or Big Boss), who is assigned the task of finding the titular superweapon \"Metal Gear\", a bipedal walking tank with the ability to launch nuclear weapons.\r\n\r\n', 4, 0, 'PS1'),
(8, 'Final Fantasy VII', '59.99', 12, 'The game\'s story follows Cloud Strife, a mercenary who joins an eco-terrorist organization to stop a world-controlling megacorporation from using the planet\'s life essence as an energy source. Events send Cloud and his allies in pursuit of Sephiroth, a former member of the corporation who seeks to destroy the planet. During the journey, Cloud builds close friendships with his party members, including Aerith Gainsborough, who holds the secret to saving their world.', 5, 0, 'PS1'),
(9, 'Halo: Combat Evolved', '10.99', 20, 'Halo: Combat Evolved is a first-person shooter (FPS) game in which players experience gameplay in a 3D environment almost entirely from a first-person view. The player can move around and look up, down, left, or right.[6] The game features vehicles, ranging from armored 4×4s and tanks to alien hovercraft and aircraft, many of which can be controlled by the player. The game switches to a third-person perspective during vehicle use for pilots and mounted gun operators; passengers maintain a first-person view.', 4, 10, 'XB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `levelup__itemplace`
--
ALTER TABLE `levelup__itemplace`
  ADD PRIMARY KEY (`ItemPlaceID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `levelup__orders`
--
ALTER TABLE `levelup__orders`
  ADD PRIMARY KEY (`GameOrderID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `levelup__products`
--
ALTER TABLE `levelup__products`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `ItemName` (`ItemName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `levelup__itemplace`
--
ALTER TABLE `levelup__itemplace`
  MODIFY `ItemPlaceID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levelup__orders`
--
ALTER TABLE `levelup__orders`
  MODIFY `GameOrderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `levelup__products`
--
ALTER TABLE `levelup__products`
  MODIFY `ItemID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
