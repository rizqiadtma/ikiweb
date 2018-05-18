-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2016 at 03:10 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitas'
--

-- --------------------------------------------------------

--
-- Table structure for table `internet`
--

CREATE TABLE `internet` (
  `id` int(2) NOT NULL,
  `nama_kursus` varchar(50) DEFAULT NULL,
  `lepkom` varchar(30) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `periode` date NOT NULL,
  `kuota` int(2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internet`
--

INSERT INTO `internet` (`id`, `nama_kursus`, `lepkom`, `harga`, `periode`, `kuota`, `status`) VALUES
(1, 'Make an Easy Web With Framework CodeIgniter', 'Pengembangan Internet', 'Rp 400.000', '2018-05-24', 18, 0),
(2, 'PHP and MySQL for Web Application Development', 'Pengembangan Internet', 'Rp 400.000', '2018-05-31', 18, 0),
(3, 'Microsoft Visual Basic .NET for Beginner', 'Aplikasi dan Pemrograman', 'Rp 400.000', '2018-05-07', 17, 0),
(4, 'Java Fundamentals', 'Aplikasi dan Pemrograman', 'Rp 400.000', '2018-06-21', 16, 0),
(5, 'CMS Wordpress', 'Aplikasi dan Pemrograman', 'Rp 400.000', '2018-06-28', 16, 0),
(6, 'Object-oriented programming (OOP)', 'Aplikasi dan Pemrograman', 'Rp 400.000', '2018-07-05', 16, 0),
(7, 'Javascript', 'Pengembangan Internet', 'Rp 400.000', '2018-07-12', 16, 0),
(8, 'Android Intemediate', 'Pengembangan Internet', 'Rp 400.000', '2018-07-19', 18, 0),
(9, 'Web Design', 'Aplikasi dan Pemrograman', 'Rp 400.000', '2018-07-26', 18, 0),
(10, 'IOS Pemrogramming', 'Aplikasi dan Pemrograman', 'Rp 400.000', '2018-07-29', 16, 0),
(17, 'Code Igniter ', 'Pengembangan Internet', 'Rp 400.000', '2018-06-15', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nm_kursus` varchar(50) NOT NULL,
  `periode` date NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `kuota` int(2) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_internet` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `npm`, `nama`, `nm_kursus`, `periode`, `kelas`, `jurusan`, `kuota`, `id_user`, `id_internet`) VALUES
(100, '59413584', 'Aditya Rizky', 'Make an Easy Web With Framework CodeIgniter', '0000-00-00', '3IA01', 'Teknik Informatika', 0, 27, 0),
(101, '59413585', 'Andri Alamsyah', 'Make an Easy Web With Framework CodeIgniter', '0000-00-00', '3IA01', 'Teknik Informatika', 0, 27, 0),
(102, '59413586', 'Muhamad Naufal', 'Make an Easy Web With Framework CodeIgniter', '0000-00-00', '3IA01', 'Teknik Informatika', 0, 27, 0),
(104, '59413587', 'Rizqi Ade Pratama', 'Make an Easy Web With Framework CodeIgniter', '0000-00-00', '3IA01', 'Teknik Informatika', 0, 27, 0);

--
-- Triggers `peserta`
--
DELIMITER $$
CREATE TRIGGER `tgr_kuota` AFTER INSERT ON `peserta` FOR EACH ROW BEGIN
	UPDATE internet set kuota=kuota-NEW.kuota
	WHERE id=new.id_internet;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `npm` varchar(8) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `level` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_user`, `username`, `password`, `nama`, `npm`, `kelas`, `jurusan`, `level`, `status`) VALUES
(1, 'aditya.rizky', '057829fa5a65fc1ace408f490be486ac', 'Aditya Rizky', '59413584', '3IA01', 'Teknik Informatika', 1, 1),
(3, 'rizqi.ade.pratama', '76afb9e8577806b138b4c9a109ff', 'Rizqi Ade Pratama', '59413587', '3IA01', 'Teknik Informatika', 1, 1),
(4, 'muhamad.naufal', '9fa5a65fc1ace408f490be486ac', 'Muhamad Naufal', '59413586', '3IA01', 'Teknik Informatika', 1, 1),
(5, 'andri.alamsyah', '9e85728397806b138b4c9a109ff', 'Andri Alamsyah', '59413585', '3IA01', 'Teknik Informatika', 1, 1),
(6, 'alif.ramadhan', '0578265fc1ace408f490be486ac', 'Alif Ramadhan', '50413261', '3IB01', 'Sistem Informasi', 1, 1),
(7, 'arif.budiman', '76afb9e85728397806b138b4c9a109ff', 'Arif Budiman', '50413262', '3IB01', 'Sistem Informasi', 1, 1),
(8, 'wahyu.pratama', '0fa5a65fc1ace408f490be486ac', 'Wahyu Pratama', '50413263', '3IB01', 'Sistem Informasi', 1, 1),
(9, 'erry.wicaksana', '769e85728397806b138b4c9a109ff', 'Erry Wicaksana', '50413264', '3IB01', 'Sistem Informasi', 1, 1),
(10, 'tohir.romli', '728397806b138b4c9a109ff', 'Tohir Romli', '50413265', '3IB01', 'Sistem Informasi', 1, 1),
(27, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Universitas Gunadarma', '12345678', '3IA01', 'Teknik Informatika', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internet`
--
ALTER TABLE `internet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internet`
--
ALTER TABLE `internet`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
