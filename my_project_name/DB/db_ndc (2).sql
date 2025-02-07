-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 12:26 PM
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
-- Database: `db_ndc`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `ID` int(11) NOT NULL,
  `LocationName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `District` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Offices` int(11) DEFAULT NULL,
  `RTOCodes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`ID`, `LocationName`, `District`, `Offices`, `RTOCodes`) VALUES
(1, 'Kattakkada', ' Thiruvananthapuram', 13, ' KL-74\r'),
(2, 'Nedumangad', ' Thiruvananthapuram', 25, ' KL-21\r'),
(3, 'Thiruvananthapuram', ' Thiruvananthapuram', 31, ' KL-01'),
(4, 'Chirayinkeezhu (HO: Attingal)', ' Thiruvananthapuram', 17, ' KL-16\r'),
(5, 'Varkala', ' Thiruvananthapuram', 12, ' KL-81\r'),
(6, 'Kollam', ' Kollam', 31, ' KL-02\r'),
(7, 'Kunnathoor (HO: Sasthamcotta)', ' Kollam', 7, ' KL-61\r'),
(8, 'Karunagappally', ' Kollam', 17, ' KL-23\r'),
(9, 'Kottarakkara', ' Kollam', 27, ' KL-24'),
(10, 'Punalur', ' Kollam', 15, ' KL-25\r'),
(11, 'Pathanapuram', ' Kollam', 8, ' KL-80\r'),
(12, 'Adoor', ' Pathanamthitta', 14, ' KL-26\r'),
(13, 'Konni', ' Pathanamthitta', 14, ' KL-83\r'),
(14, 'Kozhencherry (HO: Pathanamthitta)', ' Pathanamthitta', 11, ' KL-03\r'),
(15, 'Ranni', ' Pathanamthitta', 10, ' KL-62\r'),
(16, 'Mallappally', ' Pathanamthitta', 9, ' KL-28\r'),
(17, 'Thiruvalla', ' Pathanamthitta', 12, ' KL-27\r'),
(18, 'Chenganoor', ' Alappuzha', 11, ' KL-30\r'),
(19, 'Mavelikkara', ' Alappuzha', 15, ' KL-31\r'),
(20, 'Karthikappally (HO: Haripad)', ' Alappuzha', 18, ' KL-29\r'),
(21, 'Kuttanad (HO: Mankombu)', ' Alappuzha', 14, ' KL-66\r'),
(22, 'Ambalappuzha (HO: Alappuzha)', ' Alappuzha', 13, ' KL-04\r'),
(23, 'Cherthala', ' Alappuzha', 20, ' KL-32\r'),
(24, 'Changanasserry', ' Kottayam', 15, ' KL-33\r'),
(25, 'Kottayam', ' Kottayam', 26, ' KL-05\r'),
(26, 'Vaikom', ' Kottayam', 18, ' KL-36'),
(27, 'Meenachil (HO: Palai)', ' Kottayam', 28, ' KL-35'),
(28, 'Kanjirappally', ' Kottayam', 13, ' KL-34\r'),
(29, 'Peermade', ' Idukki', 10, ' KL-37\r'),
(30, 'Udumbanchola (HO: Nedumkandam)', ' Idukki', 18, ' KL-69\r'),
(31, 'Idukki (HO: Painavu)', ' Idukki', 9, ' KL-06\r'),
(32, 'Thodupuzha', ' Idukki', 17, ' KL-38\r'),
(33, 'Devikulam', ' Idukki', 13, ' KL-68\r'),
(34, 'Kothamangalam', ' Ernakulam', 12, ' KL-44\r'),
(35, 'Muvattupuzha', ' Ernakulam', 18, ' KL-17\r'),
(36, 'Kunnathunad (HO: Perumbavoor)', ' Ernakulam', 23, ' KL-40'),
(37, 'Kanayannur (HO: Eranakulam)', ' Ernakulam', 20, ' KL-07'),
(38, 'Kochi (HO: Fort Kochi)', ' Ernakulam', 15, ' KL-43'),
(39, 'North Paravur', ' Ernakulam', 13, ' KL-42\r'),
(40, 'Aluva', ' Ernakulam', 16, ' KL-41'),
(41, 'Chalakudy', ' Thrissur', 31, ' KL-64'),
(42, 'Mukundapuram (HO: Irinjalakuda)', ' Thrissur', 29, ' KL-45\r'),
(43, 'Kodungallur', ' Thrissur', 12, ' KL-47\r'),
(44, 'Thrissur', ' Thrissur', 41, ' KL-08\r'),
(45, 'Chavakkad', ' Thrissur', 17, ' KL-46'),
(46, 'Kunnamkulam', ' Thrissur', 14, ' KL-46'),
(47, 'Thalapilly (HO: Wadakkancheri)', ' Thrissur', 22, ' KL-48\r'),
(48, 'Alathoor', ' Palakkad', 30, ' KL-49\r'),
(49, 'Chittur', ' Palakkad', 30, ' KL-70\r'),
(50, 'Palakkad', ' Palakkad', 30, ' KL-09\r'),
(51, 'Pattambi', ' Palakkad', 18, ' KL-52\r'),
(52, 'Ottappalam', ' Palakkad', 41, ' KL-51\r'),
(53, 'Mannarkkad', ' Palakkad', 19, ' KL-50\r'),
(54, 'Attappady (HO: Agali)', ' Palakkad', 6, ' KL-50\r'),
(55, 'Perinthalmanna', ' Malappuram', 24, ' KL-53\r'),
(56, 'Nilambur', ' Malappuram', 19, ' KL-71\r'),
(57, 'Eranad (HO: Manjeri)', ' Malappuram', 23, ' KL-10\r'),
(58, 'Kondotty', ' Malappuram', 12, ' KL-84\r'),
(59, 'Ponnani', ' Malappuram', 11, ' KL-54\r'),
(60, 'Tirur', ' Malappuram', 30, ' KL-55\r'),
(61, 'Tirurangadi', ' Malappuram', 17, ' KL-65\r'),
(62, 'Kozhikode', ' Kozhikode', 25, ' KL-11'),
(63, 'Thamarassery', ' Kozhikode', 20, ' KL-57'),
(64, 'Koyilandy', ' Kozhikode', 34, ' KL-56'),
(65, 'Vatakara', ' Kozhikode', 28, ' KL-18'),
(66, 'Vythiri (HO: Kalpetta)', ' Wayanad', 18, ' KL-12\r'),
(67, 'Sulthan Bathery', ' Wayanad', 15, ' KL-73\r'),
(68, 'Mananthavady', ' Wayanad', 16, ' KL-72\r'),
(69, 'Thalassery', ' Kannur', 34, ' KL-58\r'),
(70, 'Iritty', ' Kannur', 20, ' KL-78\r'),
(71, 'Kannur', ' Kannur', 28, ' KL-13\r'),
(72, 'Taliparamba', ' Kannur', 28, ' KL-59\r'),
(73, 'Payyanur', ' Kannur', 22, ' KL-86\r'),
(74, 'Hosdurg (HO: Kanhangad)', ' Kasaragod', 31, ' KL-60\r'),
(75, 'Vellarikund', ' Kasaragod', 15, ' KL-79\r'),
(76, 'Kasaragod', ' Kasaragod', 34, ' KL-14\r'),
(77, 'Manjeshwaram (HO: Uppala)', ' Kasaragod', 48, ' KL-14\r');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `taluk` varchar(100) NOT NULL,
  `panchayath` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `aadhar` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `mobile`, `email`, `address`, `state`, `district`, `pin`, `taluk`, `panchayath`, `photo`, `aadhar`, `created_at`) VALUES
(1, 'dfq', '8089332859', 'majid.n@bimageconsulting.in', 'Test', 'KENTUCKY', 'ghj', '111111', 'ghjghj', 'ghjghj', '1737620723_85d34b5d4df8d8e0b4b7.png', '111111111111', '2025-01-23 08:25:23'),
(2, 'dfq', '8089332859', 'majid.n@bimageconsulting.in', 'Test', 'KENTUCKY', 'ghj', '111111', 'ghjghj', 'ghjghj', '1737620904_c0a9bac8cc95521977e8.png', '111111111111', '2025-01-23 08:28:24'),
(3, 'dfqss', '8089332859', 'majid.n@bimageconsulting.in', 'Test', 'KENTUCKY', 'ghj', '111111', '19', 'NA', '1737804344_3958a84ae3ef708ed9b8.png', '111111111111', '2025-01-25 11:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `Latitude` varchar(30) NOT NULL,
  `Longitude` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `Latitude`, `Longitude`) VALUES
(1, 'Andaman and Nicobar Islands', '11.7401', '92.6586\r'),
(2, 'Andhra Pradesh', '15.9129', '79.74\r'),
(3, 'Arunachal Pradesh', '28.218', '94.7278\r'),
(4, 'Assam', '31.1048', '77.1734\r'),
(5, 'Bihar', '25.0961', '85.3131\r'),
(6, 'Chhattisgarh', '21.2787', '81.8661\r'),
(7, 'Dadra and Nagar Haveli and Dam', '20.1809', '73.0169\r'),
(8, 'Delhi', '28.7041', '77.1025\r'),
(9, 'Goa', '15.2993', '74.124\r'),
(10, 'Gujarat', '22.2587', '71.1924\r'),
(11, 'Haryana', '29.0588', '76.0856\r'),
(12, 'Himachal Pradesh', '31.1048', '77.1734\r'),
(13, 'Jharkhand', '23.6102', '85.2799\r'),
(14, 'Karnataka', '15.3173', '75.7139\r'),
(15, 'Kerala', '10.8505', '76.2711\r'),
(16, 'Lakshadweep', '10', '73\r'),
(17, 'Madhya Pradesh', '22.9734', '78.6569\r'),
(18, 'Maharashtra', '19.7515', '75.7139\r'),
(19, 'Manipur', '24.6637', '93.9063\r'),
(20, 'Meghalaya', '25.467', '91.3662\r'),
(21, 'Mizoram', '23.1645', '92.9376\r'),
(22, 'Nagaland', '26.1584', '94.5624\r'),
(23, 'Odisha', '20.9517', '85.0985\r'),
(24, 'Puducherry', '11.9416', '79.8083\r'),
(25, 'Punjab', '31.1471', '75.3412\r'),
(26, 'Rajasthan', '27.0238', '74.2179\r'),
(27, 'Sikkim', '27.533', '88.5122\r'),
(28, 'Tamil Nadu', '11.1271', '78.6569\r'),
(29, 'Telangana', '18.1124', '79.0193\r'),
(30, 'Tripura', '23.9408', '91.9882\r'),
(31, 'Chandigarh', '30.7333', '76.7794\r'),
(32, 'Jammu and Kashmir', '33.7782', '76.5762\r'),
(33, 'Ladakh', '34.2996', '78.2932\r'),
(34, 'Uttar Pradesh', '26.8467', '80.9462\r'),
(35, 'Uttarakhand', '30.0668', '79.0193\r'),
(36, 'West Bengal', '22.9868', '87.855\r');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
