-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 11:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_etudiant`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `cin` int(8) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `justifie` int(4) NOT NULL,
  `nonJustifie` int(4) NOT NULL,
  `date` date NOT NULL,
  `matiere` varchar(50) NOT NULL,
  `groupe` varchar(10) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`cin`, `nom`, `prenom`, `justifie`, `nonJustifie`, `date`, `matiere`, `groupe`, `login`) VALUES
(14527935, 'baraket', 'shehnez', 1, 0, '2022-05-09', 'Tech. Web', 'INFO1-A', ''),
(14527935, 'baraket', 'shehnez', 1, 0, '2022-05-11', 'Tech. Web', 'INFO1-A', ''),
(14527935, 'baraket', 'shehnez', 0, 1, '2022-05-13', 'Tech. Web', 'INFO1-A', ''),
(20135498, 'Hidoussi', 'Islem', 0, 1, '2022-05-09', 'Tech. Web', 'INFO1-A', ''),
(14527935, 'baraket', 'shehnez', 1, 0, '2022-05-16', 'Tech. Web', 'INFO1-A', ''),
(14527935, 'baraket', 'shehnez', 0, 1, '2022-05-17', 'Tech. Web', 'INFO1-A', ''),
(14527935, 'baraket', 'shehnez', 0, 1, '2022-04-29', 'Tech. Web', 'INFO1-A', ''),
(14527935, 'baraket', 'shehnez', 0, 2, '2022-04-30', 'Tech. Web', 'INFO1-A', ''),
(10324598, 'Mohamed', 'Hachem', 1, 0, '2022-04-11', 'Tech. Web', 'INFO1-B', ''),
(10324598, 'Mohamed', 'Hachem', 1, 0, '2022-04-12', 'Tech. Web', 'INFO1-B', ''),
(10324598, 'Mohamed', 'Hachem', 0, 1, '2022-04-13', 'Tech. Web', 'INFO1-B', '');

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `login` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id`, `date`, `nom`, `prenom`, `login`, `pass`, `image`) VALUES
(9, '2022-05-09 20:04:44', 'Saadd', 'Walid', 'walid.saadd@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://scontent.ftun9-1.fna.fbcdn.net/v/t1.18169-9/602247_459790564092257_1009919767_n.jpg?_nc_cat=106&ccb=1-6&_nc_sid=de6eea&_nc_ohc=4jP-ZC_WofUAX-ZIssA&_nc_ht=scontent.ftun9-1.fna&oh=00_AT9ZHe6B4VGxicuR28b6Fd-eDcpSgN9GGmmZKR8moqpgHw&oe=629E645C'),
(10, '2022-05-09 20:04:13', 'Rihani', 'Anis', 'anis@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/246000944_10223109831928694_3257515406314505630_n.jpg?_nc_cat=109&ccb=1-6&_nc_sid=09cbfe&_nc_ohc=2kg6ljtYT-UAX8BWyFS&_nc_ht=scontent.ftun9-1.fna&oh=00_AT-xNXyJZYh5j4es5lBxbvJiPV6VsSaxR7HxFw5kDB_U9Q&oe=627F2BA1'),
(11, '2022-05-09 20:06:39', 'Kammoun', 'Imen', 'imen@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/242954920_10222414448204081_634056373437793360_n.jpg?_nc_cat=103&ccb=1-6&_nc_sid=09cbfe&_nc_ohc=7y-eMJS2xBAAX8YR7mP&tn=rt6slqH-FWKhVouf&_nc_ht=scontent.ftun9-1.fna&oh=00_AT9A10LkwJfyngqpjCiLnLdPURn2NRaH6h6_W1JpSAmiuA&oe=627E3883'),
(12, '2022-05-09 20:08:38', 'Ghazouani', 'Haythem', 'haythem@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://scontent.ftun9-1.fna.fbcdn.net/v/t1.6435-9/73210014_2643704145674927_6903155520153059328_n.jpg?_nc_cat=101&ccb=1-6&_nc_sid=09cbfe&_nc_ohc=oP8-60BOYLcAX_3dBTt&tn=rt6slqH-FWKhVouf&_nc_ht=scontent.ftun9-1.fna&oh=00_AT_y0_d4BvuzlhQltKMlLL59i3t2AS76xkn-N-cgh2wzcw&oe=629D8B59');

-- --------------------------------------------------------

--
-- Table structure for table `ens_grp`
--

CREATE TABLE `ens_grp` (
  `id` int(11) NOT NULL,
  `idEnseignant` int(10) UNSIGNED NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ens_grp`
--

INSERT INTO `ens_grp` (`id`, `idEnseignant`, `idGroupe`) VALUES
(15, 9, 20),
(16, 9, 21),
(17, 9, 22),
(18, 9, 23),
(19, 9, 24),
(20, 10, 21),
(21, 10, 23),
(22, 11, 20),
(23, 11, 24),
(24, 11, 23),
(25, 12, 22),
(26, 12, 21);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `cin` int(8) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `cpassword` varchar(40) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `Classe` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`cin`, `email`, `password`, `cpassword`, `nom`, `prenom`, `adresse`, `Classe`) VALUES
(10234570, 'Eya@gmail.com', '3ac48c3f00c7601dd2de59fe525e9b64', '3ac48c3f00c7601dd2de59fe525e9b64', 'Ben Belkacem', 'Eya', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-C'),
(10324598, 'Hachem@gmail.com', '8e602412ba7ff6238375509bd85c521d', '8e602412ba7ff6238375509bd85c521d', 'Mohamed', 'Hachem', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-B'),
(14527935, 'shehnez@gmail.com', 'f4360c759c1b09e04165da1a926a42d2', 'f4360c759c1b09e04165da1a926a42d2', 'baraket', 'shehnez', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-A'),
(14623587, 'islem@gmail.com', '5f502a102ea6dede628a66772c9fa615', '5f502a102ea6dede628a66772c9fa615', 'sahli', 'islem', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-E'),
(20135498, 'Islem@gmail.com', '7091148e541195cf6558352578058f64', '7091148e541195cf6558352578058f64', 'Hidoussi', 'Islem', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-A'),
(30125478, 'emna@gmail.com', '841936a32356caf7e2352e22cd506a57', '841936a32356caf7e2352e22cd506a57', 'ben othmen ', 'emna', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-B'),
(34512798, 'Farah@gmail.com', '447a831aa58809c6fb3b7a2db6692b87', '447a831aa58809c6fb3b7a2db6692b87', 'Ouesleti', 'Farah', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-B'),
(42156325, 'Rayen@gmail.com', '91e14f3b3f80b4b897e9df79da87c697', '91e14f3b3f80b4b897e9df79da87c697', 'Ghith', 'Rayen', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-C'),
(42563185, 'Emna@gmail.com', '1540741b65d94599514f07c3651eca79', '1540741b65d94599514f07c3651eca79', 'Belhareth', 'Emna', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-D'),
(42657832, 'Oumayma@gmail.com', '0bad42d069465f6a28556d1390d8ee37', '0bad42d069465f6a28556d1390d8ee37', 'Limeme', 'Oumayma', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-C'),
(42987536, 'Yasmine@gmail.com', '0211d6a28c6e1d432bd122630839b22e', '0211d6a28c6e1d432bd122630839b22e', 'Ben Hedi', 'Yasmine', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-E'),
(43268594, 'Oussama@gmail.com', '9487c0e3a9b09dc7b950726828b78db0', '9487c0e3a9b09dc7b950726828b78db0', 'bakali', 'Oussama', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-E'),
(45216789, 'oumayma@gmail.com', '0eff6b77eb5bc1b5312c16969ffc00b4', '0eff6b77eb5bc1b5312c16969ffc00b4', 'aoun', 'oumayma', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-C'),
(45231578, 'heni@gmail.com', '4baf4a71d294d7f3d0dcd4e5ab5fe22d', '4baf4a71d294d7f3d0dcd4e5ab5fe22d', 'darguech', 'heni', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-B'),
(45319872, 'Amal@gmail.com', 'e7333768279b2eaa5ea03f6cc9c669d7', 'e7333768279b2eaa5ea03f6cc9c669d7', 'ben yakhlef ', 'Amal ', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-C'),
(46532175, 'nour@gmail.com', '18caa071342cf704e4b333f347eccc46', '18caa071342cf704e4b333f347eccc46', 'naasri', 'nour', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-D'),
(48596235, 'MohamedIsmail@gmail.com', '17067e6f8b5d96ce66d54cb4b0272894', '17067e6f8b5d96ce66d54cb4b0272894', 'Kharraf ', 'Mohamed Ismail', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-D'),
(52634895, 'Oumaima@gmail.com', '83db55e0fc5123e328d72e0770cfd20a', '83db55e0fc5123e328d72e0770cfd20a', 'Horry ', 'Oumaima ', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-D'),
(64285762, 'Houssem@gmail.com', 'ddebf53d08310afb76209af6f7d9f108', 'ddebf53d08310afb76209af6f7d9f108', 'Benmoussa ', 'Houssem', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-B'),
(74512685, 'Mohamed@gmail.com', '254879750e4e7227b67dfbd4a7e69b14', '254879750e4e7227b67dfbd4a7e69b14', 'Hajjaji', 'Mohamed Omar', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-D'),
(75319648, 'Ibtihel@gmail.com', '9708b694b825a6e2a2dda9551e6ccbf7', '9708b694b825a6e2a2dda9551e6ccbf7', 'Smirani', 'Ibtihel', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-E'),
(75412638, 'menyar@gmail.com', 'faedae7d7abac192a7911b5266818916', 'faedae7d7abac192a7911b5266818916', 'tabassi', 'menyar', '45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie', 'INFO1-E');

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`) VALUES
(20, 'INFO1-A'),
(21, 'INFO1-B'),
(22, 'INFO1-C'),
(23, 'INFO1-D'),
(24, 'INFO1-E');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ens_grp`
--
ALTER TABLE `ens_grp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkgrp` (`idGroupe`),
  ADD KEY `fkens` (`idEnseignant`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`cin`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ens_grp`
--
ALTER TABLE `ens_grp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ens_grp`
--
ALTER TABLE `ens_grp`
  ADD CONSTRAINT `fkens` FOREIGN KEY (`idEnseignant`) REFERENCES `enseignant` (`id`),
  ADD CONSTRAINT `fkgrp` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
