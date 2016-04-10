-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2016 at 09:33 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `productName` varchar(50) DEFAULT NULL,
  `productDescription` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `calories` smallint(6) DEFAULT NULL,
  `productTypeId` tinyint(4) DEFAULT NULL,
  `healthy` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `productName`, `productDescription`, `price`, `calories`, `productTypeId`, `healthy`) VALUES
(1, 'Pan con leche', 'Bread with milk', '4.00', 50, 1, 0),
(2, 'Eggs and Sausages', 'Over easy eggs with grilled sausages', '12.50', 456, 1, 1),
(3, 'Sweet oatmeal', 'Oatmeal with raisins, apples, and chocolate chips', '7.80', 200, 1, 1),
(4, 'Pancakes', 'Pancakes served with syrup', '10.67', 890, 1, 0),
(5, 'Ham Sandwich', 'Grilled sandwhich with cheese and ham', '13.80', 777, 2, 0),
(6, 'Salad', 'Salad with crutons and any dip', '67.00', 899, 2, 1),
(7, 'Clam Chowder', 'Clam chowder that thing made from crab', '70.95', 67, 2, 1),
(8, 'Meatball Spaghetti', 'Spaghetti with meatballs and hot spicy sauce', '4.78', 34, 3, 0),
(9, 'Lasagna', 'Italian food is yummy.', '12.50', 450, 3, 0),
(10, 'Grilled Salmon', 'It''s Salmon... that''s grilled...', '15.97', 340, 3, 1),
(11, 'Margarita Grilled Srimp', 'Let''s get KRUNK', '20.01', 180, 3, 1),
(12, 'Ginger Glazed MahiMahi', 'Sweet and Sour yumminess', '17.85', 260, 3, 0),
(13, 'Mac ''n Cheese', 'basic', '8.67', 560, 3, 0),
(14, 'Sweet Potato Burrito', 'vegetarian burrito with sweet potatoes', '6.98', 500, 3, 1),
(15, 'Cheesy Breakfast Pizza', 'best thing in the morning', '7.57', 220, 1, 1),
(16, 'Aussie Omelet', 'Shrimp, Veggies, and Cheese!', '9.49', 310, 1, 0),
(17, 'Breakfast Enchiladas', 'Hashbrowns, cheese, ham, green chillies.', '11.21', 480, 1, 0),
(18, 'Baked Egg Sammich', 'Ham and egg croissant sammich', '6.49', 570, 1, 0),
(19, 'Breakfast Slider', '4 Hawaiian Rolls with scrambled egg, ham, and cheese', '6.32', 590, 1, 0),
(20, 'French Toast Souffle', 'Casserole of bread, cream cheese, egg, and milk.', '9.73', 240, 1, 1),
(21, 'Turkey wild rice soup', 'wild rice in broth with turkey chunks, bacon, and creamy cheese.', '10.72', 400, 2, 1),
(22, 'Minestrone', 'lots of veggies, thick broth', '11.72', 220, 2, 1),
(23, 'French Onion Soup', 'Toasted French bread with melted swiss cheese in a think onion soup', '11.11', 730, 2, 0),
(24, 'Grilled Turkey Sammich', 'Turkey sammich with pepperJack cheese, salsa, and green onions.', '6.42', 500, 2, 1),
(25, 'Pulled Pork Sammich', 'pork with brown sugar rub, baked and served with choice of cheese and green onions.', '7.11', 400, 2, 1),
(26, 'Cucumber Sammich', 'Cucumber, choice of bread, cream cheese, and dill.', '4.55', 130, 2, 1),
(27, 'Ham and cheese sliders', 'Hawaiian roll with ham and choice of cheese.', '1.50', 140, 2, 1),
(28, 'BLT wrap', 'Bacon, Lettuce, Tomato, and choice of cheese.', '6.33', 700, 2, 0),
(29, 'Jalapeno Grilled Cheese Sammich', 'Jalapeno cream cheese, choice of cheese, and jalapeno pita chips on grilled ciabatta bread.', '8.79', 550, 2, 0),
(30, 'Cranberry Spinach Salad', 'Spinach, roasted almonds, and dried cranberries.', '6.21', 300, 2, 1),
(31, 'Juicy Hamburger', 'Juicy', '5.55', 300, 3, 0),
(32, 'Blue Cheese Burger', 'hamburger patty with blue cheese, worcestershire sauce, and mustard.', '7.43', 350, 3, 0),
(33, 'Cream Cheese Jalapeno Burger', 'Cheese burger with jalapenos and cream cheese.', '6.91', 520, 3, 0),
(34, 'Aloha Chicken Burger', 'Grilled Teriyaki chicken, pineapple, bacon, choice of cheese.', '8.12', 670, 3, 0),
(35, 'Chicken Kabobs', 'chicken chunks, green bell pepper, onion, and mushroom on a stick.', '6.10', 400, 3, 1),
(36, 'Chicken Masala', 'Chicen marinated in yogurt and spices, served with tomato cream sauce.', '6.82', 400, 3, 1),
(37, 'Tuna Steak', 'Sweet and tangy', '9.99', 200, 3, 1),
(38, 'London Broil', 'Soy Sauce and garlic marinade.', '7.77', 250, 3, 1),
(39, 'Baby Back Ribs', 'Cumin, chili powder, and paprika on ribs.', '12.21', 450, 3, 0),
(40, 'Grilled Garlic Parmesan Zucchini', 'Grilled zucchini slices with garlic and parmesan cheese sauce.', '5.28', 150, 3, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
