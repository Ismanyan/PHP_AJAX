-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 09:33 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katholik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `month` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `month`) VALUES
(1, 'January'),
(2, 'Febuary'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `ktp` varchar(256) NOT NULL,
  `gender` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `dates` varchar(256) NOT NULL,
  `agama` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama`, `ktp`, `gender`, `location`, `dates`, `agama`, `status`) VALUES
(2, 'Bilkis Ismail', '83928398', '', 'tangerang', '07 april 2002', 'Islam', 'Kawin'),
(4, 'Bilkis Ismail', '09090909', 'perempuan', 'tangerang', '08 april 2019', 'Islam', 'Kawin'),
(5, 'Bilkis Ismail', 'sdsd', 'Laki laki', 'dsd', '07 april 2002', 'Islam', 'Kawin'),
(6, 'Ismanyan', '123', 'Laki laki', 'tangerang', '07/05/2002', 'Islam', 'Kawin'),
(7, 'sdsdsde', '1233', 'perempuan', 'jawa', '21/05/2005', 'Kristen', 'Kawin'),
(9, 'Bilkis Ismail', '54545', 'Laki laki', 'Tangerang', '09 aprial 209', 'Islam', 'Kawin');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id` int(11) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id`, `tahun`) VALUES
(2, 2019),
(3, 2018),
(4, 2017),
(5, 2016),
(6, 2015),
(7, 2014),
(8, 2013),
(9, 2012),
(10, 2011),
(11, 2010),
(12, 2009),
(13, 2008),
(14, 2007),
(15, 2006),
(16, 2005),
(17, 2004),
(18, 2003),
(19, 2002),
(20, 2001),
(21, 2000),
(22, 1999),
(23, 1998),
(24, 1997),
(25, 1996),
(26, 1995),
(27, 1994),
(29, 1993);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `date` varchar(256) NOT NULL,
  `gender` varchar(256) NOT NULL,
  `no_pemulihan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `no_hp`, `date`, `gender`, `no_pemulihan`) VALUES
(1, 'Bilkis Ismail', 'sovianbasecamp@gmail.com', '$2y$10$9OlfOJMhVMCHazOB5f5YHesRjQfHd9TQqqhlgKJ1TYgMMQ9.HjNo.', '0808080808', 'April-2018', 'pria', '089630080545'),
(2, 'Fredy Fajar', 'fredy@gmail.com', '$2y$10$ADFQnstxn744XtHe6K3KCOBuGuP7.W3zqP56vZIx4.0PZ3PE5saC2', '089630080545', 'January-2019', 'wanita', '0909'),
(3, 'Bilkis Ismail', 'bilkis07@gmail.com', '$2y$10$s3zHbymDESHnd/XoqjwR/.a32FuNvlhNgA8xwUytFOw67ULZR/Soq', '089', 'April-2002', 'Laki Laki', '089'),
(4, 'Bilkis ismail', 'uyuyu@gmail.com', '$2y$10$qlIzqSSWusJsMHJKtiPspeNAzA/ihL5KnJQmMNOfJGkUK8BgfuXdC', '90909', '7-April-2019', 'Perempuan', '0'),
(5, 'Ismanyan Manyan', 'ismanyan@gmail.com', '$2y$10$bhDeoX/O5VJl.AHzMkTW5.z4BlMCppfMoMAHMLzwqVPhCnQ23w/Ki', '123', '1-April-2019', 'Laki Laki', '123'),
(6, 'sdsmkdmskd smdkmsdkmsd', 'sdmskdmsd@gmail.com', '$2y$10$eLKoIRoocQnz0LBFVso85O3CXAO2P67eYrPTU5A2huVc1jfKd9GhC', '123', '10-July-2010', 'Perempuan', '2323'),
(7, 'dc  cc', 'cccc@gmail.com', '$2y$10$PA3KN/ETCz6Zu6rNUrItoeMpxEjMS7f8Lf6e8s74YK/4k7.7BL3l6', '02932732283', '8-August-2003', 'Laki Laki', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
