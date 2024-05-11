-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 04:28 AM
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
-- Database: `cycle_syncing_recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `type_ID` int(11) NOT NULL,
  `food_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`type_ID`, `food_type_name`) VALUES
(1, 'Grains'),
(2, 'Vegetables'),
(3, 'Fruit'),
(4, 'Legumes'),
(5, 'Nuts & Seeds'),
(6, 'Meat'),
(7, 'Seafood'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_ID` int(11) NOT NULL,
  `phase_ID` int(11) NOT NULL,
  `ingredient_name` text NOT NULL,
  `food_type_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_ID`, `phase_ID`, `ingredient_name`, `food_type_ID`) VALUES
(1, 1, 'Buckwheat (kasha)', 1),
(2, 1, 'Wild Rice', 1),
(3, 1, 'Beets', 2),
(4, 1, 'Burdock', 2),
(5, 1, 'Dulse', 2),
(6, 1, 'Hijiki', 2),
(7, 1, 'Kale', 2),
(8, 1, 'Kelp', 2),
(9, 1, 'Kombu', 2),
(10, 1, 'Mushrooms', 2),
(11, 1, 'Wakame', 2),
(12, 1, 'Water Chesnut', 2),
(13, 1, 'Blackberry', 3),
(14, 1, 'Blueberry', 3),
(15, 1, 'Concord Grapes', 3),
(16, 1, 'Watermelon', 3),
(17, 1, 'Adzuki Bean', 4),
(18, 1, 'Black Soybean', 4),
(19, 1, 'Black Turtle Bean', 4),
(20, 1, 'Kidney Bean', 4),
(21, 1, 'Chestnut', 5),
(22, 1, 'Flaxseeds', 5),
(23, 1, 'Pumpkin Seeds', 5),
(24, 1, 'Duck', 6),
(25, 1, 'Pork', 6),
(26, 1, 'Catfish', 7),
(27, 1, 'Clam', 7),
(28, 1, 'Crab', 7),
(29, 1, 'Lobster', 7),
(30, 1, 'Mussel', 7),
(31, 1, 'Octopus', 7),
(32, 1, 'Oyster', 7),
(33, 1, 'Sardine', 7),
(34, 1, 'Scallop', 7),
(35, 1, 'Squid', 7),
(36, 1, 'Bancha Tea', 8),
(37, 1, 'Decaf Coffee', 8),
(38, 1, 'Miso', 8),
(39, 1, 'Salt', 8),
(40, 1, 'Tamari', 8),
(41, 2, 'Barley', 1),
(42, 2, 'Oat', 1),
(43, 2, 'Rye', 1),
(44, 2, 'Wheat', 1),
(45, 2, 'Artichoke', 2),
(46, 2, 'Broccoli', 2),
(47, 2, 'Carrot', 2),
(48, 2, 'Lettuce', 2),
(49, 2, 'Parsley', 2),
(50, 2, 'Pea', 2),
(51, 2, 'Rhubarb', 2),
(52, 2, 'String Bean', 2),
(53, 2, 'Zucchini', 2),
(54, 2, 'Acocado', 3),
(55, 2, 'Grapefruit', 3),
(56, 2, 'Lemon', 3),
(57, 2, 'Lime', 3),
(58, 2, 'Orange', 3),
(59, 2, 'Plum', 3),
(60, 2, 'Pomegranate', 3),
(61, 2, 'Sour Cherry', 3),
(62, 2, 'Black-eyed Pea', 4),
(63, 2, 'Green Lentil', 4),
(64, 2, 'Lima Bean', 4),
(65, 2, 'Mung Bean', 4),
(66, 2, 'Split Pea', 4),
(67, 2, 'Brazil Nut', 5),
(68, 2, 'Cashew', 5),
(69, 2, 'Flaxseeds', 5),
(70, 2, 'Lychee', 5),
(71, 2, 'Pumpkin Seeds', 5),
(72, 2, 'Chicken', 6),
(73, 2, 'Eggs', 6),
(74, 2, 'Fresh-water Clam', 7),
(75, 2, 'Soft-shell Crab', 7),
(76, 2, 'Trout', 7),
(77, 2, 'Nut Butter', 8),
(78, 2, 'Olives', 8),
(79, 2, 'Pickles', 8),
(80, 2, 'Sauerkraut', 8),
(81, 2, 'Vinegar', 8),
(82, 3, 'Amaranth', 1),
(83, 3, 'Corn', 1),
(84, 3, 'Quinoa', 1),
(85, 3, 'Asparagus', 2),
(86, 3, 'Bell Pepper', 2),
(87, 3, 'Brussel Sprouts', 2),
(88, 3, 'Chard', 2),
(89, 3, 'Chicory', 2),
(90, 3, 'Chive', 2),
(91, 3, 'Dandelion', 2),
(92, 3, 'Eggplant', 2),
(93, 3, 'Endive', 2),
(94, 3, 'Escarole', 2),
(95, 3, 'Okra', 2),
(96, 3, 'Scallion', 2),
(97, 3, 'Spinach', 2),
(98, 3, 'Tomato', 2),
(99, 3, 'Apricot', 3),
(100, 3, 'Cantaloupe', 3),
(101, 3, 'Coconut', 3),
(102, 3, 'Fig', 3),
(103, 3, 'Guava', 3),
(104, 3, 'Persimmon', 3),
(105, 3, 'Raspberry', 3),
(106, 3, 'Strawberry', 3),
(107, 3, 'Red Lentil', 4),
(108, 3, 'Almond', 5),
(109, 3, 'Flaxseeds', 5),
(110, 3, 'Pecan', 5),
(111, 3, 'Pistachio', 5),
(112, 3, 'Pumpkin Seeds', 5),
(113, 3, 'Lamb', 6),
(114, 3, 'Salmon', 7),
(115, 3, 'Shrimp', 7),
(116, 3, 'Tuna', 7),
(117, 3, 'Moderate Alcohol', 8),
(118, 3, 'Chocolate', 8),
(119, 3, 'Coffee', 8),
(120, 3, 'Ketchup', 8),
(121, 3, 'Tumeric', 8),
(122, 4, 'Brown Rice', 1),
(123, 4, 'Millet', 1),
(124, 4, 'Cabbage', 2),
(125, 4, 'Cauliflower', 2),
(126, 4, 'Celery', 2),
(127, 4, 'Collard', 2),
(128, 4, 'Cucumber', 2),
(129, 4, 'Daikon', 2),
(130, 4, 'Garlic', 2),
(131, 4, 'Ginger', 2),
(132, 4, 'Leek', 2),
(133, 4, 'Mustard Greens', 2),
(134, 4, 'Onion', 2),
(135, 4, 'Parsnip', 2),
(136, 4, 'Pumpkin', 2),
(137, 4, 'Radish', 2),
(138, 4, 'Squash', 2),
(139, 4, 'Sweet Potato', 2),
(140, 4, 'Watercress', 2),
(141, 4, 'Apple', 3),
(142, 4, 'Date', 3),
(143, 4, 'Peach', 3),
(144, 4, 'Pear', 3),
(145, 4, 'Raisin', 3),
(146, 4, 'Banana', 3),
(147, 4, 'Pineapple', 3),
(148, 4, 'Mango', 3),
(149, 4, 'Chickpea', 4),
(150, 4, 'Great Northern Bean', 4),
(151, 4, 'Navy Bean', 4),
(152, 4, 'Soybeans', 4),
(153, 4, 'Hickory', 5),
(154, 4, 'Pine Nut', 5),
(155, 4, 'Sesame Seeds', 5),
(156, 4, 'Sunflower Seeds', 5),
(157, 4, 'Walnuts', 5),
(158, 4, 'Beef', 6),
(159, 4, 'Turkey', 6),
(160, 4, 'Cod', 7),
(161, 4, 'Flounder', 7),
(162, 4, 'Halibut', 7),
(163, 4, 'Mint', 8),
(164, 4, 'Peppermint', 8),
(165, 4, 'Spirulina', 8),
(166, 5, 'Chia', 5),
(167, 5, 'Hemp', 5),
(168, 5, 'Flax', 5),
(169, 5, 'Protein Powders', 8),
(170, 5, 'Superfoods', 8),
(171, 5, 'Vegan Protein Alternatives', 8);

-- --------------------------------------------------------

--
-- Table structure for table `meal_type`
--

CREATE TABLE `meal_type` (
  `meal_typeID` int(11) NOT NULL,
  `meal_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_type`
--

INSERT INTO `meal_type` (`meal_typeID`, `meal_type`) VALUES
(1, 'Breakfast'),
(2, 'Lunch/Dinner'),
(3, 'Dessert'),
(4, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE `phases` (
  `phaseID` int(11) NOT NULL,
  `phase_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`phaseID`, `phase_name`) VALUES
(1, 'Menstrual'),
(2, 'Follicular'),
(3, 'Ovulatory'),
(4, 'Luteal'),
(5, 'Any Phase');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_ID` int(11) NOT NULL,
  `phase_ID` int(11) NOT NULL,
  `recipe_name` text NOT NULL,
  `recipe_link` text NOT NULL,
  `ingredients` text NOT NULL DEFAULT 'not sure yet',
  `calories` int(11) DEFAULT NULL,
  `protein` int(11) DEFAULT NULL,
  `carbs` int(11) DEFAULT NULL,
  `fat` int(11) DEFAULT NULL,
  `fiber` int(11) DEFAULT NULL,
  `net_carbs` int(11) DEFAULT NULL,
  `meal_type_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_ID`, `phase_ID`, `recipe_name`, `recipe_link`, `ingredients`, `calories`, `protein`, `carbs`, `fat`, `fiber`, `net_carbs`, `meal_type_ID`) VALUES
(1, 3, 'Dark Chocolate Strawberry Fudge Smoothie Bowl Recipe', 'https://sofreshnsogreen.com/recipes/fertility-boosting-smoothie/', 'not sure yet', 770, 48, 77, 35, 22, 55, 1),
(2, 2, 'Greek Chicken Quinoa Salad Bowls', 'https://sofreshnsogreen.com/recipes/greek-chicken-quinoa-salad-bowls/', 'not sure yet', 508, 26, 24, 34, 4, 20, 2),
(3, 1, 'Gluten-Free Pumpkin Chocolate Chip Bread', 'https://sofreshnsogreen.com/recipes/gluten-free-pumpkin-chocolate-chip-bread/', 'not sure yet', 183, 3, 22, 9, 4, 18, 3),
(4, 4, 'Gut-Friendly Instant Pot BBQ Chicken Stuffed Sweet Potatoes', 'https://sofreshnsogreen.com/recipes/bbq-chicken-stuffed-sweet-potatoes/', 'not sure yet', 620, 36, 86, 16, 8, 78, 2),
(5, 5, 'Creamy Lemonade Adrenal Mocktail', 'https://sofreshnsogreen.com/recipes/beverages/creamy-lemonade-adrenal-cocktail/', 'not sure yet', 256, 1, 16, 22, 1, 15, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`type_ID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_ID`),
  ADD KEY `phase_ID` (`phase_ID`),
  ADD KEY `food_type_ID` (`food_type_ID`);

--
-- Indexes for table `meal_type`
--
ALTER TABLE `meal_type`
  ADD PRIMARY KEY (`meal_typeID`);

--
-- Indexes for table `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`phaseID`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_ID`),
  ADD KEY `phase_ID` (`phase_ID`),
  ADD KEY `meal_type_ID` (`meal_type_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`phase_ID`) REFERENCES `phases` (`phaseID`),
  ADD CONSTRAINT `ingredients_ibfk_2` FOREIGN KEY (`food_type_ID`) REFERENCES `food_type` (`type_ID`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`phase_ID`) REFERENCES `phases` (`phaseID`),
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`meal_type_ID`) REFERENCES `meal_type` (`meal_typeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
