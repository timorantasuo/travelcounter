-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15.12.2016 klo 12:26
-- Palvelimen versio: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_counter`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `counter_travel`
--

CREATE TABLE IF NOT EXISTS `counter_travel` (
  `travel_id` int(5) NOT NULL,
  `counter_id` int(10) NOT NULL,
  `travel_date` date NOT NULL,
  `startingpoint` varchar(255) COLLATE utf8_bin NOT NULL,
  `destination` varchar(255) COLLATE utf8_bin NOT NULL,
  `distance` varchar(20) COLLATE utf8_bin NOT NULL,
  `purpose` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Vedos taulusta `counter_travel`
--

INSERT INTO `counter_travel` (`travel_id`, `counter_id`, `travel_date`, `startingpoint`, `destination`, `distance`, `purpose`) VALUES
(1, 136524, '2016-06-01', 'Iinankatu 14, Suolahti', 'Viitaniementie 1, JyvÃ¤skylÃ¤', '45,3 km', ''),
(2, 136520, '2016-06-02', 'Iinankatu 14, Suolahti', 'Ã„Ã¤nekoski', '9,7 km', ''),
(3, 136524, '2016-06-02', 'Iinankatu 14, Suolahti', 'Viitaniementie 1, JyvÃ¤skylÃ¤', '45,3 km', ''),
(4, 136524, '2016-06-01', 'Marjaniementie 95, Hailuoto', 'Niilonrinne 7, Oulu', '76,6 km', ''),
(5, 1234, '2016-06-21', 'Oslo', 'Arnhem', '1Â 203 km', ''),
(6, 106122, '2016-06-08', 'Stakenberg 47, Ede', 'Zijpendaalseweg 167, Arnhem', '20,0 km', ''),
(7, 106122, '2016-06-07', 'Stakenberg 47, Ede', 'Velperweg 39, Arnhem', '25,4 km', ''),
(8, 136524, '2016-06-02', 'Marjaniementie 95, Hailuoto', 'Iinankatu 14, Suolahti', '344 km', ''),
(9, 136524, '2016-06-02', 'Ã„Ã¤nekoski', 'JyvÃ¤skylÃ¤', '45,3 km', ''),
(10, 136524, '2016-06-18', 'Zijpendaalseweg 167, Arnhem', 'Iinankatu 14, Suolahti', '2Â 035 km', ''),
(11, 136524, '2017-01-08', 'De Dissel 216', 'Zijpendaalseweg 167', '12,5 km', ''),
(12, 136524, '2016-11-29', 'de dissel 216, arnhem', 'zijpendaalseweg 167', '12,5 km', '');

-- --------------------------------------------------------

--
-- Rakenne taululle `counter_users`
--

CREATE TABLE IF NOT EXISTS `counter_users` (
  `counter_id` int(10) NOT NULL,
  `usertype` varchar(5) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'user',
  `counter_name` varchar(150) CHARACTER SET latin1 NOT NULL,
  `counter_fam_name` varchar(150) CHARACTER SET latin1 NOT NULL,
  `counter_email` varchar(150) CHARACTER SET latin1 NOT NULL,
  `counter_year` int(4) NOT NULL,
  `counter_month` int(2) NOT NULL,
  `counter_day` int(2) NOT NULL,
  `counter_password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `counter_address` varchar(15) COLLATE utf8_swedish_ci NOT NULL,
  `counter_postcode` varchar(6) COLLATE utf8_swedish_ci NOT NULL,
  `counter_city` varchar(150) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Vedos taulusta `counter_users`
--

INSERT INTO `counter_users` (`counter_id`, `usertype`, `counter_name`, `counter_fam_name`, `counter_email`, `counter_year`, `counter_month`, `counter_day`, `counter_password`, `counter_address`, `counter_postcode`, `counter_city`) VALUES
(1234, 'user', 'Pascal', 'Wouters', 'p.wouters@rijnijssel.nl', 1972, 1, 15, '$2y$10$JMwhic4Rr3px8yQZ5j6VUOklxnMa7Fs8f3j1h3GJruK0mN68masd2', '', '', ''),
(106122, 'user', 'Tibor', 'Kleinman', 't.kleinman@rijnijssel.nl', 1987, 12, 10, '$2y$10$iY/yMu5F./7V6WshXpuGpe3U4rE.BOfALj73SrynHvhzREEY6FLAq', 'Stakenberg 47', '6718DG', 'Ede'),
(136524, 'user', 'Timo', 'Rantasuo', 'ao136524@jao.fi', 1998, 10, 16, '$2y$10$j7ZKMHAYumO.HsiO71vfAeWB7o2W1k6e8WO4Nota3asA/YpNp6MXG', 'Iinankatu 14', '44200', 'Ã„Ã¤nekoski (Sub-Region)'),
(123456789, 'user', 'Joona', 'IlomÃ¤ki', '123456@gmail.com', 1998, 3, 28, '$2y$10$6Yld7OQwm2oD.HdrfK2TsuRM1yRZp.zh0.qZpeWgZBz1oY1vqUulO', '', '', ''),
(69, 'user', 'Katto', 'Kassinen', 'Platudd1951@dayrep.com', 1000, 2, 7, '$2y$10$vKPrMFsQA2szHDLWqVmsgOEAMosF9zPRCIs0j/QsHJFRAj4mifKpi', 'Keppanakuja 48', '978657', 'Hervanto'),
(136521, 'user', 'Hune', 'Hunelius', 'huneistus@gmail.nl', 1964, 3, 16, '$2y$10$Cuo6oTe7zunjTByxxFw1Je/qdIk24fZ2bmDxZV3h4U1US9Wf2uUE.', '', '', ''),
(12555, 'user', 'Timo', 'Rantasuo', 'timorantasuo@gmail.com', 0, 0, 0, '$2y$10$vbZ8qKxUE3Byd56JsrWwcOAkBjybcXGCTwNUp2/6e95VAN5IQ06ga', '', '', ''),
(136520, 'admin', 'Joni', 'Palmiranta', 'ao136520@jao.fi', 1998, 11, 11, '$2y$10$hgrGiaRg1EnmdVKDdpBeTOJTg5vqfTvQbJMk8DslzEb7Gbe.LvX46', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counter_travel`
--
ALTER TABLE `counter_travel`
  ADD PRIMARY KEY (`travel_id`),
  ADD KEY `counter_id` (`counter_id`);

--
-- Indexes for table `counter_users`
--
ALTER TABLE `counter_users`
  ADD PRIMARY KEY (`counter_id`),
  ADD UNIQUE KEY `counter_email` (`counter_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counter_travel`
--
ALTER TABLE `counter_travel`
  MODIFY `travel_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
