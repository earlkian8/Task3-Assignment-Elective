-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2025 at 08:33 AM
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
-- Database: `task3_assignment_elective`
--

-- --------------------------------------------------------

--
-- Table structure for table `reading_list`
--

CREATE TABLE `reading_list` (
  `read_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `type` enum('Fiction','Non-Fiction') NOT NULL,
  `target_date` date NOT NULL,
  `status` enum('Ongoing','Completed') NOT NULL DEFAULT 'Ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reading_list`
--

INSERT INTO `reading_list` (`read_id`, `book_name`, `author_name`, `type`, `target_date`, `status`) VALUES
(2, '1984', 'George Orwell', 'Fiction', '2025-05-15', 'Completed'),
(3, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', '2025-06-01', 'Ongoing'),
(4, 'Sapiens', 'Yuval Noah Harari', 'Non-Fiction', '2025-06-15', 'Ongoing'),
(5, 'The Alchemist', 'Paulo Coelho', 'Fiction', '2025-07-01', 'Ongoing'),
(6, 'The Power of Now', 'Eckhart Tolle', 'Non-Fiction', '2025-07-10', 'Completed'),
(7, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', '2025-07-20', 'Completed'),
(8, 'Educated', 'Tara Westover', 'Non-Fiction', '2025-07-25', 'Ongoing'),
(10, 'Deep Work', 'Cal Newport', 'Non-Fiction', '2025-08-10', 'Ongoing'),
(11, 'Brave New World', 'Aldous Huxley', 'Fiction', '2025-08-15', 'Ongoing'),
(12, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'Non-Fiction', '2025-08-20', 'Ongoing'),
(13, 'Moby Dick', 'Herman Melville', 'Fiction', '2025-09-01', 'Ongoing'),
(14, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Non-Fiction', '2025-09-10', 'Ongoing'),
(15, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', '2025-09-15', 'Ongoing'),
(16, 'Can\'t Hurt Me', 'David Goggins', 'Non-Fiction', '2025-09-20', 'Completed'),
(17, 'Frankenstein', 'Mary Shelley', 'Fiction', '2025-09-25', 'Completed'),
(18, 'Man\'s Search for Meaning', 'Viktor E. Frankl', 'Non-Fiction', '2025-10-01', 'Completed'),
(19, 'Crime and Punishment', 'Fyodor Dostoevsky', 'Fiction', '2025-10-10', 'Completed'),
(20, 'Grit', 'Angela Duckworth', 'Non-Fiction', '2025-10-15', 'Ongoing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reading_list`
--
ALTER TABLE `reading_list`
  ADD PRIMARY KEY (`read_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reading_list`
--
ALTER TABLE `reading_list`
  MODIFY `read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
