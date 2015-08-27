-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2015 at 09:44 PM
-- Server version: 5.5.40
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctec127_final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_page_content`
--

CREATE TABLE IF NOT EXISTS `home_page_content` (
`id` int(20) unsigned NOT NULL,
  `paragraph` varchar(3000) DEFAULT NULL,
  `image_link` varchar(60) DEFAULT NULL,
  `img_data` varchar(120) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_page_content`
--

INSERT INTO `home_page_content` (`id`, `paragraph`, `image_link`, `img_data`) VALUES
(1, '', 'images/IMG_4653.jpg', 'alt=&quot;surfer silhouetted against a  breaking wave&quot; width=564 height=317'),
(2, '', 'images/shread1.jpg', 'alt=&quot;a surfer jumping off the top of a wave&quot; width=&quot;376&quot; height=&quot;211&quot;'),
(3, '', 'images/rack1.jpg', 'alt=&quot;Lib Tech surf boards on a rack in our shop&quot; height=&quot;376&quot; width=&quot;376&quot;'),
(4, 'The green room is that sweet spot on the wave where a surfer gets covered up by a tube of rushing water.  Here on dry land we''ve got you covered.  Whether you are an old leatherback or just getting started you''ll find everything you need to get wet and have fun.', '', ''),
(5, 'We pride ourselves on being your source for everything surfing related.  Featuring men and women''s wetsuits, new and used surfboards, equipment rentals, and lessons as well as all of the wax, boardshorts, sunblock and other accouterments you could possibly ever need.  Now all you need is a nice swell out of the back. See you in the line up!', NULL, NULL),
(6, '					<br /> Also, from time to time we host BBQ''s at the shop or arrange group floats on the water.  We communicate those events through our newsletter distribution as well.  What are you waiting for?  Get suited up and get wet, live Aloha, and don''t forget to join the mailing list!\r\n', NULL, NULL),
(7, 'Welcome to the Green Room!', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mailing_list`
--

CREATE TABLE IF NOT EXISTS `mailing_list` (
`id` int(20) unsigned NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailing_list`
--

INSERT INTO `mailing_list` (`id`, `name`, `email`) VALUES
(1, 'Bruce', 'AllAlongThe@Watchtower'),
(2, 'Someguy', 'happy@wednesday.com'),
(3, 'jfdushd', 'jdhvuisdhfzg@3.con'),
(4, 'Jenny Browne', 'jenny.browne@convergint.com'),
(5, 'Matt Browne', 'm.browne@students.clark.edu'),
(6, 'jrh4foih', 'pearl@jam.com'),
(7, 'huhiu', 'poo@poo'),
(9, 'someguy', 'happy@thursday.com'),
(10, 'matt browne', 'jefhoewh@befjbejrfb.com');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(10) unsigned NOT NULL,
  `post_date` date NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `post_date`, `title`, `content`) VALUES
(1, '2014-06-16', 'Abnormally large swell pounds Oregon Coast', 'Surfers in Oregon are being treated to an early summer swell coming out of the South and pushing wave heights well above the seasonal average.  Conditions are expected to last for about a week before returning to a more seasonally appropriate height.'),
(2, '2014-07-04', 'Fireworks on the beach threaten natural ecosystems', 'Every year natural grasses which grow in the sand dunes up and down the coast are threatened by fires resulting from errant firework usage.  These grasses are critical to the fight against soil erosion and as such should be protected.  If you are going to light fireworks off on the beach, please don''t, but if you are going to take the time to take note of the wind direction and pay attention to wind changes throughout the night while fireworks are being detonated.  Aim all fireworks away from sensitive areas and avoid fireworks that travel high up in the sky.  Have a safe and happy Fourth of July.'),
(3, '2014-08-27', 'Heavy traffic on Oregon coast expected for Labor Day weekend', 'With the Weather looking good for the whole weekend we expect to see a lot of traffic on the Oregon Coast and heavy use on the beaches.  Just a friendly reminder to be safe out there and take care of each other.  Have Fun and enjoy the last grasps of summer. '),
(4, '2014-09-24', 'Annual beach clean-up this weekend', 'The annual Oregon Coast beach clean-up is going down this year on Saturday 09/27.  Please do what you can to support the cause and help protect the resource we all enjoy for generations to follow.  We will be hosting a group in Pacific City if you''d like to come join.  This may be the last ice weekend of Summer, what better way to spend it?'),
(5, '2014-12-23', 'Merry Christmas', 'Wishing all our fellow people of the water a very Merry Christmas!  May the season be kind and the time pass slow.  We will be hosting a bonfire on the beach on New Years eve.  The fire will be built below the high tide line so plan accordingly.  High Tide will be at 2:30 am.  The party will last until the fire washes out.  Hope to see you all there.  enjoy the holidays!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(10) unsigned NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address_1` varchar(60) NOT NULL,
  `address_2` varchar(40) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(10) unsigned NOT NULL,
  `products` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `address_1`, `address_2`, `city`, `state`, `zip`, `products`) VALUES
(1, 'John', 'Doe', '9988 82nd st', NULL, 'Portland', 'OR', 97213, 'Oneill, Lib Tech, DayGlo Wax'),
(2, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'Wa', 98685, 'Oneill, Lib Tech, DayGlo Wax'),
(3, 'Matt', 'Browne', '9920 NW 3rd Ct', 'kjgkg', 'Vancouver', 'Wa', 98685, 'Xcel W, JL Designs'),
(6, 'Matt', 'Browne', '9920 NW 3rd Ct', 'kjgkg', 'Vancouver', 'Wa', 98685, 'Roxy, Xcel W, Tropical Wax'),
(8, 'Matt', 'Browne', '9920 NW 3rd Ct', 'kjgkg', 'Vancouver', 'Wa', 98685, 'Roxy, Xcel W, Tropical Wax'),
(10, 'Matt', 'Browne', '9920 NW 3rd Ct', 'kjgkg', 'Vancouver', 'Wa', 98685, 'Roxy, Xcel W, Tropical Wax'),
(11, 'Matt', 'Browne', '9920 NW 3rd Ct', 'kjgkg', 'Vancouver', 'Wa', 98685, 'Roxy, Xcel W, Tropical Wax'),
(12, 'Matt', 'Browne', '9920 NW 3rd Ct.', '', 'Vancouver', 'Wa', 98685, 'Xcel M, Gary Linden, Cold Wax'),
(14, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'Wa', 98685, ''),
(15, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'Wa', 98685, 'Roxy, Xcel W, Gary Linden, JL Designs'),
(16, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'Wa', 98685, 'Xcel M, Roxy, Lib Tech, JL Designs, Cold Wax'),
(17, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'Wa', 98685, 'Xcel M, Roxy, Lib Tech, JL Designs, Cold Wax'),
(18, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'Wa', 98685, 'Xcel M, Roxy, Lib Tech, JL Designs, Cold Wax'),
(19, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'Wa', 98685, 'Xcel M, Roxy, Lib Tech, JL Designs, Cold Wax'),
(20, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'Wa', 98685, 'Xcel M, Roxy, Lib Tech, JL Designs, Cold Wax'),
(21, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'Wa', 98685, 'Gary Linden'),
(23, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'MT', 98685, ''),
(24, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'WA', 98685, 'Oneill, Lib Tech, DayGlo Wax'),
(25, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'WA', 98685, 'Oneill, Lib Tech, DayGlo Wax'),
(26, 'Matt', 'Browne', '9920 NW 3rd Ct', '', 'Vancouver', 'WA', 98685, 'Oneill, Lib Tech, DayGlo Wax');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) unsigned NOT NULL,
  `image_path` varchar(60) NOT NULL,
  `img_data` varchar(120) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image_path`, `img_data`, `product_name`, `description`, `price`, `category`) VALUES
(1, 'images/products/oneill_mws_150x150.jpeg', 'alt=&quot;O''Neill super freak 5/4 wet suit&quot; width=150 height=150', 'O''Neill Super Freak Wetsuit', 'O''neill Super Freak 5/4 wetsuits are cut for comfort, stitched for durability and warm enough for the coldest the Pacific Ocean has to offer.', '275.55', 'wetsuits'),
(2, 'images/products/xcel_mws_67x150.jpeg', 'alt=&quot;Xcel wetsuit, Mens&quot; width=67 height=150', 'Xcel Mens Wetsuit', 'Xcel wetsuits are high quality, affordable wetsuits perfect for people just starting out or as a second suit for those two session days!', '175.00', 'wetsuits'),
(3, 'images/products/roxy_wws_75x150.jpeg', 'alt="Roxy woman''s wetsuit" width=75 height=150', 'Roxy Women''s wetsuit', 'Roxy 5/4 premium wetsuit for women.  This Roxy suit will have you looking good and staying warm, a true dual threat.  A quality suit at a reasonable price. Multiple sizes available. ', '199.99', 'wetsuits'),
(4, 'images/products/xcel_wws_150x150.jpeg', 'alt="Xcel woman''s wetsuit" width=150 height=150', 'Xcel Women''s wetsuit', 'Xcel offers a well made suit at an affordable price, perfect as a starter suit or second suit for when a friend tags along. Multiple sizes available. ', '167.55', 'wetsuits'),
(5, 'images/products/66_ramp_150x150.jpeg', 'alt="Lib Tech 6''6&quot; Ramp series surfboard" width=150 height=150 ', 'Lib Tech Ramp Series', 'This offering from Lib Technologies is a 6''6" Ramp Series.  An all around fun board to ride.  Lib Tech has revolutionized the surfboard industry with its near indestructible board designs.', '650.00', 'boards'),
(6, 'images/products/red_linden86_41x150.jpg', 'alt="Red, 8''6&quot; surfboard from Gary Linden" width=41 height=150', 'Linden Longboard', 'This red bomber from Gary Linden is a great board to get down the face of the wave on.  Coming in at 8''6" you will feel like you are riding a 9-1/2 footer.  Hand shaped by Gary Linden himself, this board is priced to move.', '760.00', 'boards'),
(7, 'images/products/softtop_jldesigns-9_35x150.jpg', 'alt="9ft soft top surfboard" width=35 height=150', 'JL Designs Soft Top', 'JL Designs makes this 9'' soft top board for anyone looking for an easy to ride, good floating board.  Perfect for the beginner surfer who is still learning, and priced accordingly.', '400.00', 'boards'),
(8, 'images/products/coldwax_150x150.jpg', 'alt="cold water wax, Sticky Bumps brand" width=150 height=150', 'Sticky Bumps Cold water', 'Sticky Bumps cold water wax, for water temperatures like those in the North West.', '2.00', 'wax'),
(9, 'images/products/tropicalwax_150x150.jpg', 'alt="tropical surf wax, Sticky Bumps brand" width=150 height=150', 'Sticky Bumps Tropical', 'Stick Bumps Tropical temp wax, for places where you don''t need a wetsuit. (please take us with you!)', '2.00', 'wax'),
(10, 'images/products/dayglo_150x150.jpg', 'alt="DayGlo cold water wax, Sticky Bumps brand" width=150 height=150', 'Sticky Bumps DayGlo Cold', 'Sticky Bumps cold water wax, for water temperatures like those in the North West.  In DayGlo bright colors', '3.00', 'wax');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
`id` int(20) unsigned NOT NULL,
  `post_date` date NOT NULL,
  `avatar` varchar(60) NOT NULL COMMENT 'image link',
  `f_name` varchar(20) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `post_date`, `avatar`, `f_name`, `comment`) VALUES
(1, '2015-03-15', 'images/avatar_male_150x150.png', 'Jeff', 'The coast is getting pounded right now, grab your boards and get out here!'),
(2, '2015-03-15', 'images/avatar_female_150x150.png', 'Linda', 'Head high waves all day long just begging to be ridden, get out here!'),
(3, '2015-03-15', 'images/avatar_male_150x150.png', 'Mike', '@Linda, what break are you at?'),
(4, '2015-03-15', 'images/avatar_female_150x150.png', 'Linda', '@Mike, we are out at Shorties today, Indian was working too!'),
(5, '2015-03-15', 'images/avatar_male_150x150.png', 'Mike', 'Thanks Linda, see you guys out there soon!'),
(6, '2015-03-16', 'images/avatar_male_150x150.png', 'Stephen', 'I was able to catch a great sunset session last night.  Thanks for the heads up guys.'),
(7, '2015-03-16', 'images/avatar_male_150x150.png', 'John', 'Glad to hear you got out Stephen, was an epic break!'),
(8, '2015-03-16', 'images/avatar_female_150x150.png', 'Linda', 'Agreed guys, it was epic, got a party wave with Mike as the sun was dropping below the horizon.  There''s always room for a friend!'),
(9, '2015-03-16', 'images/avatar_male_150x150.png', 'Mike', 'That was a fun wave Linda, nice riding with you all yesterday'),
(10, '2015-03-17', 'images/avatar_female_150x150.png', 'Jenny', 'Anyone getting wet for dawn patrol this am?  we camped at the break and are heading out in a few minutes for an early session!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_page_content`
--
ALTER TABLE `home_page_content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailing_list`
--
ALTER TABLE `mailing_list`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_page_content`
--
ALTER TABLE `home_page_content`
MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mailing_list`
--
ALTER TABLE `mailing_list`
MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
