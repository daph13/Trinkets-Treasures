-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 10:46 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trinketsdb`
--
CREATE DATABASE IF NOT EXISTS `trinketsdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trinketsdb`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(30) NOT NULL,
  `category_name` varchar(60) NOT NULL,
  `description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`) VALUES
('bookmark', 'Bookmarks', 'Homemade bookmarks'),
('bracelet', 'Bracelets', 'Homemade bracelets'),
('earrings', 'Earrings', 'Homemade earrings');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(6) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `phone`, `email`, `password`) VALUES
(1, 'Lily', 'Doe', '05632841365', 'lily@gmail.com', 'ae8b5aa26a3ae31612eec1d1f6ffbce9'),
(2, 'John', 'Doe', '0459687452', 'jd@gmail.com', 'b59c67bf196a4758191e42f76670ceba'),
(3, 'Patricia', 'Almers', '0456985236', 'pa@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(4, 'Derps', 'T', '55152366', 'dt@gmail.com', 'b59c67bf196a4758191e42f76670ceba'),
(5, 'hhddhdh', 'sssss', 'pppp', 'blabla@gmail.com', 'e882b72bccfc2ad578c27b0d9b472a14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` double(6,2) NOT NULL,
  `status` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email`, `order_date`, `total_amount`, `status`) VALUES
('0311865931531209255', 'aedgdeh@gmail.com', '2018-07-10', 15.00, 'pending'),
('0368879331530130476', 'peggy@hotmail.com', '2018-06-27', 40.00, 'pending'),
('0556286581530052978', 'lily@gmail.com', '2018-06-27', 45.00, 'pending'),
('0628622221530059595', 'pa@gmail.com', '2018-06-27', 45.00, 'pending'),
('0798763271530130392', 'derpz@yahoo.com', '2018-06-27', 40.00, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_id` varchar(30) NOT NULL,
  `product_id` varchar(60) NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_id`, `product_id`, `quantity`) VALUES
('0311865931531209255', 'misty_green_drops_earrings.jpg', 1),
('0368879331530130476', 'dolphin_anchor_bookmark.jpeg', 1),
('0368879331530130476', 'feather_owl_bookmark.jpg', 1),
('0556286581530052978', 'angel_metal_bookmark.jpg', 1),
('0556286581530052978', 'blue-orange_beaded_charm_bracelet.jpg', 1),
('0557736781530130315', 'dolphin_anchor_bookmark.jpeg', 1),
('0628622221530059595', 'charm_bracelet04.jpg', 1),
('0628622221530059595', 'feather_cat_princess_bookmark.jpg', 1),
('0798763271530130392', 'cat_metal_bookmark.jpg', 1),
('0798763271530130392', 'dolphin_anchor_bookmark.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(60) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `unit_price` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `description`, `unit_price`) VALUES
('anchor_cord_bracelet.jpg', 'Anchor Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord, attached with a charm\r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('angel_metal_bookmark.jpg', 'Angel Metal Bookmark', 'bookmark', 'Materials: Antique Brass Embossed Metal Bookmark, Antique Brass Angel Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('bird_cord_bracelet.jpg', 'Bird Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord, attached with a charm\r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('black_orange_pearl_bracelet.jpg', 'Ivory Pearls and Crystal Beads Bracelet', 'bracelet', 'Materials: Ivory Glass Pearls, Black and Orange Crystal Beads, Bead Caps and Spacer Beads, Silver-plated Lobster Clasp\r\nMeasurement: 19.5cm (including clasp)', 25.00),
('blue-orange_beaded_charm_bracelet.jpg', 'Turquoise and Orange Beaded Bracelet', 'bracelet', 'Materials: Turquoise Beads and Orange Wooden Beads, Bead Caps and Spacer Beads, Antique Brass Toggle\r\nMeasurement: 19.5cm (including toggle)', 25.00),
('blue_beaded_bracelet.jpg', 'Blue and White Pearl Bracelet', 'bracelet', 'Materials: Assorted coloured glass pearl beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('blue_beaded_charm_bracelet.jpg', 'Blue Beaded Charm Bracelet', 'bracelet', 'Materials: Light Blue Crystal Rondelles, Dark and Light Blue Crystals , Antique Silver Spacer Beads, Silver-plated Toggle\r\nMeasurement: 19cm (including toggle)', 25.00),
('blue_orange_wooden.jpg', 'Wooden Bead Bracelet(3)', 'bracelet', 'Materials: Assorted shapes and coloured wooden beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('blue_orange_yellow_wooden.jpg', 'Wooden Bead Bracelet(2)', 'bracelet', 'Materials: Assorted shapes and coloured wooden beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('blue_red_white_wooden.jpg', 'Wooden Bead Bracelet(9)', 'bracelet', 'Materials: Assorted shapes and coloured wooden beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('blue_seed_bead_bracelet.jpg', 'Blue Seed Beads Bracelet', 'bracelet', 'Materials: Assorted coloured glass seed beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('bronze_blue_pearl_bracelet.jpg', 'Bronze, Blue and White Pearl Bracelet', 'bracelet', 'Materials: Assorted coloured glass pearl beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('bronze_gold_pearl_bracelet.jpg', 'Bronze, Gold and White Pearl Bracelet ', 'bracelet', 'Materials: Assorted coloured glass pearl beads, elastic band\r\nMeasurement: 15 cm \r\nAble to fit wrist of 15-20 cm', 5.00),
('brown_black_wooden.jpg', 'Wooden Bead Bracelet(8)', 'bracelet', 'Materials: Assorted shapes and coloured wooden beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('brown_transparent_seed_bead_bracelet.jpg', 'Brown Seed Beads Bracelet', 'bracelet', 'Materials: Assorted coloured glass seed beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('cat_metal_bookmark.jpg', 'Cat Metal Bookmark', 'bookmark', 'Materials: Antique Brass Flower Embossed Metal Bookmark, Antique Brass Cat Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('charm_bracelet01.jpg', 'Charm Bracelet (1)', 'bracelet', 'Materials: Antique Brass Charms, Antique Brass Chain, Antique Brass Toggle\r\nMeasurement: 18cm (including toggle)', 25.00),
('charm_bracelet02.jpg', 'Charm Bracelet (2)', 'bracelet', 'Materials: Antique Brass Charms, Antique Brass Chain, Antique Brass Toggle\r\nMeasurement: 18cm (including toggle)', 25.00),
('charm_bracelet03.jpg', 'Charm Bracelet (3)', 'bracelet', 'Materials: Antique Brass Charms, Antique Brass Chain, Antique Brass Toggle Measurement: 18cm (including toggle)', 25.00),
('charm_bracelet04.jpg', 'Charm Bracelet (4)', 'bracelet', 'Materials: Antique Brass Charms, Antique Brass Chain, Antique Brass Toggle Measurement: 18cm (including toggle)', 25.00),
('charm_bracelet05.jpg', 'Charm Bracelet (5)', 'bracelet', 'Materials: Antique Brass Charms, Antique Brass Chain, Antique Brass Toggle Measurement: 18cm (including toggle)', 25.00),
('charm_bracelet06.jpg', 'Charm Bracelet (6)', 'bracelet', 'Materials: Antique Brass Charms, Antique Brass Chain, Antique Brass Toggle Measurement: 18cm (including toggle)', 25.00),
('charm_bracelet07.jpg', 'Charm Bracelet (7)', 'bracelet', 'Materials: Antique Brass Charms, Antique Brass Chain, Antique Brass Toggle Measurement: 18cm (including toggle)', 25.00),
('charm_bracelet08.jpg', 'Charm Bracelet (8)', 'bracelet', 'Materials: Antique Brass Charms, Antique Brass Chain, Antique Brass Toggle Measurement: 18cm (including toggle)', 25.00),
('charm_bracelet09.jpg', 'Charm Bracelet (9)', 'bracelet', 'Materials: Antique Brass Charms, Antique Brass Chain, Antique Brass Toggle Measurement: 18cm (including toggle)', 25.00),
('charm_bracelet10.jpg', 'Charm Bracelet (10)', 'bracelet', 'Materials: Antique Brass Charms, Antique Brass Chain, Antique Brass Toggle Measurement: 18cm (including toggle)', 25.00),
('dolphin_anchor_bookmark.jpeg', 'Dolphin and Anchor Metal Bookmark', 'bookmark', 'Materials: Antique Brass Dolphin Metal Bookmark, Antique Brass Anchor Charm and selected beads\r\nMeasurement: 12cm', 20.00),
('elephant_cord_bracelet.jpg', 'Elephant Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord, attached with a charm \r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('feather_cat_princess_bookmark.jpg', 'Feather and Cat Princess Metal Bookmark', 'bookmark', 'Materials: Antique Silver Feather Metal Bookmark, Antique Silver Princess Cat Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('feather_cord_bracelet.jpg', 'Feather Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord, attached with a charm \r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('feather_owl_bookmark.jpg', 'Feather and Owl Metal Bookmark', 'bookmark', 'Materials: Antique Silver Feather Metal Bookmark, Antique Silver Owl Charm and selected beads\r\nMeasurement: 14cm\r\n', 20.00),
('five_red_white_red_wooden.jpg', 'Wooden Bracelet(4)', 'bracelet', 'Materials: Assorted shapes and coloured wooden beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('five_red_white_wooden.jpg', 'Wooden Bead Bracelet(5)', 'bracelet', 'Materials: Assorted shapes and coloured wooden beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('floral_fantasy_earrings.jpg', 'Floral Fantasy Earrings', 'earrings', 'Materials: White Floral-shaped Shell  Beads,Red Coral Beads, Antique Copper Bead Caps and Spacer Beads, Antique Copper Fishhook Earwire\r\nMeasurement: 6cm (including fishhook earwire)', 15.00),
('green_beaded_bracelet.jpg', 'Green Pearl Bracelet', 'bracelet', 'Materials: Assorted coloured glass pearl beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('green_beaded_charm_bracelet.jpg', 'Green Beaded Charm Bracelet', 'bracelet', 'Materials: Assorted Green Glass Beads, Antique Brass Flower and Dragonfly Charms, Antique Brass Bead Caps and Spacer Beads, Antique Brass Link Chain, Antique Brass Toggle\r\nMeasurement: 19cm (including toggle)', 25.00),
('green_yellow_red_wooden.jpg', 'Wooden Bead Bracelet(7)', 'bracelet', 'Materials: Assorted shapes and coloured wooden beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('ivory_romance_earrings.jpg', 'Ivory Romance Earrings', 'earrings', 'Materials: Ivory Glass Pearls, Black and Orange Crystal Beads, Bead Caps and Spacer Beads, Silver-plated Fishhook Earwire\r\nMeasurement: 5.5cm (including fishhook earwire)', 15.00),
('maroon_angel_earrings.jpg', 'Maroon Angel Earrings', 'earrings', 'Materials: Assorted Coloured Pearl Glass  Beads, Antique Silver Angel Shaped Wings\r\n Bead Caps and Spacer Beads, Silver-plated Fishhook Earwire\r\nMeasurement: 3.5cm (including earwire)', 15.00),
('mask_bookmark.jpg', 'Mask Metal Bookmark', 'bookmark', 'Materials: Antique Brass Embossed Metal Bookmark, Antique Brass Mask Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('mermaid_anchor_bookmark(v2).jpg', 'Mermaid and Anchor Metal Bookmark 0.2', 'bookmark', 'Materials: Antique Brass Mermaid Metal Bookmark, Antique Brass Anchor Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('mermaid_anchor_bookmark.jpg', 'Mermaid and Anchor Metal Bookmark', 'bookmark', 'Materials: Antique Brass Mermaid Metal Bookmark, Antique Brass Anchor Charm and selected beads\r\nMeasurement: 13cm', 20.00),
('mermaid_dolphin_bookmark.jpg', 'Mermaid and Dolphin Metal Bookmark', 'bookmark', 'Materials: Antique Brass Mermaid Metal Bookmark, Antique Brass Dolphin Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('mermaid_starfish_bookmark(v2).jpg', 'Mermaid and Starfish Metal Bookmark 0.2', 'bookmark', 'Materials: Antique Brass Mermaid Metal Bookmark, Antique Brass Starfish Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('mermaid_starfish_bookmark.jpg', 'Mermaid and Starfish Metal Bookmark', 'bookmark', 'Materials: Antique Brass Mermaid Metal Bookmark, Antique Brass Starfish Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('misty_green_drops_earrings.jpg', 'Misty Green Drops Earrings', 'earrings', 'Materials: Teardrop Green Glass Beads, Antique Silver Bead Caps and Spacer Beads, Silver-plated Fishhook Earwire \r\nMeasurement: 6cm (including fishhook earwire)', 15.00),
('owl_bookmark.jpg', 'Owl Metal Bookmark', 'bookmark', 'Materials: Antique Brass Flower Embossed Metal Bookmark, Antique Brass Owl Charm and selected beads\r\nMeasurement: 13cm', 20.00),
('owl_cord_bracelet.jpg', 'Owl Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord, attached with a charm \r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('peacock_bookmark.jpg', 'Peacock Metal Bookmark', 'bookmark', 'Materials: Antique Brass Embossed Metal Bookmark, Antique Brass Peacock Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('pink_pearl_earrings.jpg', 'Pink Pearl Earrings', 'earrings', 'Materials: Pink Glass Pearls and spacer beads, Silver-plated Fishhook Earwire\r\nMeasurement: 5cm (including fishhook earwire)', 12.00),
('princess_cat_bookmark(v2).jpg', 'Cat Princess Metal Bookmark 0.2', 'bookmark', 'Materials: Antique Brass Flower Embossed Metal Bookmark, Antique Brass Princess Cat Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('princess_cat_bookmark.jpg', 'Cat Princess Metal Bookmark', 'bookmark', 'Materials: Antique Brass Flower Embossed Metal Bookmark, Antique Brass Princess Cat Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('red-white_beaded_charm_bracelet.jpg', 'Red and White Beaded Charm Bracelet', 'bracelet', 'Materials: White Floral-shaped Shell Beads, Red and White Coral Beads, Antique Copper Bead Caps and Spacer Beads, Antique Copper Leaf Charm, Antique Copper Toggle\r\nMeasurement: 19cm (including toggle)', 25.00),
('red_yellow_blue_wooden.jpg', 'Wooden Bead Bracelet(1)', 'bracelet', 'Materials: Assorted shapes and coloured wooden beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('seahorse_cord_bracelet.jpg', 'Seahorse Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord, attached with a charm \r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('seashell_cord_bracelet.jpg', 'Seashell Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord, attached with a charm \r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('slipper_cord_bracelet.jpg', 'Slipper Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord, attached with a charm \r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('snowflake_bookmark(v2).jpg', 'Snowflake Metal Bookmark 0.2', 'bookmark', 'Materials: Antique Brass Embossed Metal Bookmark, Antique Brass Snowflake Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('snowflake_bookmark.jpg', 'Snowflake Metal Bookmark', 'bookmark', 'Materials: Antique Brass Flower Embossed Metal Bookmark, Antique Brass Snowflake Charm and selected beads\r\nMeasurement: 13.5cm', 20.00),
('snowman_bookmark.jpg', 'Snowman Metal Bookmark', 'bookmark', 'Materials: Antique Brass Embossed Metal Bookmark, Antique Brass Snowman Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('spade_cord_bracelet.jpg', 'Spade Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord, attached with a charm \r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('spiral_cord_bracelet.jpg', 'Spiral Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord, attached with a charm \r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('three_red_white_red_wooden.jpg', 'Wooden Bead Bracelet(6)', 'bracelet', 'Materials: Assorted shapes and coloured wooden beads, elastic band\r\nMeasurement: 15 cm\r\nAble to fit wrist of 15-20 cm', 5.00),
('tree_of_life_bookmark.jpg', 'Tree of Life Metal Bookmark', 'bookmark', 'Materials: Antique Silver Flower Embossed Metal Bookmark, Antique Silver Tree of Life Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('weaved_adjustable_bracelet.jpg', 'Adjustable Weaved Cord Bracelet', 'bracelet', 'Materials: Leather Cord, Waxed Cotton Cord\r\nMeasurement: 15 cm (Able to fit wrist of 15 - 20cm)', 10.00),
('xmas_bell_bookmark.jpg', 'X''mas Bell Metal Bookmark', 'bookmark', 'Materials: Antique Brass Flower Embossed Metal Bookmark, Antique Brass X"mas Bell Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('xmas_tree_bookmark.jpg', 'X''mas Tree Metal Bookmark', 'bookmark', 'Materials: Antique Brass Embossed Metal Bookmark, Antique Brass X''mas Tree Charm and selected beads\r\nMeasurement: 14cm', 20.00),
('xmas_wreath_bookmark.jpg', 'X''mas Wreath Metal Bookmark', 'bookmark', 'Materials: Antique Brass Embossed Metal Bookmark, Antique Brass X''mas Wreath Charm and selected beads\r\nMeasurement: 14cm', 20.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
